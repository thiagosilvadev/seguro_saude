<?php

if (empty($_POST)) {
  header("Location: index.html");
}

$nome = $_POST['nome'];
$faixaEtaria = $_POST['faixaEtaria'];
$doencaPrevia = $_POST['doenca'] === "on" ? true : false;

function calculaValor($faixaEtaria, $temDoenca)
{

  $valor = 200 * pow(1.5, $faixaEtaria);
  $acrescimo = 0;
  if ($temDoenca) {
    $acrescimo = $valor * 1.3;
  }
  return $valor + $acrescimo;
}

$valor = calculaValor($faixaEtaria, $doencaPrevia);


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguro Saúde - Valor do seguro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

  <div class="container">

    <h2>Seguro: </h2>

    <p><?= $nome ?>, o valor do seu seguro é: <span id="valor"><?= $valor ?></span></p>

  </div>
</body>

<script>
  window.addEventListener("load", function() {
    const element = document.querySelector("#valor")
    const {
      format
    } = new Intl.NumberFormat('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    })
    const value = element.innerText;

    element.innerHTML = format(value);


  });
</script>

</html>