<?php 
    require('../Views/Components/header.php');
?>


        <div class="d-flex justify-content-center ">
            <form action method="POST" class="border border-secondary h-50 w-25 d-flex justify-content-center p-2">
                <div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="full_name">Full Name</label>
                        <input 
                        type="text" 
                        class="form-control"
                        id="full_name"
                        name="full_name"
                        value=<?php echo $data['user']['full_name'] ?>
                        required
                        />
                        <small class="text-black-50">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email Address</label>
                        <input 
                        type="email" 
                        class="form-control"
                        id="email"
                        name="email"
                        value=<?php echo $data['user']['email'] ?>
                        required
                        />
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="password">Password</label>
                        <input 
                        type="password" 
                        class="form-control"
                        id="password"
                        name="password"
                        />
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="password">Confirm Password</label>
                        <input 
                        type="password" 
                        class="form-control"
                        id="confirm_password"
                        name="confirm_password"
                        />
                    </div>
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>  
        </div>
<script>
    var password = document.getElementById("password")
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<?php
    if(isset($data['message'])) {
        echo "<script> alert('" . $data['message'] . "') </script>";
    }
?>
<?php 
    require('../Views/Components/footer.php');
?> 
  