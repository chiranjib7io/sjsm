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
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Country','Sitemenu','Page');

    var $helpers = array('Gallery.Gallery','Slt');

// Tell auth controller which are the functions can use without login
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('display','home','contact','about','jobs','our_partners','photo_gallery','ibc_photo_gallery','donate'); 
    }

/* ************************************************************************************************************************************/
/* **************************************** Admin Section start ***********************************************************************/
/* ************************************************************************************************************************************/
    //user list function start
	public function admin_list() {
		$this->layout = 'panel_layout';
        $this->set('title', 'Page List');
        $pages = $this->Page->find('all',array('conditions'=>array('Page.status !='=>2),'order'=>array('Page.id')));
        
        $this->set('pages',$pages);
        //pr($pages);die;
    }
	//user list function end
    
    // Dashboard Function Start
    public function admin_save($pid='') {
          
		$this->layout = 'panel_layout';
		$this->set('title', 'Page Manage');
        $page_list = $this->Page->find('list', array('fields' => array('id', 'title')));
        array_unshift($page_list, "Parent Page");
		$this->set('page_list', $page_list);
        $this->set('pid', $pid);
        
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            if(!empty($this->request->data['Page']['id'])){
                $this->request->data['Page']['modified_on'] = date("Y-m-d H:i:s");
            }else{
                $this->request->data['Page']['created_on'] = date("Y-m-d H:i:s");
            }
            if($this->Page->save($this->request->data)){
                $this->Session->setFlash('Page saved successfully.');
                $this->redirect(array('admin'=>true,'action'=>'list'));
            }
        }
        
        if($pid!=''){
            $page_data = $this->Page->find('first',array('conditions'=>array('Page.id'=>$pid)));
            $this->request->data = $page_data;  
        }
        
        //$this->set('page_data', $page_data);
		
    }
	// Dashboard Function End
    
    //User delete function start
    public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Please provide a page id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            $this->Session->setFlash('Invalid Page provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Page->saveField('status', 2)) {
            $this->Session->setFlash(__('Page deleted'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Page was not deleted'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//User delete function end
    
    //Page activate function start
    public function admin_activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Please provide a page id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            $this->Session->setFlash('Invalid Page provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Page->saveField('status', 1)) {
            $this->Session->setFlash(__('Page inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Page was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//Page activate function end
    //page deactivate function start
    public function admin_deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Please provide a page id');
			$this->redirect(array('admin'=>true,'action'=>'list'));
		}
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            $this->Session->setFlash('Invalid Page provided');
			$this->redirect(array('admin'=>true,'action'=>'list'));
        }
        if ($this->Page->saveField('status', 0)) {
            $this->Session->setFlash(__('Page inactivate'));
            $this->redirect(array('admin'=>true,'action' => 'list'));
        }
        $this->Session->setFlash(__('Page was not inactivated'));
        $this->redirect(array('admin'=>true,'action' => 'list'));
    }
	//page deactivate function end
    
    //user list function start
	public function news_list() {
		$this->layout = 'panel_layout';
        $this->set('title', 'News List');
        $pages = $this->News->find('all',array('conditions'=>array('Page.status !='=>2),'order'=>array('Page.id')));
        
        $this->set('pages',$pages);
        //pr($pages);die;
    }


/* ************************************************************************************************************************************/
/* **************************************** Admin Section End *************************************************************************/
/* ************************************************************************************************************************************/

/* ************************************************************************************************************************************/
/* **************************************** Front Section start ***********************************************************************/
/* ************************************************************************************************************************************/
	 // For all inner page
     public function display($slug=''){
	   $this->layout = 'front_layout';
       $page_data = $this->Page->findBySlug($slug);
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
       //pr($page_data);die;
	 }
     
     // For all inner page
     public function about($slug='about-us'){
	   $this->layout = 'front_layout';
       
       $page_data = $this->Page->findBySlug($slug);
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
       
	 }
     
     // For Home page only
     public function home(){
	   $this->layout = 'front_layout';
       $page_data = $this->Page->find('first', array('conditions' => array('Page.id'=>1)));
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
       
	 }
     
     // For Contact page only
     public function contact(){
	   $this->layout = 'front_layout';
       $page_data = $this->Page->find('first', array('conditions' => array('Page.id'=>37)));
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
       if ($this->request->is('post')) {
		   //pr($this->request->data); die;
		   if(isset($this->request->data['mail'])){
				$email= $this->request->data['c_email'];
				$name= $this->request->data['name'];
				$phone= $this->request->data['c_mobile'];
				$message= $this->request->data['c_message'];
				$this->_email(ADMIN_EMAIL,"Mobile No.".$phone.$message,"Contact Form",$name,$email);
				$this->_email($email,"Thank you for your interest. We will get back soon.","Thank you",'Admin',ADMIN_EMAIL); 
		   }
		   //$this->redirect('/contact');
	   }
	 }

	// For Donate page only
    public function donate(){
	   $this->layout = 'front_donation_layout';
       $page_data = $this->Page->find('first', array('conditions' => array('Page.id'=>41)));
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
	   if ($this->request->is('post')) {
		   //pr($this->request->data); die;
		   if(isset($this->request->data['mail'])){
				$email= $this->request->data['c_email'];
				$name= $this->request->data['name'];
				$phone= $this->request->data['c_mobile'];
				$message= $this->request->data['c_message'];
				$this->_email(ADMIN_EMAIL,"Mobile No.".$phone.$message,"Donation Contact",$name,$email);
				$this->_email($email,"Thank you for your interest. We will get back soon.","Donation Interest",'Admin',ADMIN_EMAIL); 
		   }
		   //$this->redirect('/donate');
	   }
	}
	// For job page only
     public function jobs() {
       $this->layout = 'front_layout';
       $page_data = $this->Page->find('first', array('conditions' => array('Page.id'=>43)));
       $this->set('title', $page_data['Page']['title']);
       $this->set('page_data', $page_data);
       if($this->request->is('post')){
			$email= $this->request->data['email'];
            $cv= $this->request->data['cv'];
            $query= $this->request->data['query'];
            $name= $this->request->data['name'];
            $phone= $this->request->data['phone'];
            $this->_email(ADMIN_EMAIL,"Mobile No.".$phone.$query,"Query For Job",$name,$email);
            $this->_email($email,"Thank you for your interest. We will get back soon.","Query For Job",'Admin',ADMIN_EMAIL);
       }
    }
	
    public function page(){
        $this->layout='front_layout';
        
    }
     
     // For Photo Gallery page only
     public function photo_gallery(){
	   $this->layout = 'front_layout';
       $this->set('title', 'Photo Gallery');
	 }
     // For Photo Gallery page only
     public function ibc_photo_gallery(){
	   $this->layout = 'front_layout';
       $this->set('title', 'IBC Photo Gallery');
	 }
     // For Photo Gallery page only
     public function our_partners(){
	   $this->layout = 'front_layout';
       $this->set('title', 'Our partners');
	 }
    
    
/* ************************************************************************************************************************************/
/* **************************************** Front Section End *************************************************************************/
/* ************************************************************************************************************************************/


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display_old() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}