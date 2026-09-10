<?php





$s = "apples, pears # and bananas\ngrapes\nbananas !apples \n# comment";
$m = ['#', '!'];

for ($i = 0; $i < count($m); $i++) {
  $pos = strpos($s, $m[$i]);

  while ($pos !== false) {
    $sub_befor = substr($s, 0, $pos);
    $sub_next = "";
    $pos_n = strpos($s, "\n", $pos);

    if ($pos_n !== false) {
      $sub_next = substr($s, $pos_n);
    }

    $s = rtrim($sub_befor) . $sub_next;

    $pos = strpos($s, $m[$i]);
  }
}

echo $s . "\n";
