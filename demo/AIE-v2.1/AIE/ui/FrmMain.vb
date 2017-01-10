Imports System.Xml
Imports System.Net
Imports System.IO
Imports System.Text
Imports MySql.Data.MySqlClient
Imports Newtonsoft.Json
Imports System.Threading

Public Class FrmMain

    Private running_cycle_track As Integer
    Private download_flag As Boolean = False
    Private queue_schedule As Queue = New Queue()
    Private Download_Thread() As Thread = New Thread(10) {}
    Private thStepCount As Integer = 10




    Private Sub FrmMain_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

        Try
            Me.DepartureDatePicker.Format = DateTimePickerFormat.Custom
            Me.DepartureDatePicker.CustomFormat = "yyyy-MM-dd"
            Me.DaySpanTextBox.Text = Day_Span

            popluate_return_cycle()
            ReturnCycleComboBox.SelectedIndex = ReturnCycleComboBox.FindString(Day_Cycle.ToString)

            Me.DepartureComboBox.Items.Clear()
            Me.DestinationComboBox.Items.Clear()

            Dim cityds As DataSet
            strSQL = "SELECT distinct DepartureCode FROM aie_citypair ORDER BY DepartureCode"
            cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
            DepartureComboBox.DisplayMember = "DepartureCode"
            DepartureComboBox.ValueMember = "DepartureCode"
            DepartureComboBox.DataSource = cityds.Tables("CityPair")
            DepartureComboBox.SelectedIndex = 0

            running_cycle_track = Running_Cycle
            Me.RunCycleTextBox.Text = running_cycle_track.ToString
            '** Set timer interval getting value from ini file
            Me.Timer.Interval = ((Minutes * 60) + Seconds) * 1000
            Me.MinutesTextBox.Text = Format(Minutes, "00")
            Me.SecondsTextBox.Text = Format(Seconds, "00")
            Me.Timer.Enabled = False
            Me.cmdStart.Enabled = True
            Me.cmdStop.Enabled = False

            SchedulingStatusBar.Text = "Click start button to run programm after finish the configuration of departure date,city,departure in days and return in days."
            TotalTimeStatusBar.Text = ""

            PbSpinning.Visible = False

            MinutesTextBox.ReadOnly = True
            SecondsTextBox.ReadOnly = True
        Catch ex As Exception
            MessageBox.Show("FrmMain_Load" + ex.Message)
        End Try
    End Sub

    Private Sub popluate_return_cycle()
        If String.Empty.Equals(Return_cycle_type) Then
            Return
        End If
        Dim return_cycle_types() As String
        return_cycle_types = Return_cycle_type.Split("|")

        Dim list As New DataTable()

        list.Columns.Add(New DataColumn("Display", System.Type.GetType("System.Int32")))
        list.Columns.Add(New DataColumn("ID", System.Type.GetType("System.Int32")))

        For n As Integer = 0 To return_cycle_types.Length - 1
            list.Rows.Add(list.NewRow())
            list.Rows(n)(0) = return_cycle_types(n)
            list.Rows(n)(1) = return_cycle_types(n)
        Next
        
        ReturnCycleComboBox.DataSource = list
        ReturnCycleComboBox.DisplayMember = "Display"
        ReturnCycleComboBox.ValueMember = "ID"

    End Sub

    '***Only allow digit input for day span and day cycle textbox control
    Private Sub TextBox_KeyPress(ByVal sender As System.Object, ByVal e As System.Windows.Forms.KeyPressEventArgs) Handles DaySpanTextBox.KeyPress
        Select Case e.KeyChar
            Case "0" To "9"
            Case Chr(Keys.Back) 'backspace
            Case Else
                e.Handled = True 'invalid handler
        End Select
    End Sub

    Private Sub disable_controls()
        Me.DaySpanTextBox.ReadOnly = True
        Me.DepartureDatePicker.Enabled = False
        Me.DepartureComboBox.Enabled = False
        Me.DestinationComboBox.Enabled = False
        Me.ReturnCycleComboBox.Enabled = False
    End Sub

    Private Sub enable_controls()
        Me.DaySpanTextBox.ReadOnly = False
        Me.DepartureDatePicker.Enabled = True
        Me.DepartureComboBox.Enabled = True
        Me.DestinationComboBox.Enabled = True
        Me.ReturnCycleComboBox.Enabled = True
    End Sub

    Private Sub DepartureCombobox_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DepartureComboBox.SelectedIndexChanged
        If DepartureComboBox.Items.Count = 0 Then
            MsgBox("No item in departure combobox", MsgBoxStyle.Exclamation, "Warning")
            Return
        End If
        Utilities.Instance().FillComboBox(DepartureComboBox.Text.Trim, DestinationComboBox)
    End Sub

    Private Sub CopyToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CopyToolStripMenuItem.Click
        If ResultListView.Items.Count = 0 Then
            Return
        End If
        Dim selectString As String = String.Empty
        Dim lsvRow As ListViewItem
        lsvRow = ResultListView.SelectedItems(0)
        selectString = lsvRow.Text & ControlChars.Tab & _
                       lsvRow.SubItems(1).Text & ControlChars.Tab & _
                       lsvRow.SubItems(2).Text & ControlChars.Tab & _
                       lsvRow.SubItems(3).Text & ControlChars.Tab & _
                       lsvRow.SubItems(4).Text & ControlChars.Tab & _
                       lsvRow.SubItems(5).Text & ControlChars.Tab & _
                       lsvRow.SubItems(6).Text & ControlChars.Tab & _
                       ControlChars.NewLine
        Clipboard.SetDataObject(selectString)
    End Sub

    Private Sub ExitToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ExitToolStripMenuItem.Click
        Me.Close()
    End Sub

