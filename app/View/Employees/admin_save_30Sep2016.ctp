<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Save Employee Information
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Save Employee Information</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <?php echo $this->Form->create('Employee',array('type' => 'file','admin'=>true,'controller'=>'employees','action'=>'save')); ?>
			<span style="color:red"><?php echo $this->Session->flash(); ?></span>
            <?php echo $this->Form->input('Employee.id', array('type' => 'hidden','label'=>false)); ?>
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">General</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name<font color="red">*</font></label>
                      <?php echo $this->Form->input('Employee.first_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter First Name','required'=>'required','label'=>false)); ?>
                        
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name<font color="red">*</font></label>
                      <?php echo $this->Form->input('Employee.last_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Last Name','required'=>'required','label'=>false)); ?>
                      
                    </div>
                    
                <?php
                    $model_name = 'Employee.';
                    foreach($general_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                    
                    
                  </div><!-- /.box-body -->

                
              </div><!-- /.box -->

              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Phone Numbers</h3>
                </div>
                <div class="box-body">
                  
                  <?php
                    //$model_name = 'Employee.';
                    foreach($phone_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Address</h3>
                </div>
                <div class="box-body">
                  <?php
                    //$model_name = 'Employee.';
                    foreach($address_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Notes</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <?php
                    //$model_name = 'Employee.';
                    foreach($notes_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Experience</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <?php
                    //$model_name = 'Employee.';
                    foreach($experience_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Emergency Contact Info</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <?php
                    //$model_name = 'Employee.';
                    foreach($emergency_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              
              
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Attachment</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <?php
                    //$model_name = 'Employee.';
                    foreach($attachment_form_fields as $field){
                        if(!empty($this->request->data['Employee'])){
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
                        }else{
                            echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
                        }
                             
                    }
                ?>
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </div><!--/.col (right) -->
            
            <div class="box-footer col-xs-12" >
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>   <!-- /.row -->
        </section><!-- /.content -->