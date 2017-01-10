<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmDateMatrix
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
        Me.Label1 = New System.Windows.Forms.Label()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.txtDestinationCode = New System.Windows.Forms.TextBox()
        Me.txtDepartureCode = New System.Windows.Forms.TextBox()
        Me.lvCityList = New System.Windows.Forms.Label()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.lbDeparture = New System.Windows.Forms.Label()
        Me.btnAdd = New System.Windows.Forms.Button()
        Me.btnDelete = New System.Windows.Forms.Button()
        Me.lvDateMatrix = New System.Windows.Forms.ListView()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.DtpDepartureDateFrom = New System.Windows.Forms.DateTimePicker()
        Me.DtpDepartureDateTo = New System.Windows.Forms.DateTimePicker()
        Me.DtpReturnDate = New System.Windows.Forms.DateTimePicker()
        Me.lbDateMatrixID = New System.Windows.Forms.Label()
        Me.SuspendLayout()
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(233, 298)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(103, 15)
        Me.Label1.TabIndex = 25
        Me.Label1.Text = "DestinationCode:"
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label3.Location = New System.Drawing.Point(233, 269)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(95, 15)
        Me.Label3.TabIndex = 23
        Me.Label3.Text = "DepartureCode:"
        '
        'txtDestinationCode
        '
        Me.txtDestinationCode.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.txtDestinationCode.Location = New System.Drawing.Point(339, 295)
        Me.txtDestinationCode.Name = "txtDestinationCode"
        Me.txtDestinationCode.Size = New System.Drawing.Size(100, 21)
        Me.txtDestinationCode.TabIndex = 17
        '
        'txtDepartureCode
        '
        Me.txtDepartureCode.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.txtDepartureCode.Location = New System.Drawing.Point(339, 267)
        Me.txtDepartureCode.Name = "txtDepartureCode"
        Me.txtDepartureCode.Size = New System.Drawing.Size(100, 21)
        Me.txtDepartureCode.TabIndex = 15
        '
        'lvCityList
        '
        Me.lvCityList.AutoSize = True
        Me.lvCityList.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lvCityList.Location = New System.Drawing.Point(12, 9)
        Me.lvCityList.Name = "lvCityList"
        Me.lvCityList.Size = New System.Drawing.Size(90, 15)
        Me.lvCityList.TabIndex = 21
        Me.lvCityList.Text = "Date Matrix List"
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label2.Location = New System.Drawing.Point(8, 300)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(81, 15)
        Me.Label2.TabIndex = 24
        Me.Label2.Text = "Dept Date To:"
        '
        'lbDeparture
        '
        Me.lbDeparture.AutoSize = True
        Me.lbDeparture.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbDeparture.Location = New System.Drawing.Point(8, 270)
        Me.lbDeparture.Name = "lbDeparture"
        Me.lbDeparture.Size = New System.Drawing.Size(97, 15)
        Me.lbDeparture.TabIndex = 22
        Me.lbDeparture.Text = "Dept Date From:"
        '
        'btnAdd
        '
        Me.btnAdd.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnAdd.Location = New System.Drawing.Point(273, 324)
        Me.btnAdd.Name = "btnAdd"
        Me.btnAdd.Size = New System.Drawing.Size(75, 23)
        Me.btnAdd.TabIndex = 18
        Me.btnAdd.Text = "Add"
        Me.btnAdd.UseVisualStyleBackColor = True
        '
        'btnDelete
        '
        Me.btnDelete.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnDelete.Location = New System.Drawing.Point(364, 324)
        Me.btnDelete.Name = "btnDelete"
        Me.btnDelete.Size = New System.Drawing.Size(75, 23)
        Me.btnDelete.TabIndex = 19
        Me.btnDelete.Text = "Delete"
        Me.btnDelete.UseVisualStyleBackColor = True
        '
        'lvDateMatrix
        '
        Me.lvDateMatrix.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lvDateMatrix.FullRowSelect = True
        Me.lvDateMatrix.GridLines = True
        Me.lvDateMatrix.Location = New System.Drawing.Point(8, 29)
        Me.lvDateMatrix.MultiSelect = False
        Me.lvDateMatrix.Name = "lvDateMatrix"
        Me.lvDateMatrix.Size = New System.Drawing.Size(578, 228)
        Me.lvDateMatrix.TabIndex = 13
        Me.lvDateMatrix.UseCompatibleStateImageBehavior = False
        Me.lvDateMatrix.View = System.Windows.Forms.View.Details
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label4.Location = New System.Drawing.Point(8, 329)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(76, 15)
        Me.Label4.TabIndex = 27
        Me.Label4.Text = "Return Date:"
        '
        'DtpDepartureDateFrom
        '
        Me.DtpDepartureDateFrom.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateFrom.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateFrom.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DtpDepartureDateFrom.Location = New System.Drawing.Point(105, 268)
        Me.DtpDepartureDateFrom.Name = "DtpDepartureDateFrom"
        Me.DtpDepartureDateFrom.Size = New System.Drawing.Size(121, 21)
        Me.DtpDepartureDateFrom.TabIndex = 28
        '
        'DtpDepartureDateTo
        '
        Me.DtpDepartureDateTo.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateTo.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpDepartureDateTo.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DtpDepartureDateTo.Location = New System.Drawing.Point(105, 296)
        Me.DtpDepartureDateTo.Name = "DtpDepartureDateTo"
        Me.DtpDepartureDateTo.Size = New System.Drawing.Size(121, 21)
        Me.DtpDepartureDateTo.TabIndex = 29
        '
        'DtpReturnDate
        '
        Me.DtpReturnDate.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpReturnDate.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DtpReturnDate.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DtpReturnDate.Location = New System.Drawing.Point(105, 326)
        Me.DtpReturnDate.Name = "DtpReturnDate"
        Me.DtpReturnDate.Size = New System.Drawing.Size(121, 21)
        Me.DtpReturnDate.TabIndex = 30
        '
        'lbDateMatrixID
        '
        Me.lbDateMatrixID.AutoSize = True
        Me.lbDateMatrixID.Location = New System.Drawing.Point(475, 274)
        Me.lbDateMatrixID.Name = "lbDateMatrixID"
        Me.lbDateMatrixID.Size = New System.Drawing.Size(39, 13)
        Me.lbDateMatrixID.TabIndex = 31
        Me.lbDateMatrixID.Text = "Label5"
        Me.lbDateMatrixID.Visible = False
        '
        'FrmDateMatrix
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(594, 372)
        Me.Controls.Add(Me.lbDateMatrixID)
        Me.Controls.Add(Me.DtpReturnDate)
        Me.Controls.Add(Me.DtpDepartureDateTo)
        Me.Controls.Add(Me.DtpDepartureDateFrom)
        Me.Controls.Add(Me.Label4)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.Label3)
        Me.Controls.Add(Me.txtDestinationCode)
        Me.Controls.Add(Me.txtDepartureCode)
        Me.Controls.Add(Me.lvCityList)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.lbDeparture)
        Me.Controls.Add(Me.btnAdd)
        Me.Controls.Add(Me.btnDelete)
        Me.Controls.Add(Me.lvDateMatrix)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.MaximizeBox = False
        Me.Name = "FrmDateMatrix"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Config Date Matrix "
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents txtDestinationCode As System.Windows.Forms.TextBox
    Friend WithEvents txtDepartureCode As System.Windows.Forms.TextBox
    Friend WithEvents lvCityList As System.Windows.Forms.Label
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents lbDeparture As System.Windows.Forms.Label
    Friend WithEvents btnAdd As System.Windows.Forms.Button
    Friend WithEvents btnDelete As System.Windows.Forms.Button
    Friend WithEvents lvDateMatrix As System.Windows.Forms.ListView
    Friend WithEvents Label4 As System.Windows.Forms.Label
    Friend WithEvents DtpDepartureDateFrom As System.Windows.Forms.DateTimePicker
    Friend WithEvents DtpDepartureDateTo As System.Windows.Forms.DateTimePicker
    Friend WithEvents DtpReturnDate As System.Windows.Forms.DateTimePicker
    Friend WithEvents lbDateMatrixID As System.Windows.Forms.Label
End Class
