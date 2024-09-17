<?php
session_start();
include("dbconnect.php"); // Ensure dbconnect.php contains your database connection logic

if(isset($_POST['btn'])) {
    $username = $_SESSION['username'];
    $feed = $_POST['feed'];
    $location = $_POST['location'];
    $rdate = date("d-m-Y");

    // Get max id from feedback table
    $mq = mysqli_query($connect, "SELECT MAX(id) AS max_id FROM feedback");
    $mr = mysqli_fetch_assoc($mq);
    $id = $mr['max_id'] + 1;

    // Insert feedback into feedback table
    $i = "INSERT INTO feedback (id, username, feed, city, rdate) VALUES ('$id', '$username', '$feed', '$location', '$rdate')";
    $qry = mysqli_query($connect, $i);

    if($qry) {
        echo '<script language="javascript">';
        echo 'alert("Registered Successfully");';
        echo 'window.location.href="feed.php";';
        echo '</script>';
    } else {
        echo "Could not Register";
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
    	<!-- Style --> <link rel="stylesheet" href="style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script language="javascript">
function validate()
{
if(document.form1.feed.value=="")
	{
	alert("Enter Youe Feedback");
	document.form1.feed.focus();
	return false;
	}
	if(document.form1.location.value=="")
	{
	alert("Enter Your Location.");
	document.form1.location.focus();
	return false;
	}
	
    

return true;
}

</script>
</head>

<body>
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
                <h2>Feedback</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post">
                        <textarea name="feed" class="feed" rows="4" cols="50" required="">
                        </textarea>
										 <input type="text" class="location" name="location" placeholder="Your City" required=""><br>
                                         
										 <input type="submit" class="btn btn-success" name="btn" value="Submit">
                  </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>
