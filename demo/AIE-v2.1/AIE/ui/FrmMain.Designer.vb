<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrmMain
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
        Me.components = New System.ComponentModel.Container()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(FrmMain))
        Me.DepartureDatePicker = New System.Windows.Forms.DateTimePicker()
        Me.DepartureDateLabel = New System.Windows.Forms.Label()
        Me.FrameGroupBox = New System.Windows.Forms.GroupBox()
        Me.TabContainer = New System.Windows.Forms.TabControl()
        Me.TabResult = New System.Windows.Forms.TabPage()
        Me.PbSpinning = New System.Windows.Forms.PictureBox()
        Me.ResultListView = New System.Windows.Forms.ListView()
        Me.IDColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DepartureDateColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.ReturnDateColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.PriceColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DepartureCityColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.DestinationCityColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.URLColumn = CType(New System.Windows.Forms.ColumnHeader(), System.Windows.Forms.ColumnHeader)
        Me.AIEContextMenu = New System.Windows.Forms.ContextMenuStrip(Me.components)
        Me.CopyToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.GotoBrowserToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.TabWebBrowser = New System.Windows.Forms.TabPage()
        Me.WebBrowser = New System.Windows.Forms.WebBrowser()
        Me.PanelHeader = New System.Windows.Forms.Panel()
        Me.Schedule_Create = New System.Windows.Forms.Button()
        Me.RunCycleTextBox = New System.Windows.Forms.TextBox()
        Me.RunCycleLabel = New System.Windows.Forms.Label()
        Me.SyncButton = New System.Windows.Forms.Button()
        Me.ReturnCycleComboBox = New System.Windows.Forms.ComboBox()
        Me.MinutesTextBox = New System.Windows.Forms.TextBox()
        Me.DaySpanTextBox = New System.Windows.Forms.TextBox()
        Me.TimerLabel = New System.Windows.Forms.Label()
        Me.SecondsTextBox = New System.Windows.Forms.TextBox()
        Me.DelimitLabel = New System.Windows.Forms.Label()
        Me.cmdStart = New System.Windows.Forms.Button()
        Me.cmdStop = New System.Windows.Forms.Button()
        Me.DaySpanLabel = New System.Windows.Forms.Label()
        Me.ReturnCycleLabel = New System.Windows.Forms.Label()
        Me.DepartureComboBox = New System.Windows.Forms.ComboBox()
        Me.DestinationCityLabel = New System.Windows.Forms.Label()
        Me.DepartureCityLabel = New System.Windows.Forms.Label()
        Me.DestinationComboBox = New System.Windows.Forms.ComboBox()
        Me.StatusBar = New System.Windows.Forms.StatusStrip()
        Me.TimeStatusBar = New System.Windows.Forms.ToolStripStatusLabel()
        Me.TotalTimeStatusBar = New System.Windows.Forms.ToolStripStatusLabel()
        Me.SchedulingStatusBar = New System.Windows.Forms.ToolStripStatusLabel()
        Me.AIEMenuStrip = New System.Windows.Forms.MenuStrip()
        Me.FileToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.ExitToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.ConfigureToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.CityConfigurationToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.SettingsToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.SchedulingToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.DateMatrixToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.DatabaseSettingToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.ExceptionToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.HandleExceptionToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.QueryToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.AIEToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.AboutToolStripMenuItem = New System.Windows.Forms.ToolStripMenuItem()
        Me.Timer = New System.Windows.Forms.Timer(Me.components)
        Me.Clock = New System.Timers.Timer()
        Me.ExcelSaveFileDialog = New System.Windows.Forms.SaveFileDialog()
        Me.Button1 = New System.Windows.Forms.Button()
        Me.FrameGroupBox.SuspendLayout()
        Me.TabContainer.SuspendLayout()
        Me.TabResult.SuspendLayout()
        CType(Me.PbSpinning, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.AIEContextMenu.SuspendLayout()
        Me.TabWebBrowser.SuspendLayout()
        Me.PanelHeader.SuspendLayout()
        Me.StatusBar.SuspendLayout()
        Me.AIEMenuStrip.SuspendLayout()
        CType(Me.Clock, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'DepartureDatePicker
        '
        Me.DepartureDatePicker.CalendarFont = New System.Drawing.Font("Calibri", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDatePicker.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDatePicker.Format = System.Windows.Forms.DateTimePickerFormat.[Short]
        Me.DepartureDatePicker.Location = New System.Drawing.Point(116, 4)
        Me.DepartureDatePicker.Name = "DepartureDatePicker"
        Me.DepartureDatePicker.Size = New System.Drawing.Size(121, 21)
        Me.DepartureDatePicker.TabIndex = 0
        '
        'DepartureDateLabel
        '
        Me.DepartureDateLabel.AutoSize = True
        Me.DepartureDateLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureDateLabel.Location = New System.Drawing.Point(5, 7)
        Me.DepartureDateLabel.Name = "DepartureDateLabel"
        Me.DepartureDateLabel.Size = New System.Drawing.Size(97, 16)
        Me.DepartureDateLabel.TabIndex = 1
        Me.DepartureDateLabel.Text = "Departure date:"
        '
        'FrameGroupBox
        '
        Me.FrameGroupBox.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.FrameGroupBox.Controls.Add(Me.TabContainer)
        Me.FrameGroupBox.Controls.Add(Me.PanelHeader)
        Me.FrameGroupBox.Font = New System.Drawing.Font("Tahoma", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.FrameGroupBox.Location = New System.Drawing.Point(12, 25)
        Me.FrameGroupBox.Name = "FrameGroupBox"
        Me.FrameGroupBox.Size = New System.Drawing.Size(760, 561)
        Me.FrameGroupBox.TabIndex = 2
        Me.FrameGroupBox.TabStop = False
        Me.FrameGroupBox.Text = "Search Panel"
        '
        'TabContainer
        '
        Me.TabContainer.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.TabContainer.Controls.Add(Me.TabResult)
        Me.TabContainer.Controls.Add(Me.TabWebBrowser)
        Me.TabContainer.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TabContainer.Location = New System.Drawing.Point(6, 273)
        Me.TabContainer.Name = "TabContainer"
        Me.TabContainer.SelectedIndex = 0
        Me.TabContainer.Size = New System.Drawing.Size(746, 283)
        Me.TabContainer.TabIndex = 9
        '
        'TabResult
        '
        Me.TabResult.Controls.Add(Me.PbSpinning)
        Me.TabResult.Controls.Add(Me.ResultListView)
        Me.TabResult.Location = New System.Drawing.Point(4, 25)
        Me.TabResult.Name = "TabResult"
        Me.TabResult.Padding = New System.Windows.Forms.Padding(3)
        Me.TabResult.Size = New System.Drawing.Size(738, 254)
        Me.TabResult.TabIndex = 1
        Me.TabResult.Text = "Result"
        Me.TabResult.UseVisualStyleBackColor = True
        '
        'PbSpinning
        '
        Me.PbSpinning.Image = Global.AIE.My.Resources.Resources.Searching
        Me.PbSpinning.Location = New System.Drawing.Point(181, 99)
        Me.PbSpinning.Name = "PbSpinning"
        Me.PbSpinning.Size = New System.Drawing.Size(397, 39)
        Me.PbSpinning.TabIndex = 16
        Me.PbSpinning.TabStop = False
        '
        'ResultListView
        '
        Me.ResultListView.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.ResultListView.Columns.AddRange(New System.Windows.Forms.ColumnHeader() {Me.IDColumn, Me.DepartureDateColumn, Me.ReturnDateColumn, Me.PriceColumn, Me.DepartureCityColumn, Me.DestinationCityColumn, Me.URLColumn})
        Me.ResultListView.ContextMenuStrip = Me.AIEContextMenu
        Me.ResultListView.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ResultListView.FullRowSelect = True
        Me.ResultListView.GridLines = True
        Me.ResultListView.Location = New System.Drawing.Point(3, 0)
        Me.ResultListView.MultiSelect = False
        Me.ResultListView.Name = "ResultListView"
        Me.ResultListView.Size = New System.Drawing.Size(737, 254)
        Me.ResultListView.TabIndex = 0
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
        Me.DepartureDateColumn.Text = "Departure date"
        Me.DepartureDateColumn.Width = 130
        '
        'ReturnDateColumn
        '
        Me.ReturnDateColumn.Text = "Return date"
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
        Me.DepartureCityColumn.Text = "Departure city"
        Me.DepartureCityColumn.TextAlign = System.Windows.Forms.HorizontalAlignment.Center
        Me.DepartureCityColumn.Width = 99
        '
        'DestinationCityColumn
        '
        Me.DestinationCityColumn.Text = "Destination city"
        Me.DestinationCityColumn.Width = 104
        '
        'URLColumn
        '
        Me.URLColumn.Text = "Url"
        Me.URLColumn.Width = 400
        '
        'AIEContextMenu
        '
        Me.AIEContextMenu.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.CopyToolStripMenuItem, Me.GotoBrowserToolStripMenuItem})
        Me.AIEContextMenu.Name = "ContextMenu"
        Me.AIEContextMenu.Size = New System.Drawing.Size(154, 48)
        '
        'CopyToolStripMenuItem
        '
        Me.CopyToolStripMenuItem.Name = "CopyToolStripMenuItem"
        Me.CopyToolStripMenuItem.ShortcutKeys = CType((System.Windows.Forms.Keys.Control Or System.Windows.Forms.Keys.C), System.Windows.Forms.Keys)
        Me.CopyToolStripMenuItem.Size = New System.Drawing.Size(153, 22)
        Me.CopyToolStripMenuItem.Text = "Copy"
        '
        'GotoBrowserToolStripMenuItem
        '
        Me.GotoBrowserToolStripMenuItem.Name = "GotoBrowserToolStripMenuItem"
        Me.GotoBrowserToolStripMenuItem.Size = New System.Drawing.Size(153, 22)
        Me.GotoBrowserToolStripMenuItem.Text = "GotoBrowser"
        '
        'TabWebBrowser
        '
        Me.TabWebBrowser.Controls.Add(Me.WebBrowser)
        Me.TabWebBrowser.Location = New System.Drawing.Point(4, 25)
        Me.TabWebBrowser.Name = "TabWebBrowser"
        Me.TabWebBrowser.Padding = New System.Windows.Forms.Padding(3)
        Me.TabWebBrowser.Size = New System.Drawing.Size(738, 254)
        Me.TabWebBrowser.TabIndex = 0
        Me.TabWebBrowser.Text = "Browser"
        Me.TabWebBrowser.UseVisualStyleBackColor = True
        '
        'WebBrowser
        '
        Me.WebBrowser.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
                    Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.WebBrowser.Location = New System.Drawing.Point(6, 6)
        Me.WebBrowser.MinimumSize = New System.Drawing.Size(20, 20)
        Me.WebBrowser.Name = "WebBrowser"
        Me.WebBrowser.Size = New System.Drawing.Size(734, 321)
        Me.WebBrowser.TabIndex = 2
        '
        'PanelHeader
        '
        Me.PanelHeader.Anchor = CType(((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Left) _
                    Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.PanelHeader.Controls.Add(Me.Button1)
        Me.PanelHeader.Controls.Add(Me.Schedule_Create)
        Me.PanelHeader.Controls.Add(Me.RunCycleTextBox)
        Me.PanelHeader.Controls.Add(Me.RunCycleLabel)
        Me.PanelHeader.Controls.Add(Me.SyncButton)
        Me.PanelHeader.Controls.Add(Me.ReturnCycleComboBox)
        Me.PanelHeader.Controls.Add(Me.MinutesTextBox)
        Me.PanelHeader.Controls.Add(Me.DaySpanTextBox)
        Me.PanelHeader.Controls.Add(Me.TimerLabel)
        Me.PanelHeader.Controls.Add(Me.SecondsTextBox)
        Me.PanelHeader.Controls.Add(Me.DelimitLabel)
        Me.PanelHeader.Controls.Add(Me.cmdStart)
        Me.PanelHeader.Controls.Add(Me.cmdStop)
        Me.PanelHeader.Controls.Add(Me.DaySpanLabel)
        Me.PanelHeader.Controls.Add(Me.ReturnCycleLabel)
        Me.PanelHeader.Controls.Add(Me.DepartureComboBox)
        Me.PanelHeader.Controls.Add(Me.DestinationCityLabel)
        Me.PanelHeader.Controls.Add(Me.DepartureDateLabel)
        Me.PanelHeader.Controls.Add(Me.DepartureCityLabel)
        Me.PanelHeader.Controls.Add(Me.DepartureDatePicker)
        Me.PanelHeader.Controls.Add(Me.DestinationComboBox)
        Me.PanelHeader.Location = New System.Drawing.Point(10, 17)
        Me.PanelHeader.Name = "PanelHeader"
        Me.PanelHeader.Size = New System.Drawing.Size(742, 250)
        Me.PanelHeader.TabIndex = 8
        '
        'Schedule_Create
        '
        Me.Schedule_Create.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Schedule_Create.Image = CType(resources.GetObject("Schedule_Create.Image"), System.Drawing.Image)
        Me.Schedule_Create.ImageAlign = System.Drawing.ContentAlignment.TopCenter
        Me.Schedule_Create.Location = New System.Drawing.Point(536, 118)
        Me.Schedule_Create.Name = "Schedule_Create"
        Me.Schedule_Create.Size = New System.Drawing.Size(75, 52)
        Me.Schedule_Create.TabIndex = 32
        Me.Schedule_Create.Text = "Schedule"
        Me.Schedule_Create.TextAlign = System.Drawing.ContentAlignment.BottomCenter
        '
        'RunCycleTextBox
        '
        Me.RunCycleTextBox.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.RunCycleTextBox.Location = New System.Drawing.Point(116, 147)
        Me.RunCycleTextBox.Name = "RunCycleTextBox"
        Me.RunCycleTextBox.ReadOnly = True
        Me.RunCycleTextBox.Size = New System.Drawing.Size(121, 22)
        Me.RunCycleTextBox.TabIndex = 31
        Me.RunCycleTextBox.Visible = False
        Me.RunCycleTextBox.WordWrap = False
        '
        'RunCycleLabel
        '
        Me.RunCycleLabel.AutoSize = True
        Me.RunCycleLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.RunCycleLabel.Location = New System.Drawing.Point(5, 146)
        Me.RunCycleLabel.Name = "RunCycleLabel"
        Me.RunCycleLabel.Size = New System.Drawing.Size(94, 16)
        Me.RunCycleLabel.TabIndex = 30
        Me.RunCycleLabel.Text = "Running cycle:"
        Me.RunCycleLabel.Visible = False
        '
        'SyncButton
        '
        Me.SyncButton.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.SyncButton.Location = New System.Drawing.Point(512, 73)
        Me.SyncButton.Name = "SyncButton"
        Me.SyncButton.Size = New System.Drawing.Size(93, 32)
        Me.SyncButton.TabIndex = 22
        Me.SyncButton.Text = "Sync From db"
        Me.SyncButton.Visible = False
        '
        'ReturnCycleComboBox
        '
        Me.ReturnCycleComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.ReturnCycleComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ReturnCycleComboBox.FormattingEnabled = True
        Me.ReturnCycleComboBox.Location = New System.Drawing.Point(116, 116)
        Me.ReturnCycleComboBox.Name = "ReturnCycleComboBox"
        Me.ReturnCycleComboBox.Size = New System.Drawing.Size(121, 23)
        Me.ReturnCycleComboBox.TabIndex = 29
        Me.ReturnCycleComboBox.Visible = False
        '
        'MinutesTextBox
        '
        Me.MinutesTextBox.Font = New System.Drawing.Font("Microsoft Sans Serif", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.MinutesTextBox.Location = New System.Drawing.Point(374, 94)
        Me.MinutesTextBox.Name = "MinutesTextBox"
        Me.MinutesTextBox.Size = New System.Drawing.Size(27, 21)
        Me.MinutesTextBox.TabIndex = 17
        Me.MinutesTextBox.Visible = False
        '
        'DaySpanTextBox
        '
        Me.DaySpanTextBox.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DaySpanTextBox.Location = New System.Drawing.Point(116, 30)
        Me.DaySpanTextBox.Name = "DaySpanTextBox"
        Me.DaySpanTextBox.Size = New System.Drawing.Size(121, 22)
        Me.DaySpanTextBox.TabIndex = 25
        '
        'TimerLabel
        '
        Me.TimerLabel.AutoSize = True
        Me.TimerLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TimerLabel.Location = New System.Drawing.Point(295, 94)
        Me.TimerLabel.Name = "TimerLabel"
        Me.TimerLabel.Size = New System.Drawing.Size(80, 16)
        Me.TimerLabel.TabIndex = 18
        Me.TimerLabel.Text = "Interval(M:S)"
        Me.TimerLabel.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        Me.TimerLabel.Visible = False
        '
        'SecondsTextBox
        '
        Me.SecondsTextBox.Font = New System.Drawing.Font("Microsoft Sans Serif", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.SecondsTextBox.Location = New System.Drawing.Point(406, 94)
        Me.SecondsTextBox.Name = "SecondsTextBox"
        Me.SecondsTextBox.Size = New System.Drawing.Size(27, 21)
        Me.SecondsTextBox.TabIndex = 19
        Me.SecondsTextBox.Visible = False
        '
        'DelimitLabel
        '
        Me.DelimitLabel.Font = New System.Drawing.Font("Arial Narrow", 11.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DelimitLabel.Location = New System.Drawing.Point(398, 91)
        Me.DelimitLabel.Name = "DelimitLabel"
        Me.DelimitLabel.Size = New System.Drawing.Size(10, 21)
        Me.DelimitLabel.TabIndex = 20
        Me.DelimitLabel.Text = ":"
        Me.DelimitLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter
        Me.DelimitLabel.Visible = False
        '
        'cmdStart
        '
        Me.cmdStart.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.cmdStart.Image = CType(resources.GetObject("cmdStart.Image"), System.Drawing.Image)
        Me.cmdStart.ImageAlign = System.Drawing.ContentAlignment.TopCenter
        Me.cmdStart.Location = New System.Drawing.Point(536, 4)
        Me.cmdStart.Name = "cmdStart"
        Me.cmdStart.Size = New System.Drawing.Size(64, 52)
        Me.cmdStart.TabIndex = 23
        Me.cmdStart.Text = "start"
        Me.cmdStart.TextAlign = System.Drawing.ContentAlignment.BottomCenter
        '
        'cmdStop
        '
        Me.cmdStop.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.cmdStop.Image = CType(resources.GetObject("cmdStop.Image"), System.Drawing.Image)
        Me.cmdStop.ImageAlign = System.Drawing.ContentAlignment.TopCenter
        Me.cmdStop.Location = New System.Drawing.Point(611, 4)
        Me.cmdStop.Name = "cmdStop"
        Me.cmdStop.Size = New System.Drawing.Size(64, 52)
        Me.cmdStop.TabIndex = 22
        Me.cmdStop.Text = "stop"
        Me.cmdStop.TextAlign = System.Drawing.ContentAlignment.BottomCenter
        '
        'DaySpanLabel
        '
        Me.DaySpanLabel.AutoSize = True
        Me.DaySpanLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DaySpanLabel.Location = New System.Drawing.Point(5, 35)
        Me.DaySpanLabel.Name = "DaySpanLabel"
        Me.DaySpanLabel.Size = New System.Drawing.Size(114, 16)
        Me.DaySpanLabel.TabIndex = 15
        Me.DaySpanLabel.Text = "Departure in days:"
        '
        'ReturnCycleLabel
        '
        Me.ReturnCycleLabel.AutoSize = True
        Me.ReturnCycleLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.ReturnCycleLabel.Location = New System.Drawing.Point(5, 118)
        Me.ReturnCycleLabel.Name = "ReturnCycleLabel"
        Me.ReturnCycleLabel.Size = New System.Drawing.Size(96, 16)
        Me.ReturnCycleLabel.TabIndex = 12
        Me.ReturnCycleLabel.Text = "Return in days:"
        Me.ReturnCycleLabel.Visible = False
        '
        'DepartureComboBox
        '
        Me.DepartureComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.DepartureComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureComboBox.FormattingEnabled = True
        Me.DepartureComboBox.Items.AddRange(New Object() {"New York"})
        Me.DepartureComboBox.Location = New System.Drawing.Point(116, 58)
        Me.DepartureComboBox.Name = "DepartureComboBox"
        Me.DepartureComboBox.Size = New System.Drawing.Size(121, 23)
        Me.DepartureComboBox.TabIndex = 4
        Me.DepartureComboBox.Visible = False
        '
        'DestinationCityLabel
        '
        Me.DestinationCityLabel.AutoSize = True
        Me.DestinationCityLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DestinationCityLabel.Location = New System.Drawing.Point(5, 90)
        Me.DestinationCityLabel.Name = "DestinationCityLabel"
        Me.DestinationCityLabel.Size = New System.Drawing.Size(102, 16)
        Me.DestinationCityLabel.TabIndex = 7
        Me.DestinationCityLabel.Text = "Destination city:"
        Me.DestinationCityLabel.Visible = False
        '
        'DepartureCityLabel
        '
        Me.DepartureCityLabel.AutoSize = True
        Me.DepartureCityLabel.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DepartureCityLabel.Location = New System.Drawing.Point(5, 63)
        Me.DepartureCityLabel.Name = "DepartureCityLabel"
        Me.DepartureCityLabel.Size = New System.Drawing.Size(93, 16)
        Me.DepartureCityLabel.TabIndex = 6
        Me.DepartureCityLabel.Text = "Departure city:"
        Me.DepartureCityLabel.Visible = False
        '
        'DestinationComboBox
        '
        Me.DestinationComboBox.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList
        Me.DestinationComboBox.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.DestinationComboBox.FormattingEnabled = True
        Me.DestinationComboBox.Items.AddRange(New Object() {"Beijing"})
        Me.DestinationComboBox.Location = New System.Drawing.Point(116, 87)
        Me.DestinationComboBox.Name = "DestinationComboBox"
        Me.DestinationComboBox.Size = New System.Drawing.Size(121, 23)
        Me.DestinationComboBox.TabIndex = 5
        Me.DestinationComboBox.Visible = False
        '
        'StatusBar
        '
        Me.StatusBar.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.TimeStatusBar, Me.TotalTimeStatusBar, Me.SchedulingStatusBar})
        Me.StatusBar.Location = New System.Drawing.Point(0, 589)
        Me.StatusBar.Name = "StatusBar"
        Me.StatusBar.Size = New System.Drawing.Size(784, 22)
        Me.StatusBar.TabIndex = 3
        Me.StatusBar.Text = "StatusStrip1"
        '
        'TimeStatusBar
        '
        Me.TimeStatusBar.Name = "TimeStatusBar"
        Me.TimeStatusBar.Size = New System.Drawing.Size(78, 17)
        Me.TimeStatusBar.Text = "Now Time:  "
        '
        'TotalTimeStatusBar
        '
        Me.TotalTimeStatusBar.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TotalTimeStatusBar.ForeColor = System.Drawing.Color.Green
        Me.TotalTimeStatusBar.Name = "TotalTimeStatusBar"
        Me.TotalTimeStatusBar.Size = New System.Drawing.Size(61, 17)
        Me.TotalTimeStatusBar.Text = "Total Time"
        '
        'SchedulingStatusBar
        '
        Me.SchedulingStatusBar.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.SchedulingStatusBar.ForeColor = System.Drawing.Color.Red
        Me.SchedulingStatusBar.Name = "SchedulingStatusBar"
        Me.SchedulingStatusBar.Size = New System.Drawing.Size(107, 17)
        Me.SchedulingStatusBar.Text = "Scheduling Status"
        '
        'AIEMenuStrip
        '
        Me.AIEMenuStrip.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.AIEMenuStrip.Items.AddRange(New System.Windows.Forms.ToolStripItem() {Me.FileToolStripMenuItem, Me.ConfigureToolStripMenuItem, Me.ExceptionToolStripMenuItem, Me.QueryToolStripMenuItem, Me.AboutToolStripMenuItem})
        Me.AIEMenuStrip.Location = New System.Drawing.Point(0, 0)
        Me.AIEMenuStrip.Name = "AIEMenuStrip"
        Me.AIEMenuStrip.Size = New System.Drawing.Size(784, 24)
        Me.AIEMenuStrip.TabIndex = 1
        '
        'FileToolStripMenuItem
        '
        Me.FileToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.ExitToolStripMenuItem})
        Me.FileToolStripMenuItem.Name = "FileToolStripMenuItem"
        Me.FileToolStripMenuItem.Size = New System.Drawing.Size(41, 20)
        Me.FileToolStripMenuItem.Text = "File"
        '
        'ExitToolStripMenuItem
        '
        Me.ExitToolStripMenuItem.Name = "ExitToolStripMenuItem"
        Me.ExitToolStripMenuItem.Size = New System.Drawing.Size(99, 22)
        Me.ExitToolStripMenuItem.Text = "Exit"
        '
        'ConfigureToolStripMenuItem
        '
        Me.ConfigureToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.CityConfigurationToolStripMenuItem, Me.SettingsToolStripMenuItem, Me.SchedulingToolStripMenuItem, Me.DateMatrixToolStripMenuItem, Me.DatabaseSettingToolStripMenuItem})
        Me.ConfigureToolStripMenuItem.Name = "ConfigureToolStripMenuItem"
        Me.ConfigureToolStripMenuItem.Size = New System.Drawing.Size(95, 20)
        Me.ConfigureToolStripMenuItem.Text = "Configuration"
        '
        'CityConfigurationToolStripMenuItem
        '
        Me.CityConfigurationToolStripMenuItem.Name = "CityConfigurationToolStripMenuItem"
        Me.CityConfigurationToolStripMenuItem.Size = New System.Drawing.Size(185, 22)
        Me.CityConfigurationToolStripMenuItem.Text = "City Setting"
        '
        'SettingsToolStripMenuItem
        '
        Me.SettingsToolStripMenuItem.Name = "SettingsToolStripMenuItem"
        Me.SettingsToolStripMenuItem.Size = New System.Drawing.Size(185, 22)
        Me.SettingsToolStripMenuItem.Text = "Scheduling Setting"
        '
        'SchedulingToolStripMenuItem
        '
        Me.SchedulingToolStripMenuItem.Name = "SchedulingToolStripMenuItem"
        Me.SchedulingToolStripMenuItem.Size = New System.Drawing.Size(185, 22)
        Me.SchedulingToolStripMenuItem.Text = "Scheduling Data"
        '
        'DateMatrixToolStripMenuItem
        '
        Me.DateMatrixToolStripMenuItem.Enabled = False
        Me.DateMatrixToolStripMenuItem.Name = "DateMatrixToolStripMenuItem"
        Me.DateMatrixToolStripMenuItem.Size = New System.Drawing.Size(185, 22)
        Me.DateMatrixToolStripMenuItem.Text = "Date Matrix"
        '
        'DatabaseSettingToolStripMenuItem
        '
        Me.DatabaseSettingToolStripMenuItem.Name = "DatabaseSettingToolStripMenuItem"
        Me.DatabaseSettingToolStripMenuItem.Size = New System.Drawing.Size(185, 22)
        Me.DatabaseSettingToolStripMenuItem.Text = "Database Setting"
        '
        'ExceptionToolStripMenuItem
        '
        Me.ExceptionToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.HandleExceptionToolStripMenuItem})
        Me.ExceptionToolStripMenuItem.Name = "ExceptionToolStripMenuItem"
        Me.ExceptionToolStripMenuItem.Size = New System.Drawing.Size(78, 20)
        Me.ExceptionToolStripMenuItem.Text = "Exception"
        '
        'HandleExceptionToolStripMenuItem
        '
        Me.HandleExceptionToolStripMenuItem.Name = "HandleExceptionToolStripMenuItem"
        Me.HandleExceptionToolStripMenuItem.Size = New System.Drawing.Size(178, 22)
        Me.HandleExceptionToolStripMenuItem.Text = "Handle Exception"
        '
        'QueryToolStripMenuItem
        '
        Me.QueryToolStripMenuItem.DropDownItems.AddRange(New System.Windows.Forms.ToolStripItem() {Me.AIEToolStripMenuItem})
        Me.QueryToolStripMenuItem.Name = "QueryToolStripMenuItem"
        Me.QueryToolStripMenuItem.Size = New System.Drawing.Size(55, 20)
        Me.QueryToolStripMenuItem.Text = "Query"
        '
        'AIEToolStripMenuItem
        '
        Me.AIEToolStripMenuItem.Name = "AIEToolStripMenuItem"
        Me.AIEToolStripMenuItem.Size = New System.Drawing.Size(97, 22)
        Me.AIEToolStripMenuItem.Text = "AIE"
        '
        'AboutToolStripMenuItem
        '
        Me.AboutToolStripMenuItem.Name = "AboutToolStripMenuItem"
        Me.AboutToolStripMenuItem.Size = New System.Drawing.Size(54, 20)
        Me.AboutToolStripMenuItem.Text = "About"
        '
        'Timer
        '
        '
        'Clock
        '
        Me.Clock.Enabled = True
        Me.Clock.Interval = 1000.0R
        Me.Clock.SynchronizingObject = Me
        '
        'Button1
        '
        Me.Button1.Location = New System.Drawing.Point(651, 191)
        Me.Button1.Name = "Button1"
        Me.Button1.Size = New System.Drawing.Size(75, 23)
        Me.Button1.TabIndex = 33
        Me.Button1.Text = "Reset"
        Me.Button1.UseVisualStyleBackColor = True
        Me.Button1.Visible = False
        '
        'FrmMain
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 12.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(784, 611)
        Me.Controls.Add(Me.StatusBar)
        Me.Controls.Add(Me.AIEMenuStrip)
        Me.Controls.Add(Me.FrameGroupBox)
        Me.Name = "FrmMain"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "AIE Crawl"
        Me.FrameGroupBox.ResumeLayout(False)
        Me.TabContainer.ResumeLayout(False)
        Me.TabResult.ResumeLayout(False)
        CType(Me.PbSpinning, System.ComponentModel.ISupportInitialize).EndInit()
        Me.AIEContextMenu.ResumeLayout(False)
        Me.TabWebBrowser.ResumeLayout(False)
        Me.PanelHeader.ResumeLayout(False)
        Me.PanelHeader.PerformLayout()
        Me.StatusBar.ResumeLayout(False)
        Me.StatusBar.PerformLayout()
        Me.AIEMenuStrip.ResumeLayout(False)
        Me.AIEMenuStrip.PerformLayout()
        CType(Me.Clock, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents DepartureDatePicker As System.Windows.Forms.DateTimePicker
    Friend WithEvents DepartureDateLabel As System.Windows.Forms.Label
    Friend WithEvents FrameGroupBox As System.Windows.Forms.GroupBox
    Friend WithEvents DestinationCityLabel As System.Windows.Forms.Label
    Friend WithEvents DepartureCityLabel As System.Windows.Forms.Label
    Friend WithEvents DestinationComboBox As System.Windows.Forms.ComboBox
    Friend WithEvents DepartureComboBox As System.Windows.Forms.ComboBox
    Friend WithEvents StatusBar As System.Windows.Forms.StatusStrip
    Friend WithEvents PanelHeader As System.Windows.Forms.Panel
    Friend WithEvents TimeStatusBar As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents AIEContextMenu As System.Windows.Forms.ContextMenuStrip
    Friend WithEvents CopyToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents GotoBrowserToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents AIEMenuStrip As System.Windows.Forms.MenuStrip
    Friend WithEvents FileToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents ExitToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents ConfigureToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents ReturnCycleLabel As System.Windows.Forms.Label
    Friend WithEvents DaySpanLabel As System.Windows.Forms.Label
    Friend WithEvents CityConfigurationToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents DateMatrixToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents QueryToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents AIEToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents cmdStart As System.Windows.Forms.Button
    Friend WithEvents cmdStop As System.Windows.Forms.Button
    Friend WithEvents DelimitLabel As System.Windows.Forms.Label
    Friend WithEvents SecondsTextBox As System.Windows.Forms.TextBox
    Friend WithEvents TimerLabel As System.Windows.Forms.Label
    Friend WithEvents MinutesTextBox As System.Windows.Forms.TextBox
    Friend WithEvents Timer As System.Windows.Forms.Timer
    Friend WithEvents Clock As System.Timers.Timer
    Friend WithEvents TabContainer As System.Windows.Forms.TabControl
    Friend WithEvents TabResult As System.Windows.Forms.TabPage
    Friend WithEvents PbSpinning As System.Windows.Forms.PictureBox
    Friend WithEvents ResultListView As System.Windows.Forms.ListView
    Friend WithEvents IDColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents DepartureDateColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents ReturnDateColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents PriceColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents DepartureCityColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents URLColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents TabWebBrowser As System.Windows.Forms.TabPage
    Friend WithEvents WebBrowser As System.Windows.Forms.WebBrowser
    Friend WithEvents DaySpanTextBox As System.Windows.Forms.TextBox
    Friend WithEvents TotalTimeStatusBar As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents DestinationCityColumn As System.Windows.Forms.ColumnHeader
    Friend WithEvents SchedulingStatusBar As System.Windows.Forms.ToolStripStatusLabel
    Friend WithEvents ExcelSaveFileDialog As System.Windows.Forms.SaveFileDialog
    Friend WithEvents SyncButton As System.Windows.Forms.Button
    Friend WithEvents SettingsToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents AboutToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents SchedulingToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents ExceptionToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents HandleExceptionToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents ReturnCycleComboBox As System.Windows.Forms.ComboBox
    Friend WithEvents RunCycleTextBox As System.Windows.Forms.TextBox
    Friend WithEvents RunCycleLabel As System.Windows.Forms.Label
    Friend WithEvents DatabaseSettingToolStripMenuItem As System.Windows.Forms.ToolStripMenuItem
    Friend WithEvents Schedule_Create As System.Windows.Forms.Button
    Friend WithEvents Button1 As System.Windows.Forms.Button

End Class
