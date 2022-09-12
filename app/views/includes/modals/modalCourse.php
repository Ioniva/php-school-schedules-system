<div class="modal fade" id="modalFormCourse">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add Course</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="courseForm" name="courseForm" method="post">
                    <input type="hidden" id="idCourse" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-12">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Insert the name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="Insert the description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="date_start">Start date</label>
                            <input type="date" id="date_start" name="date_start" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="date_end">End date</label>
                            <input type="date" id="date_end" name="date_end" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="active">Active</label>
                            <input type="checkbox" id="active" name="active" class="form-control">
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
