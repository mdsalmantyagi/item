<?php
include_once("../includes/db_connect.php");
if($_SERVER['REQUEST_METHOD']==="POST"){
	//print_r($_POST); die;
  if (isset($_POST['country_name'])) {
     $country_name=$_POST['country_name'];
  }else{
     $country_name='NULL';
  }
  if (isset($_POST['country_isd'])) {
     $country_isd_code=$_POST['country_isd'];
  }else{
     $country_isd_code='NULL';
  }
  if (isset($_POST['country_alias'])) {
     $country_Alias=$_POST['country_alias'];
  }else{
     $country_Alias='NULL';
  }
  if (isset($_POST['country_code'])) {
     $country_code=$_POST['country_code'];
  }else{
     $country_code='NULL';
  }
 if (isset($_POST['cou'])) {
 	$sql = "UPDATE `country` SET `country_name`='".$country_name."',`country_isd_code`='".$country_isd_code."',`country_Alias`='".$country_Alias."',`country_Code`='".$country_code."' WHERE country_id='".$_POST['cou']."'";
 	 $msg="Country Update Successfully..";
 	 $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
 }else{
    $sql = "INSERT INTO country(`country_name`,`country_isd_code`,`country_Alias`,`country_Code`)VALUES('".$country_name."','".$country_isd_code."','".$country_Alias."','".$country_code."')";
    $msg="Country Saved Successfully..";
    $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));

   }
}
else if (isset($_GET['rd'])) {
   $sql="UPDATE country SET country_isActive=0 WHERE country_id='".$_GET['rd']."'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $msg="Record suspend successfully..";
  }
   if($rs)
    {
      header("Location:../country/view-country.php?&msg=$msg");
    }
?>