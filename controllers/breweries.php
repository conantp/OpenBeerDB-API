<?php
require_once "../models/breweriesModel.php";

class BreweriesController extends AppController {

	/**
	 * api.openbeerdb.com/breweries/list
	 * @author hoke
	 * @param limit (int) via GET
	 * @param offset (int) via GET
	 * This function lists breweries, ordered by id
	 */
	public function actionList() {
		$limit = $this->get['limit'];
		$offset = $this->get['offset'];
		if (!$limit){$limit = 50;}
		if (!$offset){$offset = 0;}
		
	    $breweriesModel = new breweriesModel();

	    $results = $breweriesModel->getBreweries($limit, $offset);
	    
		$this->setLayout('echo');
        $this->setVar('results', $results);
	}
	
	/**
	 * api.openbeerdb.com/breweries/get
	 * @author hoke
	 * @param id (int) via GET
	 * @param name (int) via GET
	 * This function gets a brewery by id or name
	 */
	public function actionGet() {
		$id = $this->get['id'];
		$name = urldecode($this->get['name']);
		
	    $breweriesModel = new breweriesModel();
	    
		if ($id){
			$results = $breweriesModel->getBreweryById($id);
		} else if ($name){
			$results = $breweriesModel->getBreweryByName($name);
		} else {
			//throw appropriate error here
			exit('required: id or name');
		}

		$this->setLayout('echo');
		$this->setVar('results', $results);
	}
	
    /**
     * api.openbeerdb.com/breweries/geocode
     * @author hoke
     * @param id (int) via GET
     * @param name (int) via GET
     * This function gets a brewery by id or name
     */
    public function actionGeocode() {
        $id = $this->get['id'];
        $name = urldecode($this->get['name']);
        
        $breweriesModel = new breweriesModel();
        
        if ($id || $name){
            $results = $breweriesModel->getGeocode($name, $id);
        } else {
            //throw appropriate error here
            exit('required: id or name');
        }

        $this->setLayout('echo');
        $this->setVar('results', $results);
    }
	
	/**
     * api.openbeerdb.com/breweries/count
     * @author hoke
     * This function returns the number of brewery records
     */
    public function actionCount() {
        $breweriesModel = new breweriesModel();
        
        $results = $breweriesModel->countBreweries();

        $this->setLayout('echo');
        $this->setVar('results', $results);
    }
}
?>