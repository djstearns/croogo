<?php
App::uses('TestappAppController', 'Testapp.Controller');
/**
 * Kids Controller
 *
 * @property Kid $Kid
 * @property PaginatorComponent $Paginator
 */
class KidsController extends TestappAppController {

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
		$this->Kid->recursive = 0;
		$this->set('kids', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Kid->recursive = 0;
            $this->set('kids', $this->paginate());
             //check if this is a relationship table
                                     $kiddata = $this->Kid->find('all');
                        
           
           
                        
            		$adults = $this->Kid->Adult->find('list', array('fields'=>array($this->Kid->Adult->displayField)));
		$attachments = $this->Kid->Attachment->find('list', array('fields'=>array($this->Kid->Attachment->displayField)));
		$moms = $this->Kid->Mom->find('list', array('fields'=>array($this->Kid->Mom->displayField)));
		$attachmentIds = $this->Kid->AttachmentId->find('list', array('fields'=>array($this->Kid->AttachmentId->displayField)));
		$toys = $this->Kid->Toy->find('list', array('fields'=>array($this->Kid->Toy->displayField)));

                            $arr = array();
                            foreach($toys as $item => $i){
                                $arr[] = $i;
                            }
                            $toystr = json_encode($arr);
                        		$this->set(compact('kiddata', 'adults', 'attachments', 'moms', 'attachmentIds', 'toystr'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Kid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		$options = array('conditions' => array('Kid.' . $this->Kid->primaryKey => $id));
		$this->set('kid', $this->Kid->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Kid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		$options = array('conditions' => array('Kid.' . $this->Kid->primaryKey => $id));
		$this->set('kid', $this->Kid->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Kid->create();
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$adults = $this->Kid->Adult->find('list');
		$attachments = $this->Kid->Attachment->find('list');
		$moms = $this->Kid->Mom->find('list');
		$attachmentIds = $this->Kid->AttachmentId->find('list');
		$toys = $this->Kid->Toy->find('list');
		$this->set(compact('adults', 'attachments', 'moms', 'attachmentIds', 'toys'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Kid->create();
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$adults = $this->Kid->Adult->find('list');
		$attachments = $this->Kid->Attachment->find('list');
		$moms = $this->Kid->Mom->find('list');
		$attachmentIds = $this->Kid->AttachmentId->find('list');
		$toys = $this->Kid->Toy->find('list');
		$this->set(compact('adults', 'attachments', 'moms', 'attachmentIds', 'toys'));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Kid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Kid.' . $this->Kid->primaryKey => $id));
			$this->request->data = $this->Kid->find('first', $options);
		}
		$adults = $this->Kid->Adult->find('list');
		$attachments = $this->Kid->Attachment->find('list');
		$moms = $this->Kid->Mom->find('list');
		$attachmentIds = $this->Kid->AttachmentId->find('list');
		$toys = $this->Kid->Toy->find('list');
		$this->set(compact('adults', 'attachments', 'moms', 'attachmentIds', 'toys'));
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Kid->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The kid has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The kid could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Kid.' . $this->Kid->primaryKey => $id));
			$this->request->data = $this->Kid->find('first', $options);
		}
		$adults = $this->Kid->Adult->find('list');
		$attachments = $this->Kid->Attachment->find('list');
		$moms = $this->Kid->Mom->find('list');
		$attachmentIds = $this->Kid->AttachmentId->find('list');
		$toys = $this->Kid->Toy->find('list');
		$this->set(compact('adults', 'attachments', 'moms', 'attachmentIds', 'toys'));
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
		$this->Kid->id = $id;
		if (!$this->Kid->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Kid->delete()) {
			$this->Session->setFlash(__d('croogo', 'Kid deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Kid was not deleted'), 'default', array('class' => 'error'));
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
		$this->Kid->id = $id;
		if (!$this->Kid->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid kid'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Kid->delete()) {
			$this->Session->setFlash(__d('croogo', 'Kid deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Kid was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Kid']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Kid']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Kid']['file']['name'];
			move_uploaded_file($this->request->data['Kid']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Kidt']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Kid->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Kid->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Kid->find('all');
		$items = Hash::combine($items, '{n}.Kid.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Kid']['text'] = $item['Kid'][$this->Kid->displayField];
			$newitems[] = $item['Kid'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Kid->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Kid->recursive = -1;
		$this->autoRender = false;
		$check = $this->Kid->find('all', array('limit'=>200));
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
		$this->Kid->create();
		if ($this->Kid->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Kid->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Kid could not be saved. Please, try again.', true));
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
        $this->Kid->id=$_POST['id'];
		if ($this->Kid->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Kid could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Kid'
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
						'message' => 'Kid did not exist remotely!'
					);
			
		}
		if ($this->Kid->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Kid deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Kid not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Kid->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Kid->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Kid'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Kid->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Kid->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Kid->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Kid'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Kid->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Kid'] as $kid_id => $del){
			if($del == 1 ){$arr[] = $kid_id;}
		}
		if($this->Kid->deleteAll(array('Kid.id'=>$arr))) {
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
			$this->Kid->id = $_POST['pk'];
			if($this->Kid->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Kid->id = $_POST['pk'];
			if($this->Kid->saveField($_POST['name'],$_POST['value'])) {
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
			$this->Kid->id = $_POST['pk'];
			if($this->Kid->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Kid->id = $_POST['pk'];
			if($this->Kid->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>