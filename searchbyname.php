<?php
include("db.php");
$err = "";
if(isset($_POST['sub']))
{
 $getId = $_POST['search'];

 $sql = mysql_query("SELECT * FROM networking WHERE firstname LIKE '%$getId%' OR lastname LIKE '%$getId%'");
 
 if(mysql_num_rows($sql) > '0'){
    //$row = mysql_fetch_array($sql);
   $showtable = "1";
 }else{
  $err = "No record found";
 }
}
?>

<?php
include("head.php");
?>
<div class="wrapper">

 <?php
include("nav.php");
include("sidebar.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Network Matrix
        <small>Network Analysis</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
 <div class="col-md-6">
          <!-- general form elements -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Search User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="POST">
<div style="color:red;margin-left:16px;"><b><?php echo $err; ?></b></div>   

              <div class="box-body">


                <div class="form-group">
                  <label for="exampleInputEmail1">Search by name:</label>
                  <input type="text" class="form-control" id="" name="search" placeholder="Enter search name" value="<?php echo empty($_POST['search'])? "":$_POST['search']; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
		<input type="submit" name="sub" class="btn btn-primary" value="Submit"/>
              </div>
            </form>
          </div>
  
</div>
  

 
<?php
		if(isset($showtable) && $showtable ==1)
		{
	?>     
<div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Searched Item: <span style="color:red"><?php echo $getId ?></span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  
		<table  class="table table-bordered">
<tr>
				<th>Reg No</th>
				<th>First name</th>
				<th>Last Name</th>
				<th>Telephone</th>
				<th>Control Panel</th>
			</tr>
<?php
while($row = mysql_fetch_array($sql))
{
?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
					<td><?php echo $row['telephone']; ?></td>
				<td colspan="2"><a href="getnetwork.php?nhblie=<?php echo $row['id']; ?>">View</a> | <a href="editprofile.php?pid=<?php echo $row['id']; ?>">Edit</a>| <a href="cdownliners.php?pid=<?php echo $row['id']; ?>">Add Downliner</a></td>
			</tr>
<?php
}
?>

		</table>
            </div>
            <!-- /.box-body -->
           
          </div>

	<?php
	}
	?>
            


</div>
   </div>  
    </section>
    <!-- /.content -->
  </div>
  <?php
include("footer.php");
?>
