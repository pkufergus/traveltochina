Imports System.Xml
Imports System.Xml.XPath

Public Class HandleXML

    Private Shared HandleXMLFactory As HandleXML = Nothing

    Private Sub New()
    End Sub

    Public Shared Function Instance() As HandleXML
        If HandleXMLFactory Is Nothing Then
            HandleXMLFactory = New HandleXML
        End If
        Return HandleXMLFactory
    End Function

    Public Function read_database_config() As Hashtable
        Dim db_hash As New Hashtable
        Dim document As XPathDocument = load_xml_file("config.xml")
        Dim navigator As XPathNavigator = document.CreateNavigator()
        Dim server_node As XPathNavigator = navigator.SelectSingleNode("//AIE/DB/Value[@attribute='server']")
        Dim database_node As XPathNavigator = navigator.SelectSingleNode("//AIE/DB/Value[@attribute='database']")
        Dim user_node As XPathNavigator = navigator.SelectSingleNode("//AIE/DB/Value[@attribute='user']")
        Dim password_node As XPathNavigator = navigator.SelectSingleNode("//AIE/DB/Value[@attribute='password']")

        db_hash.Add("server", Utilities.Instance.decode_string(server_node.InnerXml.Trim))
        db_hash.Add("database", Utilities.Instance.decode_string(database_node.InnerXml.Trim))
        db_hash.Add("user", Utilities.Instance.decode_string(user_node.InnerXml.Trim))
        db_hash.Add("password", Utilities.Instance.decode_string(password_node.InnerXml.Trim))
        Return db_hash
    End Function

    Public Function write_database_config(ByVal server As String, ByVal database As String, ByVal user As String, ByVal password As String) As Boolean
        Try

            Dim reader As XmlTextReader = New XmlTextReader("config.xml")
            Dim doc As XmlDocument = New XmlDocument()
            doc.Load(reader)
            reader.Close()

            Dim oldCd As XmlNode
            Dim root As XmlElement = doc.DocumentElement
            oldCd = root.SelectSingleNode("//AIE/DB")

            Dim newCd As XmlElement = doc.CreateElement("DB")

            newCd.InnerXml = "<Value attribute='server'>" + Utilities.Instance.encode_string(server) + "</Value>" +
                    "<Value attribute='database'>" + Utilities.Instance.encode_string(database) + "</Value>" +
                    "<Value attribute='user'>" + Utilities.Instance.encode_string(user) + "</Value>" +
                    "<Value attribute='password'>" + Utilities.Instance.encode_string(password) + "</Value>"

            root.ReplaceChild(newCd, oldCd)
            doc.Save("config.xml")
        Catch ex As Exception
            Return False
        End Try
        Return True
    End Function

    Private Function load_xml_file(ByVal xmlfile As String) As XPathDocument
        Dim document As XPathDocument = New XPathDocument(xmlfile)
        Return document
    End Function

    Private Function LoadXMLFile(ByVal xmlFile As String, ByVal nodeName As String) As XmlNodeList
        Dim doc As XmlDocument
        Dim sourceList As XmlNodeList
        Try
            doc = New XmlDocument
            doc.Load(xmlFile)
            sourceList = doc.SelectNodes(nodeName)
            Return sourceList
        Catch ex As XmlException
        End Try
        Return Nothing
    End Function

    Public Function ReadXMLToArray(ByVal xmlFile As String, ByVal nodeName As String) As ArrayList
        Dim resultArray As New ArrayList
        Dim sourceList As XmlNodeList
        sourceList = LoadXMLFile(xmlFile, nodeName)
        For Each Source As XmlNode In sourceList
            resultArray.Add(Source.InnerText.Trim.ToLower)
        Next
        Return resultArray
    End Function

    Public Function ReadXMLToTable(ByVal xmlFile As String, ByVal nodeName As String) As DataTable
        Dim resultTable As New DataTable
        Dim sourceList As XmlNodeList
        Dim row As DataRow

        sourceList = LoadXMLFile(xmlFile, nodeName)
        resultTable.Columns.Add(New DataColumn("City", System.Type.GetType("System.String")))
        resultTable.Columns.Add(New DataColumn("CityCode", System.Type.GetType("System.String")))

        For i As Integer = 0 To sourceList.Count - 1
            row = resultTable.NewRow()
            row("City") = sourceList.Item(i).InnerText.Trim
            row("CityCode") = sourceList.Item(i).Attributes("Value").Value
            resultTable.Rows.Add(row)
        Next
        Return resultTable
    End Function

    Public Function ReadNodeText(ByVal xmlFile As String, ByVal nodeName As String) As String
        Dim resultText As String = ""
        Dim sourceList As XmlNodeList

        sourceList = LoadXMLFile(xmlFile, nodeName)
        For Each Source As XmlNode In sourceList
            resultText = Source.InnerText.Trim
        Next
        Return resultText
    End Function

End Class
