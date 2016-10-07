<?php
if(isset($_POST['file_upload_method']))
{
	if($_POST['file_upload_method'] == "file_type")
	{
		$file_name = '';
		if($_POST['file_name'] == 1){
			$file_name = "Resume";
		}else if($_POST['file_name'] == 2){
			$file_name = "PAN Card";
		}else if($_POST['file_name'] == 3){
			$file_name = "Passport";
		}else{
			$file_name = $_POST['file_name'];
		}
		echo '<input type="hidden" name="file_name" id="file_name" value="'.$file_name.'" />';
	}
	if($_POST['file_upload_method'] == "file_view")
	{
		echo '<tr><td>'.$_POST['file_name'].'</td><td><a target="_blank" href="'.$_POST['file_path'].'">File link</a></td><td>'.date('m-d-Y').'</td><td><input type="checkbox"></td><td>Uploaded</td></tr>';
	}
	die;
}
?>