<?php
$loginModel = new LoginModel();
$role = $loginModel->findRole();
$user = $loginModel->findUsername();
$id = $loginModel->findID();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Fatura+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="Public/public/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto bg-dark d-flex flex-column min-vh-100">
                <div class="row d-flex flex-column " style="height:93vh;">
                    <div class="row text-white p-4">
                        <h1 class="display-2">Fatura+</h1>
                    </div>
                    <a href="router.php?c=home" style="height:8%;" id="dashboard" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Home') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>">
                        <div class="row text-white px-4 fs-4 text-decoration-none">
                            <span><i class="bi bi-speedometer"></i> <span class="ms-2 d-none d-sm-inline">Dashboard</span></span>
                        </div>
                    </a>
                    <a href="router.php?c=fatura&a=index" id="fatura" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Faturas') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>">
                        <div class="row text-white px-4 fs-4 text-decoration-none">
                            <span><i class="bi bi-receipt-cutoff"></i> <span class="ms-2 d-none d-sm-inline">Faturas</span></span>
                        </div>
                    </a>
                    <?php if ($role != 'cliente') { ?>
                        <a href="router.php?c=iva&a=index" id="iva" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'IVA') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>">
                            <div class="row text-white px-4 fs-4 text-decoration-none">
                                <span><i class="bi bi-percent"></i> <span class="ms-2 d-none d-sm-inline">IVA</span></span>
                            </div>
                        </a>
                        <a href="router.php?c=produto&a=index" id="produtos" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Produtos') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>">
                            <div class="row text-white px-4 fs-4 text-decoration-none">
                                <span><i class="bi bi-cart3"></i> <span class="ms-2 d-none d-sm-inline">Produtos</span></span>
                            </div>
                        </a>
                        <a href="router.php?c=empresa&a=show&id=1" id="empresa" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Empresa') {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>">
                            <div class="row text-white px-4 fs-4 text-decoration-none">
                                <span><i class="bi bi-building"></i> <span class="ms-2 d-none d-sm-inline">Empresa</span></span>
                            </div>
                        </a>
                        <a href="router.php?c=cliente&a=index" id="clientes" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Clientes') {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>">
                            <div class="row text-white px-4 fs-4 text-decoration-none">
                                <span><i class="bi bi-people-fill"></i> <span class="ms-2 d-none d-sm-inline">Clientes</span></span>
                            </div>
                        </a>
                    <?php } else { ?>
                        <div class="row" style="height: 32%"></div>
                    <?php } ?>
                    <?php if ($role == 'admin') { ?>
                        <a href="router.php?c=funcionario&a=index" id="funcionarios" class="item-nav text-decoration-none pt-3 <?php if ($pasta == 'Funcionarios') {
                                                                                                                                    echo 'selected';
                                                                                                                                } ?>">
                            <div class="row text-white px-4 fs-4 text-decoration-none">
                                <span><i class="bi bi-person-square"></i> <span class="ms-2 d-none d-sm-inline">Funcionarios</span></span>
                            </div>
                        </a>
                    <?php } else { ?>
                        <div style="height:8%"></div>
                    <?php } ?>
                    <div class="row" style="height:16%"></div>
                </div>
                <div class="dropdown px-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none fs-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-sm-inline mx-3"><?= $user ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small" aria-labelledby="dropdownUser1">
                        <li><a href="router.php?c=user&a=show&id=<?= $id ?>" class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li style="background-color: red;"><a class="dropdown-item" href="router.php?c=auth&a=logout"><b><i class="bi bi-power mx-3"></i>Sign out</a></b></li>
                    </ul>
                </div>
            </div>

            <div class="col">