<?php
// Inicializar as variaveis
$senha = "";
$texto = "";
$texto2 = "";
$error = "";
$color = "";
$result = "";
$valid = true;

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declara funcao
	require_once('criptar.php');

	// recebe os dados do formulario
	$senha = $_POST['senha'];
	$texto = $_POST['texto'];

	// Verifica se a senha nao esta vazia
	if (empty($_POST['senha']))
	{
		$error = "Colocar a senha!";
		$valid = false;
	}

	// Verifica se o texto nao esta vazio
	else if (empty($_POST['texto']))
	{
		$error = "Colocar texto para criptografar!";
		$valid = false;
	}

	// Verifica se a senha é alfabetica
	else if (isset($_POST['senha']))
	{
		if (!ctype_alpha($_POST['senha']))
		{
			$error = "Senha com caracteres alfabeticos!";
			$valid = false;
		}
	}

	// Validacao
	if ($valid)
	{
		// Criptografar quando clicar no botão
		if (isset($_POST['criptar']))
		{
      $n = -2;
			$z = 7;
			$frase = "nilson";
			$texto = encrypt($senha, $texto);

      $rotated = substr($texto, $n) . substr($texto, 0, $n);

			$rotated2 = substr($rotated, $z) . substr($rotated, 0, $z);

			$texto2 = encrypt($frase, $rotated2);
			$error = "Texto criptografado com sucesso!";
			$color = "#339551";

      $result = htmlspecialchars($texto2);
		}
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Criptografia</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/criptografia/master.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/criptografia/script.js"></script>
  </head>
  <body class="fadeIn">
    <div class="content">
      <header class="header">
        <div class="header-logo">
          <img class="logo-img" src="./midia/logo.png"/>
        </div>
        <ul class="header-nav">
          <a href="decriptografia.php"> <li class="nav-item">Decriptografia</li> </a>
          <a href="index.php"> <li class="nav-item">Sobre</li> </a>
          <a href="criptografia.php"> <li class="nav-item currentPage">Criptografia</li> </a>
        </ul>
        <div class="icon-arrow">
          <a href="#main"> <i class="arrow-down fa fa-angle-down" aria-hidden="true"></i> </a>
        </div>
      </header>
      <main class="main">
        <h1 class="main-title" id="main">Criptografar</h1>
        <form action="criptografia.php" method="post">
          <div class="dados">
            <textarea placeholder="Digite sua mensagem" id="box" name="texto"></textarea>
            <input type="text" placeholder="Digite sua senha" maxlength="8" minlength="8" name="senha" id="pass" value="<?php echo htmlspecialchars($senha); ?>" />
          </div>
          <div class="result">
            <h1 id="result-text"><?php echo $result; ?></h1>
          </div>
          <div class="msg" style="color: <?php echo htmlspecialchars($color) ?>; clear:both;"><?php echo htmlspecialchars($error) ?></div>
      		<input type="submit" name="criptar" class="button" value="Criptografar" onclick="validate(1)" />
          <div class="decriptografar"><a href="descriptar.php">Deseja decriptografar? Click Aqui!</a></div>
          <div style="clear: both;"></div>
        </form>
      </main>
    </div>
  </body>
</html>
