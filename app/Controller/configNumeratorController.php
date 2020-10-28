<?php 
    class configNumeratorController {
        
        public function index()
        {
                     
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
			$twig = new \Twig\Environment($loader);
            $template = $twig->load('configNumerator.html');
            
            try {
                $selectedDocuments = DocumentNumerator::selectedByOwner(502002200);
                               
                $params = array();
    
                $params['documentNumerator'] = $selectedDocuments;
    
                $content = $template->render($params);
    
                echo $content;

            } catch(Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>configNumerator(); function configNumerator() {
                    if (confirm("Deseja configurar o numerador?")) {
                        location.href="http://localhost/SysADM?pagina=configNumerator"
                    } else {
                        location.href="http://localhost/SysADM"
                    }
                    
                };</script>';                               
            }   
        
        }
    }
?>