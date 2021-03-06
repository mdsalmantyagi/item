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

$item=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `item` WHERE `item_id`='".$_GET['edit']."'"));
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
                        <h3>Create Item</h3>
                      </div>
                    </div>
                  </div>
                  <form method="POST" action="../lib/item.php" enctype="multipart/form-data"class="form">
                    <div class="row">
                      <div class="col-md-9 stretch-card">
                        <div class="card">
                          <div class="card-body">
                          <div class="row">
                          <div class="form-group col-md-4">
                          <label>Item Type: <span
                            class="text-danger">*</span></label>
                            <select name="type" class="form-control">
                                <option value="">Select Department</option>
                              <?php   
                              $rsitem=mysqli_query($conn,"SELECT * FROM `item_type_m` WHERE `itm_isActive`='1' ORDER BY `itm_id` DESC");
                              while($dataitem=mysqli_fetch_array($rsitem)){
                               if($item['item_type_id']==$dataitem['itm_id']){
                               echo '<option selected="selected" value="'.$dataitem['itm_id'].'">'.$dataitem['itm_title'].'</option>';  
                              }else{
                               echo '<option value="'.$dataitem['itm_id'].'">'.$dataitem['itm_title'].'</option>';
                              } 
                              }      
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label >Item Category: <span
                              class="text-danger">*</span></label>
                              <select name="category" class="form-control">
                                <option value="">Select Item Category</option>
                              <?php   
                              $rscategory=mysqli_query($conn,"SELECT * FROM `item_category_m` WHERE `icm_isActive`='1' ORDER BY `icm_id` DESC");
                              while($datacategory=mysqli_fetch_array($rscategory)){
                               if($item['item_category_id']==$datacategory['icm_id']){
                              echo '<option selected="selected" value="'.$datacategory['icm_id'].'">'.$datacategory['icm_title'].'</option>';  
                              }else{
                               echo '<option value="'.$datacategory['icm_id'].'">'.$datacategory['icm_title'].'</option>'; 
                              }
                              }       
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label >Item Brand: <span
                              class="text-danger">*</span></label>
                              <select name="brand" class="form-control">
                                <option value="">Select Item Brand</option>
                              <?php   
                              $rsbrand=mysqli_query($conn,"SELECT * FROM `item_brand_m` WHERE `ibm_isActive`='1' ORDER BY `ibm_id` DESC");
                              while($databrand=mysqli_fetch_array($rsbrand)){
                               if($item['item_brand_id']==$databrand['ibm_id']){
                              echo '<option selected="selected" value="'.$databrand['ibm_id'].'">'.$databrand['ibm_title'].'</option>';  
                              }else{
                               echo '<option value="'.$databrand['ibm_id'].'">'.$databrand['ibm_title'].'</option>'; 
                              }  
                              }     
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label >SKU No: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="SKU" value="<?=$item['SKU']?>" class="form-control"
                              placeholder="Enter SKU">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Item Barcode: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="barcode" value="<?=$item['item_barcode']?>" class="form-control" placeholder="Enter Barcode">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Item Title: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="title" value="<?=$item['item_title']?>" class="form-control" placeholder="Enter Title">
                          </div>
                           <div class="form-group col-md-4">
                            <label>Short Description: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="short" value="<?=$item['item_short_description']?>" class="form-control" placeholder="Enter Title">
                          </div>
                           <div class="form-group col-md-4">
                            <label>Long Description: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="long" value="<?=$item['item_long_description']?>" class="form-control" placeholder="Enter Title">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Item Unit: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="unit" value="<?=$item['item_unit_id']?>" class="form-control" placeholder="Enter Title">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Item Model No: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="model" value="<?=$item['item_model_no']?>" class="form-control" placeholder="Enter Title">
                          </div>
                           <div class="form-group col-md-4">
                            <label>Item Stock: <span
                              class="text-danger">*</span></label>
                              <input type="text" name="stock" value="<?=$item['item_min_stock_value']?>" class="form-control" placeholder="Enter Title">
                          </div>
                          <div class="form-group col-md-4">
                            <label >Item Option: <span
                              class="text-danger">*</span></label>
                              <select name="option" value="<?=$item['item_id']?>" class="form-control">
                                <option value="">Select Item Option</option>
                              <?php   
                              $rsoption=mysqli_query($conn,"SELECT * FROM `item_options_m` ORDER BY `iom_id` DESC");
                              while($dataoption=mysqli_fetch_array($rsoption)){
                               if($item['item_hasOptions']==$item['iom_id']){
                              echo '<option selected="selected" value="'.$dataoption['iom_id'].'">'.$dataoption['iom_title'].'</option>';  
                              }else{
                                echo '<option value="'.$dataoption['iom_id'].'">'.$dataoption['iom_title'].'</option>';
                              }
                              }       
                              ?>
                              </select>
                          </div> 
                      </div>
                       <input type="hidden" name="it" value="<?=$item['item_id']?>">
                      <div class="row">
                      <div class="col-sm-12 d-flex justify-content-end">
                      <button class="btn btn-danger mr-2" type="button">Back</button>
                      <button type="submit" name="save" class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                    </div>
                          </div>
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
   

   <?php
    foreach($religion as $key => $value)
     echo '<option ' . ($datastd['std_religion_id'] == $key ? "selected" : "") . ' value="' . $key . '">' . $value . '</option>';
    ?>