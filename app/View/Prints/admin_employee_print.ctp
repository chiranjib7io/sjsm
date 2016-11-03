<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employee Details</title>

</head>

<body>
<div style="width:960px; margin:0 auto">
<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin-bottom:20px; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">GENERAL INFORMATION :</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($general_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="15%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="30%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1; } 
        if($flg==0) $i++;
        
    }
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin-bottom:20px; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">Comments :</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($comments_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="15%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="30%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1; } 
        if($flg==0) $i++;
        
    }
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">PHONE NUMBERS :-</h2>
  <tbody>
  
   <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($phone_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="15%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="15%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i<3){
      ?>
      <td width="5%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==3){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
 
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
  
  
    </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">HOME ADDRESS :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($address_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>


<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">Permanent ADDRESS :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($permanent_address_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>


<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">Campus ADDRESS :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($campus_address_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>


<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">EDUCATION:-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($education_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">TEACHING EXPERIENCE :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($experience_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=is_array($data)?implode(',',$data):$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">RESEARCH EXPERIENCE :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($reserch_experience_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      
    
    <?php
        
        if($i==1){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">RESUME or CV SECTION :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($attachment_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        if(!is_array($data)){
		?>
        
        <td width="25%" style="border:none; padding-bottom:10px; "><?=$data?></td>

    <?php
        }
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">CONTRACT SECTION :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($contract_section_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">DISCIPLINE SECTION :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($discipline_section_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="30%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">EMERGENCY CONTACT :-</h2>
  <tbody>
  <?php
	$model_name = 'Employee.';
    $i=1;
    $flg=0;
	foreach($discipline_section_form_fields as $field){
	   $flg=0;
       if($i==1) echo '<tr>';
	?>
      
      <?php
        $arr= $field['FormSetting'];
        $data= !empty($this->request->data['Employee'][$arr['field_name']])?$this->request->data['Employee'][$arr['field_name']]:'';
        
		?>
        <td width="15%" style="border:none; padding-bottom:10px;"><?php echo $arr['field_display_name']; ?><font color="red"><?php (($arr['is_required']=='required')?'*':'') ?></font></td>
        <td width="20%" style="border:none; padding-bottom:10px; "><?=$data?></td>
      <?php
      if($i==1){
      ?>
      <td width="10%" style="border:none; padding-bottom:10px;">&nbsp;</td>
      <?php
      }
      ?>
    
    <?php
        
        if($i==2){ echo '</tr>'; $flg=1; $i=1;} 
        if($flg==0) $i++;
    }
    if($flg==0){ echo '</tr>'; } 
    ?>
    
  </tbody>
</table>

<table width="960px" border="1" cellspacing="0" cellpadding="0" style="margin:0 auto; border:none; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:17px;">
<h2 style="margin:40px 0 20px 0; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px;">UPLOAD SECTION :-</h2>
  <tbody>
  
    <tr>
      <td width="20%" style="border:none; padding-bottom:10px;">Type</td>
      <td width="20%" style="border:none; padding-bottom:10px; ">File Name</td>
      <td width="20%" style="border:none; padding-bottom:10px;">Upload Date</td>
      <td width="20%" style="border:none; padding-bottom:10px;">Mandatory</td>
      <td width="20%" style="border:none; padding-bottom:10px;">Status</td>
    </tr>
    <?php
					
		if(!empty($this->request->data['Employee']['employee_upload_files'])){

			
			foreach($this->request->data['Employee']['employee_upload_files'] as $key=>$val){
				    
                    $inp = (@$val['upload_file_Mandatory']=='checked')?"Yes":"No";
                    $upload_file_Name = explode("\\",@$val['upload_file_Name']);
					$dataPrint = '<tr>
						<td width="15%" style="border:none; padding-bottom:10px;">'.@$val['upload_file_Type'].'</td>
						<td width="20%" style="border:none; padding-bottom:10px; ">
							<a target="_blank" href="'.@$val['upload_file_Path'].'">
								'.end($upload_file_Name).'
							</a>
						</td>
						<td width="15%" style="border:none; padding-bottom:10px;">'.@$val['upload_file_Date'].'</td>
						<td width="20%" style="border:none; padding-bottom:10px; ">'.$inp.'</td>
						<td width="20%" style="border:none; padding-bottom:10px; ">'.@$val['upload_file_Status'].'</td>
					</tr>';	
					echo $dataPrint;
			}
		}
		
		?>
  </tbody>
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){

   window.print();

});

</script>
</div>
</body>
</html>
