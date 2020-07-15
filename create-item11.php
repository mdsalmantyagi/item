<?php 
   include_once("../includes/db_connect.php");
   if($_SESSION["admin"]=="")
   {
     header("location:../index.php");
   }
   include_once("../includes/header.php");
   include_once ("../includes/common-array.php");
    ?>
<div class="main-wrapper">
   <?php include_once("../includes/left-menu.php"); ?>
   <div class="page-wrapper">
      <!-- top navbar start -->
      <?php include_once("../includes/navbar.php"); ?>
      <!-- top navbar end -->
      <div class="page-content">
         <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <div class="email-head-subject">
                        <div class="title d-flex align-items-center justify-content-between">
                           <div class="d-flex align-items-center">
                              <h4>New Item</h4>
                           </div>
                           <!-- <div class="icons">
                              <a href="#addnew" data-toggle="modal" class="icon"><i data-feather="plus" class="text-muted hover-primary-muted" data-toggle="tooltip" title="Add Entity"></i></a>
                              <a href="#" class="icon"><i data-feather="download" class="text-muted hover-primary-muted" data-toggle="tooltip" title="download"></i></a>
                              <a href="#" class="icon"><i data-feather="printer" class="text-muted" data-toggle="tooltip" title="Print"></i></a>
                              </div> -->
                        </div>
                     </div>
                     <form method="POST" action="../lib/lead.php" enctype="multipart/form-data" class="form" id="myform">
                        <div class="row">
                           <div class="col-sm-12">
                              <!-- <div class="row">
                                 <div class=" col d-flex justify-content-between">
                                     <h5 class=" w-100 card-title text-primary border-bottom">Project Details</h5>
                                 </div>
                                 </div> -->
                              <div class="row">
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Item Type: <span class="text-danger">*</span></label>
                                    <!-- <select name="source" class="form-control" id="source-lead"> -->
                                    <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                       <option value="">Select Item type</option>
                                       <?php   
                                          $rsbrand=mysqli_query($conn,"SELECT * FROM `item_type_m` WHERE `itm_isActive`=1 ORDER BY `itm_id` DESC");
                                          while($datab=mysqli_fetch_array($rsbrand)){
                                              echo '<option value="'.$datab['itm_id'].'">'.$datab['itm_title'].'</option>';
                                          }       
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Item Category: <span class="text-danger">*</span></label>
                                    <!-- <select name="source" class="form-control" id="source-lead"> -->
                                    <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                       <option value="">Select Item Category</option>
                                       <?php   
                                          $rscat=mysqli_query($conn,"SELECT * FROM `item_category_m` WHERE `icm_isActive`=1 ORDER BY `icm_id` DESC");
                                          while($datacat=mysqli_fetch_array($rscat)){
                                              echo '<option value="'.$datacat['icm_id'].'">'.$datacat['icm_title'].'</option>';
                                          }       
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Brand: <span class="text-danger">*</span></label>
                                    <!-- <select name="source" class="form-control" id="source-lead"> -->
                                    <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                       <option value="">Select Item Brand</option>
                                      <?php   
                                          $rsb=mysqli_query($conn,"SELECT * FROM `item_brand_m` WHERE `ibm_isActive`=1 ORDER BY `ibm_id` DESC");
                                          while($databrand=mysqli_fetch_array($rsb)){
                                              echo '<option value="'.$databrand['ibm_id'].'">'.$databrand['ibm_title'].'</option>';
                                          }       
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Measuring Unit:<span
                                       class="text-danger">*</span></label>
                                    <select name="project_country" class="form-control basic-single" required>
                                       <option value="">Select Unit</option>
                                       <?php   
                                          $rscountry=mysqli_query($conn,"SELECT * FROM country ORDER BY country_id");
                                          while($datacountry=mysqli_fetch_array($rscountry))
                                              {
                                                  echo '<option value="'.$datacountry['country_id'].'">'.$datacountry['country_name'].'</option>';
                                              }       
                                          ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-md-12">
                                    <label class="control-label">Item Name: <span
                                       class="text-danger">*</span></label>
                                    <input type="text" name="project_title" class="form-control"
                                       placeholder="Enter Item Name" required>
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="control-label">Description: <span class="text-danger">*</span></label>
                                    <textarea type="text" name="concern_department" value="Unknown" class="form-control" rows="5" placeholder="Enter Department"></textarea>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class=" col d-flex justify-content-between">
                                    <h5 class=" w-100 card-title text-primary border-bottom">This product has multiple options, like different sizes or colors.</h5>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12 yes" targetvalue="general-ra" style="display:;">
                                    <div class="row">
                                       <div class="form-group col-md-3">
                                          <label class="control-label">SKU:<span
                                             class="text-danger">*</span></label>
                                          <input type="text" name="c_title" class="form-control" value="" placeholder="Enter SKU"> 
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label class="control-label">Barcode:<span
                                             class="text-danger">*</span></label>
                                          <input type="text" name="c_title" class="form-control" value="" placeholder="Enter Barcode">   
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label class="control-label">Inventory:<span
                                             class="text-danger">*</span></label>
                                          <input type="number" name="c_title" class="form-control" value="" placeholder="Enter stock">
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label class="control-label">Compare Price:<span
                                             class="text-danger">*</span></label>
                                          <input type="number" name="c_title" class="form-control" value="" placeholder="Enter Price">
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label class="control-label">Sell Price:<span
                                             class="text-danger">*</span></label>
                                          <input type="number" name="c_title" class="form-control" value="" placeholder="Enter Price">
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label class="control-label">Grade type: <span class="text-danger">*</span></label>
                                          <!-- <select name="source" class="form-control" id="source-lead"> -->
                                          <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                             <option value="">Select Grade type</option>
                                             <?php   
                                                $rsbrand=mysqli_query($conn,"SELECT * FROM `item_type_m` WHERE `itm_isActive`=1 ORDER BY `itm_id` DESC");
                                                while($datab=mysqli_fetch_array($rsbrand)){
                                                    echo '<option value="'.$datab['itm_id'].'">'.$datab['itm_title'].'</option>';
                                                }       
                                                ?>
                                          </select>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                              <br/>
                              <input class="btn btn-primary mb-2 nextBtn float-right" value="Submit" type="submit">
                              <a href="view-lead.php">
                              <button type="button" class="btn btn-danger prevBtn pull-right mr-3 float-right">Back</button>
                              </a>
                           </div>
                        </div>
                     </form>
                     <div class="row">
                       <div class="col-md-12 grid-margin">
                        <form action="/file-upload" class="dropzone" id="exampleDropzone"></form>
                      </div>
                    </div>
                     <!-- *************PAGINATION**************** -->
                     <!-- *************PAGINATION**************** -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- *************PHP**************** -->
      <!-- *************PHP**************** -->
      <!-- Footer -->
      <?php include_once("../includes/footer.php"); ?>
      <!-- Footer END -->
   </div>
