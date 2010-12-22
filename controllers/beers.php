<?php
require_once "../models/beersModel.php";

class BeersController extends AppController {

	/**
	 * api.openbeerdb.com/beers/list
	 * @author hoke
	 * @param limit (int) via GET
	 * @param offset (int) via GET
	 * This function lists beers, ordered by id
	 */
	public function actionList() {
		$limit = $this->get['limit'];
		$offset = $this->get['offset'];
		if (!$limit){$limit = 50;}
		if (!$offset){$offset = 0;}
		
	    $beersModel = new beersModel();

	    $results = $beersModel->getBeers($limit, $offset);
	    
		$this->setLayout('echo');
        $this->setVar('results', $results);
	}
	
	/**
	 * api.openbeerdb.com/beers/get
	 * @author hoke
	 * @param id (int) via GET
	 * @param name (string) via GET
	 * @param brewery_id (int) via GET
	 * This function gets a beer by id, name or brewery_id
	 */
	public function actionGet() {
		$id = $this->get['id'];
		$name = urldecode($this->get['name']);
		$brewery_id = $this->get['brewery_id'];
		
	    $beersModel = new beersModel();
	    
		if ($id){
			$results = $beersModel->getBeerById($id);
		} else if ($name){
			$results = $beersModel->getBeerByName($name);
		} else if ($brewery_id){
			$results = $beersModel->getBeerByBrewery($brewery_id);
		} else {
			//throw appropriate error here
			exit('required: id, name or brewery id');
		}

		$this->setLayout('echo');
		$this->setVar('results', $results);
	}
	
    /**
     * api.openbeerdb.com/beers/search
     * @author hoke
     * @param type (string) via GET
     * @param name (string) via GET
     * This function searches for a beer by name
     */
    public function actionSearch() {
        $type = urldecode($this->get['type']);
        $name = urldecode($this->get['name']);
        
        if ($type == ''){ $type = "starts_with"; }

        $beersModel = new beersModel();
        
        if ($name){
            $results = $beersModel->searchForBeer($type, $name);
        } else {
            //throw appropriate error here
            exit('required: name');
        }

        $this->setLayout('echo');
        $this->setVar('results', $results);
    }
    
    /**
     * api.openbeerdb.com/beers/count
     * @author hoke
     * This function returns the number of beer records
     */
    public function actionCount() {
        $beersModel = new beersModel();
        
        $results = $beersModel->countBeers();

        $this->setLayout('echo');
        $this->setVar('results', $results);
    }
}
?>