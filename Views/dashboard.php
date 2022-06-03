    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Dashboard</span>
    </div>
    <div class="row" style="height:95.4vh; background-color: #e8e8e9;">
        <div class="row" style="height: 40vh;">
            <div class="col-4 mx-2 mt-5 " style="border: 4px solid ; border-radius: 15px;">
                <div class="row vh-50 display-1 text-center pt-5"><i class="bi bi-receipt"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <?php if($role != 'cliente') { ?>
                            <li>Criação de faturas</li>
                            <li>Editar faturas</li>
                            <li>Apagar faturas</li>
                        <?php } ?>
                        <li>Visualizar Faturas</li>
                    </ul>
                </div>
            </div>
            <?php if($role != 'cliente') { ?>
            <div class="col mx-2 mt-5" style=" border: 4px solid ; border-radius: 15px;">
                <div class="row vh-50 display-1 text-center pt-5"><i class="bi bi-percent"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <li>Criação de IVA</li>
                        <li>Editar IVA</li>
                        <li>Apagar IVA</li>
                    </ul>
                </div>
            </div>
            <div class="col mx-2 mt-5 w-25" style=" border: 4px solid ; border-radius: 15px;" >
                <div class="row display-1 text-center pt-5"><i class="bi bi-cart3"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <li>Criação de produtos</li>
                        <li>Editar produtos</li>
                        <li>Apagar produtos</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="height:40vh">
           
            <div class="col mx-2 mt-5" style=" border: 4px solid ; border-radius: 15px;">
                <div class="row vh-50 display-1 text-center pt-5"><i class="bi bi-building"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <li>Editar dados da empresa</li>
                    </ul>
                </div>
            </div>
            
            <div class="col mx-2 mt-5" style=" border: 4px solid ; border-radius: 15px;">
                <div class="row vh-50 display-1 text-center pt-5"><i class="bi bi-people-fill"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <li>Criação de clientes</li>
                        <li>Editar clientes</li>
                        <li>Apagar clientes</li>
                    </ul>
                </div>
            </div>
            <?php } 
            if($role == 'admin') { ?>
            <div class="col mx-2 mt-5" style=" border: 4px solid ; border-radius: 15px;">
                <div class="row h-50 display-1 text-center pt-5"><i class="bi bi-person-square"></i></div>
                <div class="row mx-5 mt-4">
                    <ul>
                        <li>Criação de funcionarios</li>
                        <li>Editar funcionarios</li>
                        <li>Apagar funcionarios</li>
                    </ul>
                </div>
            </div>
            <?php }  else { ?>
            <div class="col mx-2 mt-5"></div>
            <?php } ?>
        </div>
    </div>
    
