Imports System
Imports System.Net
Imports System.Net.Mail
Imports System.Globalization
Imports Microsoft.Office.Interop


Public Class Utilities

    Private Shared utilities_factory As Utilities = Nothing

    Private Sub New()
    End Sub

    Public Shared Function Instance() As Utilities
        If utilities_factory Is Nothing Then
            utilities_factory = New Utilities
        End If
        Return utilities_factory
    End Function

    Public Function BuildListViewFromTable(ByRef pListView As ListView, _
                                        ByVal boolpCheckBox As Boolean, _
                                        ByVal strpDSTableName As String, _
                                        ByRef pDataSet As DataSet) As Boolean

        pListView.Visible = False
        Dim intLoop1, intLoop2, intTmp As Integer
        Dim intRecs As Integer = pDataSet.Tables(strpDSTableName).Rows.Count
        Dim intCols As Integer = pDataSet.Tables(strpDSTableName).Columns.Count

        '** Set settings on listview
        pListView.CheckBoxes = boolpCheckBox
        pListView.View = View.Details
        pListView.Clear()

        If boolpCheckBox = True Then
            pListView.Columns.Add(" ", 1, HorizontalAlignment.Center)
        End If

        '** Build columns in listview
        For intLoop1 = 0 To intCols - 1
            pListView.Columns.Add(pDataSet.Tables(strpDSTableName).Columns.Item(intLoop1).ColumnName, 1, HorizontalAlignment.Left)
        Next

        '** Populate listview
        For intLoop1 = 0 To intRecs - 1
            intTmp = 0
            Dim tmpItem As New System.Windows.Forms.ListViewItem
            With pDataSet.Tables(strpDSTableName).Rows(intLoop1)
                If boolpCheckBox Then
                    tmpItem.Text = ""
                Else
                    If IsDBNull(.Item(0)) Then
                        tmpItem.Text = ""
                    Else
                        tmpItem.Text = Trim(.Item(0))
                    End If
                    intTmp = 1
                End If
                For intLoop2 = intTmp To intCols - 1
                    If IsDBNull(.Item(intLoop2)) Then
                        tmpItem.SubItems.Add("")
                    Else
                        tmpItem.SubItems.Add(Trim(.Item(intLoop2)))
                    End If

                    'tmpItem.SubItems.Add(Trim(.Item(intLoop2)))
                Next
                pListView.Items.AddRange(New Windows.Forms.ListViewItem() {tmpItem})
            End With
        Next

        '** Resize listview for maximum column name or value
        ResizeListViewCols(pListView)
        pListView.Visible = True
        Return True
    End Function

    Public Sub FillComboBox(ByVal strDepartureCode As String, ByRef cmbName As ComboBox)
        cmbName.Items.Clear()
        Dim cityds As New DataSet
        strSQL = "SELECT DISTINCT DESTINATIONCODE FROM AIE_CityPair WHERE DepartureCode='" & strDepartureCode & "'"
        cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
        If Not cityds.Tables("CityPair") Is Nothing Then
            cmbName.Items.Add(G_ALL_CITY)
            For Each objDR As DataRow In cityds.Tables("CityPair").Rows
                cmbName.Items.Add(objDR(0).ToString.Trim)
            Next
        End If
        cmbName.Text = ""
        cmbName.SelectedIndex = 0
    End Sub

    Public Sub ResizeListViewCols(ByRef pListView As ListView)
        Dim objColHd As New ColumnHeader
        ' Resizing each column header
        For Each objColHd In pListView.Columns
            objColHd.Width = -2
        Next
    End Sub

    Public Sub ExportExcel(ByVal filename As String, ByVal sheetname As String, ByVal listview As ListView)

        Dim vbExcel As New Excel.Application
        Dim vbWorkSheet As Excel.Worksheet
        Dim vbWorkBook As Excel.Workbook
        Dim rr As Integer = 1
        Dim kk As Integer = 1
        Dim LC As Integer
        Dim LC1 As Integer
        Dim NumHead As Integer = 0
        Try
            If listview.Items.Count = 0 Then
                Return
            End If

            Dim oldInfo As System.Globalization.CultureInfo = System.Threading.Thread.CurrentThread.CurrentCulture
            System.Threading.Thread.CurrentThread.CurrentCulture = New System.Globalization.CultureInfo("en-US")
            vbWorkBook = vbExcel.Workbooks.Add()

            vbWorkSheet = vbWorkBook.Sheets(1)
            vbWorkSheet.Name = sheetName

            For LC = 0 To listview.Columns.Count - 1
                With vbWorkSheet.Cells(rr, LC + 1)
                    .NumberFormatLocal = "@"
                    .Value = listview.Columns(NumHead).Text.Trim
                    .Font.Bold = True
                End With
                NumHead = NumHead + 1
            Next LC
            rr = 2
            For LC = 0 To listview.Items.Count - 1
                NumHead = 0
                For LC1 = 0 To listview.Columns.Count - 1
                    With vbWorkSheet.Cells(rr + LC, kk + LC1)
                        If LC1 = 3 OrElse LC1 = 10 OrElse LC1 = 12 Then
                            '.NumberFormatLocal = ""
                        Else
                            .NumberFormatLocal = "@"
                        End If
                        .Value = listview.Items(LC).SubItems(NumHead).Text.Trim
                    End With
                    NumHead = NumHead + 1
                Next LC1
            Next LC
            vbWorkBook.SaveAs(filename)
            vbExcel.Visible = False
            vbExcel.DisplayAlerts = False
            System.Threading.Thread.CurrentThread.CurrentCulture = New System.Globalization.CultureInfo("en-US")
        Catch ex As Exception
            MessageBox.Show("ExportExcel" + ex.Message)
        Finally
            vbWorkSheet = Nothing
            vbWorkBook = Nothing
            vbExcel.Quit()
            System.Runtime.InteropServices.Marshal.ReleaseComObject(vbExcel)
            vbExcel = Nothing
            GC.Collect()
        End Try
    End Sub

    'Public Sub send_mail(ByVal distributionlist As String, ByVal subject As String, ByVal body As String)
    Public Sub send_mail(ByVal subject As String, ByVal body As String)

        Dim message As MailMessage
        Dim client As SmtpClient
        Try
            If String.Empty.Equals(G_distributionlist) Then
                Return
            End If
            message = New MailMessage(G_mailsender, G_distributionlist)
            message.Subject = subject
            message.IsBodyHtml = True
            message.Body = body
            client = New SmtpClient(G_smtphost)
            client.Credentials = New NetworkCredential(G_username, G_password)
            client.Send(message)

        Catch ex As Exception
            'MessageBox.Show(ex.Message)
        End Try

    End Sub

    Public Function populate_mail_body(ByVal urllink As String, ByVal departure_city As String, ByVal destination_city As String, ByVal price As String) As String

        Dim bd As New System.Text.StringBuilder
        bd.Append("<html>")
        bd.Append("<style type='text/css'>")
        bd.Append("td {")
        bd.Append("border:1px solid  #336666;")
        bd.Append("}")
        bd.Append("</style>")
        bd.Append("<body><span style='font-family: Arial;color: #333333;font-size: 12px;'>")
        bd.Append("Hi,<br />")
        bd.Append("The price is not correct after query AIE data from web.<br />")
        bd.Append("AIE url link:<strong>" & urllink & "</strong>,<br />")
        bd.Append("Details as below table<br /></span>")
        bd.Append("<table cellspacing='0' style='font-family: Arial; font-size: 12px; '><tr style='font-weight: bold; background-color: #6666FF; color: #FFFF66;'><td>Departure City</td><td>Destination City</td><td>Price</td></tr>")
        bd.Append("<tr><td>" & departure_city & "</td><td>" & destination_city & "</td><td>" & price & "</td></tr>")
        bd.Append("</table><br />")
        bd.Append("<span style='font-family: Arial;color: #333333;font-size: 12px;'>Please go to the server to check AIE application for the departure city.<br />")
        bd.Append("~Regards!<br />")
        bd.Append("**************************************<br />")
        bd.Append("***Please do not reply this mail!***<br />")
        bd.Append("**************************************</span>")
        bd.Append("</body></html>")

        Return bd.ToString
    End Function

    Public Function encode_string(ByVal input_string) As String
        Dim binaryData() As Byte = System.Text.Encoding.Default.GetBytes(input_string)
        Dim base64String As String = System.Convert.ToBase64String(binaryData, 0, binaryData.Length)
        Return base64String
    End Function

    Public Function decode_string(ByVal input_string) As String
        Dim binaryData As Byte() = Convert.FromBase64String(input_string)
        Dim d_base64string As String = System.Text.Encoding.GetEncoding("UTF-8").GetString(binaryData)
        Return d_base64string
    End Function
End Class
