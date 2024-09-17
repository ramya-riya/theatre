<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
$i=("select * from food_menu");
$qry=mysqli_query($connect, $i);

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
                <h2>Food Menu Details</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                <div class="h-screen flex-grow-1 overflow-y-lg-auto">
   
       
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Registered Date</th>
                                    <th scope="col">Action</th>



                                </tr>
                            </thead>
                            <?php

   if(mysqli_num_rows($qry)>0){

$cnt=1;
while ($row=mysqli_fetch_array($qry)) {
    
?>  
        
                            <tbody>
                                <tr>
                                    <td>
                                    <?php  echo $cnt;?>
                                    </td>
                                    <td>
                                    <?php  echo $row['foodname'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['quantity'];?>
                                    </td>
                                    
                                    <td>
                                    <?php  echo $row['total'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['username'];?>
                                    </td>
                                    
                                    <td>
                                    <?php  echo $row['description'];?>
                                    </td>

                                   
                                    <td>
                                    <?php  echo $row['location'];
                                    echo ' <a href="map.php?lat='.$row['latitude'].'&lon='.$row['longitude'].'" target="_blank">(Map)</a>';
                                    ?>

                                    </td>
                                    
                                    <td>
                                    <?php  echo $row['rdate'];?>

                                    </td>
                                    
                                    <td>
                                    <?php 
                                    if($row['status']==0)
                                    {
                                        ?>
                                        <a href="confirm_booking.php?bid=<?php echo $row['id'];?>&customer=<?php echo $row['username'];?>">Confirm</a>
                                        <?php
                                    } 
                                    elseif($row['status']==1)
                                    {
                                        ?>
                                        <a href="billing.php?bid=<?php echo $row['id'];?>&customer=<?php echo $row['username'];?>&total=<?php echo $row['total'];?>">bill</a>
                                        <?php
                                    }
                                    else{
                                        echo "Booking Moved To Delivery";
                                    }
                                    ?>

                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                            
                            <?php 
$cnt=$cnt+1;} } else { ?>
  <tr>
    <td colspan="8"> No records Found</td>

  </tr>
   

<?php } ?>
 
                        </table>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
            </div>
        </div>
    </section>
    <?php
if($_REQUEST['act']=="bill")
{
$bid=$_REQUEST['bid'];
$customer=$_REQUEST['customer'];

extract($_POST);
$rdate=date("d-m-Y");


if(isset($btn))
{

	$mq=mysqli_query($connect, "select max(id) from bill_food");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
$ins=mysqli_query($connect, "insert into  bill_food(id,bid,customer,amount,rdate,d_status) values($id,'$bid','$customer','$amount','$rdate','0')");
if($ins)
{
?>
<script>
    alert("Successfully added!..");
    window.location.href="hotel.php";
</script>
<?php
	}
}
	else
	{
	$msg= "Error";
	}



?>
 <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>Billing</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post">
                                        
										 <input type="text" class="location" name="bid" value="<?php echo $bid;?>" readonly>
										 <input type="text" class="location" name="customer" placeholder="<?php echo $customer;?>" readonly>
                                         <input type="text" class="name" name="amount" placeholder="Amount" required="">
										<br>
										 <input type="submit" class="btn btn-success" name="btn" value="Submit">
										 
                  </form>
                 
            </div>
        </div>
    </section>
    <?php
}
?>


<?php include("footer.php");?>