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
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
				<span style="color:red"><?php echo $err; ?></span>                         
 	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?pid=<?php echo $_GET['pid']; ?>" method="POST">
		First name: <input type="text" name="fname" /><br />
Last name: <input type="text" name="lname" /><br />
Telephone: <input type="text" name="phone" /><br />
Bank: <input type="text" name="bank" /><br />
Account no: <input type="text" name="acctno" /><br />
   <input type="hidden" name="pid"  value="<?php echo $_GET['pid']; ?>" />
		<input type="submit" name="sub" />
	</form>
				<span style="color:blue"><?php echo $notable; ?></span>                         
	<?php
		if(isset($showtable) && $showtable ==1)
		{
	?>       
		<table border="1" width="100%">

			<tr>
				<td>First name</td>
				<td>Last Name</td>
				<td>Telphone</td>
				<td>Bank</td>
				<td>Account Number</td>
				<td>Control Panel</td>
			</tr>
<?php
while($row = mysql_fetch_array($sqlpid))
{
?>
	

			<tr>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['telephone']; ?></td>
				<td><?php echo $row['bank']; ?></td>
				<td><?php echo $row['bankno']; ?></td>
				<td><a href="getnetwork.php?nhblie=<?php echo $row['id']; ?>">View</a> | <a href="editprofile.php?id=<?php echo $row['id']; ?>">Edit</a>| <a href="cdownliner.php?id=<?php echo $row['id']; ?>">Add Downliner</a></td>
			</tr>
<?php
}
?>

		</table>
	<?php
	}
	?>
    </body>
</html>

