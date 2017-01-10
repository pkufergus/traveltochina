<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmQuery
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
        Me.gbQuery = New System.Windows.Forms.GroupBox()
        Me.ExportButton = New System.Windows.Forms.Button()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.DtpDepartureDateTo = New System.Windows.Forms.DateTimePicker()
        Me.DtpDepartureDateFrom = New System.Windows.Forms.DateTimePicker()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.cbDestination = New System.Windows.Forms.ComboBox()
        Me.cbDeparture = New System.Windows.Forms.ComboBox()
        Me.BtnQuery = New System.Windows.Forms.Button()
        Me.lvResult = New System.Windows.Forms.ListView()
        Me.statusbar = New System.Windows.Forms.StatusStrip()
        Me.ExcelSaveFileDialog = New System.Windows.Forms.SaveFileDialog()
        Me.SpinningLabel = New System.Windows.Forms.PictureBox()
        Me.gbQuery.SuspendLayout()
        CType(Me.SpinningLabel, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'gbQuery
        '
        Me.gbQuery.Anchor = CType(((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.gbQuery.Controls.Add(Me.ExportButton)
        Me.gbQuery.Controls.Add(Me.Label4)
        Me.gbQuery.Controls.Add(Me.Label3)
        Me.gbQuery.Controls.Add(Me.DtpDepartureDateTo)
        Me.gbQuery.Controls.Add(Me.DtpDepartureDateFrom)
        Me.gbQuery.Controls.Add(Me.Label2)
        Me.gbQuery.Controls.Add(Me.Label1)
        Me.gbQuery.Controls.Add(Me.cbDestination)
        Me.gbQuery.Controls.Add(Me.cbDeparture)
        Me.gbQuery.Controls.Add(Me.BtnQuery)
        Me.gbQuery.Location = New System.Drawing.Point(12, 12)
        Me.gbQuery.Name = "gbQuery"
        Me.gbQuery.Size = New System.Drawing.Size(785, 130)
        Me.gbQuery.TabIndex = 0
        Me.gbQuery.TabStop = False
        '
        'ExportButton
        '
        Me.ExportButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.ExportButton.Location = New System.Drawing.Point(361, 93)
        Me.ExportButton.Name = "ExportButton"
        Me.ExportButton.Size = New System.Drawing.Size(80, 30)
        Me.ExportButton.TabIndex = 19
        Me.ExportButton.Text = "Export"
        Me.ExportButton.UseVisualStyleBackColor = True
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label4.Location = New System.Drawing.Point(0, 100)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(104, 16)
        Me.Label4.TabIndex = 18
        Me.Label4.Text = "Destination City:"
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label3.Location = New System.Drawing.Point(0, 71)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(95, 16)
        Me.Label3.TabIndex = 17
        Me.Label3.Text = "Departure City:"
        '
        'DtpDepartureDateTo
        '
        Me.DtpDepartureDateTo.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateTo.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateTo.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DtpDepartureDateTo.Location = New System.Drawing.Point(134, 41)
        Me.DtpDepartureDateTo.Name = "DtpDepartureDateTo"
        Me.DtpDepartureDateTo.Size = New System.Drawing.Size(121, 21)
        Me.DtpDepartureDateTo.TabIndex = 16
        '
        'DtpDepartureDateFrom
        '
        Me.DtpDepartureDateFrom.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateFrom.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateFrom.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DtpDepartureDateFrom.Location = New System.Drawing.Point(134, 14)
        Me.DtpDepartureDateFrom.Name = "DtpDepartureDateFrom"
        Me.DtpDepartureDateFrom.Size = New System.Drawing.Size(121, 21)
        Me.DtpDepartureDateFrom.TabIndex = 15
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label2.Location = New System.Drawing.Point(0, 43)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(116, 16)
        Me.Label2.TabIndex = 4
        Me.Label2.Text = "Departure Date To:"
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(0, 15)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(133, 16)
        Me.Label1.TabIndex = 3
        Me.Label1.Text = "Departure Date From:"
        '
        'cbDestination
        '
        Me.cbDestination.FormattingEnabled = True
        Me.cbDestination.Location = New System.Drawing.Point(134, 97)
        Me.cbDestination.Name = "cbDestination"
        Me.cbDestination.Size = New System.Drawing.Size(121, 21)
        Me.cbDestination.TabIndex = 2
        '
        'cbDeparture
        '
        Me.cbDeparture.FormattingEnabled = True
        Me.cbDeparture.Location = New System.Drawing.Point(134, 68)
        Me.cbDeparture.Name = "cbDeparture"
        Me.cbDeparture.Size = New System.Drawing.Size(121, 21)
        Me.cbDeparture.TabIndex = 1
        '
        'BtnQuery
        '
        Me.BtnQuery.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.BtnQuery.Location = New System.Drawing.Point(275, 93)
        Me.BtnQuery.Name = "BtnQuery"
        Me.BtnQuery.Size = New System.Drawing.Size(80, 30)
        Me.BtnQuery.TabIndex = 0
        Me.BtnQuery.Text = "Query"
        Me.BtnQuery.UseVisualStyleBackColor = True
        '
        'lvResult
        '
        Me.lvResult.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.lvResult.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.lvResult.FullRowSelect = True
        Me.lvResult.GridLines = True
        Me.lvResult.Location = New System.Drawing.Point(12, 148)
        Me.lvResult.Name = "lvResult"
        Me.lvResult.Size = New System.Drawing.Size(785, 363)
        Me.lvResult.TabIndex = 1
        Me.lvResult.UseCompatibleStateImageBehavior = False
        Me.lvResult.View = System.Windows.Forms.View.Details
        '
        'statusbar
        '
        Me.statusbar.Location = New System.Drawing.Point(0, 514)
        Me.statusbar.Name = "statusbar"
        Me.statusbar.Size = New System.Drawing.Size(809, 22)
        Me.statusbar.TabIndex = 2
        Me.statusbar.Text = "Total:"
        '
        'SpinningLabel
        '
        Me.SpinningLabel.Image = Global.AIE.My.Resources.Resources.Searching
        Me.SpinningLabel.Location = New System.Drawing.Point(214, 197)
        Me.SpinningLabel.Name = "SpinningLabel"
        Me.SpinningLabel.Size = New System.Drawing.Size(397, 42)
        Me.SpinningLabel.TabIndex = 20
        Me.SpinningLabel.TabStop = False
        '
        'FrmQuery
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(809, 536)
        Me.Controls.Add(Me.SpinningLabel)
        Me.Controls.Add(Me.statusbar)
        Me.Controls.Add(Me.lvResult)
        Me.Controls.Add(Me.gbQuery)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Name = "FrmQuery"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "AIE Result Query"
        Me.gbQuery.ResumeLayout(False)
        Me.gbQuery.PerformLayout()
        CType(Me.SpinningLabel, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents gbQuery As System.Windows.Forms.GroupBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents cbDestination As System.Windows.Forms.ComboBox
    Friend WithEvents cbDeparture As System.Windows.Forms.ComboBox
    Friend WithEvents BtnQuery As System.Windows.Forms.Button
    Friend WithEvents Label4 As System.Windows.Forms.Label
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents DtpDepartureDateTo As System.Windows.Forms.DateTimePicker
    Friend WithEvents DtpDepartureDateFrom As System.Windows.Forms.DateTimePicker
    Friend WithEvents lvResult As System.Windows.Forms.ListView
    Friend WithEvents statusbar As System.Windows.Forms.StatusStrip
    Friend WithEvents ExportButton As System.Windows.Forms.Button
    Friend WithEvents ExcelSaveFileDialog As System.Windows.Forms.SaveFileDialog
    Friend WithEvents SpinningLabel As System.Windows.Forms.PictureBox
End Class
