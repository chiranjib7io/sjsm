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
class APIEmployeesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'APIEmployees';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Employee','FormSetting','Subscriber');


// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('employee_api_control'); 
    }

	
	public function employee_api_control() {		
		$this->layout = '';
		$result = array('error'=>'There is no action available');
		$message = $status = $error = array();		$all_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1)));        $this->set('all_form_fields', $all_form_fields);		
		if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "Save")
		{
			
			$all_form_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1)));
			
			/** For file uploading **/
            $file_fields = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status'=>1,'FormSetting.form_id'=>1,'FormSetting.field_type'=>'file')));			
            foreach($file_fields as $frow)
			{
                $filename = '';
                if(isset($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name']) && is_uploaded_file($this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name']))
				{
                   // Strip path information
					if (isset($this->request->data['Employee']['first_name'])) {
						
					$name = $this->request->data['Employee']['first_name'].@$this->request->data['Employee']['last_name'];
                    $filename = $name ."/". time().'_'.basename($this->request->data['Employee'][$frow['FormSetting']['field_name']]['name']);
					$dir = new Folder( WWW_ROOT . DS . 'upload/employee/'. $name , true, 0755);
                    move_uploaded_file(
                        $this->request->data['Employee'][$frow['FormSetting']['field_name']]['tmp_name'],
                        WWW_ROOT . DS . 'upload/employee/' . DS . $filename
                    );
                    $this->request->data['Employee'][$frow['FormSetting']['field_name']] = $filename;
					
					}
                }
                
            }
            /** For file uploading End **/
			
			$employee_data = array();
			foreach($all_form_fields as $key=>$val){

				$name = $val['FormSetting']['field_name'];
				$required = $val['FormSetting']['is_required'];
				
				if($required == 'required' && empty($this->request->data['Employee'][$name])){
					$error[]	= $name.' field is required';					
				}
				
				if($name == 'id'){					
					if (isset($this->request->data['Employee'][$name])) {
						$save_data['Employee'][$name] = $this->request->data['Employee'][$name];
					}					
					continue;
				}
				
				if($name == 'first_name' || $name == 'last_name'){					
					if (isset($this->request->data['Employee'][$name])) {
						$save_data['Employee'][$name] = $this->request->data['Employee'][$name];
						$subscribe['Subscriber'][$name] = $this->request->data['Employee'][$name];
					}					
					continue;
				}	
				
				if($name == 'email'){					
					if (isset($this->request->data['Employee'][$name])) {
						$subscribe['Subscriber']['email'] = $this->request->data['Employee'][$name];
					}					
				}
				
/* if($name == 'employee_upload_files'){	
	$main = array();
	if (is_array($this->request->data['Employee'][$name])){		
		$count = isset($this->request->data['Employee'][$name]['upload_file_Mandatory']) ? count($this->request->data['Employee'][$name]['upload_file_Mandatory']) : 0;
		for($i=0;$i<$count;$i++){
			if(isset($this->request->data['Employee'][$name]['upload_file_Mandatory'][$i])){
$main[] = array(
	'upload_file_Type' => $this->request->data['Employee'][$name]['upload_file_Type'][$i],
	'upload_file_Path' => $this->request->data['Employee'][$name]['upload_file_Path'][$i],
	'upload_file_Name' => $this->request->data['Employee'][$name]['upload_file_Name'][$i],
	'upload_file_Date' => $this->request->data['Employee'][$name]['upload_file_Date'][$i],
	'upload_file_Mandatory' => $this->request->data['Employee'][$name]['upload_file_Mandatory'][$i],
	'upload_file_Status' => $this->request->data['Employee'][$name]['upload_file_Status'][$i]
);
			}
		}
		$this->request->data['Employee'][$name] = $main;
	}					
} */
				
				if (isset($this->request->data['Employee'][$name])) {
					$employee_row[$name] = $this->request->data['Employee'][$name];
				}else{
					$employee_row[$name] = "";
				}
				
			}

			$employee_data['Employee'] = $employee_row;
			
			$save_data['Employee']['form_values'] = json_encode($employee_data);
			
			
			$emp_data = @$this->Employee->find('first',array('conditions'=>array('Employee.first_name'=>$save_data['Employee']['first_name'])));				
			if(isset($emp_data) && count($emp_data)>0){					
				$error[]	= 'Employee first name already exist';
			}			
			
			$emp_data = @$this->Employee->find('first',array('conditions'=>array('Employee.last_name'=>$save_data['Employee']['last_name'])));			
			if(isset($emp_data) && count($emp_data)>0){
				$error[]	= 'Employee last name already exist';
			}						if(!empty($this->request->data['Employee']['id']))			{				$emp_data1 = @$this->Employee->find('first',array('conditions'=>array('Employee.id'=>$this->request->data['Employee']['id'])));								if(empty($emp_data1))				{					$error[]	= 'Invalid Employee provided';				}				                $save_data['Employee']['id'] = $this->request->data['Employee']['id'];                $save_data['Employee']['modified_on'] = date("Y-m-d H:i:s");            }			else			{                $save_data['Employee']['created_on'] = date("Y-m-d H:i:s");            }
			
			$save_data['Employee']['created_on'] = date("Y-m-d H:i:s");
			if(count($error) == 0){
				if(@$this->Employee->save($save_data)){
					$subscribe['Subscriber']['modified_on'] = date("Y-m-d H:i:s");
					$this->Subscriber->save($subscribe);
				}
			}
			
			if(count($error) == 0){
				$result['status']		= 'success';
				$result['error']		= '0';
			}else{
				$result['status']		= 'failed';
				$result['error']		= $error;
			}			
			
		}
		
		
		if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "View")
		{
			$data = '';
            $id = $this->request->data['Employee']['id'];
			
			$this->Employee->id = $id;
			if (!$this->Employee->exists()){
				$error[]	= 'Invalid Employee provided';
			}
			
			if(count($error) == 0){
				$emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$id))); 
				
				$this->request->data = json_decode($emp_data['Employee']['form_values'],true);
				$this->request->data['Employee']['id'] = $emp_data['Employee']['id'];
				$this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];
				$this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];
				
				$data = $this->request->data;
			}
			
			if(count($error) == 0){
				$result['status']		= 'success';
				$result['data']			= $data;
				$result['error']		= '0';
			}else{
				$result['status']		= 'failed';
				$result['error']		= $error;
			}	
        }
		
		if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "Delete")
		{
			$data = '';
            $id = $this->request->data['Employee']['id'];
			
			$this->Employee->id = $id;
			if (!$this->Employee->exists()){
				$error[]	= 'Invalid Employee provided';
			}
			
			if(count($error) == 0 && $this->Employee->saveField('status', 2)){
				
			}
			
			if(count($error) == 0){
				$result['status']		= 'success';
				$result['error']		= '0';
			}else{
				$result['status']		= 'failed';
				$result['error']		= $error;
			}	
        }
		
		if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "Activate")
		{
			$data = '';
            $id = $this->request->data['Employee']['id'];
			
			$this->Employee->id = $id;
			if (!$this->Employee->exists()){
				$error[]	= 'Invalid Employee provided';
			}
			
			if(count($error) == 0 && $this->Employee->saveField('status', 1)){
				
			}
			
			if(count($error) == 0){
				$result['status']		= 'success';
				$result['error']		= '0';
			}else{
				$result['status']		= 'failed';
				$result['error']		= $error;
			}	
        }
		
		if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "De-Activate")
		{
			$data = '';
            $id = $this->request->data['Employee']['id'];
			
			$this->Employee->id = $id;
			if (!$this->Employee->exists()){
				$error[]	= 'Invalid Employee provided';
			}
			
			if(count($error) == 0 && $this->Employee->saveField('status', 0)){
				
			}
			
			if(count($error) == 0){
				$result['status']		= 'success';
				$result['error']		= '0';
			}else{
				$result['status']		= 'failed';
				$result['error']		= $error;
			}	
        }				if (isset($this->request->data['Employee']['method']) && $this->request->data['Employee']['method'] == "Edit")		{			$data = '';            $id = $this->request->data['Employee']['id'];						$this->Employee->id = $id;			if (!$this->Employee->exists()){				$error[]	= 'Invalid Employee provided';			}						if(count($error) == 0){				$emp_data = $this->Employee->find('first',array('conditions'=>array('Employee.id'=>$id))); 								$this->request->data = json_decode($emp_data['Employee']['form_values'],true);				$this->request->data['Employee']['id'] = $emp_data['Employee']['id'];				$this->request->data['Employee']['first_name'] = $emp_data['Employee']['first_name'];				$this->request->data['Employee']['last_name'] = $emp_data['Employee']['last_name'];								$data = $this->request->data;			}						if(count($error) == 0){				$result['status']		= 'success';				$result['data']			= $data;				$result['error']		= '0';			}else{				$result['status']		= 'failed';				$result['error']		= $error;			}	        }
		echo json_encode($result, true);
		
	}


}