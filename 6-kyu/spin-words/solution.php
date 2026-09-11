<?php


function spinWords(string $str): string
{
  $str_array = explode(" ", $str);
  $size = count($str_array);

  for ($i = 0; $i < $size; $i++) {
    $len = strlen($str_array[$i]);

    if ($len < 5) continue;

    $str_array[$i] = strrev($str_array[$i]);
  }

  return implode(" ", $str_array);
}

//test

echo spinWords("Hey fellow warriors");
