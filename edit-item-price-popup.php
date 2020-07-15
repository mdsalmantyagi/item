<!--edit  Modal -->
    <form action="../lib/edit-item-variant-price.php" enctype="multipart/form-data" onSubmit="return validationForm();" method="POST">
        <div class="modal fade" id="editprice<?php echo $sqlitmvrnts['iv_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label>Compare Price</label>
                  <input type="number" name="compare_price" value="<?=$sqlitmvrnts['iv_compare_price']?>" class="form-control" maxlength="7" required>
                </div>
                <div style="text-align: left;" class="form-group">
                  <label>Sell Price</label>
                  <input type="number" name="sell_price" value="<?=$sqlitmvrnts['iv_base_sell_price']?>" class="form-control" maxlength="7">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
                <button type="submit" class="btn btn-primary">Update</button>
                <input type="hidden" name="price" value="<?=$sqlitmvrnts['iv_id']?>">
                <input type="hidden" name="item_m" value="<?=$dataitem['item_id']?>">
              </div>
            </div>
          </div>
        </div>
    </form>
<!--End Modal -->