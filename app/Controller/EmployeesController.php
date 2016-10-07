<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class EmployeesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Employees';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Employee','FormSetting','Subscriber');


// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('lists','view'); 
    }

/* ************************************************************************************************************************************/
/* **************************************** Admin Section start ***********************************************************************/
/* ************************************************************************************************************************************/
    //user list function start
	public function admin_list() {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'list'));	
		}
		$this->layout = 'panel_layout';
        $this->set('title', 'Employee List');
        $emp_data = $this->Employee->find('all',array('conditions'=>array('Employee.status !='=>2),'order'=>array('Employee.id')));
        $this->set('emp_data',$emp_data);
    }
	//user list function end
    public function admin_save_file_upload() {
		$this->layout = 'empty';
	}
	public function admin_tempsave() {
         if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'save'));	
		}  
		$this->layout = 'panel_layout';
		$this->set('title', 'Employee Manage');
        
        /** For generating the Form field in the view **/
        $general_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'general','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('general_form_fields', $general_form_fields);
        
        $phone_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'phone','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('phone_form_fields', $phone_form_fields);
        
        $address_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'address','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('address_form_fields', $address_form_fields);
        
        $experience_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'experience','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('experience_form_fields', $experience_form_fields);
        
        $emergency_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'emergency_contact','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('emergency_form_fields', $emergency_form_fields);
        
		$emergency_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'emergency_contact','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('emergency_form_fields', $emergency_form_fields);
		
        $notes_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'notes','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('notes_form_fields', $notes_form_fields);
        
        $attachment_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'attachment','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('attachment_form_fields', $attachment_form_fields);
        
		$education_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'education','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('education_form_fields', $education_form_fields);
		
		$reserch_experience_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'reserch_experience','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('reserch_experience_form_fields', $reserch_experience_form_fields);
		
		
		$contract_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'contract_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('contract_section_form_fields', $contract_section_form_fields);
		
		
		
		$discipline_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'discipline_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('discipline_section_form_fields', $discipline_section_form_fields);
		
		$emergency_contact_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'emergency_contact','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('emergency_contact_form_fields', $emergency_contact_form_fields);
		
		$upload_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'upload_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('upload_section_form_fields', $upload_section_form_fields);
		

        if (!empty($this->request->data['Employee']['first_name'])) {
            /** For Save the Form data during Add and Edit **/
            //pr($this->request->data);die;
            
            if(!empty($this->request->data['Employee']['id'])){
                $save_data['Employee']['id'] = $this->request->data['Employee']['id'];
                $save_data['Employee']['modified_on'] = date("Y-m-d H:i:s");
                
                $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$this->request->data['Employee']['id'])));
                $edata = json_decode($emp_data['Employee']['form_values'],true);
            }else{
                $save_data['Employee']['created_on'] = date("Y-m-d H:i:s");
            }
            $save_data['Employee']['first_name'] = $this->request->data['Employee']['first_name'];
            $save_data['Employee']['last_name'] = $this->request->data['Employee']['last_name'];
            unset($this->request->data['Employee']['first_name']);
            unset($this->request->data['Employee']['last_name']);
            unset($this->request->data['Employee']['id']);
            
            /** For file uploading **/
            $file_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1,'FormSetting.field_type'=>'file')));
            foreach($file_fields as $frow){
                $filename = '';
                if (!empty($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                    && is_uploaded_file($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                ) {
                    // Strip path information
                    $filename = time().'_'.basename($this->request->data['Employee'][$frow['FormSetting']['field_name']]['name']); 
                    move_uploaded_file(
                        $this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'],
                        WWW_ROOT . DS . 'upload/employee' . DS . $filename
                    );
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = $filename;
                }else{
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = !empty($edata['Employee'][$frow['FormSetting']['field_name']])?$edata['Employee'][$frow['FormSetting']['field_name']]:'';
                }
                
            }
            /** For file uploading End **/
            $save_data['Employee']['form_values'] = json_encode($this->request->data);
            if($this->Employee->save($save_data)){
                $subscribe['Subscriber']['email'] = $this->request->data['Employee']['email'];
                $subscribe['Subscriber']['first_name'] = $save_data['Employee']['first_name'];
                $subscribe['Subscriber']['last_name'] = $save_data['Employee']['last_name'];
                $subscribe['Subscriber']['modified_on'] = date("Y-m-d H:i:s");
                $this->Subscriber->save($subscribe);
                $this->Session->setFlash('Employee saved successfully.');
                $this->redirect(array('admin'=>true,'action'=>'list'));
            }
        }
        
        if(isset($pid) and $pid!=''){
            /** For generating the Form prefilled during update **/
            $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$pid)));
            $this->request->data = json_decode($emp_data['Employee']['form_values'],true); 
            $this->request->data['Employee']['id'] = $emp_data['Employee']['id'];
            $this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];
            $this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];
            //pr($this->request->data);die;
        }
		
    
	}
	
    // Dashboard Function Start
    public function admin_save($pid='') {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'save'));	
		}  
		$this->layout = 'panel_layout';
		$this->set('title', 'Employee Manage');
        
        /** For generating the Form field in the view **/
        $general_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'general','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('general_form_fields', $general_form_fields);
        
        $phone_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'phone','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('phone_form_fields', $phone_form_fields);
        
        $address_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'address','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('address_form_fields', $address_form_fields);
        
        $experience_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'experience','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('experience_form_fields', $experience_form_fields);
        
        $emergency_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'emergency_contact','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('emergency_form_fields', $emergency_form_fields);
        
        $notes_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'notes','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('notes_form_fields', $notes_form_fields);
        
        $attachment_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'attachment','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('attachment_form_fields', $attachment_form_fields);
        
		$education_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'education','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('education_form_fields', $education_form_fields);
		
		$reserch_experience_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'reserch_experience','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('reserch_experience_form_fields', $reserch_experience_form_fields);
		
		
		$contract_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'contract_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('contract_section_form_fields', $contract_section_form_fields);
		
		
		
		$discipline_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'discipline_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('discipline_section_form_fields', $discipline_section_form_fields);
		
		$emergency_contact_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'emergency_contact','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('emergency_contact_form_fields', $emergency_contact_form_fields);
		
		$upload_section_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.field_group'=>'upload_section','FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('upload_section_form_fields', $upload_section_form_fields);
		

        if (!empty($this->request->data['Employee']['first_name'])) {
            /** For Save the Form data during Add and Edit **/
            //pr($this->request->data);die;
            
            if(!empty($this->request->data['Employee']['id'])){
                $save_data['Employee']['id'] = $this->request->data['Employee']['id'];
                $save_data['Employee']['modified_on'] = date("Y-m-d H:i:s");
                
                $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$this->request->data['Employee']['id'])));
                $edata = json_decode($emp_data['Employee']['form_values'],true);
            }else{
                $save_data['Employee']['created_on'] = date("Y-m-d H:i:s");
            }
            $save_data['Employee']['first_name'] = $this->request->data['Employee']['first_name'];
            $save_data['Employee']['last_name'] = $this->request->data['Employee']['last_name'];
            unset($this->request->data['Employee']['first_name']);
            unset($this->request->data['Employee']['last_name']);
            unset($this->request->data['Employee']['id']);
            
            /** For file uploading **/
            $file_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1,'FormSetting.field_type'=>'file')));
            foreach($file_fields as $frow){
                $filename = '';
                if (!empty($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                    && is_uploaded_file($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                ) {
                    // Strip path information
                    $filename = time().'_'.basename($this->request->data['Employee'][$frow['FormSetting']['field_name']]['name']); 
                    move_uploaded_file(
                        $this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'],
                        WWW_ROOT . DS . 'upload/employee' . DS . $filename
                    );
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = $filename;
                }else{
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = !empty($edata['Employee'][$frow['FormSetting']['field_name']])?$edata['Employee'][$frow['FormSetting']['field_name']]:'';
                }
                
            }
            /** For file uploading End **/
            $save_data['Employee']['form_values'] = json_encode($this->request->data);
            if($this->Employee->save($save_data)){
                $subscribe['Subscriber']['email'] = $this->request->data['Employee']['email'];
                $subscribe['Subscriber']['first_name'] = $save_data['Employee']['first_name'];
                $subscribe['Subscriber']['last_name'] = $save_data['Employee']['last_name'];
                $subscribe['Subscriber']['modified_on'] = date("Y-m-d H:i:s");
                $this->Subscriber->save($subscribe);
                $this->Session->setFlash('Employee saved successfully.');
                $this->redirect(array('admin'=>true,'action'=>'list'));
            }
        }
        
        if($pid!=''){
            /** For generating the Form prefilled during update **/
            $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$pid)));
            $this->request->data = json_decode($emp_data['Employee']['form_values'],true); 
            $this->request->data['Employee']['id'] = $emp_data['Employee']['id'];
            $this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];
            $this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];
            //pr($this->request->data);die;
        }
		
    }
	// Dashboard Function End
    
    //Employee delete function start
    public function admin_delete($id = null) {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'list'));	
		}
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 2)) {
            $this->Session->setFlash(__('Employee deleted'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not deleted'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//Employee delete function end
    
    //Employee activate function start
    public function admin_activate($id = null) {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'list'));	
		}
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 1)) {
            $this->Session->setFlash(__('Employee inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//Employee activate function end
    //Employee deactivate function start
    public function admin_deactivate($id = null) {
        if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'list'));	
		}
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 0)) {
            $this->Session->setFlash(__('Employee inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//Employee deactivate function end
    
    public function admin_view($id=''){
        $this->layout = 'panel_layout';
        $this->set('title', 'Employee Details');
        $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.status'=>1,'Employee.id'=>$id)));
        $emp_values = $emp_data['Employee']['form_values'];
        $this->set('emp_data',$emp_data);
        $this->set('emp_values',$emp_values);
	 }


/* ************************************************************************************************************************************/
/* **************************************** Admin Section End *************************************************************************/
/* ************************************************************************************************************************************/


/* ************************************************************************************************************************************/
/* **************************************** Data Entry Section start ***********************************************************************/
/* ************************************************************************************************************************************/
    //user list function start
	public function deo_list() {
        
		$this->layout = 'panel_layout';
        $this->set('title', 'Employee List');
        $emp_data = $this->Employee->find('all',array('conditions'=>array('Employee.status !='=>2),'order'=>array('Employee.id')));
        $this->set('emp_data',$emp_data);
    }
	//user list function end
    
    // Dashboard Function Start
    public function deo_save($pid='') {
         
		$this->layout = 'panel_layout';
		$this->set('title', 'Employee Manage');
        
        /** For generating the Form field in the view **/
        $form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('form_fields', $form_fields);
        

        if (!empty($this->request->data['Employee']['first_name'])) {
            /** For Save the Form data during Add and Edit **/
            //pr($this->request->data);die;
            
            if(!empty($this->request->data['Employee']['id'])){
                $save_data['Employee']['id'] = $this->request->data['Employee']['id'];
                $save_data['Employee']['modified_on'] = date("Y-m-d H:i:s");
                
                $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$this->request->data['Employee']['id'])));
                $edata = json_decode($emp_data['Employee']['form_values'],true);
            }else{
                $save_data['Employee']['created_on'] = date("Y-m-d H:i:s");
            }
            $save_data['Employee']['first_name'] = $this->request->data['Employee']['first_name'];
            $save_data['Employee']['last_name'] = $this->request->data['Employee']['last_name'];
            unset($this->request->data['Employee']['first_name']);
            unset($this->request->data['Employee']['last_name']);
            unset($this->request->data['Employee']['id']);
            
            /** For file uploading **/
            $file_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1,'FormSetting.field_type'=>'file')));
            foreach($file_fields as $frow){
                $filename = '';
                if (!empty($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                    && is_uploaded_file($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'])
                ) {
                    // Strip path information
                    $filename = time().'_'.basename($this->request->data['Employee'][$frow['FormSetting']['field_name']]['name']); 
                    move_uploaded_file(
                        $this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'],
                        WWW_ROOT . DS . 'upload/employee' . DS . $filename
                    );
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = $filename;
                }else{
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = !empty($edata['Employee'][$frow['FormSetting']['field_name']])?$edata['Employee'][$frow['FormSetting']['field_name']]:'';
                }
                
            }
            /** For file uploading End **/
            $save_data['Employee']['form_values'] = json_encode($this->request->data);
            if($this->Employee->save($save_data)){
                $this->Session->setFlash('Employee saved successfully.');
                $this->redirect(array('deo'=>true,'action'=>'list'));
            }
        }
        
        if($pid!=''){
            /** For generating the Form prefilled during update **/
            $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$pid)));
            $this->request->data = json_decode($emp_data['Employee']['form_values'],true); 
            $this->request->data['Employee']['id'] = $emp_data['Employee']['id'];
            $this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];
            $this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];
            //pr($this->request->data);die;
        }
		
    }
	// Dashboard Function End
    
    //Employee delete function start
    public function deo_delete($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('deo'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('deo'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 2)) {
            $this->Session->setFlash(__('Employee deleted'));
            $this->redirect(array('deo'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not deleted'));
        $this->redirect(array('deo'=>true,'action' => 'list'));
    }
	//Employee delete function end
    
    //Employee activate function start
    public function deo_activate($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('deo'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('deo'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 1)) {
            $this->Session->setFlash(__('Employee inactivate'));
            $this->redirect(array('deo'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not inactivated'));
        $this->redirect(array('deo'=>true,'action' => 'list'));
    }
	//Employee activate function end
    //Employee deactivate function start
    public function deo_deactivate($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Employee id');
			$this->redirect(array('deo'=>true,'action'=>'list'));
		}
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            $this->Session->setFlash('Invalid Employee provided');
			$this->redirect(array('deo'=>true,'action'=>'list'));
        }
        if ($this->Employee->saveField('status', 0)) {
            $this->Session->setFlash(__('Employee inactivate'));
            $this->redirect(array('deo'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Employee was not inactivated'));
        $this->redirect(array('deo'=>true,'action' => 'list'));
    }
	//Employee deactivate function end
    


/* ************************************************************************************************************************************/
/* **************************************** Data Entry Section End *************************************************************************/
/* ************************************************************************************************************************************/



/* ************************************************************************************************************************************/
/* **************************************** Front Section start ***********************************************************************/
/* ************************************************************************************************************************************/
	 
     

     public function lists(){
        $this->layout = 'panel_layout';
        $this->set('title', 'Employee List');
        $emp_data = $this->Employee->find('all',array('conditions'=>array('Employee.status !='=>2),'order'=>array('Employee.id')));
        $this->set('emp_data',$emp_data);
       
	 }
     public function view($id=''){
        $this->layout = 'panel_layout';
        $this->set('title', 'Employee Details');
        $emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.status'=>1,'Employee.id'=>$id)));
        $emp_values = $emp_data['Employee']['form_values'];
        $this->set('emp_data',$emp_data);
        $this->set('emp_values',$emp_values);
	 }
     
    
    
    
/* ************************************************************************************************************************************/
/* **************************************** Front Section End *************************************************************************/
/* ************************************************************************************************************************************/



}