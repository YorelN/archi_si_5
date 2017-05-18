<?php

require_once '../../vendor/autoload.php';
use Crud\CrudMagazines;
if(!empty($_POST))
{
	$crud = new CrudMagazines();
	$crud->create();
	header('Location: ../index.php?p=listeMag');
	exit();
}


?>

<link rel="stylesheet" href="../assets/css/base.css">


<form method="post">
    <label>
	    <input type="text" name="titre" placeholder="Titre" class="input_form">
    </label>
    <label>
        <input type="text" name="img" placeholder="Chemin image" class="input_form">
    </label>
    <label>
        <input type="text" name="zone" placeholder="Zone" class="input_form">
    </label>
    <input type="submit">

</form>






