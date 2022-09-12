<div class="modal fade" id="modalFormTeacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add Teacher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="teacherForm" name="teacherForm" method="post">
                    <input type="hidden" id="idTeacher" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Insert the name">
                        </div>
                        <div class="col-6">
                            <label for="surname">surname</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Insert the surname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Insert the email">
                            <small class="form-text text-muted">We will never share your email</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Insert the phone number">
                        </div>
                        <div class="col-6">
                            <label for="nif">CIF/NIF/NIE</label>
                            <input type="text" id="nif" name="nif" class="form-control" placeholder="Insert the surname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Insert the password" require>
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
