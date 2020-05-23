					<?php
					//Gump is libarary for Validatoin
					
					if(isset($_POST['name'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'fname'    	  => 'required|max_len,100|min_len,2',
						'lname'    	  => 'required|max_len,100|min_len,2',
						'oname'    	  => 'required|max_len,100|min_len,2',
						'tel'         =>'required|max_len,100|min_len,3',
						'email'       =>'required|max_len,100|min_len,3',
						'category'    =>'required|max_len,300|min_len,3',
					));
				
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysql_escape',
						'exp_date'     => 'trim|sanitize_string|mysql_escape',
						'amount'    => 'trim|sanitize_string|mysql_escape',
						'category'    => 'trim|sanitize_string|mysql_escape',
						
					));
				
					$validated_data = $gump->run($_POST);
					$name 		= "";
					$exp_date 	= "";
					$amount	= "";
					$category 	= "";								

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$name=mysql_real_escape_string($_POST['name']);
							$exp_date=mysql_real_escape_string($_POST['exp_date']);
							$amount=mysql_real_escape_string($_POST['amount']);
							$category=mysql_real_escape_string($_POST['category']);
				
						?>
	
                     <?php
                             
				
			if($db->query("insert into expenses values(NULL,'$name','$category','$amount','$exp_date')"))
			{
                         $msg="$category  has been Recorded Successfully to Expenses" ;
                        }
			else
			echo "<br><font color=red size=+1 >Problem in Adding Expense!</font></br>" ;
			
			
			
			
			}
							
							}
						
				//Gump is libarary for Validatoin
                                         if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:red;font-family:font-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
 <script  type="text/javascript">
	
	$(document).ready(function() {
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				host: {
					required: true,
					minlength: 3
				},
				username: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				host: {
					required: "Please Enter The Host",
					minlength: "Your Host must consist of at least 3 characters"
				},
				username: {
					required: "Please Enter The User Name",
					minlength: "Your User Name must be at least 3 characters long"
				}
			}
		});
	
	});

	</script>
			
                <?php
				echo $msg;
                                         }
				?>						
</script>		
				
<div class="col-md-12" style=" background:white; border-radius: 5px;">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
				  <li class="active"><a href="dashboard.php?action=people">Add Focal Person</a></li>
				  <li class=""><a href="dashboard.php?action=add_official">Add Official</a></li> 
                  </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Add a District/ Institution HRIS User</h5>
                </div>
<div class="col-md-4">
				<form name="" method="post" action="">
		            <div id="">
                      <label>Surname: *</label> 
                      <input class="form-control" name="lname" id="lname" placeholder="Enter Surname" type="text" autofocus required>
					</div>
				   <div id="">
					  <label>First Name: *</label>
                      <input class="form-control" name="fname" id="fname" placeholder="Enter First Name" type="text" autofocus required>
				   </div>
				   <div id="">
					  <label>Other Names:</label>
                      <input class="form-control" name="oname" id="oname" placeholder="Enter Other Names" type="text">
				   </div>
				   <div id="">
                      <label>Telephone: *</label>
				      <input class="form-control" name="tel" id="tel" placeholder="Enter Telephone Number" type="tel" autofocus required>
			       </div>
				    <div id="">
                      <label>Email: </label> 
                      <input class="form-control" name="email" id="email" placeholder="Enter Surname" type="email">
					</div>
				   <div id="">
					  <label>Facility / Institution: *</label>
                      <input class="form-control" name="facilty" id="facility" placeholder="Search and Select" type="text">
				   </div>
</div>
<div class="col-md-4">
        <div class="box-body">
				    <div id="">
					  <label>Position: *</label>
                      <input class="form-control" name="fname" id="fname" placeholder="Enter First Name" type="text">
				   </div>
				   <div id="">
					  <label>User Type:</label>
                       <select name="category" class="form-control">
							  <option value="Focal Person">Focal Person</option>
							  <option value="Others">Others</option>
                       </select>
				   </div>
				   <div id="">
					  <label>Notes: *</label>
				   <textarea class="form-control" name="name" placeholder="Enter Description" ></textarea>
				   </div>
				   <div id="footer-buttons" style="clear:both; margin-top:7px; margin-bottom:7px;">
                     <button  class="btn btn-primary" type="submit" >Add User</button>
					 <input class="btn btn-danger"  type="reset" value="Reset Form" name="Reset">
                     </form>
				   </div>
				</div>
</div>
<div class="col-md-4">
</div>
</div>
</div>