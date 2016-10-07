<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
</head>
<div class="saveinfo_cnt">
<section class="content-header">
<h1>Employee list <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Employee list</li>
</ol>
</section>

<section class="content"><!-- content -->
<div class="outer_content"><!--outer_content-->
	<div class="content_cnt first_page"><!-- content_cnt -->
	<h2>General Information :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>1</span></h1>
			<?php
				$model_name = 'Employee.';
				foreach($general_form_fields as $field){
				?>
					<div class="col-sm-6">
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
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
				$model_name = 'Employee.';
				foreach($upload_section_form_fields as $field){
				?>
					<div class="col-sm-12">
						<form>
						<div class="input_box">
					<?php
					if(!empty($this->request->data['Employee'])){
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']);  
					}else{
						echo $this->Slt->generate_form_field($field['FormSetting'],$model_name);  
					}
					?>
						</div>
						</form>
					</div>
					<?php
						 
				}
			?>
			<div id="fileuploader">Upload</div>

			<div class="col-sm-12">
				<table>
					<tr>
						<th>Type</th>
						<th>File Name </th>
						<th>Upload Date</th>
						<th>Mandatory</th>
						<th>Status</th>
					</tr>
					<tr>
						<td>Drivers License</td>
						<td><a href="#">driverslicenseSamTarwell.pdf</a></td>
						<td>09-19-2016</td>
						<td><input type="checkbox"></td>
						<td>Uploaded</td>
					</tr>
					<tr>
						<td>Diploma</td>
						<td><a href="#">diplomacertificate.pdf</a></td>
						<td>09-19-2016</td>
						<td><input type="checkbox"></td>
						<td>Not Uploaded</td>
					</tr>
					<tr>
						<td>References</td>
						<td><a href="#">MichaelRef.doc</a></td>
						<td>09-19-2016</td>
						<td><input type="checkbox"></td>
						<td>Received</td>
					</tr>
				</table>
				<div class="button_box">
				<button>Add file</button>
				<button>start upload</button>
				</div>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
	<div class="content_cnt"><!-- content_cnt -->
		<div class="row"><!-- inner_form -->
			<div class="col-sm-6 submit_box">
				<input type="submit" class="second_page" value="submit">
			</div>
			<div class="col-sm-6 submit_box">
				<a href="javascript:;" class="firstpage_link" id="firstpage_link" />1</a>
				<a href="javascript:;" class="secondpage_link" id="secondpage_link" />2</a>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	</div><!-- End-outer_content-->
	
</section><!-- End-content -->
</div>
<script>
  
  $(document).ready(function(){
		$(".firstpage_link").trigger("click");
			$( function() 
			{
				$( ".datepicker" ).datepicker();
			});
			$("#fileuploader").uploadFile(
			{
				url:"",
				fileName:"myfile",
				autoSubmit:false
			});
  });
  
  $(".firstpage_link").click(function() {
	$(".first_page").css("display","block");
	$(".second_page").css("display","none");
  });
  $(".secondpage_link").click(function() {
	$(".second_page").css("display","block");
	$(".first_page").css("display","none");
  });
</script>