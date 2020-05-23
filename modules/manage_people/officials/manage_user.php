    <html>
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit(id,table,dreturn)
{ 	     jConfirm('You Want Delete from Expenses', 'Confirmation Dialog', function (r) {
           if(r){ 
               console.log();
                $.ajax({
  			url: "universal_funcs/delete.php",
  			data: { id: id, table:table,return:dreturn},
  			success: function(data) {
    			window.location ='../dashboard.php?action=view_expenses';
    			
                        jAlert('Expense is Deleted', '');
  			}
		});
            }
            return r;
        });
}
function confirmDeleteSubmit()
{
   var flag=0;
  var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++){
    if(field[i].checked ==true){
        flag=flag+1;
        
    }
	
}
if (flag <1) {
  jAlert('You must check one and only one checkbox', '');
return false;
}else{
 jConfirm('You Want Delete from Expenses', 'Confirmation Dialog', function (r) {
           if(r){ 
	
document.deletefiles.submit();}
else {
	return false ;
   
}
});
   
}
}
function confirmLimitSubmit()
{
    if(document.getElementById('search_limit').value!=""){

document.limit_go.submit();

    }else{
        return false;
    }
}


function checkAll()
{

	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll()
{
	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
// -->
</script>
        <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
				<li class="active"><a href="dashboard.php?action=manage_expenses">Manage Expenses</a></li>
                  <li ><a href="dashboard.php?action=view_expenses">View Expenses</a></li>
                  <li><a href="dashboard.php?action=add_expenses">Add Expenses</a></li>
                  
                </ul>
				</div>
		  <div class="box">
                <div class="box-header">

                  <h3 class="box-title">Manage Expenses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<form name="deletefiles" action="universal_funcs/delete.php" method="post">
				<div class="form-group">
                <div class="input-group">
                <input type="hidden" name="table" value="expenses">
                <input type="hidden" name="return" value="../dashboard.php?action=view_expenses">
                <button type="button" name="selectall" class="btn btn-primary " onClick="checkAll()" style="margin-left:5px;"><span class="glyphicon glyphicon-ok-circle"> Select All</span></button>
                <button type="button" name="unselectall" class="btn btn-warning" onClick="uncheckAll()" style="margin-left:5px;" ><span class="glyphicon glyphicon-remove-circle"> Deselect All</span></button>
                <button name="dsubmit"  type="submit" class="btn btn-danger" style="margin-left:5px;" onClick="return confirmDeleteSubmit()"><span class="glyphicon glyphicon-trash"></span> Delete Selection</button>
                  </div></div>
				  <table id="mydata" class="table table-hover table-bordered">
                    <thead>
                      <tr style="background:url(images/thead.png) 0 0 no-repeat; color:white;">
					    <th width="45">Select</th>
                        <th>Date</th>
						<th>Description</th>
						<th>Category</th>							
						<th>Amount</th>
						<th width="45">Edit</th>
						
						
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					$sql="SELECT * FROM `expenses` ORDER By date DESC";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) 
                   {
                    ?>
                    <tr>
					    <td width="45"><input  class="btn btn-primary" type="checkbox" value="<?php echo $row['id']; ?>" name="checklist[]" id="check_box" style="width:10x; height:10px;"></td>
					   <td> <?php echo $row['date'];?></td>
                       <td><?php echo $row['description']; ?></td>
                       <td> <?php echo $row['category']; ?></td>
                       <td> <?php echo $row['amount'];?></td>
                       <td width="45"> <a href="javascript:void(0);"onclick="javascript:window.open('modules/expenses/update_expenses.php?sid=<?php echo $row['id'];?>&table=manage_expenses&return=','myNewWinsr','width=500,height=420,toolbar=0,menubar=no,status=no,resizable=no,location=no,directories=no,scrollbars=no');"><span class="glyphicon glyphicon-edit"></span></a></td>
                       
                    </tr>
					<?php  } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>
			 </form>
			 <!-- /.box -->
</html>