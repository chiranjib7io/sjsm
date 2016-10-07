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
                Email List
				<!--
                <small class="text-green">Success Message</small>
                <small class="text-danger">Waring Message</small>
				-->
              </h1>
              <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Email List</a></li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
              <div class="row">
                  <div class="col-sm-12">
                    <span style="color:green"><?php echo $this->Session->flash();?></span>
                      <!-- TABLE: LATEST ORDERS -->
                       <a href="<?=$this->Html->url('/mailings/send_email')?>"><input type="button" class="btn btn-primary" value="Send Email To All" /></a>
                          
                      <div class="box no-border">
                        <div class="box-header no-border">
                         
                            <table id="emplist">
                                <thead>
                            		<tr>
                            			<th>#</th>
                            			<th>First Name</th>
                            			<th>Last Name</th>
                                        <th>Email</th>
                            		</tr>
                            	</thead>
                            	<tbody>						
                            		<?php $count=0; ?>
                            		<?php foreach($subscriber_data as $row): ?>				
                            		<?php $count ++;?>
                            		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
                            		<?php endif; ?>
                            			<td><?php echo $count; ?></td>
                            			<td><?php echo $row['Subscriber']['first_name']; ?></td>
                            			<td><?php echo $row['Subscriber']['last_name']; ?></td>
                                        <td><?php echo $row['Subscriber']['email']; ?></td>
                            		</tr>
                            		<?php endforeach; ?>
                            	</tbody>
                            </table>
                          
                          
                          
                          
                        </div><!-- /.chart_box_header -->
                   	  </div>
                  </div>    	 	
                             
              </div><!-- /.row -->
            
            </section><!-- /.content -->

