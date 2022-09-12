<div class="modal fade" id="modalFormAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Add Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="adminForm" name="adminForm" method="post">
                    <input type="hidden" id="idAdmin" name="id" value="">
                    <p class="primary-text">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Insert the name">
                        </div>
                        <div class="col-6">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Insert the username">
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
