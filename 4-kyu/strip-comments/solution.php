<?php
function stripComments(string $str, array $markers): string
{
  for ($i = 0; $i < count($markers); $i++) {
    $pos = strpos($str, $markers[$i]);

    while ($pos !== false) {
      $str_before = substr($str, 0, $pos);
      $str_next = "";
      $pos_n = strpos($str, "\n", $pos);

      if ($pos_n !== false) {
        $str_next = substr($str, $pos_n);
      }

      $str = rtrim($str_before, " ") . $str_next;

      $pos = strpos($str, $markers[$i]);
    }
  }

  return $str;
}

// test

$str = "apples, pears # and bananas\ngrapes\nbananas !apples \n# comment";
$markers = ['#', '!'];

$result = stripComments($str, $markers);

echo $result . "\n";
