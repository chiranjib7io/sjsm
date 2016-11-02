<script>
$(function () {
    
    
    var table = $('#emplist').DataTable( {
                    "scrollX": false,
                    "jQueryUI": false,
                    "ordering": true,
                    "info":     true,
                    "deferRender": true
                });// table end
                
});
        
          
      
</script>
		   <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                User List
				<!--
                <small class="text-green">Success Message</small>
                <small class="text-danger">Waring Message</small>
				-->
              </h1>
              <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> User List</a></li>
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
                            			<th>Name</th>
                            			<th>Email</th>
                            			
                            			<th>Status</th>
                            			<th>&nbsp;</th>
                            		</tr>
                            	</thead>
                            	<tbody>						
                            		<?php $count=0; ?>
                            		<?php foreach($user_data as $row): ?>				
                            		<?php $count ++;?>
                            		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
                            		<?php endif; ?>
                                    
                            			<td><?php echo $count; ?></td>
                            			<td><?php echo $row['User']['first_name']." ".$row['User']['last_name'];?></td>
                            			<td><?php echo $row['User']['email']; ?></td>
                            			
                            			<td ><?php echo ($row['User']['status']==1)?'Active':'Inactive'; ?></td>
                            			<td >
                                        <?php echo $this->Html->link(    "Edit",   array($this->params['prefix']=>true,'action'=>'update_user', $row['User']['id']) ); ?>
                            			</td>
                            		</tr>
                            		<?php endforeach; ?>
                            		
                            	</tbody>
                            </table>
                          
                          
                          
                          
                        </div><!-- /.chart_box_header -->
                   	  </div>
                  </div>    	 	
                             
              </div><!-- /.row -->
            
            </section><!-- /.content -->

