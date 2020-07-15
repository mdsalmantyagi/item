<!--edit  Modal -->
    <form action="../lib/item.php" enctype="multipart/form-data" onSubmit="return validationForm();" method="POST">
        <div class="modal fade" id="editsukbarcode<?php echo $dataitem['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label>SKU</label>
                      <input type="text" name="sku" value="<?=$dataitem['item_sku']?>" class="form-control" maxlength="30" required>
                </div>
                <div style="text-align: left;" class="form-group">
                      <label>Barcode</label>
                      <input type="text" name="barcode" value="<?=$dataitem['item_barcode']?>" class="form-control" maxlength="30">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
                <button type="submit" class="btn btn-primary">Update</button>
                <input type="hidden" name="sukbar" value="<?=$dataitem['item_id']?>" />
              </div>
            </div>
          </div>
        </div>
    </form>
<!--End Modal -->