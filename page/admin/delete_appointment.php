<div class="modal fade" id="modal_cancel_appointment" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="appointment_delete"></p>
      </div>
      <div class="modal-footer">
        <form action="../../utilities/library/cancel_appointment.php" method="post">
            <input type="hidden" name="transaction_id_cancel" id="transaction_id_cancel"/>
            <button class="btn btn-danger" type="submit" name="delete_item">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>