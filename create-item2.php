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
                                       <option value="1">Cold Call</option>
                                       <option value="2">Referral</option>
                                       <option value="3">Word Of Mouth</option>
                                       <option value="4">Website</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Item Category: <span class="text-danger">*</span></label>
                                    <!-- <select name="source" class="form-control" id="source-lead"> -->
                                    <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                       <option value="">Select Item Category</option>
                                       <option value="1">Cold Call</option>
                                       <option value="2">Referral</option>
                                       <option value="3">Word Of Mouth</option>
                                       <option value="4">Website</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Brand: <span class="text-danger">*</span></label>
                                    <!-- <select name="source" class="form-control" id="source-lead"> -->
                                    <select name="source" required class="form-control source-lead" id="sourceleadselector">
                                       <option value="">Select Item Brand</option>
                                       <option value="1">Cold Call</option>
                                       <option value="2">Referral</option>
                                       <option value="3">Word Of Mouth</option>
                                       <option value="4">Website</option>
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
                                    				<input name="tags" value="New" id="tags"/>
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
                                    				<input name="tags" id="tagss" value="New" />
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
                                                <!-- <input type="text" value="" class="form-control" data-role="tagsinput" placeholder="Add tags" /> -->
                                    				<input name="tags" id="getinput" value="New" onchange="getInputValue();" />
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col">
                                                   <p id="demo"></p>
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
                              <!-- <script type="text/javascript">  
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
                              </script> -->
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

