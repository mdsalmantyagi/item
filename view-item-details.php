<?php
include_once("../includes/db_connect.php");
if($_SESSION["admin"]=="")
{
  header("location:../index.php");
}
include_once("../includes/header.php");
require_once("../includes/common-array.php");
?>
<?php
$dataitem=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `item` INNER JOIN `item_brand_m` ON item.item_brand_id=item_brand_m.ibm_id INNER JOIN `item_category_m` ON item.item_category_id=item_category_m.icm_id LEFT JOIN `item_options_m` ON item.item_hasOptions=item_options_m.iom_id INNER JOIN `item_type_m` ON item.item_type_id=item_type_m.itm_id WHERE item_id='".$_GET['detail']."'"));
$sqlitmvrnts=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM item_variants WHERE iv_item_id='".$_GET['detail']."'"));
$vrnts_stock=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(item_variants.iv_item_current_stock) AS QTY FROM item_variants WHERE iv_item_id='".$_GET['detail']."'"));
$stock_value =$vrnts_stock['QTY'];
?>
  <div class="main-wrapper">
  <?php include_once ("../includes/left-menu.php");?>
    <div class="page-wrapper">
     <!-- top navbar start -->
      <?php include_once ("../includes/navbar.php");?>
     <!-- top navbar end -->
            <div class="page-content">
                
              <!-- ********PROFILE*********** -->
              <div class="profile-page tx-13">
                <!-- view message submit and update-->
                  <?php include_once("../includes/function.php");?>
                <!-- end view message submit and update-->
                  <div class="row">
                    <div class="col-12 grid-margin">
				        <div class="profile-header">
					        <div class="cover">
						        <div class="gray-shade"></div>
						        <figure>
							        <img src="../assets/images/lead2.jpg" class="img-fluid" alt="profile cover">
						        </figure>
						        <div class="cover-body d-flex justify-content-between align-items-center">
							        <div>
								        <!-- <img class="profile-pic" src="../uploads/item-media/item.jpg" alt="profile"> -->
								        <span class="profile-name"><!-- Item's title, Item's Brand Name -->
                                            <?=$dataitem['item_title'];?>, <?=$dataitem['ibm_title'];?></span>
                                        
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb bg-inverse-primary">
                                                        <li class="breadcrumb-item">
                                                           <?=$dataitem['icm_title'];?>
                                                        </li>
                                                           <!--  <li class="breadcrumb-item">
                                                                Category Level 2
                                                            </li>
                                                            <li class="breadcrumb-item successs">
                                                                Category Level 3
                                                            </li> -->
                                                    </ol>
                                                </nav>
                                        
                                        <p class="profile-name">
                                            <!-- <span><img src="../uploads/item-media/item.jpg" class='rounded-circle wd-35' alt='user'></span> -->
                                            <span class="lead-assignee-title"><?=$dataitem['itm_title'];?>
                                            <!-- Item Type Name --></span>
                                        </p>
							        </div>
							        <div class="d-none d-md-block">
								        <!-- <button class="btn btn-primary btn-icon-text btn-edit-profile">
									        <i data-feather="edit" class="btn-icon-prepend"></i> Edit
								        </button> -->
                                        <a data-toggle="modal" href="#edit<?=$dataitem['item_id']?>" class="btn btn-primary btn-icon-text btn-edit-profile">
                                          <i data-feather="edit" class="btn-icon-prepend"></i> Edit
                                        </a>
                                        
							        </div>
						        </div>
					        </div>
                            <div class="header-links profile-align-items-left">
                            </div>
            	        </div>
                    </div>
                   </div>
              </div>
              <!-- *********PROFILE END********** -->
              
              <!-- *********Chat start********** -->
              <div class="row profile-body">
                  <!-- left wrapper start -->
						<div class="d-md-block col-md-12 col-xl-3 left-wrapper">
                            <div class="row">
                                <?php include('edit-item-m-popup.php');?>
								<div class="col-md-12 grid-margin">
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <div class="email-head-subject lead-left-box-title">
                                                    <div class="title d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6>SKU</h6>
                                                        </div>
                                                        <div class="icons">
                                                           <a data-toggle="modal" href="#editsukbarcode<?=$dataitem['item_id']?>" class="icon">
                                                              <i class="text-muted ico hover-primary-muted" data-toggle="tooltip" data-placement="left" title="Edit" data-feather="edit"></i>
                                                            </a>
                                                            <?php include('edit-item-suk-barcode-popup.php'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="latest-photos">
                                                    <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <p class="text-muted"><?=$dataitem['item_sku'];?></p>
                                                            </div>  
                                                    </div>
                                                </div>
                                                <div class="email-head-subject lead-left-box-title">
                                                    <div class="title d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6>Barcode</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="latest-photos">
                                                    <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <p class="text-muted"><?=$dataitem['item_barcode'];?></p>
                                                            </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 grid-margin">
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <div class="email-head-subject lead-left-box-title">
                                                    <div class="title d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6>Price</h6>
                                                        </div>
                                                        <div class="icons">
                                                           <a data-toggle="modal" href="#editprice<?=$sqlitmvrnts['iv_id']?>" class="icon">
                                                              <i class="text-muted ico hover-primary-muted" data-toggle="tooltip" data-placement="left" title="Edit" data-feather="edit"></i>
                                                            </a>
                                                             <?php include('edit-item-price-popup.php'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="latest-photos">
                                                    <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <p>Compare Price</p>
                                                                <p class="text-muted"><?=$sqlitmvrnts['iv_compare_price'];?></p><br/>
                                                                <p>Sell Price</p>
                                                                <p class="text-muted"><?=$sqlitmvrnts['iv_base_sell_price'];?></p>
                                                            </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <div class="email-head-subject lead-left-box-title">
                                                    <div class="title d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6>Inventory</h6>
                                                        </div>
                                                        <div class="icons">
                                                            <!-- <a data-toggle="modal" data-target="#project" aria-expanded="false" aria-controls="collapseExample" class="icon"><i data-feather="plus" class="text-muted hover-primary-muted ico" data-toggle="tooltip" title="plus"></i></a> -->

                                                            <a href="#addnew" data-toggle="modal" class="icon"><i data-feather="plus" class="text-muted hover-primary-muted" data-toggle="tooltip" data-placement="left" title="Add"></i></a>

                                                            <?php include('add-item-inventory.php'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="latest-photos">
                                                    <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <p class="text-muted"><!-- <?=$sqlitmvrnts['iv_item_current_stock'];?>  --><?php echo $stock_value;?> in Stock<!--  for <?=$sqlitmvrnts['iv_min_stock_value'];?> Variants --></p>
                                                            </div>  
                                                    </div>
                                                </div>
                                                <div class="email-head-subject lead-left-box-title">
                                                    <div class="title d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6>Item Created On</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="latest-photos">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <p class="text-muted"><!-- 28 April 2020 -->
                                                                <?php
                                                                $dateconvertformet = strtotime(substr($dataitem['item_createdOn'],0,10));
                                                                echo $formattedDate = date('j M Y', $dateconvertformet);
                                                                ?>
                                                            </p>
                                                        </div>  
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
						</div>
						<!-- left wrapper end -->
                        <!-- right wrapper start -->
						<div class="d-xl-block col-xl-9 right-wrapper">
							<div class="row">
								<div class="col-md-12 grid-margin">
									<div class="card rounded">
										<div class="card-body">
                                            <div class="email-head-subject">
                                              <div class="title d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                  <h5>Description</h5>
                                                </div>
                                                <div class="icons">
                                                  <a href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="icon"><i data-feather="edit" class="text-muted" data-toggle="tooltip" title="Edit"></i></a>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                            <div class="collapse mt-1" id="collapseExample">
                                           <form action="../lib/item.php" method="POST">
                                              <div class="card card-body address_card">
                                                  <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <textarea type="text" name="description" value="Unknown" class="form-control" rows="7" placeholder="Enter Description"><?=$dataitem['item_description'];?></textarea>
                                                     </div> 
                                                     <div class="form-group col-md-10">
                                                     </div>
                                                     <input type="submit" class="btn btn-primary mb-2 nextBtn float-right" value="Update">
                                                   <input type="hidden" name="desc" value="<?=$dataitem['item_id']?>">
                                                  </div>
                                                   
                                              </div>
                                           </form>
                                                 
                                          </div> 
                                          <div class="">
                                            <p><?=$dataitem['item_description'];?></p>
                                          </div>
                                        </div>
									</div>
                                </div>
                                <div class="col-md-12 grid-margin">
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <div class="email-head-subject">
                                              <div class="title d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                  <h5>Media</h5>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- start multi file upload -->
                                             <form action="../lib/item-media.php" method="post" enctype="multipart/form-data" class="mb-3">
                                             <div class="row">
                                              <div class="col-sm-12 stretch-card grid-margin grid-margin-md-0">
                                                <div class="w-100">
                                                   <div id="form-example-2">
                                                    <div class="input-field">
                                                      <div class="input-images"></div>
                                                  </div>
                                                </div>
                                                </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm -12 mt-3 d-flex justify-content-end">
                                                     <button type="submit" name="submit" class="btn btn-success btn-icon-text">
                                                         <i class="btn-icon-prepend" data-feather="upload"></i>Upload
                                                     </button>
                                                     <input type="hidden" name="item_m" value="<?=$_GET['detail']?>">
                                                 </div>
                                             </div>
                                             </form>
                                             <!-- end multi file upload -->

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <form action="upload.php" class="dropzone"> -->
                                                    <!-- <form action="../lib/item-media.php" method="post" enctype="multipart/form-data">
                                                        <input type="file" name="emp_photo[]" multiple >
                                                        <input type="submit" name="submit" value="UPLOAD">
                                                        <input type="hidden" name="item_m" value="<?=$_GET['detail']?>">
                                                    </form><hr> -->
                                                 </div>
                                                    
                                                    <?php
                                                    $rsim=mysqli_query($conn,"SELECT * FROM item_media WHERE im_isActive='1' AND im_item_id='".$_GET['detail']."'");
                                                      while($dataim=mysqli_fetch_assoc($rsim))
                                                      {
                                                    ?>
                                                    <?php
                                                       $photoDir = $SERVER_PATH;
                                                       $img = $photoDir;
                                                        if ( (!empty($dataim['im_media_url']) && @file_get_contents($img . 'uploads/item-media/' . $dataim['im_media_url'], false, null, 0, 10))) {
                                                         $img .= 'uploads/item-media/' . $dataim['im_media_url'];
                                                        } 
                                                        else {
                                                          $img .= 'assets/images/default-face.jpg';
                                                        }
                                                      ?>
                                                        <!-- <div class="col-md-3 mb-3">
                                                            
                                                            <div class="card">
                                                            <span><a class="text-danger" href="../lib/item-media.php?removepic=<?=$dataim['im_id'];?>&item_m=<?=$_GET['detail'];?>"><i data-feather="x"></i></a></span>
                                                        <img class="img-fluid" src="<?=$img;?>" width="140px" alt="">&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-3">
                                                            <div class="item">
                                                                <div class="product">
                                                                    <div class="product_img">
                                                                           <img class="img-fluid" src="<?=$img;?>" width="140px" alt="">
                                                                        <div class="product_action_box d-flex justify-content-end">
                                                                            <ul class="list-unstyled pr_action_btn">
                                                                                <li><a href="../lib/item-media.php?removepic=<?=$dataim['im_id'];?>&item_m=<?=$_GET['detail'];?>" data-toggle="tooltip" title="Remove"><i  class="bg-dark rounded-circle" data-feather="x"></i></a></li>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   <?php } ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                        <!-- ************Inventory Logs start************* -->
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="email-head-subject">
                                      <div class="title d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                          <h5>Inventory Update Logs</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Sr No.</th>
                                  <th>Quantity</th>
                                  <th>Datetime</th>
                                </tr>
                              </thead>
                              <?php
                                $invitem=mysqli_query($conn,"SELECT * FROM inventory_item WHERE ii_item_id='".$_GET['detail']."'");
                                  $Sr=1;              
                                  while($datainvitem=mysqli_fetch_assoc($invitem))
                                  {
                                ?>
                              <tbody>
                                <tr class="odd gradeX iq-bg-primary-hover">
                                    <td align="left"><?php echo $Sr++;?></td>
                                    <td><?=$datainvitem['ii_quantity'];?></td>
                                    <td>
                                      <?php
                                        $dateconvertformet = strtotime(substr($datainvitem['ii_createdOn'],0,23));
                                        echo $formattedDate = date('l, j M Y \a\t h:i A', $dateconvertformet);
                                      ?>
                                    </td>
                                </tr>
                              </tbody>
                              <?php } ?>
                            </table>
                          </div>
                                </div>
                            </div>
                        </div>
                        <!-- ************Inventory log end************* -->
                        <!-- <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="email-head-subject">
                                      <div class="title d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                          <h5>Variants</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="table-responsive">
                            <table  class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Sr No.</th>
                                  <th>item_option_title_1</th>
                                  <th>item_option_title_2</th>
                                  <th>item_option_title_3</th>
                                  <th>Compare Price</th>
                                  <th>Sell Price</th>
                                  <th>Quantity</th>
                                  <th>SKU</th>
                                  <th class="text-center">Action</th>
                                </tr>
                              </thead>
                              <?php
                                $rsiv=mysqli_query($conn,"SELECT * FROM item_variants WHERE iv_item_id='".$_GET['detail']."'");
                                  $Sr=1;              
                                  while($dataiv=mysqli_fetch_assoc($rsiv))
                                  {
                                ?>
                              <tbody>
                                    <tr class="odd gradeX iq-bg-primary-hover">
                                        <td align="left">1</td>
                                                <td>item_option_Value_1</td>
                                                <td>item_option_Value_2</td>
                                                <td>item_option_Value_3</td>
                                                <td><?=$dataiv['iv_compare_price'];?></td>
                                                <td><?=$dataiv['iv_base_sell_price'];?></td>
                                                <td>20</td>
                                                <td>100030</td>
                                        <td >
                                          <div class="icons">
                                            <a href="#" class="icon">
                                              <i data-toggle="tooltip"
                                                data-original-title="View" data-placement="left" class="text-muted ico" data-feather="eye"></i>
                                            </a>
                                            <a href="#" class="icon">
                                              <i data-toggle="tooltip"
                                                data-original-title="Edit" data-placement="left" class="text-muted ico" data-feather="edit"></i>
                                            </a>
                                              <a  data-toggle="modal" href="#" onclick="return confirm('Are you sure you want to suspend.')" class="icon">
                                              <i data-toggle="tooltip"
                                                data-original-title="Delete" data-placement="left" class="text-muted ico" data-feather="trash"></i>
                                            </a>
                                          </div>
                                           
                                        </td>
                                    </tr>
                              </tbody>
                          <?php } ?>
                            </table>
                          </div>
                                </div>
                            </div>
                        </div> -->
						<!-- right wrapper end -->
                        
              <!-- *********chat END********** -->

              <!-- *********address********** -->
              
              <!-- *********address end********** -->
            </div>
        </div>
            <!-- *************PHP**************** -->
            
            <!-- *************PHP**************** -->
      <!-- Footer -->
      <?php include_once ("../includes/footer.php"); ?>
      <!-- Footer END -->
  
    </div>
  </div>
    <!--start jquery part-->
    <?php include_once ("../includes/common-jquery-part.php"); ?>
    <!--end jquery part-->