<?php

namespace Crud;
use \PDO;
/**
 * Created by PhpStorm.
 * User: NicolasLEROY
 * Date: 15/05/2017
 * Time: 11:16
 */

class CrudMagazines extends ConnectDB {
	/**
	 * Crud constructor.
	 */
	public function __construct() {
		ConnectDB::getConnection();
	}

	public function getData( $query ) {
		$result = self::getConnection()->query( $query );
		if ( $result == false ) {
			return false;
		}

		return $result;
	}

	public function detailMag( $query )
	{
		$result = self::getConnection()->prepare($query);
		$result->bindValue(':part_id', $_GET['mag_id']);
		$result->execute();
		$data = $result->fetchAll(PDO::FETCH_ASSOC);



		return $data;
	}

	public function detailActu( $query )
	{
		$result = self::getConnection()->prepare($query);
		$result->execute();
		$data = $result->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}



	public function create() {
		$query  = "INSERT INTO `magasine` (titre, img, zones) VALUES (:titre, :img, :zones)";
		$result = self::getConnection()->prepare( $query );
		$result->bindValue( ':titre', htmlentities( $_POST['titre'] ) );
		$result->bindValue( ':img', htmlentities( $_POST['img'] ) );
		$result->bindValue( ':zones', htmlentities( $_POST['zones'] ) );
		$result->execute();
	}

	/**
	 * @param $id
	 * @param $table
	 *
	 * @return bool
	 */

	public function delete( $table, $id ) {
		$query = "DELETE FROM $table WHERE id = $id";

		$result = self::getConnection()->exec( $query );

		if ( $result == false ) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;

			return false;
		} else {
			return true;
		}
	}


	public function update() {
		$query  = "UPDATE magasine SET titre = :titre, img = :img, zones= :zones WHERE id = :id";
		$result = self::getConnection()->prepare( $query );
		$result->bindValue( ':titre', htmlentities( $_POST['titre'] ) );
		$result->bindValue( ':img', htmlentities( $_POST['img'] ) );
		$result->bindValue( ':zones', htmlentities( $_POST['zones'] ) );
		$result->bindValue( ':id', htmlentities( $_GET['id'] ) );
		$result->execute();
	}

}