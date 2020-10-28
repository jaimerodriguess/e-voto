<?php
    
    require 'app/Entity/Document.php';

    class DocumentNumeratorController{
    
        public function index()
        {   
            if ($_SESSION['dataLogin']){

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('documentNumerator.html');
                
                try {
                    $selectedDocuments = DocumentNumerator::selectedByOwner($_SESSION['dataLogin']['codOPM']);
                                
                    $params = array();
        
                    $params['documentNumerator'] = $selectedDocuments;

                    array_push($params, $params["login"] = $_SESSION['dataLogin']['codOPM']);
                    array_push($params, $params["idAccess"] = $_SESSION['dataLogin']['id']);
             
                    $content = $template->render($params);
        
                    echo $content;
                
                } catch(Exception $e) {
                    echo '<script>alert("'.$e->getMessage().'");</script>';
                    echo '<script>configNumerator(); function configNumerator() {
                        if (confirm("Deseja configurar o numerador?")) {
                            location.href="?pagina=configNumerator"
                        } else {
                            location.href="?pagina=home"
                        }
                        
                    };</script>';                               
                }
            } else {
                echo '<script>alert("Faça o login!")</script>';
                echo '<script>location.href="?pagina=login"</script>'; 
            }  
        }
  
        public function search()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('documentNumerator.html');
                         
            try {
                $selectedDocuments = DocumentNumerator::selectedByOwner($_SESSION['dataLogin']['codOPM']);

                $functions = array_keys(array_filter($_POST));
                array_shift($functions);
               
                foreach( $functions as $key ){

                    $function = 'Document::'.$key;
                  
                    $finalKey = call_user_func_array($function, array($selectedDocuments));                     
                 }
                            
                $params = array();
    
                $params['documentNumerator'] = isset($finalKey) ? $finalKey : $selectedDocuments;
    
                $content = $template->render($params);
    
                echo $content;

            } catch(Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="?pagina=documentNumerator"</script>'; 
            }          
        }

        public function create()
        {
            try {                
                $doc = new Document();
                
                $dataDocument = (object)$_POST;                
                               
                $number = $doc->newNumber($dataDocument, $dataDocument->documentOwner);
                

                array_push($dataDocument, $dataDocument->numberDocument = $number += 1);

                DocumentNumerator::create($dataDocument);

         
                //echo '<script>alert("Documento criado com sucesso!");</script>';
                //echo '<script>location.href="?pagina=documentNumerator"</script>';
            } catch(Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                //echo '<script>location.href="?pagina=documentNumerator"</script>'; 

            }
        }

        public function change($paramId)
        {
            $doc = new Document();
            
            $document = DocumentNumerator::selectPerId($paramId);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
			$twig = new \Twig\Environment($loader);
            $template = $twig->load('editDocument.html');
                            
            $number = $doc->newNumber($document, $doc->setDocumentType($document->documentType));
            
            $params = array();
            $number == $document->numberDocument ? $params['delete'] = true : $params['delete'] = false;
            $params['numberDocument'] = $document->numberDocument;
            $params['idDocument'] = $document->idDocument;
            $params['documentType'] = $document->documentType;
            $params['documentTransit'] = $document->documentTransit;
            $params['documentProcessing'] = $document->documentProcessing;
            $params['documentNature'] = $document->documentNature;
            $params['documentInterested'] = $document->documentInterested;
            $params['documentSubject'] = $document->documentSubject;
            $params['documentDestination'] = $document->documentDestination;
            
            $content = $template->render($params);

            echo $content; 
        }

        public function update()
        {
            try {
                           
                DocumentNumerator::update($_POST);

            	echo '<script>alert("Documento alterado com sucesso!");</script>';
				echo '<script>location.href="?pagina=documentNumerator"</script>';
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="?pagina=documentNumerator&metodo=change&id='.$_POST['idDocument'].'"</script>';
			}
        }

        public function cancel()
        {
            try {
                
                $dataDocument = array("documentTransit" => 0,
                      "documentProcessing" => 0,
                      "documentNature" => 0,
                      "documentInterested" => '----------', 
                      "documentSubject" => 'CANCELADO', 
                      "documentDestination" => '----------',
                      "idDocument" => $_GET['id']);

                           
                DocumentNumerator::update($dataDocument);

            	echo '<script>alert("Documento cancelado com sucesso!");</script>';
				echo '<script>location.href="?pagina=documentNumerator"</script>';
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="?pagina=documentNumerator&metodo=change&id='.$_POST['idDocument'].'"</script>';
			}
        }

        public function delete($paramId)
		{
			try {
				DocumentNumerator::delete($paramId);

				echo '<script>alert("Documento deletado com sucesso!");</script>';
				echo '<script>location.href="?pagina=documentNumerator"</script>';
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="?pagina=documentNumerator"</script>';
			}
			
		}

    }
?>