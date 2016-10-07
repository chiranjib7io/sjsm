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
class MailingsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Mailings';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Employee','Subscriber');


// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    /**
     * $arr['email','from','subject','template','view_vars']
     * 
     **/
    function __sendEmail($arr)
    {
        //App::uses('CakeEmail', 'Network/Email');
        
        if (empty($arr))
        {
            debug(__METHOD__." failed to retrieve data for Email");
            return false;
        }

        $toemail = $arr['email'];
        $fromemail = $arr['from'];
        $subject = $arr['subject'];
        $template = $arr['template'];
        $var_arr = @json_decode($arr['view_vars'],true);
        

        $message = "Hi ".$var_arr['name'].",<br/>".$var_arr['content'] ;
        $header = "From: employee@mail.sjsm.org\r\n"; 
        $header.= "MIME-Version: 1.0\r\n"; 
        //$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
        $header.= "Content-Type: text/html; charset=iso-8859-1\n";
        $header.= "X-Priority: 1\r\n"; 
        $header.= "X-Sender: Employee < employee@mail.sjsm.org >\n";
        $header.= 'X-Mailer: PHP/' . phpversion();
        $header.= "Return-Path: employee@mail.sjsm.org\n"; // Return path for errors
        
        mail($toemail, $subject, $message, $header, '-femployee@mail.sjsm.org');
        
    }

/** ************************************************************************************************************************************/
/** **************************************** Admin Section start ***********************************************************************/
/** ************************************************************************************************************************************/
    //Email list function start
	public function admin_subscriber_list() {
        
		$this->layout = 'panel_layout';
        $this->set('title', 'Subscriber List');
        $subscriber_data = $this->Subscriber->find('all',array('conditions'=>array('Subscriber.status'=>1)));
        $this->set('subscriber_data',$subscriber_data);
        
        
    }
	//Email list function end
    
    public function send_email() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $subscriber_data = $this->Subscriber->find('all',array('conditions'=>array('Subscriber.status'=>1)));
        
        foreach($subscriber_data as $row){
            $content = 'This is a Test email. Please ignore it from your inbox.';
            $var = array('name'=>$row['Subscriber']['first_name'].' '.$row['Subscriber']['last_name'],'content'=>$content);
            $arr = [
                'email'=>$row['Subscriber']['email'],
                'from'=>'employee@mail.sjsm.org',
                'subject'=>'Please Ignore This Test Email',
                'template'=>'employee_template',
                'view_vars'=>json_encode($var)
                ];
           if(!empty($row['Subscriber']['email'])) {
                $this->__sendEmail($arr);
           }
            
        }
        $this->Session->setFlash('Email is sent to all.');
        $this->redirect(array('admin'=>true,'action'=>'subscriber_list'));
	}
    
    
    public function admin_compose_mail(){
       $this->layout = 'panel_layout';
       $this->set('title', 'Compose Email'); 
       
       
    }
    


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