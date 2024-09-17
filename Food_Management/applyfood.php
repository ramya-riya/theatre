<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_POST);
$rdate=date("d-m-Y");
$q1=mysqli_query($connect, "select * from product where package='Breakfast'");
$r1=mysqli_fetch_array($q1);
$num=$r1['num_charger'];
$sql = "SELECT * from  product where package like '%Breakfast'";
$result = mysqli_query($connect, $sql);
$rowcount = mysqli_num_rows( $result );
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
       <br><br><br><br>  
	   <section class="mission" id="mission-id" >
        <div class="container" >
            <div class="heading">
               
                
            </div>
            
	<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-8">
			  	<div  align="center">
				<?php
				
				$sql = "SELECT * FROM product GROUP BY package ORDER BY id ASC";
				$result = mysqli_query($connect, $sql);				
				
				$num=mysqli_num_rows($result);
				if($num>0)
				{
			  
			  while($r11=mysqli_fetch_array($result))
			  {
			  ?>
			   <h2><?php echo $r11['package']; ?></h2>
			   <br>
			  <table border="0">
			  
			  <?php
			  	$arr1=array();
				
			  	$q2 = mysqli_query($connect, "select * from product where package='".$r11['package']."'");
				while($r2=mysqli_fetch_array($q2))
				{
				
				$arr1[]=$r2['id'];
				}
				$arr=array_chunk($arr1,5);
				$n=count($arr);
				for($i=0;$i<$n;$i++)
				{
				?>
				<tr>
				<?php		
			  	for($j=0;$j<5;$j++)
				{
				$v=$arr[$i][$j];
					if($v!="")
					{
			  	$q1=mysqli_query($connect,"select * from product where id=$v");
			  	$r1=mysqli_fetch_array($q1);
			  ?>
			  	<td>
				
				
				
			  <table border="1px" class="border">
			  <tr>
			  <td colspan="2">
			  <h3 align="center" class="bg-info"><?php echo $r1['foodname']; ?></h3>			   </td>
			   </tr>
			   <tr>
			   <td colspan="2">
			 <img src="<?php echo $r1['pic']; ?>" width="300" height="100" /></td>
			   </tr>
			   
			   
			   <tr>
                 <th width="126" align="left" scope="row"><strong>Price</strong>:-</th>
			     <td width="172" align="left"><strong><?php echo "Rs.".$r1['price']; ?></strong></td>
		        </tr>
				<tr>
					<td colspan="2">
						<a href="userhome.php?package=<?php echo $r11['package'];?>&foodname=<?php echo $r1['foodname']; ?>&price=<?php echo $r1['price']; ?>&food_id=<?php echo $r1['id']; ?>">Add to Cart</a>
					</td>
				</tr>
			   
			   
			   
			   </table>
			   
			   <br>
			   
			   
			   	</td>
				<?php
					}//if
				}
				?>
			   </tr>
			   <?php
			   }
			   ?>
			   </table>
			   <?php
			  
			  
			  }
			  
			}
		
			
			else
			{
			echo "";
			}
		
			?>
			
			</div>	
  	</div>
	<div class="col-lg-2">
		</div>
</div>
</section> 







    <?php include("footer.php");?>