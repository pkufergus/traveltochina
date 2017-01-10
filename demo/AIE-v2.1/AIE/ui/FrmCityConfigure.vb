Imports MySql.Data.MySqlClient

Public Class FrmCityConfigure
    Private strDestinationCode, strDepartureCode As String
    Private strCityCode, strEnglishName, strChineseName, strTraditionalChineseName As String

    Private Enum city
        citycode = 1
        citypair = 2
        citycodeandpair = 3
    End Enum
    Private Sub FrmCityConfig_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        RetrieveCityData(city.citycodeandpair)
        get_city_code()

    End Sub
    Private Sub CityAddButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityAddButton.Click
        If String.Empty.Equals(CityCodeTextBox.Text.Trim) OrElse String.Empty.Equals(CityNameTextBox.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox for city code and city name!")
            Return
        End If

        strSQL = "Select CityCode,Undone from aie_cityname Where CityCode='" & _
            CityCodeTextBox.Text.Trim & "'"

        Dim cityDataset As DataSet
        cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
        If cityDataset.Tables("CityCode").Rows.Count > 0 Then
            If "FALSE".Equals(cityDataset.Tables("CityCode").Rows(0).Item("Undone").ToString.Trim.ToUpper) Then
                MsgBox("The city code does already exist!", MsgBoxStyle.Information, "Warinig")
                Return
            Else
                strSQL = "Update aie_cityname Set Undone='False' Where CityCode='" & CityCodeTextBox.Text.Trim & "'"
            End If
        Else
            strSQL = "INSERT INTO aie_cityname(CityCode,EnglishName,ChineseName,TraditionalChineseName)Values('" & _
                 CityCodeTextBox.Text.Trim & "','" & CityNameTextBox.Text.Trim & "','" & ChineseNameTextBox.Text.Trim & "','" & TraditionalChineseNameTextBox.Text.Trim & "')"
        End If
        SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon)
        RetrieveCityData(city.citycode)
        ClearTextBox(city.citycode)
        get_city_code()
    End Sub
    Private Sub btnAdd_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnAdd.Click
        If String.Empty.Equals(DepartureComboBox.Text.Trim) OrElse String.Empty.Equals(DestinationComboBox.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox for Departure and Destination!")
            Return
        End If

        strSQL = "Select ID,Undone from aie_citypair Where DepartureCode='" & _
            DepartureComboBox.Text.Trim & "' And DestinationCode='" & DestinationComboBox.Text.Trim & "'"

        Dim cityDataset As DataSet
        cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
        If cityDataset.Tables("CityPair").Rows.Count > 0 Then
            If "FALSE".Equals(cityDataset.Tables("CityPair").Rows(0).Item("Undone").ToString.Trim.ToUpper) Then
                MsgBox("The city pair does already exist!", MsgBoxStyle.Information, "Warinig")
                Return
            Else
                strSQL = "Update aie_citypair Set Undone='False' Where DepartureCode='" & _
                DepartureComboBox.Text.Trim & "' And DestinationCode='" & DestinationComboBox.Text.Trim & "'"
            End If
        Else
            strSQL = "INSERT INTO aie_citypair(DepartureCode,DestinationCode,Undone)Values('" & _
                 DepartureComboBox.Text.Trim & "','" & DestinationComboBox.Text.Trim & "','False')"
        End If
        SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon)
        RetrieveCityData(city.citypair)
        ClearTextBox(city.citypair)
    End Sub

    Private Sub CityCodeListView_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityCodeListView.Click
        strCityCode = CityCodeListView.SelectedItems(0).SubItems(0).Text.Trim
        strEnglishName = CityCodeListView.SelectedItems(0).SubItems(1).Text.Trim
        strChineseName = CityCodeListView.SelectedItems(0).SubItems(2).Text.Trim
        strTraditionalChineseName = CityCodeListView.SelectedItems(0).SubItems(3).Text.Trim

        CityCodeTextBox.Text = strCityCode
        CityNameTextBox.Text = strEnglishName

        ChineseNameTextBox.Text = strChineseName
        TraditionalChineseNameTextBox.Text = strTraditionalChineseName
    End Sub

    Private Sub CityPairListView_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityPairListView.Click
        strDepartureCode = CityPairListView.SelectedItems(0).SubItems(1).Text.Trim
        strDestinationCode = CityPairListView.SelectedItems(0).SubItems(2).Text.Trim

        DepartureComboBox.SelectedIndex = DepartureComboBox.FindString(strDepartureCode)
        DestinationComboBox.SelectedIndex = DepartureComboBox.FindString(strDestinationCode)

    End Sub
    Private Sub CityDeleteButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityDeleteButton.Click
        If String.Empty.Equals(CityCodeTextBox.Text.Trim) Then
            MessageBox.Show("Please Select one item from list view to delete!")
            Return
        End If
        strSQL = "Delete From aie_cityname Where CityCode='" & CityCodeTextBox.Text.Trim & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Delete the selected item successfully!")
        End If
        RetrieveCityData(city.citycode)
        ClearTextBox(city.citycode)
        get_city_code()
    End Sub

    Private Sub btnDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnDelete.Click
        If String.Empty.Equals(DepartureComboBox.Text.Trim) OrElse String.Empty.Equals(DestinationComboBox.Text.Trim) Then
            MessageBox.Show("Please Select one item from list view to delete!")
            Return
        End If
        strSQL = "Delete From aie_citypair Where DepartureCode='" & DepartureComboBox.Text.Trim & "' And DestinationCode='" & DestinationComboBox.Text.Trim & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Delete the selected item successfully!")
        End If
        RetrieveCityData(city.citypair)
        ClearTextBox(city.citypair)
    End Sub
    Private Sub CityUpdateButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CityUpdateButton.Click
        If String.Empty.Equals(CityCodeTextBox.Text.Trim) OrElse String.Empty.Equals(CityNameTextBox.Text.Trim) OrElse
            String.Empty.Equals(ChineseNameTextBox.Text.Trim) OrElse String.Empty.Equals(TraditionalChineseNameTextBox.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox!")
            Return
        End If
        If Not CityCodeTextBox.Text.Trim.Equals(strCityCode) Then
            MessageBox.Show("The city code is changed")
            Return
        End If
        strSQL = "Select citycode From aie_cityname Where CityCode='" & CityCodeTextBox.Text.Trim & "'"

        Dim cityDataset As DataSet
        cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
        If cityDataset.Tables("CityCode").Rows.Count = 0 Then
            MessageBox.Show("The city code does not exist!")
            Return
        End If

        strSQL = "Update aie_cityname Set EnglishName='" & CityNameTextBox.Text.Trim & "', ChineseName='" & _
                  ChineseNameTextBox.Text.Trim & "', TraditionalChineseName='" & TraditionalChineseNameTextBox.Text.Trim & "' Where " & _
                 "CityCode='" & strCityCode & "'"

        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Update the selected item successfully!")
        End If
        RetrieveCityData(city.citycode)
        ClearTextBox(city.citycode)
    End Sub
    Private Sub btnUpdate_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnUpdate.Click
        If String.Empty.Equals(DepartureComboBox.Text.Trim) OrElse String.Empty.Equals(DestinationComboBox.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox for Departure and Destination!")
            Return
        End If

        strSQL = "Select ID From aie_citypair Where " & _
            "DepartureCode='" & DepartureComboBox.Text.Trim & "' And DestinationCode='" & strDestinationCode & "'"

        Dim cityDataset As DataSet
        cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
        If cityDataset.Tables("CityPair").Rows.Count = 0 Then
            MessageBox.Show("The city pair does not exist!")
            Return
        End If
        strSQL = "Update aie_citypair Set DepartureCode='" & DepartureComboBox.Text.Trim & "', DestinationCode='" & DestinationComboBox.Text.Trim & "' Where " & _
                 "DepartureCode='" & strDepartureCode & "' And DestinationCode='" & strDestinationCode & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Update the selected item successfully!")
        End If
        RetrieveCityData(city.citypair)
        ClearTextBox(city.citypair)
    End Sub

#Region "*********General Function Section*********"
    Private Sub ClearTextBox(ByVal citytype As city)
        If citytype = city.citycode Then
            CityCodeTextBox.Text = ""
            CityNameTextBox.Text = ""
            ChineseNameTextBox.Text = ""
            TraditionalChineseNameTextBox.Text = ""
        ElseIf citytype = city.citypair Then

        End If
      
    End Sub

    Private Sub RetrieveCityData(ByVal citytype As city)
        Dim cityDataset As DataSet

        Select Case citytype
            Case city.citycode
                strSQL = "SELECT CityCode,EnglishName,ChineseName,TraditionalChineseName,Undone FROM aie_cityname WHERE UNDONE='False' ORDER BY CityCode"
                cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
                Utilities.Instance.BuildListViewFromTable(CityCodeListView, False, "CityCode", cityDataset)
            Case city.citypair
                strSQL = "SELECT ID,DepartureCode,DestinationCode,Undone From aie_citypair Order by DepartureCode,DestinationCode"
                cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
                Utilities.Instance.BuildListViewFromTable(CityPairListView, False, "CityPair", cityDataset)
            Case city.citycodeandpair
                strSQL = "SELECT CityCode,EnglishName,ChineseName,TraditionalChineseName,Undone FROM aie_cityname WHERE UNDONE='False' ORDER BY CityCode"
                cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
                Utilities.Instance.BuildListViewFromTable(CityCodeListView, False, "CityCode", cityDataset)
                strSQL = "SELECT ID,DepartureCode,DestinationCode,Undone From aie_citypair Order by DepartureCode,DestinationCode"
                cityDataset = SqlHelper.Instance().ExecuteQuery(strSQL, "CityPair", sqlcon)
                Utilities.Instance.BuildListViewFromTable(CityPairListView, False, "CityPair", cityDataset)
        End Select

    End Sub

    Private Sub get_city_code()
        Dim citydepartureds, citydestinationds As DataSet
        strSQL = "SELECT CityCode FROM aie_cityname ORDER BY CityCode"

        citydepartureds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
        citydestinationds = SqlHelper.Instance().ExecuteQuery(strSQL, "CityCode", sqlcon)
        DepartureComboBox.DisplayMember = "CityCode"
        DepartureComboBox.ValueMember = "CityCode"
        DepartureComboBox.DataSource = citydepartureds.Tables("CityCode")
        DepartureComboBox.SelectedIndex = 0

        DestinationComboBox.DisplayMember = "CityCode"
        DestinationComboBox.ValueMember = "CityCode"
        DestinationComboBox.DataSource = citydestinationds.Tables("CityCode")
        DestinationComboBox.SelectedIndex = 0
    End Sub
#End Region
End Class