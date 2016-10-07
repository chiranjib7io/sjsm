<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>VSSU :: Forgot Password</title>
			<?php echo $this->element("header_login"); ?>
</head>
<body class="skin-purple" style="background:#222d32;">
    <div class="wrapper">
      
      <header class="main-header">
      	<div class="logo" style="width:100%; text-align:left">
        	<div class="container"><a href="#"><img src="<?php echo $this->webroot; ?>front/img/logo_back.png"></a></div>
         </div>
      </header>
				  <!-- Content Wrapper. Contains page content -->
      <div class="wrapper" style="width:100%; float:left;">
      	<div class="container">
        	<div class="col-md-8 col-sm-10 col-xs-12 col-md-push-2 col-sm-push-1 col-xs-push-0">
                <section class="content-header">
                  <h1 style="color:#fff; text-align:left; margin-top:40px;">Forgot Password</h1>
                </section>
            </div>
            <div class="clearfix"></div>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-8 col-sm-10 col-xs-12 col-md-push-2 col-sm-push-1 col-xs-push-0">
    
                  <div class="box box-danger col-xs-12" style="padding-top:20px; padding-bottom:20px;">
				  
				  <!-- Login Form START -->
					<?php echo $this->Form->create('User',array('class'=>'')); ?>
						
						<span style="color:red"><?php echo $this->Session->flash(); ?></span>
								
						<?php echo $this->fetch('content'); ?>
                    
                    </form>
					<!-- End Login Form -->
					
                    <h5 align="center">
						<?php //echo $this->Html->link( "Don't have any account. Register",   array('action'=>'add') );  ?>
					</h5>
					
					 <h5 align="center">
						<?php echo $this->Html->link( "Already have an account?",   array('admin'=>true,'action'=>'login') );  ?>
					</h5>
                    
                  </div><!-- /.box -->
        
                </div>
            </section><!-- /.content -->
        </div>
        
      </div><!-- /.content-wrapper -->

<!--========= Footer =========-->
<?php echo $this->element("footer_login"); ?>
<!--========= Footer Ends =========-->
		  </body>
		</html>
