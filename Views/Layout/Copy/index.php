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
                    <button class="btn btn-primary" onClick="copy()">Copy</button>
                </div>
            </div>  
        </div>
    <script>
        function copy() {
            var value = 
                'fullname: ' + <?php echo "'" . $data['user']['full_name'] . "' " ?> +
                ', email: ' + <?php echo "'" . $data['user']['email'] . "' " ?> +
                ', role:' + <?php echo $data['user']['role']  ? "'Admin'" : "'User'" ?>
                ;
            
            var tempInput = document.createElement("input");
            tempInput.setAttribute("value", value);
            document.body.appendChild(tempInput);

            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
        }
    </script>
<?php 
    require('../Views/Components/footer.php');
?> 
  