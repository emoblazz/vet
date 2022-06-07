<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Daily Report</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
  <style type="text/css">
    @media print {
      .card-tools, .card-title{
        display: none;
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SINHSLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include '../dist/includes/navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include '../dist/includes/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Report of Tracked Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Tracked Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list-ul mr-1"></i>
                  Tracked Lists
                </h3>
                <div class="card-tools">
                  <form method="post" action="">
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" name="start">  
                    <button class="btn btn-danger" type="button"><span>to</span></button> 
                    <input type="date" class="form-control" name="end">
                    <div class="input-group-append">
                      <button class="btn btn-success" name="generate"> <i class="fas fa-print"></i> Generate</button>
                    </div>
                    
                      <button class="btn btn-danger" type="button"><span><i class="fas fa-print"></i>Excel</span></button> 
                      <button class="btn btn-warning" type="button" onclick="window.print()"><span><i class="fas fa-print"></i>Print</span></button> 
                    
                </div>
                </form>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: right;">
                    <img src="../dist/img/logo.png" style="height: 100px;float: left">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                    <h6 style="text-align: center;">Sann Jose Veterinary Clinic</h6>
                    <h6 style="text-align: center;">Talisay City</h6>
                    <h6 style="text-align: center;">Negros Occidental</h6>
                    <h4 style="text-align: center;">Sales Report for <br> <?php if (isset($_POST['generate']))
                      { 
                        $start=$_POST['start'];
                        $_SESSION['start']=$start;
                        $end=$_POST['end'];
                        $_SESSION['end']=$end;
                        echo date('F d, Y',strtotime($start))." to ". date('F d, Y',strtotime($end));
                      }?></h4><br>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Date</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php include '../dist/includes/dbcon.php';    
                      $grand=0;
                      if (isset($_POST['generate']))
                      {
                      $query=mysqli_query($con,"select *,SUM(sales_due) as total,date_format(sales_date, '%Y-%m-%d') as date from sales where date_format(sales_date, '%Y-%m-%d')  BETWEEN '$start' and '$end' group by date_format(sales_date, '%Y-%m-%d')")or die(mysqli_error($con));
                        $i=1;
                        while ($row=mysqli_fetch_array($query)){
                        $grand=$grand+$row['total'];
                      ?>       

                      <tr>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['total'];?></td>
                         
                      <?php $i++;}}?>  
                      </tr>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Grand Total</th>
                       
                        <th><?php echo number_format($grand,2);?></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../dist/includes/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include '../dist/includes/script.php';?>

</body>
</html>
