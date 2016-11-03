  
<script src="<?php echo $this->webroot; ?>asset/plugins/multiselect/jquery.multiselect.js" type="text/javascript"></script>
<link href="<?php echo $this->webroot; ?>asset/plugins/multiselect/jquery.multiselect.css" rel="stylesheet"/>





<script>
   
$(function () {
	var table = $('#emplist').DataTable( {
		"scrollX": false,
		"jQueryUI": false,
		"ordering": true,
		"info":     true,
		//"ajax": "<?=$this->base.'/kendras/ajax_kendra_list/'?>",
		"deferRender": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		
	});// table end
});
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#emplist tfoot th').each( function () {
        var title = $(this).text();
		if(title != "")
		{	
			var data = $(this).attr("data");
			try {
				var data_array = $.parseJSON(data);
				var data_array = $.parseJSON(data);
				var options = "";
				$.each(data_array, function( index, value ) {
				options += '<option value = "'+index+'">'+value+'</option>';
				});
				$(this).html( '<select class="'+title+'" multiple = "multiple">'+options+'</select>' );
				;
			} catch (e) {
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			}
			$(".Citizen").multiselect({
					columns: 1,
					placeholder: 'Select Citizen'
				});
		}
    } );
 
    // DataTable
    var table = $('#emplist').DataTable();// table end
 
    

function selectFilterColumn ( i , val) {
    $('#emplist').DataTable().column( i ).search( val ).draw();
}

$('.select_filter').on( 'change', function () {
	selectFilterColumn($(this).attr('data-column') , this.value);			  
});

// Date Filter Start
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var evalDate= parseDateValue(data[0]);
	  
    //Quick Filter Code Start
    var dayback = parseInt($('#quick_filter').val());
    
    if(dayback){
        var today = getPreviousDate(0);
        var fromday = getPreviousDate(dayback);
        
        if (evalDate >= fromday && evalDate <= today) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }
	//Quick Filter Code End 
    
    // Date Range Filter start 	
    var min = parseDateValue( $('#date_start').val() );
    var max = parseDateValue( $('#date_end').val() );
    if (min!=="undefinedundefined" || max !=="undefinedundefined") {
    	if (evalDate >= min && evalDate <= max) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }
    // Date Range Filter end
     
    return true;
  }
);

// Function for converting a mm/dd/yyyy date value into a numeric string for comparison (example 08/12/2010 becomes 20100812
function parseDateValue(rawDate) {
	var dateArray= rawDate.split("/");
	var parsedDate= dateArray[2] + dateArray[0] + dateArray[1];
	return parsedDate;
}
function getPreviousDate(days){
    var t = new Date();
    t.setDate(t.getDate() - days);
    var rawDate = t.toISOString().split('T')[0];
    var dateArray= rawDate.split("-");
	var parsedDate= dateArray[0] + dateArray[1] + dateArray[2];
	return parsedDate;
}

    $("#date_start").keyup ( function() { table.draw(); } );
	$("#date_start").change( function() { table.draw(); } );
	$("#date_end").keyup ( function() { table.draw(); } );
	$("#date_end").change( function() { table.draw(); } );
    $("#quick_filter").change( function() { table.draw(); } );

//Date Filter End

