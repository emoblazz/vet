<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Vaccine</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
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
            <h1 class="m-0">Vaccine</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vaccine</li>
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
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list-ul mr-1"></i>
                  List
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Vaccine</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php include '../dist/includes/dbcon.php';    
                  
                  $query=mysqli_query($con,"select * from vaccine order by vaccine_name")or die(mysqli_error());
                    $i=0;
                    while ($row=mysqli_fetch_array($query)){
                    $id=$row['vaccine_id'];
                    $vaccine=$row['vaccine_name'];
                    $price=$row['vaccine_price'];
                    $i++;      
                  ?>       
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $vaccine;?>
                    <td><?php echo $price;?>
                    </td>
                    <td>
                      <a class="btn text-success" data-toggle="modal" data-target="#modal-default<?php echo $id;?>"><i class="fas fa-edit"></i></a>
                      <a class="btn text-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id;?>"><i class="fas fa-trash"></i></a>
                    </td>
                    <div class="modal fade" id="modal-default<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post" action="functions.php">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Vaccine Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Name of Vaccine" name="vaccine" value="<?php echo $vaccine;?>" required>
                                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="Breed" name="id" value="<?php echo $id;?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Vaccine Price</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Price of Vaccine" name="price" value="<?php echo $price;?>" required>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update_vaccine">Save changes</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <div class="modal fade" id="modal-delete<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post" action="functions.php">
                              <div class="modal-header">
                                <h4 class="modal-title">Delete Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to delete <?php echo $vaccine;?>?</p>
                                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Vaccine" name="id" value="<?php echo $id;?>">
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="delete_vaccine">Delete</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                  <?php }?>  
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Vaccine Name</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div><!-- /.card-body -->
            </div>


            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-4 connectedSortable">

            <!-- Map card -->
            <div class="card card-danger shadow-lg">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Add Vaccine
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="functions.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vaccine Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Vaccine" name="vaccine" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vaccine Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Vaccine Price" name="price" required>
                </div>
                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-block" name="add_vaccine"><i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              </form>
            </div>
            <!-- /.card -->
      
          </section>
          <!-- right col -->
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
