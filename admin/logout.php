<?php
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 18:27
 */

namespace Classes;
require_once '../vendor/autoload.php';


session_start();
session_unset();
session_destroy();

header('Location: login.php');
exit();
