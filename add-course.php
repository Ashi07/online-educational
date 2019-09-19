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

	$sql="SELECT * from ".$_SESSION[SITE]['DBPF']."courses where id='".$_REQUEST['id']."' ";
	$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result))
	{
		
	$edit_course_name=$row['name'];


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
            <label>Course Name *</label>
            <input type="text" class="form-control"  name="course" value="<?php echo $edit_course_name;?>"/>
            
            </div>
            
            
              
       
    <br><br><br>
    <div class="row">
        <div class="form-group col-md-12">
            <div class="form-actions right">
                <input type="hidden" name="course_id" id="course_id" value="<?php echo $id;?>">
                <input type="hidden" name="submit_btn" value="submit">
                <button type="button" class="btn green" name="submit" onclick="commonServerCall({csUrl:'ajax-add-course',csRespHolder:'ajaxResponseHolder',formName:'recieve_via_details',csRespField:'ajaxRespMsg',highlightMsg:'yes',csResetForm:''})">submit</button>&nbsp;
                <!--<button type="button" class="btn default">Delete</button>-->
                <button type="button" class="btn green" onclick="window.location.href='index.php?mod=Dark_Monitioring&amp;page=recieved_via_listing'">cancel</button>
                <input type="submit" id="hiddenSubmitBtn" style="display:none;" name="hiddenSubmitBtn" value="submit" />
            </div>
        </div>
    </div>
  </form>
 </div>
</div>

<script text="javascript">





</script>