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
class SettingsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Settings';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Employee','FormSetting','Form');


// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
    }

/** ************************************************************************************************************************************/
/** **************************************** Admin Section start ***********************************************************************/
/** ************************************************************************************************************************************/
    //user list function start
	public function admin_field_list() {
        
		$this->layout = 'panel_layout';
        $this->set('title', 'Form Field List');
        $field_data = $this->FormSetting->find('all',array('conditions'=>array('FormSetting.status !='=>2)));
        $this->set('field_data',$field_data);
        $form_name = $this->Form->find('list',array('fields'=>array('id','title'),'conditions'=>array('Form.status !='=>2)));
        $this->set('form_name',$form_name);
    }
	//user list function end
    
    // Dashboard Function Start
    public function admin_field_save($pid='') {
          
		$this->layout = 'panel_layout';
		$this->set('title', 'Form Field Manage');
        
        $form_name = $this->Form->find('list',array('fields'=>array('id','title'),'conditions'=>array('Form.status !='=>2)));
        $this->set('form_name',$form_name);
        
        if($pid==''){
            $readonly='';
        }else{
            $readonly='readonly';
        }
        $this->set('readonly',$readonly);
        
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            if(!empty($this->request->data['FormSetting']['values'])){
                $v_arr = explode(',',$this->request->data['FormSetting']['values']);
                $arr = array();
                foreach($v_arr as $v){
                  $arr[$v]=$v;  
                }
                $this->request->data['FormSetting']['field_values'] = json_encode($arr);
            }
            
            if($this->FormSetting->save($this->request->data)){
                $this->Session->setFlash('Form Field saved successfully.');
                $this->redirect(array('admin'=>true,'action'=>'field_list'));
            }
        }
        
        if($pid!=''){
            $field_data = $this->FormSetting->find('first',array('conditions'=>array('FormSetting.id'=>$pid)));
            $this->request->data = $field_data; 
            $this->set('values',$field_data);
        }else{
            $field_data=array();
            $this->set('values',$field_data);
        }
		
    }
	// Dashboard Function End
    
    //Employee delete function start
    public function admin_field_delete($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Field id');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
		}
        $this->FormSetting->id = $id;
        if (!$this->FormSetting->exists()) {
            $this->Session->setFlash('Invalid Field provided');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
        }
        if ($this->FormSetting->saveField('status', 2)) {
            $this->Session->setFlash(__('Field deleted'));
            $this->redirect(array('admin'=>true,'action' => 'field_list'));
        }
        $this->Session->setFlash(__('Field was not deleted'));
        $this->redirect(array('admin'=>true,'action' => 'field_list'));
    }
	//Employee delete function end
    
    //Employee activate function start
    public function admin_field_activate($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Field id');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
		}
        $this->FormSetting->id = $id;
        if (!$this->FormSetting->exists()) {
            $this->Session->setFlash('Invalid Field provided');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
        }
        if ($this->FormSetting->saveField('status', 1)) {
            $this->Session->setFlash(__('Field inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'field_list'));
        }
        $this->Session->setFlash(__('Field was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'field_list'));
    }
	//Employee activate function end
    //Employee deactivate function start
    public function admin_field_deactivate($id = null) {
        
		if (!$id) {
			$this->Session->setFlash('Please provide a Field id');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
		}
        $this->FormSetting->id = $id;
        if (!$this->FormSetting->exists()) {
            $this->Session->setFlash('Invalid Field provided');
			$this->redirect(array('admin'=>true,'action'=>'field_list'));
        }
        if ($this->FormSetting->saveField('status', 0)) {
            $this->Session->setFlash(__('Field inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'field_list'));
        }
        $this->Session->setFlash(__('Field was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'field_list'));
    }
	//Employee deactivate function end
    


/** ************************************************************************************************************************************/
/** **************************************** Admin Section End *************************************************************************/
/** ************************************************************************************************************************************/





/* ************************************************************************************************************************************/
/* **************************************** Front Section start ***********************************************************************/
/* ************************************************************************************************************************************/
	 
     
    
    
    
/* ************************************************************************************************************************************/
/* **************************************** Front Section End *************************************************************************/
/* ************************************************************************************************************************************/



}