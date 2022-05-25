<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Sann Jose Vet Clinic</title>
	<!-- core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/font-awesome.min.css" rel="stylesheet">
    <link href="dist/css/animate.min.css" rel="stylesheet">
    <link href="dist/css/owl.carousel.css" rel="stylesheet">
    <link href="dist/css/owl.transitions.css" rel="stylesheet">
    <link href="dist/css/prettyPhoto.css" rel="stylesheet">
    <link href="dist/css/styles.css" rel="stylesheet"> 
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="dist/css/fullcalendar.min.css">
    <link rel="stylesheet" href="dist/css/fullcalendar.print.css" media="print">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico"> 
</head> 

<body id="home">

    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="dist/img/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="index.php#home">Home</a></li> 
                        <li class="scroll"><a href="index.php#about">About Us</a></li>
                        <li class="scroll"><a href="index.php#services">Our Service</a></li>
                        <li class="scroll"><a href="index.php#pricing">Pricing</a></li>
                        <li class="scroll"><a href="index.php#portfolio">Gallery</a></li>
                        <li class="scroll"><a href="index.php#our-team">Team</a></li>
                        <li class="scroll"><a href="index.php#contact-us">Contact</a></li>  
                        <li class="scroll"><a href="index.php#appointment">Make Appointment</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    <?php
                        include('dist/includes/dbcon.php');
                        $id=$_REQUEST['id'];
                        $query=mysqli_query($con,"select * from appointment natural join owner where appointment_id='$id'")or die(mysqli_error($con));
                            $i=0;
                            $row=mysqli_fetch_array($query);
                    ?>
    <section id="appointment">
        <div class="container">
            <div class="section-header"><br>
                <h2 class="section-title text-center wow fadeInDown">Appointment Details</h2>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Appointment Date</td>
                              <td>
                                <?php echo $row['appointment_date'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>Last Name</td>
                              <td>
                                <?php echo $row['owner_last'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>First Name</td>
                              <td>
                                <?php echo $row['owner_first'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td>
                                <?php echo $row['owner_address'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>Mobile #</td>
                              <td>
                                <?php echo $row['owner_contact'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>Occupation</td>
                              <td>
                                <?php echo $row['owner_occupation'];?>
                              </td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>
                                <?php echo $row['owner_email'];?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                </div>
                
                <div class="col-md-4 col-sm-6">
                  <div class="card">
                      <div class="card-header">
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <?php
                        include('dist/includes/dbcon.php');
                        $query=mysqli_query($con,"select * from appointment_details natural join product where appointment_id='$id'")or die(mysqli_error($con));
                            $i=0;
                            while ($row=mysqli_fetch_array($query)){
                                $id=$row['prod_id'];
                                $prod_name=$row['prod_name'];
                                $prod_price=$row['prod_price'];
                                $i++;      
                    ?>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="checkbox" id="checkbox<?php echo $id;?>" name="service[]" value="<?php echo $id;?>" checked disabled>
                        <label for="checkbox<?php echo $id;?>"><?php echo $prod_name;?>
                        </label>
                      </div>
                    <?php }?>  
                      </div>
                      <!-- /.card-body -->
                    </div>
                   
                    
                  <!-- /.card-body-->
                  </form>
                </div>
              <br>
            </div>
        </div>
    </section><!--/#testimonial-->


    
    <section id="contact-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contact Us</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
        </div>
    </section><!--/#contact-us-->


    <section id="contact">
        
        <div class="container-wrapper">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-4 col-md-4">
                        <div class="contact-form">
                            <address class="col-sm-10">
                              <strong>Pet Care.</strong><br>
                              12345 NewYork, Street 125<br>
                              United States 94107<br>
                              <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
							
							<article class="hours-block col-sm-10">

							<div><strong>Walk-in Hours</strong></div><br/>			
							<div class="pull-left">
							<p><b>Monday &amp; Tuesday</b></p>
							<p><b>Wednesday</b></p>
							<p><b>Thursday</b></p>
							<p><b>Friday</b></p>
							<p><b>Saturday</b></p> 
							</div>

							<div class="pull-right">
							<p>7am-8pm</p>
							<p>9am-8pm</p>
							<p>7am-8pm</p>
							<p>8am-8pm</p>
							<p>9am-8pm</p> 	
							</div>

							</article>

					</div></div>
                    <div class="col-sm-8 col-md-8">                      
						<div class="contact-form">											
						  
		<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
		<form name="sentMessage" id="contactForm"  novalidate>
		<div class="control-group">
		<div class="controls">
		<input type="text" class="form-control" 
		placeholder="Full Name" id="name" required
		data-validation-required-message="Please enter your name" />
		<p class="help-block"></p>
		</div>
		</div> 	
		<div class="control-group">
		<div class="controls">
		<input type="email" class="form-control" placeholder="Email" 
		id="email" required
		data-validation-required-message="Please enter your email" />
		</div>
		</div> 	

		<div class="control-group">
		<div class="controls">
		<textarea rows="10" cols="100" class="form-control" 
		placeholder="Message" id="message" required
		data-validation-required-message="Please enter your message" minlength="5" 
		data-validation-minlength-message="Min 5 characters" 
		maxlength="999" style="resize:none"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<button type="submit" class="btn btn-primary pull-right">Send</button><br />
		</form>

							 					
						</div>
                    </div>
                </div>
            </div>
        </div>
<div id="google-map" style="height:400px" data-latitude="40.7141667" data-longitude="-74.00638891"></div>   
   </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2018 Company Name. Template by <a target="_blank" href="https://webthemez.com/animals-pets/" title="Free Bootstrap Themes and HTML Templates">WebThemez.com</a>
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="dist/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="dist/js/owl.carousel.min.js"></script>
    <script src="dist/js/mousescroll.js"></script>
    <script src="dist/js/smoothscroll.js"></script>
    <script src="dist/js/jquery.prettyPhoto.js"></script>
    <script src="dist/js/jquery.isotope.min.js"></script>
    <script src="dist/js/jquery.inview.min.js"></script>
    <script src="dist/js/wow.min.js"></script>
    <script src="dist/js/jqBootstrapValidation.js"></script>
    <script src="dist/js/contact.js"></script>
    <script src="dist/js/custom-scripts.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="dist/js/moment.min.js"></script>
    <script src="dist/js/fullcalendar.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Page specific script -->
    <script>
    const events = [
  {
    summary: 'JS Conference',
    start: {
      date: Calendar.dayjs().format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().format('DD/MM/YYYY'),
    },
    color: {
      background: '#cfe0fc',
      foreground: '#0a47a9',
    },
  },
  {
    summary: 'Vue Meetup',
    start: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
    },
    color: {
      background: '#ebcdfe',
      foreground: '#6e02b1',
    },
  },
  {
    summary: 'Angular Meetup',
    description: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',
    start: {
      date: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY') + ' 10:00',
    },
    end: {
      date: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY') + ' 14:00',
    },
    color: {
      background: '#c7f5d9',
      foreground: '#0b4121',
    },
  },
  {
    summary: 'React Meetup',
    start: {
      date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
    },
    end: {
      date: Calendar.dayjs().add(8, 'day').format('DD/MM/YYYY'),
    },
    color: {
      background: '#fdd8de',
      foreground: '#790619',
    },
  },
  {
    summary: 'Meeting',
    start: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 8:00',
    },
    end: {
      date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 12:00',
    },
    color: {
      background: '#cfe0fc',
      foreground: '#0a47a9',
    },
  },
  {
    summary: 'Call',
    start: {
      date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 11:00',
    },
    end: {
      date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
      dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 14:00',
    },
    color: {
      background: '#292929',
      foreground: '#f5f5f5',
    },
  }
];

const calendarElement = document.getElementById('calendar');
const calendarInstance = Calendar.getInstance(calendarElement);
calendarInstance.addEvents(events);

    </script>
</body>
</html>