<?php
include("db.php");
$err = "";
$notable ="";
if(!isset($_GET['pid']))
{
 header("location:index.php");
}

$pid = $_GET['pid'];

$sqlpid = mysql_query("SELECT * FROM network WHERE firstgen ='$pid'") or die(mysql_error());
if(mysql_num_rows($sqlpid) > '0'){
   $showtable = "1";
 }else{
  $notable = "No direct downliners";
 }

if(isset($_POST['sub']))
{
 $getId = $_POST['pid'];
 $fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$bank = $_POST['bank'];
$acctno = $_POST['acctno'];



$check = mysql_query("SELECT * FROM network WHERE id='$getId'");
$checka = mysql_fetch_array($check);
$f = $checka['firstgen'];
$s = $checka['secgen'];
$t = $checka['thirdgen'];

$checko = mysql_query("SELECT * FROM network WHERE firstgen='$getId' AND secgen='$f' AND thirdgen='$s' AND fourthgen='$t'");

if(mysql_num_rows($checko) <= '2')
{
$sql = mysql_query("INSERT INTO network(firstname,lastname,telephone,bank,bankno) VALUES('$fname','$lname','$phone','$bank','$acctno')");
$getlastid = mysql_insert_id();
$g = mysql_query("SELECT * FROM network WHERE id='$getId'");
$gget = mysql_fetch_array($g);
$secgen = $gget['firstgen'];
$thirdgen=$gget['secgen'];
$fourthgen = $gget['thirdgen'];
$gg = mysql_query("UPDATE network SET firstgen='$getId',secgen='$secgen',thirdgen='$thirdgen',fourthgen='$fourthgen' WHERE id='$getlastid'");
}else{
$err = "This user already has 3 direct downliners";
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
              <h3 class="box-title">Add a New Downliner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?pid=<?php echo $_GET['pid']; ?>" method="POST">
<div style="color:red;margin-left:16px;"><b><?php echo $err; ?></b></div>   
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First name:</label>
                  <input type="text" class="form-control" id="" name="fname" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last name</label>
                  <input type="text" class="form-control" id="" placeholder="Last Name" name="lname">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="text" class="form-control" id="" placeholder="Telephone" name="phone">
                </div>
 <div class="form-group">
                  <label for="exampleInputPassword1">Bank Name</label>
                  <input type="text" class="form-control" id="" placeholder="Bank Name" name="bank">
                </div>
 <div class="form-group">
                  <label for="exampleInputPassword1">Account Number</label>
                  <input type="text" class="form-control" id="" placeholder="Account Number" name="acctno">
                </div>
<input type="hidden" name="pid"  value="<?php echo $_GET['pid']; ?>" />
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
		<input type="submit" name="sub" class="btn btn-primary" value="Submit"/>
              </div>
            </form>
          </div>
  
</div>
  

 <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">My Downliners</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<span style="color:blue"><?php echo $notable; ?></span> 
              <table class="table table-bordered">
			<tr>
				<th>First name</th>
				<th>Last Name</th>
				<th>Telephone</th>
				<th>Control Panel</th>
			</tr>
<?php
while($row = mysql_fetch_array($sqlpid))
{
?>
<tr>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['telephone']; ?></td>
				<td><a href="getnetworks.php?nhblie=<?php echo $row['id']; ?>">View</a> | <a href="editprofile.php?id=<?php echo $row['id']; ?>">Edit</a>| <a href="cdownliners.php?pid=<?php echo $row['id']; ?>">Add Downliner</a></td>
</tr>

<?php
}
?>
              </table>
            </div>
            <!-- /.box-body -->
           
          </div>
<?php
$sqlpid = mysql_query("SELECT * FROM network WHERE id ='$pid'") or die(mysql_error());
$rx = mysql_fetch_array($sqlpid);
?>
<div class="row">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <h3 class="widget-user-username"><?php echo $rx['firstname'].' '.$rx['lastname']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $rx['telephone'] ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><b>Bank Name</b><span class="pull-right"><b><?php echo $rx['bank']; ?></b></span></a></li>
                <li><a href="#"><b>Account Number</b><span class="pull-right"><b><?php echo $rx['bankno']; ?></b></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
</div>


</div>
     
    </section>
    <!-- /.content -->
  </div>
  <?php
include("footer.php");
?>
