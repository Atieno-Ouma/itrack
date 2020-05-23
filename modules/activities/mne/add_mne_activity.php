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
				  <li class="active"><a href="dashboard.php?action=start_mne_activity">Start an M&E Activity</a></li>
				  <li class=""><a href="dashboard.php?action=start_hris_activity">Start an HRIS Activity</a></li> 
                 </ul>
				</div>
                               
                <div class="box-header with-border">
                  <h5 class="box-title">Start Activity</h5>
                </div>
<div class="col-md-4">
				<form name="" method="post" action="">
				<div class="form-group">
		        	<div id="">
                      <label>Start Date: *</label> 
                      <input class="form-control" name="sdate" id="date1" placeholder="" type="text" autofocus required>
					</div>
					<div id="">
					<label>End Date *</label> 
                      <input class="form-control" name="edate" id="date2" placeholder="" type="text" autofocus required>
					</div>
				</div>
				<div class="form-group">
				<div id="">
					  <label>Activity Title: *</label>
                      <input class="form-control" name="title" id="title" value="" placeholder="Search and Select Official's Name"type="text" autofocus required>
				   </div>
				   <div id="">
					  <label>Team Leader: *</label>
                      <input class="form-control" name="fname" id="name" value="" placeholder="Search and Select Official's Name"type="text" autofocus required>
				   </div>
				   <div id="">
					  <label>Accompanying Official 1:</label>
                      <input class="form-control" name="oname" id="name" value="" placeholder="Search and Select Official's Name" type="text">
				   </div>
				   <div id="">
                      <label>Accompanying Official 2:</label>
				      <input class="form-control" name="tel" id="name" value="" placeholder="Search and Select Official's Name" type="text" autofocus required>
			       </div>
					<div id="">
                      <label>Accompanying Official 3:</label>
				      <input class="form-control" name="tel" id="name" placeholder="Enter Telephone Number" type="tel" autofocus required>
			       </div>
				</div>
				<div class="form-group">
					<div id="">
                      <label>Facility Under Monitoring 1: *</label> 
                      <input class="form-control" name="facility1" value="" placeholder="Search and Select the Facility's Name" type="text">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 2:</label> 
                      <input class="form-control" name="facilty2" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
				</div>			
				
</div>
<div class="col-md-4">
        <div class="box-body">
		        <div class="form-group">
				    <div id="">
                      <label>Facility Under Monitoring 3:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 4: *</label> 
                      <input class="form-control" name="facility1" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 5:</label> 
                      <input class="form-control" name="facilty2" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 6:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 7:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 8:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 9:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 10:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 11:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>	
				</div>
		</div>
</div>
<div class="col-md-4">
        <div class="box-body">
		        <div class="form-group">
					<div id="">
                      <label>Facility Under Monitoring 12:</label> 
                      <input class="form-control" name="facility1" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 13:</label> 
                      <input class="form-control" name="facilty2" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 14:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
					<div id="">
                      <label>Facility Under Monitoring 15:</label> 
                      <input class="form-control" name="facilty3" value="" placeholder="Search and Select the Facility's Name" type="txet">
					</div>
				</div>
				<div class="form-group">
					<div id="">
                      <label>Supervisor:</label> 
                      <input class="form-control" name="supervisor" value="" placeholder="Search and Select the Supervisor's Name" type="txet">
					</div>
					<div id="">
                      <label>Terms of Reference (.doc/pdf):</label> 
                      <input type="file" name="tor" value="" class="form-control" style="border: 2px solid #878E63; border-radius:5px;">
					</div>
					<div id="">
                      <label>Activity Form (.doc/pdf):</label> 
                      <input type="file" name="tor" value="" class="form-control" style="border: 2px solid #878E63; border-radius:5px;">
					</div>
					<div id="">
                      <label>Supervisor Notes:</label> 
                      <textarea class="form-control" name="snotes" value="" cols="5"></textarea>
					</div>
				</div>
				   <div id="footer-buttons" style="clear:both; margin-top:7px; margin-bottom:7px;">
                     <button  class="btn btn-primary" type="submit" >Launch Now</button>
					 <input class="btn btn-danger"  type="reset" value="Reset Form" name="Reset">
                     </form>
				   </div>
	    </div>
</div>
</div>
</div>