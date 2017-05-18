<?php
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 18:28
 */

namespace Crud;
require_once '../vendor/autoload.php';

class ConnectAdmin

{

	private $pseudo;
	private $password;
	private $bdd;


	public function __construct( $pseudo, $password )
	{
		$instance = new ConnectDB();
		$this->setPseudo($pseudo);
		$this->setPassword($password);
		$this->bdd = ConnectDB::getConnection();
	}


	public function session()
	{
		$requete = $this->bdd->prepare("SELECT id FROM admin WHERE pseudo = :pseudo");
		$requete->execute( array('pseudo' => $this->pseudo) );
		$requete = $requete->fetch();
		$_SESSION['id'] = $requete['id'];
		$_SESSION['pseudo'] = $this->pseudo;

		return 1;
	}


	public function verif()
	{

		$requete = $this->bdd->prepare("SELECT pseudo, password FROM admin WHERE pseudo = :pseudo");
		$requete->execute(array(
			'pseudo' => $this->pseudo
		));
		$reponse= $requete->fetch();
		if($reponse)
		{
			return "ok";
		}
		else
		{
			return "Le pseudo est inexistant";
		}

	}



	/**
	 * @return mixed
	 */
	public function getPseudo() {
		return $this->pseudo;
	}

	/**
	 * @param mixed $pseudo
	 */
	public function setPseudo( $pseudo ) {
		$this->pseudo = $pseudo;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword( $password ) {
		$this->password = $password;
	}


}