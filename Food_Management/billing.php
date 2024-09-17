<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);
$rdate=date("d-m-Y");
if(isset($btn))
{

	$mq=mysqli_query($connect, "select max(id) from bill_food");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
$ins=mysqli_query($connect, "insert into bill_food(id,bid,customer,amount,rdate,d_status) values($id,'$bid','$customer','$amount','$rdate','0')");
$i=mysqli_query($connect, "update food_menu set status='2' where id='$bid'");
if($ins)
{
?>
<script>
    alert("Successfully added!..");
    window.location.href="order.php";
</script>
<?php
	}
}
	else
	{
	$msg= "Error";
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
</head>
<body>
    <div class="fixed-top">
<?php include("name6.php");?>
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
                <h2>Billing</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post"><br>
                                          Booking ID
										 <input type="text" class="location" name="bid" value="<?php echo $bid;?>" readonly><br>
                                         Customer Name
										 <input type="text" class="location" name="customer" value="<?php echo $customer;?>" readonly><br>
                                         Price
                                         <input type="text" class="name" name="amount" value=<?php echo $total;?> readonly>
										<br>
										 <input type="submit" class="btn btn-success" name="btn" value="Submit">
										 
                  </form>
                 
            </div>
        </div>
    </section>
    
    <?php include("footer.php");?>