</div>
<!--start jquery part-->
<?php include_once("../includes/common-jquery-part.php"); ?>
<!--end jquery part-->
<script>
   $(document).ready(function(){
   $("select.target").change(function(){
   var selectedStudent=$(this).children("option:selected").val();
   $("#parentDetail").load("ajaxchange.php",{
       std_id:selectedStudent
   });
   });
   });
</script>
<!--End Get all parent Details-->
<!--Get all guardian Details-->
<script>
   $(document).ready(function(){
   $("select.parentType").change(function(){
   var selectedGuardian=$(this).children("option:selected").val();
   if(selectedGuardian == '2') {
   $("#guardianDetail").load("ajax-guardian.php",{
       parent_type:selectedGuardian
   });
   }
   });
   });      
</script>    
<!--End Get all guardian Details-->
<!--Get all parent Address-->
<script>
   $(document).ready(function(){
   $("select.target").change(function(){
   var selectedStudent=$(this).children("option:selected").val();
   $("#parentAddress").load("ajax-address.php",{
       std_id:selectedStudent
   });
   });
   });
</script>       
<!--End Get all parent Address-->
<script>
   $(".basic-single").select2({ 
       width: '100%',
     });
</script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script> -->
 <!-- <script>
   $(document).ready(function(){
       $("#myinput").on("change", function(){
           // Print entered value in a div box
           $(".result").html("<table class='table table-dark'><thead><tr>Name</tr></thead><tbody><tr>Cedric Kelly</tr></tbody></table>");
       });
   });
</script> -->
<!-- <script>
   let $ = s => [].slice.call(document.querySelectorAll(s));

   // log events as they happen:
   let t = $('#tags')[0];
   t.addEventListener('input', log);
   t.addEventListener('change', log);
   function log(e) {
       $('#out')[0].textContent = `${e.type}: ${this.value.replace(/,/g,', ')}`;
   }

   // hook 'em up:
   $('input[type="tags"]').forEach(tagsInput);
</script> -->