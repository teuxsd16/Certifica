<?php
    require '../php/conexao.inc';
    $consulta1="select *from lista";

    $conn1=mysqli_query($link,$consulta1);


    $conn3=mysqli_query($link,$consulta1);
    $escolha=0;
    $valor=0;
    if(!empty($_POST["escolha"])){

      $escolha=$_POST["escolha"];
      $consulta2="select *from evento where id='$escolha'";

    }

    else{
        $escolha = $valor;
        $consulta2="select *from evento where id='$escolha'";
    }

    $conn2=mysqli_query($link,$consulta2);


?>
<!doctype html>
<html>
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
      <p class="lead">Selecione o curso e um participante a partir de sua frequência e gere seu certificado agora mesmo.</p>
    </div>

    <div class="container">
      <div class="bg-info" style="border-radius:5px;">
          <div class="row" style="padding:5%;color:white; font-size:15pt;">
            <form class="" action="../php/gerador.php" method="post">
              <div class="row">

                <div class="col-md-8" >

                  <label class="form-group" for="tipo">Evento selecionado</label>

                  <?php while ($dado=$conn2->fetch_array()){?>
                  <input type="text" class="form-control disabled" name="tipo" value="<?php echo $dado["id"]." - ".$dado["tipo"]." - ".$dado["nome"]." - ".$dado["orgao"]; ?>" readonly>
                  <?php } ?>
                </div>

                <div class="col-md-8" >
                  <br>
                  <label class="form-group">Selecione a Pessoa</label>
                  <select name="pessoa" class="form-control form-lg">
                    <option selected>Selecione</option>
                    <?php while ($dado3=$conn3->fetch_array()){?>
                    <option><?php echo $dado3["id"]." - Nome: ".$dado3["nome"]." -- E-mail: ".$dado3["email"]?></option>
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
          <input type="hidden" class="form-control disabled" name="valor" value="<?php echo $esscolha; ?>">

          <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" class="form-control" name="nome" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email">
          </div>
          <br>
          <button type="submit" class="btn btn-light btn-lg" >Salvar</button>
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
          <?php

          while ($dado=$conn1->fetch_array()){?>

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
    <footer class="pt-4 my-md-5 pt-md-5 border-top container" style="color:white;">

      <div class="row">
        <div class="col-12 col-md">
          <small class="d-block mb-3">&copy; Todos os direitos reservados 2017-2018</small>
        </div>

      </div>
    </footer>



    <!-- Bootstrap core JavaScript


    ================================================== -->
    <!-- Placed at te end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
