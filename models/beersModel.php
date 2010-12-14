<?php

/**
 * beersModel Class
 * @author hoke
 * This model interacts with the database for the 
 * beers controller.
 */
class beersModel {
	private $db;
	private $db_config;

	public function beersModel() {
		$this->db_config = parse_ini_file('../config/db.ini');
		$err = '';
		$this->db = new mysqli($this->db_config['hostname'], $this->db_config['username'], 
			$this->db_config['password'], $this->db_config['database']);
		if (mysqli_connect_error()) {
		    $err =  mysqli_connect_error();
		}
		if ($err)  exit($err);
	}
	
	public function getBeers($limit, $offset){
		$query = sprintf("SELECT * FROM beers ORDER BY id ASC LIMIT %d", $limit);
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
	
	public function getBeerById($id){
		$query = sprintf("SELECT * FROM beers WHERE id = %d", $id);
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){ 
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
	
	public function getBeerByName($name){
		$query = sprintf("SELECT * FROM beers WHERE name = '%s'", $name);
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
	
	public function getBeerByBrewery($brewery_id){
		$query = sprintf("SELECT * FROM beers WHERE brewery_id = %d", $brewery_id);
		$results = $this->db->query($query);
		
		$set = array();
		if ($results->num_rows > 0){
			while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
				$set[] = $row;
			}
		}
		return $set;
	}
	
   public function searchForBeer($type, $name){

   	   switch ($type) {
		  case 'starts_with':
		      $query = sprintf("SELECT * FROM beers WHERE name LIKE '%s'", $name . "%");
		      break;
		  case 'contains':
		      $query = sprintf("SELECT * FROM beers WHERE name LIKE '%s'", "%". $name . "%");
		      break;
		  default:
		  	  exit('invalid search type: type should equal "starts_with" or "contains"');
	   }
   	
        
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