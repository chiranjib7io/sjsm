<head>
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
<form>
	<div class="content_cnt"><!-- content_cnt -->
	<h2>General INFORMATION :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>1</span></h1>
			<div class="col-sm-12">
			<div class="row">
			<div class="col-sm-6">
			<div class="input_box form-input"><label>First Name : *</label><input type="text" name="fname" id="name-input"></div>
			</div>
			<div class="col-sm-6">
			<div class="input_box form-input"><label>Last Name : *</label><input type="text" name="lname" id="lname-input"></div>
			</div>
			<div class="col-sm-6">
			<div class="input_box form-input"><label>Email : *</label><input type="email" name="email" id="email-input"></div>
			</div>
			<div class="col-sm-6">
			<div class="input_box form-input"><label>Alternate email : </label><input type="email" name="email" id="aemail-input"></div>
			</div>
			<div class="col-sm-6">
			<div class="input_box form-input"><label>Campus: *</label><input type="text" name="campus" id="campus-input"></div>
			</div>
			<div class="col-sm-6">
			<div class="input_box form-input"><label>Date Applied : * </label><input type="text" name="date" id="datepicker"></div>
			</div>
			</div>	
			</div>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt"><!-- content_cnt -->
	<h2>Phone Numbers :-</h2>
		<div class="row inner_form"><!-- inner_form -->
		<h1 class="list_no"><span>2</span></h1>
		<div class="col-sm-12">
		<div class="row">
		<div class="col-sm-6">
		<div class="input_box form-input"><label>Ph No.: *</label><input type="tel" name="tel" id="phone-input"></div>
		</div>
		<div class="col-sm-6">
		<div class="input_box form-input"><label>Alternate Ph No:</label><input type="tel" name="atel" id="aphone-input"></div>
		</div>
		<div class="col-sm-6">
		<div class="input_box form-input"><label>Business Ph: *</label><input type="tel" name="btel" id="business-phone-input"></div>
		</div>
		<div class="col-sm-6">
		<div class="input_box form-input"><label>Home Ph : </label><input type="tex" name="fax" id="fax-input"></div>
		</div>
		<div class="col-sm-6">
		<div class="input_box form-input"><label>Fax No: * </label><input type="tex" name="fax" id="fax-input"></div>
		</div>
		</div>	
		</div>
		</div><!-- End-inner_form -->
	</div><!-- End-content_cnt -->
	<div class="content_cnt HmeAddress "><!-- content_cnt -->
		<h2>Home Address :-</h2>
		<div class="row inner_form Discipline_section"><!-- Discipline_section -->
		<h1 class="list_no"><span>3</span></h1>
		<div class="col-sm-6">
		<div class="input_box">
		<label>Street : *</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>State / Region:</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>Address Line2: </label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>ZIP / Postal Code :</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>City: *</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>Country :</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>Passport holder of which Country:</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box">
		<label>Best time to contact:</label>
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</div>
		</div>
		
		</div>
		</div><!-- End-content_cnt -->
	
	<div class="content_cnt education"><!-- content_cnt -->
		<h2>Education :-</h2>
		<div class="row inner_form Discipline_section"><!-- Discipline_section -->
		<h1 class="list_no"><span>4</span></h1>
		<div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Highest Degree Achieved : *</label>
		<span class="right-checkbox">
		<input type="checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Area of expertise: *</label>
		<span class="right-checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Medical Practice License holder</label>
		<span class="right-checkbox">
		<input type="checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>If Yes in which state/country :</label>
		<span class="right-checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Degree obtained from school :</label>
		<span class="right-checkbox">
		
		<select class="slectRt bxNone">
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Degree Obtained year :</label>
		<span class="right-checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div>
		
		</div>
		</div><!-- End-content_cnt -->
	
	<div class="content_cnt teaching"><!-- content_cnt -->
		<h2>Teaching Experience :-</h2>
		<div class="row inner_form Discipline_section"><!-- Discipline_section -->
		<h1 class="list_no"><span>5</span></h1>
		<div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Year of Experience :	</label>
		<span class="right-checkbox">
		
		<select class="slectRt bxNone">
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Subjects you can teach :</label>
		<span class="right-checkbox">
		<input type="checkbox">
		<select>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div><div class="col-sm-6">
		<div class="input_box checkbox-span">
		<label>Highest Level of students taught</label>
		<span class="right-checkbox">
		
		<select class="slectRt bxNone">
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
			<option>Please Select</option>
		</select>
		</span>
		</div>
		</div>
		
		</div>
		</div><!-- End-content_cnt -->
		
		<div class="content_cnt research "><!-- content_cnt -->
		<h2>Research Experience :-	</h2>
		<div class="row inner_form"><!-- inner_form -->
			<h1 class="list_no"><span>6</span></h1>
			<div class="col-sm-12">
			<div class="input_box form-input"><label>Number of Research publications in the last 10 years :</label> <textarea name="research"></textarea> </div>
				
			</div>
		</div><!-- End-inner_form -->
		</div><!-- End-content_cnt -->
		<div class="content_cnt resume "><!-- content_cnt -->
		<h2>Resume or CV Section :-</h2>
		<div class="row inner_form"><!-- inner_form -->
			<h1 class="list_no"><span>7</span></h1>
			<div class="col-sm-12">
			<div class="input_box form-input"><input type="file" name="datafile" size="40" class="chosFile">
			<input type="file" name="datafile" size="40"  class="chosFile"> </div>
				
			</div>
		</div><!-- End-inner_form -->
		</div><!-- End-content_cnt -->
	</form>
	<div class="page-navigation">
	<ul>
	<li> <a href="#"> <span><i class="fa fa-angle-double-left" aria-hidden="true"></i>
 </span> </a> </li>
	<li> <a href="#"> 1 </a> </li>
	<li> <a href="#"> 2</a> </li>
	<li> <a href="#">  <span><i class="fa fa-angle-double-right" aria-hidden="true"></i>
</span> </a> </li>
	
	
	
	</ul>
	
	</div>
	
	
	</div><!-- End-outer_content-->
</section><!-- End-content -->
</div>
<style>
select.bxNone{float:right !important;}
.content_cnt.HmeAddress .input_box select{ padding: 8px 15px;}
.content_cnt.HmeAddress .inner_form input, .content_cnt.HmeAddress .inner_form select{float:right;}
.content_cnt.education .inner_form input, .content_cnt.education .inner_form select{}
.content_cnt.research .inner_form label{max-width: 100%;}
.content_cnt.research textarea{ float: left;
    margin-top: 25px;
    padding: 10px;
    resize: none;
    width: 100%;
	border:1px solid #d4d1d1;
	border-radius:5px;
	height: 100px
	}
.content_cnt.resume .inner_form input, .content_cnt.resume .inner_form select{ border: medium none;height: inherit;
   max-width: 100%;}
   .chosFile{background:none !important; }
   .page-navigation{float:left;width:100%;text-align:right;}
   .page-navigation ul{margin:0px;padding:0px;display:inline-block;float:none;border:1px solid #d1d1d1;padding: 8px 0;border-radius:3px;border-right:none;}
   .page-navigation ul li{list-style:none;float:left;}
   .page-navigation ul li a{border-right:1px solid #d1d1d1; padding: 10px 13px;
}
.saveinfo_cnt .outer_content{ padding-bottom:80px;}
.list_no{ padding: 10px;}
.list_no > span {
    background: #eb5947 none repeat scroll 0 0;
    border-radius: 50%;
    display: block;
    height: 45px;
    line-height: 45px;
    width: 45px;
}
</style>