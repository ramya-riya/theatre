<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
$bid=$_REQUEST['bid'];
$qry = "update food_menu set status='1' where id='$bid'";
$result = mysqli_query($connect,$qry);
if($result)
{
    ?>
    <script language="javascript">
    alert("Home delivered Success");
window.location.href="order.php";
</script>
<?php
}
?>

