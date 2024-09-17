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
                <h2>Feedback Details</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-1">
                    
                </div>
                
               

                <div class="h-screen flex-grow-1 overflow-y-lg-auto">
   
       
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                    </div>
                    <?php
$i=("select * from feedback");
     $qry=mysqli_query($connect, $i);
   if(mysqli_num_rows($qry)>0){

$cnt=1;

?>  
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Registered Date</th>


                                </tr>
                            </thead>
                            <?php
                            while ($row=mysqli_fetch_array($qry)) {
                             ?>
        
                            <tbody>
                                <tr>
                                    <td>
                                    <?php  echo $cnt;?>
                                    </td>
                                    <td>
                                    <?php  echo $row['username'];?>
                                    </td>
                                    
                                    
                                    <td>
                                    <?php  echo $row['city'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['feed'];?>
                                    </td>
                                    <td>
                                    <?php  echo $row['rdate'];?>

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
    <?php include("footer.php");?>