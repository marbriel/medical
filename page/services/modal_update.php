<div class="modal fade" id="service_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3" method="post" action="../../utilities/library/update_service.php">
            <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input type="text" class="form-control form-control-sm" id="update_service_name" aria-describedby="emailHelp" required name="serviceName">
                </div>
                <div class="form-group  mt-1">
                    <label for="price">Price</label>
                    <input type="number" class="form-control form-control-sm" id="update_price" required name="price" min="0">
                </div>
                <input type="hidden" name="id" id="id"/>
                <button type="submit" class="btn btn-success mx-auto d-block mt-3" style="width:26rem" name="submit">Update</button>
            </form>
      </div>
    </div>
  </div>
</div>