<?php
include("db.php");
$err = "";
$notable ="";

$sql = mysql_query("SELECT * FROM networking WHERE flipflag = 3");

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
 <div class="col-xs-12">
          <!-- general form elements -->

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">FIRST GENERATION NETWORK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>First Generation</th>
                </tr>
                </thead>
                <tbody>
<?php
while($row = mysql_fetch_array($sql))
{
?>
                <tr>
                  <td><?php echo $row['id'].'.'.' '.strtoupper($row['firstname']).' '.strtoupper($row['lastname']); ?></td>
                  <td>
<?php
$pid = $row['id'];
$ss = mysql_query("SELECT * FROM networking WHERE firstgen='$pid'");
while($rw = mysql_fetch_array($ss))
{
  echo $rw['id'].'.'.' '.strtoupper($rw['firstname']).' '.strtoupper($rw['lastname']).'<br />';
}
?>
                  </td>
                </tr>
<?php
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>First Generation</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->  
</div>
  





</div>
     
    </section>
    <!-- /.content -->
  </div>
  <?php
include("footer.php");
?>
