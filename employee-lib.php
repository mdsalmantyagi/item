<?php
include_once("../includes/db_connect.php");
if($_SERVER['REQUEST_METHOD']==="POST")
//print_r($_POST); die();
{
$user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'"));
    $emp_entity_id=$user['user_entity_id'];
    $emp_entity_business_id=$user['user_entity_business_id'];
    $emp_Entity_business_address_id=$user['user_entity_business_address_id']; 
    $emp_user_id=$_SESSION['user_id'];
  if (isset($_POST['parent'])) {
    $emp_parent_id=$_POST['parent'];
  }else{
    $emp_parent_id='0';
  } 
  if (isset($_POST['caste'])) {
    $emp_caste_id=$_POST['caste'];
  }else{
    $emp_caste_id='0';
  } 
  if (isset($_POST['religion'])) {
    $emp_religion_id=$_POST['religion'];
  }else{
    $emp_religion_id='0';
  } 
  if (isset($_POST['social_group'])) {
    $emp_social_group_category_id=$_POST['social_group'];
  }else{
    $emp_social_group_category_id='0';
  }                              
  if (isset($_POST['nationality'])) {
    $emp_nationality_id=$_POST['nationality'];
  }else{
    $emp_nationality_id='0';
  } 
  if (isset($_POST['marital_status'])) {
    $emp_marital_status_id=$_POST['marital_status'];
  }else{
    $emp_marital_status_id='0';
  }
  if (isset($_POST['isHandicap'])) {
    $emp_isHandicap=$_POST['isHandicap'];
  }else{
    $emp_isHandicap='0';
  }
  if (isset($_POST['handicap'])) {
    $emp_handicap_id=$_POST['handicap'];
  }else{
    $emp_handicap_id='0';
  } 
  if (isset($_POST['gender'])) {
    $emp_gender_id=$_POST['gender'];
  }else{
    $emp_gender_id='0';
  }
  if (isset($_POST['name'])) {
    $emp_emp_name=$_POST['name'];
  }else{
    $emp_emp_name='NULL';
  } 
  if (isset($_POST['dob'])) {
    $emp_dob=$_POST['dob'];
  }else{
    $emp_dob='0000-00-00';
  }  
  if (isset($_FILES['files']['name'])) {
    $emp_profile_pic=$_FILES['files']['name'];
    $tmp=$_FILES['files']['tmp_name'];
  }else{
    $emp_profile_pic='';
    $tmp='';
  } 
  if (isset($_POST['adhaar'])) {
    $emp_adhaar_no=$_POST['adhaar'];
  }else{
    $emp_adhaar_no='NULL';
  } 
  if (isset($_POST['blood'])) {
    $emp_blood_group=$_POST['blood'];
  }else{
    $emp_blood_group='0';
  }
  if (isset($_POST['pan'])) {
    $emp_pan=$_POST['pan'];
  }else{
    $emp_pan='NULL';
  }
  if (isset($_POST['licence'])) {
    $emp_driving_licence_no=$_POST['licence'];
  }else{
    $emp_driving_licence_no='NULL';
  }
  if (isset($_POST['expire'])) {
    $emp_dl_expire_on=$_POST['expire'];
  }else{
    $emp_dl_expire_on='0000-00-00';
  } 
  if (isset($_POST['passport'])) {
    $emp_passport_no=$_POST['passport'];
  }else{
    $emp_passport_no='NULL';
  }  
  if (isset($_POST['personal_mobile'])) {
    $emp_personal_mobile=$_POST['personal_mobile'];
  }else{
    $emp_personal_mobile='NULL';
  } 
  if (isset($_POST['personal_email'])) {
    $emp_personal_email=$_POST['personal_email'];
  }else{
    $emp_personal_email='Null';
  }
  if (isset($_POST['work_phone'])) {
    $emp_work_phone=$_POST['work_phone'];
  }else{
    $emp_work_phone='NULL';
  }
  if (isset($_POST['work_email'])) {
    $emp_work_email=$_POST['work_email'];
  }else{
    $emp_work_email='NULL';
  }
  if (isset($_POST['joining'])) {
    $emp_joining_date=$_POST['joining'];
  }else{
    $emp_joining_date='0000-00-00';
  }
  if (isset($_POST['department'])) {
    $emp_department_id=$_POST['department'];
  }else{
    $emp_department_id='0';
  }
  if (isset($_POST['designation'])) {
    $emp_designation_id=$_POST['designation'];
  }else{
    $emp_designation_id='0';
  }
    if (isset($_POST['report'])) {
    $emp_reports_to_emp_id=$_POST['report'];
  }else{
    $emp_reports_to_emp_id='NULL';
  }
  if (isset($_POST['emp_isActive'])) {
    $emp_isActive=$_POST['emp_isActive'];
  }else{
    $emp_isActive='1';
  }
  if (isset($_POST['Exit'])) {
    $emp_Exit_on=$_POST['Exit'];
  }else{
    $emp_Exit_on='0000-00-00';
  }
$emp_createdBy=$_SESSION['user_id'];
  if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
  } 
