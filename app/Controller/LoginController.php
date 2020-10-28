<?php
    session_start(); 
       
    class LoginController {

        public function index(){                                      
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('login.html');
			$parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;                               
        }

        public function login(){
            
            try {                  
                $dataUser = $_POST; 
                $_SESSION['dataLogin'] = LoginUser::login($dataUser);                  
                echo '<script>location.href="?pagina=home"</script>';
            } catch(Exception $e) {
                unset($_SESSION['datalogin']);
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="?pagina=login"</script>'; 
            }
        }      

        public function logout()
        {            
            session_destroy();
            unset($_SESSION['dataLogin']);
            echo '<script>location.href="?pagina=login"</script>'; 
        }
    }
?>