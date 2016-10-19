  
   <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Employee Information
          </h1>
          <ol class="breadcrumb">
           <li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee Information</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
			
			<?php echo $this->Form->create('Employee',array('type' => 'file','admin'=>true,'controller'=>'employees','action'=>'save')); ?>
						
						<span style="color:red"><?php echo $this->Session->flash(); ?></span>
                <?php echo $this->Form->input('Employee.id', array('type' => 'hidden','label'=>false)); ?>
              <div class="box box-danger col-xs-12" style="padding-top:20px; padding-bottom:20px;">
                <div class="box-body col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="BranchName">First Name</label>
                        <?php echo $this->Form->input('Employee.first_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter First Name','required'=>'required','label'=>false)); ?>
                        
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <label for="City ">Last Name </label>
                      <?php echo $this->Form->input('Employee.last_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Last Name','required'=>'required','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    

                    
                    
                    


                </div><!-- /.box-body -->
                <div class="box-body col-md-6 col-sm-12">
                    
                <?php
                    $model_name = 'Employee.';
                    foreach($form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>    
                    
                    
                    
                    
                </div>
                
                <div class="box-footer col-xs-12" >
                    
                    
                
                    <div class="col-sm-12">
        <?php echo $this->Html->link(    "Edit",   array($this->params['prefix']=>true,'action'=>'save', $this->request->data['Employee']['id']),'class="editBtn"' ); ?>
        <?php echo $this->Html->link(    "Delete", array($this->params['prefix']=>true,'action'=>'delete', $this->request->data['Employee']['id']),'class="delBtn"'); ?>
    	<?php echo $this->Html->link(    "Print",   array($this->params['prefix']=>true,'controller'=>'Prints','action'=>'employee_print', $this->request->data['Employee']['id']),'class="editBtn" target="_blank"' ); ?>
	</div>
                </div>
                
              </div><!-- /.box -->
			  
			  <?php echo $this->Form->end(); ?>

            </div>
          </div><!-- /.row -->

        </section><!-- /.content -->