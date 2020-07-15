<!--edit  Modal -->
    <form action="../lib/item.php" method="POST">
        <div class="modal fade" id="edit<?php echo $dataitem['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title text-primary" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div style="text-align: left;" class="form-group">
                    <label>Item Name</label>
                    <input type="text" name="title" value="<?=$dataitem['item_title']?>" class="form-control" maxlength="50" required>
                  </div>
                  <div style="text-align: left;" class="form-group">
                    <label>Item type</label>
                       <select name="item_type" required class="form-control source-lead">
                          <option value="">Select Item type</option>
                           <?php   
                              $rsitm=mysqli_query($conn,"SELECT * FROM `item_type_m` WHERE `itm_isActive`=1 ORDER BY `itm_id` DESC");
                              while($dataitm=mysqli_fetch_array($rsitm)){
                                  echo '<option ' .($dataitem['item_type_id'] == $dataitm['itm_id'] ? "selected" : "") .' value="'.$dataitm['itm_id'].'">'.$dataitm['itm_title'].'</option>';
                              }       
                              ?>
                        </select>
                  </div>
                  <div style="text-align: left;" class="form-group">
                    <label>Item Category</label>
                       <select name="category" required class="form-control source-lead">
                         <option value="">Select Item Category</option>
                         <?php   
                            $rscat=mysqli_query($conn,"SELECT * FROM `item_category_m` WHERE `icm_isActive`=1 ORDER BY `icm_id` DESC");
                            while($datacat=mysqli_fetch_array($rscat)){
                                echo '<option '.($dataitem['item_category_id'] == $datacat['icm_id'] ? "selected" : "") .' value="'.$datacat['icm_id'].'">'.$datacat['icm_title'].'</option>';
                            }       
                            ?>
                      </select>
                  </div>
                  <div style="text-align: left;" class="form-group">
                    <label>Item Brand</label>
                      <select name="brand" required class="form-control source-lead">
                         <option value="">Select Item Brand</option>
                        <?php   
                            $rsb=mysqli_query($conn,"SELECT * FROM `item_brand_m` WHERE `ibm_isActive`=1 ORDER BY `ibm_id` DESC");
                            while($databrand=mysqli_fetch_array($rsb)){
                                echo '<option '.($dataitem['item_brand_id'] == $databrand['ibm_id'] ? "selected" : "") .' value="'.$databrand['ibm_id'].'">'.$databrand['ibm_title'].'</option>';
                            }       
                            ?>
                      </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
                <button type="submit" class="btn btn-primary">Update</button>
                <input type="hidden" name="item_m" value="<?=$dataitem['item_id']?>" />
              </div>
            </div>
          </div>
        </div>
    </form>
<!--End Modal -->