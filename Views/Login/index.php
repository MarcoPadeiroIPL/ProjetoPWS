<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-7 bg-dark"></div>
        <div class="col" style="background-color: #e8e8e9;"></div>
        <div class="shadow-lg" style="display:block; float:center; z-index: 1000; position:absolute; left:50vw; top:50vh; transform: translate(-50%, -50%); width: 70vw; height: 75vh;">
            <div class="row h-100">
                <div class="text-white h-100 display-1" style="width:62%; display: flex; justify-content: center; align-items: center;">Fatura+</div>
                <div class="col">
                    <div class="row h-25 display-3" style="display: flex; justify-content: center; align-items: center;">
                        Login
                    </div>
                    <div class="row h-50" style="display: flex; justify-content: center; align-items: center;">
                        <form action="router.php?c=auth&a=login" method="post">
                            <div class="row mt-5 mb-5">
                                <div class="row" style="display: flex; justify-content: center; align-items: center;"><input type="text" value="<?php if ($wrong == 'password') echo $user ?>" placeholder="Username" class="form-control <?php if ($wrong == 'username') echo 'is-invalid'; ?>" id="inputUsername" name="username" required style="border-radius:30px; width:70%; height:6vh"></div>
                                <?php if ($wrong == 'username') { ?>
                                    <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;">Username não existe</div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="row" style="display: flex; justify-content: center; align-items: center;"><input style="border-radius:30px; width:70%; height:6vh" type="password" placeholder="Password" class="form-control <?php if ($wrong == 'password') echo 'is-invalid'; ?>" id="inputPassword" name="password" required></div>
                                <?php if ($wrong == 'password') { ?>
                                    <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;">Password incorreta</div>
                                <?php } ?>
                            </div>
                            <div class="mt-5 fs-4" style="display: flex; justify-content: center; align-items: center;">
                                <button style="width:25%; border-radius:30px; height:6vh" type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>