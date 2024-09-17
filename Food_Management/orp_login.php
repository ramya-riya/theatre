<?php
session_start();
include("dbconnect.php");
extract($_POST);
$msg="";
if(isset($login))
{
 if(trim($username=="")) { $msg = "Enter the Username"; }
 else if(trim($password=="")) { $msg = "Enter the Password"; }
	else
	{
		if($username=="admin")
		{
			$qry = "select * from admin where username='$username' && password='$password'";
			$exe=mysqli_query($connect,$qry);
			$row=mysqli_fetch_array($exe);
			$num=mysqli_num_rows($exe);
				if($num==1)
				{
				
				$_SESSION['username']=$username;
				header("location:or.php");
				}
				else
				{
				echo "Login Incorrect!";
				}
		}
		
	}	
	
}//login
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
    	<!-- Style --> <link rel="stylesheet" href="style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <div class="fixed-top">


                    <?php include("name.php");?>
                    

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
                <h2>Admin Login</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                           <form name="form1" action="" method="post">
                                <input type="text" class="name" name="username" placeholder="Username" required="">
                                <input type="password" class="password" name="password" placeholder="Password" required="">
								<input type="submit" class="btn btn-success" name="login" value="Sign in">
								<!--<a href="or_reg.php">Register here</a>-->
                          </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>