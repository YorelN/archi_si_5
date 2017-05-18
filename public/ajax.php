<?php

require_once '../vendor/autoload.php';

use Crud\ConnectDB;
use Crud\CrudMagazines;

$ajax = new ConnectDB();
$mag = new CrudMagazines();

$output = '';
$sql = "SELECT titre FROM magasine WHERE titre LIKE '%". $_GET['q'] .  "%'";

//dump($mag->getData($sql));

if (false !== $result = $mag->getData($sql))
{
	foreach ($result as $key => $res){
		$output .= '<a href="index.php?p=home" class="link_search_bar">' . $res['titre'] . '</a>';
	}
	echo $output;
}

