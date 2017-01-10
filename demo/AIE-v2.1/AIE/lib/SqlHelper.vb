Imports MySql.Data.MySqlClient

Public Class SqlHelper
    Private Shared sqlFactory As SqlHelper = Nothing

    Private Sub New()
    End Sub

    Public Shared Function Instance() As SqlHelper
        If sqlFactory Is Nothing Then
            sqlFactory = New SqlHelper()
        End If
        Return sqlFactory
    End Function

    Public Function EstablishConnection() As MySqlConnection
        Dim connect As MySqlConnection
        Dim connStr As String
        Try
            Dim db_hash As Hashtable = HandleXML.Instance.read_database_config()
            connect = New MySqlConnection
            connStr = String.Format("server={0};user id={1}; password={2}; database={3}; pooling=false;character set=utf8", db_hash.Item("server"), db_hash.Item("user"), db_hash.Item("password"), db_hash.Item("database"))
            connect.ConnectionString = connStr
            connect.Open()
            Return connect
        Catch ex As Exception
            Throw ex
        End Try
    End Function

    Public Function ExecuteQuery(ByVal strSql As String, ByVal strTableName As String, ByVal connection As MySqlConnection) As DataSet
        Dim ds As New DataSet
        Dim da As MySqlDataAdapter = Nothing
        Dim cmd As MySqlCommand = Nothing
        Try
            If connection.State = ConnectionState.Closed Then
                connection.Open()
            End If
            cmd = New MySqlCommand
            cmd.CommandType = CommandType.Text
            cmd.CommandText = strSql
            cmd.Connection = connection
            da = New MySqlDataAdapter(cmd)
            da.Fill(ds, strTableName)
        Catch ex As MySqlException
            Throw ex
        Finally
            cmd.Dispose()
            da.Dispose()
            cmd = Nothing
            da = Nothing
            connection.Close()
        End Try
        Return ds
    End Function

    Public Function ExecuteNoneQuery(ByVal strSQL As String, ByVal conn As MySqlConnection) As Boolean
        Try
            If conn.State = ConnectionState.Closed Or conn.State = ConnectionState.Broken Then
                conn.Open()
            End If
            Dim inst As MySqlCommand = New MySqlCommand(strSQL, conn)
            inst.ExecuteNonQuery()
            ExecuteNoneQuery = True
        Catch ex As MySqlException
            ExecuteNoneQuery = False
        Finally
            If conn.State = ConnectionState.Open Then
                conn.Close()
            End If
        End Try
    End Function

End Class

