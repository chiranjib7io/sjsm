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
                Form Field List
				<!--
                <small class="text-green">Success Message</small>
                <small class="text-danger">Waring Message</small>
				-->
              </h1>
              <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Form Field List</a></li>
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
                            			<th>Form Name</th>
                            			<th>Field Name</th>
                                        <th>Field Type</th>
                            			
                            			<th>Status</th>
                            			<th>Actions</th>
                            		</tr>
                            	</thead>
                            	<tbody>						
                            		<?php $count=0; ?>
                            		<?php foreach($field_data as $row): ?>				
                            		<?php $count ++;?>
                            		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
                            		<?php endif; ?>
                            			<td><?php echo $count; ?></td>
                            			<td><?php echo $form_name[$row['FormSetting']['form_id']]; ?></td>
                            			<td><?php echo $row['FormSetting']['field_display_name']; ?></td>
                                        <td><?php echo $row['FormSetting']['field_type']; ?></td>
                            			
                            			<td ><?php echo ($row['FormSetting']['status']==1)?'Active':'Inactive'; ?></td>
                            			<td >
                            			<?php echo $this->Html->link(    "Edit",   array($this->params['prefix']=>true,'action'=>'field_save', $row['FormSetting']['id']) ); ?> | 
                                        <?php echo $this->Html->link(    "Delete", array($this->params['prefix']=>true,'action'=>'field_delete', $row['FormSetting']['id'])); ?> | 
                            			<?php
                            				if( $row['FormSetting']['status'] == 0){ 
                            					echo $this->Html->link(    "Re-Activate", array($this->params['prefix']=>true,'action'=>'field_activate', $row['FormSetting']['id']));
                                                }
                                            else{
                            					echo $this->Html->link(    "De-Activate", array($this->params['prefix']=>true,'action'=>'field_deactivate', $row['FormSetting']['id']));
                            					}
                            			?>
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

