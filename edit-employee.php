<?php 
include_once("../includes/db_connect.php"); 
if((!isset($_SESSION['admin']) && $_SESSION['admin'] == ''))
{
  header("location:../index.php");
}
include_once("../includes/header.php"); 
include_once("../includes/common-array.php");
include_once("../includes/left-menu.php"); 
include_once("../includes/navbar.php");
include_once("../includes/function.php");

$dataemp=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `employee` WHERE emp_id='1'"));
?>
  <div class="main-wrapper">
    <div class="page-wrapper">
      <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="email-head-subject pb-1">
                  <div class="title d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center">
                        <h3>Edit Item</h3>
                      </div>
                      <div class="icons">
                        <a href="#addnew" data-toggle="modal" class="icon"><i data-feather="plus" class="text-muted hover-primary-muted" data-toggle="tooltip" title="Add Employee"></i></a>
                      </div>
                    </div>
                  </div>
                  <form method="POST" action="../lib/employee.php" enctype="multipart/form-data"class="form">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>Name: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Your Name.">
                      </div>
                      <div class="form-group col-md-3">
                        <label >Date Of Birth: <span
                          class="text-danger">*</span></label>
                         
                          <div class="input-group date datepicker">
                            <input type="text" name="admission_date" class="form-control" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" id="datepicker3"> <span class="input-group-addon"><i data-feather="calendar"></i></span>
                          </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Aadhar No: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="adhaar" class="form-control "
                          placeholder="Enter Aadhar No.">
                      </div>
                      <div class="form-group col-md-3">
                        <label >PAN No: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="pan" class="form-control"
                          placeholder="Enter PAN">
                      </div>
                      <div class="form-group col-md-3">
                        <label>DL No: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="licence" class="form-control" placeholder="Enter DL No.">
                      </div>
                      <div class="form-group col-md-3">
                        <label >DL Expire: <span
                          class="text-danger">*</span></label>
                         
                          <div class="input-group date datepicker">
                            <input type="text" name="admission_date" class="form-control" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" id="datepicker3"> <span class="input-group-addon"><i data-feather="calendar"></i></span>
                          </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Passport No:</label>
                          <input type="text" name="passport" class="form-control "
                          placeholder="Enter Passport No.">
                      </div>
                      <div class="form-group col-md-3">
                        <label >Mobile No: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="personal_mobile" class="form-control"
                          placeholder="Enter Mobile No.">
                      </div>
                      <div class="form-group col-md-3">
                        <label>E-mail: <span
                          class="text-danger">*</span></label>
                          <input type="text" name="personal_email" class="form-control" placeholder="Enter E-mail Id">
                      </div>
                      <div class="form-group col-md-3">
                        <label >Work Phone No:</label>
                          <input type="text" name="work_phone" class="form-control "
                          placeholder="Enter Work Phone No.">
                      </div>
                      <div class="form-group col-md-3">
                        <label >Work E-mail ID: </label>
                          <input type="text" name="work_email" class="form-control"
                          placeholder="Enter  Work E-mail Id">
                      </div>
                      <div class="form-group col-md-3">
                        <label >Joining Date: <span
                          class="text-danger">*</span></label>
                          <div class="input-group date datepicker">
                            <input type="text" name="joining" class="form-control" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" id="datepicker3"> <span class="input-group-addon"><i data-feather="calendar"></i></span>
                          </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Blood Group: <span
                          class="text-danger">*</span></label>
                          <select name="blood" class="form-control">
                            <option value="">Select Blood Group</option>
                            <?php
                             foreach($blood_group as $key => $value)
                             echo '<option ' . ($dataemp['emp_blood_group'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Gender: <span
                          class="text-danger">*</span></label>
                          <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <?php
                              foreach($gendersArray as $key => $value)
                              echo '<option ' . ($dataemp['emp_gender_id'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Marital Status: <span
                          class="text-danger">*</span></label>
                          <select name="marital_status" class="form-control">
                            <option value="">Select Status</option>
                            <?php
                              foreach($marital_status as $key => $value)
                              echo '<option ' . ($dataemp['emp_marital_status_id'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Nationality: <span
                          class="text-danger">*</span></label>
                          <select name="nationality" class="form-control basic-single">
                                     <?php   
                                        $rscountry=mysqli_query($conn,"SELECT * FROM country ORDER BY country_id");
                                        while($datacountry=mysqli_fetch_array($rscountry))
                                        {
                                          if($datacountry['country_id']==$dataemp['emp_nationality_id']){
                                          echo '<option selected="selected" value="'.$datacountry['country_id'].'">'.$datacountry['country_name'].'</option>';
                                          }else{
                                          echo '<option value="'.$datacountry['country_id'].'">'.$datacountry['country_name'].'</option>';  
                                          }
                                        }       
                                        ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Caste: <span
                          class="text-danger">*</span></label>
                          <select name="caste" class="form-control">
                            <option value="">Select Caste</option>
                            <?php   
                            $rscaste=mysqli_query($conn,"SELECT * FROM caste ORDER BY caste_id");
                            while($datacaste=mysqli_fetch_array($rscaste))
                                  {
                                  if($datacaste['caste_id']==$dataemp['emp_caste_id']){
                                  echo '<option selected="selected" value="'.$datacaste['caste_id'].'">'.$datacaste['caste_title'].'</option>';
                                  }else{
                                  echo '<option value="'.$datacaste['caste_id'].'">'.$datacaste['caste_title'].'</option>';  
                                  }
                            }       
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Religion: <span
                          class="text-danger">*</span></label>
                          <select name="religion" class="form-control">
                            <option value="">Select Religion</option>
                            <?php
                            foreach($religion as $key => $value)
                              echo '<option ' . ($dataemp['emp_religion_id'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Social Group: <span
                          class="text-danger">*</span></label>
                          <select name="social_group" class="form-control">
                            <option value="">Select Social Group</option>
                            <?php   
                            $rssocial=mysqli_query($conn,"SELECT * FROM `social_group_category` ORDER BY sgc_id");
                            while($datasocial=mysqli_fetch_array($rssocial))
                              {
                                if($datasocial['sgc_id']==$dataemp['emp_social_group_category_id']){
                                echo '<option selected="selected" value="'.$datasocial['sgc_id'].'">'.$datasocial['sgc_title'].'</option>';
                                }else{
                                echo '<option value="'.$datasocial['sgc_id'].'">'.$datasocial['sgc_title'].'</option>';  
                                }
                            }       
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Department: <span
                          class="text-danger">*</span></label>
                          <select name="department" class="form-control">
                            <option value="">Select Department</option>
                            <?php   
                              $rsdepart=mysqli_query($conn,"SELECT * FROM `department_m` WHERE  dm_isActive='1' ORDER BY dm_id");
                              while($datadepart=mysqli_fetch_array($rsdepart)){
                                if($datadepart['dm_id']==$dataemp['emp_department_id']){
                                echo '<option selected="selected" value="'.$datadepart['dm_id'].'">'.$datadepart['dm_title'].'</option>'; 
                                }else{
                                 echo '<option value="'.$datadepart['dm_id'].'">'.$datadepart['dm_title'].'</option>';  
                                } 
                              }       
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label >Designation: <span
                          class="text-danger">*</span></label>
                          <select name="designation" class="form-control">
                            <option value="">Select Designation</option>
                            <?php
                            foreach($designation as $key => $value)
                              echo '<option ' . ($dataemp['emp_designation_id'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                  <!--     <div class="form-group col-md-3">
                    <label>Profile Image: <span class="text-danger">*</span></label>
                    <input type="file" name="files" class="file-upload-default">
                    <div class="input-group">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div> -->
                      <div class="form-group col-md-3">
                        <label >Is Handicap:</label>
                          <div class="form-check form-check-flat form-check-primary mt-1">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="customCheck-11">
                          <i class="input-frame"></i></label>
                        </div>
                      </div>
                      <div class="form-group col-md-3 hancicap" id="showstd" style="display: none;">
                        <label >Handicap:</label>
                          <select class="form-control">
                            <option value="">Select Handicap</option>
                             <?php
                            foreach($isHandicap as $key => $value)
                              echo '<option ' . ($dataemp['isHandicap'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
                            ?>
                          </select>
                      </div>
                    </div>
                    <!-- value="<?=$dataemp['emp_id'];?>" -->
                    <div class="row">
                      <div class="col-sm-12 d-flex justify-content-end">
                        <a href="view-employee.php">
                      <button class="btn btn-danger mr-2" type="button">Back</button>
                    </a>
                      <input type="hidden" name="emp" value="3" />
                      <button type="submit" name="save" class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </div>
  </div>  
      <!-- Footer -->
      <?php include_once("../includes/footer.php"); ?>
      <!-- Footer END -->
  
    </div>
  </div>
    <!--start jquery part-->
    <?php include_once("../includes/common-jquery-part.php"); ?>
    <!--end jquery part-->
    <script>
    $(".basic-single").select2({ 
        width: '100%',
      });
    </script>
    <script>
        $(function () {
        $("#customCheck-11").click(function () {
            if ($(this).is(":checked")) {
                $("#showstd").show(1000);
            }else {
                $('#showstd').hide(1000);
            }
        });
    });
    </script>
   