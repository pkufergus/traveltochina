''' <summary>
''' aie_scheduling_data:实体类(属性说明自动提取数据库字段的描述信息)
''' </summary>
<Serializable()> _
Partial Public Class aie_scheduling_data
    Public Sub New()
    End Sub
#Region "Model"
    Private _id As Integer
    Private _departure_date As DateTime
    Private _departure_city As String
    Private _destination_city As String
    Private _day_cycle As Integer
    Private _status As String
    Private _exception_id As System.Nullable(Of Integer) = -1
    Private _undone As String = "False"
    ''' <summary>
    ''' auto_increment
    ''' </summary>
    Public Property ID() As Integer
        Get
            Return _id
        End Get
        Set(ByVal value As Integer)
            _id = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property departure_date() As DateTime
        Get
            Return _departure_date
        End Get
        Set(ByVal value As DateTime)
            _departure_date = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property departure_city() As String
        Get
            Return _departure_city
        End Get
        Set(ByVal value As String)
            _departure_city = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property destination_city() As String
        Get
            Return _destination_city
        End Get
        Set(ByVal value As String)
            _destination_city = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property day_cycle() As Integer
        Get
            Return _day_cycle
        End Get
        Set(ByVal value As Integer)
            _day_cycle = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property status() As String
        Get
            Return _status
        End Get
        Set(ByVal value As String)
            _status = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property exception_id() As System.Nullable(Of Integer)
        Get
            Return _exception_id
        End Get
        Set(ByVal value As System.Nullable(Of Integer))
            _exception_id = value
        End Set
    End Property
    ''' <summary>
    ''' 
    ''' </summary>
    Public Property undone() As String
        Get
            Return _undone
        End Get
        Set(ByVal value As String)
            _undone = value
        End Set
    End Property
#End Region

End Class
