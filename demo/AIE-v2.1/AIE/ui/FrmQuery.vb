Public Class FrmQuery

    Private Sub BtnQuery_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles BtnQuery.Click
        Dim suffix As String = String.Empty
        If Not G_ALL_CITY.Equals(cbDestination.Text.Trim) Then
            suffix = "And ArrivalCity='" & cbDestination.Text.Trim & "'"
        End If
        Dim AIEDS As DataSet
        strSQL = "SELECT ID,DepartureDate,ReturnDate,DepartureCity,ArrivalCity,Price,WebLink FROM aie_masterdata Where " & _
                 "Departuredate between '" & DtpDepartureDateFrom.Text.Trim & "' And '" & DtpDepartureDateTo.Text.Trim & "'" & _
                 "And DepartureCity='" & cbDeparture.Text.Trim & "' " & suffix
        AIEDS = SqlHelper.Instance().ExecuteQuery(strSQL, "AIE", sqlcon)
        Utilities.Instance.BuildListViewFromTable(lvResult, False, "AIE", AIEDS)
    End Sub

    Private Sub FrmQuery_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        DtpDepartureDateFrom.Format = DateTimePickerFormat.Custom
        DtpDepartureDateFrom.CustomFormat = "yyyy-MM-dd"
        DtpDepartureDateTo.Format = DateTimePickerFormat.Custom
        DtpDepartureDateTo.CustomFormat = "yyyy-MM-dd"

        Me.cbDeparture.Items.Clear()
        Me.cbDestination.Items.Clear()
        Me.SpinningLabel.Visible = False

        Dim cityds As DataSet
        strSQL = "Select distinct DepartureCode From aie_citypair Order by DepartureCode"
        cityds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
        cbDeparture.DisplayMember = "DepartureCode"
        cbDeparture.ValueMember = "DepartureCode"
        cbDeparture.DataSource = cityds.Tables("CityPair")
        cbDeparture.SelectedIndex = 0
    End Sub

    Private Sub cbDeparture_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cbDeparture.SelectedIndexChanged
        Dim strDepartureCode As String = String.Empty
        strDepartureCode = cbDeparture.Text.Trim
        Utilities.Instance().FillComboBox(strDepartureCode, cbDestination)
    End Sub

    Private Sub BtnExport_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ExportButton.Click
        If lvResult.Items.Count = 0 Then
            MsgBox("No item in Listview,Please query data first!", MsgBoxStyle.Exclamation, "Warning")
            Return
        End If
        Try
            Me.ExportButton.Enabled = False
            ExcelSaveFileDialog.Filter = "Excel Workbook|*.xls"
            ExcelSaveFileDialog.Title = "Save an excel File(2003)"
            ExcelSaveFileDialog.ShowDialog()

            Dim filename As String = ExcelSaveFileDialog.FileName
            If String.Empty.Equals(filename) Then
                MsgBox("Blank filename,please use valid filename!", MsgBoxStyle.Exclamation, "Warning")
                Return
            End If
            SpinningLabel.Visible = True
            SpinningLabel.BringToFront()

            Utilities.Instance().ExportExcel(filename, "AIE", lvResult)
            Application.DoEvents()
        Catch ex As Exception
            MessageBox.Show("Export Data Error!", "Warning", MessageBoxButtons.OK)
        Finally
            Me.ExportButton.Enabled = True
            SpinningLabel.Visible = False
        End Try
    End Sub
End Class