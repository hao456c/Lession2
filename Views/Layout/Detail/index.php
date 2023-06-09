<?php 
    require('../Views/Components/header.php');
?>


        <div class="d-flex justify-content-center ">
            <div class="border border-secondary h-50 w-25 d-flex justify-content-center p-2">
                <div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="full_name">Full Name</label>
                        <label class="form-control" id="full_name"><?php echo isset($data['user']['full_name']) ? $data['user']['full_name'] : '' ?></label>
                        <small class="text-black-50">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email Address</label>
                        <label class="form-control" id="email"><?php echo isset($data['user']['email']) ? $data['user']['email'] : '' ?></label>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="role">Role</label>
                        <label class="form-control" id="role"><?php echo $data['user']['role']  ? 'Admin' : 'User' ?></label>
                    </div>
                </div>
            </div>  
        </div>
<?php 
    require('../Views/Components/footer.php');
?> 
  