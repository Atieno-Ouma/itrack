    <html>
	     <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="dashboard.php?action=view_expenses">View Expenses</a></li>
                  <li><a href="dashboard.php?action=add_expenses">Add Expenses</a></li>
                  <li><a href="dashboard.php?action=manage_expenses">Manage Expenses</a></li>
                </ul>
				</div>
		  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Expenses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="mydata" class="table hover">
                    <thead>
                      <tr style="background:url(images/thead.png) 0 0 no-repeat; color:white;">
                        <th>Description</th>
						<th>Category</th>							
						<th>Amount</th>
						<th>Date</th>
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
                       <td><?php echo $row['description']; ?></td>
                       <td> <?php echo $row['category']; ?></td>
                       <td> <?php echo $row['amount'];?></td>
                       <td> <?php echo $row['date'];?></td>
                    </tr>
					<?php  } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</html>