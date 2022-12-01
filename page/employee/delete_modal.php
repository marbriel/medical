<div class="modal fade" id="modal_employee_delete" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <span id="employee_name_delete"></span</p>
      </div>
      <div class="modal-footer">
        <form action="../../utilities/library/delete_employee.php" method="post">
            <input type="hidden" name="employeeId" id="employee_id_delete"/>
            <button class="btn btn-danger" type="submit" name="delete_employee">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>