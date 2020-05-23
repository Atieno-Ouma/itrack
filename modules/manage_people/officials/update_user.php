<?php include_once("../../engine/common_js.php"); ?>
<?php include_once("../../init.php");?>
	<script src="js/script.js"></script>  
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
	
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				amount: {
					minlength: 3,
					maxlength: 500
				}
			},
			messages: {
				name: {
					required: "Please enter a Expenditure Description",
					minlength: "Supplier must consist of at least 3 characters"
				},
				amount: {
					minlength: "Supplier Address must be at least 3 characters long",
					maxlength: "Supplier Address must be at least 3 characters long"
				}
			}
		});
	
	});

	</script>

</head>
<?php
if(isset($_POST['id']))
            {
			$name=mysql_real_escape_string($_POST['name']);
			$exp_date=mysql_real_escape_string($_POST['exp_date']);
			$amount=mysql_real_escape_string($_POST['amount']);
			$category=mysql_real_escape_string($_POST['category']);
			$id=mysql_real_escape_string($_POST['id']);	
			if($db->query("UPDATE `expenses` SET description='$name',category='$category',amount='$amount',date='$exp_date' where expenses.id=$id"))
                        {	
                        $data=" $name $category Updated" ;
				                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
															header("location:../../dashboard.php?action=manage_expenses");
                                            ?>
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', '');
			
</script>
                                                        <?php
                        }
			else
			echo "<br><font color=red size=+1 >Problem in Updating Category !</font>" ;
			
			
			}
				
				?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
<div class="col-md-12">
	           <div class="box box-primary">
			   <h4>Update Expense</h4>
				</div>
				<form name="form1" method="post" id="form1" action="">
				<?php 
				if(isset($_GET['sid']))
				$id=$_GET['sid'];
			
				$line = $db->queryUniqueObject("SELECT *FROM `expenses`  WHERE id='$id'");
				?>
				<input type="hidden" class="form-control" name="id" value="<?php echo $line->id;?>"></td>
				<div class="box-body">
				 <div class="form-group">
                  <label>Description:</label>
				  <div class="">
                    <input type="text" class="form-control" name="name" value="<?php echo $line->description;?>">
					 </div>
					 </div>
					 <div class="form-group">
					 <label>Date:</label>
					 <div class="input-group">
                      <input class="form-control" name="exp_date" id="expense_date" value="<?php echo $line->date; ?>" placeholder="Pick the Date of Expenditure" type="text">
					  </div>
					  </div>
					 <div class="form-group">
                     <label>Amount UGX:</label>
					 <div class="input-group">
					 <input class="form-control" name="amount" id="amt" value="<?php echo $line->amount; ?>" placeholder="Enter the Cost" type="text">
					 </div>
					 </div>
			</div
					  <div class="form-group">
                      <label>Expense Category:</label>
					   <div class="input-group">
                       <select name="category" class="form-control">
                            <?php 
							$sql = mysql_query("SELECT * FROM expense_category");
		                      $i=0;
							  while ($list=mysql_fetch_array($sql))
							  {
							  $i++; ?>
							  <option value="<?php  echo $list['category']; ?>"> <?php  echo $list['category']; ?>
							  </option>
							  <?php } ?>
                       </select>
					   </div>
					   </div>
					   <div class="box-footer">
					   <div class="form-group">
                       <button  class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save">Update</span></button>
					   </div>
					
                </form>
				 </div>
		    </div>
		</div>