<?php
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 11:24
 */
require_once '../../vendor/autoload.php';
use Crud\CrudNewsLetter;

$crud = new CrudNewsLetter();

$crud->delete('newsletter', $_GET['id']);

header('Location: ../index.php?p=listeNews');



