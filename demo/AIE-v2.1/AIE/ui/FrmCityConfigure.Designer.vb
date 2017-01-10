<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmCityConfigure
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
        Me.CityTabControl = New System.Windows.Forms.TabControl()
        Me.DepartureDestinationTabPage = New System.Windows.Forms.TabPage()
        Me.Label5 = New System.Windows.Forms.Label()
        Me.Label6 = New System.Windows.Forms.Label()
        Me.CityCodeTextBox = New System.Windows.Forms.TextBox()
        Me.TraditionalChineseNameTextBox = New System.Windows.Forms.TextBox()
        Me.ChineseNameTextBox = New System.Windows.Forms.TextBox()
        Me.CityNameTextBox = New System.Windows.Forms.TextBox()
        Me.Label7 = New System.Windows.Forms.Label()
        Me.Label8 = New System.Windows.Forms.Label()
        Me.CityDeleteButton = New System.Windows.Forms.Button()
        Me.CityAddButton = New System.Windows.Forms.Button()
        Me.CityUpdateButton = New System.Windows.Forms.Button()
        Me.CityCodeListView = New System.Windows.Forms.ListView()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.CityCodeNameTabPage = New System.Windows.Forms.TabPage()
        Me.CityPairListView = New System.Windows.Forms.ListView()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.btnDelete = New System.Windows.Forms.Button()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.btnAdd = New System.Windows.Forms.Button()
        Me.lvCityList = New System.Windows.Forms.Label()
        Me.btnUpdate = New System.Windows.Forms.Button()
        Me.DepartureComboBox = New System.Windows.Forms.ComboBox()
        Me.DestinationComboBox = New System.Windows.Forms.ComboBox()
        Me.CityTabControl.SuspendLayout()
        Me.DepartureDestinationTabPage.SuspendLayout()
        Me.CityCodeNameTabPage.SuspendLayout()
        Me.SuspendLayout()
        '
        'CityTabControl
        '
        Me.CityTabControl.Controls.Add(Me.DepartureDestinationTabPage)
        Me.CityTabControl.Controls.Add(Me.CityCodeNameTabPage)
        Me.CityTabControl.Location = New System.Drawing.Point(12, 3)
        Me.CityTabControl.Name = "CityTabControl"
        Me.CityTabControl.SelectedIndex = 0
        Me.CityTabControl.Size = New System.Drawing.Size(570, 366)
        Me.CityTabControl.TabIndex = 13
        '
        'DepartureDestinationTabPage
        '
        Me.DepartureDestinationTabPage.BackColor = System.Drawing.SystemColors.ControlLight
        Me.DepartureDestinationTabPage.Controls.Add(Me.Label5)
        Me.DepartureDestinationTabPage.Controls.Add(Me.Label6)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityCodeTextBox)
        Me.DepartureDestinationTabPage.Controls.Add(Me.TraditionalChineseNameTextBox)
        Me.DepartureDestinationTabPage.Controls.Add(Me.ChineseNameTextBox)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityNameTextBox)
        Me.DepartureDestinationTabPage.Controls.Add(Me.Label7)
        Me.DepartureDestinationTabPage.Controls.Add(Me.Label8)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityDeleteButton)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityAddButton)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityUpdateButton)
        Me.DepartureDestinationTabPage.Controls.Add(Me.CityCodeListView)
        Me.DepartureDestinationTabPage.Controls.Add(Me.Label4)
        Me.DepartureDestinationTabPage.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.DepartureDestinationTabPage.Location = New System.Drawing.Point(4, 22)
        Me.DepartureDestinationTabPage.Name = "DepartureDestinationTabPage"
        Me.DepartureDestinationTabPage.Padding = New System.Windows.Forms.Padding(3)
        Me.DepartureDestinationTabPage.Size = New System.Drawing.Size(562, 340)
        Me.DepartureDestinationTabPage.TabIndex = 0
        Me.DepartureDestinationTabPage.Text = "City Code&Name"
        '
        'Label5
        '
        Me.Label5.AutoSize = True
        Me.Label5.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label5.Location = New System.Drawing.Point(222, 270)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(160, 16)
        Me.Label5.TabIndex = 34
        Me.Label5.Text = "Traditional Chinese Name:"
        '
        'Label6
        '
        Me.Label6.AutoSize = True
        Me.Label6.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label6.Location = New System.Drawing.Point(223, 243)
        Me.Label6.Name = "Label6"
        Me.Label6.Size = New System.Drawing.Size(73, 16)
        Me.Label6.TabIndex = 32
        Me.Label6.Text = "City Name:"
        '
        'CityCodeTextBox
        '
        Me.CityCodeTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CityCodeTextBox.Location = New System.Drawing.Point(111, 242)
        Me.CityCodeTextBox.Name = "CityCodeTextBox"
        Me.CityCodeTextBox.Size = New System.Drawing.Size(100, 21)
        Me.CityCodeTextBox.TabIndex = 27
        '
        'TraditionalChineseNameTextBox
        '
        Me.TraditionalChineseNameTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TraditionalChineseNameTextBox.Location = New System.Drawing.Point(384, 270)
        Me.TraditionalChineseNameTextBox.Name = "TraditionalChineseNameTextBox"
        Me.TraditionalChineseNameTextBox.Size = New System.Drawing.Size(100, 21)
        Me.TraditionalChineseNameTextBox.TabIndex = 30
        '
        'ChineseNameTextBox
        '
        Me.ChineseNameTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ChineseNameTextBox.Location = New System.Drawing.Point(111, 270)
        Me.ChineseNameTextBox.Name = "ChineseNameTextBox"
        Me.ChineseNameTextBox.Size = New System.Drawing.Size(100, 21)
        Me.ChineseNameTextBox.TabIndex = 29
        '
        'CityNameTextBox
        '
        Me.CityNameTextBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CityNameTextBox.Location = New System.Drawing.Point(384, 243)
        Me.CityNameTextBox.Name = "CityNameTextBox"
        Me.CityNameTextBox.Size = New System.Drawing.Size(100, 21)
        Me.CityNameTextBox.TabIndex = 28
        '
        'Label7
        '
        Me.Label7.AutoSize = True
        Me.Label7.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label7.Location = New System.Drawing.Point(15, 270)
        Me.Label7.Name = "Label7"
        Me.Label7.Size = New System.Drawing.Size(97, 16)
        Me.Label7.TabIndex = 33
        Me.Label7.Text = "Chinese Name:"
        '
        'Label8
        '
        Me.Label8.AutoSize = True
        Me.Label8.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label8.Location = New System.Drawing.Point(15, 243)
        Me.Label8.Name = "Label8"
        Me.Label8.Size = New System.Drawing.Size(69, 16)
        Me.Label8.TabIndex = 31
        Me.Label8.Text = "City Code:"
        '
        'CityDeleteButton
        '
        Me.CityDeleteButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.CityDeleteButton.Location = New System.Drawing.Point(404, 300)
        Me.CityDeleteButton.Name = "CityDeleteButton"
        Me.CityDeleteButton.Size = New System.Drawing.Size(80, 30)
        Me.CityDeleteButton.TabIndex = 25
        Me.CityDeleteButton.Text = "Delete"
        Me.CityDeleteButton.UseVisualStyleBackColor = True
        '
        'CityAddButton
        '
        Me.CityAddButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.CityAddButton.Location = New System.Drawing.Point(232, 300)
        Me.CityAddButton.Name = "CityAddButton"
        Me.CityAddButton.Size = New System.Drawing.Size(80, 30)
        Me.CityAddButton.TabIndex = 24
        Me.CityAddButton.Text = "Add"
        Me.CityAddButton.UseVisualStyleBackColor = True
        '
        'CityUpdateButton
        '
        Me.CityUpdateButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.CityUpdateButton.Location = New System.Drawing.Point(318, 300)
        Me.CityUpdateButton.Name = "CityUpdateButton"
        Me.CityUpdateButton.Size = New System.Drawing.Size(80, 30)
        Me.CityUpdateButton.TabIndex = 26
        Me.CityUpdateButton.Text = "Update"
        Me.CityUpdateButton.UseVisualStyleBackColor = True
        '
        'CityCodeListView
        '
        Me.CityCodeListView.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CityCodeListView.FullRowSelect = True
        Me.CityCodeListView.GridLines = True
        Me.CityCodeListView.Location = New System.Drawing.Point(16, 32)
        Me.CityCodeListView.MultiSelect = False
        Me.CityCodeListView.Name = "CityCodeListView"
        Me.CityCodeListView.Size = New System.Drawing.Size(526, 204)
        Me.CityCodeListView.TabIndex = 22
        Me.CityCodeListView.UseCompatibleStateImageBehavior = False
        Me.CityCodeListView.View = System.Windows.Forms.View.Details
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label4.Location = New System.Drawing.Point(17, 10)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(90, 16)
        Me.Label4.TabIndex = 23
        Me.Label4.Text = "City Code List"
        '
        'CityCodeNameTabPage
        '
        Me.CityCodeNameTabPage.BackColor = System.Drawing.SystemColors.ControlLight
        Me.CityCodeNameTabPage.Controls.Add(Me.DestinationComboBox)
        Me.CityCodeNameTabPage.Controls.Add(Me.DepartureComboBox)
        Me.CityCodeNameTabPage.Controls.Add(Me.CityPairListView)
        Me.CityCodeNameTabPage.Controls.Add(Me.Label1)
        Me.CityCodeNameTabPage.Controls.Add(Me.btnDelete)
        Me.CityCodeNameTabPage.Controls.Add(Me.Label3)
        Me.CityCodeNameTabPage.Controls.Add(Me.btnAdd)
        Me.CityCodeNameTabPage.Controls.Add(Me.lvCityList)
        Me.CityCodeNameTabPage.Controls.Add(Me.btnUpdate)
        Me.CityCodeNameTabPage.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.CityCodeNameTabPage.Location = New System.Drawing.Point(4, 22)
        Me.CityCodeNameTabPage.Name = "CityCodeNameTabPage"
        Me.CityCodeNameTabPage.Padding = New System.Windows.Forms.Padding(3)
        Me.CityCodeNameTabPage.Size = New System.Drawing.Size(562, 340)
        Me.CityCodeNameTabPage.TabIndex = 1
        Me.CityCodeNameTabPage.Text = "Departure&Destination"
        '
        'CityPairListView
        '
        Me.CityPairListView.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CityPairListView.FullRowSelect = True
        Me.CityPairListView.GridLines = True
        Me.CityPairListView.Location = New System.Drawing.Point(20, 30)
        Me.CityPairListView.MultiSelect = False
        Me.CityPairListView.Name = "CityPairListView"
        Me.CityPairListView.Size = New System.Drawing.Size(526, 204)
        Me.CityPairListView.TabIndex = 13
        Me.CityPairListView.UseCompatibleStateImageBehavior = False
        Me.CityPairListView.View = System.Windows.Forms.View.Details
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(234, 248)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(111, 16)
        Me.Label1.TabIndex = 25
        Me.Label1.Text = "Destination Code:"
        '
        'btnDelete
        '
        Me.btnDelete.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.btnDelete.Location = New System.Drawing.Point(367, 288)
        Me.btnDelete.Name = "btnDelete"
        Me.btnDelete.Size = New System.Drawing.Size(80, 30)
        Me.btnDelete.TabIndex = 19
        Me.btnDelete.Text = "Delete"
        Me.btnDelete.UseVisualStyleBackColor = True
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label3.Location = New System.Drawing.Point(20, 248)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(102, 16)
        Me.Label3.TabIndex = 23
        Me.Label3.Text = "Departure Code:"
        '
        'btnAdd
        '
        Me.btnAdd.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.btnAdd.Location = New System.Drawing.Point(195, 288)
        Me.btnAdd.Name = "btnAdd"
        Me.btnAdd.Size = New System.Drawing.Size(80, 30)
        Me.btnAdd.TabIndex = 18
        Me.btnAdd.Text = "Add"
        Me.btnAdd.UseVisualStyleBackColor = True
        '
        'lvCityList
        '
        Me.lvCityList.AutoSize = True
        Me.lvCityList.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lvCityList.Location = New System.Drawing.Point(18, 8)
        Me.lvCityList.Name = "lvCityList"
        Me.lvCityList.Size = New System.Drawing.Size(183, 16)
        Me.lvCityList.TabIndex = 21
        Me.lvCityList.Text = "Departure and Destination List"
        '
        'btnUpdate
        '
        Me.btnUpdate.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.btnUpdate.Location = New System.Drawing.Point(281, 288)
        Me.btnUpdate.Name = "btnUpdate"
        Me.btnUpdate.Size = New System.Drawing.Size(80, 30)
        Me.btnUpdate.TabIndex = 20
        Me.btnUpdate.Text = "Update"
        Me.btnUpdate.UseVisualStyleBackColor = True
        '
        'DepartureComboBox
        '
        Me.DepartureComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.DepartureComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureComboBox.FormattingEnabled = True
        Me.DepartureComboBox.Items.AddRange(New Object() {"New York"})
        Me.DepartureComboBox.Location = New System.Drawing.Point(119, 246)
        Me.DepartureComboBox.Name = "DepartureComboBox"
        Me.DepartureComboBox.Size = New System.Drawing.Size(109, 23)
        Me.DepartureComboBox.TabIndex = 26
        '
        'DestinationComboBox
        '
        Me.DestinationComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.DestinationComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DestinationComboBox.FormattingEnabled = True
        Me.DestinationComboBox.Items.AddRange(New Object() {"New York"})
        Me.DestinationComboBox.Location = New System.Drawing.Point(344, 246)
        Me.DestinationComboBox.Name = "DestinationComboBox"
        Me.DestinationComboBox.Size = New System.Drawing.Size(109, 23)
        Me.DestinationComboBox.TabIndex = 27
        '
        'FrmCityConfigure
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(594, 372)
        Me.Controls.Add(Me.CityTabControl)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.MaximizeBox = False
        Me.Name = "FrmCityConfigure"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "City Configure"
        Me.CityTabControl.ResumeLayout(False)
        Me.DepartureDestinationTabPage.ResumeLayout(False)
        Me.DepartureDestinationTabPage.PerformLayout()
        Me.CityCodeNameTabPage.ResumeLayout(False)
        Me.CityCodeNameTabPage.PerformLayout()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents CityTabControl As System.Windows.Forms.TabControl
    Friend WithEvents DepartureDestinationTabPage As System.Windows.Forms.TabPage
    Friend WithEvents CityCodeNameTabPage As System.Windows.Forms.TabPage
    Friend WithEvents CityCodeListView As System.Windows.Forms.ListView
    Friend WithEvents Label4 As System.Windows.Forms.Label
    Friend WithEvents CityPairListView As System.Windows.Forms.ListView
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents btnDelete As System.Windows.Forms.Button
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents btnAdd As System.Windows.Forms.Button
    Friend WithEvents lvCityList As System.Windows.Forms.Label
    Friend WithEvents btnUpdate As System.Windows.Forms.Button
    Friend WithEvents Label5 As System.Windows.Forms.Label
    Friend WithEvents Label6 As System.Windows.Forms.Label
    Friend WithEvents CityCodeTextBox As System.Windows.Forms.TextBox
    Friend WithEvents TraditionalChineseNameTextBox As System.Windows.Forms.TextBox
    Friend WithEvents ChineseNameTextBox As System.Windows.Forms.TextBox
    Friend WithEvents CityNameTextBox As System.Windows.Forms.TextBox
    Friend WithEvents Label7 As System.Windows.Forms.Label
    Friend WithEvents Label8 As System.Windows.Forms.Label
    Friend WithEvents CityDeleteButton As System.Windows.Forms.Button
    Friend WithEvents CityAddButton As System.Windows.Forms.Button
    Friend WithEvents CityUpdateButton As System.Windows.Forms.Button
    Friend WithEvents DestinationComboBox As System.Windows.Forms.ComboBox
    Friend WithEvents DepartureComboBox As System.Windows.Forms.ComboBox
End Class
