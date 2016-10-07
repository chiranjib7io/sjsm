<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<div class="saveinfo_cnt">
<section class="content-header">
<h1>Employee list <small>Preview</small></h1>
<ol class="breadcrumb">
<li><a href="<?= $this->Html->url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Employee list</li>
</ol>
</section>
<section class="content"><!-- content -->
<div class="outer_content"><!--outer_content-->
	<div class="content_cnt"><!-- content_cnt -->
	<h2>Contract Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>8</span></h1>
			<div class="col-sm-6">
				<form>
					<div class="input_box">
					<label>Contract Start Date: *</label>
					<input type="text" id="datepicker">
					</div>
					<div class="input_box">
					<label>Contract End Date: *</label>
					<input type="text" id="datepicker">
					</div>
				</form>
			</div>
			<div class="col-sm-6">
			<form>
					<div class="input_box">
					<label>Renewal Date:</label>
					<input type="text" id="datepicker">
					</div>
					<div class="input_box">
					<label>Termination Date:</label>
					<input type="text" id="datepicker">
					</div>
				</form>
			</div>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
		<div class="content_cnt"><!-- content_cnt -->
		<h2>Discipline Section :-</h2>
		<div class="row inner_form Discipline_section"><!-- Discipline_section -->
		<h1 class="list_no"><span>9</span></h1>
			<div class="col-sm-6">
				<form>
					<div class="input_box">
					<label>Discipline 1:</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box">
					<label>Discipline 2:</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box">
					<label>Discipline 3:</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box">
					<label>Faculty Status :</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
			<form>
					<div class="input_box">
					<label>Position:</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box previousposition">
					
					<label>Previous Position:</label>
					<div class="blank_space">dd</div>
					<!-- <input type="checkbox"> -->
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box">
					<label>Experience :</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
					<div class="input_box">
					<label>Years of Experience:</label>
					<input type="checkbox">
					<select>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
						<option>Please Select</option>
					</select>
					</div>
				</form>
			</div>
		</div><!-- End-Discipline_section -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt"><!-- content_cnt -->
	<h2>EMergency Contact :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>10</span></h1>
			<div class="col-sm-6">
				<form>
					<div class="input_box">
					<label>Name : *</label>
					<input type="text" value="Name">
					</div>
					<div class="input_box">
					<label>Email: *</label>
					<input type="email" value="email">
					</div>
				</form>
			</div>
			<div class="col-sm-6">
			<form>
					<div class="input_box">
					<label>Relationship :</label>
					<input type="text" value="relationship">
					</div>
				</form>
			</div>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt"><!-- content_cnt -->
	<h2>Upload Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>11</span></h1>
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
			<div class="col-sm-12 submit_box">
				<input type="submit" value="submit">
			</div>
			
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	</div><!-- End-outer_content-->
</section><!-- End-content -->
</div>