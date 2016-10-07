
<script>
function generate_values(val){
    if(val=='select'){
        $('#selectvalues').show();
    }else{
        $('#selectvalues').hide();
    }
}

</script>
   <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Save Form Field
          </h1>
          <ol class="breadcrumb">
           <li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Save Form Field</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
			
			<?php echo $this->Form->create('Setting',array('admin'=>true,'action'=>'field_save')); ?>
						
						<span style="color:red"><?php echo $this->Session->flash(); ?></span>
                <?php echo $this->Form->input('FormSetting.id', array('type' => 'hidden','label'=>false)); ?>
              <div class="box box-danger col-xs-12" style="padding-top:20px; padding-bottom:20px;">
                <div class="box-body col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="BranchName">Form Name</label>
                        <?php echo $this->Form->input('FormSetting.form_id', array('type' => 'select', 'options' => $form_name, 'class'=>'form-control', 'label'=>false,'required'=>'required')); ?>
                        
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <label for="City ">Field Display Name </label>
                      <?php echo $this->Form->input('FormSetting.field_display_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Field display Name','required'=>'required','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <label for="City ">Field Name </label>
                      <?php echo $this->Form->input('FormSetting.field_name', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Field Name','required'=>'required','readonly'=>$readonly,'label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    
                    
                    <div class="form-group">
                      <label for="City ">Field Type </label>
                      <?php $types = array('text'=>'Text','select'=>'Selectbox','email'=>'Email','number'=>'Number','file'=>'File','textarea'=>'Textarea','datepicker'=>'Datepicker','multiselect'=>'Multipleselect'); ?>
                      <?php echo $this->Form->input('FormSetting.field_type', array('type' => 'select','options' => $types,'onChange'=>'generate_values(this.value)','class'=>'form-control','required'=>'required','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->


                </div><!-- /.box-body -->
                <div class="box-body col-md-6 col-sm-12">
                    
                    <div class="form-group">
                      <label for="City ">Field Class </label>
                      <?php echo $this->Form->input('FormSetting.field_class', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Field Class Name','value'=>'form-control','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <label for="City ">Field id </label>
                      <?php echo $this->Form->input('FormSetting.field_id', array('type' => 'text','class'=>'form-control','placeholder'=>'Enter Field Id','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                      <label for="City ">Is Required </label>
                      <?php echo $this->Form->input('FormSetting.is_required', array('type' => 'select','options' => array('required'=>'required'),'class'=>'form-control','label'=>false,'empty'=>'Not required')); ?>
                        
                      
                    </div><!-- /.form group -->
                    <?php 
                            $str='';
                          if(!empty($values['FormSetting']['field_values'])){
                            
                                $arr = json_decode($values['FormSetting']['field_values'],true);
                                
                                foreach($arr as $v){
                                    $str .= $v.',';
                                }
                                $str = rtrim($str,',');
                          } 
                          ?>
                    <div id="selectvalues" style="display: <?=empty($str)?'none':''?>;">
                        <div class="form-group">
                          <label for="City ">Values (Comma(,) Seperated)</label>
                          
                          <?php echo $this->Form->input('FormSetting.values', array('type' => 'textarea','class'=>'form-control','value'=>!empty($str)?$str:'','placeholder'=>'Enter Field Values','label'=>false)); ?>
                         
                          
                        </div><!-- /.form group -->
                    </div>
                    
                    <div class="form-group">
                      <label for="City ">Field Group </label>
                      <?php $groups = 
					  array('general'=>'General Information'
					  ,'phone'=>'Phone Numbers'
					  ,'address'=>'Home Address'
					  ,'education'=>'Education'
					  ,'experience'=>'Teaching Experience'
					  ,'reserch_experience'=>'Research Experience'
					  ,'attachment'=>'Resume Or CV Section'
					  ,'contract_section'=>'Contract Section'
					  ,'discipline_section'=>'Discipline Section'
					  ,'emergency_contact'=>'Emergency Contact'
					  ,'upload_section'=>'Upload Section'); ?>
                      <?php echo $this->Form->input('FormSetting.field_group', array('type' => 'select','options' => $groups,'class'=>'form-control','required'=>'required','label'=>false)); ?>
                        
                      
                    </div><!-- /.form group -->
                    
                </div>
                
                <div class="box-footer col-xs-12" >
                                       
                
                    <button type="submit" class="btn btn-primary btn-lg" >Submit</button>
                </div>
                
              </div><!-- /.box -->
			  
			  <?php echo $this->Form->end(); ?>

            </div>
          </div><!-- /.row -->

        </section><!-- /.content -->