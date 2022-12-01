<div class="modal fade" id="modal_item_delete" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <span id="item_name_delete"></span</p>
      </div>
      <div class="modal-footer">
        <form action="../../utilities/library/delete_item.php" method="post">
            <input type="hidden" name="item_id_delete" id="item_id_delete"/>
            <button class="btn btn-danger" type="submit" name="delete_item">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>