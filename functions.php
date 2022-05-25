<?php 
include('dist/includes/dbcon.php');

//Add Appointment
if (isset($_POST['add_appointment']))
{
	$last = $_POST['last'];
	$first = $_POST['first'];
	$date = $_POST['date'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$occupation = $_POST['occupation'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$service=$_POST['service'];

	$today=date("Y-m-d");
	//echo $today;
	mysqli_query($con,"INSERT INTO owner(owner_last,owner_first,owner_address,owner_contact,owner_occupation,owner_email,owner_password,date_registered) VALUES('$last','$first','$address','$contact','$occupation','$email','$password','$today')")or die(mysqli_error());  

	$id=mysqli_insert_id($con);
	mysqli_query($con,"INSERT INTO appointment(appointment_date,owner_id,appointment_status) VALUES('$date','$id','Pending')")or die(mysqli_error());  

	$aid=mysqli_insert_id($con);
	$i=0;
	
	foreach ($service as $value) {
		mysqli_query($con,"INSERT INTO appointment_details(appointment_id,prod_id) VALUES('$aid','$value')")or die(mysqli_error());
		$i++;
	}
		

	echo "<script type='text/javascript'>alert('Successfully made an appointment!');</script>";
	echo "<script>document.location='appointment_details.php?id=$aid'</script>";   
	
}
//Update Breed
if (isset($_POST['update_breed']))
{
	$id = $_POST['id'];
	$breed = $_POST['breed'];
	$species = $_POST['species'];

	 mysqli_query($con,"UPDATE breed SET breed_name='$breed',species_id='$species' where breed_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='breed.php'</script>";   
}

//Delete Breed
if (isset($_POST['delete_breed']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from breed where breed_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='breed.php'</script>";   
}

//Add Species
if (isset($_POST['add_species']))
{
	$species = $_POST['species'];
	
	$query=mysqli_query($con,"select * from species where species_name='$species'")or die(mysqli_error($con));
		$counter=mysqli_num_rows($query);
		if ($counter == 0) 
		  {	
			mysqli_query($con,"INSERT INTO species(species_name) VALUES('$species')")or die(mysqli_error());  
			echo "<script type='text/javascript'>alert('Successfully added new species!');</script>";
			}
		else{
			echo "<script type='text/javascript'>alert('Record already exist!');</script>";
		}
			echo "<script>document.location='species.php'</script>"; 
}
//Update Species
if (isset($_POST['update_species']))
{
	$id = $_POST['id'];
	$species = $_POST['species'];

	 mysqli_query($con,"UPDATE species SET species_name='$species' where species_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='species.php'</script>";   
}

//Delete Species	
if (isset($_POST['delete_species']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from species where species_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='species.php'</script>";   
}
//Delete User	
if (isset($_POST['delete_user']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from user where user_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='user.php'</script>";   
}
//Update User
if (isset($_POST['update_user']))
{
	$id = $_POST['id'];
	$last = strtoupper($_POST['last']);
	$first = strtoupper($_POST['first']);
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = strtoupper($_POST['address']);
	$city = $_POST['city'];
	$category = $_POST['category'];
	$sex = $_POST['sex'];
	
	if ($_POST['audio_new']<>""){
		$audio = "dist/audio/".$_POST['audio_new'];
	}
	else
	{
		$audio = $_POST['audio'];
	}

	 mysqli_query($con,"UPDATE user SET user_last='$last',user_first='$first',user_bday='$bday',user_contact='$contact',user_address='$address',city_id='$city',cat_id='$category',user_sex='$sex',audio='$audio' where user_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='user.php'</script>";   
}
//Add User
if (isset($_POST['add_user']))
{
	include '../plugins/phpqrcode/qrlib.php';
	include '../dist/includes/dbcon.php';
	$last = strtoupper($_POST['last']);
	$first = strtoupper($_POST['first']);
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = strtoupper($_POST['address']);
	$city = $_POST['city'];
	$category = $_POST['category'];
	$sex = $_POST['sex'];
	
	$query=mysqli_query($con,"select * from user where user_first='$first' and user_last='$last' and user_bday='$bday'")or die(mysqli_error($con));
		$counter=mysqli_num_rows($query);
		if ($counter == 0) 
		  {	
			mysqli_query($con,"INSERT INTO user(user_last,user_first,user_bday,user_contact,user_address,city_id,cat_id,user_sex) VALUES('$last','$first','$bday','$contact','$address','$city','$category','$sex')")or die(mysqli_error($con));  

				$id=mysqli_insert_id($con);

				$fileName = $id.'.png'; 
				$tempDir = "../dist/img";                    // the directory to store the files
				$filePath = $tempDir . "/" . $fileName;
				QRcode::png($id, $filePath);         // note the second parameter

				mysqli_query($con,"UPDATE user SET qrcode='$filePath' where user_id='$id'") or die(mysqli_error()); 

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
			}
		else{
			echo "<script type='text/javascript'>alert('Record already exist!');</script>";
		}
			echo "<script>document.location='user.php'</script>"; 
}

//Add Admin
if (isset($_POST['add_admin']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	mysqli_query($con,"INSERT INTO admin(fullname,contact,username,password,pic) VALUES('$name','$contact','$username','$password','../dist/img/avatar3.png')")or die(mysqli_error($con));  
	echo "<script type='text/javascript'>alert('Successfully added new administrator!');</script>";	
	echo "<script>document.location='admin.php'</script>";   
}
//Update Admin
if (isset($_POST['update_admin']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$username = $_POST['username'];
	$password = md5($_POST['newpassword']);

	if ($_POST['newpassword'] =="")
	{
		mysqli_query($con,"UPDATE admin SET fullname='$name',contact='$contact',username='$username' where admin_id='$id'") or die(mysqli_error($con)); 
	}
	else
	{
	 mysqli_query($con,"UPDATE admin SET fullname='$name',contact='$contact',username='$username',password='$password' where admin_id='$id'") or die(mysqli_error($con)); 
	}
	 echo "<script>document.location='admin.php'</script>";   
}

//Delete Admin	
if (isset($_POST['delete_admin']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from admin where admin_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='admin.php'</script>";   
}
//Add Product
if (isset($_POST['add_product']))
{
	$product = $_POST['product'];
	$prod_type = $_POST['type'];
	$price = $_POST['price'];
	$reorder = $_POST['reorder'];
	
	$name = $_FILES["picture"]["name"];
			if ($name=="")
			{	
			$name="default.png";
			}
			else
			{
			$type = $_FILES["picture"]["type"];
			$size = $_FILES["picture"]["size"];
			$temp = $_FILES["picture"]["tmp_name"];
			$error = $_FILES["picture"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
					{
					die("Format is not allowed or file size is too big!");
					}
				else
					  {
					move_uploaded_file($temp, "../dist/img/".$name);
					  }
					}
			}	
	mysqli_query($con,"INSERT INTO product(prod_name,prod_price,prod_type,prod_pic) VALUES('$product','$price','$prod_type','$name')")or die(mysqli_error($con));  
	echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";	
	echo "<script>document.location='product.php'</script>";   
}
//Delete Product	
if (isset($_POST['delete_product']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from product where prod_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='product.php'</script>";   
}
//Update Product
if (isset($_POST['update_product']))
{
	$product = $_POST['product'];
	$prod_type = $_POST['type'];
	$price = $_POST['price'];
	$id = $_POST['id'];
	$reorder = $_POST['reorder'];
	
	$name = $_FILES["picture"]["name"];
			if ($name<>"")
			{
				$type = $_FILES["picture"]["type"];
				$size = $_FILES["picture"]["size"];
				$temp = $_FILES["picture"]["tmp_name"];
				$error = $_FILES["picture"]["error"];
				
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
					{
					die("Format is not allowed or file size is too big!");
					}
				else
					  {
					move_uploaded_file($temp, "../dist/img/".$name);

					  }
					}
			}
			else if ($name=="")
			{
				$name=$_POST['picture_old'];
			}

	 mysqli_query($con,"UPDATE product SET prod_name='$product',prod_price='$price',prod_type='$prod_type',prod_pic='$name',prod_reorder='$reorder' where prod_id='$id'") or die(mysqli_error()); 
	 	echo "<script>document.location='product.php'</script>";   
}
//Add Vaccine
if (isset($_POST['add_vaccine']))
{
	$vaccine = $_POST['vaccine'];
	$price = $_POST['price'];
	
	mysqli_query($con,"INSERT INTO vaccine(vaccine_name,vaccine_price) VALUES('$vaccine','$price')")or die(mysqli_error());  
	echo "<script type='text/javascript'>alert('Successfully added new vaccine!');</script>";
	echo "<script>document.location='vaccine.php'</script>";   
	
}
//Update Vaccine
if (isset($_POST['update_vaccine']))
{
	$id = $_POST['id'];
	$vaccine = $_POST['vaccine'];
	$price = $_POST['price'];

	 mysqli_query($con,"UPDATE vaccine SET vaccine_name='$vaccine',vaccine_price='$price' where vaccine_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='vaccine.php'</script>";   
}

//Delete Vaccine
if (isset($_POST['delete_vaccine']))
{
	$id = $_POST['id'];
	
	 mysqli_query($con,"DELETE from vaccine where vaccine_id='$id'") or die(mysqli_error()); 
	 echo "<script>document.location='vaccine.php'</script>";   
}

?>

