<head> 
	<!--<script src="<?php //echo $this->webroot; ?>js/jquery.form.js"></script>-->
	<script src="<?php echo $this->webroot; ?>js/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
										
				/* echo "<pre>";
				
				print_r($all_form_fields);
				
				echo "</pre>"; */
				
				/* foreach($all_form_fields as $key=>$val){
					echo $val['FormSetting']['field_name']."<br>";
				} */

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
						print_r($this->Slt->generate_form_field($field['FormSetting'],$model_name,$this->request->data['Employee']));  
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
	<div class="content_cnt second_page"><!-- content_cnt -->
	<h2>Upload Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>11</span></h1>
				<?php
				//$model_name = 'Employee.';
				//foreach($upload_section_form_fields as $field){
					
					//print_r($field);
					/* $result = json_decode($val['FormSetting']['field_values']);
					print_r($result);
					
					foreach($result as $key=>$val){
						echo $val;
					} */
					
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
				<table id="table_upload_data">
					<tr>
						<th width="100px">Type</th>
						<th width="100px">File Name </th>
						<th width="100px">Upload Date</th>
						<th width="100px">Mandatory</th>
						<th width="100px">Status</th>
					</tr>
					<!--tr>
						<td>Drivers License</td>
						<td><a href="#">driverslicenseSamTarwell.pdf</a></td>
						<td>09-19-2016</td>
						<td><input type="checkbox"></td>
						<td>Uploaded</td>
					</tr-->
					
					
					<?php
					
					if(!empty($this->request->data['Employee']['employee_upload_files'])){

						
						foreach($this->request->data['Employee']['employee_upload_files'] as $key=>$val){

							

							$loop = explode("====",$val);
							$loopdataarray = array();
							foreach($loop as $row=>$rowVal){
								$loopdata = explode("===",$rowVal);
								$loopdata = str_replace("'","",$loopdata);
								$loopdatakey = $loopdata[0];
								$loopdataarray[$loopdatakey] = $loopdata[1];
							}
							
							$dataArr = "
							'upload_file_Type'==='".$loopdataarray['upload_file_Type']."'====
							'upload_file_Path'==='".$loopdataarray['upload_file_Path']."'====
							'upload_file_Name'==='".$loopdataarray['upload_file_Name']."'====
							'upload_file_Date'==='".$loopdataarray['upload_file_Date']."'====
							'upload_file_Mandatory'==='".$loopdataarray['upload_file_Mandatory']."'====
							'upload_file_Status'==='".$loopdataarray['upload_file_Status']."'";
							//$this->webroot.'upload/employee/'.$first_name.'/'.
							$first_name = $this->request->data['Employee']['first_name'];
							$dataPrint = '<tr>
								<td>'.$loopdataarray['upload_file_Type'].'</td>
								<td>
									<a target="_blank" href="'.$loopdataarray['upload_file_Path'].'">
										'.$loopdataarray['upload_file_Name'].'
									</a>
								</td>
								<td>'.$loopdataarray['upload_file_Date'].'</td>
								<td><input type="checkbox" '.$loopdataarray['upload_file_Mandatory'].' name="data[Employee][employee_upload_files][]" value="'.$dataArr.'"></td>
								<td>'.$loopdataarray['upload_file_Status'].'</td>
							</tr>';
							
							echo $dataPrint;				

						}
					}
					
					?>					
					
				</table>
				<div class="button_box">
				     <input type="button" onclick="openpopup();" style="width: auto !important;" value="Add file" > 
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
	
	<div class="content_cnt"><!-- content_cnt -->
		<div class="row"><!-- inner_form -->
			<div class="col-sm-6 submit_box">
				<input type="submit" class="second_page" name="data[Employee][Save_Employee]" value="submit">
			</div>
			<div class="col-sm-6 submit_box">
				<a href="javascript:;" class="firstpage_link" id="firstpage_link" />1</a>
				<a href="javascript:;" class="secondpage_link" id="secondpage_link" />2</a>
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	
</div><!-- End-outer_content-->
</form>	
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
	$('#myfile').val("");
	$('#images_preview').html("");
}

function openpopup()
{ 
	$("#light").fadeIn();
	$("#fade").fadeIn(); 
}

$(document).ready(function(e){
	
	$("#myfile_type").live("click", function()
	{	
		var group = "#myfile_type[name='"+$(this).attr("name")+"']";
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

		var filesSelected = document.getElementById("myfile").files;
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
	/* $('#myfile').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$('#images_preview').append('<input type="hidden" name="file_path" id="file_path" value="'+tmppath+'" />');
	}); */

	$("#submit_step1").live("click", function()
	{	
		var file_name = $('#myfile').val();
		if(file_name == ""){
			alert("File not uploaded.");
			return false;
		}
		
		$('#loaderImg').html('<div style="text-align:center"><img src="<?php echo $this->webroot; ?>img/ajax-loader.gif" /></div>');
		
		encodeImageFileAsURL();
		
		$('#images_preview').append('<input type="hidden" name="file_name" id="file_name" value="'+file_name+'" />');
		$('#print_file_name').html(file_name);
		$('#loaderImg').html("");
		$('#step1').fadeOut();
		$('#step3').fadeOut();
		$('#step2').fadeIn();
	});

	$("#submit_step2").live("click", function()
	{	
		var file_type  = $("#myfile_type:checked").val();
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
		
		$('#loaderImg').html("");	
		
		$('#images_preview').append('<input type="hidden" name="file_type" id="file_type" value="'+file_type+'" />');
		
		$('#step1').fadeOut();
		$('#step2').fadeOut();
		$('#step3').fadeIn();
		
		var file_path = $('#file_path').val();
		var file_name = $('#file_name').val();
		if(file_path == "" || file_name == "")
		{
			return false;
		}		
		
		setTimeout(function(){

//var dataArr = "{'upload_file_Type':'"+file_type+"','upload_file_Path':'"+file_path+"','upload_file_Name':'"+file_name+"','upload_file_Date':'<?php echo date('m-d-Y'); ?>','upload_file_Mandatory':'checked','upload_file_Status':'Uploaded'}";
var dataArr = "'upload_file_Type'==='"+file_type+"'===='upload_file_Path'==='"+file_path+"'===='upload_file_Name'==='"+file_name+"'===='upload_file_Date'==='<?php echo date('m-d-Y'); ?>'===='upload_file_Mandatory'==='checked'===='upload_file_Status'==='Uploaded'";
		
			$('#step2').fadeOut();
			$('#step3').fadeOut();
			$('#step1').fadeIn();
		$('#table_upload_data').append('<tr><td>'+file_type+'</td><td><a target="_blank" href="'+file_path+'">'+file_name+'</a></td><td><?php echo date('m-d-Y'); ?></td><td><input type="checkbox" checked name="data[Employee][employee_upload_files][]" value="'+dataArr+'"></td><td>Uploaded</td></tr>');
			closepopup();
			
		}, 5000);
		$("#myfile_type:checked").prop("checked",false);	
		
	});

	$(".firstpage_link").trigger("click");

	$( ".datepicker" ).datepicker();
	
	/* $("#fileuploader").uploadFile({
		url:"",
		fileName:"myfile",
		autoSubmit:false
	}); */
});

$(".firstpage_link").click(function(){
	$(".first_page").css("display","block");
	$(".second_page").css("display","none");
});

$(".secondpage_link").click(function(){
	$(".second_page").css("display","block");
	$(".first_page").css("display","none");
});

</script>