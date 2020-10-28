<?php
   
    class DocumentNumerator
    {          
        public static function selectedByOwner($dataDocument)
		{
            $con = Connection::getConn();
			$sql = "SELECT * FROM sysadm_document WHERE documentOwner = :id ORDER BY documentTime DESC";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $dataDocument);
			$sql->execute();

            while ($row = $sql->fetchObject('DocumentNumerator')) {
                $result[] = $row;
            }

			if (empty($result)) {
				throw new Exception("Não foi encontrados documentos dessa unidade.");	
			} else {
				return $result;
            }               
        }

        public static function selectedDocuments($dataDocument)
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM sysadm_document WHERE documentOwner = :id AND documentSubject = :sub ORDER BY documentTime ASC";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $dataDocument['documentOwner']);
            $sql->bindValue(':sub', $dataDocument['documentSubject']);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('DocumentNumerator')) {
                $result[] = $row;
            }

            return $result;
        }

        public static function selectAllDocuments()
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM sysadm_document ORDER BY idDocument DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('DocumentNumerator')) {
                $result[] = $row;
            }
            
            return $result;
        }

        public static function create($dataDocument)
        {
            if (empty($dataDocument->documentSubject OR empty($dataDocument->documentDestination))) {
                throw new Exception("Preencha todos os campos!");
                return false;
            }
            
            $con = Connection::getConn();

            $sql = $con->prepare(
                'INSERT INTO sysadm_document (  idAccess,
                                                numberDocument,
                                                documentType,
                                                documentOwner,
                                                documentTransit,
                                                documentProcessing,
                                                documentNature,
                                                documentInterested, 
                                                documentDestination, 
                                                documentSubject   )VALUES(  :midAccess,
                                                                            :mnumberDocument,
                                                                            :mdocumentType,
                                                                            :mdocumentOwner, 
                                                                            :mdocumentTransit,
                                                                            :mdocumentProcessing,
                                                                            :mdocumentNature,
                                                                            :mdocumentInterested,
                                                                            :mdocumentDestination, 
                                                                            :mdocumentSubject)');
            $sql->bindValue(':midAccess', $dataDocument->idAccess);
            $sql->bindValue(':mnumberDocument', $dataDocument->numberDocument);
            $sql->bindValue(':mdocumentType', $dataDocument->documentType);
            $sql->bindValue(':mdocumentOwner', $dataDocument->documentOwner);
            $sql->bindValue(':mdocumentTransit', $dataDocument->documentTransit);   
            $sql->bindValue(':mdocumentProcessing', $dataDocument->documentProcessing); 
            $sql->bindValue(':mdocumentNature', $dataDocument->documentNature);
            $sql->bindValue(':mdocumentInterested', $dataDocument->documentInterested);
            $sql->bindValue(':mdocumentDestination', $dataDocument->documentDestination);
            $sql->bindValue(':mdocumentSubject', $dataDocument->documentSubject);  
         
            $result = $sql->execute();

            if ($result == 0) {
                throw new Exception("Falha ao criar documento!");
                return false;
            }
            return true;
        }

        public static function selectPerId($idDocument)
		{
			$con = Connection::getConn();

			$sql = "SELECT * FROM sysadm_document WHERE idDocument = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $idDocument, PDO::PARAM_INT);
			$sql->execute();

			$result = $sql->fetchObject('DocumentNumerator');

			if (!$result) {
				throw new Exception("Não foi encontrado nenhum registro no banco");	
			} 

			return $result;
        }
        
        public static function update($dataDocument)
		{
            $con = Connection::getConn();
            	$sql = "UPDATE sysadm_document SET 
                documentTransit = :mdocumentTransit,
                documentProcessing = :mdocumentProcessing,
                documentNature = :mdocumentNature,
                documentInterested = :mdocumentInterested,
                documentSubject = :mdocumentSubject,
                documentDestination = :mdocumentDestination
                    WHERE idDocument = :midDocument";
                    $sql = $con->prepare($sql);
                    $sql->bindValue(':mdocumentTransit', $dataDocument['documentTransit']);   
                    $sql->bindValue(':mdocumentProcessing', $dataDocument['documentProcessing']); 
                    $sql->bindValue(':mdocumentNature', $dataDocument['documentNature']);
                    $sql->bindValue(':mdocumentInterested', $dataDocument['documentInterested']);
                    $sql->bindValue(':mdocumentDestination', $dataDocument['documentDestination']);
                    $sql->bindValue(':mdocumentSubject', $dataDocument['documentSubject']);    
                    $sql->bindValue(':midDocument', $dataDocument['idDocument']);    
     

			    $result = $sql->execute();

			if ($result == 0) {
				throw new Exception("Falha ao alterar documento!");

				return false;
			}

			return true;
        }
        
        public static function delete($id)
		{
			$con = Connection::getConn();

			$sql = "DELETE FROM sysadm_document WHERE idDocument = :midDocument";
			$sql = $con->prepare($sql);
			$sql->bindValue(':midDocument', $id);
			$resultado = $sql->execute();

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar documento!");

				return false;
			}

			return true;
		}
    }
?>