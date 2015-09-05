<?php
App::uses('TestappAppController', 'Testapp.Controller');
/**
 * Adults Controller
 *
 * @property Adult $Adult
 * @property PaginatorComponent $Paginator
 */
class AdultsController extends TestappAppController {

public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('editindexsavefld','admin_editindexsavefld','admin_savehabtmfld','savehabtmfld','mobileindex','mobileadd','mobilesave','mobiledelete','admin_getlist');
		
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Testapp.Csv','Paginator');

/**
 * admin_indexold method
 *
 * @return void
 */
	public function index() {
		$this->Adult->recursive = 0;
		$this->set('adults', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Adult->recursive = 0;
            $this->set('adults', $this->paginate());
             //check if this is a relationship table
                                     $adultdata = $this->Adult->find('all');
                        
           
           
                        
            		$photos = $this->Adult->Photo->find('list', array('fields'=>array($this->Adult->Photo->displayField)));
		$this->set(compact('adultdata', 'photos'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Adult->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		$options = array('conditions' => array('Adult.' . $this->Adult->primaryKey => $id));
		$this->set('adult', $this->Adult->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Adult->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		$options = array('conditions' => array('Adult.' . $this->Adult->primaryKey => $id));
		$this->set('adult', $this->Adult->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Adult->create();
			if ($this->Adult->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The adult has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The adult could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$photos = $this->Adult->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Adult->create();
			if ($this->Adult->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The adult has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The adult could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$photos = $this->Adult->Photo->find('list');
		$this->set(compact('photos'));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Adult->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adult->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The adult has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The adult could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Adult.' . $this->Adult->primaryKey => $id));
			$this->request->data = $this->Adult->find('first', $options);
		}
		$photos = $this->Adult->Photo->find('list');
		$this->set(compact('photos'));
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Adult->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adult->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The adult has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The adult could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Adult.' . $this->Adult->primaryKey => $id));
			$this->request->data = $this->Adult->find('first', $options);
		}
		$photos = $this->Adult->Photo->find('list');
		$this->set(compact('photos'));
	}    
    
    

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Adult->id = $id;
		if (!$this->Adult->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Adult->delete()) {
			$this->Session->setFlash(__d('croogo', 'Adult deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Adult was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
 /**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Adult->id = $id;
		if (!$this->Adult->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid adult'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Adult->delete()) {
			$this->Session->setFlash(__d('croogo', 'Adult deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Adult was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Adult']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Adult']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Adult']['file']['name'];
			move_uploaded_file($this->request->data['Adult']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Adultt']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Adult->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Adult->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Adult->find('all');
		$items = Hash::combine($items, '{n}.Adult.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Adult']['text'] = $item['Adult'][$this->Adult->displayField];
			$newitems[] = $item['Adult'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Adult->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Adult->recursive = -1;
		$this->autoRender = false;
		$check = $this->Adult->find('all', array('limit'=>200));
		$save = array();
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid user'
			);
		}
		echo json_encode($response);
	}
    
    function mobileadd() {
		$this->autoRender = false;
		$this->Adult->create();
		if ($this->Adult->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Adult->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Adult could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid user'
			);
		}
		echo json_encode($response);
	}
    
     function mobilesave() {
		$this->autoRender = false;
        $this->Adult->id=$_POST['id'];
		if ($this->Adult->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Adult could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Adult'
			);
		}
		echo json_encode($response);
	}
    
    function mobiledelete($id = null) {
    	if(!isset($id)){
        	$id = $_POST['id'];
       	}
		if (!$id) {
			$response = array(
						'logged' => false,
						'message' => 'Adult did not exist remotely!'
					);
			
		}
		if ($this->Adult->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Adult deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Adult not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Adult->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Adult->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Adult'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Adult->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Adult->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Adult->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Adult'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Adult->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Adult'] as $adult_id => $del){
			if($del == 1 ){$arr[] = $adult_id;}
		}
		if($this->Adult->deleteAll(array('Adult.id'=>$arr))) {
			$this->Session->setFlash(__('Deleted.', true));
			$this->redirect(array('action' => 'editindex'));
		
		}else{
			$this->Session->setFlash(__('Could not be deleted.', true));
			$this->redirect(array('action' => 'editindex'));
		}

	}
    
  
    function admin_editindexsavefld() {
    
    	$this->autoRender = false;
	
		if(isset($_POST['value'])){
			$this->Adult->id = $_POST['pk'];
			if($this->Adult->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Adult->id = $_POST['pk'];
			if($this->Adult->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}
    
    function editindexsavefld() {
    
    	$this->autoRender = false;
	
		if(isset($_POST['value'])){
			$this->Adult->id = $_POST['pk'];
			if($this->Adult->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Adult->id = $_POST['pk'];
			if($this->Adult->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>