<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
$id=$_REQUEST['id'];
$s="delete from  food_menu where id='$id'";
$f=mysqli_query($connect, $s);
if($f)
{
    ?>
    <script language="javascript">
        alert("successfully Deleted");
        window.location.href("hotel.php");

        </script>
        <?php
}

?>