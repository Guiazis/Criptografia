<?php

// funcao para descifrar o texto
function decrypt($senha, $text)
{
  // Muda a chave para minuscula
  $senha = strtolower($senha);

  // intialize variables
  $texto = "";
  $ki = 0;
  $kl = strlen($senha);
  $length = strlen($text);

  // Iterar sobre cada linha de texto
  for ($i = 0; $i < $length; $i++)
  {
    // Se letras alfabetica descifra
    if (ctype_alpha($text[$i]))
    {
      // tranforma em maiuscula
      if (ctype_upper($text[$i]))
      {
        $x = (ord($text[$i]) - ord("A")) - (ord($senha[$ki]) - ord("a"));

        if ($x < 0)
        {
          $x += 26;
        }

        $x = $x + ord("A");

        $text[$i] = chr($x);
      }

      // Transforma em minuscula
      else
      {
        $x = (ord($text[$i]) - ord("a")) - (ord($senha[$ki]) - ord("a"));

        if ($x < 0)
        {
          $x += 26;
        }

        $x = $x + ord("a");

        $text[$i] = chr($x);
      }

      // Atualiza o indice da chave
      $ki++;
      if ($ki >= $kl)
      {
        $ki = 0;
      }
    }
  }

  // Retorna o texto descifrado
  return $text;
}

?>