$emp_createdOn=date('Y-m-d H:i:s');
$emp_modifyBy=$_SESSION['user_id']; 
$emp_modifyOn=date('Y-m-d H:i:s');                            
if(isset($_POST['emp']))
{
  move_uploaded_file($tmp,"../theme/assets/images/faces/$emp_profile_pic");
    $sql = "UPDATE `employee` SET `emp_entity_id`='".$emp_entity_id."',`emp_entity_business_id`='".$emp_entity_business_id."',`emp_Entity_business_address_id`='".$emp_Entity_business_address_id."',`emp_user_id`='".$emp_user_id."',`emp_parent_id`='".$emp_parent_id."',`emp_caste_id`='".$emp_caste_id."',`emp_religion_id`='".$emp_religion_id."',`emp_social_group_category_id`='".$emp_social_group_category_id."',`emp_nationality_id`='".$emp_nationality_id."',`emp_marital_status_id`='".$emp_marital_status_id."',`emp_isHandicap`='".$emp_isHandicap."',`emp_handicap_id`='".$emp_handicap_id."',`emp_gender_id`='".$emp_gender_id."',`emp_emp_name`='".$emp_emp_name."',`emp_dob`='".$emp_dob."',`emp_profile_pic`='".$emp_profile_pic."',`emp_adhaar_no`='".$emp_adhaar_no."',`emp_blood_group`='".$emp_blood_group."',`emp_pan`='".$emp_pan."',`emp_driving_licence_no`='".$emp_driving_licence_no."',`emp_dl_expire_on`='".$emp_dl_expire_on."',`emp_passport_no`='".$emp_passport_no."',`emp_personal_mobile`='".$emp_personal_mobile."',`emp_personal_email`='".$emp_personal_email."',`emp_work_phone`='".$emp_work_phone."',`emp_work_email`='".$emp_work_email."',`emp_joining_date`='".$emp_joining_date."',`emp_department_id`='".$emp_department_id."',`emp_designation_id`='".$emp_designation_id."',`emp_reports_to_emp_id`='".$emp_reports_to_emp_id."',`emp_isActive`='".$emp_isActive."',`emp_Exit_on`='".$emp_Exit_on."',`emp_modifyBy`='".$emp_modifyBy."',`emp_modifyOn`='".$emp_modifyOn."' WHERE `emp_id`='".$_POST['emp']."'";
  $msg="Record update successfully..";
  $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
} 
else if(isset($_POST['employee_detail_edit_government_id']))
{
    $sql = "UPDATE `employee` SET `emp_user_id`='".$emp_user_id."',`emp_adhaar_no`='".$emp_adhaar_no."',`emp_pan`='".$emp_pan."',`emp_driving_licence_no`='".$emp_driving_licence_no."',`emp_dl_expire_on`='".$emp_dl_expire_on."',`emp_passport_no`='".$emp_passport_no."',`emp_modifyBy`='".$emp_modifyBy."',`emp_modifyOn`='".$emp_modifyOn."' WHERE `emp_id`='".$_POST['employee_detail_edit_government_id']."'";
  $msg="Record update successfully..";
  $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
} else if(isset($_POST['employee-detail-edit-personal']))
{
    $sql = "UPDATE `employee` SET `emp_user_id`='".$emp_user_id."',`emp_social_group_category_id`='".$emp_social_group_category_id."',`emp_nationality_id`='".$emp_nationality_id."',`emp_marital_status_id`='".$emp_marital_status_id."',`emp_isHandicap`='".$emp_isHandicap."',`emp_gender_id`='".$emp_gender_id."',`emp_dob`='".$emp_dob."',`emp_blood_group`='".$emp_blood_group."',`emp_modifyBy`='".$emp_modifyBy."',`emp_modifyOn`='".$emp_modifyOn."' WHERE `emp_id`='".$_POST['employee-detail-edit-personal']."'";
  $msg="Record update successfully..";
  $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}else if(isset($_POST['employee_detail_edit_business']))
{
    $sql = "UPDATE `employee` SET `emp_user_id`='".$emp_user_id."',`emp_personal_mobile`='".$emp_personal_mobile."',`emp_personal_email`='".$emp_personal_email."',`emp_work_phone`='".$emp_work_phone."',`emp_work_email`='".$emp_work_email."',`emp_modifyBy`='".$emp_modifyBy."',`emp_modifyOn`='".$emp_modifyOn."' WHERE `emp_id`='".$_POST['employee_detail_edit_business']."'";
  $msg="Record update successfully..";
  $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
else if(isset($_POST['employee_detail_edit_profile']))
{
  move_uploaded_file($tmp,"../theme/assets/images/faces/$emp_profile_pic");
    $sql = "UPDATE `employee` SET `emp_emp_name`='".$emp_emp_name."',`emp_profile_pic`='".$emp_profile_pic."',`emp_designation_id`='".$emp_designation_id."',`emp_modifyBy`='".$emp_modifyBy."',`emp_modifyOn`='".$emp_modifyOn."' WHERE `emp_id`='".$_POST['employee_detail_edit_profile']."'";
  $msg="Record update successfully..";
  $rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
} 
else if(isset($_GET['del']))
{
  $id = $_GET['del'];
    $sus = "UPDATE `employee` SET `emp_isActive`=0 WHERE `emp_id`='$id'";
    $msg="Record updated successfully..";
    $rs=mysqli_query($conn,$sus) or die(mysqli_error($conn));
}
else
{
  move_uploaded_file($tmp,"../theme/assets/images/faces/$emp_profile_pic");
  $sql = "INSERT INTO `employee`(`emp_entity_id`,`emp_entity_business_id`,`emp_Entity_business_address_id`,`emp_user_id`,`emp_parent_id`,`emp_caste_id`,`emp_religion_id`,`emp_social_group_category_id`,`emp_nationality_id`,`emp_marital_status_id`,`emp_isHandicap`,`emp_handicap_id`,`emp_gender_id`,`emp_emp_name`,`emp_dob`,`emp_profile_pic`,`emp_adhaar_no`,`emp_blood_group`,`emp_pan`,`emp_driving_licence_no`,`emp_dl_expire_on`,`emp_passport_no`,`emp_personal_mobile`,`emp_personal_email`,`emp_work_phone`,`emp_work_email`,`emp_joining_date`,`emp_department_id`,`emp_designation_id`,`emp_reports_to_emp_id`,`emp_isActive`,`emp_Exit_on`,`emp_createdBy`,`emp_createdOn`) VALUES ('".$emp_entity_id."','".$emp_entity_business_id."','".$emp_Entity_business_address_id."','".$emp_user_id."','".$emp_parent_id."','".$emp_caste_id."','".$emp_religion_id."','".$emp_social_group_category_id."','".$emp_nationality_id."','".$emp_marital_status_id."','".$emp_isHandicap."','".$emp_handicap_id."','".$emp_gender_id."','".$emp_emp_name."','".$emp_dob."','".$emp_profile_pic."','".$emp_adhaar_no."','".$emp_blood_group."','".$emp_pan."','".$emp_driving_licence_no."','".$emp_dl_expire_on."','".$emp_passport_no."','".$emp_personal_mobile."','".$emp_personal_email."','".$emp_work_phone."','".$emp_work_email."','".$emp_joining_date."','".$emp_department_id."','".$emp_designation_id."','".$emp_reports_to_emp_id."','".$emp_isActive."','".$emp_Exit_on."','".$emp_createdBy."','".$emp_createdOn."')";
$msg="Record saved successfully..";
$rs=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
}
if($rs)
    {
        header("Location:../employee/view-employee.php?msg=$msg");
    }
?>