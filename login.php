<?php
include("includes/config/config.php"); 
$error_message='';


if(!empty($_REQUEST['action']) && $_REQUEST['action']=="logout")
{
	$_SESSION[SITE]['USERID']='';
	$_SESSION[SITE]['USERTYPE']='';
	$_SESSION[SITE]['USER_FIRSTNAME']='';
	$_SESSION[SITE]['MODULES_ACCESS']='';
	header("location: login".$_SESSION[SITE]['EXT']);
}

if(!empty($_POST))
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$user=$_POST['username'];
	    $login_pass=$_POST['password'];
		
		$user_id='';
		$site_user_type='';
		$user_name='';
		$sql="SELECT id,name,password from ".$_SESSION[SITE]['DBPF']."user where name='".$user."' and password='".$login_pass."' ";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
	    	$user_id=$row['id'];
	    	$site_user_type=$row['site_user_type'];
			$user_type=$row['user_type'];
	    	$user_name=$row['user_name'];
		}
		$form_name_array=array();
		 
		 if(mysqli_num_rows($result)>0)
		 {
			 if(!empty($user_id))
			 {/*
				$access_form_id='';

				$sql_user_id="SELECT access_form_ids from ".$_SESSION[SITE]['DBPF']."user_roles where user_id='".$user_id."' ";
				$result_user_id=mysqli_query($conn,$sql_user_id);
				while($row_user_id=mysqli_fetch_assoc($result_user_id))
				{
					$access_form_id=$row_user_id['access_form_ids'];
				}
				
				if($access_form_id)
				{
					$sql_access_id="SELECT access_form_ids from ".$_SESSION[SITE]['DBPF']."roles where id IN (".$access_form_id.")  ";
					$result_access_id=mysqli_query($conn,$sql_access_id);
					
					while($row_access_id=mysqli_fetch_assoc($result_access_id))
					{
					
						$form_id=$row_access_id['access_form_ids'];
						$name_array = explode(",",$form_id);
					
						for($i=0;$i< count($name_array);$i++)
						{
							if(!empty($name_array[$i]))
							{
								$sql_access_name="SELECT short_name from ".$_SESSION[SITE]['DBPF']."forms where id = ".$name_array[$i]."  ";
								$result_access_name=mysqli_query($conn,$sql_access_name);
								while($row_access_name=mysqli_fetch_assoc($result_access_name))
								{
								
									$form_name=$row_access_name['short_name'];
									array_push($form_name_array,$form_name);
							   
								}
							}
						}
					}
				}
			//print_r($form_name_array);
			*/}
			$new_array=array();
			$new_access="enquiry";
			array_push($new_array,$new_access);
			$_SESSION[SITE]['USERID']=$user_id;
			$_SESSION[SITE]['USERTYPE']=$site_user_type;
			$_SESSION[SITE]['USERTYPE_EMP']=$user_type;
			$_SESSION[SITE]['MODULES_ACCESS']=$form_name_array;
			$_SESSION[SITE]['MODULES_ACCESS_EMP']=$new_array;
			$_SESSION[SITE]['USER_FIRSTNAME']=$user_name;
			
		  	header("location: index".$_SESSION[SITE]['EXT']);
		}
		else
		{
			$error_message="Invalid login details";
		}
		
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $_SESSION[SITE]['SITE_NAME'];?></title>

        <meta name="GOOGLEBOT" content="noindex,nofollow" >
        <meta name="ROBOTS" content="noindex,nofollow" >

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #6 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />


        <link href="includes/css/aits-custom.css?t=<?php echo time();?>" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo" style="margin-bottom:0px;">
            <a href="login.php" style="color:#55c5eaeb;">
                <img src="assets/layouts/layout6/img/forest-logo.png" alt="" /> <!--<h1>Van Vibhag Logo</h1>--> </a>
        </div>
        <div class="text-center">
        <h4 style="color:#eee">Van Vibhag</h4>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" name="loginform" method="post">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <?php
				if(!empty($error_message))
				{
					echo '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>'.$error_message.'</span></div>';
				}
				?>

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
				<?php /*?><div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Account Type</label>
                    <select name="usertype" id="usertype" class="select2 form-control">
                        <!-- <option value=""></option> -->
                        <option value="admin">Admin</option>
                        <!--<option value="customer">Customer</option>-->
					</select>
				</div><?php */?>
						
						
                <div class="form-actions">
					<!--
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
					-->
                    <?php /*?><button type="submit" class="btn green pull-right"> Login </button><?php */?>
                    <input type="submit" name="submitBtn" id="submitBtn" value="Login" class="btn green pull-right">
                </div>
                
				<div class="forget-password">
					<!--
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click
                        <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p> -->
                </div>
                
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
			<!--
            <form class="forget-form" action="index.html" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>
			-->
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> <?php echo date('Y')." &copy; ".$_SESSION[SITE]['SITE_NAME'];?> </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>