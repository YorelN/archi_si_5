<?php
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 16/05/2017
 * Time: 19:58
 */




session_start();

if (!$_SESSION)
{
	header('Location: login.php');
	exit();
}



require_once '../vendor/autoload.php';
use Crud\CrudPartenaire;
use Crud\CrudMagazines;
use Crud\CrudNewsLetter;


$crudPart = new CrudPartenaire();
$crudMag = new CrudMagazines();
$crudNews = new CrudNewsLetter();

$page = 'home';
if (isset($_GET['p'])) $page = $_GET['p'];




$queryPart = "SELECT * FROM partnaire ";
$queryMag = "SELECT * FROM magasine ";
$queryNews = "SELECT * FROM newsletter ";



$loader = new Twig_Loader_Filesystem( __DIR__ . '/view' );
$twig = new Twig_Environment($loader, array(
	'debug' => true,
	'cache' => false,
//    'cache' => __DIR__.'/cache',
));
$twig->addGlobal('current_page', $page);
$twig->addExtension(new Twig_Extension_Debug());






switch ($page)
{
	case 'home':
		echo $twig->render('home.twig');
		break;
	case 'listePart':
		echo $twig->render('listPartenaires.twig',  ['listePart' => $crudPart->getData($queryPart)]);
		break;
	case 'listeMag':
		echo $twig->render('listMagazines.twig',  ['listeMag' => $crudMag->getData($queryMag)]);
		break;
	case 'listeNews':
		echo $twig->render('listNewsletter.twig',  ['listeNews' => $crudNews->getData($queryNews)]);
		break;
	default :
		header('HTTP/1.0 404 Not Found');
		echo $twig->render('404.twig');
}







