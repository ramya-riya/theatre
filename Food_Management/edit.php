<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);
$i=("select * from product");
$qry=mysqli_query($connect, $i);
$rdate=date("d-m-Y");
if(isset($btn)){
    if($_FILES['f1']['name']!=""){
        move_uploaded_file($_FILES['f1']['tmp_name'], "upload/".$_FILES['f1']['name']);
        $img="upload/".$_FILES['f1']['name'];
    }
    $i="update product set package='$package', foodname='$foodname', price='$price', pic='$img' where id='$id'";
    $qry=mysqli_query($connect, $i);
	if($qry)
				{
				//header("location:index.php");
                ?>
                <script language="javascript">
		alert("Edited");
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
                <h2>Add Food Package</h2>
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
										 <input type="submit" class="btn btn-success" name="btn" value="Edit">
										 
                  </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>