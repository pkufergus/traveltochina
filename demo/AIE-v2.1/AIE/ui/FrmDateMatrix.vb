Public Class FrmDateMatrix

    Private Sub btnAdd_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnAdd.Click
        If String.Empty.Equals(txtDepartureCode.Text.Trim) OrElse String.Empty.Equals(txtDestinationCode.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox for Departure and Destination!")
            Return
        End If

        Dim departureDateFrom As Date = ConvertStringToDate(DtpDepartureDateFrom.Text.Trim(), "/")
        Dim departureDateTo As Date = ConvertStringToDate(DtpDepartureDateTo.Text.Trim(), "/")
        Dim returnDate As Date = ConvertStringToDate(DtpReturnDate.Text.Trim(), "/")

        strSQL = "Insert aie_datematrix(DepartureDateFrom,DepartureDateTo,ReturnDate,DepartureCity,DestinationCity)Values('" & _
                departureDateFrom.ToString("yyyy-MM-dd") & "','" & departureDateTo.ToString("yyyy-MM-dd") & "','" & returnDate.ToString("yyyy-MM-dd") & "','" & txtDepartureCode.Text.Trim & "','" & txtDestinationCode.Text.Trim & "')"

        SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon)
        RetrieveDateMatrix()
        ClearTextBox()
    End Sub

    Private Sub btnDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDelete.Click
        strSQL = "Delete From aie_DateMatrix Where id =" & lbDateMatrixID.Text
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Delete the selected item successfully!")
        End If
        RetrieveDateMatrix()
        ClearTextBox()
    End Sub

    Private Sub FrmDateMatrix_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        DtpDepartureDateFrom.Format = DateTimePickerFormat.Custom
        DtpDepartureDateFrom.CustomFormat = "yyyyMMdd"
        DtpDepartureDateTo.Format = DateTimePickerFormat.Custom
        DtpDepartureDateTo.CustomFormat = "yyyyMMdd"
        DtpReturnDate.Format = DateTimePickerFormat.Custom
        DtpReturnDate.CustomFormat = "yyyyMMdd"

        RetrieveDateMatrix()
    End Sub

    Private Sub ClearTextBox()
        txtDepartureCode.Text = ""
        txtDestinationCode.Text = ""
    End Sub

    Private Function RetrieveDateMatrix() As Boolean
        Dim dateMatrixDataset As New DataSet
        strSQL = "Select ID,DepartureDateFrom,DepartureDateTo,ReturnDate,DepartureCity,DestinationCity,Undone From aie_DateMatrix Order by ID"
        dateMatrixDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "DateMatrix", sqlcon)
        Return Utilities.Instance.BuildListViewFromTable(lvDateMatrix, False, "DateMatrix", dateMatrixDataset)
    End Function

    Private Function ConvertStringToDate(ByVal strDate As String, ByVal format As String) As Date
        Dim year As Int16
        Dim month As Int16
        Dim day As Int16

        Dim NewDate As Date
        Dim tempDate As String
        year = strDate.Substring(0, 4)
        month = strDate.Substring(4, 2)
        day = strDate.Substring(6, 2)
        tempDate = year & format & month & format & day
        NewDate = Convert.ToDateTime(tempDate)
        Return NewDate
    End Function

    Private Sub lvDateMatrix_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles lvDateMatrix.Click
        DtpDepartureDateFrom.Value = Convert.ToDateTime(lvDateMatrix.SelectedItems(0).SubItems(1).Text.Trim)
        DtpDepartureDateTo.Value = Convert.ToDateTime(lvDateMatrix.SelectedItems(0).SubItems(2).Text.Trim)
        DtpReturnDate.Value = Convert.ToDateTime(lvDateMatrix.SelectedItems(0).SubItems(3).Text.Trim)
        txtDepartureCode.Text = lvDateMatrix.SelectedItems(0).SubItems(4).Text.Trim
        txtDestinationCode.Text = lvDateMatrix.SelectedItems(0).SubItems(5).Text.Trim
        lbDateMatrixID.Text = lvDateMatrix.SelectedItems(0).SubItems(0).Text.Trim
    End Sub
End Class