#Region "****Function****"
    Private Function donwload_aie_data()

        While (download_flag)
            Dim aie_scheduling_data_modle As aie_scheduling_data = Nothing
            SyncLock (queue_schedule)
                If (queue_schedule.Count > 0) Then
                    aie_scheduling_data_modle = New aie_scheduling_data()
                    aie_scheduling_data_modle = DirectCast(queue_schedule.Dequeue(), aie_scheduling_data)
                End If
            End SyncLock
            If Not aie_scheduling_data_modle Is Nothing Then
                Dim query_flag As Boolean
                Dim url_builder As StringBuilder = New StringBuilder
                Dim base_url_length As Integer = 0
                Dim conn As MySqlConnection = Nothing
                conn = SqlHelper.Instance().EstablishConnection()
                Debug.Print(aie_scheduling_data_modle.ID.ToString)

                Try
                    query_flag = False

                    url_builder.Append(baseUrl)
                    url_builder.Append("&SITE=ADBLADBL&LANGUAGE=US&TRIPFLOW=YES")
                    url_builder.Append("&TRIP_TYPE=R")
                    url_builder.Append("&B_LOCATION_1=" & aie_scheduling_data_modle.departure_city)
                    url_builder.Append("&B_ANY_TIME_1=TRUE")
                    url_builder.Append("&E_LOCATION_1=" & aie_scheduling_data_modle.destination_city)
                    url_builder.Append("&B_ANY_TIME_2=TRUE")
                    url_builder.Append("&CABIN=E")
                    url_builder.Append("&TRAVELLER_TYPE_1=ADT")
                    url_builder.Append("&WORKFLOW_NAME=RGSIMPLE")
                    url_builder.Append("&PRODUCT_TYPE_1=STANDARD_AIR")
                    url_builder.Append("&B_DATE_1=" & aie_scheduling_data_modle.departure_date.ToString("yyyyMMdd").Trim() & "0000")
                    url_builder.Append("&B_DATE_2=" & aie_scheduling_data_modle.departure_date.AddDays(aie_scheduling_data_modle.day_cycle).ToString("yyyyMMdd").Trim() & "0000")

                    base_url_length = url_builder.ToString.Length

                    Debug.Print(url_builder.ToString)

                    strSQL = "UPDATE aie_scheduling_data SET status='" & ST_in_progress & "' WHERE ID=" & aie_scheduling_data_modle.ID
                    SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)

                    Dim price As String = String.Empty
                    Dim stops As Integer = 0
                    Dim aircode As String = String.Empty
                    Dim airname As String = String.Empty
                    Dim b_rtn As Boolean = False
                    b_rtn = web_request_response(url_builder.ToString, price, stops, aircode, airname)

                    If b_rtn Then
                        
                        strSQL = "INSERT INTO `aie_masterdata`(`DepartureDate`,`ReturnDate`,`DepartureCity`,`ArrivalCity`, `Price`, `Stops`, `AirlineCode`, `AirlineName`,`WebLink`,`Undone`) VALUES ( '2012-04-18', '2012-04-19', '22', '2', '2.00', '2', '2', '2', null, 'FALSE');"
                        Dim strSQL_builder As New System.Text.StringBuilder
                        strSQL_builder.Append("INSERT INTO `aie_masterdata`(`DepartureDate`,`ReturnDate`,`DepartureCity`,`ArrivalCity`, `Price`, `Stops`, `AirlineCode`, `AirlineName`,`WebLink`,`Undone`) VALUES ( ")
                        strSQL_builder.Append("'" & aie_scheduling_data_modle.departure_date.ToString("yyyy-MM-dd").Trim() & "',")
                        strSQL_builder.Append("'" & aie_scheduling_data_modle.departure_date.AddDays(aie_scheduling_data_modle.day_cycle).ToString("yyyy-MM-dd").Trim() & "',")
                        strSQL_builder.Append("'" & aie_scheduling_data_modle.departure_city & "',")
                        strSQL_builder.Append("'" & aie_scheduling_data_modle.destination_city & "',")
                        strSQL_builder.Append("'" & price & "',")
                        strSQL_builder.Append("'" & stops & "',")
                        strSQL_builder.Append("'" & aircode & "',")
                        strSQL_builder.Append("'" & airname & "',")
                        strSQL_builder.Append("'" & url_builder.ToString & "',")
                        strSQL_builder.Append("'TRUE') ")
                        SqlHelper.Instance().ExecuteNoneQuery(strSQL_builder.ToString, conn)
                        Debug.Print(strSQL_builder.ToString)

                        strSQL = "UPDATE aie_scheduling_data SET undone='True' WHERE ID=" & aie_scheduling_data_modle.ID
                        SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                    End If
                    '***update the scheduling status****
                    strSQL = "UPDATE aie_scheduling_data SET status='" & ST_ok & "' WHERE ID=" & aie_scheduling_data_modle.ID.ToString
                    SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                    query_flag = True
                Catch ex As Exception

                Finally
                    If Not conn Is Nothing Then
                        If sqlcon.State = ConnectionState.Open Or sqlcon.State = ConnectionState.Broken Then
                            sqlcon.Close()
                        End If
                    End If
                    'Me.PbSpinning.Visible = False

                End Try

            End If
            Thread.Sleep(1000)
        End While
        'Return query_flag
    End Function

    Private Function query_aie_data() As Boolean
        Dim query_flag As Boolean

        Dim departure_date_from As Date
        Dim departure_date_to As Date

        Dim scheduling_data_id, exception_id As Integer

        Dim departure_date As String
        Dim return_date As String

        Dim sql_departure_date As String
        Dim sql_return_date As String


        Dim departure_city As String = DepartureComboBox.Text.Trim
        Dim destination_city As String = DestinationComboBox.Text.Trim

        Dim all_start_time As DateTime
        Dim each_start_time As DateTime
        Dim gross_time As Double
        Dim individual_time As Long

        Dim url_builder As New System.Text.StringBuilder
        Dim base_url_length As Integer

        Dim external_return_date As Date
        Dim final_return_date As Date

        Dim individual_city As String = String.Empty
        Dim id As Integer = 1

        'Dim price As String
        Dim body As String

        Dim conn As MySqlConnection = Nothing
        Dim verify_dataset As DataSet

        Try
            query_flag = False
            Me.TotalTimeStatusBar.Text = ""
            Me.SchedulingStatusBar.Text = "Job is in process..."
            'After complete the date validation, we start to connect the database.
            conn = SqlHelper.Instance().EstablishConnection()

            '*****Checkpoint for data in table*****
            '1.check if valid data in aie_scheduling_data

            '***status: not_start, in_progress, ok
            '***undone: false, true(discard record)
            strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id FROM aie_scheduling_data WHERE undone='False' and to_days(aie_scheduling_data.departure_date) > to_days(date_add(NOW(),INTERVAL 3 day)) and to_days(date_add(aie_scheduling_data.departure_date,interval day_cycle day)) < to_days(date_add(NOW(),INTERVAL 10 month))  ORDER BY departure_date ASC"

            'Dim scheduling_status As String

            Dim scheduling_exception_flag As Boolean
            verify_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", conn)
            If Not verify_dataset.Tables("scheduling_data") Is Nothing Then
                For Each objDR As DataRow In verify_dataset.Tables("scheduling_data").Rows

                    Try
                        'Compose the AIE base URL
                        departure_date_from = Convert.ToDateTime(objDR(1).ToString().Trim())
                        departure_date_to = departure_date_from.AddDays(Convert.ToInt32(objDR(4).ToString().Trim()))

                        url_builder.Append(baseUrl)
                        url_builder.Append("&SITE=ADBLADBL&LANGUAGE=US&TRIPFLOW=YES")
                        url_builder.Append("&TRIP_TYPE=R")
                        url_builder.Append("&B_LOCATION_1=" & objDR(2).ToString().Trim())
                        url_builder.Append("&B_ANY_TIME_1=TRUE")
                        url_builder.Append("&E_LOCATION_1=" & objDR(3).ToString().Trim())
                        url_builder.Append("&B_ANY_TIME_2=TRUE")
                        url_builder.Append("&CABIN=E")
                        url_builder.Append("&TRAVELLER_TYPE_1=ADT")
                        url_builder.Append("&WORKFLOW_NAME=RGSIMPLE")
                        url_builder.Append("&PRODUCT_TYPE_1=STANDARD_AIR")
                        url_builder.Append("&B_DATE_1=" & departure_date_from.ToString("yyyyMMdd").Trim() & "0000")
                        url_builder.Append("&B_DATE_2=" & departure_date_to.ToString("yyyyMMdd").Trim() & "0000")


                        base_url_length = url_builder.ToString.Length

                        PbSpinning.Visible = True
                        PbSpinning.BringToFront()
                        Dim external_departure_date_from As Date = departure_date_from
                        all_start_time = DateTime.Now
                        '****update the status to in_progress****
                        strSQL = "UPDATE aie_scheduling_data SET status='" & ST_in_progress & "' WHERE ID=" & objDR(0).ToString().Trim()
                        SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                        Dim price As String = String.Empty
                        Dim stops As Integer = 0
                        Dim aircode As String = String.Empty
                        Dim airname As String = String.Empty
                        Dim b_rtn As Boolean = False
                        b_rtn = web_request_response(url_builder.ToString, price, stops, aircode, airname)

                        'Dim all_finish_time As Date = DateTime.Now
                        'gross_time = Format(all_finish_time.Subtract(all_start_time).TotalSeconds / 60, "0.00")
                        'TotalTimeStatusBar.Text = "Total Execute Time : " & gross_time.ToString & "minutes"
                        'SchedulingStatusBar.Text = "This job is finished for departure date:" & departure_date_from.ToString("yyyy-MM-dd")
                        '***update the exception status if has****
                        If b_rtn Then
                            
                            strSQL = "INSERT INTO `aie_masterdata`(`DepartureDate`,`ReturnDate`,`DepartureCity`,`ArrivalCity`, `Price`, `Stops`, `AirlineCode`, `AirlineName`,`WebLink`,`Undone`) VALUES ( '2012-04-18', '2012-04-19', '22', '2', '2.00', '2', '2', '2', null, 'FALSE');"
                            Dim strSQL_builder As New System.Text.StringBuilder
                            strSQL_builder.Append("INSERT INTO `aie_masterdata`(`DepartureDate`,`ReturnDate`,`DepartureCity`,`ArrivalCity`, `Price`, `Stops`, `AirlineCode`, `AirlineName`,`WebLink`,`Undone`) VALUES ( ")
                            strSQL_builder.Append("'" & departure_date_from.ToString("yyyy-MM-dd").Trim() & "',")
                            strSQL_builder.Append("'" & departure_date_to.ToString("yyyy-MM-dd").Trim() & "',")
                            strSQL_builder.Append("'" & objDR(2).ToString().Trim() & "',")
                            strSQL_builder.Append("'" & objDR(3).ToString().Trim() & "',")
                            strSQL_builder.Append("'" & price & "',")
                            strSQL_builder.Append("'" & stops & "',")
                            strSQL_builder.Append("'" & aircode & "',")
                            strSQL_builder.Append("'" & airname & "',")
                            strSQL_builder.Append("'" & url_builder.ToString & "',")
                            strSQL_builder.Append("'TRUE'） ")
                            SqlHelper.Instance().ExecuteNoneQuery(strSQL_builder.ToString, conn)

                            strSQL = "UPDATE aie_scheduling_exception SET undone='True' WHERE ID=" & exception_id.ToString
                            SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                        End If
                        '***update the scheduling status****
                        strSQL = "UPDATE aie_scheduling_data SET status='" & ST_ok & "' WHERE ID=" & scheduling_data_id.ToString
                        SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                        '***after finish the running, then generate a set of new scheduling date
                        'Dim next_departure_date As Date = generate_target_date(departure_date_to, Numbers.ONE)
                        'strSQL = "INSERT INTO aie_scheduling_data(departure_date,day_span,departure_city,day_cycle,status)VALUES('" & _
                        '         next_departure_date.ToString("yyyy-MM-dd") & "'," & Day_Span.ToString & ",'" & departure_city & "'," & Day_Cycle.ToString & ",'" & ST_not_start & "')"
                        'SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                        'update the data for controls
                        'Me.DepartureDatePicker.Value = next_departure_date.ToString("yyyy-MM-dd")
                        query_flag = True
                    Catch ex As Exception
                        ''record the failure data, departure date,return date, city...
                        ''that will help next time to run from the failed point
                        'strSQL = "INSERT INTO aie_scheduling_exception(departure_date,exception_date,exception_destination_city)VALUES('" & _
                        '         departure_date_from.ToString("yyyy-MM-dd") & "','" & external_return_date.ToString("yyyy-MM-dd") & "','" & departure_city & "')"
                        'SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)

                        'strSQL = "SELECT id FROM aie_scheduling_exception WHERE " & _
                        '         "departure_date='" & departure_date_from.ToString("yyyy-MM-dd") & _
                        '         " AND exception_date='" & external_return_date.ToString("yyyy-MM-dd") & _
                        '         "' AND exception_destination_city ='" & individual_city & "' AND undone='False'"

                        'verify_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_exception_id", conn)
                        'If Not verify_dataset.Tables("scheduling_exception_id") Is Nothing Then
                        '    If verify_dataset.Tables("scheduling_exception_id").Rows.Count = 1 Then
                        '        exception_id = Convert.ToInt32(verify_dataset.Tables("scheduling_exception_id").Rows(0).Item("id").ToString().Trim)
                        '    End If
                        'End If

                        'strSQL = "UPDATE aie_scheduling_data SET exception_id = " & exception_id.ToString & " WHERE id=" & scheduling_data_id.ToString
                        'SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                        'body = "Exception happen for exception_id: " & exception_id
                        'Utilities.Instance().send_mail("Exception occurred", body)
                    
                    End Try

                Next
            End If
        Finally
            If Not conn Is Nothing Then
                If sqlcon.State = ConnectionState.Open Or sqlcon.State = ConnectionState.Broken Then
                    sqlcon.Close()
                End If
            End If
            Me.PbSpinning.Visible = False

        End Try
        Return query_flag
    End Function

    Private Function generate_target_date(ByVal startdate As Date, ByVal dayspan As Integer)
        'this function is to generate the target date(tuesday,thurday)
        Dim target_date As Date = startdate.AddDays(dayspan)
        Dim departure_date_to_dow As Integer = target_date.DayOfWeek
        Select Case departure_date_to_dow
            Case DayOfWeek.Sunday
                target_date = startdate.AddDays(dayspan + Numbers.TWO)
            Case DayOfWeek.Monday, DayOfWeek.Wednesday
                target_date = startdate.AddDays(dayspan + Numbers.ONE)
            Case DayOfWeek.Friday
                target_date = startdate.AddDays(dayspan + Numbers.FOUR)
            Case DayOfWeek.Saturday
                target_date = startdate.AddDays(dayspan + Numbers.THREE)
        End Select
        Return target_date
    End Function

    '******Read data from response of web******
    Structure WebRequestStatusBlock
        Public blRequestOK As Boolean
        Public iRequestStatus As Integer
        Public sStrData As String
        Public Const cRequestSuccessful = 1
    End Structure

    Protected WbRequest As WebRequestStatusBlock = Nothing

    Private Function web_request_response(ByVal Url As String, Optional ByRef price As String = Nothing, Optional ByRef stops As Integer = Nothing, Optional ByRef aircode As String = Nothing, Optional ByRef airname As String = Nothing, Optional ByVal Credential As System.Net.NetworkCredential = Nothing) As Boolean
        '***price =G_FAKE_PRICE means error
        Dim b_rtn As Boolean = False

        Dim request As HttpWebRequest = System.Net.WebRequest.Create(Url)
        Dim response As HttpWebResponse = Nothing
        ' if credentials supplied - add them.
        If Credential IsNot Nothing Then request.Credentials = Credential
        Try
            response = CType(request.GetResponse(), HttpWebResponse)
            WbRequest.blRequestOK = True
        Catch e As Exception
            WbRequest.blRequestOK = False
            If e.Message.Contains("404") Then
                WbRequest.sStrData = "Addressing Error 404. Address: " & Url & " is not reachable."
            Else
                WbRequest.sStrData = e.Message & vbCrLf & e.InnerException.ToString
            End If
        End Try

        If WbRequest.blRequestOK Then
            ' create a stream for the response.
            Dim receiveStream As Stream = response.GetResponseStream()
            Dim readStream As New StreamReader(receiveStream, Encoding.UTF8)
            WbRequest.blRequestOK = True
            WbRequest.iRequestStatus = WebRequestStatusBlock.cRequestSuccessful
            WbRequest.sStrData = readStream.ReadToEnd()
            b_rtn = extract_price(WbRequest.sStrData, price, stops, aircode, airname)
            readStream.Close()
        End If

        If b_rtn = False Then
            Dim body As String = "Failed to query the price for the link: " & Url
            Utilities.Instance().send_mail("Failed to query price for the link", body)
        End If

        response.Close()
        response = Nothing
        request = Nothing
        Return b_rtn
    End Function

    Private Function extract_price(ByRef strInput As String, ByRef price As String, ByRef stops As Integer, ByRef aircode As String, ByRef airname As String) As Boolean

        Try
            If String.IsNullOrEmpty(strInput) Then
                Return G_FAKE_PRICE
            End If
            Dim from_data As String = "generatedJSon += new String('"
            Dim joson_start_pos_data As Integer = strInput.IndexOf(from_data)
            Dim joson_block As String = strInput.Substring(joson_start_pos_data + from_data.Length, strInput.Length - joson_start_pos_data - from_data.Length)

            Dim dictionary_start_pos_data As Integer = joson_block.IndexOf("'")

            Dim Dictionary As String = joson_block.Substring(0, dictionary_start_pos_data)

            joson_block = joson_block.Substring(dictionary_start_pos_data + 1, joson_block.Length - dictionary_start_pos_data - 1)

            Dim data_start_pos_data As Integer = joson_block.IndexOf("'")

            joson_block = joson_block.Substring(data_start_pos_data + 1, joson_block.Length - data_start_pos_data - 1)
            Dim data_end_pos_data As Integer = joson_block.IndexOf("'")

            Dim Data As String = joson_block.Substring(0, data_end_pos_data)

            Dim str_temp As String
            str_temp = "\\\" & Chr(34)

            Data = Replace(Data, str_temp, "")
            Data = Replace(Data, "\", "")
            'Dim Data As String = String.Empty
            'Dim Dictionary As String = String.Empty

            Dim json_array_data As Newtonsoft.Json.JavaScriptArray = DirectCast(JavaScriptConvert.DeserializeObject(Data), JavaScriptArray)
            Dim json_array_dictionary As Newtonsoft.Json.JavaScriptObject = DirectCast(JavaScriptConvert.DeserializeObject(Dictionary), JavaScriptObject)
            'IList<searchArgs> li = new List<searchArgs>();
            Dim json_scriptObject_data As JavaScriptObject = DirectCast(json_array_data(0), JavaScriptObject)
            Dim lp_array_data As JavaScriptArray = DirectCast(json_scriptObject_data("lp"), JavaScriptArray)
            Dim lp_scriptObject_data As JavaScriptObject = DirectCast(lp_array_data(0), JavaScriptObject)

            Dim lt_array_data As JavaScriptArray = DirectCast(lp_scriptObject_data("lt"), JavaScriptArray)
            Dim lt_scriptObject_data As JavaScriptObject = DirectCast(lt_array_data(0), JavaScriptObject)

            Dim lr_array_data As JavaScriptArray = DirectCast(lt_scriptObject_data("lr"), JavaScriptArray)
            Dim lr_scriptObject_data As JavaScriptObject = DirectCast(lr_array_data(0), JavaScriptObject)

            price = lr_scriptObject_data("p").ToString()

            Dim lb_array_data As JavaScriptArray = DirectCast(lr_scriptObject_data("lb"), JavaScriptArray)
            '去
            Dim lb_scriptObject_0_data As JavaScriptObject = DirectCast(lb_array_data(0), JavaScriptObject)
            Dim le_array_0_data As JavaScriptArray = DirectCast(lb_scriptObject_0_data("le"), JavaScriptArray)
            Dim le_scriptObject_0_data As JavaScriptObject = DirectCast(le_array_0_data(0), JavaScriptObject)
            Dim ls_array_0_data As JavaScriptArray = DirectCast(le_scriptObject_0_data("ls"), JavaScriptArray)

            Dim stops_0 As Integer = ls_array_0_data.Count - 1
            stops = stops_0

            Dim bei_0 As Integer = Convert.ToInt32(le_scriptObject_0_data("bei").ToString())

            'JavaScriptObject json_scriptObject_dictionary = (JavaScriptObject)json_array_dictionary[0];
            Dim lb_array_dictionary As JavaScriptArray = DirectCast(json_array_dictionary("lb"), JavaScriptArray)



            Dim lb_scriptObject_dictionary As JavaScriptObject = DirectCast(lb_array_dictionary(0), JavaScriptObject)
            Dim le_array_dictionary As JavaScriptArray = DirectCast(lb_scriptObject_dictionary("le"), JavaScriptArray)

            Dim le_scriptObject_dictionary As JavaScriptObject = DirectCast(le_array_dictionary(bei_0), JavaScriptObject)
            Dim ls_array_dictionary As JavaScriptArray = DirectCast(le_scriptObject_dictionary("ls"), JavaScriptArray)

            Dim ls_scriptObject_dictionary As JavaScriptObject = DirectCast(ls_array_dictionary(0), JavaScriptObject)
            Dim cai As Integer = Convert.ToInt32(ls_scriptObject_dictionary("cai").ToString())

            Dim lcr_array_dictionary As JavaScriptArray = DirectCast(json_array_dictionary("lcr"), JavaScriptArray)
            Dim lcr_scriptObject_dictionary As JavaScriptObject = DirectCast(lcr_array_dictionary(cai), JavaScriptObject)
            Dim si As Integer = Convert.ToInt32(lcr_scriptObject_dictionary("si"))

            Dim lsu_array_dictionary As JavaScriptArray = DirectCast(json_array_dictionary("lsu"), JavaScriptArray)
            Dim lsu_scriptObject_dictionary As JavaScriptObject = DirectCast(lsu_array_dictionary(si), JavaScriptObject)

            Dim code As String = lsu_scriptObject_dictionary("c").ToString()
            Dim name As String = lsu_scriptObject_dictionary("n").ToString()

            aircode = code
            airname = name

        Catch ex As Exception
            Return False
        End Try
        Return True
    End Function

    Private Sub add_data_to_listview(ByVal id As String, ByVal depaturedate As String, ByVal returndate As String, _
                                  ByVal price As Double, ByVal departurecity As String, ByVal destinationcity As String, _
                                  ByVal urllink As String)
        Dim iItem As New ListViewItem
        iItem.Text = id
        iItem.SubItems.Add(depaturedate)
        iItem.SubItems.Add(returndate)
        iItem.SubItems.Add(price)
        iItem.SubItems.Add(departurecity)
        iItem.SubItems.Add(destinationcity)
        iItem.SubItems.Add(urllink)
        ResultListView.Items.Add(iItem)

    End Sub

    Private Sub GotoBrowserToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles GotoBrowserToolStripMenuItem.Click

        Dim selectString As String = String.Empty
        Dim lsvRow As ListViewItem
        lsvRow = ResultListView.SelectedItems(0)
        selectString = lsvRow.SubItems(6).Text.Trim
        TabContainer.SelectedTab = TabWebBrowser
        Cursor.Current = Cursors.WaitCursor
        WebBrowser.Navigate(selectString)
        Cursor.Current = Cursors.Default
    End Sub

#End Region

#Region "Schedule to run"
    Private Sub Clock_Elapsed(ByVal sender As System.Object, ByVal e As System.Timers.ElapsedEventArgs) Handles Clock.Elapsed
        TimeStatusBar.Text = Now
        Dim tempdate = Now
        If (tempdate.Hour = 0 And tempdate.Minute = 0 And tempdate.Second = 0 And download_flag = True) Then

            CreateSchedule()
        End If
    End Sub

    Private stopped_flag As Boolean
    Private Sub Timer_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Timer.Tick


        'Try
        '    If running_cycle_track < 1 Then
        '        Me.cmdStart.Enabled = True
        '        Me.cmdStop.Enabled = False
        '        Me.Timer.Enabled = False
        '        Return
        '    End If

        '    '** Execute next task only if program has not been stopped
        '    If stopped_flag = False Then
        '        'disable timer while executing tasks in order to stop time
        '        Me.Timer.Enabled = False
        '        'execute tasks
        '        query_aie_data()
        '        If stopped_flag = False Then
        '            'enable timer so can continue ticking
        '            Me.Timer.Enabled = True
        '        Else
        '            Me.Timer.Stop() 'ensure timer will stop
        '        End If
        '        running_cycle_track = running_cycle_track - 1
        '        Me.RunCycleTextBox.Text = running_cycle_track.ToString
        '    End If
        'Catch ex As Exception

        'Finally
        '    'if error occured, need to reset the timer to be true, else the program will stopped.
        '    '** Enable timer so can continue ticking
        '    If running_cycle_track > 0 Then
        '        Me.Timer.Enabled = True
        '        Me.Timer.Start()
        '    End If

        'End Try
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Schedule_Create.Click
        Try
            Schedule_Create.Enabled = False

            '*******Checkpoints*******
            '1. check the departure date is 3 days later from today
            '2. check the departure date is from tuesday or thursday
            '3. check the departure city is not in destination city list
            '4. check the day span and day cycle are digit
            '*******Checkpoints*******

            'checkpoint---1
            Dim departure_date_from As Date
            departure_date_from = Convert.ToDateTime(DepartureDatePicker.Text.Trim())
            Dim valid_day_off As Integer = DateDiff(DateInterval.Day, Now.Date, departure_date_from)
            If valid_day_off < 3 Then
                MsgBox("Please choose the departure date more than " & 3 & " days!", MsgBoxStyle.Exclamation, "Warning")
                Return
            End If
            Dim dayspan As Integer
            Dim departure_date_to As Date

            departure_date_from = Convert.ToDateTime(DepartureDatePicker.Text.Trim())
            dayspan = Convert.ToInt32(DaySpanTextBox.Text.Trim)
            departure_date_to = departure_date_from.AddDays(dayspan)

            While DateDiff(DateInterval.Day, departure_date_from, departure_date_to) >= 0

                'MsgBox(departure_date_from.ToString)

                Dim departure_dow As Integer = departure_date_from.DayOfWeek()
                If departure_dow = DayOfWeek.Monday OrElse departure_dow = DayOfWeek.Tuesday OrElse departure_dow = DayOfWeek.Wednesday OrElse departure_dow = DayOfWeek.Thursday Then
                    Dim cityds As New DataSet
                    strSQL = " SELECT DepartureCode, DestinationCode FROM aie_citypair "
                    cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
                    If Not cityds.Tables("CityPair") Is Nothing Then
                        For Each objDR As DataRow In cityds.Tables("CityPair").Rows
                            'objDR(0).ToString.Trim
                            If String.Empty.Equals(Return_cycle_type) Then
                                Return
                            End If
                            Dim return_cycle_types() As String
                            return_cycle_types = Return_cycle_type.Split("|")
                            For n As Integer = 0 To return_cycle_types.Length - 1
                                'check if these data existing in scheduling_data table
                                strSQL = "SELECT id FROM AIE_SCHEDULING_DATA WHERE departure_date='" & departure_date_from.ToString("yyyy-MM-dd") & "' AND departure_city='" & _
                                          objDR(0).ToString.Trim & "' AND day_cycle=" & return_cycle_types(n) & " AND destination_city ='" & objDR(1).ToString.Trim & "' "
                                Dim check_dataset As New DataSet
                                check_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
                                If Not check_dataset Is Nothing Then
                                    If check_dataset.Tables("scheduling_data").Rows.Count <= 0 Then
                                        strSQL = "INSERT INTO AIE_SCHEDULING_DATA(departure_date,departure_city,destination_city,day_cycle,status) VALUES('" & _
                                departure_date_from.ToString("yyyy-MM-dd") & "','" & objDR(0).ToString.Trim & "','" & objDR(1).ToString.Trim & "'," & return_cycle_types(n).ToString & ",'" & ST_not_start & "')"
                                        If Not SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
                                            MsgBox("Insert the scheduling data in table unsuccessfully!", MsgBoxStyle.Exclamation, "Warning")
                                            Return
                                        End If
                                    End If
                                End If
                            Next
                        Next
                    End If
                End If
                departure_date_from = departure_date_from.AddDays(1)
            End While

            'disable_controls()
            'cmdStart.Enabled = False
            'cmdStop.Enabled = True
            'stopped_flag = False
            'Me.Timer.Enabled = True
            'Me.Timer.Start()
            Me.SchedulingStatusBar.Text = "Application is waiting for running based on timer interval."
        Catch ex As Exception
            MsgBox("Button1_Click" + ex.Message, MsgBoxStyle.Exclamation, "Exception")
            Schedule_Create.Enabled = True
        End Try
        Schedule_Create.Enabled = True
    End Sub

    Private Sub StartButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdStart.Click
        'if already exit the departure city configuration in scheduling_data table, then do it first
        'add the initial data into scheduling data table
        'enable the timer to tick
        'Dim check_dataset As DataSet
        disable_controls()
        cmdStart.Enabled = False
        cmdStop.Enabled = True
        stopped_flag = False
        'Me.Timer.Enabled = True
        'Me.Timer.Start()
        'query_aie_data()

        'Return

        queue_schedule.Clear()
        Dim verify_dataset As DataSet
        'strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id,undone FROM aie_scheduling_data WHERE undone='False'"
        strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id,undone FROM aie_scheduling_data WHERE undone='False' and to_days(date_add(aie_scheduling_data.departure_date,interval day_cycle day)) < to_days(date_add(NOW(),INTERVAL 10 month)) and to_days(aie_scheduling_data.departure_date) > to_days(date_add(NOW(),INTERVAL 7 day)) ORDER BY departure_date ASC"
        verify_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
        If Not verify_dataset.Tables("scheduling_data") Is Nothing Then
            For Each objDR As DataRow In verify_dataset.Tables("scheduling_data").Rows
                Dim aie_scheduling_data_modle As aie_scheduling_data = New aie_scheduling_data()

                If objDR("ID") IsNot Nothing AndAlso objDR("ID").ToString() <> "" Then
                    aie_scheduling_data_modle.ID = Integer.Parse(objDR("ID").ToString())
                End If
                If objDR("departure_date") IsNot Nothing AndAlso objDR("departure_date").ToString() <> "" Then
                    aie_scheduling_data_modle.departure_date = DateTime.Parse(objDR("departure_date").ToString())
                End If
                If objDR("departure_city") IsNot Nothing AndAlso objDR("departure_city").ToString() <> "" Then
                    aie_scheduling_data_modle.departure_city = objDR("departure_city").ToString()
                End If
                If objDR("destination_city") IsNot Nothing AndAlso objDR("destination_city").ToString() <> "" Then
                    aie_scheduling_data_modle.destination_city = objDR("destination_city").ToString()
                End If
                If objDR("day_cycle") IsNot Nothing AndAlso objDR("day_cycle").ToString() <> "" Then
                    aie_scheduling_data_modle.day_cycle = Integer.Parse(objDR("day_cycle").ToString())
                End If
                If objDR("status") IsNot Nothing AndAlso objDR("status").ToString() <> "" Then
                    aie_scheduling_data_modle.status = objDR("status").ToString()
                End If
                If objDR("exception_id") IsNot Nothing AndAlso objDR("exception_id").ToString() <> "" Then
                    aie_scheduling_data_modle.exception_id = Integer.Parse(objDR("exception_id").ToString())
                End If
                If objDR("undone") IsNot Nothing AndAlso objDR("undone").ToString() <> "" Then
                    aie_scheduling_data_modle.undone = objDR("undone").ToString()
                End If
                queue_schedule.Enqueue(aie_scheduling_data_modle)
            Next
        End If
        download_flag = True
        For i As Integer = 0 To thStepCount - 1
            Download_Thread(i) = New Thread(AddressOf donwload_aie_data)
            Download_Thread(i).Name = i.ToString()
            Download_Thread(i).Start()
        Next

        Me.TotalTimeStatusBar.Text = ""
        Me.SchedulingStatusBar.Text = "Job is in process..."

        'Try
        '    If Me.RunCycleTextBox.Text.Trim = "0" Then
        '        Me.RunCycleTextBox.Text = Running_Cycle.ToString
        '    End If

        '    Me.Text = Me.Text.Substring(0, 9) & " City:" & DepartureComboBox.Text
        '    cmdStop.Enabled = False
        '    Me.Timer.Stop()
        '    Me.SchedulingStatusBar.Text = ""

        '    Dim departure_city, departure_date_from_table As String
        '    departure_city = DepartureComboBox.Text.Trim

        '    Dim day_span, day_cycle As Integer

        '    strSQL = "SELECT id,date_format(departure_date,'%Y-%m-%d') as departure_date_format,day_span,day_cycle,status FROM aie_scheduling_data WHERE departure_city='" & departure_city & "' AND day_cycle=" & Me.ReturnCycleComboBox.Text.Trim & " AND status='" & ST_not_start & "' AND undone='False' ORDER BY id desc"

        '    check_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_job", sqlcon)
        '    If Not check_dataset.Tables("scheduling_job") Is Nothing Then
        '        If check_dataset.Tables("scheduling_job").Rows.Count = 1 Then
        '            MsgBox("Exist job in scheduling table,run the job first", MsgBoxStyle.Exclamation, "Information")
        '            day_span = Convert.ToInt32(check_dataset.Tables("scheduling_job").Rows(0).Item("day_span").ToString().Trim)
        '            departure_date_from_table = check_dataset.Tables("scheduling_job").Rows(0).Item("departure_date_format").ToString().Trim
        '            day_cycle = Convert.ToInt32(check_dataset.Tables("scheduling_job").Rows(0).Item("day_cycle").ToString().Trim)

        '            'assign value to controls
        '            Me.DepartureDatePicker.Value = departure_date_from_table
        '            Me.DaySpanTextBox.Text = day_span
        '            Me.DestinationComboBox.SelectedIndex = 0
        '            Me.ReturnCycleComboBox.SelectedIndex = Me.ReturnCycleComboBox.FindString(day_cycle.ToString)

        '            disable_controls()
        '            cmdStart.Enabled = False
        '            cmdStop.Enabled = True
        '            stopped_flag = False
        '            Me.Timer.Enabled = True
        '            Me.Timer.Start()
        '            Me.SchedulingStatusBar.Text = "Application is waiting form timer interval to run the existing job by backend."
        '            Return
        '        End If
        '    End If

        '    '*******Checkpoints*******
        '    '1. check the departure date is 3 days later from today
        '    '2. check the departure date is from tuesday or thursday
        '    '3. check the departure city is not in destination city list
        '    '4. check the day span and day cycle are digit
        '    '*******Checkpoints*******

        '    'checkpoint---1
        '    Dim departure_date_from As Date
        '    departure_date_from = Convert.ToDateTime(DepartureDatePicker.Text.Trim())
        '    Dim valid_day_off As Integer = DateDiff(DateInterval.Day, Now.Date, departure_date_from)
        '    If valid_day_off < valid_day_off Then
        '        MsgBox("Please choose the departure date more than " & valid_day_off & " days!", MsgBoxStyle.Exclamation, "Warning")
        '        Return
        '    End If

        '    'checkpoint---2
        '    Dim departure_dow As Integer = departure_date_from.DayOfWeek()
        '    Dim departure_dow_flag As Boolean = False
        '    If departure_dow = DayOfWeek.Tuesday OrElse departure_dow = DayOfWeek.Thursday Then
        '        departure_dow_flag = True
        '    End If
        '    If departure_dow_flag = False Then
        '        MsgBox("Please select the departure date for tuesday or thursday", MsgBoxStyle.Exclamation, "Warning")
        '        DepartureDatePicker.Focus()
        '        Return
        '    End If

        '    'checkpoint---3
        '    If DestinationComboBox.Items.Contains(departure_city) Then
        '        MsgBox("Destination city list contains departure city, not allowed!", MsgBoxStyle.Exclamation, "Warning")
        '        DepartureComboBox.Focus()
        '        Return
        '    End If

        '    'checkpoint---4
        '    If String.Empty.Equals(Me.DaySpanTextBox.Text.Trim) Then
        '        MsgBox("Please input integer into day span and return cycle textbox!", MsgBoxStyle.Exclamation, "Warning")
        '        Return
        '    End If
        '    day_span = Convert.ToInt32(Me.DaySpanTextBox.Text.Trim)
        '    day_cycle = Convert.ToInt32(Me.ReturnCycleComboBox.Text.Trim)

        '    'check if these data existing in scheduling_data table
        '    strSQL = "SELECT id FROM AIE_SCHEDULING_DATA WHERE departure_date='" & departure_date_from.ToString("yyyy-MM-dd") & "' AND departure_city='" & _
        '              departure_city & "' AND day_cycle=" & day_cycle.ToString & " AND status<>'" & ST_ok & "' AND undone='False'"

        '    check_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
        '    If Not check_dataset Is Nothing Then
        '        If check_dataset.Tables("scheduling_data").Rows.Count = 1 Then
        '            MsgBox("Already exist the scheduling data in table!", MsgBoxStyle.Exclamation, "Warning")
        '            Return
        '        End If
        '    End If

        '    strSQL = "INSERT INTO AIE_SCHEDULING_DATA(departure_date,day_span,departure_city,day_cycle,status) VALUES('" & _
        '    departure_date_from.ToString("yyyy-MM-dd") & "'," & day_span.ToString & ",'" & departure_city & "'," & day_cycle.ToString & ",'" & ST_not_start & "')"
        '    If Not SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
        '        MsgBox("Insert the scheduling data in table unsuccessfully!", MsgBoxStyle.Exclamation, "Warning")
        '        Return
        '    Else
        '        disable_controls()
        '        cmdStart.Enabled = False
        '        cmdStop.Enabled = True
        '        stopped_flag = False
        '        Me.Timer.Enabled = True
        '        Me.Timer.Start()
        '        Me.SchedulingStatusBar.Text = "Application is waiting for running based on timer interval."
        '    End If
        'Catch ex As Exception
        '    MsgBox(ex.Message, MsgBoxStyle.Exclamation, "Exception")
        'End Try
    End Sub

    Private Sub StopButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdStop.Click
        stopped_flag = True
        Me.Timer.Stop()
        Me.cmdStop.Enabled = False
        Me.cmdStart.Enabled = True
        download_flag = False
        For i As Integer = 0 To thStepCount - 1
            Download_Thread(i).Abort()
        Next
        enable_controls()
        Me.SchedulingStatusBar.Text = "Application stopped, click start button to run!"
    End Sub

