<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);
$rdate=date("d-m-Y");
if(isset($btn)){
    $up=mysqli_query($connect, "update bill_food set latitude='$lat', longitude='$lon' where id='$id'");
	if($up)
				{
				//header("location:index.php");
                ?>
                <script language="javascript">
		alert("Location Updated");
		window.location.href="deli_det.php";
		</script>
		<?php
		}
		else
		{
		echo "Error";
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


                    <?php include("name5.php");?>
                    

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
                <h2>Update Location</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post">
                                        
										 <input type="hidden" class="location" name="lat" placeholder="Latitude" required="">
										 <input type="hidden" class="location" name="lon" placeholder="Longitude" required="">
										 <input type="submit" class="btn btn-success" name="btn" value="Refresh">
										 
                  </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>