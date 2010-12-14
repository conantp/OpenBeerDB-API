<?php
require_once "../models/stylesModel.php";

class StylesController extends AppController {

	/**
	 * api.openbeerdb.com/styles/list
	 * @author hoke
	 * @param limit (int) via GET
	 * @param offset (int) via GET
	 * This function lists styles, ordered by id
	 */
	// not sure we want to allow listing off 
	// all styles w/ no category context.
	/*public function actionList() {
		$limit = $this->get['limit'];
		$offset = $this->get['offset'];
		if (!$limit){$limit = 50;}
		if (!$offset){$offset = 0;}
		
	    $stylesModel = new stylesModel();

	    $results = $stylesModel->getStyles($limit, $offset);
	    
		$this->setLayout('echo');
        $this->setVar('results', $results);
	}*/
	
	/**
	 * api.openbeerdb.com/styles/get
	 * @author hoke
	 * @param id (int) via GET
	 * @param name (int) via GET
	 * This function gets a style by id, name or category id
	 */
	public function actionGet() {
		$id = $this->get['id'];
		$name = urldecode($this->get['name']);
		$category_id = urldecode($this->get['category_id']);
		
	    $stylesModel = new stylesModel();
	    
		if ($id){
			$results = $stylesModel->getStyleById($id);
		} else if ($name){
			$results = $stylesModel->getStyleByName($name);
		} else if ($category_id){
			$results = $stylesModel->getStyleByCategory($category_id);
		} else {
			//throw appropriate error here
			exit('required: id, name or category id');
		}

		$this->setLayout('echo');
		$this->setVar('results', $results);
	}
}
?>