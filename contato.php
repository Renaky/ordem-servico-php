<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <form id="contact" action="mail.php" method="post" enctype="multipart/form-data">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-8">
                    <h6 class="m-0 font-weight-bold text-primary" id="title">CONTATO</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nome Completo</label>
                <input type="text" class="form-control form-control-user" id="name" name="name" value="" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control form-control-user" id="email" name="email" value="" required>
            </div>
            <div class="form-group">
                <label>Assunto</label>
                <input type="text" class="form-control form-control-user" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label>Mensagem</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label>Anexo</label>
                <input type="file" class="form-control-file" id="attachment" name="attachment">
            </div>
        </div>
        <div class="card-footer text-muted" id="btn-form">
            <div class="text-right">
                <a title="Voltar" href="home.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-envelope">&nbsp;</i>Enviar</button>
            </div>
        </div>
    </div>
</form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once('footer.php');
?>