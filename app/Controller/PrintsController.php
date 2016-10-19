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
App::uses('Folder', 'Utility');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PrintsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Prints';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Employee','FormSetting','Subscriber');


// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter(); 
    }

/* ************************************************************************************************************************************/
/* **************************************** Admin Section start ***********************************************************************/
/* ************************************************************************************************************************************/
   
    
    public function admin_employee_print($id=''){
		if($this->Session->check('Auth.User')){
		  if($this->Auth->user('user_type_id')==3)	
            $this->redirect(array('deo' => true , 'action' => 'save'));	
		}  
		$this->layout = 'ajax';
        $this->set('title', 'Employee Details');
        
		
		
		//$emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$pid)));
		$emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.status'=>1,'Employee.id'=>$id)));
		$this->request->data = json_decode($emp_data['Employee']['form_values'],true); 
		$this->request->data['Employee']['id'] = $emp_data['Employee']['id'];
		$this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];
		$this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];
		
		
		/** For generating the Form field in the view **/
		
		$all_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1)));
        $this->set('all_form_fields', $all_form_fields);
		
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
		
		
	 }


/* ************************************************************************************************************************************/
/* **************************************** Admin Section End *************************************************************************/
/* ************************************************************************************************************************************/




/* ************************************************************************************************************************************/
/* **************************************** Front Section start ***********************************************************************/
/* ************************************************************************************************************************************/
	 
     

    
    
    
/* ************************************************************************************************************************************/
/* **************************************** Front Section End *************************************************************************/
/* ************************************************************************************************************************************/



}