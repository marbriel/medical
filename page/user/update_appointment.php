<div class="modal fade" id="resched_appointment" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-3" method="post" action="../../utilities/library/resched_appointment_user.php">
                    <div class="form-group">
                        <div class="form-group  mt-1">
                            <label for="edit_date">Date</label>
                            <input type="date" class="form-control form-control-sm" id="edit_date" name="edit_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputState"><b>Time</b></label>
                            <select id="time_update" class="form-control" name="time" required>
                                <option>No Time Available</option>
                            </select>
                        </div>
                        <input type="hidden" name="transaction_to_update" id="transaction_to_update">
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block mt-3" style="width:26rem" name="update_sched">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '#edit_date', function() {
            var date = $(this).val();
            
        });


        $('#edit_date').change(function() {
            var date_id = $(this).val();
            $.ajax({
                url: "../../utilities/library/get_dates.php",
                method: 'POST',
                data: {
                    date_data: date_id
                },
                success: function(data) {
                    console.log(data);
                    $('#time_update').html(data);
                }

            });
        });
    });
</script>
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate() + 1).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#edit_date').attr('min', today);
</script>