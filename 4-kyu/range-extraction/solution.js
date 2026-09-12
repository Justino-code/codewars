function rangeExtraction(arr) {
  let ranges = getRange(arr);
  let new_arr = [];

  for (let range of ranges) {
    let len = range.length;
    if (len >= 3) {
      new_arr.push(`${range[0]}-${range[len - 1]}`);
      continue;
    }

    new_arr.push(range.join(','));
  }

  return new_arr.join(',');
}

function getRange(arr) {
  let range = [];
  let r_s = [arr[0]];

  for (let i = 1; i < arr.length; i++) {
    let e = (arr[i] - arr[i - 1]);

    if (e !== 1) {
      range.push(r_s);
      r_s = [];
    }

    r_s.push(arr[i]);
  }

  range.push(r_s);

  return range;
}

//test
t0 = [-10, -9, -8, -6, -3, -2, -1, 0, 1, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20]; // "-10--8,-6,-3-1,3-5,7-11,14,15,17-20"

t1 = [-6, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20]; //"-6,-3-1,3-5,7-11,14,15,17-20"

let r0 = rangeExtraction(t0);
let r1 = rangeExtraction(t1);

console.log(r0);
console.log(r1);
