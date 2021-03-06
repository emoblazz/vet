<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Appointments</title>
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
            <h1 class="m-0">Owner Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Appointment</li>
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
            $id=$_REQUEST['id'];
            $query=mysqli_query($con,"select * from owner where owner_id='$id'")or die(mysqli_error($con));
                $row=mysqli_fetch_array($query);
          ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../dist/img/default.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['owner_first']." ".$row['owner_last'];?></h3>

                  <p class="text-muted text-center"><?php echo $row['owner_occupation'];?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b><?php echo $row['owner_address'];?></b><span class="float-right badge bg-danger"><i class="fa fa-map"></i></span>
                    </li>
                    <li class="list-group-item">
                      <b><?php echo $row['owner_contact'];?></b><span class="float-right badge bg-primary"><i class="fa fa-address-book"></i></span>
                    </li>
                    <li class="list-group-item">
                      <b><?php echo $row['owner_email'];?></b> <span class="float-right badge bg-warning"><i class="fa fa-envelope"></i></span>
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
                <strong><i class="fas fa-birthday-cake"></i> <?php echo date('F d, Y',strtotime($row1['appointment_date']));?></strong>
                
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
                <h3 class="card-title"><i class="fa fa-paw"></i> Pets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <?php
                $queryp=mysqli_query($con,"select * from pet natural join breed natural join species where owner_id='$id'")or die(mysqli_error($con));
                  while($rowp=mysqli_fetch_array($queryp))
                    {
                ?>
                  <div class="col-sm-6">
                    <div class="position-relative" style="height: 150px;">
                      <img src="../dist/img/<?php echo $rowp['species_pic'];?>" alt="Photo 3" class="img-fluid" style="height: 100%;width: 100%">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-danger">
                          <?php echo $rowp['species_name'];?>
                        </div>
                      </div>
                      
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $rowp['pet_name'];?> <span class="float-right badge bg-danger"><i class="fa fa-tags"></i></span>
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
                <?php }?>  
                 </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
          <div class="col-md-3">
            <div class="card card-danger shadow-lg">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-paw"></i>
                  Add Pet
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="functions.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pet Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Pet" name="name" required>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $id;?>" name="id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <select class="form-control" style="width: 100%;" name="gender" placeholder="Select Gender" required>
                        
                              <option>Male</option>
                              <option>Female</option>
                        
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Species</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="species" placeholder="Select Species" required>
                        <?php

                          $query2=mysqli_query($con,"select * from species order by species_name")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                          ?>
                              <option value="<?php echo $row2['species_id'];?>"><?php echo $row2['species_name'];?></option>
                        <?php }?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Breed</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="breed" placeholder="Select Breed" required>
                        <?php

                          $query2=mysqli_query($con,"select * from breed order by breed_name")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                          ?>
                              <option value="<?php echo $row2['breed_id'];?>"><?php echo $row2['breed_name'];?></option>
                        <?php }?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Birthday</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Stockin Qty" name="bday" required>
                </div>
                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-block" name="add_pet"><i class="fa fa-save"></i> Save</button>
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
