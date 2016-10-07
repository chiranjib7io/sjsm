<?php
App::uses('AuthComponent', 'Controller/Component');

class Employee extends AppModel {
	public $useTable = 'employees';
    
   public $virtualFields = array(
        'fullname' => 'CONCAT(Employee.first_name, " ", Employee.last_name)'
    ); 
    

  public $belongsTo = array(
    'User'=>array(
       'className'=>'User',
       'foreignKey'=>'user_id',
       'conditions'=>array('User.status'=>1)
    )
  );
    


}

?>