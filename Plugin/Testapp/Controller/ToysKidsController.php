<?php
App::uses('TestappAppController', 'Testapp.Controller');
/**
 * ToysKids Controller
 *
 * @property ToysKid $ToysKid
 * @property PaginatorComponent $Paginator
 */
class ToysKidsController extends TestappAppController {

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
		$this->ToysKid->recursive = 0;
		$this->set('toysKids', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->ToysKid->recursive = 0;
            $this->set('toysKids', $this->paginate());
             //check if this is a relationship table
                                    $ToysKiddata = $this->ToysKid->find('all');
                              
           
           
                        
            		$this->set(compact('ToysKiddata'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ToysKid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		$options = array('conditions' => array('ToysKid.' . $this->ToysKid->primaryKey => $id));
		$this->set('toysKid', $this->ToysKid->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ToysKid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		$options = array('conditions' => array('ToysKid.' . $this->ToysKid->primaryKey => $id));
		$this->set('toysKid', $this->ToysKid->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ToysKid->create();
			if ($this->ToysKid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toys kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toys kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ToysKid->create();
			if ($this->ToysKid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toys kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toys kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ToysKid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ToysKid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toys kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toys kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ToysKid.' . $this->ToysKid->primaryKey => $id));
			$this->request->data = $this->ToysKid->find('first', $options);
		}
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ToysKid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ToysKid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toys kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toys kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ToysKid.' . $this->ToysKid->primaryKey => $id));
			$this->request->data = $this->ToysKid->find('first', $options);
		}
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
		$this->ToysKid->id = $id;
		if (!$this->ToysKid->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ToysKid->delete()) {
			$this->Session->setFlash(__d('croogo', 'Toys kid deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Toys kid was not deleted'), 'default', array('class' => 'error'));
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
		$this->ToysKid->id = $id;
		if (!$this->ToysKid->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid toys kid'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ToysKid->delete()) {
			$this->Session->setFlash(__d('croogo', 'Toys kid deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Toys kid was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['ToysKid']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['ToysKid']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['ToysKid']['file']['name'];
			move_uploaded_file($this->request->data['ToysKid']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['ToysKidt']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->ToysKid->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->ToysKid->recursive = 0;
    	$this->autoRender = false;
		$items = $this->ToysKid->find('all');
		$items = Hash::combine($items, '{n}.ToysKid.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['ToysKid']['text'] = $item['ToysKid'][$this->ToysKid->displayField];
			$newitems[] = $item['ToysKid'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->ToysKid->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->ToysKid->recursive = -1;
		$this->autoRender = false;
		$check = $this->ToysKid->find('all', array('limit'=>200));
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
		$this->ToysKid->create();
		if ($this->ToysKid->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->ToysKid->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The ToysKid could not be saved. Please, try again.', true));
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
        $this->ToysKid->id=$_POST['id'];
		if ($this->ToysKid->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The ToysKid could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid ToysKid'
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
						'message' => 'ToysKid did not exist remotely!'
					);
			
		}
		if ($this->ToysKid->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'ToysKid deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'ToysKid not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->ToysKid->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->ToysKid->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('ToysKid'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->ToysKid->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->ToysKid->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->ToysKid->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('ToysKid'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->ToysKid->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['ToysKid'] as $toysKid_id => $del){
			if($del == 1 ){$arr[] = $toysKid_id;}
		}
		if($this->ToysKid->deleteAll(array('ToysKid.id'=>$arr))) {
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
			$this->ToysKid->id = $_POST['pk'];
			if($this->ToysKid->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->ToysKid->id = $_POST['pk'];
			if($this->ToysKid->saveField($_POST['name'],$_POST['value'])) {
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
			$this->ToysKid->id = $_POST['pk'];
			if($this->ToysKid->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->ToysKid->id = $_POST['pk'];
			if($this->ToysKid->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>