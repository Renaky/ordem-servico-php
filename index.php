<?php
session_start();
require_once('header.php'); 
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">GERENCIADOR DE ORDEM DE SERVIÇO</h1>
                                    </div>
                                   <?php
                                    if (isset($_SESSION['texto_erro_login'])):
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro_login'] ?></strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                   <?php
									unset($_SESSION['texto_erro_login']);
                                    endif;
                                   ?>
                                   
                                    <form class="user" action="valida_login.php" method="post">
                                        <div class="form-group">
                                            <label> Email </label>
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Endereço de Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label> Senha </label>
                                            <input type="password" class="form-control form-control-user"
                                                id="senha" name="senha" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <label> Perfil </label>
                                            <select class="form-control" id="perfil" name="perfil" required>
                                                <option value=""> </option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Cliente</option>
                                                <option value="3">Terceirizado</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Acessar
                                        </button>                                        
                                    </form>
                                    <div>
                                        <p class="pt-2"><a href="mudar_senha_form.php">Esqueci a senha</a></p>
                                    </div>
                                       
                                    <div>
                                        <p class=" pt-2 text-gray">Não possui cadastro?</p>
                                       
                                            <a class="btn btn-info btn-user btn-block" href="cad_cliente_externo.php">Me cadastrar</a>
                                    </button>
                                    </div>
                                    
                                       

                                    
                                    <div class="text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validate.js"></script>


