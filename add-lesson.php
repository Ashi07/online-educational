
<?php
	$delete_erorr="";
	
	if(isset($_POST['delete_btn']))
	{	
	
		if(!empty($_POST['user_list']))
		{ 
			
			for($i=0;$i< count($_POST['user_list']);$i++)
			{ 
				$sql="UPDATE ".$_SESSION[SITE]['DBPF']."lessons SET display_status='no' , status='f' where id ='".$_POST['user_list'][$i]."'";
					
					
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

<style>
.deletebutton a{
	color:#fff;
	}
	
	.deletebutton a:hover{
		text-decoration:none;
		}
</style>


<?php

$recieved_id='';

$office_type='';






if(!empty($_REQUEST['id']))
{
	
	$id=$_REQUEST['id'];

	$sql="SELECT * from ".$_SESSION[SITE]['DBPF']."lessons where id='".$_REQUEST['id']."' ";
	$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result))
	{
		
	$edit_lesson_name=$row['name'];


	}
	
	
}


?>






<div class="portlet light bordered">
			
<div class="portlet-title">
					<div class="caption font-dark">
						<i class="icon-settings font-dark"></i>
						<span class="caption-subject bold uppercase">Add Course</span>
					</div>
				
						
        </div>
         <div class="table-toolbar">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group pull-right">
                        <button id="sample_editable_1_new" class="btn sbold green" onclick="window.location.href='index.php?mod=manage-user&amp;page=course-listing'"><i class="fa fa-long-arrow-left"></i> back to list</button>
                    </div>
                </div>
            </div>
        </div>
    
    <div id="ajaxResponse">
    
    </div>
    
    <div class="portlet-body form">
    <div class="row">

    	<form role="form" name="recieve_via_details" id="recieve_via_details" method="POST">
    	<div class="form-body">
        <div id="ajaxResponseHolder">
        </div>
        	
            
          
            
        	<div class="form-group col-md-4">
            <label>Lesson Name *</label>
            <input type="text" class="form-control"  name="lesson" value="<?php echo $edit_lesson_name;?>"/>
            
            </div>
            
            
              
       
    <br><br><br>
    <div class="row">
        <div class="form-group col-md-12">
            <div class="form-actions right">
                <input type="hidden" name="lesson_id" id="lesson_id" value="<?php echo $id;?>">
                <input type="hidden" name="course_id" id="course_id" value="<?php echo $_REQUEST['cid'];?>">
                <input type="hidden" name="submit_btn" value="submit">
                <button type="button" class="btn green" name="submit" onclick="commonServerCall({csUrl:'ajax-add-lesson',csRespHolder:'ajaxResponseHolder',formName:'recieve_via_details',csRespField:'ajaxRespMsg',highlightMsg:'yes',csResetForm:''})">submit</button>&nbsp;
                <!--<button type="button" class="btn default">Delete</button>-->
                <button type="button" class="btn green" onclick="window.location.href='index.php?mod=Dark_Monitioring&amp;page=recieved_via_listing'">cancel</button>
                <input type="submit" id="hiddenSubmitBtn" style="display:none;" name="hiddenSubmitBtn" value="submit" />
            </div>
        </div>
    </div>
    
    
    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"role="grid" aria-describedby="sample_1_info" id="dataList">
                    	<thead>
							<tr>
                            <th>Select</th>
								<th>
									ID
								</th>
                                <th>Lesson </th>
								
                                <th> Action </th>
								
							</tr>
						</thead>
						<tbody>
<?php
    $sql="SELECT * from ".$_SESSION[SITE]['DBPF']."lessons   where display_status='yes' AND status = 't' order by id desc";
	  $result=mysqli_query($conn,$sql);
       while ($row=mysqli_fetch_assoc($result))
       {
		  				
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
												<a href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=add-lesson&cid=<?php echo $_REQUEST['cid']?>&id=<?php echo $row['id']?>' >
													<i class="icon-docs"></i> Edit </a>
											</li>
											<?php /*?><li>
												<a href='index<?php echo $_SESSION[SITE]['EXT']; ?>?mod=manage-user&page=assign-role&id=<?php echo $row['id'] ; ?>' >
													<i class="icon-tag"></i> Assign Role </a>
											</li><?php */?>
                                            
											
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

<script text="javascript">





</script>