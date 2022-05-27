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

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#consultation" data-toggle="tab">Consultation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Medical History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#services" data-toggle="tab">Services</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="history">
                    <!-- Post -->
                    <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Weight</th>
                      <th>Temperature</th>
                      <th>Physical Exam/ Findings</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $querymed=mysqli_query($con,"select * from medical_record where pet_id='$id' order by mr_date desc")or die(mysqli_error($con));
                        while($rowmed=mysqli_fetch_array($querymed))
                        {
                  ?>
                    <tr data-widget="expandable-table" aria-expanded="true">
                      <td><?php echo $rowmed['mr_date'];?></td>
                      <td><?php echo $rowmed['mr_wt'];?></td>
                      <td><?php echo $rowmed['mr_temp'];?></td>
                      <td><?php echo $rowmed['mr_pe'];?></td>
                      <td><?php echo $rowmed['mr_remarks'];?></td>
                    </tr>
                    <tr class="expandable-body">
                      <td colspan="5">
                        <p style="">
                          <?php echo $rowmed['mr_treatment'];?>
                        </p>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                    <!-- /.post -->

                   


                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="services">
                    <div class="row">
                      <!-- The timeline -->
                      <div class="col-4">
                        <form class="form-horizontal" method="post" action="functions.php">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" id="inputName" placeholder="Date of Consultation" name="date">
                              <input type="hidden" class="form-control" id="inputName" placeholder="Date of Consultation" name="id" value="<?php echo $id;?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-4 col-form-label">Service</label>
                            <div class="col-sm-8">
                              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="service" placeholder="Select Product to stockin" required>
                                <?php

                                  $query2=mysqli_query($con,"select * from product where prod_type='Service' order by prod_name")or die(mysqli_error($con));
                                      while($row2=mysqli_fetch_array($query2)){
                                  ?>
                                      <option value="<?php echo $row2['prod_id'];?>"><?php echo $row2['prod_name'];?></option>
                                <?php }?>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-4 col-form-label">Medicine/Vaccine</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" id="inputExperience" placeholder="Medicine/Drug/Vaccine Used" name="medicine"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-4 col-form-label">Due Date</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" id="inputName" placeholder="Date of Consultation" name="due">
                            </div>
                          </div>
                          
                          
                          <div class="form-group row">
                            <div class="offset-sm-4 col-sm-8">
                              <button type="submit" class="btn btn-danger" name="add_service_record">Save</button>
                              <button type="reset" class="btn btn-default">Clear</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-8">
                        
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Medicine/Vaccine</th>
                                <th>Due Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                                  $querysr=mysqli_query($con,"select * from service_history natural join product where pet_id='$id' order by service_date desc")or die(mysqli_error($con));
                                      while($rowsr=mysqli_fetch_array($querysr)){
                                  ?>
                              <tr>
                                <td><?php echo $rowsr['service_date'];?></td>
                                <td><?php echo $rowsr['prod_name'];?></td>
                                <td><?php echo $rowsr['medicine'];?></td>
                                <td><?php echo $rowsr['due_date'];?></td>
                              </tr>
                              <?php }?>
                              
                            </tbody>
                          </table>
                        </div>
                      <!-- The timeline -->
                      
                    </div>
                      

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="consultation">
                    <form class="form-horizontal" method="post" action="functions.php">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName" placeholder="Date of Consultation" name="date" required>
                          <input type="hidden" class="form-control" id="inputName" placeholder="Date of Consultation" name="id" value="<?php echo $id;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Pet's Weight" name="weight">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Temperature</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Pet's Temperature" name="temp">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Physical Exam/Findings</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Physical Exam/Findings" name="pe"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Treatment</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Treatment Needed" name="treatment"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Remarks" name="remarks"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="add_record">Save</button>
                          <button type="reset" class="btn btn-default">Clear</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        
        
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