#End Region

    Private Sub SyncButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SyncButton.Click
        strSQL = "SELECT item,item_key,int_value,string_value FROM AIE_CONFIGURATION WHERE undone='False'"
        Dim check_dataset As DataSet = SqlHelper.Instance().ExecuteQuery(strSQL, "timeinterval", sqlcon)
        If Not check_dataset.Tables("timeinterval") Is Nothing Then
            If check_dataset.Tables("timeinterval").Rows.Count > 0 Then
                Minutes = Convert.ToInt32(check_dataset.Tables("timeinterval").Select("item ='minutes'")(0).Item("int_value").ToString().Trim())
                Seconds = Convert.ToInt32(check_dataset.Tables("timeinterval").Select("item ='seconds'")(0).Item("int_value").ToString().Trim())
                'assign value to controls
                Me.MinutesTextBox.Text = Format(Minutes, "00")
                Me.SecondsTextBox.Text = Format(Seconds, "00")
                Me.Timer.Interval = ((Minutes * 60) + Seconds) * 1000
            End If
        End If
    End Sub

#Region "Menu"

    Private Sub CityConfigurationToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityConfigurationToolStripMenuItem.Click
        Dim cityConfig As FrmCityConfigure = New FrmCityConfigure
        cityConfig.ShowDialog()
    End Sub

    Private Sub DateMatrixToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DateMatrixToolStripMenuItem.Click
        Dim dateMatrixConfig As FrmDateMatrix = New FrmDateMatrix
        dateMatrixConfig.ShowDialog()
    End Sub

    Private Sub AIEToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AIEToolStripMenuItem.Click
        Dim aieQuery As FrmQuery = New FrmQuery
        aieQuery.ShowDialog()
    End Sub

    Private Sub SettingsToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SettingsToolStripMenuItem.Click
        Dim schedulingConfig As FrmSettings = New FrmSettings
        schedulingConfig.ShowDialog()
    End Sub

    Private Sub AboutToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AboutToolStripMenuItem.Click
        Dim aboutdialog As FrmAbout = New FrmAbout
        aboutdialog.ShowDialog()
    End Sub

    Private Sub SchedulingToolStripMenuItem1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SchedulingToolStripMenuItem.Click
        Dim scheduling As FrmScheduling = New FrmScheduling
        scheduling.ShowDialog()
    End Sub

    Private Sub HandleExceptionToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles HandleExceptionToolStripMenuItem.Click
        Dim exceptionhandling As FrmException = New FrmException
        exceptionhandling.ShowDialog()
    End Sub

    Private Sub DatabaseSettingToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DatabaseSettingToolStripMenuItem.Click
        Dim dbsetting As FrmDB = New FrmDB
        dbsetting.ShowDialog()
    End Sub
