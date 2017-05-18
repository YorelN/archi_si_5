<?php

require_once '../../vendor/autoload.php';
use Crud\CrudPartenaire;
if(!empty($_POST))
{
	$crud = new CrudPartenaire();
	$crud->create();
	header('Location: ../index.php?p=listePart');
	exit();
}


?>



<form method="post">

	<input type="text" name="secteur">
	<input type="text" name="nom">
	<input type="text" name="codepostal">

	<input type="submit">

</form>

