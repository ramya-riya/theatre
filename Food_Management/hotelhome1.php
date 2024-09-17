<?php
session_start();
extract($_POST);
$username=$_SESSION['username'];
include("dbconnect.php");
$rdate=date("d-m-Y");
if(isset($btn)){
    if($_FILES['f1']['name']!=""){
        move_uploaded_file($_FILES['f1']['tmp_name'], "upload/".$_FILES['f1']['name']);
        $img="upload/".$_FILES['f1']['name'];
    }
   

    $i="insert into food_menu(id,name,des,contact,pickup,username,orphanage,rdate,img) values('$id','$name','$des','$contact','$pickup','$username','$orp','$rdate','$img')";

    $qry=mysqli_query($connect, $i);
	if($qry)
				{
				//header("location:index.php");
                ?>
                <script language="javascript">
		alert("Registered Successfully");
		window.location.href="hotelhome.php";
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
    	<!-- Style --> <link rel="stylesheet" href="style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script language="javascript">
        $("input[type=file]").on("change", function(){
  var file = this.files[0].name;
  var dflt = $(this).attr("placeholder");
  if($(this).val()!=""){
    $(this).next().text(file);
  } else {
    $(this).next().text(dflt);
  }
});
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
                <h2>Hotel waste food Donate Form</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                                        <input type="text" class="name" name="name" placeholder="Food Name" required="">
                                         <input type="text" class="email" name="des" placeholder="Description" required="">
										 <input type="text" class="location" name="pickup" placeholder="Your Location" required="">
                                         <input type="text" class="name" name="contact" placeholder="Mobile Number" required=""><br>
                                         <input type="submit" class="btn btn-success" name="btn" value="Add">
                  </form>
                 
            </div>
        </div>
    </section>

    <?php include("footer.php");?>