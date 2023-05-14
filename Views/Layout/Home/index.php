<?php 
    require('../Views/Components/header.php');
?>

    <?php
        if(isset($_SESSION['role']) ):
            if($_SESSION['role']):
    ?>
    <div class="d-flex justify-content-center ">
        <table class="table border border-secondary h-100 w-75 p-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
        </table>
    </div>
    <?php else: ?>
        <div class="d-flex justify-content-center ">
            <div class="border border-secondary h-50 w-25 d-flex justify-content-center p-2">
                <div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="full_name">Full Name</label>
                        <label class="form-control" id="full_name"><?php echo isset($data['value']['full_name']) ? $data['value']['full_name'] : 'hello' ?></label>
                        <small class="text-black-50">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email Address</label>
                        <label class="form-control" id="email"><?php echo isset($data['value']['email']) ? $data['value']['email'] : 'hello' ?></label>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="role">Role</label>
                        <label class="form-control" id="role"><?php echo isset($data['value']['role']) ? $data['value']['role'] : 'hello' ?></label>
                    </div>
                </div>
            </div>  
        </div>
    <?php
        endif;
    endif;
    ?>
<?php 
    require('../Views/Components/footer.php');
?> 
  