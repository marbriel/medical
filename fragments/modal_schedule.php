<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../../utilities/library/save_schedule.php">
                    <div class="row g-3 mb-3">
                        <div class="col-auto">
                            <input type="date" class="form-control date_from" id="date_from" name="date_from" required>
                        </div>
                        <div class="col-auto ">
                            <p>to</p>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" id="date_until" name="date_until">
                        </div>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="sched1" value="8:00 AM to 9:00 AM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox1">8:00 AM to 9:00 AM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2 ms-3">
                        <input class="form-check-input" type="checkbox" id="sched2" value="9:00 AM to 10:00 AM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox2">9:00 AM to 10:00 AM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="sched3" value="10:00 AM to 11:00 AM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox3">10:00 AM to 11:00 AM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="sched4" value="11:00 AM to 12:00 PM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox3">11:00 AM to 12:00 PM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="sched5" value="1:00 PM to 2:00 PM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox3">1:00 PM to 2:00 PM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2 ms-3">
                        <input class="form-check-input" type="checkbox" id="sched6" value="2:00 PM to 3:00 PM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox3">2:00 PM to 3:00 PM</label>
                    </div>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="sched7" value="3:00 PM to 4:00 PM" name="sched[]">
                        <label class="form-check-label " for="inlineCheckbox3">3:00 PM to 4:00 PM</label>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit" id="checkBtn">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if (!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });


    $(document).ready(function() {
        $(".date_from").on('change', function(event) {
            event.preventDefault();
            $('#date_until').attr('min', this.value);
        });
    });
</script>

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_from').attr('min', today);
</script>