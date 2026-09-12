


function spinWords(str) {
  str_array = str.split(" ");

  for (i = 0; i < str_array.length; i++) {
    if (str_array[i].length < 5)
      continue;

    str_array[i] = str_array[i].split('').reverse().join('');
  }

  return str_array.join(" ");
}



console.log(spinWords("Hello, this is backwards."));
