<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmDB
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.UpdateButton = New System.Windows.Forms.Button()
        Me.ServerLabel = New System.Windows.Forms.Label()
        Me.DatabaseLabel = New System.Windows.Forms.Label()
        Me.UserLabel = New System.Windows.Forms.Label()
        Me.PasswordLabel = New System.Windows.Forms.Label()
        Me.ServerTextBox = New System.Windows.Forms.TextBox()
        Me.DatabaseTextBox = New System.Windows.Forms.TextBox()
        Me.UserTextBox = New System.Windows.Forms.TextBox()
        Me.PasswordTextBox = New System.Windows.Forms.TextBox()
        Me.SuspendLayout()
        '
        'UpdateButton
        '
        Me.UpdateButton.Location = New System.Drawing.Point(160, 200)
        Me.UpdateButton.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.UpdateButton.Name = "UpdateButton"
        Me.UpdateButton.Size = New System.Drawing.Size(105, 25)
        Me.UpdateButton.TabIndex = 0
        Me.UpdateButton.Text = "OK"
        Me.UpdateButton.UseVisualStyleBackColor = True
        '
        'ServerLabel
        '
        Me.ServerLabel.AutoSize = True
        Me.ServerLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ServerLabel.Location = New System.Drawing.Point(51, 46)
        Me.ServerLabel.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.ServerLabel.Name = "ServerLabel"
        Me.ServerLabel.Size = New System.Drawing.Size(48, 16)
        Me.ServerLabel.TabIndex = 1
        Me.ServerLabel.Text = "Server:"
        '
        'DatabaseLabel
        '
        Me.DatabaseLabel.AutoSize = True
        Me.DatabaseLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DatabaseLabel.Location = New System.Drawing.Point(51, 84)
        Me.DatabaseLabel.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.DatabaseLabel.Name = "DatabaseLabel"
        Me.DatabaseLabel.Size = New System.Drawing.Size(67, 16)
        Me.DatabaseLabel.TabIndex = 2
        Me.DatabaseLabel.Text = "Database:"
        '
        'UserLabel
        '
        Me.UserLabel.AutoSize = True
        Me.UserLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.UserLabel.Location = New System.Drawing.Point(51, 123)
        Me.UserLabel.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.UserLabel.Name = "UserLabel"
        Me.UserLabel.Size = New System.Drawing.Size(39, 16)
        Me.UserLabel.TabIndex = 3
        Me.UserLabel.Text = "User:"
        '
        'PasswordLabel
        '
        Me.PasswordLabel.AutoSize = True
        Me.PasswordLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.PasswordLabel.Location = New System.Drawing.Point(51, 161)
        Me.PasswordLabel.Margin = New System.Windows.Forms.Padding(4, 0, 4, 0)
        Me.PasswordLabel.Name = "PasswordLabel"
        Me.PasswordLabel.Size = New System.Drawing.Size(65, 16)
        Me.PasswordLabel.TabIndex = 4
        Me.PasswordLabel.Text = "Password"
        '
        'ServerTextBox
        '
        Me.ServerTextBox.Location = New System.Drawing.Point(127, 46)
        Me.ServerTextBox.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.ServerTextBox.Name = "ServerTextBox"
        Me.ServerTextBox.Size = New System.Drawing.Size(138, 22)
        Me.ServerTextBox.TabIndex = 5
        '
        'DatabaseTextBox
        '
        Me.DatabaseTextBox.Location = New System.Drawing.Point(127, 84)
        Me.DatabaseTextBox.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.DatabaseTextBox.Name = "DatabaseTextBox"
        Me.DatabaseTextBox.Size = New System.Drawing.Size(138, 22)
        Me.DatabaseTextBox.TabIndex = 6
        '
        'UserTextBox
        '
        Me.UserTextBox.Location = New System.Drawing.Point(127, 123)
        Me.UserTextBox.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.UserTextBox.Name = "UserTextBox"
        Me.UserTextBox.Size = New System.Drawing.Size(138, 22)
        Me.UserTextBox.TabIndex = 7
        '
        'PasswordTextBox
        '
        Me.PasswordTextBox.Location = New System.Drawing.Point(127, 159)
        Me.PasswordTextBox.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.PasswordTextBox.Name = "PasswordTextBox"
        Me.PasswordTextBox.Size = New System.Drawing.Size(138, 22)
        Me.PasswordTextBox.TabIndex = 8
        '
        'FrmDB
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 16.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(323, 267)
        Me.Controls.Add(Me.PasswordTextBox)
        Me.Controls.Add(Me.UserTextBox)
        Me.Controls.Add(Me.DatabaseTextBox)
        Me.Controls.Add(Me.ServerTextBox)
        Me.Controls.Add(Me.PasswordLabel)
        Me.Controls.Add(Me.UserLabel)
        Me.Controls.Add(Me.DatabaseLabel)
        Me.Controls.Add(Me.ServerLabel)
        Me.Controls.Add(Me.UpdateButton)
        Me.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Name = "FrmDB"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Database configure"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents UpdateButton As System.Windows.Forms.Button
    Friend WithEvents ServerLabel As System.Windows.Forms.Label
    Friend WithEvents DatabaseLabel As System.Windows.Forms.Label
    Friend WithEvents UserLabel As System.Windows.Forms.Label
    Friend WithEvents PasswordLabel As System.Windows.Forms.Label
    Friend WithEvents ServerTextBox As System.Windows.Forms.TextBox
    Friend WithEvents DatabaseTextBox As System.Windows.Forms.TextBox
    Friend WithEvents UserTextBox As System.Windows.Forms.TextBox
    Friend WithEvents PasswordTextBox As System.Windows.Forms.TextBox
End Class
