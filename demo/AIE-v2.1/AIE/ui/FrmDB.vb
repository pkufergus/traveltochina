Public Class FrmDB

    Private Sub FrmDB_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim db_hash As Hashtable = HandleXML.Instance.read_database_config()

        Me.ServerTextBox.Text = db_hash.Item("server")
        Me.DatabaseTextBox.Text = db_hash.Item("database")
        Me.PasswordTextBox.Text = db_hash.Item("password")
        Me.UserTextBox.Text = db_hash.Item("user")
    End Sub

    Private Sub UpdateButton_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles UpdateButton.Click
        If String.Empty.Equals(Me.ServerTextBox.Text.Trim) OrElse _
           String.Empty.Equals(Me.DatabaseTextBox.Text.Trim) OrElse _
           String.Empty.Equals(Me.PasswordTextBox.Text.Trim) OrElse _
           String.Empty.Equals(Me.UserTextBox.Text.Trim) Then
            MsgBox("Not allow empty for these values!", MsgBoxStyle.Exclamation, "Warning")
            Return
        End If

        If HandleXML.Instance.write_database_config(Me.ServerTextBox.Text.Trim, Me.DatabaseTextBox.Text.Trim, Me.UserTextBox.Text.Trim, Me.PasswordTextBox.Text.Trim) Then
            MsgBox("Change DB successfully!", MsgBoxStyle.Information, "Information")
            Me.Close()
        Else
            MsgBox("Change DB failed!", MsgBoxStyle.Exclamation, "Warning")
        End If

    End Sub
End Class