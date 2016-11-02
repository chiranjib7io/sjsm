<!--<script src="<?php //echo $this->webroot; ?>js/jquery.form.js"></script>-->
<script src="<?php echo $this->webroot; ?>js/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
   
<script>
var isChanged = false;
$(document).ready(function() {
        
        
        $('#EmployeeSaveForm input').on( 'input', function() {
          //This would be called if any of the input element has got a change inside the form
          isChanged = true;
          
        }); 
        
        $('#EmployeeSaveForm textarea').on( 'input', function() {
          //This would be called if any of the input element has got a change inside the form
          isChanged = true;
          
        });
        $('#EmployeeSaveForm select').on( 'input', function() {
          //This would be called if any of the input element has got a change inside the form
          isChanged = true;
          
        }); 
   
        var content_area = document.getElementById("maincontainer");
        document.body.addEventListener("click", function(e) {
            
            if(isChanged==true){
                
                var target = e.target || e.srcElement;
                //console.log(e.path[0].className);
                
                  if (target !== content_area && !isChildOf(target, content_area) && e.path[0].className!== 'ui-icon ui-icon-circle-triangle-w' && e.path[0].className!== 'ui-icon ui-icon-circle-triangle-e' && e.path[0].className!== 'ui-datepicker-title' && e.path[0].className!== 'ui-datepicker-month' && e.path[0].className!== 'ui-datepicker-year' && e.path[0].className!== 'ui-datepicker-next ui-corner-all ui-state-hover ui-datepicker-next-hover' && e.path[0].className!== 'ui-datepicker-prev ui-corner-all ui-state-hover ui-datepicker-prev-hover' && e.path[0].className!== 'ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all' && e.path[0].className!== 'ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all') {
                    if(confirm("You have not save the information. Do you want to save now?"))
                    {
                        $( "#EmployeeSaveForm" ).submit();
                    }else{
                        alert("Ok. Let's go ahead..");
                    }
                    
                    
                  }
            }
          
        }, false);
        
        function isChildOf(child, parent) {
          if (child.parentNode === parent) {
            return true;
          } else if (child.parentNode === null) {
            return false;
          } else {
            return isChildOf(child.parentNode, parent);
          }
        }
    
});

</script>
 
<style type="text/css" >

