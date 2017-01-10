Imports System.Net
Imports System.IO
Imports System.Text

Public Class AccessWeb
    Private Shared aw_factory As AccessWeb = Nothing

    Private Sub New()
    End Sub

    Public Shared Function Instance() As AccessWeb
        If aw_factory Is Nothing Then
            aw_factory = New AccessWeb
        End If
        Return aw_factory
    End Function

    Private Structure WebRequestStatusBlock
        Public blRequestOK As Boolean
        Public iRequestStatus As Integer
        Public sStrData As String
        Public Const cRequestSuccessful = 1
    End Structure

    Public Function web_request_response(ByVal Url As String, Optional ByVal Credential As System.Net.NetworkCredential = Nothing) As String
        '***price =G_FAKE_PRICE means error
        Dim price As String = G_FAKE_PRICE
        Dim WbRequest As WebRequestStatusBlock

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
            price = extract_price(WbRequest.sStrData)
            readStream.Close()
        End If

        If price = G_FAKE_PRICE Then
            Dim body As String = "Failed to query the price for the link: " & Url
            Utilities.Instance().send_mail("Failed to query price for the link", body)
        End If

        response.Close()
        response = Nothing
        request = Nothing
        Return price
    End Function

    Private Function extract_price(ByRef strInput As String) As String
        '***price =G_FAKE_PRICE means that error, 
        Dim price As String

        Try
            If String.IsNullOrEmpty(strInput) Then
                Return G_FAKE_PRICE
            End If

            Dim joson_start_pos As Integer = strInput.IndexOf("generatedJSon = new String")
            Dim joson_end_pos As Integer = strInput.LastIndexOf("var jsonExpression = ""("" + generatedJSon + "")"";")

            Dim joson_block As String = strInput.Substring(joson_start_pos, joson_end_pos - joson_start_pos)
            Dim dollar_start_pos As Integer = joson_block.IndexOf("\""$")
            Dim dollar_string As String = joson_block.Substring(dollar_start_pos)
            Dim dollar_dnd_pos As Integer = dollar_string.IndexOf("\"",\""")
            price = dollar_string.Substring(3, dollar_dnd_pos - 3).Trim.Replace(",", "")
        Catch ex As Exception
            price = G_FAKE_PRICE
        End Try
        Return price
    End Function

End Class