#End Region

    Private Sub CreateSchedule()
        Schedule_Create.Enabled = False
        Try
            '*******Checkpoints*******
            '1. check the departure date is 3 days later from today
            '2. check the departure date is from tuesday or thursday
            '3. check the departure city is not in destination city list
            '4. check the day span and day cycle are digit
            '*******Checkpoints*******

            'checkpoint---1
            Dim departure_date_from As Date = Date.Today.AddMonths(10)

            'departure_date_from = Convert.ToDateTime(DepartureDatePicker.Text.Trim())
            Dim valid_day_off As Integer = DateDiff(DateInterval.Day, Now.Date, departure_date_from)
            'If valid_day_off < 3 Then
            'MsgBox("Please choose the departure date more than " & 3 & " days!", MsgBoxStyle.Exclamation, "Warning")
            'Return
            'End If
            Dim dayspan As Integer
            Dim departure_date_to As Date

            departure_date_from = Convert.ToDateTime(DepartureDatePicker.Text.Trim())
            dayspan = Convert.ToInt32(DaySpanTextBox.Text.Trim)
            departure_date_to = departure_date_from.AddDays(dayspan)

            'While DateDiff(DateInterval.Day, departure_date_from, departure_date_to) >= 0

            'MsgBox(departure_date_from.ToString)

            Dim departure_dow As Integer = departure_date_from.DayOfWeek()
            If departure_dow = DayOfWeek.Monday OrElse departure_dow = DayOfWeek.Tuesday OrElse departure_dow = DayOfWeek.Wednesday OrElse departure_dow = DayOfWeek.Thursday Then
                Dim cityds As New DataSet
                strSQL = " SELECT DepartureCode, DestinationCode FROM aie_citypair "
                cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
                If Not cityds.Tables("CityPair") Is Nothing Then
                    For Each objDR As DataRow In cityds.Tables("CityPair").Rows
                        'objDR(0).ToString.Trim
                        If String.Empty.Equals(Return_cycle_type) Then
                            Return
                        End If
                        Dim return_cycle_types() As String
                        return_cycle_types = Return_cycle_type.Split("|")
                        For n As Integer = 0 To return_cycle_types.Length - 1
                            'check if these data existing in scheduling_data table
                            strSQL = "SELECT id FROM AIE_SCHEDULING_DATA WHERE departure_date='" & departure_date_from.ToString("yyyy-MM-dd") & "' AND departure_city='" & _
                                      objDR(0).ToString.Trim & "' AND day_cycle=" & return_cycle_types(n) & " AND destination_city ='" & objDR(1).ToString.Trim & "' "
                            Dim check_dataset As New DataSet
                            check_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
                            If Not check_dataset Is Nothing Then
                                If check_dataset.Tables("scheduling_data").Rows.Count <= 0 Then
                                    strSQL = "INSERT INTO AIE_SCHEDULING_DATA(departure_date,departure_city,destination_city,day_cycle,status) VALUES('" & _
                            departure_date_from.ToString("yyyy-MM-dd") & "','" & objDR(0).ToString.Trim & "','" & objDR(1).ToString.Trim & "'," & return_cycle_types(n).ToString & ",'" & ST_not_start & "')"
                                    If Not SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
                                        MsgBox("Insert the scheduling data in table unsuccessfully!", MsgBoxStyle.Exclamation, "Warning")
                                        Return
                                    End If
                                End If
                            End If
                        Next
                    Next
                End If
            End If
            Me.SchedulingStatusBar.Text = "Application is waiting for running based on timer interval."
            'departure_date_from = departure_date_from.AddDays(1)
            ' End While

            'disable_controls()
            'cmdStart.Enabled = False
            'cmdStop.Enabled = True
            'stopped_flag = False
            'Me.Timer.Enabled = True
            'Me.Timer.Start()
            queue_schedule.Clear()
            Dim verify_dataset As DataSet
            strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id,undone FROM aie_scheduling_data WHERE undone='False' and to_days(date_add(aie_scheduling_data.departure_date,interval day_cycle day)) < to_days(date_add(NOW(),INTERVAL 11 month)) and to_days(aie_scheduling_data.departure_date) > to_days(date_add(NOW(),INTERVAL 7 day)) ORDER BY departure_date ASC"
            'strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id FROM aie_scheduling_data WHERE undone='False' and to_days(date_add(aie_scheduling_data.departure_date,interval day_cycle day)) < to_days(date_add(NOW(),INTERVAL 11 month)) and to_days(aie_scheduling_data.departure_date) > to_days(date_add(NOW(),INTERVAL 7 day)) ORDER BY departure_date ASC"
            verify_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
            If Not verify_dataset.Tables("scheduling_data") Is Nothing Then
                For Each objDR As DataRow In verify_dataset.Tables("scheduling_data").Rows
                    Dim aie_scheduling_data_modle As aie_scheduling_data = New aie_scheduling_data()

                    If objDR("ID") IsNot Nothing AndAlso objDR("ID").ToString() <> "" Then
                        aie_scheduling_data_modle.ID = Integer.Parse(objDR("ID").ToString())
                    End If
                    If objDR("departure_date") IsNot Nothing AndAlso objDR("departure_date").ToString() <> "" Then
                        aie_scheduling_data_modle.departure_date = DateTime.Parse(objDR("departure_date").ToString())
                    End If
                    If objDR("departure_city") IsNot Nothing AndAlso objDR("departure_city").ToString() <> "" Then
                        aie_scheduling_data_modle.departure_city = objDR("departure_city").ToString()
                    End If
                    If objDR("destination_city") IsNot Nothing AndAlso objDR("destination_city").ToString() <> "" Then
                        aie_scheduling_data_modle.destination_city = objDR("destination_city").ToString()
                    End If
                    If objDR("day_cycle") IsNot Nothing AndAlso objDR("day_cycle").ToString() <> "" Then
                        aie_scheduling_data_modle.day_cycle = Integer.Parse(objDR("day_cycle").ToString())
                    End If
                    If objDR("status") IsNot Nothing AndAlso objDR("status").ToString() <> "" Then
                        aie_scheduling_data_modle.status = objDR("status").ToString()
                    End If
                    If objDR("exception_id") IsNot Nothing AndAlso objDR("exception_id").ToString() <> "" Then
                        aie_scheduling_data_modle.exception_id = Integer.Parse(objDR("exception_id").ToString())
                    End If
                    If objDR("undone") IsNot Nothing AndAlso objDR("undone").ToString() <> "" Then
                        aie_scheduling_data_modle.undone = objDR("undone").ToString()
                    End If
                    queue_schedule.Enqueue(aie_scheduling_data_modle)
                Next
            End If
            download_flag = True
            For i As Integer = 0 To thStepCount - 1
                Download_Thread(i) = New Thread(AddressOf donwload_aie_data)
                Download_Thread(i).Name = i.ToString()
                Download_Thread(i).Start()
            Next

            Me.TotalTimeStatusBar.Text = ""
            Me.SchedulingStatusBar.Text = "Job is in process..."




        Catch ex As Exception
            MsgBox("CreateSchedule" + ex.Message, MsgBoxStyle.Exclamation, "Exception")
            Schedule_Create.Enabled = True
        End Try
        Schedule_Create.Enabled = True

    End Sub

    Private Sub FrmMain_QueryContinueDrag(ByVal sender As Object, ByVal e As System.Windows.Forms.QueryContinueDragEventArgs) Handles Me.QueryContinueDrag

    End Sub

    Private Sub Button1_Click_1(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Dim query_flag As Boolean

        Dim departure_date_from As Date
        Dim departure_date_to As Date

        Dim scheduling_data_id, exception_id As Integer

        Dim departure_date As String
        Dim return_date As String

        Dim sql_departure_date As String
        Dim sql_return_date As String


        Dim departure_city As String = DepartureComboBox.Text.Trim
        Dim destination_city As String = DestinationComboBox.Text.Trim

        Dim all_start_time As DateTime
        Dim each_start_time As DateTime
        Dim gross_time As Double
        Dim individual_time As Long

        Dim url_builder As New System.Text.StringBuilder
        Dim base_url_length As Integer

        Dim external_return_date As Date
        Dim final_return_date As Date

        Dim individual_city As String = String.Empty
        Dim id As Integer = 1

        'Dim price As String
        Dim body As String

        Dim conn As MySqlConnection = Nothing
        Dim verify_dataset As DataSet
        Dim aie_masterdata_dataset As DataSet

        Try
            query_flag = False
            Me.TotalTimeStatusBar.Text = ""
            Me.SchedulingStatusBar.Text = "Job is in process..."
            'After complete the date validation, we start to connect the database.
            conn = SqlHelper.Instance().EstablishConnection()

            '*****Checkpoint for data in table*****
            '1.check if valid data in aie_scheduling_data

            '***status: not_start, in_progress, ok
            '***undone: false, true(discard record)
            strSQL = "SELECT id,departure_date,departure_city,destination_city,day_cycle,status,exception_id FROM aie_scheduling_data WHERE undone='True'"

            'Dim scheduling_status As String

            Dim id_t As Integer = 0

            Dim scheduling_exception_flag As Boolean
            verify_dataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", conn)
            If Not verify_dataset.Tables("scheduling_data") Is Nothing Then
                For Each objDR As DataRow In verify_dataset.Tables("scheduling_data").Rows

                    Try
                        'Compose the AIE base URL
                        departure_date_from = Convert.ToDateTime(objDR(1).ToString().Trim())
                        departure_date_to = departure_date_from.AddDays(Convert.ToInt32(objDR(4).ToString().Trim()))

                        Dim strSQL_builder As New System.Text.StringBuilder
                        strSQL_builder.Append(" SELECT * ")
                        strSQL_builder.Append(" FROM ")
                        strSQL_builder.Append(" aie_masterdata ")
                        strSQL_builder.Append(" where DepartureDate = '" & departure_date_from.ToString("yyyy-MM-dd").Trim() & "' ")
                        strSQL_builder.Append(" and   DepartureCity = '" & objDR(2).ToString().Trim() & "' ")
                        strSQL_builder.Append(" and   ReturnDate = '" & departure_date_to.ToString("yyyy-MM-dd").Trim() & "' ")
                        strSQL_builder.Append(" and   ArrivalCity = '" & objDR(3).ToString().Trim() & "' ")

                        aie_masterdata_dataset = SqlHelper.Instance().ExecuteQuery(strSQL_builder.ToString, "aie_masterdata", conn)

                        If Not aie_masterdata_dataset.Tables("aie_masterdata") Is Nothing Then
                            If aie_masterdata_dataset.Tables("aie_masterdata").Rows.Count <= 0 Then
                                '***update the scheduling status****
                                strSQL = "UPDATE aie_scheduling_data SET undone='False' WHERE ID=" & objDR(0).ToString().Trim()
                                SqlHelper.Instance().ExecuteNoneQuery(strSQL, conn)
                            End If
                        End If
                        id_t = id_t + 1
                        Me.SchedulingStatusBar.Text = id_t.ToString & verify_dataset.Tables("scheduling_data").Rows.Count


                        

                    Catch ex As Exception

                    End Try

                Next
            End If
        Finally
            If Not conn Is Nothing Then
                If sqlcon.State = ConnectionState.Open Or sqlcon.State = ConnectionState.Broken Then
                    sqlcon.Close()
                End If
            End If
        End Try

    End Sub
End Class
