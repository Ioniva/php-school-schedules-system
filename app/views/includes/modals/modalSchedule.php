<div class="modal fade" id="modalFormSchedule">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="scheduleForm" name="scheduleForm" method="post">
                    <input type="hidden" id="idSchedule" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <label for="time_start">Start time</label>
                            <input type="time" id="time_start" name="time_start" class="form-control" placeholder="Insert the start time">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="time_end">End time</label>
                        <input type="time" id="time_end" name="time_end" class="form-control" placeholder="Insert the end time">
                    </div>
                    <div class="col-12">
                        <label for="day">Date</label>
                        <input type="date" id="day" name="day" class="form-control" placeholder="Insert the date">

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnAction"><span id="btnText">Add Changes</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
