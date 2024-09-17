<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
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
                <h2>Delivery</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                <div class="h-screen flex-grow-1 overflow-y-lg-auto">

        
       
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Payment</h5>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Pay Id</th>
                                    <th scope="col">Booking Id</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">rdate</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <?php
$i="select * from bill_food where customer='$username'";
     $qry=mysqli_query($connect, $i);
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
                                    <?php  echo $row['id'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['bid'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['customer'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['amount'];?>

                                    </td>
                                    
                                    <td>
                                    <?php  echo $row['rdate'];?>

                                    </td>
                                    
                                    <td><?php 
                                            if($row['d_status']=="0")
                                              {
                                                ?>
                                                <a href="delivery.php?act=pay&id=<?php echo $row['id'];?>&customer=<?php echo $row['customer'];?>&amount=<?php echo $row['amount'];?>">Pay</a>
                                                <?php
                                              }
                                                else if($row['d_status']=="1")
                                                {
                                                   
                                                    echo ' <a style="color:goldenrod" href="map.php?lat='.$row['latitude'].'&lon='.$row['longitude'].'" target="_blank">Track Food</a>';

                                                }
                                                
  
                                            else
                                              {
                                                 echo "Waiting For Process..";
                                              }
                                         ?></td>

                                        
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
if($_REQUEST['act']=="pay")
{
$id=$_REQUEST['id'];
$amount=$_REQUEST['amount'];

extract($_POST);
$msg="";


if(isset($btn))
{
    $up=mysqli_query($connect, "update bill_food set d_status='1' where id='$id'");

	

if($up)
{
?>
<script>
    alert("Successfully Payed!..");
    window.location.href="delivery.php";
</script>
<?php
	}
}
	else
	{
	echo "";
	}



?>
    <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>Pay Bill</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post">
                    Pay Amount

                                         <input type="text" class="name" name="amount" Value="<?php echo $amount;?>" readonly>
                                         <input type="text" class="email" name="name" placeholder="Account Holder Name" required="">
                                         <input type="text" class="email" name="mobile" placeholder="Credit/Debit card Number" required="">
										 <input type="text" class="location" name="location" placeholder="Valid To" required="">
										 <input type="hidden" class="location" name="lat" placeholder="CVV" required="">
										 <input type="hidden" class="location" name="lon" placeholder="Pin" required=""><br>
										 <input type="submit" class="btn btn-success" name="btn" value="Pay">
										 
                  </form>
                 
            </div>
        </div>
    </section>
    <?php
}
?>
      <?php include("footer.php");?>