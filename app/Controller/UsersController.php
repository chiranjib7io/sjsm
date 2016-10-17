<?php
/*
Users Controller perform the login and loagout functionalities
with Dashboard of all type of users.
Also contain the Forgot password, new user registration and change password.
*/
App::uses('CakeEmail', 'Network/Email');
App::import('Controller', 'Loans');
class UsersController extends AppController {
	// List of models which are used in the organization controller 
	var $uses = array('User','LogRecord','Album','Picture');
	var $helpers = array('Gallery.Gallery');
	// Login with email id instant of username in auth controller
	public $components = array(
    'Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('username' => 'email')
            )
        )
    ),'RequestHandler'
	);
	
	// Pagination in Cakephp
	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
	// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','forgot'); 
    }
	
	
	
    
/* ************************************************************************************************************************************/
/* **************************************** Admin Section start ***********************************************************************/
/* ************************************************************************************************************************************/
    // Dashboard Function Start
    public function admin_login() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->redirect('/login');	
 
    }
	// Dashboard Function End
    
    // Dashboard Function Start
    public function admin_index() {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'index'));	
		} 
		$this->layout = 'panel_layout';
		$this->set('title', 'Dashbord');
		// Call Values for the Dashboard from the session
		$user_id=$this->Auth->user('id'); // Login user's user id
		$user_type_id=$this->Auth->user('user_type_id'); // Login user's user type
 
    }
	// Dashboard Function End
    
    
    
    
    // Change Password function START
	public function admin_change_password(){
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'change_password'));	
		}
		$this->layout = 'panel_layout';
        $this->set('title', 'Change Password');
		if ($this->request->is('post')) {
			$new_password=$this->request->data['txtnewPassword'];
			$data['User']['id']=$this->Auth->user('id');
			$data['User']['password']=$new_password;
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The user password has been change'));
				$this->redirect(array('action' => 'change_password'));
			} else {
				$this->Session->setFlash(__('The user password uable to change. Please, try again.'));
			}	
			
		}
	}
	// Change Password function END
    
    

/* ************************************************************************************************************************************/
/* **************************************** Admin Section End *************************************************************************/
/* ************************************************************************************************************************************/
    public function index(){
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==2){	

            //$this->redirect(array('admin' => true , 'action' => 'index'));
            $this->redirect(array('admin'=>true,'controller'=>'Employees','action'=>'list'));	
          }
          if($this->Auth->user('user_type_id')==3){	

            //$this->redirect(array('deo' => true , 'action' => 'index'));	
            $this->redirect(array('deo'=>true,'controller'=>'Employees','action'=>'list'));
          }
		}
    }
// User login function start
	public function login() {
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==2){	
            //$this->redirect(array('admin' => true , 'action' => 'index'));
            $this->redirect(array('admin'=>true,'controller'=>'Employees','action'=>'list'));	
          }
          if($this->Auth->user('user_type_id')==3){	
            //$this->redirect(array('deo' => true , 'action' => 'index'));	
            $this->redirect(array('deo'=>true,'controller'=>'Employees','action'=>'list'));
          }
		}
        
		$this->layout = 'login';
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$data['LogRecord']['device_id']=$this->request->clientIp();
				$data['LogRecord']['user_id']=$this->Auth->user('id');
				$data['LogRecord']['device_type']=$this->detectDevice();
				$data['LogRecord']['start_time']=date("Y-m-d H:i:s");
				
				$this->LogRecord->save($data);
				$last_log_record=$this->LogRecord->getLastInsertId();
				$this->Session->write('LogRecord.id', $last_log_record);           
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                
                $_SESSION['KCEDITOR']['disabled']=false;
                //$this->Session->write('KCEDITOR.disabled', false);
                
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}
	 // User login function end 
    
    //user logout function start
	public function logout() {
		$end_time=date("Y-m-d h:i:sa");
		$logrecordid = $this->Session->read('LogRecord.id');
        $data['LogRecord']['id']=$logrecordid;
		$data['LogRecord']['end_time']=date("Y-m-d H:i:s");
        $data['LogRecord']['log_out']=1;		
		$this->LogRecord->save($data);
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
	//user logout function end
    
    //User forgot password function start
	public function admin_forgot() {
		$this->layout = 'forgot';
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			$emailCount = $this->User->find('first', array(
				'conditions' => array('User.email' =>$this->request->data['User']['email'])
			));
			if(!empty($emailCount)){
				// Update Password Field
				$id=$emailCount['User']['id'];
				$this->User->id=$id;
				$this->User->saveField("password","123456");
				$dbEmail=$emailCount['User']['email'];
				// Email Send
				$this->Email->from = 'no-reply@microfinanceapp.com';
				$this->Email->to = $dbEmail;
				$this->set('heading', 'You Login Password');
				$this->set('content', "Your Updated Password is: 123456");
				$this->Email->subject = 'Forgot Password';
				$this->Email->layout = 'report_msg';
				$this->Email->template = 'text_template';
				$this->Email->additionalParams="-f$dbEmail";
				$this->Email->sendAs = 'html';
				try {
					if ($this->Email->send()) {
						$this->Session->setFlash(__('Password Send to your Email ID'));
						return true;
					} else {
						return false;
					}
				}
				catch (phpmailerException $e) {
					return false;
				}
				catch (exception $e) {
					return false;
				}
			} else {
				$this->Session->setFlash(__('Invalid Email ID'));
			}
		} 
	}
	//User forgot password function end
/* ************************************************************************************************************************************/
/* **************************************** Data entry Section start ***********************************************************************/
/* ************************************************************************************************************************************/
    
    // Dashboard Function Start
    public function deo_index() {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==2)	
            $this->redirect(array('admin' => true , 'action' => 'index'));	
		}  
		$this->layout = 'panel_layout';
		$this->set('title', 'Dashbord');
		// Call Values for the Dashboard from the session
		$user_id=$this->Auth->user('id'); // Login user's user id
		$user_type_id=$this->Auth->user('user_type_id'); // Login user's user type
 
    }
	// Dashboard Function End
    

    // Change Password function START
	public function deo_change_password(){
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==2)	
            $this->redirect(array('admin' => true , 'action' => 'change_password'));	
		}
		$this->layout = 'panel_layout';
        $this->set('title', 'Change Password');
		if ($this->request->is('post')) {
			$new_password=$this->request->data['txtnewPassword'];
			$data['User']['id']=$this->Auth->user('id');
			$data['User']['password']=$new_password;
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The user password has been change'));
				$this->redirect(array('action' => 'change_password'));
			} else {
				$this->Session->setFlash(__('The user password uable to change. Please, try again.'));
			}	
			
		}
	}
	// Change Password function END
    
    

/* ************************************************************************************************************************************/
/* **************************************** Data entry Section End *************************************************************************/
/* ************************************************************************************************************************************/






/* ************************************************************************************************************************************/
/* **************************************** Front Section start ***********************************************************************/
/* ************************************************************************************************************************************/
	 

    
/* ************************************************************************************************************************************/
/* **************************************** Front Section End *************************************************************************/
/* ************************************************************************************************************************************/


}
// End of User controller
?>