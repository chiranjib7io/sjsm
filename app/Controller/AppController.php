<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 
 // App Controller Start
class AppController extends Controller
{

    //var $uses = array('Setting','Fee','Organization','LoanTransaction','Order');
    var $uses = array('User');
    // added the debug toolkit
    // sessions support
    // authorization for login and logut redirect
    public $components = array(
        //'DebugKit.Toolbar',
        'Session',
        'Email',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'You must be logged in to view this page.',
            'loginError' => 'Invalid Username or Password entered, please try again.'));
			
        public $helpers = array('Form', 'Html', 'Js', 'Time', 'Number','Slt');

    // only allow the login controllers only
    public function beforeFilter()
    {
        $this->Auth->allow('admin_login','deo_login');
        // $branchlistid= $this->Branch->find('all');
        // pr($branchlistid); die;
    }
    public function beforeRender()
    {
        $this->set('userData', $this->Auth->user());
    }

    public function isAuthorized($user)
    {
        // Here is where we should verify the role and give access based on role

        return true;
    }

	// This function is for Detect the device of the user
    function detectDevice()
    {
        $userAgent = $_SERVER["HTTP_USER_AGENT"];
        $devicesTypes = array(
            "computer" => array(
                "msie 10",
                "msie 9",
                "msie 8",
                "windows.*firefox",
                "windows.*chrome",
                "x11.*chrome",
                "x11.*firefox",
                "macintosh.*chrome",
                "macintosh.*firefox",
                "opera"),
            "tablet" => array(
                "tablet",
                "android",
                "ipad",
                "tablet.*firefox"),
            "mobile" => array(
                "mobile ",
                "android.*mobile",
                "iphone",
                "ipod",
                "opera mobi",
                "opera mini"),
            "bot" => array(
                "googlebot",
                "mediapartners-google",
                "adsbot-google",
                "duckduckbot",
                "msnbot",
                "bingbot",
                "ask",
                "facebook",
                "yahoo",
                "addthis"));
        foreach ($devicesTypes as $deviceType => $devices) {
            foreach ($devices as $device) {
                if (preg_match("/" . $device . "/i", $userAgent)) {
                    $deviceName = $deviceType;
                }
            }
        }
        return ucfirst($deviceName);
    }
	
	// Genaral function for making a JSON file
    function prepare_json($response, $remove_null = 1)
    {
        $json = json_encode($response, true);
        if ($remove_null == 1) {
            $json = preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $json);
        }

        /* disconnect with db */
        //App::import('Model', 'ConnectionManager');
        //$ds = ConnectionManager::getDataSource('default');
        //$ds->disconnect();

        return $json;
    }

    

	// General email sending function
    public function _email($email, $message, $subject = 'Message from SJSM.', $name = '', $from = '', $attachment='', $template = 'rext_template',$layout='report_msg')
    {
        //$this->autoRender=false;
        //$ms = $message;
        //$ms = wordwrap($ms, 70);
                
        if ($name == '') {
            $name = $email;
        }

        if ($from == '') {
            $from = 'SJSM <' . ADMIN_EMAIL . '>';
        }
        
        $this->Email->from = $from;
        $this->Email->to = $email;
        $this->set('branch_data', $message);
        $this->Email->subject = $subject;
        $this->Email->layout = $layout;
        $this->Email->template = $template;
		$this->Email->additionalParams="-f$email";
        $this->Email->sendAs = 'html';
        //send mail
        try {

            if ($this->Email->send()) {
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
    }
	// Email Function end


    // Status Name Function START
    function status_name_array()
    {
        $upload_type = array(
            1 => "Active",
            2 => "Not Active",
            3 => "Closed");
        return $upload_type;
    }
    // Status Name Function END



    // Find the date difference function Start
    public function date_differ($date1,$date2){
       
        $diff = abs(strtotime($date2) - strtotime($date1));
        
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $days;
    }
    // Find the date difference function End

}
// App controller END
?>