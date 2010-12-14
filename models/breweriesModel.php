<?php

/**
 * breweriesModel Class
 * @author hoke
 * This model interacts with the database for the 
 * breweries controller.
 */
class breweriesModel {
	private $db;
	private $db_config;

	public function breweriesModel() {
		$this->db_config = parse_ini_file('../config/db.ini');
		$err = '';
		$this->db = new mysqli($this->db_config['hostname'], $this->db_config['username'], 
			$this->db_config['password'], $this->db_config['database']);
		if (mysqli_connect_error()) {
		    $err =  mysqli_connect_error();
		}
		if ($err)  exit($err);
	}
	
	public function getBreweries($limit, $offset){
		$query = sprintf("SELECT * FROM breweries ORDER BY id ASC LIMIT %d", $limit);
		if ($offset > 0){ $query .= sprintf(" OFFSET %d", $offset);}
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
	
	public function getBreweryById($id){
		$query = sprintf("SELECT * FROM breweries WHERE id = %d", $id);
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
	
	public function getBreweryByName($name){
		$query = sprintf("SELECT * FROM breweries WHERE name = '%s'", $name);
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
}

?>