<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Products</title>
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
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
          <section class="col-lg-9 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list-ul mr-1"></i>
                  List
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty On Hand</th>
                    <th>Reorder</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php include '../dist/includes/dbcon.php';    
                  
                  $query=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error($con));
                    $i=0;
                    while ($row=mysqli_fetch_array($query)){
                    $id=$row['prod_id'];
                    //$sex=$row['user_sex'];
                    $i++;      
                  ?>       
                  <tr>
                    <td><?php echo $id;?></td>
                    <td style="text-align: center;"><img src="../dist/img/<?php echo $row['prod_pic'];?>" style="width: 50px;height: 50px"></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['prod_price'];?></td>
                    <td style="text-align: center;"><?php echo $row['prod_qty'];?></td>
                    <td style="text-align: center;"><?php echo $row['prod_reorder'];?></td>
                    <td><?php echo $row['prod_type'];?>
                    </td>
                    <td>
                      <a class="btn text-success" data-toggle="modal" data-target="#modal-default<?php echo $id;?>"><i class="fas fa-edit"></i></a>
                      <a class="btn text-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id;?>"><i class="fas fa-trash"></i></a>
                    </td>
                    <div class="modal fade" id="modal-default<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post" action="functions.php" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Product/Service Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Product/Service Name" name="product" value="<?php echo $row['prod_name'];?>">
                                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="" name="id" value="<?php echo $id;?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Price</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Product/Service Price" name="price" value="<?php echo $row['prod_price'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Image</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control" id="inputEmail3" placeholder="" name="picture">
                                    <input type="hidden" class="form-control" id="inputEmail3" name="picture_old" value="<?php echo $row['prod_pic'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Reorder Point</label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" id="inputEmail3" placeholder="Reorder Point" name="reorder" value="<?php echo $row['prod_reorder'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">User Type</label>
                                  <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="type" placeholder="Select Product Type">
                                          <option><?php echo $row['prod_type'];?></option>
                                          <option>Product</option>
                                          <option>Service</option>
                                        
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update_product">Save changes</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
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
                                <p>Are you sure you want to delete product/service <?php echo $row['prod_name'];?>?</p>
                                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Category" name="id" value="<?php echo $id;?>">
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="delete_product">Delete</button>
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
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty On Hand</th>
                    <th>Reorder</th>
                    <th>Type</th>
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
          <section class="col-lg-3 connectedSortable">

            <!-- Map card -->
            <div class="card card-danger shadow-lg">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Add New Product/Service
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="functions.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product/Service Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product/Service Name" name="product" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="customFile">Image</label>
                    <input type="file" class="form-control" id="customFile" placeholder="Enter Product Image" name="picture">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Reorder Point</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Reorder Point" name="reorder" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select class="form-control select2" style="width: 100%;" name="type" placeholder="Select Type" required>
                        <option>Product</option>
                        <option>Service</option>
                    </select>
                </div>
                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-block" name="add_product"><i class="fa fa-save"></i> Save</button>
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
<script>
  $(function () {
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
