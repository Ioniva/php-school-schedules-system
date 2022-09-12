<div class="modal fade" id="modalFormEnrollment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add Enrollment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="enrollmentForm" name="enrollmentForm" method="post">
                    <input type="hidden" id="idEnrollment" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <label for="id_student">Student ID</label>
                            <input type="number" id="id_student" name="id_student" class="form-control" placeholder="Insert the student ID">
                        </div>
                        <div class="col-6">
                            <label for="id_course">Course ID</label>
                            <input type="number" id="id_course" name="id_course" class="form-control" placeholder="Insert the course ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="status">Status</label>
                            <input type="checkbox" id="status" name="status" class="form-control" placeholder="Insert the status">
                        </div>
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
