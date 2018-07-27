<?php
    require '../php/conexao.inc';
    $consulta1="select *from lista";
    $consulta2="select *from evento";
    $conn1=mysqli_query($link,$consulta1);
    $conn2=mysqli_query($link,$consulta2);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Frequencia</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body style="background-color:#4A708B;">



    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" style="color:white;">
      <h1 class="display-4">Simples com  a Lista de Frequencia</h1>
      <p class="lead">Bem Vindo! Este site tem como função proporcionar a facilidade na geração de certificado das mais diversas áreas. Além de garantir uma experiência interativa e de sucesso.</p>
    </div>

    <div class="container">
      <div class="bg-danger" style="border-radius:5px;">
          <div class="row" style="padding:5%;color:white; font-size:15pt;">
            <form class="" action="../php/gerador.php" method="post">
              <div class="row">

                <div class="col-md-8" >
                  <label class="form-group">Selecione o tipo de Certificado</label>
                  <select name="tipo" class="form-control form-lg">
                    <option selected>Selecione</option>
                    <?php while ($dado1=$conn2->fetch_array()){?>
                    <option><?php echo $dado1["id"]." - ".$dado1["tipo"]." -- Nome: ".$dado1["nome"]." -- "."  Carga Horária: ".$dado1["cargaHoraria"]." horas "." -- Orgão: ".$dado1["orgao"]; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-md-4" style="">
                    <button  class="btn btn-dark btn-lg">Gerar Certificado</button>
                </div>
            </div>


            </form>
          </div>
      </div>
      <p>
      <a class="btn btn-dark btn-lg btn-block" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
          Adicionar Pessoa
      </a>
      </p>
      <div class="collapse" id="collapseExample1">
      <div class="card card-body bg-dark" style="color:white;">

        <form class="form1" action="../php/validarFrequencia.php" method="POST">
          <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" class="form-control" name="nome" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email">
          </div>
          <br>
          <button type="submit" class="btn btn-light btn-lg">Salvar</button>
        </form>
      </div>
      </div>
      <div class="container bg-dark">
        <table class="table table-hover" style="color:white;">
          <tr>
            <td>Indice</td>
            <td>Nome</td>
            <td>E-mail</td>
          </tr>
          <?php while ($dado=$conn1->fetch_array()){?>
          <tr>
            <td><?php echo $dado["id"]; ?></td>
            <td><?php echo $dado["nome"]; ?></td>
            <td><?php echo $dado['email']; ?></td>
          </tr></a>
          <?php } ?>
        </table>
      </div>
      <button class="btn btn-dark btn-lg" onclick="window.location.href = 'index.php'";><< Voltar</button>
   </div>
    <hr width=600 style="background-color:white; height:2px;">




    <!-- Bootstrap core JavaScript


    ================================================== -->
    <!-- Placed at te end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
