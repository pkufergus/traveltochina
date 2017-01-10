Imports MySql.Data.MySqlClient

Module ModuleMain
    '***Public variants***
    Public objFrmMain As FrmMain
    Public sqlcon As MySqlConnection
    Public strSQL As String

    Public Const G_ALL_CITY As String = "ALL" 'this is for all destinations loop
    Public Const G_FAKE_PRICE As String = "10000"
    Public Const baseUrl As String = "http://wftc1.e-travel.com/AIEADBLADBL/TravelShopperAvailability.action?"

    Public Const baseSQL As String = "INSERT INTO AIE_MasterData(DepartureDate,ReturnDate,DepartureCity,ArrivalCity,Price,WebLink) VALUES('"

    Public Enum Numbers
        ONE = 1
        TWO = 2
        THREE = 3
        FOUR = 4
        FIVE = 5
        SEVEN = 7
        THIRTY = 30
        NINTY = 90
        HUNDREDEIGHTY = 180
        THREEHUNDRED = 300
    End Enum

    'An example for the query flight price(price from low to high)
    'http://wftc1.e-travel.com/AIEADBLADBL/TravelShopperAvailability.action?
    '&SITE=ADBLADBL&LANGUAGE=US&TRIPFLOW=YES&TRIP_TYPE=R
    '&B_LOCATION_1=BJS&B_DATE_1=201109300000&B_ANY_TIME_1=TRUE
    '&E_LOCATION_1=NYC&B_DATE_2=201110010000&B_ANY_TIME_2=TRUE&CABIN=E&TRAVELLER_TYPE_1=ADT
    '&WORKFLOW_NAME=RGSIMPLE&PRODUCT_TYPE_1=STANDARD_AIR

    Public Minutes, Seconds, Day_Span, Day_Cycle, Valid_Day_Off, Running_Cycle As Integer
    Public ST_not_start, ST_in_progress, ST_ok As String
    Public Return_cycle_type As String

    Public G_smtphost, G_mailsender, G_username, G_password, G_distributionlist As String
    '***Main Entry***
    Sub Main()
        Try
            Try
                sqlcon = SqlHelper.Instance().EstablishConnection()
            Catch ex As Exception
                Dim dbsetting As FrmDB = New FrmDB
                dbsetting.ShowDialog()
                End
            End Try
            strSQL = "SELECT item,item_key,int_value,string_value FROM AIE_CONFIGURATION WHERE undone='False'"

            Dim configurationDataSet As New DataSet
            configurationDataSet = SqlHelper.Instance().ExecuteQuery(strSQL, "configuration", sqlcon)
            If Not configurationDataSet.Tables("configuration") Is Nothing Then
                If configurationDataSet.Tables("configuration").Rows.Count > 0 Then
                    Minutes = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='minutes'")(0).Item("int_value").ToString().Trim())
                    Seconds = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='seconds'")(0).Item("int_value").ToString().Trim())
                    Day_Span = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='day_span'")(0).Item("int_value").ToString().Trim())
                    Day_Cycle = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='day_cycle'")(0).Item("int_value").ToString().Trim())
                    Valid_Day_Off = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='valid_day_off'")(0).Item("int_value").ToString().Trim())
                    Running_Cycle = Convert.ToInt32(configurationDataSet.Tables("configuration").Select("item ='running_cycle'")(0).Item("int_value").ToString().Trim())
                    '***scheduling status: not_start,in_progress,ok***
                    ST_not_start = configurationDataSet.Tables("configuration").Select("item ='status_not_start'")(0).Item("string_value").ToString().Trim()
                    ST_in_progress = configurationDataSet.Tables("configuration").Select("item ='status_in_progress'")(0).Item("string_value").ToString().Trim()
                    ST_ok = configurationDataSet.Tables("configuration").Select("item ='status_ok'")(0).Item("string_value").ToString().Trim()
                    '***mail setting***
                    G_smtphost = configurationDataSet.Tables("configuration").Select("item ='smtphost'")(0).Item("string_value").ToString().Trim()
                    G_mailsender = configurationDataSet.Tables("configuration").Select("item ='mailsender'")(0).Item("string_value").ToString().Trim()
                    G_username = configurationDataSet.Tables("configuration").Select("item ='mailuser'")(0).Item("string_value").ToString().Trim()
                    G_password = configurationDataSet.Tables("configuration").Select("item ='mailpassword'")(0).Item("string_value").ToString().Trim()
                    G_distributionlist = configurationDataSet.Tables("configuration").Select("item ='distributionlist'")(0).Item("string_value").ToString().Trim()

                    '*****used in return in days****
                    Return_cycle_type = configurationDataSet.Tables("configuration").Select("item ='return_cycle_type'")(0).Item("string_value").ToString().Trim()

                End If
            End If
            objFrmMain = New FrmMain
            Application.EnableVisualStyles()
            Application.Run(objFrmMain)
        Catch ex As Exception
            MessageBox.Show("Main" + ex.Message)
        Finally
            If Not sqlcon Is Nothing Then
                If sqlcon.State = ConnectionState.Open Or sqlcon.State = ConnectionState.Broken Then
                    sqlcon.Close()
                End If
                sqlcon.Dispose()
            End If
        End Try
    End Sub
End Module
