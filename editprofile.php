<?php
include("db.php");
$err = "";
$notable ="";
if(!isset($_GET['pid']))
{
 header("location:dashboard.php");
}
$pid = $_GET['pid'];
$updatesql1 = mysql_query("SELECT * FROM networking WHERE id='$pid'") or die(mysql_error());
if(mysql_num_rows($updatesql1) >'0')
{
 $updatesql = mysql_fetch_array($updatesql1);
}else{
 header("location:dashboard.php");
}

if(isset($_POST['sub']))
{

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$bank = $_POST['bank'];
$acctno = $_POST['acctno'];
$hideid = $_POST['hideid'];
if(empty($acctno))
{
 $err = "account number is required";
}

if(empty($bank))
{
 $err = "bank name is required";
}

if(empty($phone))
{
 $err = "phone number is required";
}

if(empty($lname))
{
 $err = "last name is required";
}

if(empty($fname))
{
 $err = "first name is required";
}



if(empty($acctno))
{
 $err = "first name is required";
}

if(empty($err))
{
$sql = mysql_query("UPDATE networking SET firstname='$fname',lastname='$lname',telephone='$phone',bank='$bank',bankno='$acctno' WHERE id='$hideid'");
$suc = "Successfully updated";
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?pid<?php echo $_GET['pid']; ?>" method="POST">
<div style="color:red;margin-left:16px;"><b><?php echo $err; ?></b></div>   
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First name:</label>
                  <input type="text" class="form-control" id="" name="fname" placeholder="First Name" value="<?php echo $updatesql['firstname']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last name</label>
                  <input type="text" class="form-control" id="" placeholder="Last Name" name="lname" value="<?php echo $updatesql['lastname']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="text" class="form-control" id="" placeholder="Telephone" name="phone" value="<?php echo $updatesql['telephone']; ?>">
                </div>
 <div class="form-group">
                  <label for="exampleInputPassword1">Bank Name</label>
                  <input type="text" class="form-control" id="" placeholder="Bank Name" name="bank" value="<?php echo $updatesql['bank']; ?>">
                </div>
 <div class="form-group">
                  <label for="exampleInputPassword1">Account Number</label>
                  <input type="text" class="form-control" id="" placeholder="Account Number" name="acctno" value="<?php echo $updatesql['bankno']; ?>">
                </div>
<input type="hidden" name="hideid" value="<?php echo $_GET['pid']; ?>" />
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
		<input type="submit" name="sub" class="btn btn-primary" value="Update"/>
              </div>
            </form>
          </div>
  
</div>
  





</div>
     
    </section>
    <!-- /.content -->
  </div>
  <?php
include("footer.php");
?>
