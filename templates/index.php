<?php
    require '../php/conexao.inc';
    $consulta="select *from evento";
    $conn=mysqli_query($link,$consulta);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Pricing example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/salvarDados.js">

    </script>

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body style="background-color:#4A708B;">


    <header>
     <div class="collapse bg-dark" id="navbarHeader">
       <div class="container">
         <div class="row">
           <div class="col-sm-8 col-md-7 py-4">
             <h4 class="text-white">About</h4>
             <p class="text-muted">Bem Vindo! Este site tem comum função proporcionar a facilidade na geração de certificado das mais diversas áreas. Além de garantir uma experiência interativa e de sucesso.</p>
           </div>
           <div class="col-sm-4 offset-md-1 py-4">
             <h4 class="text-white">Contact</h4>
             <ul class="list-unstyled">
               <li><a href="#" class="text-white">Follow on Twitter</a></li>
               <li><a href="#" class="text-white">Like on Facebook</a></li>
               <li><a href="#" class="text-white">Email me</a></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
     <div class="navbar navbar-dark bg-dark shadow-sm">
       <div class="container d-flex justify-content-between">
         <a href="#" class="navbar-brand d-flex align-items-center">
           <img src="../img/icone.png" width="50" height="50">
           <strong style="font-size:20pt;">UpCertifica</strong>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
       </div>
     </div>
   </header>


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" style="color:white;">
      <h1 class="display-4">Crie seu certificado gratuito</h1>
      <p class="lead">Bem Vindo! Este site tem como função proporcionar a facilidade na geração de certificado das mais diversas áreas. Além de garantir uma experiência interativa e de sucesso.</p>
    </div>

    <div class="container">
      <p>

<button class="btn  btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color:">
   Lista de Certificados
</button>
<a class="btn btn-dark btn-lg btn-block" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
    Adicionar Certificado
</a>
</p>
<div class="collapse" id="collapseExample1">
<div class="card card-body bg-dark" style="color:white;">

  <form class="form1" action="../php/validar.php" method="POST">
    <div class="form-group">
      <label for="nome">Nome do evento</label>
      <input type="text" class="form-control" name="nome" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="horario">Carga Horária (horas)</label>
      <input type="text" class="form-control" name="horario">
    </div>
    <div class="form-group">
      <label for="orgao">Orgão</label>
      <input type="text" class="form-control" name="orgao">
    </div>
    <label for="kj">Tipo</label>
    <select name="tipo" class="form-control form-control-hg">
      <option selected>Selecione</option>
      <option>Workshop</option>
      <option>Minicurso</option>
      <option>Curso</option>
      <option>Palestra</option>
    </select>
    <br>
    <button type="submit" class="btn btn-light btn-lg">Salvar</button>
  </form>
</div>
</div>

<div class="collapse" id="collapseExample">
  <div class="card card-body bg-dark" style="color:white;">
    <table class="table table-hover">
      <tr>
        <td>Indice</td>
        <td>Nome</td>
        <td>Orgao</td>
        <td>Carga Horária</td>
        <td>Tipo</td>
      </tr onclick="">
      <?php while ($dado=$conn->fetch_array()){?>
      <tr>
        <td><?php echo $dado["id"]; ?></td>
        <td><?php echo $dado['nome']; ?></td>
        <td><?php echo $dado['orgao']; ?></td>
        <td><?php echo $dado['cargaHoraria']; ?></td>
        <td><?php echo $dado['tipo']; ?></td>
      </tr></a>
      <?php } ?>
    </table>

  </div>
</div>
<br>
<button class="btn btn-dark btn-lg" onclick="window.location.href = 'lista.php'";>Avançar >></button>
</div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top container" style="color:white;">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>



    <!-- Bootstrap core JavaScript


    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
