<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Invoice</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
</head>
<body>
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SINHSLogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  <?php // include '../dist/includes/navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php //include '../dist/includes/sidebar.php';?>


    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php 
              include '../dist/includes/dbcon.php';  
              $id=$_REQUEST['id'];
              $query1=mysqli_query($con,"select * from sales natural join owner where sales_id='$id'")or die(mysqli_error($con));
                       
                $row1=mysqli_fetch_array($query1);
            ?> 
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Sann Jose Veterinary Clinic
                    <small class="float-right">Date: <?php echo date("F d, Y",strtotime($row1['sales_date']));?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Payee
                  <address>
                    <strong><?php echo $row1['owner_first']." ".$row1['owner_last'];?></strong><br>
                    <?php echo $row1['owner_address'];?><br>
                    <?php echo $row1['owner_contact'];?><br>
                    Email: <?php echo $row1['owner_email'];?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo $row1['sales_id'];?></b><br>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product/Service</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                     
                      
                      $query=mysqli_query($con,"select * from sales_details natural join product where sales_id='$id'")or die(mysqli_error($con));
                        $i=0;
                        $total=0;
                        while ($row=mysqli_fetch_array($query)){
                        
                        $i++;      
                      ?> 
                    <tr>
                      <td><?php echo $row['sales_qty'];?></td>
                      <td><?php echo $row['prod_name'];?></td>
                      <td><?php echo $row['sales_price'];?></td>
                      <td><?php echo $row['sales_subtotal'];?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../dist/img/credit/visa.png" alt="Visa">
                  <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead"></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $row1['sales_total'];?></td>
                      </tr>
                      <tr>
                        <th>Discount</th>
                        <td><?php echo $row1['sales_discount'];?></td>
                      </tr>
                      <tr>
                        <th>Cash Tendered:</th>
                        <td><?php echo $row1['sales_tendered'];?></td>
                      </tr>
                      <tr>
                        <th>Change:</th>
                        <td><?php echo $row1['sales_change'];?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><b><?php echo $row1['sales_due'];?></b></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php // include '../dist/includes/footer.php';?>

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
