<div class="modal fade" id="modalFormSubject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add Subject</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="subjectForm" name="subjectForm" method="post">
                    <input type="hidden" id="idSubject" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <label for="id_teacher">Teacher ID</label>
                            <input type="number" id="id_teacher" name="id_teacher" class="form-control" placeholder="Insert the teacher ID">
                        </div>
                        <div class="col-6">
                            <label for="id_course">Course ID</label>
                            <input type="number" id="id_course" name="id_course" class="form-control" placeholder="Insert the course ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="id_schedule">Schedule ID</label>
                            <input type="number" id="id_schedule" name="id_schedule" class="form-control" placeholder="Insert the schedule ID">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Insert the phone name">
                        </div>
                        <div class="col-6">
                            <label for="color">Color</label>
                            <input type="color" id="color" name="color" class="form-control">
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
