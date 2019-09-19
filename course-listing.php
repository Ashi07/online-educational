<?php
	$delete_erorr="";
	
	if(isset($_POST['delete_btn']))
	{	
	
		if(!empty($_POST['user_list']))
		{ 
			
			for($i=0;$i< count($_POST['user_list']);$i++)
			{ 
				$sql="UPDATE ".$_SESSION[SITE]['DBPF']."courses SET display_status='no' , status='f' where id ='".$_POST['user_list'][$i]."'";
					
					
				if(mysqli_query($conn, $sql))
				{  
					$delete_erorr="<div id='ajaxResponse' class='col-md-12 alert alert-success display-show'><button class='close' data-close='alert'></button><i class='fa fa-check'></i>&nbsp; Record has been deleted sucessfully.</div>";
				}
			}
		}
		else
		{
			
		$delete_erorr="<div id='ajaxResponse' class='col-md-12 alert alert-danger display-show'><button class='close' data-close='alert'></button><i class='fa fa-warning'></i>&nbsp; Please select record to delete</div>";
		}
	
	}
?>  

<div class="page-fixed-main-content">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<i class="icon-settings font-dark"></i>
						<span class="caption-subject bold uppercase">Courses</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-12">
								<div class="btn-group pull-right">
									<button id="sample_editable_1_new" class="btn sbold green" onClick="window.location.href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=add-course'"> Add New
										<i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
							 
						</div>
						</div>
						
                    
                    <div class="portlet-body form">
		       		<form role="form" method="post">
					<div class="form-body">
                    
                    
              
             
					
					
					
					<?php  echo $delete_erorr ; ?>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"role="grid" aria-describedby="sample_1_info" id="dataList">
                    	<thead>
							<tr>
                            <th>Select</th>
								<th>
									ID
								</th>
                                <th>Course </th>
								
                                <th> Action </th>
								
							</tr>
						</thead>
						<tbody>
<?php
    $sql="SELECT * from ".$_SESSION[SITE]['DBPF']."courses   where display_status='yes' AND status = 't' order by id desc";
	  $result=mysqli_query($conn,$sql);
       while ($row=mysqli_fetch_assoc($result))
       {
		  $office_name='';
		  $section_name='';
		  
	   		
			if(array_key_exists($row['designation'],$designation_id))
			{
			    $designation_name=$designation_id[$row['designation']];
			} 				
?>                        
                            <tr class="odd gradeX">
                                <td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type=checkbox     class="checkboxes" name="user_list[]" value=<?php echo $row['id'] ;  ?> ><span></span></label></td>
								<td><?php echo $row['id'] ; ?></td>
                                <td> <?php echo ucfirst($row['name']); ; ?></td>
								
                                
                                <td> <div class="btn-group aitsmsbt">
										<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right aitsmsUL" role="menu">
											<li>
												<a href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=add-course&id=<?php echo $row['id']?>' >
													<i class="icon-docs"></i> Edit </a>
											</li>
											<?php /*?><li>
												<a href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=assign-role&id=<?php echo $row['id'] ; ?>' >
													<i class="icon-tag"></i> Assign Role </a>
											</li><?php */?>
                                            <li>
												<a href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=add-lesson&cid=<?php echo $row['id'] ; ?>' >
													<i class="icon-tag"></i> Add lesson </a>
											</li>
											
										</ul>
									</div>  </td>
								
							</tr>

							
							
							
	<?php  }  ?>						
							
							
						</tbody>
					</table>
                    
                    
                    <div class="row">
                      <div class="form-group col-md-12">
			            <div class="form-actions right">
			            	<button type="submit" onclick="return window.confirm('Are you sure you want to delete selcted row')" class="btn green pull-right" name="delete_btn">Delete</button>
			          </div>
                    </div>
                   </div>
            
            
                    </form>
                    
                 
                   
                    
                    </div>
				</div>
				<?php /*?><div class="row">
					<div class="col-md-5 col-sm-5">
						<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 5 of 25 records</div>
					</div>
					<div class="col-md-7 col-sm-7" align="right">
						<div class="dataTables_paginate paging_bootstrap_full_number">
							<ul class="pagination" style="visibility: visible;">
								<li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
								<li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
								<li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li>
								<li><a href="#">4</a></li><li><a href="#">5</a></li>
								<li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
								<li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li></ul>
						</div>
					</div>
				</div><?php */?>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>

<!--<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body"> Are you sure you want to disable this customer? </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn green" data-dismiss="modal">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!--
    
     /.modal-dialog -->
</div>
<script type="text/javascript">
var TableDatatablesManaged2 = function() {
    var t = function() {
            var table_id='dataList';
			var e = $("#"+table_id);

			var lastCol=5;
			try{ lastCol=$('#'+table_id+' thead th').length-1; } catch(e){}

            e.dataTable({
                language: {
                    aria: {sortAscending: ": activate to sort column ascending",sortDescending: ": activate to sort column descending"},
                    emptyTable: "No record found",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    infoEmpty: "",//no record found
                    infoFiltered: "",//(filtered1 from _MAX_ total records)
                    zeroRecords: "No matching records found",
                },
				bLengthChange: false,
				bStateSave: !1,
				ordering:false,
                pageLength: 25,
                pagingType: "bootstrap_full_number",
                columnDefs: [{orderable: !1,targets: [0,1,2,3,4]},{searchable: !1,targets: [lastCol]}]
            });
            jQuery("#"+table_id+"_wrapper");
        }
    return {
        init: function() {
            jQuery().dataTable && (t())
        }
    }
}();


jQuery(document).ready(function() {
	if(App.isAngularJsApp() === !1) 
	{ 
		TableDatatablesManaged2.init()
	}
});
</script>





