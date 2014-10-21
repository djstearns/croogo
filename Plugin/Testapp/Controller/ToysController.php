<?php
App::uses('TestappAppController', 'Testapp.Controller');
/**
 * Toys Controller
 *
 * @property Toy $Toy
 * @property PaginatorComponent $Paginator
 */
class ToysController extends TestappAppController {

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
		$this->Toy->recursive = 0;
		$this->set('toys', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Toy->recursive = 0;
            $this->set('toys', $this->paginate());
             //check if this is a relationship table
                                     $toydata = $this->Toy->find('all');
                        
           
           
                        
            		$kids = $this->Toy->Kid->find('list', array('fields'=>array($this->Toy->Kid->displayField)));

                            $arr = array();
                            foreach($kids as $item => $i){
                                $arr[] = $i;
                            }
                            $kidstr = json_encode($arr);
                        		$this->set(compact('toydata', 'kidstr'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Toy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		$options = array('conditions' => array('Toy.' . $this->Toy->primaryKey => $id));
		$this->set('toy', $this->Toy->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Toy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		$options = array('conditions' => array('Toy.' . $this->Toy->primaryKey => $id));
		$this->set('toy', $this->Toy->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Toy->create();
			if ($this->Toy->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toy has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toy could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$kids = $this->Toy->Kid->find('list');
		$this->set(compact('kids'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Toy->create();
			if ($this->Toy->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toy has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toy could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$kids = $this->Toy->Kid->find('list');
		$this->set(compact('kids'));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Toy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Toy->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toy has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toy could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Toy.' . $this->Toy->primaryKey => $id));
			$this->request->data = $this->Toy->find('first', $options);
		}
		$kids = $this->Toy->Kid->find('list');
		$this->set(compact('kids'));
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Toy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Toy->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The toy has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The toy could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Toy.' . $this->Toy->primaryKey => $id));
			$this->request->data = $this->Toy->find('first', $options);
		}
		$kids = $this->Toy->Kid->find('list');
		$this->set(compact('kids'));
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
		$this->Toy->id = $id;
		if (!$this->Toy->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Toy->delete()) {
			$this->Session->setFlash(__d('croogo', 'Toy deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Toy was not deleted'), 'default', array('class' => 'error'));
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
		$this->Toy->id = $id;
		if (!$this->Toy->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid toy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Toy->delete()) {
			$this->Session->setFlash(__d('croogo', 'Toy deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Toy was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Toy']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Toy']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Toy']['file']['name'];
			move_uploaded_file($this->request->data['Toy']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Toyt']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Toy->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Toy->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Toy->find('all');
		$items = Hash::combine($items, '{n}.Toy.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Toy']['text'] = $item['Toy'][$this->Toy->displayField];
			$newitems[] = $item['Toy'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Toy->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Toy->recursive = -1;
		$this->autoRender = false;
		$check = $this->Toy->find('all', array('limit'=>200));
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
		$this->Toy->create();
		if ($this->Toy->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Toy->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Toy could not be saved. Please, try again.', true));
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
        $this->Toy->id=$_POST['id'];
		if ($this->Toy->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Toy could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Toy'
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
						'message' => 'Toy did not exist remotely!'
					);
			
		}
		if ($this->Toy->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Toy deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Toy not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Toy->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Toy->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Toy'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Toy->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Toy->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Toy->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Toy'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Toy->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Toy'] as $toy_id => $del){
			if($del == 1 ){$arr[] = $toy_id;}
		}
		if($this->Toy->deleteAll(array('Toy.id'=>$arr))) {
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
			$this->Toy->id = $_POST['pk'];
			if($this->Toy->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Toy->id = $_POST['pk'];
			if($this->Toy->saveField($_POST['name'],$_POST['value'])) {
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
			$this->Toy->id = $_POST['pk'];
			if($this->Toy->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Toy->id = $_POST['pk'];
			if($this->Toy->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>