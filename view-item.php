<?php 
include_once("../includes/db_connect.php");
if($_SESSION["admin"]=="")
{
  header("location:../index.php");
}
include_once("../includes/header.php");
include_once("../includes/common-variable.php");
include_once("../includes/common-array.php");
?>
  <div class="main-wrapper">
  <?php include_once("../includes/left-menu.php");?>
  
    <div class="page-wrapper">
     <!-- top navbar start -->
      <?php include_once("../includes/navbar.php");?>
     <!-- top navbar end -->

        <div class="page-content">
          <!-- view message submit and update-->
          <?php include_once("../includes/function.php"); ?>
        <!-- end view message submit and update-->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="email-head-subject">
                              <div class="title d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                  <h4>Items</h4>
                                </div>
                                <div class="icons">
                                  <a href="create-item.php" class="icon"><i data-feather="plus" class="text-muted hover-primary-muted" data-toggle="tooltip" title="Add"></i></a>
                                  <a href="#" class="icon"><i data-feather="download" class="text-muted hover-primary-muted" data-toggle="tooltip" title="download"></i></a>
                                  <a href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="icon"><i data-feather="filter" class="text-muted" data-toggle="tooltip" title="Filter"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="collapse mt-1" id="collapseExample">
                              <div class="card card-body address_card">
                                  <div class="row">


                                  filter goes here.

                                           
                                  </div>
                              </div>
                          </div> 
                            <div class="table-responsive">
                            <table id="dataTable"  class="table table-hover">
                              <thead>
                                <tr>
                                <!-- *************TABLE HEAD**************** -->
                                  <th>Sr No.</th>
                                  <th>Item</th>
                                  <th>Category</th>
                                  <th>Type</th>
                                  <th>Brand</th>
                                  <th>Inventory</th>
                                  <th>Status</th>
                                  <th class="text-center">Action</th>
                                <!-- *************TABLE HEAD**************** -->
                                </tr>
                              </thead>
                              <tbody>
                                 <?php
                                            $results_per_page = 10;
                                ////////////// count rows for pagination //////////////
                                                 $sql = "SELECT * FROM `item` INNER JOIN `item_brand_m` ON item.item_brand_id=item_brand_m.ibm_id INNER JOIN `item_category_m` ON item.item_category_id=item_category_m.icm_id LEFT JOIN `item_options_m` ON item.item_hasOptions=item_options_m.iom_id INNER JOIN `item_type_m` ON item.item_type_id=item_type_m.itm_id WHERE item_isActive='1'";
                                                $result = mysqli_query($conn,$sql);
                                                $number_of_result = mysqli_num_rows($result);
                                    /////////// number of pages ////////////////////
                                                $number_of_pages = ceil($number_of_result/$results_per_page);
                                                if(!isset($_GET['page'])){
                                                $page = 1;
                                                }else{
                                                $page = $_GET['page'];
                                                }
                                                $this_page_first_result = ($page-1)*$results_per_page;

                                            if(isset($_POST['filter'])) {
                                                $from = $_POST['f'];
                                                $to = $_POST['t'];
                                             $SQLE="SELECT * FROM `item` INNER JOIN `item_brand_m` ON item.item_brand_id=item_brand_m.ibm_id INNER JOIN `item_category_m` ON item.item_category_id=item_category_m.icm_id LEFT JOIN `item_options_m` ON item.item_hasOptions=item_options_m.iom_id INNER JOIN `item_type_m` ON item.item_type_id=item_type_m.itm_id WHERE item_createdOn>='".$from."' AND item_createdOn<='".$to."' ORDER BY item_id DESC LIMIT ".$this_page_first_result.','.$results_per_page;
                                            }
                                            else
                                            {
                                            $SQLE="SELECT * FROM `item` INNER JOIN `item_brand_m` ON item.item_brand_id=item_brand_m.ibm_id INNER JOIN `item_category_m` ON item.item_category_id=item_category_m.icm_id LEFT JOIN `item_options_m` ON item.item_hasOptions=item_options_m.iom_id INNER JOIN `item_type_m` ON item.item_type_id=item_type_m.itm_id ORDER BY item_id DESC LIMIT ".$this_page_first_result.','.$results_per_page;
                                            }
                                            $rsitem=mysqli_query($conn,$SQLE);
                                                $Sr=1;              
                                                while($dataitem=mysqli_fetch_assoc($rsitem))
                                                {
                                              $sqlitmvrnts=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM item_variants WHERE iv_item_id='".$dataitem['item_id']."'"));
                                              $stock=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(item_variants.iv_item_current_stock) AS QTY FROM item_variants WHERE iv_item_id='".$dataitem['item_id']."'"));
                                              $stock_value =$stock['QTY'];
                                            ?>
                                <!-- *************PHP**************** -->
                                    <tr class="odd gradeX">
                                        <!-- *************TDS**************** -->
                                        <td align="left"><?php echo $Sr++;?></td>
                                        <td><a href="view-item-details.php?detail=<?=$dataitem['item_id'];?>"><!-- <img class="img-circle" width="25px" height="25px" src="../uploads/item-media/image.jpeg" alt='image' style="margin-right:10px;"> --><?=$dataitem['item_title'];?></a></td>
                                        <td><?=$dataitem['itm_title'];?></td>
                                        <td><?=$dataitem['icm_title'];?></td>
                                        <td><?=$dataitem['ibm_title'];?></td>
                                        <td><?php echo $stock_value;?> in Stock <!-- for <?=$sqlitmvrnts['iv_min_stock_value'];?> Variants --></td>
                                        <th>
                                           <?php
                                            if($dataitem['item_isActive']=='1'){
                                               echo "Active";
                                             }else{
                                               echo "Inactive";
                                             }
                                          ?>
                                        </th>
                                        <!-- *************TDS**************** -->

                                        <!-- *************ACTIONS**************** -->
                                        <td class="text-center">
                                          <div class="icons">
                                            <a href="view-item-details.php?detail=<?=$dataitem['item_id'];?>" class="icon">
                                              <i data-toggle="tooltip" data-placement="left"
                                                data-original-title="View" class="text-muted ico" data-feather="eye"></i>
                                            </a>
                                            <?php if ($dataitem['item_isActive']=='1') { ?>
                                            <a href="../lib/item.php?is=<?=$dataitem['item_id'];?>" onclick="return confirm('Are you sure you want to Deactivate.')" class="icon">
                                              <i data-toggle="tooltip" data-placement="left"
                                                data-original-title="Deactivate" class="text-muted ico" data-feather="power"></i>
                                            </a>
                                          <?php } else {?>
                                             <a href="../lib/item.php?itmactiv=<?=$dataitem['item_id'];?>" onclick="return confirm('Are you sure you want to Activate.')" class="icon">
                                              <i data-toggle="tooltip" data-placement="left"
                                                data-original-title="Activate" class="text-muted ico" data-feather="rotate-cw"></i>
                                            </a>
                                          <?php } ?>
                                          </div>
                                        </td>
                                        <!-- *************ACTIONS**************** -->
                                    </tr>
                                    <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- *************PAGINATION**************** -->
                          <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end">
                              <li class="page-item disabled">
                                <?php
                                  if($page>1){
                                  echo '<li class="page-item"><a class="page-link" href="view-item.php?page='.($page-1).'">Previous</a></li>';
                                  }
                                  for($i=1;$i<=$number_of_pages;$i++){

                                  $active=($i==$page)? ' class="page-item active"' : '';

                                    echo '<li'.$active.'><a class="page-link" href="view-item.php?page='.$i.'">'.$i.'</a></li>';
                                  }
                                  if($i>$page){
                                  echo '<li class="page-item"><a class="page-link" href="view-item.php?page='.($page+1).'">Next</a></li>';
                                  }
                                  ?>
                              </li>
                            </ul>
                          </nav> 
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