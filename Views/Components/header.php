<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($data['title']) ? $data['title'] : "Home" ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
   
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 nav-pills" style="margin-left:5%">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $data['title'] === 'Home' ? 'text-white active' : '' ?>" aria-current="page" href="/lession2/public/index.php/">Home</a>
                        </li>
                        <?php if(isset($_SESSION['id'])): ?>
                        <li class="nav-item">
                            <form action="/lession2/public/index.php/logout" method="POST">
                            <button class="nav-link border btn btn-white border border-white" role="button">Logout</button>
                            </form>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $data['title'] === 'Login' ? 'text-white active' : '' ?>" href="/lession2/public/index.php/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $data['title'] === 'Register' ? 'text-white active' : '' ?>" href="/lession2/public/index.php/register">Register</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav my-3 my-lg-0 ml-auto" style=" margin-right:5%">
                        <li class="nav-item">
                            <img class="w-25 h-100" src="../../public/pictures/Logo.jpg" alt="Logo"/>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    