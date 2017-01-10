<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmException
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
        Me.ResultListView = New System.Windows.Forms.ListView()
        Me.IDColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DepartureDateColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.ReturnDateColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.PriceColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DepartureCityColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DestinationCityColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.URLColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.QueryExceptionButton = New System.Windows.Forms.Button()
        Me.HandleExceptionButton = New System.Windows.Forms.Button()
        Me.DepartureComboBox = New System.Windows.Forms.ComboBox()
        Me.DepartureCityLabel = New System.Windows.Forms.Label()
        Me.StatusBarStrip = New System.Windows.Forms.StatusStrip()
        Me.TotalStatusLabel = New System.Windows.Forms.ToolStripStatusLabel()
        Me.RunningStatusLabel = New System.Windows.Forms.ToolStripStatusLabel()
        Me.StatusBarStrip.SuspendLayout()
        Me.SuspendLayout()
        '
        'ResultListView
        '
        Me.ResultListView.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.ResultListView.Columns.AddRange(New System.Windows.Forms.ColumnHeader() {Me.IDColumn, Me.DepartureDateColumn, Me.ReturnDateColumn, Me.PriceColumn, Me.DepartureCityColumn, Me.DestinationCityColumn, Me.URLColumn})
        Me.ResultListView.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ResultListView.FullRowSelect = True
        Me.ResultListView.GridLines = True
        Me.ResultListView.Location = New System.Drawing.Point(12, 61)
        Me.ResultListView.MultiSelect = False
        Me.ResultListView.Name = "ResultListView"
        Me.ResultListView.Size = New System.Drawing.Size(776, 388)
        Me.ResultListView.TabIndex = 1
        Me.ResultListView.UseCompatibleStateImageBehavior = False
        Me.ResultListView.View = System.Windows.Forms.View.Details
        '
        'IDColumn
        '
        Me.IDColumn.Text = "ID"
        Me.IDColumn.Width = 47
        '
        'DepartureDateColumn
        '
        Me.DepartureDateColumn.Text = "Departure Date"
        Me.DepartureDateColumn.Width = 130
        '
        'ReturnDateColumn
        '
        Me.ReturnDateColumn.Text = "Return Date"
        Me.ReturnDateColumn.TextAlign = System.Windows.Forms.HorizontalAlignment.Center
        Me.ReturnDateColumn.Width = 129
        '
        'PriceColumn
        '
        Me.PriceColumn.Text = "Price"
        Me.PriceColumn.TextAlign = System.Windows.Forms.HorizontalAlignment.Center
        Me.PriceColumn.Width = 92
        '
        'DepartureCityColumn
        '
        Me.DepartureCityColumn.Text = "Departure City"
        Me.DepartureCityColumn.TextAlign = System.Windows.Forms.HorizontalAlignment.Center
        Me.DepartureCityColumn.Width = 99
        '
        'DestinationCityColumn
        '
        Me.DestinationCityColumn.Text = "Destination City"
        Me.DestinationCityColumn.Width = 104
        '
        'URLColumn
        '
        Me.URLColumn.Text = "URL"
        Me.URLColumn.Width = 400
        '
        'QueryExceptionButton
        '
        Me.QueryExceptionButton.Location = New System.Drawing.Point(233, 17)
        Me.QueryExceptionButton.Name = "QueryExceptionButton"
        Me.QueryExceptionButton.Size = New System.Drawing.Size(100, 30)
        Me.QueryExceptionButton.TabIndex = 2
        Me.QueryExceptionButton.Text = "Query"
        Me.QueryExceptionButton.UseVisualStyleBackColor = True
        '
        'HandleExceptionButton
        '
        Me.HandleExceptionButton.Location = New System.Drawing.Point(351, 17)
        Me.HandleExceptionButton.Name = "HandleExceptionButton"
        Me.HandleExceptionButton.Size = New System.Drawing.Size(100, 30)
        Me.HandleExceptionButton.TabIndex = 3
        Me.HandleExceptionButton.Text = "Handle"
        Me.HandleExceptionButton.UseVisualStyleBackColor = True
        '
        'DepartureComboBox
        '
        Me.DepartureComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.DepartureComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureComboBox.FormattingEnabled = True
        Me.DepartureComboBox.Items.AddRange(New Object() {"Beijing"})
        Me.DepartureComboBox.Location = New System.Drawing.Point(106, 20)
        Me.DepartureComboBox.Name = "DepartureComboBox"
        Me.DepartureComboBox.Size = New System.Drawing.Size(121, 23)
        Me.DepartureComboBox.TabIndex = 6
        '
        'DepartureCityLabel
        '
        Me.DepartureCityLabel.AutoSize = True
        Me.DepartureCityLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureCityLabel.Location = New System.Drawing.Point(9, 22)
        Me.DepartureCityLabel.Name = "DepartureCityLabel"
        Me.DepartureCityLabel.Size = New System.Drawing.Size(93, 16)
        Me.DepartureCityLabel.TabIndex = 7
        Me.DepartureCityLabel.Text = "Departure city:"
        '
        'StatusBarStrip
        '
        Me.StatusBarStrip.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.TotalStatusLabel, Me.RunningStatusLabel})
        Me.StatusBarStrip.Location = New System.Drawing.Point(0, 452)
        Me.StatusBarStrip.Name = "StatusBarStrip"
        Me.StatusBarStrip.Size = New System.Drawing.Size(800, 22)
        Me.StatusBarStrip.TabIndex = 8
        Me.StatusBarStrip.Text = "StatusBar"
        '
        'TotalStatusLabel
        '
        Me.TotalStatusLabel.Name = "TotalStatusLabel"
        Me.TotalStatusLabel.Size = New System.Drawing.Size(37, 17)
        Me.TotalStatusLabel.Text = "Total"
        '
        'RunningStatusLabel
        '
        Me.RunningStatusLabel.Name = "RunningStatusLabel"
        Me.RunningStatusLabel.Size = New System.Drawing.Size(0, 17)
        '
        'FrmException
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 16.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(800, 474)
        Me.Controls.Add(Me.StatusBarStrip)
        Me.Controls.Add(Me.DepartureCityLabel)
        Me.Controls.Add(Me.DepartureComboBox)
        Me.Controls.Add(Me.HandleExceptionButton)
        Me.Controls.Add(Me.QueryExceptionButton)
        Me.Controls.Add(Me.ResultListView)
        Me.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle
        Me.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.Name = "FrmException"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Exception Handling"
        Me.StatusBarStrip.ResumeLayout(False)
        Me.StatusBarStrip.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents ResultListView As System.Windows.Forms.ListView
    Friend WithEvents IDColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents DepartureDateColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents ReturnDateColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents PriceColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents DepartureCityColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents DestinationCityColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents URLColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents QueryExceptionButton As System.Windows.Forms.Button
    Friend WithEvents HandleExceptionButton As System.Windows.Forms.Button
    Friend WithEvents DepartureComboBox As System.Windows.Forms.ComboBox
    Friend WithEvents DepartureCityLabel As System.Windows.Forms.Label
    Friend WithEvents StatusBarStrip As System.Windows.Forms.StatusStrip
    Friend WithEvents TotalStatusLabel As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents RunningStatusLabel As System.Windows.Forms.ToolStripStatusLabel
End Class
