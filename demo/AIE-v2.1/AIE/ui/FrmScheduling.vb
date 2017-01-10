Public Class FrmScheduling

    Private schedulingdataset As DataSet
    Private strdeparturedate, strdeparturecity, strdestinationcity, strstatus As String
    Private strdepartureindays, strreturnindays, strexceptionid As Integer
    Private status_list() As String = {ST_not_start, ST_in_progress, ST_ok}

    Private Sub FrmScheduling_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.DepartureDatePicker.Format = DateTimePickerFormat.Custom
        Me.DepartureDatePicker.CustomFormat = "yyyy-MM-dd"
        Me.StatusComboBox.Items.AddRange(status_list)
        Me.StatusComboBox.SelectedIndex = 0

        RetrieveSchedulingData()
    End Sub
    Private Sub SchedulingListView_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SchedulingListView.Click
        strdeparturedate = SchedulingListView.SelectedItems(0).SubItems(1).Text.Trim
        strdestinationcity = SchedulingListView.SelectedItems(0).SubItems(3).Text.Trim
        strdeparturecity = SchedulingListView.SelectedItems(0).SubItems(2).Text.Trim
        strreturnindays = Convert.ToInt16(SchedulingListView.SelectedItems(0).SubItems(4).Text.Trim)
        strstatus = SchedulingListView.SelectedItems(0).SubItems(5).Text.Trim
        strexceptionid = Convert.ToInt32(SchedulingListView.SelectedItems(0).SubItems(6).Text.Trim)

        DepartureDatePicker.Value = strdeparturedate
        DestinationCityTextBox.Text = strdestinationcity
        DepartureCityTextBox.Text = strdeparturecity
        ReturnInDaysTextBox.Text = strreturnindays
        ExceptionIDTextBox.Text = strexceptionid

        Me.StatusComboBox.SelectedIndex = Me.StatusComboBox.Items.IndexOf(strstatus)
    End Sub


    Private Function RetrieveSchedulingData() As Boolean
        strSQL = "SELECT ID,date_format(departure_date,'%Y-%m-%d') as departure_date,departure_city," & _
                 "destination_city,day_cycle as return_in_days,status,exception_id,undone FROM aie_scheduling_data Order by ID"
        schedulingdataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling_data", sqlcon)
        Return Utilities.Instance.BuildListViewFromTable(SchedulingListView, False, "scheduling_data", schedulingdataset)
    End Function

    Private Sub AddButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddButton.Click

        Dim dow_flag As Boolean
        Dim departure_date As Date = Convert.ToDateTime(DepartureDatePicker.Text.Trim)
        If departure_date.DayOfWeek() = DayOfWeek.Thursday OrElse departure_date.DayOfWeek() = DayOfWeek.Tuesday Then
            dow_flag = True
        End If
        If dow_flag = False Then
            MsgBox("Please select the departure date in tuesday or thursday!", MsgBoxStyle.Exclamation, "Warning")
            Return
        End If

        strSQL = "SELECT ID FROM aie_scheduling_data WHERE departure_date='" & DepartureDatePicker.Text.Trim & "' AND departure_city='" & DepartureCityTextBox.Text.Trim & "' AND destination_city='" & DestinationCityTextBox.Text.Trim & "' AND day_cycle=" & ReturnInDaysTextBox.Text.Trim

        schedulingdataset = SqlHelper.Instance().ExecuteQuery(strSQL, "configuration", sqlcon)
        If schedulingdataset.Tables("configuration").Rows.Count > 0 Then
            MsgBox("The item already exists in table!", MsgBoxStyle.Information, "Warinig")
            Return
        Else
            strSQL = "INSERT INTO aie_scheduling_data(departure_date,destination_city,departure_city,day_cycle,status,exception_id)VALUES('" & _
            DepartureDatePicker.Text.Trim & "','" & DestinationCityTextBox.Text.Trim & "','" & DepartureCityTextBox.Text.Trim & "'," & _
            ReturnInDaysTextBox.Text.Trim & ",'" & StatusComboBox.Text & "'," & ExceptionIDTextBox.Text & ")"
        End If
        SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon)
        RetrieveSchedulingData()
        ClearTextBox()
    End Sub

    Private Sub ClearTextBox()

        DestinationCityTextBox.Text = ""
        DepartureCityTextBox.Text = ""
        ReturnInDaysTextBox.Text = ""
        ExceptionIDTextBox.Text = ""

    End Sub

    Private Sub UpdateButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles UpdateButton.Click
        If String.Empty.Equals(DepartureCityTextBox.Text.Trim) Then
            MessageBox.Show("No departure city value for update action!")
            Return
        End If

        If DepartureDatePicker.Text.Trim = strdeparturedate AndAlso DepartureCityTextBox.Text = strdeparturecity Then

            strSQL = "UPDATE aie_scheduling_data SET destination_city=" & DestinationCityTextBox.Text.Trim & ", day_cycle=" & _
                ReturnInDaysTextBox.Text.Trim & ", status='" & StatusComboBox.Text & "', exception_id=" & _
                ExceptionIDTextBox.Text.Trim & " WHERE departure_date='" & strdeparturedate & "' AND departure_city='" & strdeparturecity & "'"
            If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
                MessageBox.Show("Update the selected item successfully!")
            End If
            RetrieveSchedulingData()
            ClearTextBox()
        Else
            MessageBox.Show("No this departure date or city update!")
        End If
    End Sub

    Private Sub DeleteButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DeleteButton.Click
        If String.Empty.Equals(DepartureCityTextBox.Text.Trim) Then
            MessageBox.Show("No item selected for delete!")
            Return
        End If
        If Not DepartureCityTextBox.Text.Trim.Equals(strdeparturecity) Then
            MessageBox.Show("No item selected for delete!")
            Return
        End If

        If Not DepartureDatePicker.Text.Trim.Equals(strdeparturedate) Then
            MessageBox.Show("No item selected for delete!")
            Return
        End If
        strSQL = "DELETE FROM aie_scheduling_data WHERE departure_date='" & strdeparturedate & "' AND departure_city='" & strdeparturecity & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Delete the selected item successfully!")
        End If
        RetrieveSchedulingData()
        ClearTextBox()
    End Sub
End Class