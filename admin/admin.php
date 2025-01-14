<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
   <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Admin/Staff
        <a href="admin-create.php" class="btn btn-primary float-end">Add Admin</a>
        </h4>
            
    </div>
        <div class="card-body">
            
            <?php alertMessage() ?>

            <?php 
                $Admins = getAll('admins');
                if(!$Admins){
                    echo '<h4>Something Went Wrong!</h4>';
                    return false;
                }

                if(mysqli_num_rows($Admins) > 0)
                {
            ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is Ban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
        
                        <?php foreach($Admins as $adminItem) : ?>
                        <tr>
                            <td><?= $adminItem['id'] ?></td>
                            <td><?= $adminItem['name'] ?></td>
                            <td><?= $adminItem['email'] ?></td>
                            <td>
                                <?php 
                                if($adminItem['is_ban'] == 1){
                                    echo '<span class="badge bg-danger">Banned</span>';
                                }else{
                                    echo '<span class="badge bg-primary">Active</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="admin-edit.php?id=<?= $adminItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="admin-delete.php?id=<?= $adminItem['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            else{
                ?>
                    <h4 colspan="mb-0">No Record Found</h4>
                <?php
            }
            ?>
        </div>
   </div>
</div>


<?php include('includes/footer.php'); ?>