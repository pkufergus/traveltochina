<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmSettings
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
        Me.StringValueLabel = New System.Windows.Forms.Label()
        Me.ItemKeyLabel = New System.Windows.Forms.Label()
        Me.StringValueTextBox = New System.Windows.Forms.TextBox()
        Me.ItemKeyTextBox = New System.Windows.Forms.TextBox()
        Me.SchedulingLabel = New System.Windows.Forms.Label()
        Me.IntValueLabel = New System.Windows.Forms.Label()
        Me.ItemLabel = New System.Windows.Forms.Label()
        Me.UpdateButton = New System.Windows.Forms.Button()
        Me.AddButton = New System.Windows.Forms.Button()
        Me.IntValueTextBox = New System.Windows.Forms.TextBox()
        Me.ItemTextBox = New System.Windows.Forms.TextBox()
        Me.DeleteButton = New System.Windows.Forms.Button()
        Me.SchedulingListView = New System.Windows.Forms.ListView()
        Me.CommentsLabel = New System.Windows.Forms.Label()
        Me.CommentsTextBox = New System.Windows.Forms.TextBox()
        Me.SuspendLayout()
        '
        'StringValueLabel
        '
        Me.StringValueLabel.AutoSize = True
        Me.StringValueLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.StringValueLabel.Location = New System.Drawing.Point(213, 353)
        Me.StringValueLabel.Name = "StringValueLabel"
        Me.StringValueLabel.Size = New System.Drawing.Size(77, 16)
        Me.StringValueLabel.TabIndex = 25
        Me.StringValueLabel.Text = "String Value:"
        '
        'ItemKeyLabel
        '
        Me.ItemKeyLabel.AutoSize = True
        Me.ItemKeyLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.ItemKeyLabel.Location = New System.Drawing.Point(213, 320)
        Me.ItemKeyLabel.Name = "ItemKeyLabel"
        Me.ItemKeyLabel.Size = New System.Drawing.Size(58, 16)
        Me.ItemKeyLabel.TabIndex = 23
        Me.ItemKeyLabel.Text = "Item Key:"
        '
        'StringValueTextBox
        '
        Me.StringValueTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.StringValueTextBox.Location = New System.Drawing.Point(291, 352)
        Me.StringValueTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.StringValueTextBox.Name = "StringValueTextBox"
        Me.StringValueTextBox.Size = New System.Drawing.Size(116, 21)
        Me.StringValueTextBox.TabIndex = 17
        '
        'ItemKeyTextBox
        '
        Me.ItemKeyTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ItemKeyTextBox.Location = New System.Drawing.Point(291, 319)
        Me.ItemKeyTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.ItemKeyTextBox.Name = "ItemKeyTextBox"
        Me.ItemKeyTextBox.Size = New System.Drawing.Size(116, 21)
        Me.ItemKeyTextBox.TabIndex = 15
        '
        'SchedulingLabel
        '
        Me.SchedulingLabel.AutoSize = True
        Me.SchedulingLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.SchedulingLabel.Location = New System.Drawing.Point(14, 13)
        Me.SchedulingLabel.Name = "SchedulingLabel"
        Me.SchedulingLabel.Size = New System.Drawing.Size(117, 16)
        Me.SchedulingLabel.TabIndex = 21
        Me.SchedulingLabel.Text = "Scheduling Settings"
        '
        'IntValueLabel
        '
        Me.IntValueLabel.AutoSize = True
        Me.IntValueLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.IntValueLabel.Location = New System.Drawing.Point(16, 353)
        Me.IntValueLabel.Name = "IntValueLabel"
        Me.IntValueLabel.Size = New System.Drawing.Size(59, 16)
        Me.IntValueLabel.TabIndex = 24
        Me.IntValueLabel.Text = "Int Value:"
        '
        'ItemLabel
        '
        Me.ItemLabel.AutoSize = True
        Me.ItemLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.ItemLabel.Location = New System.Drawing.Point(16, 322)
        Me.ItemLabel.Name = "ItemLabel"
        Me.ItemLabel.Size = New System.Drawing.Size(35, 16)
        Me.ItemLabel.TabIndex = 22
        Me.ItemLabel.Text = "Item:"
        '
        'UpdateButton
        '
        Me.UpdateButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.UpdateButton.Location = New System.Drawing.Point(423, 348)
        Me.UpdateButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.UpdateButton.Name = "UpdateButton"
        Me.UpdateButton.Size = New System.Drawing.Size(87, 30)
        Me.UpdateButton.TabIndex = 20
        Me.UpdateButton.Text = "Update"
        Me.UpdateButton.UseVisualStyleBackColor = True
        '
        'AddButton
        '
        Me.AddButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.AddButton.Location = New System.Drawing.Point(423, 314)
        Me.AddButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.AddButton.Name = "AddButton"
        Me.AddButton.Size = New System.Drawing.Size(87, 30)
        Me.AddButton.TabIndex = 18
        Me.AddButton.Text = "Add"
        Me.AddButton.UseVisualStyleBackColor = True
        '
        'IntValueTextBox
        '
        Me.IntValueTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.IntValueTextBox.Location = New System.Drawing.Point(91, 351)
        Me.IntValueTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.IntValueTextBox.Name = "IntValueTextBox"
        Me.IntValueTextBox.Size = New System.Drawing.Size(116, 21)
        Me.IntValueTextBox.TabIndex = 16
        '
        'ItemTextBox
        '
        Me.ItemTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ItemTextBox.Location = New System.Drawing.Point(91, 319)
        Me.ItemTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.ItemTextBox.Name = "ItemTextBox"
        Me.ItemTextBox.Size = New System.Drawing.Size(116, 21)
        Me.ItemTextBox.TabIndex = 14
        '
        'DeleteButton
        '
        Me.DeleteButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.DeleteButton.Location = New System.Drawing.Point(423, 381)
        Me.DeleteButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.DeleteButton.Name = "DeleteButton"
        Me.DeleteButton.Size = New System.Drawing.Size(87, 30)
        Me.DeleteButton.TabIndex = 19
        Me.DeleteButton.Text = "Delete"
        Me.DeleteButton.UseVisualStyleBackColor = True
        '
        'SchedulingListView
        '
        Me.SchedulingListView.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.SchedulingListView.FullRowSelect = True
        Me.SchedulingListView.GridLines = True
        Me.SchedulingListView.Location = New System.Drawing.Point(14, 36)
        Me.SchedulingListView.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.SchedulingListView.MultiSelect = False
        Me.SchedulingListView.Name = "SchedulingListView"
        Me.SchedulingListView.Size = New System.Drawing.Size(717, 267)
        Me.SchedulingListView.TabIndex = 13
        Me.SchedulingListView.UseCompatibleStateImageBehavior = False
        Me.SchedulingListView.View = System.Windows.Forms.View.Details
        '
        'CommentsLabel
        '
        Me.CommentsLabel.AutoSize = True
        Me.CommentsLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.CommentsLabel.Location = New System.Drawing.Point(16, 382)
        Me.CommentsLabel.Name = "CommentsLabel"
        Me.CommentsLabel.Size = New System.Drawing.Size(68, 16)
        Me.CommentsLabel.TabIndex = 27
        Me.CommentsLabel.Text = "Comments:"
        '
        'CommentsTextBox
        '
        Me.CommentsTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CommentsTextBox.Location = New System.Drawing.Point(91, 382)
        Me.CommentsTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.CommentsTextBox.Name = "CommentsTextBox"
        Me.CommentsTextBox.Size = New System.Drawing.Size(316, 21)
        Me.CommentsTextBox.TabIndex = 26
        '
        'FrmSettings
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 15.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(744, 422)
        Me.Controls.Add(Me.CommentsLabel)
        Me.Controls.Add(Me.CommentsTextBox)
        Me.Controls.Add(Me.StringValueLabel)
        Me.Controls.Add(Me.ItemKeyLabel)
        Me.Controls.Add(Me.StringValueTextBox)
        Me.Controls.Add(Me.ItemKeyTextBox)
        Me.Controls.Add(Me.SchedulingLabel)
        Me.Controls.Add(Me.IntValueLabel)
        Me.Controls.Add(Me.ItemLabel)
        Me.Controls.Add(Me.UpdateButton)
        Me.Controls.Add(Me.AddButton)
        Me.Controls.Add(Me.IntValueTextBox)
        Me.Controls.Add(Me.ItemTextBox)
        Me.Controls.Add(Me.DeleteButton)
        Me.Controls.Add(Me.SchedulingListView)
        Me.Font = New System.Drawing.Font("Microsoft Sans Serif", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.Name = "FrmSettings"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Scheduling Settings"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents StringValueLabel As System.Windows.Forms.Label
    Friend WithEvents ItemKeyLabel As System.Windows.Forms.Label
    Friend WithEvents StringValueTextBox As System.Windows.Forms.TextBox
    Friend WithEvents ItemKeyTextBox As System.Windows.Forms.TextBox
    Friend WithEvents SchedulingLabel As System.Windows.Forms.Label
    Friend WithEvents IntValueLabel As System.Windows.Forms.Label
    Friend WithEvents ItemLabel As System.Windows.Forms.Label
    Friend WithEvents UpdateButton As System.Windows.Forms.Button
    Friend WithEvents AddButton As System.Windows.Forms.Button
    Friend WithEvents IntValueTextBox As System.Windows.Forms.TextBox
    Friend WithEvents ItemTextBox As System.Windows.Forms.TextBox
    Friend WithEvents DeleteButton As System.Windows.Forms.Button
    Friend WithEvents SchedulingListView As System.Windows.Forms.ListView
    Friend WithEvents CommentsLabel As System.Windows.Forms.Label
    Friend WithEvents CommentsTextBox As System.Windows.Forms.TextBox
End Class
