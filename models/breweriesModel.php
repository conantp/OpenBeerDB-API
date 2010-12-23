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
	
    public function getGeocode($name, $id){
        if ($name) {
          // get the brewery's id by name
          $r = $this->db->query(sprintf("SELECT id FROM breweries WHERE name = '%s'", $name));
          $id_row = $r->fetch_array();
          $id = $id_row['id'];
          
          $query = sprintf("SELECT brewery_id, latitude, longitude, 
            accuracy FROM breweries_geocode WHERE brewery_id = '%s'", $id);  
        } else {
          $query = sprintf("SELECT brewery_id, latitude, longitude, 
            accuracy FROM breweries_geocode WHERE brewery_id = '%s'", $id);  
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
	
    public function countBreweries(){
        $query = sprintf("SELECT id FROM breweries");
        $results = $this->db->query($query);

        return array("count" => $results->num_rows);
    }

	
}

?>