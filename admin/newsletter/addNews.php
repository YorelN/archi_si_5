<?php

require_once '../../vendor/autoload.php';
use Crud\CrudNewsLetter;
if(!empty($_POST))
{
	$crud = new CrudNewsLetter();
	$crud->create();
	header('Location: ../index.php?p=listeNews');
	exit();
}


?>



<form method="post">

	<input type="text" name="prenom">
	<input type="text" name="nom">
	<input type="text" name="mail">
    <input type="text" name="telephone">
    <input type="text" name="service">


    <input type="submit">

</form>

