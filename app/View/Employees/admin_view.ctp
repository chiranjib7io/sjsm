<head> 
	<!--<script src="<?php //echo $this->webroot; ?>js/jquery.form.js"></script>-->
	<script src="<?php echo $this->webroot; ?>js/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
    }
    </script>
</head>
<div class="saveinfo_cnt">
<section class="content-header">
<h1>View Employee <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">View Employee</li>
</ol>
</section>

<section class="content" id="printarea"><!-- content -->
<input class="btn-print" type="button" value="Print" onclick="printDiv('printarea')"/>
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
	<h2>Resume Or CV Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>7</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($attachment_form_fields as $field){
				?>
					<div class="col-sm-12">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						print_r($this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']));  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
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
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						
					</div>
					<?php
						 
				}
			?>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt second_page"><!-- content_cnt -->
	<h2>Upload Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>11</span></h1>
				<?php
				//$model_name = 'Employee.';
				//foreach($upload_section_form_fields as $field){
					
					
				/* ?>
					<div class="col-sm-12">
						
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field_view($field['FormSetting'],$model_name);  
					}
					?>
						</div>
					</div>
					<?php */
						 
				//}
			?> 

			<div class="col-sm-12">
				<table id="table_upload_data">
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
	$inp .= '<input type="checkbox" name="data[Employee][employee_upload_files][upload_file_Mandatory][]" '.@$val['upload_file_Mandatory'].' value="checked">';		
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
					    <div id="light" class="white_content"> 
						    <div style="position:relative"><h5>Select File to Upload</h5>
								<div class="content">
								
								        <div id="images_preview"></div>
									    <div id="step1">
											<h6>Step 1</h6>
											<label>Upload File</label><input type="file" id="myfile" name="myfile[]">
											<br>
											<label>&nbsp;</label><input type="button" name="submit_file" id="submit_step1" value="Upload File">
										</div>
										<div id="step2" style="display: none;">
											<h6>Step 2</h6>
											<?php
											$model_name = 'Employee.';
											foreach($upload_section_form_fields as $field=>$val2){
												//echo "<pre>";
												//print_r($val2);echo "</pre>";
												
												$result = json_decode($val2['FormSetting']['field_values']);
												
												foreach($result as $key=>$val){
												
													echo '<label>'.$val.'</label><input type="checkbox" id="myfile_type" name="myfile_type[]" value="'.$val.'"><br>';
												}
												
											}
											?>
											<label id="other_myfile_type_label" style="display: none;">&nbsp;</label><input type="text" id="other_myfile_type" name="other_myfile_type" style="display: none;">
											<br>
											<label>&nbsp;</label><span id="print_file_name"></span><br>
											<label>&nbsp;</label><input type="button" name="submit_file" id="submit_step2" value="Upload Type">
										</div>
										<div id="step3" style="display: none;">
											<h6>Step 3</h6>
											<img src="<?php echo $this->webroot; ?>img/uploading.gif">
										</div>
										<div id="loaderImg"></div>
										
								</div> 
								<br>
								<a id="close_popup" href="javascript: void(0);" onclick="javascript: closepopup();" style="display: block;">Close</a> <!--  class="closebtn" -->
						    </div>
						</div>
						<div id="fade" class="black_overlay"></div>
				</div>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
	<div class="col-sm-12">
		<a href="#" class="editBtn">Edit</a>
		<a href="#"class="delBtn">Delete</a>
	</div>
			
	<div class="content_cnt"><!-- content_cnt -->
		<div class="row"><!-- inner_form -->
			<div class="col-sm-6 submit_box">
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
</div><!-- End-outer_content-->

</section><!-- End-content -->
</div>
<style>
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
	width: 40%;
	z-index: 1002;
} 
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
</style>
<script>

function closepopup()
{
	$("#light").fadeOut();
	$("#fade").fadeOut();
}

function openpopup()
{ 
	$("#light").fadeIn();
	$("#fade").fadeIn(); 
}

$(document).ready(function(e){


	$( ".datepicker" ).datepicker();
	
});

</script>