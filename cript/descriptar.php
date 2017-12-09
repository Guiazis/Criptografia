<?php
// Inicializar as variaveis
$senha = "";
$texto = "";
$error = "";
$color = "";
$result = "";
$valid = true;

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declara funcao
	require_once('descifra.php');

	// recebe os dados do formulario
	$senha = $_POST['senha'];
	$texto = $_POST['texto'];

	$tamanho = strlen($texto);
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
			$error = "Senha com caracteres alfanumericos!";
			$valid = false;
		}
	}

	// Validacao
	if ($valid)
	{

		// Se clicar no botão vai descifrar
		if (isset($_POST['descifrar']))
		{
			// echo $texto. "<br>";
			$n = 2;
			$z = - 7;
			$frase = "nilson";
			// primeira parte passa na cifra de vigenere
			$texto2 = decrypt($frase, $texto);
			// faz a substituicao
			$rotated2 = substr($texto2, $z) . substr($texto2, 0, $z);
			// faz outra substituicao
			$rotated = substr($rotated2, $n) . substr($rotated2, 0, $n);
			//finaliza com a cifra de vigenere para achar o texto
			$textonew = decrypt($senha, $rotated);

			$error = "Texto descriptografado com sucesso!";
			$color = "#339551";

      $result = htmlspecialchars($textonew);
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
    <link rel="stylesheet" href="./css/decriptografia/master.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/decriptografia/script.js"></script>
  </head>
  <body class="fadeIn">
    <div class="content">
      <header class="header">
        <div class="header-logo">
          <img class="logo-img" src="./midia/logo.png"/>
        </div>
        <ul class="header-nav">
          <a href="descriptar.php"> <li class="nav-item currentPage">Decriptografia</li> </a>
          <a href="index.php"> <li class="nav-item">Sobre</li> </a>
          <a href="criptografia.php"> <li class="nav-item">Criptografia</li> </a>
        </ul>
        <div class="icon-arrow">
          <a href="#main"> <i class="arrow-down fa fa-angle-down" aria-hidden="true"></i> </a>
        </div>
      </header>
      <main class="main">
        <h1 class="main-title" id="main">Decriptografar</h1>
        <form action="descriptar.php" method="post">
          <div class="dados">
            <textarea placeholder="Digite sua mensagem" id="box" name="texto"></textarea>
            <input type="text" placeholder="Digite sua senha" maxlength="8" minlength="8" name="senha" id="pass" value="<?php echo htmlspecialchars($senha); ?>" />
          </div>
          <div class="result">
            <h1 id="result-text"><?php echo $result; ?></h1>
          </div>
          <div class="msg" style="color: <?php echo htmlspecialchars($color) ?>; clear:both;"><?php echo htmlspecialchars($error) ?></div>
          <input type="submit" name="descifrar" class="button" value="Decriptografar" onclick="validate(2)" />
          <div class="decriptografar"><a href="criptografia.php">Deseja criptografar? Click Aqui!</a></div>
          <div style="clear: both;"></div>
        </form>
      </main>
    </div>
  </body>
</html>
