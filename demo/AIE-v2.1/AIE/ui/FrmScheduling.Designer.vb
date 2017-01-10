<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmScheduling
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
        Me.CommentsLabel = New System.Windows.Forms.Label()
        Me.StringValueLabel = New System.Windows.Forms.Label()
        Me.ItemKeyLabel = New System.Windows.Forms.Label()
        Me.ReturnInDaysTextBox = New System.Windows.Forms.TextBox()
        Me.DestinationCityTextBox = New System.Windows.Forms.TextBox()
        Me.SchedulingLabel = New System.Windows.Forms.Label()
        Me.IntValueLabel = New System.Windows.Forms.Label()
        Me.DepartureDateLabel = New System.Windows.Forms.Label()
        Me.UpdateButton = New System.Windows.Forms.Button()
        Me.AddButton = New System.Windows.Forms.Button()
        Me.DepartureCityTextBox = New System.Windows.Forms.TextBox()
        Me.DeleteButton = New System.Windows.Forms.Button()
        Me.SchedulingListView = New System.Windows.Forms.ListView()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.ExceptionIDTextBox = New System.Windows.Forms.TextBox()
        Me.DepartureDatePicker = New System.Windows.Forms.DateTimePicker()
        Me.StatusComboBox = New System.Windows.Forms.ComboBox()
        Me.SuspendLayout()
        '
        'CommentsLabel
        '
        Me.CommentsLabel.AutoSize = True
        Me.CommentsLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CommentsLabel.Location = New System.Drawing.Point(7, 381)
        Me.CommentsLabel.Name = "CommentsLabel"
        Me.CommentsLabel.Size = New System.Drawing.Size(46, 16)
        Me.CommentsLabel.TabIndex = 42
        Me.CommentsLabel.Text = "Satus:"
        '
        'StringValueLabel
        '
        Me.StringValueLabel.AutoSize = True
        Me.StringValueLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.StringValueLabel.Location = New System.Drawing.Point(228, 322)
        Me.StringValueLabel.Name = "StringValueLabel"
        Me.StringValueLabel.Size = New System.Drawing.Size(98, 16)
        Me.StringValueLabel.TabIndex = 40
        Me.StringValueLabel.Text = "Return In Days:"
        '
        'ItemKeyLabel
        '
        Me.ItemKeyLabel.AutoSize = True
        Me.ItemKeyLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ItemKeyLabel.Location = New System.Drawing.Point(228, 352)
        Me.ItemKeyLabel.Name = "ItemKeyLabel"
        Me.ItemKeyLabel.Size = New System.Drawing.Size(102, 16)
        Me.ItemKeyLabel.TabIndex = 38
        Me.ItemKeyLabel.Text = "Destination city:"
        '
        'ReturnInDaysTextBox
        '
        Me.ReturnInDaysTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ReturnInDaysTextBox.Location = New System.Drawing.Point(343, 316)
        Me.ReturnInDaysTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.ReturnInDaysTextBox.Name = "ReturnInDaysTextBox"
        Me.ReturnInDaysTextBox.Size = New System.Drawing.Size(116, 21)
        Me.ReturnInDaysTextBox.TabIndex = 32
        '
        'DestinationCityTextBox
        '
        Me.DestinationCityTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DestinationCityTextBox.Location = New System.Drawing.Point(343, 349)
        Me.DestinationCityTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.DestinationCityTextBox.Name = "DestinationCityTextBox"
        Me.DestinationCityTextBox.Size = New System.Drawing.Size(116, 21)
        Me.DestinationCityTextBox.TabIndex = 30
        '
        'SchedulingLabel
        '
        Me.SchedulingLabel.AutoSize = True
        Me.SchedulingLabel.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.SchedulingLabel.Location = New System.Drawing.Point(14, 12)
        Me.SchedulingLabel.Name = "SchedulingLabel"
        Me.SchedulingLabel.Size = New System.Drawing.Size(107, 16)
        Me.SchedulingLabel.TabIndex = 36
        Me.SchedulingLabel.Text = "Scheduling Status"
        '
        'IntValueLabel
        '
        Me.IntValueLabel.AutoSize = True
        Me.IntValueLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.IntValueLabel.Location = New System.Drawing.Point(7, 352)
        Me.IntValueLabel.Name = "IntValueLabel"
        Me.IntValueLabel.Size = New System.Drawing.Size(95, 16)
        Me.IntValueLabel.TabIndex = 39
        Me.IntValueLabel.Text = "Departure City:"
        '
        'DepartureDateLabel
        '
        Me.DepartureDateLabel.AutoSize = True
        Me.DepartureDateLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDateLabel.Location = New System.Drawing.Point(7, 321)
        Me.DepartureDateLabel.Name = "DepartureDateLabel"
        Me.DepartureDateLabel.Size = New System.Drawing.Size(99, 16)
        Me.DepartureDateLabel.TabIndex = 37
        Me.DepartureDateLabel.Text = "Departure Date:"
        '
        'UpdateButton
        '
        Me.UpdateButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.UpdateButton.Location = New System.Drawing.Point(501, 347)
        Me.UpdateButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.UpdateButton.Name = "UpdateButton"
        Me.UpdateButton.Size = New System.Drawing.Size(87, 30)
        Me.UpdateButton.TabIndex = 35
        Me.UpdateButton.Text = "Update"
        Me.UpdateButton.UseVisualStyleBackColor = True
        '
        'AddButton
        '
        Me.AddButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.AddButton.Location = New System.Drawing.Point(501, 313)
        Me.AddButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.AddButton.Name = "AddButton"
        Me.AddButton.Size = New System.Drawing.Size(87, 30)
        Me.AddButton.TabIndex = 33
        Me.AddButton.Text = "Add"
        Me.AddButton.UseVisualStyleBackColor = True
        '
        'DepartureCityTextBox
        '
        Me.DepartureCityTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureCityTextBox.Location = New System.Drawing.Point(106, 349)
        Me.DepartureCityTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.DepartureCityTextBox.Name = "DepartureCityTextBox"
        Me.DepartureCityTextBox.Size = New System.Drawing.Size(116, 21)
        Me.DepartureCityTextBox.TabIndex = 31
        '
        'DeleteButton
        '
        Me.DeleteButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.DeleteButton.Location = New System.Drawing.Point(501, 380)
        Me.DeleteButton.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.DeleteButton.Name = "DeleteButton"
        Me.DeleteButton.Size = New System.Drawing.Size(87, 30)
        Me.DeleteButton.TabIndex = 34
        Me.DeleteButton.Text = "Delete"
        Me.DeleteButton.UseVisualStyleBackColor = True
        '
        'SchedulingListView
        '
        Me.SchedulingListView.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.SchedulingListView.FullRowSelect = True
        Me.SchedulingListView.GridLines = True
        Me.SchedulingListView.Location = New System.Drawing.Point(14, 35)
        Me.SchedulingListView.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.SchedulingListView.MultiSelect = False
        Me.SchedulingListView.Name = "SchedulingListView"
        Me.SchedulingListView.Size = New System.Drawing.Size(717, 267)
        Me.SchedulingListView.TabIndex = 28
        Me.SchedulingListView.UseCompatibleStateImageBehavior = False
        Me.SchedulingListView.View = System.Windows.Forms.View.Details
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(228, 381)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(86, 16)
        Me.Label1.TabIndex = 44
        Me.Label1.Text = "Exception ID:"
        '
        'ExceptionIDTextBox
        '
        Me.ExceptionIDTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ExceptionIDTextBox.Location = New System.Drawing.Point(343, 380)
        Me.ExceptionIDTextBox.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.ExceptionIDTextBox.Name = "ExceptionIDTextBox"
        Me.ExceptionIDTextBox.Size = New System.Drawing.Size(116, 21)
        Me.ExceptionIDTextBox.TabIndex = 43
        '
        'DepartureDatePicker
        '
        Me.DepartureDatePicker.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDatePicker.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDatePicker.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DepartureDatePicker.Location = New System.Drawing.Point(106, 318)
        Me.DepartureDatePicker.Name = "DepartureDatePicker"
        Me.DepartureDatePicker.Size = New System.Drawing.Size(116, 21)
        Me.DepartureDatePicker.TabIndex = 45
        '
        'StatusComboBox
        '
        Me.StatusComboBox.FormattingEnabled = True
        Me.StatusComboBox.Location = New System.Drawing.Point(106, 380)
        Me.StatusComboBox.Name = "StatusComboBox"
        Me.StatusComboBox.Size = New System.Drawing.Size(116, 23)
        Me.StatusComboBox.TabIndex = 46
        '
        'FrmScheduling
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 15.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(744, 422)
        Me.Controls.Add(Me.StatusComboBox)
        Me.Controls.Add(Me.DepartureDatePicker)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.ExceptionIDTextBox)
        Me.Controls.Add(Me.CommentsLabel)
        Me.Controls.Add(Me.StringValueLabel)
        Me.Controls.Add(Me.ItemKeyLabel)
        Me.Controls.Add(Me.ReturnInDaysTextBox)
        Me.Controls.Add(Me.DestinationCityTextBox)
        Me.Controls.Add(Me.SchedulingLabel)
        Me.Controls.Add(Me.IntValueLabel)
        Me.Controls.Add(Me.DepartureDateLabel)
        Me.Controls.Add(Me.UpdateButton)
        Me.Controls.Add(Me.AddButton)
        Me.Controls.Add(Me.DepartureCityTextBox)
        Me.Controls.Add(Me.DeleteButton)
        Me.Controls.Add(Me.SchedulingListView)
        Me.Font = New System.Drawing.Font("Microsoft Sans Serif", 9.0!)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Name = "FrmScheduling"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Scheduling"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents CommentsLabel As System.Windows.Forms.Label
    Friend WithEvents StringValueLabel As System.Windows.Forms.Label
    Friend WithEvents ItemKeyLabel As System.Windows.Forms.Label
    Friend WithEvents ReturnInDaysTextBox As System.Windows.Forms.TextBox
    Friend WithEvents DestinationCityTextBox As System.Windows.Forms.TextBox
    Friend WithEvents SchedulingLabel As System.Windows.Forms.Label
    Friend WithEvents IntValueLabel As System.Windows.Forms.Label
    Friend WithEvents DepartureDateLabel As System.Windows.Forms.Label
    Friend WithEvents UpdateButton As System.Windows.Forms.Button
    Friend WithEvents AddButton As System.Windows.Forms.Button
    Friend WithEvents DepartureCityTextBox As System.Windows.Forms.TextBox
    Friend WithEvents DeleteButton As System.Windows.Forms.Button
    Friend WithEvents SchedulingListView As System.Windows.Forms.ListView
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents ExceptionIDTextBox As System.Windows.Forms.TextBox
    Friend WithEvents DepartureDatePicker As System.Windows.Forms.DateTimePicker
    Friend WithEvents StatusComboBox As System.Windows.Forms.ComboBox
End Class
