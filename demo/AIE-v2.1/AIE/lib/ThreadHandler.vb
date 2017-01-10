Imports System.IO
Imports System.Net
Imports System.Text
Imports System.Threading
Imports MySql.Data.MySqlClient
Imports System.Text.RegularExpressions

Public Class ThreadHandler

    Const baseUrl As String = "http://wftc1.e-travel.com/AIEADBLADBL/TravelShopperAvailability.action?"
    Const cycleDays As Integer = 4 'Loop for the return days :220

    '****Create the customized thread accounts*****
    Private DateGroup As ArrayList

    Public Sub ThreadRun()
        '***Read the thread account*****
        Dim threadCount As Integer = CInt(HandleXML.Instance().ReadNodeText("Location.xml", "AIE/Thread"))
        Dim threadArray As New ArrayList
        For i As Integer = 0 To threadCount - 1
            'TODO
        Next
        Dim th As Thread
        th = New Thread(New ThreadStart(AddressOf SearchData))
        th.Start()

    End Sub

    '*****Multi-thread********
    Private Sub SearchData()
        Try
            Dim price As String
            Dim returnDate As String
            Dim departureDate As String
            Dim sqlDepartureDate As String
            Dim sqlReturnDate As String
            Dim startAllTime As DateTime
            Dim startTime As DateTime
            Dim grossTime As Long
            Dim individualTime As Long
            Dim urlBuilder As New System.Text.StringBuilder
            Dim baseWebLinkLength As Integer

            Dim conn As MySqlConnection = SqlHelper.Instance().EstablishConnection()
            Dim baseSQL As String = "INSERT INTO AIE_MasterData(DepartureDate,ReturnDate,DepartureCity,ArrivalCity,Price,WebLink) VALUES('"

            departureDate = Date.Now.AddDays(Valid_Day_Off).ToString("yyyyMMdd") & "0000"
            sqlDepartureDate = Date.Now.AddDays(Valid_Day_Off).ToString("yyyy-MM-dd")
            urlBuilder.Append(baseUrl)
            urlBuilder.Append("&SITE=BBUXBBUX&LANGUAGE=GB&TRIPFLOW=YES")
            urlBuilder.Append("&TRIP_TYPE=R")
            urlBuilder.Append("&B_LOCATION_1=BJS")
            urlBuilder.Append("&B_DATE_1=" & departureDate)
            urlBuilder.Append("&B_ANY_TIME_1=TRUE")
            urlBuilder.Append("&E_LOCATION_1=NYC")
            '*****************************************
            urlBuilder.Append("&B_ANY_TIME_2=TRUE")
            urlBuilder.Append("&CABIN=E")
            urlBuilder.Append("&TRAVELLER_TYPE_1=ADT")
            urlBuilder.Append("&WORKFLOW_NAME=RGSIMPLE")
            urlBuilder.Append("&PRODUCT_TYPE_1=STANDARD_AIR")
            urlBuilder.Append("&B_DATE_2=")
            baseWebLinkLength = urlBuilder.ToString.Length
            startAllTime = DateTime.Now
            For i As Integer = 1 To cycleDays
                startTime = DateTime.Now
                returnDate = Date.Now.AddDays(Valid_Day_Off + i).ToString("yyyyMMdd") & "0000"
                sqlReturnDate = Date.Now.AddDays(Valid_Day_Off + i).ToString("yyyy-MM-dd").Trim
                urlBuilder.Append(returnDate)
                price = WbRequestResponse(urlBuilder.ToString)
                individualTime = DateDiff(DateInterval.Second, startTime, DateTime.Now)
                SqlHelper.Instance().ExecuteNoneQuery(baseSQL & sqlDepartureDate & "','" & sqlReturnDate & "','BJS'" & ",'NYC'" & "," & price & ",'" & urlBuilder.ToString & "')", conn)
                urlBuilder.Remove(baseWebLinkLength, returnDate.Length)
            Next
            grossTime = DateDiff(DateInterval.Second, startAllTime, DateTime.Now)
        Catch ex As Exception
            MessageBox.Show("SearchData" + ex.Message)
        End Try
    End Sub


    '******Read data from response of web******
    Private Structure WebRequestStatusBlock
        Public blRequestOK As Boolean
        Public iRequestStatus As Integer
        Public sStrData As String
        Public Const cRequestSuccessful = 1
    End Structure

    Private Function WbRequestResponse(ByVal Url As String, Optional ByVal Credential As System.Net.NetworkCredential = Nothing) As String
        Dim WbRequest As WebRequestStatusBlock = Nothing
        Dim price As String = "Error"
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
            price = CustomSpecialCheck(WbRequest.sStrData)
            readStream.Close()
        End If

        response.Close()
        response = Nothing
        request = Nothing
        Return price
    End Function

    ''' <summary>
    ''' Find Low Price For The Flighter
    ''' </summary>
    ''' <param name="strInput">httpresponse</param>
    ''' <returns>price</returns>
    ''' <remarks></remarks>
    Private Function CustomSpecialCheck(ByRef strInput As String) As String
        Dim strPatternSearchVal As String = "u20AC"
        Dim match As RegularExpressions.Match = Regex.Match(strInput, strPatternSearchVal)
        Dim startIndex As Integer = match.Index
        Dim strPrice As String = strInput.Substring(startIndex + 5, startIndex + 12)
        Dim strPricePart As String = strPrice.Split("\")(0).Trim.Replace(",", "")
        Return strPricePart
    End Function

End Class
