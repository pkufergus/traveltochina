Public Class FrmSettings
    Private schedulingdataset As DataSet
    Private stritem, stritemkey, strintvalue, strstringvalue, strcomments As String
    Private Sub FrmSettings_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        RetrieveSchedulingSettings()
    End Sub

    Private Sub SchedulingListView_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SchedulingListView.Click
        stritem = SchedulingListView.SelectedItems(0).SubItems(1).Text.Trim
        stritemkey = SchedulingListView.SelectedItems(0).SubItems(2).Text.Trim
        strintvalue = SchedulingListView.SelectedItems(0).SubItems(3).Text.Trim
        strstringvalue = SchedulingListView.SelectedItems(0).SubItems(4).Text.Trim
        strcomments = SchedulingListView.SelectedItems(0).SubItems(5).Text.Trim


        ItemTextBox.Text = stritem
        ItemKeyTextBox.Text = stritemkey
        IntValueTextBox.Text = strintvalue
        StringValueTextBox.Text = strstringvalue
        CommentsTextBox.Text = strcomments
    End Sub
    Private Function RetrieveSchedulingSettings() As Boolean

        strSQL = "SELECT ID,item,item_key,int_value,string_value,comments,Undone FROM aie_configuration Order by ID"
        schedulingdataset = SqlHelper.Instance().ExecuteQuery(strSQL, "scheduling", sqlcon)
        Return Utilities.Instance.BuildListViewFromTable(SchedulingListView, False, "scheduling", schedulingdataset)
    End Function

    Private Sub AddButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddButton.Click
        If String.Empty.Equals(ItemTextBox.Text.Trim) OrElse String.Empty.Equals(ItemKeyTextBox.Text.Trim) Then
            MessageBox.Show("Please fill in data in textbox for item and item key!")
            Return
        End If

        strSQL = "SELECT item FROM aie_configuration WHERE item='" & ItemTextBox.Text.Trim & "'"

        schedulingdataset = SqlHelper.Instance().ExecuteQuery(strSQL, "configuration", sqlcon)
        If schedulingdataset.Tables("configuration").Rows.Count > 0 Then
            MsgBox("The item already exists in table!", MsgBoxStyle.Information, "Warinig")
            Return
        Else
            strSQL = "INSERT INTO aie_configuration(item,item_key,int_value,string_value,comments)VALUES('" & _
            ItemTextBox.Text.Trim & "','" & ItemKeyTextBox.Text.Trim & "'," & IntValueTextBox.Text.Trim & ",'" & StringValueTextBox.Text.Trim & "','" & CommentsTextBox.Text.Trim & "')"
        End If
        SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon)
        RetrieveSchedulingSettings()
        ClearTextBox()
    End Sub

    Private Sub ClearTextBox()

        ItemTextBox.Text = ""
        ItemKeyTextBox.Text = ""
        IntValueTextBox.Text = ""
        StringValueTextBox.Text = ""
        CommentsTextBox.Text = ""

    End Sub

    Private Sub UpdateButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles UpdateButton.Click
        If Not ItemTextBox.Text.Trim.Equals(stritem) Then
            MessageBox.Show("Can not change the item for update action!")
            Return
        End If
        strSQL = "UPDATE aie_configuration SET item_key='" & ItemKeyTextBox.Text.Trim & "', int_value=" & _
            IntValueTextBox.Text.Trim & ", string_value='" & StringValueTextBox.Text.Trim & "', comments='" & _
            CommentsTextBox.Text.Trim & "' WHERE item='" & ItemTextBox.Text.Trim & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Update the selected item successfully!")
        End If
        RetrieveSchedulingSettings()
        ClearTextBox()
    End Sub

    Private Sub DeleteButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DeleteButton.Click
        If String.Empty.Equals(ItemTextBox.Text.Trim) Then
            MessageBox.Show("No item selected for delete!")
            Return
        End If
        If Not ItemTextBox.Text.Trim.Equals(stritem) Then
            MessageBox.Show("Can not change the item for delete action!")
            Return
        End If
        strSQL = "DELETE FROM aie_configuration WHERE item='" & ItemTextBox.Text.Trim & "'"
        If SqlHelper.Instance().ExecuteNoneQuery(strSQL, sqlcon) Then
            MessageBox.Show("Delete the selected item successfully!")
        End If
        RetrieveSchedulingSettings()
        ClearTextBox()
    End Sub
End Class