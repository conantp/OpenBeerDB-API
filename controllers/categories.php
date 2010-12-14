<?php
require_once "../models/categoriesModel.php";

class CategoriesController extends AppController {

	/**
	 * api.openbeerdb.com/categories/list
	 * @author hoke
	 * @param limit (int) via GET
	 * @param offset (int) via GET
	 * This function lists categories, ordered by id
	 */
	public function actionList() {
		$limit = $this->get['limit'];
		$offset = $this->get['offset'];
		if (!$limit){$limit = 50;}
		if (!$offset){$offset = 0;}
		
	    $categoriesModel = new categoriesModel();

	    $results = $categoriesModel->getCategories($limit, $offset);
	    
		$this->setLayout('echo');
        $this->setVar('results', $results);
	}
	
	/**
	 * api.openbeerdb.com/categories/get
	 * @author hoke
	 * @param id (int) via GET
	 * @param name (int) via GET
	 * This function gets a category by id or name
	 */
	public function actionGet() {
		$id = $this->get['id'];
		$name = urldecode($this->get['name']);
		
	    $categoriesModel = new categoriesModel();
	    
		if ($id){
			$results = $categoriesModel->getCategoryById($id);
		} else if ($name){
			$results = $categoriesModel->getCategoryByName($name);
		} else {
			//throw appropriate error here
			exit('required: id or name');
		}

		$this->setLayout('echo');
		$this->setVar('results', $results);
	}
}
?>