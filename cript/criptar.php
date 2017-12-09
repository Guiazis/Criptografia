<?php
// Funcao para criptografar
function encrypt($senha, $text)
{
	// Muda a chave para minuscula
	$senha = strtolower($senha);

	// inicializa as variaveis
	$texto = "";
	$ki = 0;
	$kl = strlen($senha);
	$length = strlen($text);

	// Iterar sobre cada linha de texto
	for ($i = 0; $i < $length; $i++)
	{
		// se linha em alfabetico
		if (ctype_alpha($text[$i]))
		{
			// Tranforma em maiuscula
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($senha[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}

			// Tranforma em minuscula
			else
			{
				$text[$i] = chr(((ord($senha[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}

			// Atualiza o indice da chave
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}

	// Retotna o texto criptografado
	return $text;
}

?>
