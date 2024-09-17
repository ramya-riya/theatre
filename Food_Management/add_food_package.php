<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_POST);
$i=("select * from product");
$qry=mysqli_query($connect, $i);
$rdate=date("d-m-Y");
if(isset($btn)){
    $mq=mysqli_query($connect, "select max(id) from product");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
    if($_FILES['f1']['name']!=""){
        move_uploaded_file($_FILES['f1']['tmp_name'], "upload/".$_FILES['f1']['name']);
        $img="upload/".$_FILES['f1']['name'];
    }
    $i="insert into product(id,package,foodname,price,status,pic,rdate) values($id,'$package','$foodname','$price','0','$img','$rdate')";
    $qry=mysqli_query($connect, $i);
	if($qry)
				{
				//header("location:index.php");
                ?>
                <script language="javascript">
		alert("Registered Successfully");
		window.location.href="add_food_package.php";
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
if(document.form1.package.value=="")
	{
	alert("Choose Package");
	document.form1.package.focus();
	return false;
	}
	if(document.form1.foodname.value=="")
	{
	alert("Enter the Food Name.");
	document.form1.foodname.focus();
	return false;
	}
	
    if(document.form1.price.value=="")
	{
	alert("Enter the Price");
	document.form1.price.focus();
	return false;
	}
    if(document.form1.f1.value=="")
	{
	alert("Upload Food Image");
	document.form1.f1.focus();
	return false;
	}



return true;
}

</script>

</head>

<body>
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
                <h2>Edit Food Package</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                                         <select name="package" class="location">
                                            <option value="">--Choose Package--</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Lunch">Lunch</option>
                                            <option value="Dinner">Dinner</option>
                                         </select>
                                         <input type="text" class="name" name="foodname" placeholder="Food Name" required="">
                                         <input type="text" class="email" name="price" placeholder="Price" required="">
                                         <input type="file" id="f01" class="file" name="f1" placeholder="Add Food Image" required=""><br><br>
										 <input type="submit" class="btn btn-success" name="btn" value="Add">
										 
                  </form>
                 
            </div>
        </div>
    </section>
    <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>Food Menu</h2>
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Total Price</th>
                                    
                                    <th scope="col">Added Date</th>
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
                                        <a href="<?php  echo $row['pic'];?>" target="_blank"><img style="width:100px;height:100px;border-radius:50px" src="<?php  echo $row['pic'];?>" alt=""></a>
                                    </td>
                                    <td>
                                    <?php  echo $row['foodname'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['package'];?>
                                    </td>
                                    
                                    <td>
                                    <?php  echo $row['price'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['rdate'];?>
                                    </td>
                                    
                                  
                                    <td>
                                   <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a> | <a href="add_food_package.php?act=del&id=<?php echo $row['id'];?>">Delete</a>
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
if($_REQUEST['act']=="del")
{
$id=$_REQUEST['id'];
$customer=$_REQUEST['customer'];
$sql=mysqli_query($connect, "delete from product where id='$id'");
echo "
<script>
alert('Deleted');
window.location.href='add_food_package.php';
</script>
";

}

?>

    <?php include("footer.php");?>