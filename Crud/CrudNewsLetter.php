<?php
namespace Crud;
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 11:16
 */

class CrudNewsLetter extends ConnectDB

{
	/**
	 * Crud constructor.
	 */
	public function __construct()
	{
		ConnectDB::getConnection();
	}

	public function getData($query)
	{
		$result = self::getConnection()->query($query);

		if ($result == false) {
			return false;
		}

		return $result;
	}


	public function create()
	{
		$query = "INSERT INTO `newsletter` (prenom, nom, mail, telephone, service) VALUES (:prenom, :nom, :mail, :telephone, :service)";
		$result = self::getConnection()->prepare($query);
		$result->bindValue(':prenom', htmlentities($_POST['prenom']));
		$result->bindValue(':nom', htmlentities($_POST['nom']));
		$result->bindValue(':mail', htmlentities($_POST['mail']));
		$result->bindValue(':telephone', htmlentities($_POST['telephone']));
		$result->bindValue(':service', htmlentities($_POST['service']));
		$result->execute();
	}

	/**
	 * @param $id
	 * @param $table
	 *
	 * @return bool
	 */

	public function delete($table, $id)
	{
		$query = "DELETE FROM $table WHERE id = $id";

		$result = self::getConnection()->exec($query);

		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}


	public function update()
	{
		$query = "UPDATE newsletter SET prenom = :prenom, nom = :nom, mail = :mail, telephone = :telephone, service = :service  WHERE id = :id";
		$result = self::getConnection()->prepare($query);
		$result->bindValue(':prenom', htmlentities($_POST['prenom']));
		$result->bindValue(':nom', htmlentities($_POST['nom']));
		$result->bindValue(':mail', htmlentities($_POST['mail']));
		$result->bindValue(':telephone', htmlentities($_POST['telephone']));
		$result->bindValue(':service', htmlentities($_POST['service']));
		$result->bindValue(':id', htmlentities($_GET['id']));

		$result->execute();
	}

}