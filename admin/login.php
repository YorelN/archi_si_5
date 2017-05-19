<?php
session_start();
use Crud\ConnectAdmin;
require_once '../vendor/autoload.php';

if ($_SESSION) {
    header('Location: index.php?p=home');
}

if (isset($_POST) && count($_POST) > 0)
{
	if ( isset( $_POST['submit'] ) && isset( $_POST['pseudo'] ) && isset( $_POST['wordpass'] ) )
	{
		$log = new ConnectAdmin( $_POST['pseudo'], $_POST['wordpass'] );

		$verif = $log->verif();

		if ($verif == 'ok')
        {
	        if ( $log->session() )
	        {
		        header( 'Location: index.php?p=home' );
		        exit();
	        }
        }
	}
	else
    {

        echo "c'est nul";
	}
}
?>

<link rel="stylesheet" href="../assets/css/base.css">
<body class="loginAdmin">
<main>
    <div class="login">
        <div class="blue_btn">
            <a href="../public/index.php?p=home">Retourner sur le site</a>
        </div>
        <div class="login-screen">
            <div class="app-title">
            </div>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" value="" placeholder="E-mail" name="pseudo">
                    </div>

                    <div class="control-group">
                        <input type="password" class="login-field" value="" placeholder="Mot de passe" name="wordpass" ">
                    </div>
                    <input type="submit" class="green_btn" name="submit" value="Connexion">
                </div>
            </form>
        </div>
    </div>
</body>
</main>
