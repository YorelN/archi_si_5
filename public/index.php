<?php
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 16/05/2017
 * Time: 19:58
 */



//
//session_start();
//
//if (!$_SESSION)
//{
//	header('Location: login.php');
//	exit();
//}



require_once '../vendor/autoload.php';
use Crud\CrudPartenaire;
use Crud\CrudMagazines;
use Crud\CrudNewsLetter;


$crudPart = new CrudPartenaire();
$crudMag = new CrudMagazines();
$crudNews = new CrudNewsLetter();

$page = 'index';
if (isset($_GET['p'])) $page = $_GET['p'];




$queryPart = "SELECT    partnaire.id,
						partnaire.secteur,
						partnaire.zone,
						partnaire.nom,
						partnaire.codepostal,
						partnaire.mag_id,

						
						magasine.id,
 						magasine.titre,
 						magasine.zones,
 						magasine.alt,
 						magasine.part_id

 						
 						FROM
 						 
 						partnaire 
 						
 						INNER JOIN 
 						magasine 
 						ON
 						magasine.part_id = partnaire.id 
 						WHERE magasine.id = :part_id";




$queryMag = "SELECT * FROM magasine ";
$queryNews = "SELECT * FROM newsletter ";
$queryMagDetail = "SELECT * FROM magasine WHERE id = :id";
$queryActu = "SELECT * FROM actualites";




$loader = new Twig_Loader_Filesystem( __DIR__ . '/template' );
$twig = new Twig_Environment($loader, array(
	'debug' => true,
	'cache' => false
//    'cache' => __DIR__.'/cache',
));
$twig->addGlobal('current_page', $page);
$twig->addExtension(new Twig_Extension_Debug());






switch ($page)
{
	case 'home':
		echo $twig->render('home.twig');
		break;
	case 'listmag':
		echo $twig->render('revue_filtre.twig',  ['listmag' => $crudMag->getData($queryMag)]);
		break;
	case 'details':
		echo $twig->render('revue_detail.twig',  ['details' => $crudMag->detailMag($queryPart)]);
		break;
	case 'mention':
		echo $twig->render('mention.twig');
		break;
	case 'actu':
		echo $twig->render('actu.twig');
		break;
	case 'detail_actu':
		echo $twig->render('detail_actu.twig', ['detailactu'  =>  $crudMag->detailActu($queryActu)]);
		break;
	case 'apropos':
		echo $twig->render('Apropos.twig');
		break;
	default :
		header('HTTP/1.0 404 Not Found');
		echo $twig->render('404.twig');
}

