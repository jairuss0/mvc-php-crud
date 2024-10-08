<?php
 include_once  '../app/Views/header.php';
?>

<div class="container-sm">
    <div class="main mt-5">
        <div class="header d-flex align-content-center justify-content-between">
            <h1>MVC CRUD </h1>
            <div class="btn-container align-content-center">
                <button class="btn btn-primary" id="createUser">Create user</button>
            </div>
        </div>
        <div class="table mt-4">
            <table id="user_table" class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
    <!--MODAL ADD/EDIT-->

    <div class="modal fade" id="user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="user_form">
                        <input type="hidden" name="id" id="userId">
                        <div class="row g-3">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="First name" name="firstName" id="firstName" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Last name" name="lastName" id="lastName" required>
                            </div>
                            <div class="col-">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" name="dateBirth" id="dateBirth" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<?php
include_once '../app/Views/footer.php';
?>