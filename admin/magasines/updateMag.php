<?php

require_once '../../vendor/autoload.php';
use Crud\CrudMagazines;
if(!empty($_POST))
{
	$crud = new CrudMagazines();
	$crud->update();
	header('Location: ../index.php?p=listeMag');
	exit();
}


?>
<link rel="stylesheet" href="../assets/css/base.css">



<form method="post">

	<input type="text" name="titre">
	<input type="text" name="img">
	<input type="text" name="zones">

	<input type="submit">

</form>
