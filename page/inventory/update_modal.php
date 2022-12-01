<div class="modal fade" id="update_item_modal" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3" method="post" action="../../utilities/library/update_item.php">
            <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" class="form-control form-control-sm" id="edit_item_name" aria-describedby="emailHelp" name="item_name" required>
                </div>
                <div class="form-group  mt-1">
                    <label for="manufacturer">Manufacturer</label>
                    <input type="text" class="form-control form-control-sm" id="edit_manufacturer" name="manufacturer" required>
                </div>
                <div class="form-group  mt-1">
                    <label for="edit_selling_price">Selling Price</label>
                    <input type="text" class="form-control form-control-sm" id="edit_selling_price" name="selling_price" required>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label>Quantity</label>
                        <input type="text" class="form-control form-control-sm"  id="edit_quantity" name="quantity" required>
                    </div>
                    <div class="col-md-2">
                        <label>Symbol</label>
                        <input type="text" class="form-control form-control-sm" id="edit_symbol" name = "symbol" required>
                    </div>
                    <div class="col-md-6">
                        <label>Exp. Date</label>
                        <input type="date" class="form-control form-control-sm" id="edit_exp" name="expDate" >
                    </div>
                    <input type="hidden" name="id_to_update" id="id_update">
                </div>
                <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="update_item">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>