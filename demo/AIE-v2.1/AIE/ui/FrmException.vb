Imports System.Threading

Public Class FrmException

    Private single_thread_flag As Boolean
    Private update_exception_sql As String = "UPDATE aie_masterdata SET price=10000 WHERE ID= "

    Private Sub QueryExceptionButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles QueryExceptionButton.Click
        If single_thread_flag Then
            MsgBox("Exception handling is running,please wait.", MsgBoxStyle.Exclamation, "Warning")
            Return
        End If
        Dim AIEDS As DataSet
        strSQL = "SELECT ID,DepartureDate,ReturnDate,DepartureCity,ArrivalCity,Price,WebLink FROM aie_masterdata Where " &
                 "DepartureCity='" & DepartureComboBox.Text.Trim & "' AND price=10000"
        AIEDS = SqlHelper.Instance().ExecuteQuery(strSQL, "AIE", sqlcon)
        Utilities.Instance.BuildListViewFromTable(ResultListView, False, "AIE", AIEDS)
        TotalStatusLabel.Text = "Total Exception:" & ResultListView.Items.Count.ToString
    End Sub

    Private Sub FrmException_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim cityds As DataSet

        strSQL = "SELECT distinct DepartureCode FROM aie_citypair ORDER BY DepartureCode"
        cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
        DepartureComboBox.DisplayMember = "DepartureCode"
        DepartureComboBox.ValueMember = "DepartureCode"
        DepartureComboBox.DataSource = cityds.Tables("CityPair")
        DepartureComboBox.SelectedIndex = 0
        single_thread_flag = False
    End Sub

    Private Sub ReRunButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles HandleExceptionButton.Click
        Try
            If single_thread_flag Then
                MsgBox("Exception handling is running,please wait.", MsgBoxStyle.Exclamation, "Warning")
                Return
            End If

            Dim exception_number As Integer = ResultListView.Items.Count
            If exception_number = 0 Then
                MsgBox("No exception data in list view!", MsgBoxStyle.Exclamation, "Warning")
                Return
            End If
            single_thread_flag = True
            ResultListView.Items(0).Selected = True
            ResultListView.Focus()

            Dim handle_via_thread As Thread = New Thread(AddressOf thread_handle)
            handle_via_thread.Start()
        Catch ex As Exception
            MessageBox.Show("ReRunButton_Click" + ex.Message)
        End Try

    End Sub

    Private Sub thread_handle()

            If ResultListView.InvokeRequired Then
                ResultListView.BeginInvoke(New MethodInvoker(AddressOf thread_handle))
            Else
            Dim url As String
            Dim id As String
            Dim price As String
            For n As Integer = 0 To ResultListView.Items.Count - 1
                id = ResultListView.Items(n).SubItems(0).Text.Trim()
                url = ResultListView.Items(n).SubItems(6).Text.Trim()
                price = AccessWeb.Instance().web_request_response(url)
                If Not G_FAKE_PRICE.Equals(price) Then
                    ResultListView.Items(n).SubItems(5).Text = price
                    'UPDATE THE DATA IN TABLE
                    SqlHelper.Instance().ExecuteNoneQuery(update_exception_sql.Replace("price=10000", "price=" & price) & id, sqlcon)
                End If
                ResultListView.Items(n).Selected = True
                ResultListView.EnsureVisible(n)
                Application.DoEvents()
            Next
        End If
        single_thread_flag = False
    End Sub
End Class