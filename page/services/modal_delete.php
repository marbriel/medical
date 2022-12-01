<div class="modal fade" id="modal_service_delete" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <span id="service_name_delete"></span</p>
      </div>
      <div class="modal-footer">
        <form action="../../utilities/library/delete_service.php" method="post">
            <input type="hidden" name="serviceId" id="service_id_delete"/>
            <button class="btn btn-danger" type="submit" name="delete_service">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>