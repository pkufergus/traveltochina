Imports System.Reflection
Imports System.IO
Public Class FrmAbout

    Inherits System.Windows.Forms.Form
    Private objGenericFileInfo As Object = CreateObject("Scripting.FileSystemObject")
#Region " Windows Form Designer generated code "

    Public Sub New()
        MyBase.New()

        'This call is required by the Windows Form Designer.
        InitializeComponent()

        'Add any initialization after the InitializeComponent() call

    End Sub

    'Form overrides dispose to clean up the component list.
    Protected Overloads Overrides Sub Dispose(ByVal disposing As Boolean)
        If disposing Then
            If Not (components Is Nothing) Then
                components.Dispose()
            End If
        End If
        MyBase.Dispose(disposing)
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    Friend WithEvents GroupBox6 As System.Windows.Forms.GroupBox
    Friend WithEvents PictureBox2 As System.Windows.Forms.PictureBox
    Friend WithEvents lblEmail As System.Windows.Forms.Label
    Friend WithEvents lblVersion As System.Windows.Forms.Label
    Friend WithEvents cmdOk As System.Windows.Forms.Button
    Friend WithEvents lblMes As System.Windows.Forms.Label
    Friend WithEvents lblWarning As System.Windows.Forms.Label
    Friend WithEvents lblCopyrigth As System.Windows.Forms.Label
    Friend WithEvents lblAll As System.Windows.Forms.Label
    Friend WithEvents GroupBox1 As System.Windows.Forms.GroupBox
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents lstDllInfo As System.Windows.Forms.ListBox
    Friend WithEvents lblLastChange As System.Windows.Forms.Label
    Friend WithEvents lblCreator As System.Windows.Forms.Label
    <System.Diagnostics.DebuggerStepThrough()> Private Sub InitializeComponent()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(FrmAbout))
        Me.GroupBox6 = New System.Windows.Forms.GroupBox()
        Me.lblMes = New System.Windows.Forms.Label()
        Me.PictureBox2 = New System.Windows.Forms.PictureBox()
        Me.lblEmail = New System.Windows.Forms.Label()
        Me.lblVersion = New System.Windows.Forms.Label()
        Me.cmdOk = New System.Windows.Forms.Button()
        Me.lblWarning = New System.Windows.Forms.Label()
        Me.lblCopyrigth = New System.Windows.Forms.Label()
        Me.lblAll = New System.Windows.Forms.Label()
        Me.GroupBox1 = New System.Windows.Forms.GroupBox()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.lstDllInfo = New System.Windows.Forms.ListBox()
        Me.lblLastChange = New System.Windows.Forms.Label()
        Me.lblCreator = New System.Windows.Forms.Label()
        Me.GroupBox6.SuspendLayout()
        CType(Me.PictureBox2, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'GroupBox6
        '
        Me.GroupBox6.Controls.Add(Me.PictureBox2)
        Me.GroupBox6.Location = New System.Drawing.Point(8, 0)
        Me.GroupBox6.Name = "GroupBox6"
        Me.GroupBox6.Size = New System.Drawing.Size(408, 120)
        Me.GroupBox6.TabIndex = 11
        Me.GroupBox6.TabStop = False
        '
        'lblMes
        '
        Me.lblMes.Font = New System.Drawing.Font("Tahoma", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblMes.Location = New System.Drawing.Point(63, 120)
        Me.lblMes.Name = "lblMes"
        Me.lblMes.Size = New System.Drawing.Size(272, 24)
        Me.lblMes.TabIndex = 5
        Me.lblMes.Text = "Data Searching Tool (DST)"
        Me.lblMes.TextAlign = System.Drawing.ContentAlignment.MiddleCenter
        '
        'PictureBox2
        '
        Me.PictureBox2.BackColor = System.Drawing.SystemColors.ButtonHighlight
        Me.PictureBox2.Image = CType(resources.GetObject("PictureBox2.Image"), System.Drawing.Image)
        Me.PictureBox2.Location = New System.Drawing.Point(127, 8)
        Me.PictureBox2.Name = "PictureBox2"
        Me.PictureBox2.Size = New System.Drawing.Size(116, 110)
        Me.PictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom
        Me.PictureBox2.TabIndex = 3
        Me.PictureBox2.TabStop = False
        '
        'lblEmail
        '
        Me.lblEmail.AutoSize = True
        Me.lblEmail.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblEmail.ForeColor = System.Drawing.Color.Blue
        Me.lblEmail.Location = New System.Drawing.Point(9, 320)
        Me.lblEmail.Name = "lblEmail"
        Me.lblEmail.Size = New System.Drawing.Size(166, 15)
        Me.lblEmail.TabIndex = 14
        Me.lblEmail.Text = "Email:  Aaaron_ch@163.com"
        Me.lblEmail.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'lblVersion
        '
        Me.lblVersion.AutoSize = True
        Me.lblVersion.Location = New System.Drawing.Point(320, 152)
        Me.lblVersion.Name = "lblVersion"
        Me.lblVersion.Size = New System.Drawing.Size(0, 13)
        Me.lblVersion.TabIndex = 15
        Me.lblVersion.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'cmdOk
        '
        Me.cmdOk.Font = New System.Drawing.Font("Arial Narrow", 9.75!, System.Drawing.FontStyle.Bold)
        Me.cmdOk.Location = New System.Drawing.Point(308, 353)
        Me.cmdOk.Name = "cmdOk"
        Me.cmdOk.Size = New System.Drawing.Size(87, 30)
        Me.cmdOk.TabIndex = 16
        Me.cmdOk.Text = "OK"
        '
        'lblWarning
        '
        Me.lblWarning.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblWarning.Location = New System.Drawing.Point(8, 352)
        Me.lblWarning.Name = "lblWarning"
        Me.lblWarning.Size = New System.Drawing.Size(196, 30)
        Me.lblWarning.TabIndex = 17
        Me.lblWarning.Text = "Please keep it interanlly."
        Me.lblWarning.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'lblCopyrigth
        '
        Me.lblCopyrigth.AutoSize = True
        Me.lblCopyrigth.Location = New System.Drawing.Point(9, 152)
        Me.lblCopyrigth.Name = "lblCopyrigth"
        Me.lblCopyrigth.Size = New System.Drawing.Size(0, 13)
        Me.lblCopyrigth.TabIndex = 18
        Me.lblCopyrigth.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'lblAll
        '
        Me.lblAll.AutoSize = True
        Me.lblAll.Location = New System.Drawing.Point(187, 152)
        Me.lblAll.Name = "lblAll"
        Me.lblAll.Size = New System.Drawing.Size(90, 13)
        Me.lblAll.TabIndex = 19
        Me.lblAll.Text = "All rights reserved"
        Me.lblAll.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'GroupBox1
        '
        Me.GroupBox1.Location = New System.Drawing.Point(2, 337)
        Me.GroupBox1.Name = "GroupBox1"
        Me.GroupBox1.Size = New System.Drawing.Size(416, 10)
        Me.GroupBox1.TabIndex = 20
        Me.GroupBox1.TabStop = False
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(9, 204)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(114, 14)
        Me.Label1.TabIndex = 21
        Me.Label1.Text = "References dll info:"
        Me.Label1.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'lstDllInfo
        '
        Me.lstDllInfo.Font = New System.Drawing.Font("Arial", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lstDllInfo.ItemHeight = 14
        Me.lstDllInfo.Location = New System.Drawing.Point(8, 223)
        Me.lstDllInfo.Name = "lstDllInfo"
        Me.lstDllInfo.Size = New System.Drawing.Size(408, 74)
        Me.lstDllInfo.TabIndex = 22
        '
        'lblLastChange
        '
        Me.lblLastChange.Location = New System.Drawing.Point(9, 172)
        Me.lblLastChange.Name = "lblLastChange"
        Me.lblLastChange.Size = New System.Drawing.Size(218, 32)
        Me.lblLastChange.TabIndex = 23
        Me.lblLastChange.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'lblCreator
        '
        Me.lblCreator.AutoSize = True
        Me.lblCreator.Font = New System.Drawing.Font("Arial", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lblCreator.Location = New System.Drawing.Point(9, 303)
        Me.lblCreator.Name = "lblCreator"
        Me.lblCreator.Size = New System.Drawing.Size(96, 14)
        Me.lblCreator.TabIndex = 13
        Me.lblCreator.Text = "Created By: Aaron"
        Me.lblCreator.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'FrmAbout
        '
        Me.AutoScaleBaseSize = New System.Drawing.Size(5, 13)
        Me.ClientSize = New System.Drawing.Size(422, 393)
        Me.ControlBox = False
        Me.Controls.Add(Me.lblMes)
        Me.Controls.Add(Me.lblLastChange)
        Me.Controls.Add(Me.lstDllInfo)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.GroupBox1)
        Me.Controls.Add(Me.lblAll)
        Me.Controls.Add(Me.lblCopyrigth)
        Me.Controls.Add(Me.lblWarning)
        Me.Controls.Add(Me.cmdOk)
        Me.Controls.Add(Me.lblVersion)
        Me.Controls.Add(Me.lblEmail)
        Me.Controls.Add(Me.lblCreator)
        Me.Controls.Add(Me.GroupBox6)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.Fixed3D
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.Name = "FrmAbout"
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "About..."
        Me.GroupBox6.ResumeLayout(False)
        CType(Me.PictureBox2, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub

#End Region

    Private Sub frmAbout_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim objAssemblyCmInfo As AssemblyDescriptionAttribute
        Try
            objAssemblyCmInfo = Attribute.GetCustomAttribute([Assembly].GetExecutingAssembly, GetType(AssemblyDescriptionAttribute))
            Me.lblLastChange.Text = "Description: " & objAssemblyCmInfo.Description
            LoadFileInfo(Me.lstDllInfo, Application.StartupPath, "NONE")
            Me.Text = "About..."
            Me.lblVersion.Text = "Version: " & Application.ProductVersion.ToString
            Me.lblCopyrigth.Text = "Copyright " & Year(System.IO.File.GetCreationTime(Application.ExecutablePath))

        Catch ex As Exception

        Finally
        End Try
    End Sub

    Private Sub cmdOk_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles cmdOk.Click
        Me.Close()
    End Sub

    Protected Overrides Sub Finalize()
        MyBase.Finalize()
    End Sub

    Private Sub LoadFileInfo(ByVal objLBox As ListBox, Optional ByVal strPath As String = "NONE", Optional ByVal strLookFor As String = "KMES*.DLL")
        Try
            Dim I As Integer = 0
            Dim objDirectory As New DirectoryInfo(strPath)
            Dim objFileArr As FileInfo() = objDirectory.GetFiles
            Dim objFile As FileInfo
            Dim objFileInfo As Object

            If strPath = "NONE" Then strPath = Application.StartupPath()
            objLBox.Items.Clear()

            For Each objFile In objFileArr
                If strLookFor = "NONE" Or (objFile.Name.ToUpper Like strLookFor.ToUpper) Then
                    If objFile.Name.ToUpper.EndsWith(".DLL") Then
                        objFileInfo = objGenericFileInfo.GetFile(objFile.FullName)
                        objLBox.Items.Add(objFile.Name & Space(2) & " Version: " & _
                              objGenericFileInfo.GetFileVersion(objFile.FullName) & Space(2) & "Create Date: " & objFile.CreationTime.ToShortDateString)
                    End If
                End If
            Next
        Catch ex As Exception
        End Try
    End Sub
End Class
