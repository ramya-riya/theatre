<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);
$rdate=date("d-m-Y");
if(isset($btn)){
    $mq=mysqli_query($connect, "select max(id) from food_menu");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
    $total=$price*$quantity;
    $i="insert into food_menu(id,food_id,foodname,price,quantity,total,pickup,contact,location,description,latitude,longitude,status,username,rdate) values($id,'$food_id','$foodname','$price','$quantity','$total','$pickup','$contact','$location','$description','$lat','$lon','0','$username','$rdate')";
    $qry=mysqli_query($connect, $i);
	if($qry)
				{
				//header("location:index.php");
                ?>
                <script language="javascript">
		alert("Registered Successfully");
		window.location.href="applyfood.php";
		</script>
		<?php
		}
		else
		{
		echo "Could not Registered";
		}
	
				}
				

		


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include("title.php");?>
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script language="javascript">
function validate()
{
if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the Email Id.");
	document.form1.email.focus();
	return false;
	}
	
    if(document.form1.username.value=="")
	{
	alert("Enter the User Name");
	document.form1.username.focus();
	return false;
	}
    if(document.form1.password.value=="")
	{
	alert("Enter the Password");
	document.form1.password.focus();
	return false;
	}



return true;
}

</script>
  <script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;	
	document.form1.lat.value=position.coords.latitude;
	document.form1.lon.value=position.coords.longitude;
	
}
</script>
</head>

<body onLoad="getLocation()">
    <div class="fixed-top">


                    <?php include("name2.php");?>
                    

        <div class="cont-sec">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>

    </div>
    

    <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>Apply Food Menu Details</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post">
                                        <input type="text" class="name" name="quantity" placeholder="Quantity" required="">
										 <input type="text" class="location" name="pickup" placeholder="Delivery point" required="">
                                         <input type="text" class="name" name="contact" placeholder="Mobile Number" required=""><br>
										 <input type="text" class="location" name="location" placeholder="Your Location" required="">
                                         <textarea name="description" rows="4" cols="50"></textarea><br>
										 <input type="hidden" class="location" name="lat" placeholder="Latitude" required="">
										 <input type="hidden" class="location" name="lon" placeholder="Longitude" required="">
										 <input type="submit" class="btn btn-success" name="btn" value="Submit">
										 
										 <br><a href="https://developers-dot-devsite-v2-prod.appspot.com/maps/documentation/utils/geocoder" target="_blank">Get Location</a>
                  </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>