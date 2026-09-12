<?php


function rangeExtraction(array $arr): string
{
  $ranges = getRanges($arr);
  $new_arr = [];

  foreach ($ranges as $range) {
    $len = count($range);

    if ($len >= 3) {
      $new_arr[] = "{$range[0]}-{$range[$len - 1]}";
      continue;
    }

    $new_arr[] = implode(',', $range);
  }

  return implode(',', $new_arr);
}

function getRanges(array $arr): array
{
  $range = [];
  $arr_seq = [$arr[0]];
  $len = count($arr);

  for ($i = 1; $i < $len; $i++) {
    $seq = $arr[$i] - $arr[$i - 1];

    if ($seq !== 1) {
      $range[] = $arr_seq;
      $arr_seq = [];
    }

    $arr_seq[] = $arr[$i];
  }

  $range[] = $arr_seq;

  return $range;
}


//test
$t0 = [-10, -9, -8, -6, -3, -2, -1, 0, 1, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20]; // "-10--8,-6,-3-1,3-5,7-11,14,15,17-20"
$t1 = [-6, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20]; //"-6,-3-1,3-5,7-11,14,15,17-20"

$r0 = rangeExtraction($t0);
$r1 = rangeExtraction($t1);

echo $r0 . "\n";
echo $r1;
