<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <?php
                if(isset($role) && ($role == 'admin' || $role == 'funcionario' || $role == 'cliente'))
                {
                    echo '<a class="navbar-brand" href="router.php?r=dashboard/'.$role.'">Fatura+</a>';

                } else {
                    echo '<a class="navbar-brand" href="router.php?r=home/index">Fatura+</a>';
                }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="width:90%"></div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                            if(isset($role) && ($role == 'admin' || $role == 'funcionario' || $role == 'cliente'))
                            {
                                echo '<a class="nav-link" href="router.php?r=auth/logout">Logout('.$role.')</a>';
                            } else {
                                echo '<a class="nav-link" href="router.php?r=auth/login">Login</a>';
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>