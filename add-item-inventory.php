<!--add Modal -->
        <form action="../lib/item-inventory.php" enctype="multipart/form-data" onSubmit="return validationForm();" method="POST">
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Add Item inventory</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                      <div style="text-align: left;" class="form-group">
                        <label>Value</label>
                        <input type="number" name="quantity" class="form-control" maxlength="6" required>
                      </div>
                   </div>     
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <input type="hidden" name="item_m" value="<?=$dataitem['item_id']?>">
                    <input type="hidden" name="variant" value="<?=$sqlitmvrnts['iv_id']?>">
                    <input type="hidden" name="current_stock" value="<?=$sqlitmvrnts['iv_item_current_stock']?>">
                  </div>
                </div>
              </div>
            </div>
        </form>
<!--End Modal -->