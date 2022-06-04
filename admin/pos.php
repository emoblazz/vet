<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Sales</title>
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
            <h1 class="m-0">Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
               
                  <form method="post" action="functions.php">
                  
                    <table id="example1" class="table" style="width: 100%">
                      <thead>
                      <tr>
                        <th><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Qty" name="qty" required></th>
                        <th><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="product" placeholder="Select Product" required>
                                      <?php include '../dist/includes/dbcon.php';    

                                        $query0=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error($con));
                                            while($row0=mysqli_fetch_array($query0)){
                                        ?>
                                            <option value="<?php echo $row0['prod_id'];?>"><?php echo $row0['prod_name'];?></option>
                                      <?php }?>
                            </select></th>
                          <th><button class="btn bg-danger" style="vertical-align: text-bottom;" type="submit" name="add_cart">
                              <i class="fas fa-plus"></i>
                            </button></th>
                      </tr>
                      </thead>
                    </table>
                  </form>
                  
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Qty</th>
                    <th>Product/Service</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  $query=mysqli_query($con,"select * from temp natural join product order by temp_id")or die(mysqli_error($con));
                    $i=0;
                    $total=0;
                    while ($row=mysqli_fetch_array($query)){
                    $tid=$row['temp_id'];
                    $total= $total + $row['subtotal'];
                    $i++;      
                  ?>       
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['subtotal'];?></td>
          
                    </td>
                    <td>
                      <a class="btn text-primary" href="owner_profile.php?id=<?php echo $id;?>"><i class="fas fa-eye"></i></a>
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
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="last" value="<?php echo $row['user_last'];?>">
                                    <input type="hidden" class="form-control" id="inputEmail3" placeholder="" name="id" value="<?php echo $id;?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">First Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name" name="first" value="<?php echo $row['user_first'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Username</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username" value="<?php echo $row['username'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Picture</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control" id="inputEmail3" placeholder="Username" name="picture">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">User Type</label>
                                  <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="type" placeholder="Select User Type">
                                          <option><?php echo $row['user_type'];?></option>
                                          <option>Admin</option>
                                          <option>Staff</option>
                                        
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update_user">Save changes</button>
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
                                <p>Are you sure you want to delete User <?php echo $row['user_last'].", ".$row['user_first'];?>?</p>
                                <input type="hidden" class="form-control" id="inputEmail3" placeholder="Category" name="id" value="<?php echo $id;?>">
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="delete_user">Delete</button>
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
                  <i class="fa fa-credit-card"></i>
                  Payment
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="functions.php" name="autoSumForm" id="autoSumForm">
                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="customer" placeholder="Select Product to stockin" required>
                                <?php

                                  $query2=mysqli_query($con,"select * from owner order by owner_last")or die(mysqli_error($con));
                                      while($row2=mysqli_fetch_array($query2)){
                                  ?>
                                      <option value="<?php echo $row2['owner_id'];?>"><?php echo $row2['owner_last'].", ".$row2['owner_first'];?></option>
                                <?php }?>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="total" value="<?php echo number_format($total,2);?>" id="total" onFocus="startCalc();" onBlur="stopCalc();" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="discount" id="discount" onFocus="startCalc();" onBlur="stopCalc();" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount Due</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="amount" id="amount" onFocus="startCalc();" onBlur="stopCalc();"  readonly>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Cash Tendered</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Cash Tendered" name="tendered" id="tendered" onFocus="startCalc();" onBlur="stopCalc();"  required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Change</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="change" id="change" placeholder="Change" onFocus="startCalc();" onBlur="stopCalc();"  required>
                </div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-block" name="add_sales"><i class="fa fa-save"></i> Pay</button>
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
    
  });
/* This script and many more are available free online at
The JavaScript Source!! http://www.javascriptsource.com
Created by: Jim Stiles | www.jdstiles.com */
function startCalc(){
  interval = setInterval("calc()",1);
}
function calc(){
  one = document.autoSumForm.total.value;
  two = document.autoSumForm.discount.value; 
  three = (one * 1) - (two * 1);
  document.autoSumForm.amount.value = three.toFixed(2);

  four = document.autoSumForm.tendered.value; 
  five=(four * 1) - (three * 1);
  document.autoSumForm.change.value = five.toFixed(2);

  
}
function stopCalc(){
  clearInterval(interval);
}
function myFunction(){
  one = document.autoSumForm.total.value;
  document.autoSumForm.amount.value = one;
}
</script>
</body>
</html>
