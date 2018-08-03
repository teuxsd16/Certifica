<?php
    require '../php/conexao.inc';
    $consulta="select *from evento";
    $conn=mysqli_query($link,$consulta);

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>MMVL</title>

    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon" />
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
           <img src="../img/icon.png" width="50" height="50">
           <strong style="font-size:20pt;">&nbsp;MMVL</strong>
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

<button class="btn  btn-lg btn-block" type="button" aria-expanded="false" aria-controls="collapseExample" id="bt1">
   Selecionar Certificado
</button>
<button class="btn btn-dark btn-lg btn-block" type="button" aria-expanded="false" aria-controls="collapseExample" id="bt2">
    Adicionar Certificado
</button>
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
  <form action="lista.php" method="post">
    <table class="table table-hover">
      <tr>
        <td> Selecione</td>
        <td>Nome</td>
        <td>Orgao</td>
        <td>Carga Horária</td>
        <td>Tipo</td>
      </tr onclick="">
      <?php while ($dado=$conn->fetch_array()){?>

      <tr>

          <td style="padding-left: 5%;">

            <div class="custom-control custom-radio">
                <input type="radio" id="<?php echo $dado['id']; ?>" name="escolha" class="custom-control-input test" value="<?php echo $dado['id']; ?>">
                <label class="custom-control-label" for="<?php echo $dado['id']; ?>"><?php echo $dado['id']; ?></label>
              </div>
          </td>
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['orgao']; ?></td>
          <td><?php echo $dado['cargaHoraria']; ?></td>
          <td><?php echo $dado['tipo']; ?></td>

      </tr>
        <?php } ?>
    </table>
    <button type="submit" class="btn btn-primary btn-lg next" style="width:20%;">Avançar >></button>
  </form>

  </div>
</div>

</div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top container" style="color:white;">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3">&copy; Todos os direitos reservados 2017-2018</small>
          </div>

        </div>
      </footer>
    </div>



    <!-- Bootstrap core JavaScript


    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $("#bt1").click(function () {
        $("#collapseExample").collapse("show");
        $("#collapseExample1").collapse("hide");
      });
      $("#bt2").click(function () {
        $("#collapseExample1").collapse("show");
        $("#collapseExample").collapse("hide");
      });

      $(document).ready(function(e) {
        if($(this).is(':checked')){
        $(".next").prop('disabled', false);
        }
        else
        $(".next").prop('disabled', true);
      });

      $(".test").click(function() {

        if($(this).is(':checked')){
        $(".next").prop('disabled', false);
      }
          });



    </script>

  </body>
</html>
