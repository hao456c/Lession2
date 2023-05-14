<?php 
    require('../Views/Components/header.php');
?>
    <div class="d-flex justify-content-center">
        <form class="border border-secondary h-50 w-25 d-flex justify-content-center" action method="post">
            <div>
                <div class="form-outline mb-2">
                    <label class="form-label" for="email">Email address</label>
                    <input 
                        type="email" 
                        class="form-control"
                        id="email"
                        name="email"
                        required
                    />
                    <small class="text-black-50">We'll never share your email with anyone else</small>
                </div>
                <div class="form-outline mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input 
                        type="password" 
                        class="form-control"
                        id="password"
                        name="password"
                        required
                    />
                </div>
                <div class="form-outline mb-2">
                    <input type="checkbox" id="remember" name="rememberMe" />
                    <label for="remember">Remember me</label>
                </div>
                <div class="form-outline mb-2">
                    <button class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>  
    </div>
<?php
    if(isset($data['error'])) {
        echo "<script> alert('" . $data['error'] . "') </script>";
    }
?>
<?php 
    require('../Views/Components/footer.php');
?> 