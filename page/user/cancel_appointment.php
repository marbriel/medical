<div class="modal fade" id="modal_appointment_delete" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="app_delete_line"></p>
      </div>
      <div class="modal-footer">
        <form action="../../utilities/library/cancel_app_user.php" method="get">
            <input type="hidden" name="transaction_id" id="transaction_id"/>
            <button class="btn btn-danger" type="submit" name="delete_employee">Cancel Appointment</button>
        </form>
      </div>
    </div>
  </div>
</div>