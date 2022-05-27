<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Pet Profile</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SINHSLogo" height="60" width="60">
  </div>-->

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
            <h1 class="m-0">Pet Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pet Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          <?php
            include('../dist/includes/dbcon.php');
            $id=$_REQUEST['pid'];
            $query=mysqli_query($con,"select * from pet natural join species natural join breed where pet_id='$id'")or die(mysqli_error($con));
                $rowp=mysqli_fetch_array($query);
          ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../dist/img/<?php echo $rowp['species_pic'];?>" alt="User profile picture" style="width: 100px;width: 100px">
                </div>

                <h3 class="profile-username text-center"><?php echo $rowp['pet_name'];?></h3>

                  <p class="text-muted text-center"><?php echo $rowp['breed_name'];?></p>

                  <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $rowp['species_name'];?> <span class="float-right badge bg-danger"><i class="fa fa-tags"></i></span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $rowp['breed_name'];?> <span class="float-right badge bg-primary"><i class="fa fa-dog"></i></span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $rowp['pet_gender'];?> <span class="float-right badge bg-warning"><i class="fa fa-mars-stroke"></i></span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo date('F d, Y',strtotime($rowp['pet_bday']));?> <span class="float-right badge bg-success"><i class="fa fa-calendar"></i></span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="pet_profile.php?pid=<?php echo $rowp['pet_id'];?>" class="nav-link btn btn-block btn-success">
                            <i class="fa fa-eye"></i> View Record
                          </a>
                        </li>
                      </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-calendar-check"></i> Appointment History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                $query1=mysqli_query($con,"select * from appointment natural join owner where owner_id='$id' order by appointment_date desc")or die(mysqli_error($con));
                  while($row1=mysqli_fetch_array($query1))
                    {
                      $aid=$row1['appointment_id'];
                ?>
                <strong><i class="fas fa-calendar mr-1"></i> <?php echo date('F d, Y',strtotime($row1['appointment_date']));?></strong>
                
                <p class="text-muted">
                <?php
                $query2=mysqli_query($con,"select * from appointment_details natural join product where appointment_id='$aid' order by prod_name")or die(mysqli_error($con));
                  while($row2=mysqli_fetch_array($query2))
                    {
                      $status=$row1['appointment_status'];
                      if ($status=="Pending"){$color="warning";}
                      if ($status=="Approved"){$color="primary";}
                      if ($status=="Cancelled"){$color="danger";}
                      if ($status=="Done"){$color="success";}
                ?>
                  <span class="tag tag-danger"><?php echo $row2['prod_name'];?> </span>
                  <?php }?>
                </p>
                <a href="#" class="btn btn-<?php echo $color;?> btn-sm"><?php echo $row1['appointment_status'];?></a>
                <hr>
              <?php }?>  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-paw"></i> Pet Record </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <?php
                $queryp=mysqli_query($con,"select * from pet natural join breed natural join species where owner_id='$id'")or die(mysqli_error($con));
                  while($rowp=mysqli_fetch_array($queryp))
                    {
                ?>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-success">
                          <?php echo $rowp['species_name'];?>
                        </div>
                      </div>
                       <?php echo $rowp['pet_name'];?> <br>
                      <small> <?php echo $rowp['breed_name'];?></small><br>
                      <small> <?php echo $rowp['pet_gender'];?></small><br>
                      <small> <?php echo date('F d, Y',strtotime($rowp['pet_bday']));?></small><br>
                      <small> <a href="pet_profile.php?pid=<?php echo $rowp['pet_id'];?>"><i class="fa fa-eye"></i> View Record</a></small>
                    </div>
                  </div>
                <?php }?>  
                 
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
        
          <div class="col-md-3">
            <div class="card card-danger shadow-lg">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Add Medical Record
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="functions.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Pet" name="date" required>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $id;?>" name="id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Weight</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Pet" name="date" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Temperature</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Pet" name="date" required>
                </div>
                
                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-block" name="add_record"><i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<script type="text/javascript">
  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
</body>
</html>
