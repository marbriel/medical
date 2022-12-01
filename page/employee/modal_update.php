<div class="modal fade" id="modal_update_employee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3" method="post" action="../../utilities/library/update_employee.php">
            <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" id="update_firstName" aria-describedby="emailHelp" required name="firstName">
                </div>
                <div class="form-group  mt-1">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" id="update_lastName" required name="lastName">
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm"  id="update_email" required name="email">
                    </div>
                    <div class="col">
                        <label>Contact No.</label>
                        <input type="text" class="form-control form-control-sm" id="update_contactNo" required name="contactNo">
                    </div>
                </div>
                <input type="hidden" id="update_id" name="updateId">
                <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="submit">Update</button>
            </form>
      </div>
    </div>
  </div>
</div>