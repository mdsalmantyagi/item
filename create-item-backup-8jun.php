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
                                 <div class="col-md-3 mb-0 form-group">
                                    <div class="form-group mb-2">
                                       <div class="form-check form-check-inline m-0">
                                          <label class="form-check-label">
                                          <input type="radio" class="form-check-input"
                                             name="contractor_status" value="2"
                                             id="customCheck-16">
                                          No, Doesn't have variants.
                                          <i class="input-frame"></i></label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3 mb-0 form-group">
                                    <div class="form-group mb-2">
                                       <div class="form-check form-check-inline m-0">
                                          <label class="form-check-label">
                                          <input type="radio" class="form-check-input"
                                             name="contractor_status" value="3"
                                             id="customCheck-17">
                                          Yes, has multiple variants.
                                          <i class="input-frame"></i></label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 yes" targetvalue="general-ra" style="display: none;">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="card">
                                             <div class="card-body">
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
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mb-3 no" style="display: none;">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="form-group col-md-4">
                                                   <label class="control-label">Option 1:<span
                                                      class="text-danger">*</span></label>
                                                   <select name="c_country" class="form-control basic-single" >
                                                      <option value="">Select Country</option>
                                                      <?php   
                                                         $rscountry=mysqli_query($conn,"SELECT * FROM country ORDER BY country_id");
                                                         while($datacountry=mysqli_fetch_array($rscountry))
                                                             {
                                                                 echo '<option value="'.$datacountry['country_id'].'">'.$datacountry['country_name'].'</option>';
                                                             }       
                                                         ?>
                                                   </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                   <label class="control-label">Description: <span class="text-danger">*</span></label>
                                    				<!-- <textarea type="text" name="concern_department" value="Unknown" class="form-control" rows="3" placeholder="Enter Department"></textarea> -->
                                    				<input name="tags" id="tags" value="New" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                   <label class="control-label">Option 2: <span
                                                      class="text-danger">*</span></label>
                                                   <select name="c_state" class="form-control basic-single" >
                                                      <option value="">Select State</option>
                                                      <?php   
                                                         $rsstate=mysqli_query($conn,"SELECT * FROM state");
                                                         while($datastate=mysqli_fetch_array($rsstate))
                                                             {
                                                                 echo '<option value="'.$datastate['state_id'].'">'.$datastate['state_name'].'</option>';
                                                             }       
                                                         ?>
                                                   </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                   <label class="control-label">Description: <span class="text-danger">*</span></label>
                                    				<!-- <textarea type="text" name="concern_department" value="Unknown" class="form-control" rows="3" placeholder="Enter Department"></textarea> -->
                                    				<input name="tags" id="tags" value="New" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                   <label class="control-label">Option 3: <span
                                                      class="text-danger">*</span></label>
                                                   <select name="c_state" class="form-control basic-single" >
                                                      <option value="">Select State</option>
                                                      <?php   
                                                         $rsstate=mysqli_query($conn,"SELECT * FROM state");
                                                         while($datastate=mysqli_fetch_array($rsstate))
                                                             {
                                                                 echo '<option value="'.$datastate['state_id'].'">'.$datastate['state_name'].'</option>';
                                                             }       
                                                         ?>
                                                   </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                   <label class="control-label">Description: <span class="text-danger">*</span></label>
                                    				<!-- <textarea type="text" name="concern_department" value="Unknown" class="form-control" rows="3" placeholder="Enter Department"></textarea> -->
                                    				<input name="tags" id="tags" value="New" />
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col">
                                                   <!-- <div class="table-responsive pt-3 result"></div> -->
                                                   <p id="out"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br/>
                              <!-- <div class="row">
                                 <div class=" col d-flex justify-content-between">
                                    <h5 class=" w-100 card-title text-primary border-bottom">Products</h5>
                                 </div>
                              </div> -->
                              <!-- <div class="row">
                                 <table class="table table-hover">
                                    <thead>
                                       <th>Sr</th>
                                       <th>Item</th>
                                       <th>Spec</th>
                                       <th>Hardware</th>
                                       <th>FR Glass</th>
                                       <th>Value Lakhs</th>
                                       <th>Action</th>
                                    </thead>
                                    <tbody class="detail">
                                       <tr>
                                          <td >1</td>
                                          <td>
                                             <select class="form-control" id="select_dis11" name="item[]" required>
                                                <?php   
                                                   $rsim=mysqli_query($conn,"SELECT * FROM item_m WHERE im_isActive='1'");
                                                   while($dataim=mysqli_fetch_array($rsim))
                                                       {
                                                           echo '<option value="'.$dataim['im_id'].'">'.$dataim['im_title'].'</option>';
                                                       }       
                                                   ?>      
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control" id="select_dis11" name="spec[]">
                                                <?php
                                                   foreach($LeadSpec as $key => $value)
                                                   echo "<option value='$key'>$value</option>";
                                                   ?>     
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control" id="select_dis11" name="hardware[]">
                                                <?php   
                                                   $rshm=mysqli_query($conn,"SELECT * FROM hardware_m WHERE hm_isActive='1'");
                                                   while($datahm=mysqli_fetch_array($rshm))
                                                       {
                                                           echo '<option value="'.$datahm['hm_id'].'">'.$datahm['hm_title'].'</option>';
                                                       }       
                                                   ?>      
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control" id="select_dis11" name="glass[]">
                                                <?php   
                                                   $rsfgm=mysqli_query($conn,"SELECT * FROM fr_glass_m WHERE fgm_isActive='1'");
                                                   while($datafgm=mysqli_fetch_array($rsfgm))
                                                       {
                                                           echo '<option value="'.$datafgm['fgm_id'].'">'.$datafgm['fgm_title'].'</option>';
                                                       }       
                                                   ?>
                                             </select>
                                          </td>
                                          <td><input type="text" class="form-control" value="0" name="amt[]"></td>
                                          <td><a class="remove"><i data-toggle="tooltip"
                                             data-original-title="View lead" class="text-muted ico" data-feather="trash"></i></a></td>
                                       </tr>
                                    </tbody>
                                    <tfoot>
                                       <th  colspan="6"></th>
                                       <th><a id="add" class="add"><i data-toggle="tooltip"
                                          data-original-title="View lead" class="text-muted ico" data-feather="plus"></i></a></th>
                                    </tfoot>
                                 </table>
                              </div> -->
                              <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
                              <script type="text/javascript">  
                                 function addnewrow()   
                                 { 
                                 var maxField =11; 
                                 var n=($('.detail tr').length-0)+1;
                                 if(n < maxField) {
                                 var tr = '<tr>'+  
                                 '<td class="no">'+n+'</td>'+
                                 '<td><select class="form-control select_item" id="select_item12" name="item[]">'+
                                 '<option value="">Select Product</option>'+
                                 '<?php   
                                    $rsim=mysqli_query($conn,"SELECT * FROM item_m WHERE im_isActive='1'");
                                       while($dataim=mysqli_fetch_array($rsim))
                                           {
                                               echo '<option value="'.$dataim['im_id'].'">'.$dataim['im_title'].'</option>';
                                           }
                                    ?>'+
                                 '</select></td>'+
                                 '<td><select class="form-control select_item" id="select_item12" name="spec[]">'+
                                 '<option value="">Select Spec</option>'+
                                 '<option value="1">Yes</option>'+
                                 '<option value="2">No</option>'+
                                 '</select></td>'+ 
                                 '</select></td>'+
                                 '<td><select class="form-control select_item" id="select_item12" name="hardware[]">'+
                                 '<option value="">Select Hardware</option>'+
                                 '<?php
                                    $rshm=mysqli_query($conn,"SELECT * FROM hardware_m WHERE hm_isActive='1'");
                                    while($datahm=mysqli_fetch_array($rshm))
                                        {
                                            echo '<option value="'.$datahm['hm_id'].'">'.$datahm['hm_title'].'</option>';
                                        }    
                                    
                                    ?>'+
                                 '</select></td>'+ 
                                 '</select></td>'+
                                 '<td><select class="form-control select_item" id="select_item12" name="glass[]">'+
                                 '<option value="">Select FR Glass</option>'+
                                 '<?php
                                    $rsfgm=mysqli_query($conn,"SELECT * FROM fr_glass_m WHERE fgm_isActive='1'");
                                        while($datafgm=mysqli_fetch_array($rsfgm))
                                            {
                                                echo '<option value="'.$datafgm['fgm_id'].'">'.$datafgm['fgm_title'].'</option>';
                                            }   
                                    
                                    ?>'+
                                 '</select></td>'+ 
                                 '<td><input type="text" class="form-control" name="amt[]"></td>'+
                                 '<td><a class="remove"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-muted ico" data-toggle="tooltip" data-original-title="View lead"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></td>'+  
                                 '</tr>';  
                                 $('.detail').append(tr);   
                                 } }
                                 
                                 $(function()  
                                 {  
                                 $('#add').click(function()  
                                 {  
                                 addnewrow();  
                                 });  
                                 $('body').delegate('.remove','click',function()  
                                 {  
                                 $(this).parent().parent().remove();
                                 
                                 }); 
                                  
                                 });
                              </script>
                              <br/>
                              <input class="btn btn-primary mb-2 nextBtn float-right" value="Submit" type="submit">
                              <a href="view-lead.php">
                              <button type="button" class="btn btn-danger prevBtn pull-right mr-3 float-right">Back</button>
                              </a>
                           </div>
                        </div>
                     </form>
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