<?php
include("db.php");
$err = "";
if(!isset($_GET['nhblie']))
{
  header("location:index.php");
}

$getid = $_GET['nhblie'];

$sql = mysql_query("SELECT * FROM network WHERE firstgen ='$getid'") or die(mysql_error());

if(mysql_num_rows($sql) == '0'){
  $err = "No record found";
 }else{
   $check = true;
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    				<span style="color:red"><?php echo $err; ?></span> 
 <table border="1" width="100%">
<?php
if(isset($check))
{
$i = 1;
while($row = mysql_fetch_array($sql))
{
?> 
 <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><a href="">View </a></td>
 </tr>

<?php
$i = $i + 1;
}
}
?>                      
</table>
    </body>
</html>
