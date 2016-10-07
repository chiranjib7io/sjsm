<script>
      var bootstrapButton = $.fn.button.noConflict() ; // return $.fn.button to previously assigned value
      $.fn.bootstrapBtn = bootstrapButton ;           // give $().bootstrapBtn the Bootstrap functionality
  
      function toggleHideColumnsHead(){
        $('li:#hideColumnsHeads').togggleClass('open');
        
      }
</script>
<?php
//pr($userData);die;
?>
<header class="main-header">
        <a href="<?= $this->Html->url('/login') ?>" class="logo"><?=!empty($userData['UserType']['user_type'])?$userData['UserType']['user_type']:'Guest'?></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		  
          <div class="navbar-custom-menu">
		  <!-- Back button --
                <div class="btn-header transparent" style="">
                </div>
                <!-- End Back button -->
			<ul class="nav navbar-nav">
				
            <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==3)){
          ?>    
                <li class="dropdown user user-menu " onclick="toggleHideColumnsHead()" id="hideColumnsHeads">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <img src="<?php echo $this->webroot; ?>img/avter_pic.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=!empty($userData['first_name'])?$userData['first_name']." ".$userData['last_name']:'Guest'?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">                    
                    <img src="<?php echo $this->webroot; ?>img/avter_pic.jpg" class="img-circle" alt="User Image"/>
                    <p>
                      <?=!empty($userData['first_name'])?$userData['first_name']." ".$userData['last_name']:'Guest'?>
                      <small> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                    
                      <a href="<?= $this->Html->url('/'.$this->params['prefix'].'/users/change_password') ?>" class="btn btn-default btn-flat">Change Password</a>
                    
                    
                    </div>
                    <div class="pull-right">
                      <a href="<?= $this->Html->url('/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
           <?php
           }else{
            ?>
           <li><a href="<?= $this->Html->url('/login') ?>" class="user user-menu">Sign in</a></li>
           <?php 
           }
           ?>     

            </ul>
            
            
          </div>
        </nav>
      </header>
	  <?php //pr($userData); die; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $this->webroot; ?>img/avter_pic.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p><?=!empty($userData['first_name'])?$userData['first_name']." ".$userData['last_name']:'Guest'?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==3)){
          ?>
			<li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'Employees','action' => 'list')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <?php
          }else{
          ?>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Employees','action' => 'lists')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <?php
          }
          ?>  
			<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Employee</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
          <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==3)){
          ?>
				<li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'employees','action' => 'list')); ?>"><i class="fa fa-list-alt"></i> Employee List</a></li>     
                <li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'employees','action' => 'save')); ?>"><i class="fa fa-circle-o"></i> Create Employee</a></li>
           <?php
           }else{
           ?>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'employees','action' => 'lists')); ?>"><i class="fa fa-list-alt"></i> Employee List</a></li> 
           <?php 
           }
           ?>   
              </ul>
            </li> 
          <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==1)){
          ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Form Field Manage</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
           
				<li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'settings','action' => 'field_list')); ?>"><i class="fa fa-list-alt"></i> Field List</a></li>
                <li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'settings','action' => 'field_save')); ?>"><i class="fa fa-circle-o"></i> Create Field</a></li>
              </ul>
            </li> 
             <?php
           }
           ?>
           
           <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==1)){
          ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Email Manage</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
           
				<li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'mailings','action' => 'subscriber_list')); ?>"><i class="fa fa-list-alt"></i> Email List</a></li>
                <li><a href="<?php echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'mailings','action' => 'compose_mail')); ?>"><i class="fa fa-list-alt"></i> Compose Email</a></li>
                
              </ul>
            </li> 
             <?php
           }
           ?>
           
           <?php
          if(!empty($userData['user_type_id']) && ($userData['user_type_id']==2 || $userData['user_type_id']==1)){
          ?>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
           
				<li><a href="#<?php //echo $this->Html->url(array($this->params['prefix'] => true,'controller' => 'settings','action' => 'field_save')); ?>"><i class="fa fa-list-alt"></i> N/A</a></li>
                
              </ul>
            </li> 
             <?php
           }
           ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>