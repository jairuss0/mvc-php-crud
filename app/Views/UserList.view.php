<?php
require_once CONFIG_PATH . 'config.php';
include_once VIEW_PATH . 'header.php';
?>

<div class="container-sm">
    <div class="main mt-5">
        <div class="header d-flex align-content-center justify-content-between">
            <h1>MVC CRUD - <?php echo $message ?></h1>
            <div class="btn-container align-content-center">
                <button class="btn btn-primary" id="createUserBtn">Create user</button>
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
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?= $row['UserID'] ?></td>
                            <td><?= $row['FirstName'] ?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['DateOfBirth'] ?></td>
                            <td>
                                <button class="btn btn-success" id="update_user">Update user</button>
                                <button class="btn btn-danger" id="delete_user">Delete user</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!--MODAL ADD/EDIT-->
    
    <div class="modal fade" id="user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include_once VIEW_PATH . 'footer.php';
?>