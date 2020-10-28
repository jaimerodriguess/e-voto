<?php
 define("SYSPATH", __DIR__."/");
require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
//require_once 'app/Controller/PostController.php';
require_once 'app/Controller/SobreController.php';
//require_once 'app/Controller/AdminController.php';
require_once 'app/Controller/DocumentNumeratorController.php';
require_once 'app/Controller/configNumeratorController.php';
require_once 'app/Controller/LoginController.php';

require_once 'app/Model/DocumentNumerator.php';
require_once 'app/Model/Login.php';
//require_once 'app/Model/Comentario.php';

require_once 'vendor/autoload.php';

$css = file_get_contents('app/css/style.css');
$template_base = file_get_contents('app/Template/structure.html');

$template_css = str_replace('{{styleCss}}', "<style>".$css."</style>", $template_base);

$template = str_replace('{{name}}', $_SESSION['dataLogin']['nomeGuerra'], $template_css);

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
	
ob_end_clean();

$tplPronto = str_replace('{{dinamicArea}}', $saida, $template);

echo $tplPronto;