$("#emplist thead th").each( function ( i ) {
	
    //console.log($(this).text());
    if ($(this).text() == 'Status') {
        var isStatusColumn = (($(this).text() == 'Status') ? true : false);
		var select = $('<select><option value="">Status</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) {  
			if(d!==""){
			     select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    	
	if ($(this).text() == 'Citizen') {
        var isStatusColumn = (($(this).text() == 'Citizen') ? true : false);
		var select = $('<select><option value="">Citizen</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) {  
			if(d!==""){
			     select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    
    if ($(this).text() == 'Location') {
        var isStatusColumn = (($(this).text() == 'Location') ? true : false);
		var select = $('<select><option value="">Location</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) {  
			if(d!==""){
			     select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    
    if ($(this).text() == 'Discipline 1') {
        var isStatusColumn = (($(this).text() == 'Discipline 1') ? true : false);
		var select = $('<select><option value="">Discipline 1</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) {  
			if(d!==""){
			     select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    
    if ($(this).text() == 'Discipline 2') {
        var isStatusColumn = (($(this).text() == 'Discipline 2') ? true : false);
		var select = $('<select><option value="">Discipline 2</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) {  
			if(d!==""){
			     select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    
    if ($(this).text() == 'Discipline 3') {
        var isStatusColumn = (($(this).text() == 'Discipline 3') ? true : false);
		var select = $('<select><option value="">Discipline 3</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                var val = $(this).val();
				
                table.column( i )
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            } );
 		
		
        // All other non-Status columns (like the example)
		table.column( i ).data().unique().sort().each( function ( d, j ) { 
		  if(d!==""){
			select.append( '<option value="'+d+'">'+d+'</option>' );
            }
        } );
        
	}
    
    
    
} );
	
	
} );
</script>
		   <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Employee List
				<!--
                <small class="text-green">Success Message</small>
                <small class="text-danger">Waring Message</small>
				-->
              </h1>
              <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Employee List</a></li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
              <div class="row">
                  <div class="col-sm-12">
                    <span style="color:red"><?php echo $this->Session->flash();?></span>
                      <!-- TABLE: LATEST ORDERS -->
                      <div class="box no-border">
                        <div class="box-header no-border">
                            <div class="input-daterange" style="float: right;">
                                <label>Applied Date</label>
								<input type="text" class="input-small" id="date_start" data-column="0">
								<span class="add-on" style="vertical-align: top;height:20px">to</span>
								<input type="text" class="input-small" id="date_end" data-column="0">
							</div>
							<script type="text/javascript">
								// When the document is ready
								$(document).ready(function () {
								    
									$('.input-daterange').datepicker({
										todayBtn: "linked",
                                        endDate: '+0d',
                                        autoclose: true,
									});										
								});
								
							</script>
                            <div id="dayrange" style="float: right;">
                                <label>Quick Filter</label>
								<select id="quick_filter" class="input-small" data-column="0">
                                <option value="0">All</option>
                                <option value="7">Last 7 days</option>
                                <option value="14">Last 14 days</option>
                                <option value="30">Last 30 days</option>
                                </select>
							</div>
                          
                            <table id="emplist">
                                <thead>
                            		<tr>
                            			<!--<th>#</th>-->
										<th>Applied on</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Status</th>
										<th>Citizen</th>
										<th>Location</th>
										<th>Position</th>
										<th>Discipline 1</th>
										<th>Discipline 2</th>
										<th>Discipline 3</th>
                            			<th>Actions</th>
                            		</tr>
                            	</thead>
                            	<tbody>						
                            		<?php $count=0; ?>
                            		<?php foreach($emp_data as $row): ?>				
                            		<?php $count ++;?>
                            		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
                            		<?php endif; ?>
                                    <?php
                                    $emp_row = json_decode($row['Employee']['form_values'],true);
                                    ?>
                            		<!--<td><?php echo $count; ?></td>-->
										
                            			<td><?php echo (@$emp_row['Employee']['date_applied']=="")?"":$emp_row['Employee']['date_applied']; ?></td>
										<td><?php echo $this->Html->link(    $row['Employee']['last_name'],   array($this->params['prefix']=>true,'action'=>'view', $row['Employee']['id']) ); ?><?php //echo $row['Employee']['last_name']; ?></td>
										<td><?php echo $this->Html->link(    $row['Employee']['first_name'],   array($this->params['prefix']=>true,'action'=>'view', $row['Employee']['id']) ); ?><?php //echo $row['Employee']['first_name']; ?></td>
										<td ><?php echo (@$emp_row['Employee']['Faulty_Status']=="")?'':$emp_row['Employee']['Faulty_Status']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['passport_holder']=="")?"":$emp_row['Employee']['passport_holder']; ?></td>
                            			<td><?php 
										//echo (@$emp_row['Employee']['home_street']=="")?"":$emp_row['Employee']['home_street'].", ";
										//echo (@$emp_row['Employee']['address_city']=="")?"":$emp_row['Employee']['address_city'].", ";
										echo (@$emp_row['Employee']['country_address']=="")?"":$emp_row['Employee']['country_address'];										
										?></td>
                            			<td><?php echo (@$emp_row['Employee']['Position']=="")?"":$emp_row['Employee']['Position']; ?></td>
										
                            			<td><?php echo (@$emp_row['Employee']['Discipline1']=="")?"":$emp_row['Employee']['Discipline1']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['Discipline2']=="")?"":$emp_row['Employee']['Discipline2']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['Discipline3']=="")?"":$emp_row['Employee']['Discipline3']; ?></td>
                                        
                            			<td >
                                        <?php echo $this->Html->link(    "View",   array($this->params['prefix']=>true,'action'=>'view', $row['Employee']['id']) ); ?> <!--| 
                            			<?php //echo $this->Html->link(    "Edit",   array($this->params['prefix']=>true,'action'=>'save', $row['Employee']['id']) ); ?> | 
                                        <?php //echo $this->Html->link(    "Delete", array($this->params['prefix']=>true,'action'=>'delete', $row['Employee']['id'])); ?> | 
                            			<?php
                            				if( $row['Employee']['status'] == 0){ 
                            					//echo $this->Html->link(    "Re-Activate", array($this->params['prefix']=>true,'action'=>'activate', $row['Employee']['id']));
                                                }
                                            else{
                            					//echo $this->Html->link(    "De-Activate", array($this->params['prefix']=>true,'action'=>'deactivate', $row['Employee']['id']));
                            					}
                            			?>
                                        -->
                            			</td>
                            		</tr>
                            		<?php endforeach; ?>
                            		<?php unset($user); ?>
                            	</tbody>
								
                            </table>
                          
                          
                          
                          
                        </div><!-- /.chart_box_header -->
                   	  </div>
                  </div>    	 	
                             
              </div><!-- /.row -->
            
            </section><!-- /.content -->
			<style>
			table.dataTable thead th{padding-left:0;padding-right:0;}
			</style>