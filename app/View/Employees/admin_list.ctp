<script>
$(function () {
	var table = $('#emplist').DataTable( {
		"scrollX": false,
		"jQueryUI": false,
		"ordering": true,
		"info":     true,
		//"ajax": "<?=$this->base.'/kendras/ajax_kendra_list/'?>",
		"deferRender": true
	});// table end
});
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
                          
                          
                            <table id="emplist">
                                <thead>
                            		<tr>
                            			<th>#</th>
                            			<th>Employee Name</th>
                            			<th>Email</th>
										
										<th>Date Applied</th>
										<th>Citizen</th>
										<th>Location</th>
										<th>Position</th>
										<th>Discipline 1</th>
										<th>Discipline 2</th>
										<th>Discipline 3</th>
										<th>Created Date</th>
										
                            			<th>Status</th>
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
                            			<td><?php echo $count; ?></td>
                            			<td><?php echo $this->Html->link( $row['Employee']['fullname']  ,   array($this->params['prefix']=>true,'action'=>'view', $row['Employee']['id']),array('escape' => false) );?></td>
                            			<td><?php echo $emp_row['Employee']['email']; ?></td>
										
                            			<td><?php echo (@$emp_row['Employee']['date_applied']=="")?"":$emp_row['Employee']['date_applied']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['country_address']=="")?"":$emp_row['Employee']['country_address']; ?></td>
                            			<td><?php 
										echo (@$emp_row['Employee']['home_street']=="")?"":$emp_row['Employee']['home_street'].", ";
										echo (@$emp_row['Employee']['address_city']=="")?"":$emp_row['Employee']['address_city'].", ";
										echo (@$emp_row['Employee']['country_address']=="")?"":$emp_row['Employee']['country_address'];										
										?></td>
                            			<td><?php echo (@$emp_row['Employee']['Position']=="")?"":$emp_row['Employee']['Position']; ?></td>
										
                            			<td><?php echo (@$emp_row['Employee']['Discipline1']=="")?"":$emp_row['Employee']['Discipline1']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['Discipline2']=="")?"":$emp_row['Employee']['Discipline2']; ?></td>
                            			<td><?php echo (@$emp_row['Employee']['Discipline3']=="")?"":$emp_row['Employee']['Discipline3']; ?></td>
                            			<td><?php echo $row['Employee']['created_on']; ?></td>
                            			<td ><?php echo ($row['Employee']['status']==1)?'Active':'Inactive'; ?></td>
                            			<td >view
                                        <?php //echo $this->Html->link(    "View",   array($this->params['prefix']=>true,'action'=>'view', $row['Employee']['id']) ); ?> | 
                            			<?php echo $this->Html->link(    "Edit",   array($this->params['prefix']=>true,'action'=>'save', $row['Employee']['id']) ); ?> | 
                                        <?php echo $this->Html->link(    "Delete", array($this->params['prefix']=>true,'action'=>'delete', $row['Employee']['id'])); ?> | 
                            			<?php
                            				if( $row['Employee']['status'] == 0){ 
                            					echo $this->Html->link(    "Re-Activate", array($this->params['prefix']=>true,'action'=>'activate', $row['Employee']['id']));
                                                }
                                            else{
                            					echo $this->Html->link(    "De-Activate", array($this->params['prefix']=>true,'action'=>'deactivate', $row['Employee']['id']));
                            					}
                            			?>
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