<script>
        function getInputValue(){
            // Selecting the input element and get its value 
            var inputVal = document.getElementById("getinput").value;
            
            // Displaying the value
            //alert(inputVal);
          document.getElementById("demo").innerHTML = inputVal;
        }
    </script>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script> -->
 <!-- <script>
   $(document).ready(function(){
       $("#tags").on("change", function(){
           // Print entered value in a div box
           $("#out").html("<h3>variants goes hare</h3>");
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

<script type="text/javascript">
   (function ($) {
  "use strict";

  var defaultOptions = {
    tagClass: function(item) {
      return 'label label-info';
    },
    itemValue: function(item) {
      return item ? item.toString() : item;
    },
    itemText: function(item) {
      return this.itemValue(item);
    },
    itemTitle: function(item) {
      return null;
    },
    freeInput: true,
    addOnBlur: true,
    maxTags: undefined,
    maxChars: undefined,
    confirmKeys: [13, 44],
    delimiter: ',',
    delimiterRegex: null,
    cancelConfirmKeysOnEmpty: true,
    onTagExists: function(item, $tag) {
      $tag.hide().fadeIn();
    },
    trimValue: false,
    allowDuplicates: false
  };

  /**
   * Constructor function
   */
  function TagsInput(element, options) {
    this.itemsArray = [];

    this.$element = $(element);
    this.$element.hide();

    this.isSelect = (element.tagName === 'SELECT');
    this.multiple = (this.isSelect && element.hasAttribute('multiple'));
    this.objectItems = options && options.itemValue;
    this.placeholderText = element.hasAttribute('placeholder') ? this.$element.attr('placeholder') : '';
    this.inputSize = Math.max(1, this.placeholderText.length);

    this.$container = $('<div class="bootstrap-tagsinput"></div>');
    this.$input = $('<input type="text" placeholder="' + this.placeholderText + '"/>').appendTo(this.$container);

    this.$element.before(this.$container);

    this.build(options);
  }

  TagsInput.prototype = {
    constructor: TagsInput,

    /**
     * Adds the given item as a new tag. Pass true to dontPushVal to prevent
     * updating the elements val()
     */
    add: function(item, dontPushVal, options) {
      var self = this;

      if (self.options.maxTags && self.itemsArray.length >= self.options.maxTags)
        return;

      // Ignore falsey values, except false
      if (item !== false && !item)
        return;

      // Trim value
      if (typeof item === "string" && self.options.trimValue) {
        item = $.trim(item);
      }

      // Throw an error when trying to add an object while the itemValue option was not set
      if (typeof item === "object" && !self.objectItems)
        throw("Can't add objects when itemValue option is not set");

      // Ignore strings only containg whitespace
      if (item.toString().match(/^\s*$/))
        return;

      // If SELECT but not multiple, remove current tag
      if (self.isSelect && !self.multiple && self.itemsArray.length > 0)
        self.remove(self.itemsArray[0]);

      if (typeof item === "string" && this.$element[0].tagName === 'INPUT') {
        var delimiter = (self.options.delimiterRegex) ? self.options.delimiterRegex : self.options.delimiter;
        var items = item.split(delimiter);
        if (items.length > 1) {
          for (var i = 0; i < items.length; i++) {
            this.add(items[i], true);
          }

          if (!dontPushVal)
            self.pushVal();
          return;
        }
      }

      var itemValue = self.options.itemValue(item),
          itemText = self.options.itemText(item),
          tagClass = self.options.tagClass(item),
          itemTitle = self.options.itemTitle(item);

      // Ignore items allready added
      var existing = $.grep(self.itemsArray, function(item) { return self.options.itemValue(item) === itemValue; } )[0];
      if (existing && !self.options.allowDuplicates) {
        // Invoke onTagExists
        if (self.options.onTagExists) {
          var $existingTag = $(".tag", self.$container).filter(function() { return $(this).data("item") === existing; });
          self.options.onTagExists(item, $existingTag);
        }
        return;
      }

      // if length greater than limit
      if (self.items().toString().length + item.length + 1 > self.options.maxInputLength)
        return;

      // raise beforeItemAdd arg
      var beforeItemAddEvent = $.Event('beforeItemAdd', { item: item, cancel: false, options: options});
      self.$element.trigger(beforeItemAddEvent);
      if (beforeItemAddEvent.cancel)
        return;

      // register item in internal array and map
      self.itemsArray.push(item);

      // add a tag element

      var $tag = $('<span class="tag ' + htmlEncode(tagClass) + (itemTitle !== null ? ('" title="' + itemTitle) : '') + '">' + htmlEncode(itemText) + '<span data-role="remove"></span></span>');
      $tag.data('item', item);
      self.findInputWrapper().before($tag);
      $tag.after(' ');

      // add <option /> if item represents a value not present in one of the <select />'s options
      if (self.isSelect && !$('option[value="' + encodeURIComponent(itemValue) + '"]',self.$element)[0]) {
        var $option = $('<option selected>' + htmlEncode(itemText) + '</option>');
        $option.data('item', item);
        $option.attr('value', itemValue);
        self.$element.append($option);
      }

      if (!dontPushVal)
        self.pushVal();

      // Add class when reached maxTags
      if (self.options.maxTags === self.itemsArray.length || self.items().toString().length === self.options.maxInputLength)
        self.$container.addClass('bootstrap-tagsinput-max');

      self.$element.trigger($.Event('itemAdded', { item: item, options: options }));
    },

    /**
     * Removes the given item. Pass true to dontPushVal to prevent updating the
     * elements val()
     */
    remove: function(item, dontPushVal, options) {
      var self = this;

      if (self.objectItems) {
        if (typeof item === "object")
          item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  self.options.itemValue(item); } );
        else
          item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  item; } );

        item = item[item.length-1];
      }

      if (item) {
        var beforeItemRemoveEvent = $.Event('beforeItemRemove', { item: item, cancel: false, options: options });
        self.$element.trigger(beforeItemRemoveEvent);
        if (beforeItemRemoveEvent.cancel)
          return;

        $('.tag', self.$container).filter(function() { return $(this).data('item') === item; }).remove();
        $('option', self.$element).filter(function() { return $(this).data('item') === item; }).remove();
        if($.inArray(item, self.itemsArray) !== -1)
          self.itemsArray.splice($.inArray(item, self.itemsArray), 1);
      }

      if (!dontPushVal)
        self.pushVal();

      // Remove class when reached maxTags
      if (self.options.maxTags > self.itemsArray.length)
        self.$container.removeClass('bootstrap-tagsinput-max');

      self.$element.trigger($.Event('itemRemoved',  { item: item, options: options }));
    },

    /**
     * Removes all items
     */
    removeAll: function() {
      var self = this;

      $('.tag', self.$container).remove();
      $('option', self.$element).remove();

      while(self.itemsArray.length > 0)
        self.itemsArray.pop();

      self.pushVal();
    },

    /**
     * Refreshes the tags so they match the text/value of their corresponding
     * item.
     */
    refresh: function() {
      var self = this;
      $('.tag', self.$container).each(function() {
        var $tag = $(this),
            item = $tag.data('item'),
            itemValue = self.options.itemValue(item),
            itemText = self.options.itemText(item),
            tagClass = self.options.tagClass(item);

          // Update tag's class and inner text
          $tag.attr('class', null);
          $tag.addClass('tag ' + htmlEncode(tagClass));
          $tag.contents().filter(function() {
            return this.nodeType == 3;
          })[0].nodeValue = htmlEncode(itemText);

          if (self.isSelect) {
            var option = $('option', self.$element).filter(function() { return $(this).data('item') === item; });
            option.attr('value', itemValue);
          }
      });
    },

    /**
     * Returns the items added as tags
     */
    items: function() {
      return this.itemsArray;
    },

    /**
     * Assembly value by retrieving the value of each item, and set it on the
     * element.
     */
    pushVal: function() {
      var self = this,
          val = $.map(self.items(), function(item) {
            return self.options.itemValue(item).toString();
          });

      self.$element.val(val, true).trigger('change');
    },

    /**
     * Initializes the tags input behaviour on the element
     */
    build: function(options) {
      var self = this;

      self.options = $.extend({}, defaultOptions, options);
      // When itemValue is set, freeInput should always be false
      if (self.objectItems)
        self.options.freeInput = false;

      makeOptionItemFunction(self.options, 'itemValue');
      makeOptionItemFunction(self.options, 'itemText');
      makeOptionFunction(self.options, 'tagClass');

      // Typeahead Bootstrap version 2.3.2
      if (self.options.typeahead) {
        var typeahead = self.options.typeahead || {};

        makeOptionFunction(typeahead, 'source');

        self.$input.typeahead($.extend({}, typeahead, {
          source: function (query, process) {
            function processItems(items) {
              var texts = [];

              for (var i = 0; i < items.length; i++) {
                var text = self.options.itemText(items[i]);
                map[text] = items[i];
                texts.push(text);
              }
              process(texts);
            }

            this.map = {};
            var map = this.map,
                data = typeahead.source(query);

            if ($.isFunction(data.success)) {
              // support for Angular callbacks
              data.success(processItems);
            } else if ($.isFunction(data.then)) {
              // support for Angular promises
              data.then(processItems);
            } else {
              // support for functions and jquery promises
              $.when(data)
               .then(processItems);
            }
          },
          updater: function (text) {
            self.add(this.map[text]);
            return this.map[text];
          },
          matcher: function (text) {
            return (text.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1);
          },
          sorter: function (texts) {
            return texts.sort();
          },
          highlighter: function (text) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return text.replace( regex, "<strong>$1</strong>" );
          }
        }));
      }

      // typeahead.js
      if (self.options.typeaheadjs) {
          var typeaheadConfig = null;
          var typeaheadDatasets = {};

          // Determine if main configurations were passed or simply a dataset
          var typeaheadjs = self.options.typeaheadjs;
          if ($.isArray(typeaheadjs)) {
            typeaheadConfig = typeaheadjs[0];
            typeaheadDatasets = typeaheadjs[1];
          } else {
            typeaheadDatasets = typeaheadjs;
          }

          self.$input.typeahead(typeaheadConfig, typeaheadDatasets).on('typeahead:selected', $.proxy(function (obj, datum) {
            if (typeaheadDatasets.valueKey)
              self.add(datum[typeaheadDatasets.valueKey]);
            else
              self.add(datum);
            self.$input.typeahead('val', '');
          }, self));
      }

      self.$container.on('click', $.proxy(function(event) {
        if (! self.$element.attr('disabled')) {
          self.$input.removeAttr('disabled');
        }
        self.$input.focus();
      }, self));

        if (self.options.addOnBlur && self.options.freeInput) {
          self.$input.on('focusout', $.proxy(function(event) {
              // HACK: only process on focusout when no typeahead opened, to
              //       avoid adding the typeahead text as tag
              if ($('.typeahead, .twitter-typeahead', self.$container).length === 0) {
                self.add(self.$input.val());
                self.$input.val('');
              }
          }, self));
        }


      self.$container.on('keydown', 'input', $.proxy(function(event) {
        var $input = $(event.target),
            $inputWrapper = self.findInputWrapper();

        if (self.$element.attr('disabled')) {
          self.$input.attr('disabled', 'disabled');
          return;
        }

        switch (event.which) {
          // BACKSPACE
          case 8:
            if (doGetCaretPosition($input[0]) === 0) {
              var prev = $inputWrapper.prev();
              if (prev.length) {
                self.remove(prev.data('item'));
              }
            }
            break;

          // DELETE
          case 46:
            if (doGetCaretPosition($input[0]) === 0) {
              var next = $inputWrapper.next();
              if (next.length) {
                self.remove(next.data('item'));
              }
            }
            break;

          // LEFT ARROW
          case 37:
            // Try to move the input before the previous tag
            var $prevTag = $inputWrapper.prev();
            if ($input.val().length === 0 && $prevTag[0]) {
              $prevTag.before($inputWrapper);
              $input.focus();
            }
            break;
          // RIGHT ARROW
          case 39:
            // Try to move the input after the next tag
            var $nextTag = $inputWrapper.next();
            if ($input.val().length === 0 && $nextTag[0]) {
              $nextTag.after($inputWrapper);
              $input.focus();
            }
            break;
         default:
             // ignore
         }

        // Reset internal input's size
        var textLength = $input.val().length,
            wordSpace = Math.ceil(textLength / 5),
            size = textLength + wordSpace + 1;
        $input.attr('size', Math.max(this.inputSize, $input.val().length));
      }, self));

      self.$container.on('keypress', 'input', $.proxy(function(event) {
         var $input = $(event.target);

         if (self.$element.attr('disabled')) {
            self.$input.attr('disabled', 'disabled');
            return;
         }

         var text = $input.val(),
         maxLengthReached = self.options.maxChars && text.length >= self.options.maxChars;
         if (self.options.freeInput && (keyCombinationInList(event, self.options.confirmKeys) || maxLengthReached)) {
            // Only attempt to add a tag if there is data in the field
            if (text.length !== 0) {
               self.add(maxLengthReached ? text.substr(0, self.options.maxChars) : text);
               $input.val('');
            }

            // If the field is empty, let the event triggered fire as usual
            if (self.options.cancelConfirmKeysOnEmpty === false) {
               event.preventDefault();
            }
         }

         // Reset internal input's size
         var textLength = $input.val().length,
            wordSpace = Math.ceil(textLength / 5),
            size = textLength + wordSpace + 1;
         $input.attr('size', Math.max(this.inputSize, $input.val().length));
      }, self));

      // Remove icon clicked
      self.$container.on('click', '[data-role=remove]', $.proxy(function(event) {
        if (self.$element.attr('disabled')) {
          return;
        }
        self.remove($(event.target).closest('.tag').data('item'));
      }, self));

      // Only add existing value as tags when using strings as tags
      if (self.options.itemValue === defaultOptions.itemValue) {
        if (self.$element[0].tagName === 'INPUT') {
            self.add(self.$element.val());
        } else {
          $('option', self.$element).each(function() {
            self.add($(this).attr('value'), true);
          });
        }
      }
    },

    /**
     * Removes all tagsinput behaviour and unregsiter all event handlers
     */
    destroy: function() {
      var self = this;

      // Unbind events
      self.$container.off('keypress', 'input');
      self.$container.off('click', '[role=remove]');

      self.$container.remove();
      self.$element.removeData('tagsinput');
      self.$element.show();
    },

    /**
     * Sets focus on the tagsinput
     */
    focus: function() {
      this.$input.focus();
    },

    /**
     * Returns the internal input element
     */
    input: function() {
      return this.$input;
    },

    /**
     * Returns the element which is wrapped around the internal input. This
     * is normally the $container, but typeahead.js moves the $input element.
     */
    findInputWrapper: function() {
      var elt = this.$input[0],
          container = this.$container[0];
      while(elt && elt.parentNode !== container)
        elt = elt.parentNode;

      return $(elt);
    }
  };

  /**
   * Register JQuery plugin
   */
  $.fn.tagsinput = function(arg1, arg2, arg3) {
    var results = [];

    this.each(function() {
      var tagsinput = $(this).data('tagsinput');
      // Initialize a new tags input
      if (!tagsinput) {
          tagsinput = new TagsInput(this, arg1);
          $(this).data('tagsinput', tagsinput);
          results.push(tagsinput);

          if (this.tagName === 'SELECT') {
              $('option', $(this)).attr('selected', 'selected');
          }

          // Init tags from $(this).val()
          $(this).val($(this).val());
      } else if (!arg1 && !arg2) {
          // tagsinput already exists
          // no function, trying to init
          results.push(tagsinput);
      } else if(tagsinput[arg1] !== undefined) {
          // Invoke function on existing tags input
            if(tagsinput[arg1].length === 3 && arg3 !== undefined){
               var retVal = tagsinput[arg1](arg2, null, arg3);
            }else{
               var retVal = tagsinput[arg1](arg2);
            }
          if (retVal !== undefined)
              results.push(retVal);
      }
    });

    if ( typeof arg1 == 'string') {
      // Return the results from the invoked function calls
      return results.length > 1 ? results : results[0];
    } else {
      return results;
    }
  };

  $.fn.tagsinput.Constructor = TagsInput;

  /**
   * Most options support both a string or number as well as a function as
   * option value. This function makes sure that the option with the given
   * key in the given options is wrapped in a function
   */
  function makeOptionItemFunction(options, key) {
    if (typeof options[key] !== 'function') {
      var propertyName = options[key];
      options[key] = function(item) { return item[propertyName]; };
    }
  }
  function makeOptionFunction(options, key) {
    if (typeof options[key] !== 'function') {
      var value = options[key];
      options[key] = function() { return value; };
    }
  }
  /**
   * HtmlEncodes the given value
   */
  var htmlEncodeContainer = $('<div />');
  function htmlEncode(value) {
    if (value) {
      return htmlEncodeContainer.text(value).html();
    } else {
      return '';
    }
  }

  /**
   * Returns the position of the caret in the given input field
   * http://flightschool.acylt.com/devnotes/caret-position-woes/
   */
  function doGetCaretPosition(oField) {
    var iCaretPos = 0;
    if (document.selection) {
      oField.focus ();
      var oSel = document.selection.createRange();
      oSel.moveStart ('character', -oField.value.length);
      iCaretPos = oSel.text.length;
    } else if (oField.selectionStart || oField.selectionStart == '0') {
      iCaretPos = oField.selectionStart;
    }
    return (iCaretPos);
  }

  /**
    * Returns boolean indicates whether user has pressed an expected key combination.
    * @param object keyPressEvent: JavaScript event object, refer
    *     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
    * @param object lookupList: expected key combinations, as in:
    *     [13, {which: 188, shiftKey: true}]
    */
  function keyCombinationInList(keyPressEvent, lookupList) {
      var found = false;
      $.each(lookupList, function (index, keyCombination) {
          if (typeof (keyCombination) === 'number' && keyPressEvent.which === keyCombination) {
              found = true;
              return false;
          }

          if (keyPressEvent.which === keyCombination.which) {
              var alt = !keyCombination.hasOwnProperty('altKey') || keyPressEvent.altKey === keyCombination.altKey,
                  shift = !keyCombination.hasOwnProperty('shiftKey') || keyPressEvent.shiftKey === keyCombination.shiftKey,
                  ctrl = !keyCombination.hasOwnProperty('ctrlKey') || keyPressEvent.ctrlKey === keyCombination.ctrlKey;
              if (alt && shift && ctrl) {
                  found = true;
                  return false;
              }
          }
      });

      return found;
  }

  /**
   * Initialize tagsinput behaviour on inputs and selects which have
   * data-role=tagsinput
   */
  $(function() {
    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
  });
})(window.jQuery);

</script>