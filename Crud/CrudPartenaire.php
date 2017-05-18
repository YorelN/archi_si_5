<?php
namespace Crud;
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 11:16
 */

class CrudPartenaire extends ConnectDB

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
		$query = "INSERT INTO `partnaire` (secteur, nom, codepostal) VALUES (:secteur, :nom, :codepostal)";
		$result = self::getConnection()->prepare($query);
		$result->bindValue(':secteur', htmlentities($_POST['secteur']));
		$result->bindValue(':nom', htmlentities($_POST['nom']));
		$result->bindValue(':codepostal', htmlentities($_POST['codepostal']));
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
		$query = "UPDATE partnaire SET secteur = :secteur, nom = :nom, codepostal = :codepostal  WHERE id = :id";
		$result = self::getConnection()->prepare($query);
		$result->bindValue(':secteur', htmlentities($_POST['secteur']));
		$result->bindValue(':nom', htmlentities($_POST['nom']));
		$result->bindValue(':codepostal', htmlentities($_POST['codepostal']));
		$result->bindValue(':id', htmlentities($_GET['id']));
		$result->execute();
	}

}