.popContainer{background-color:#fafafa; margin:0 auto; padding:40px;}
.container h2{background-color:#ea4531; font-size:16px; color:#fff; text-align:center; padding:10px 0; font-family:Helvetica, Arial, sans-serif; text-transform:uppercase; margin:0;}
.popContainer h3{float:left; margin-top:6px; font-size:17px;}
.greyBg{ border-radius:8px; padding: 15px 5px; font-weight: bold !important;  float: left;  color: #000 !important;
    font-size: 17px;
    margin-top: 6px; width: 66%;}
.greyBg p{background:url(<?php echo $this->webroot; ?>IMAGES/uploadIcon.jpg) no-repeat 0 50%; padding:15px 0 15px 36px; font-family:Helvetica, Arial, sans-serif; font-size:16px; text-decoration:none;}
.greyBg p a {color:#000; text-decoration:none;}
.stepBg{width:50%; margin:40px auto; padding:50px 0;}
.stepBtn{ background-color:#313131; padding:5px 0; text-align:center; color:#fff; font-size:16px; border-radius:4px; padding:10px 40px; text-align:center;text-decoration:none;}
.stxt{text-align:right; color:#c82612; font-size:17px; position: absolute;
    right: 29px; bottom: 3px;}

input[type=checkbox] { display:none;}
input[type=checkbox] + label { background:url(<?php echo $this->webroot; ?>IMAGES/notick.jpg) no-repeat 0 0;  height: 19px;  width: 20px;  display:inline-block;  padding: 0 0 0 0px; margin-right:15px;}
input[type=checkbox]:checked + label {  height: 19px;  width:20px; display:inline-block;  padding: 0 0 0 0px;}
.otherTxt{width:60%; border-radius:4px; border:1px solid #ccc; height:30px; margin-bottom:20px;}
.upBg{  padding:10px; width:50%; margin:0 auto; }
 
.upBtn{ text-align:center; color:#fff; font-size:16px; background:#3a3939 url(<?php echo $this->webroot; ?>IMAGES/upBtn.jpg) no-repeat 3% 50%; border-radius:6px; text-align:center; text-decoration:none; padding:15px 0 15px 80px;}
#step1 > input {
    margin-top: 10px;
}
/*#submit_step1
{
    margin: -78px 17% 0 !important;background-color: #313131 !important;
    border-radius: 4px !important;
    color: #fff !important;
    font-size: 19px !important;
    padding: 5px 40px 15px !important;
    text-align: center !important;
    text-decoration: none; !important
}*/
.barContainer {padding:40px 5px;}

.image-upload > input{ display: none;}
.image-upload img{  width: 31px;  cursor: pointer; margin:8px 10px 0 0;}

.white_content.popbx{padding:0px !important;  background-color: #fafafa !important; border:0 !important;}
.white_content.popbx h5{background:#ea4531 !important; font-size:22px !important; float:left;width:100% !important;text-align:center !important; padding: 10px 0;
    text-align: center !important;
    text-transform: uppercase;
    width: 100% !important; color:#fff !important;}
	#close_popup {
    position: absolute;
    right: 19px;
    text-align: center;
    top: 46px;
}
#myfile{ float: left !important; width: 69% !important;margin-top:10px !important;}
.content_cnt .inner_form label{max-width: inherit !important;}
.uplodbx{ background-color: #f0f0f0 !important;
    border-radius: 8px !important;
margin:0px !important;
    padding: 0 10px 8px !important; }
</style> 
 
 
<div class="saveinfo_cnt">
<section class="content-header">
<h1>Employee list <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Employee list</li>
</ol>
</section>

<section class="content" id="maincontainer"><!-- content -->
<?php echo $this->Form->create('Employee',array('type' => 'file','admin'=>true,'controller'=>'employees','action'=>'save')); ?>
<div class="outer_content"><!--outer_content-->
	<span style="color:red"><?php echo $this->Session->flash(); ?></span>
    <?php echo $this->Form->input('Employee.id', array('type' => 'hidden','label'=>false)); ?>
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>General Information :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>1</span></h1>
			<?php
				$model_name = 'Employee.';										
				
				foreach($general_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Phone Numbers :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>2</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($phone_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Home Address :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>3</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($address_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	 
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Education :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>4</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($education_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
		</div>
	</div><!-- End-content_cnt -->
	
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Teaching Experience :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>5</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($experience_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Research Experience :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>6</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($reserch_experience_form_fields as $field){
				?>
					<div class="col-sm-12">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	
	
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>Upload Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>7</span></h1>
				<?php
				//$model_name = 'Employee.';
				//foreach($upload_section_form_fields as $field){
					
					
				/* ?>
					<div class="col-sm-12">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
					</div>
					<?php */
						 
				//}
			?> 

			<div class="col-sm-12">
				<table id="table_upload_data" style="width: 100%;" cellspacing="10" CELLPADDING=1>
					<tr>
						<th width="100px">Type</th>
						<th width="100px">File Name </th>
						<th width="100px">Upload Date</th>
						<th width="100px">Mandatory</th>
						<th width="100px">Status</th>
					</tr>				
					
					<?php
				
					if(!empty($this->request->data['Employee']['employee_upload_files'])){

						
						foreach($this->request->data['Employee']['employee_upload_files'] as $key=>$val){
							
	$inp = '';
	$inp .= '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Type][]" value="'.@$val['upload_file_Type'].'">';		
	$inp .= '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Path][]" value="'.@$val['upload_file_Path'].'">';		
	$inp .= '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Name][]" value="'.@$val['upload_file_Name'].'">';		
	$inp .= '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Date][]" value="'.@$val['upload_file_Date'].'">';		
	$inp .= '<input type="checkbox" name="data[Employee][employee_upload_files][upload_file_Mandatory][]" '.@$val['upload_file_Mandatory'].' value="checked" id="'.$key.'"><label for="'.$key.'"></label>';		
	$inp .= '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Status][]" value="'.@$val['upload_file_Status'].'">';
		
								//$this->webroot.'upload/employee/'.$first_name.'/'.
								//$first_name = $this->request->data['Employee']['first_name'];
								$dataPrint = '<tr>
									<td>'.@$val['upload_file_Type'].'</td>
									<td>
										<a target="_blank" href="'.@$val['upload_file_Path'].'">
											'.@$val['upload_file_Name'].'
										</a>
									</td>
									<td>'.@$val['upload_file_Date'].'</td>
									<td>'.$inp.'</td>
									<td>'.@$val['upload_file_Status'].'</td>
								</tr>';	
								echo $dataPrint;
						}
					}
					
					?>					
					
				</table>
				<div class="button_box">
				     <input type="button" onclick="openpopup();" class="delBtn" style="width: auto !important;" value="Add file" /> 
					 
					    <div id="light" class="white_content popbx"> 
						    <div style="position:relative"><h5 id="headingID">Choose file</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript: closepopup();"><span aria-hidden="true">×</span></button>
								<div class="content">
								<div class="popContainerBx">
								        <div id="images_preview"></div>
									    <div id="step1" class="popContainer">
											<label class="lbleBx">
											<label class="greyBg image-upload">Upload File</label>
											<div class="greyBg">
                                                <div class="image-upload">
                                                    <label for="file-input" class="uplodbx">
                                                        <img src="<?php echo $this->webroot; ?>IMAGES/uploadIcon.jpg"/> Click to Select File
                                                    </label>
                                                    <input id="file-input" name="myfile[]" type="file"/>
                                                </div>
                                              
                                            </div>
					                       </label>
											
									
											
											<br/>
											<div class="upBg"><input type="button" name="submit_file" id="submit_step1" class="stepBtn" value="Click to Go Next Step">
											</div>
											<p class="stxt">Step 1 of 2</p>
										</div>
										<div id="step2" style="display: none;"> 
											<div class="popContainer">
											<?php
											$model_name = 'Employee.';
											foreach($upload_section_form_fields as $field=>$val2){
												//echo "<pre>";
												//print_r($val2);echo "</pre>";
												
												$result = json_decode($val2['FormSetting']['field_values']);
												
												foreach($result as $key=>$val){
												
													//echo '<label class="contentlabel">'.$val.'</label><input type="checkbox" id="myfile_type" name="myfile_type[]" value="'.$val.'" class="myfile_type_class"><br>';
													
                                                    echo '<input name="myfile_type[]" value="'.$val.'" id="'.$val.'" class="myfile_type" name="myfile_type[]" type="checkbox">
                                                      <label for="'.$val.'"></label>'.$val.'<br><br>';
                                                      
													/*echo '<input name="thing" value="'.$val.'" id="myfile_type" name="myfile_type[]" type="checkbox">
                                                      <label for="one"></label>'.$val.'<br><br>';*/
												}
												
											}
											?> 
			                                 <input type="text" id="other_myfile_type" class="otherTxt" name="other_myfile_type" style="display: none;" /> 
											</div>
											
											<br>
											<label>&nbsp;</label><span id="print_file_name"></span><br>
											
   <div class="upBg"><input type="button" name="submit_file" id="submit_step2" value="Upload Now" class="upBtn">
   </div>
   <br class="clear">
   <p class="stxt pop2">Step 2 of 2</p>
										</div>
										<div id="step3" class="barContainer" style="display: none;"> 
											<img src="<?php echo $this->webroot; ?>IMAGES/loading.gif">
										</div>
										<div id="loaderImg"></div>
										
								</div> 
								</div> 
								<br/>
								<!-- <a id="close_popup" href="javascript: void(0);" onclick="javascript: closepopup();" style="display: block;"><img src="<?php //echo $this->webroot; ?>IMAGES/Cancel.png"></a>  class="closebtn" -->
						    </div>
						</div>
						<div id="fade" class="black_overlay"></div>
				</div>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
	<!-- <div class="content_cnt first_page"> content_cnt -->
	<!-- <h2>Resume Or CV Section :-</h2>
		<div class="row inner_form"> inner_form -->
		<!-- <h1 class="list_no"><span>7</span></h1>
			<?php
				//$model_name = 'Employee.';
				//foreach($attachment_form_fields as $field){
				?>
					<div class="col-sm-12">
						
						<div class="input_box">
					<?php
					/* if(!empty($this->request->data['Employee'])){
						print_r($this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']));  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					} */
					?>
						</div>
						
					</div>
					<?php
						 
				//}
			?>
			</div>
	</div> -->
	<!-- End-content_cnt -->
	
	<div class="content_cnt second_page"><!-- content_cnt -->
	<h2>Contract Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>8</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($contract_section_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
			</div>
	</div><!-- End-content_cnt -->
	
		<div class="content_cnt second_page"><!-- content_cnt -->
		<h2>Discipline Section :-</h2>
		<div class="row inner_form Discipline_section"><!-- Discipline_section -->
		<h1 class="list_no"><span>9</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($discipline_section_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
		</div><!-- End-Discipline_section -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt second_page"><!-- content_cnt -->
	<h2>Emergency Contact :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>10</span></h1>
		<?php
				$model_name = 'Employee.';
				foreach($emergency_contact_form_fields as $field){
				?>
					<div class="col-sm-6">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
	
	<div class="content_cnt"><!-- content_cnt -->
		<div class="row"><!-- inner_form -->
			<div class="col-sm-6 submit_box">
				<?php if(!empty($this->request->data['Employee']['id'])){ ?>
					<input type="submit" class="saveBtn" name="data[Employee][Save_Employee]" value="Save">
				<?php }else{ ?>
					<input type="submit" class="saveBtn" name="data[Employee][Save_Employee]" value="Save">
				<?php } ?>
			</div>
			<div class="col-sm-6 submit_box">
				<a href="javascript:;" class="firstpage_link delBtn" id="firstpage_link" >&lt;&lt;Prev </a>
				<a href="javascript:;" class="secondpage_link delBtn" id="secondpage_link" >Next&gt;&gt; </a>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
</div><!-- End-outer_content-->
</form>	
</section><!-- End-content -->
</div>
<style>
#print_file_name {margin-top0!important;}
.contentlabel{float:left;}
#myfile_type{float:left;}
.contentlabel {
    float: left !important;
    width: 37% !important;
	margin-top: 10px;
}
#myfile_type {
    float: left !important;
    width: 60% !important;
	outline: medium none !important;
}
.popContainer {
  
    width: 100% !important;
}
/* #submit_step2{
 background-color: #313131 !important;
    border-radius: 4px !important;
    color: #fff !important;
    font-size: 18px !important;
    padding: 5px 40px !important; 
    text-align: center !important;
    text-decoration: none;
	position: relative;
	 top: -18px;

} */
.stxt.pop2{bottom: -8px !important;}
.black_overlay 
{
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}  
.white_content 
{
	-moz-border-bottom-colors: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	background-color: white;
	border-color: #1f2838 -moz-use-text-color #1f2838 #1f2838;
	border-image: none;
	border-radius: 2px;
	border-style: solid none solid solid;
	display: none;
	min-height: 110px;
	margin: 0 auto;
	padding: 16px;
	position: fixed;
	top: 25%;
	width: 51%;
	z-index: 1002;
} 
.lbleBx{width:100% !important;float:left !important; max-width: 100% !important;}
#light h5 
{
	font-size: 16px;
	font-weight: 600;
	margin: 0 0 10px;
} 
#frmfogotpwd2 > input 
{
	float: left;
	height: 33px;
} 
.yes-delete, .yes-deletelogo 
{
	background: linear-gradient(to bottom, #9368a7 0%, #3f2b49 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
	border-radius: 3px;
	clear: both;
	color: #fff;
	display: block;
	float: left;
	margin: 0 auto;
	max-width: 100px;
	padding: 0;
	width: 100%;
} 
.yes-delete .inner, .yes-deletelogo .inner 
{
	background-color: #8c61a8;
	border-radius: 3px;
	color: #fff;
	display: table;
	font-size: 14px;
	line-height: 100%;
	margin: 1px;
	max-width: 60%;
	padding: 6px 20px;
	text-align: center;
	text-transform: uppercase;
	width: 100%;
}
.closebtn 
{
	right: -27px;
	text-indent: -99999px;
	top: -25px; 
} 
#show_msg_a 
{
	bottom: -61px;
	left: 120px;
	position: absolute;
}
.greyBg.image-upload {
    width: 30% !important;
}
#close_popup img{width:45% !important; margin-top: -68px;}


</style>
<script>

function closepopup()
{
	$("#light").fadeOut();
	$("#fade").fadeOut();
	$("#file-input").val("");
	//$('#headingID').html("Choose file");
	$("#images_preview").html("");
}

function openpopup()
{ 
    $('#headingID').html("Choose file");
	$("#light").fadeIn();
	$("#fade").fadeIn(); 
}

$(document).ready(function(e){
	
	$(".myfile_type").live("click", function()
	{	
		var group = ".myfile_type[name='"+$(this).attr("name")+"']";
		$(group).attr("checked",false);
		$(this).attr("checked",true);		

		if($(this).val() == 'Other'){
			$("#other_myfile_type").fadeIn();
			$("#other_myfile_type_label").fadeIn();
		}else{
			$("#other_myfile_type").fadeOut();
			$("#other_myfile_type_label").fadeOut();
		}
	});
	
	function encodeImageFileAsURL() {

		var filesSelected = document.getElementById("file-input").files;
		// console.log(URL.createObjectURL(filesSelected.target.files[0]));
		if (filesSelected.length > 0) {
		
			var fileToLoad = filesSelected[0];
			var fileReader = new FileReader();

			fileReader.onload = function(fileLoadedEvent) {
				var srcData = fileLoadedEvent.target.result; // <--- data: base64
				
				$('#images_preview').append('<input type="hidden" name="file_path" id="file_path" value="'+srcData+'" />');
			}
			fileReader.readAsDataURL(fileToLoad);
		}
	}

	$("#submit_step1").live("click", function()
	{	
		var file_name = $('#file-input').val();
		if(file_name == ""){
			alert("File not uploaded.");
			return false;
		}
		var val = file_name.toLowerCase();
		var regex = new RegExp("(.*?)\.(docx|doc|ppt|pptx|jpeg|jpg|png|gif|pdf)$");
		if(!(regex.test(val))) {
			alert('Please select correct file format');
			return false;
		}
		
		$('#loaderImg').html('<div style="text-align:center"><img src="<?php echo $this->webroot; ?>img/ajax-loader.gif" /></div>');
		
		encodeImageFileAsURL();
		
		$('#images_preview').append('<input type="hidden" name="file_name" id="file_name" value="'+file_name+'" />');
		//$('#print_file_name').html("Filename: "+file_name);
		$('#loaderImg').html("");  
		$('#headingID').html("Choose file type");
		$('#step1,#step3').fadeOut();
		$('#step2').fadeIn();
	});

	$("#submit_step2").live("click", function()
	{	
		var file_type  = $(".myfile_type:checked").val();
		if(typeof file_type === 'undefined' || file_type === null){
			alert("File type is not checked.");
			return false;
		}
		
		if(file_type == "Other"){
			file_type  = $("#other_myfile_type").val();
		}else{
			file_type = file_type;
		}
		$('#loaderImg').html('<div style="text-align:center"><img src="<?php echo $this->webroot; ?>img/ajax-loader.gif" /></div>');
		
		
		$('#images_preview').append('<input type="hidden" name="file_type" id="file_type" value="'+file_type+'" />');
		$('#loaderImg').html("");
		$('#step1,#step2').fadeOut();
		$('#step3').fadeIn();
		
		var file_path = $('#file_path').val();
		var file_name = $('#file_name').val();
		if(file_path == "" || file_name == "")
		{
			return false;
		}		
		
		setTimeout(function(){

			//var dataArr = "'upload_file_Type'==='"+file_type+"'===='upload_file_Path'==='"+file_path+"'===='upload_file_Name'==='"+file_name+"'===='upload_file_Date'==='<?php echo date('m-d-Y'); ?>'===='upload_file_Mandatory'==='checked'===='upload_file_Status'==='Uploaded'";
			
	var inp = '';
	inp += '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Type][]" value="'+file_type+'">';		
	inp += '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Path][]" value="'+file_path+'">';		
	inp += '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Name][]" value="'+file_name+'">';		
	inp += '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Date][]" value="<?php echo date('m-d-Y'); ?>">';		
	inp += '<input type="checkbox" name="data[Employee][employee_upload_files][upload_file_Mandatory][]" checked value="checked" id="'+file_type+'"><label for="'+file_type+'"></label>';		
	inp += '<input type="hidden" name="data[Employee][employee_upload_files][upload_file_Status][]" value="Uploaded">';
		
			$('#step2,#step3').fadeOut();
			$('#step1').fadeIn();
			
			$('#table_upload_data').append('<tr><td>'+file_type+'</td><td><a target="_blank" href="'+file_path+'">'+file_name+'</a></td><td><?php echo date('m-d-Y'); ?></td><td>'+inp+'</td><td>Uploaded</td></tr>');
			//$('#table_upload_data').append('<tr><td>'+file_type+'</td><td><a target="_blank" href="'+file_path+'">'+file_name+'</a></td><td><?php echo date('m-d-Y'); ?></td><td><input type="checkbox" checked name="data[Employee][employee_upload_files][]" value="'+dataArr+'"></td><td>Uploaded</td></tr>');
			closepopup();
			
		}, 5000);
		$(".myfile_type:checked").prop("checked",false);	
		$('#headingID').html("Progress");
	});

	$(".firstpage_link").trigger("click");

	$( ".datepicker" ).datepicker();
	
	/* $("#fileuploader").uploadFile({
		url:"",
		fileName:"myfile",
		autoSubmit:false
	}); */
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	$("input[type=email]").live('blur', function(){
		var email = $(this).val();
		if(email == ""){
			return false;
		}
		if(!validateEmail(email)){
			alert("Email address is wrong");
			return false;
		}
	});
	/* $("#EmployeeFirstName").live('blur', function(){
		var name = $(this).val();
		if(name == ""){
			alert("First name is empty.");
			return false;
		}
		$.ajax({
			type: 'POST',
			url: "<?php echo $this->webroot; ?>admin/employees/save_file_upload",
			data: {
				first_name : name
			},
			success: function(data){
				console.log(data);
			},
			error: function(xhr, textStatus, error){
				$(this).trigger("click");
			}
		});
	});
	$("#EmployeeLastName").live('blur', function(){
		var name = $(this).val();
		if(name == ""){
			alert("Last name is empty.");
			return false;
		}
		$.ajax({
			type: 'POST',
			url: "<?php echo $this->webroot; ?>admin/employees/save_file_upload",
			data: {
				last_name : name
			},
			success: function(data){
				console.log(data);
			},
			error: function(xhr, textStatus, error){
				$(this).trigger("click");
			}
		});
	}); */
	
});

$(".firstpage_link").click(function(){
	$(".first_page").css("display","block");
	$(".second_page").css("display","none");
    $(".firstpage_link").hide();
    $(".secondpage_link").show();
});

$(".secondpage_link").click(function(){
	$(".second_page").css("display","block");
	$(".first_page").css("display","none");
    $(".firstpage_link").show();
    $(".secondpage_link").hide();
});

</script>

