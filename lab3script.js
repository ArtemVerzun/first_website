const max = 15;
var n=2, m=3;
var arr = [];

for (let i = 0; i < n; i++) {
  var row = [];
  for (let j = 0; j < m; j++) {
    row[j] = Math.floor(Math.random() * max);
  }
  arr[i] = row;
}

var sum = 0;
for (let i = 0; i < n; i++) {
  for (let j = 0; j < m; j++) {
    sum += arr[i][j];
 }
}
var avg = sum/(n*m);

var result = [];
for (let i = 0; i < n; i++) {
  var count = 0;
  for (let j = 0; j < m; j++) {
    if (arr[i][j] > avg)
      count++;
 }
  result[i] = count;
}

var arrstr = ""
for (let i = 0; i < n; i++) {
 arrstr += '\t' + arr[i] + '\n'
}

var str = "array: " + arrstr + '\n' + "avg: " + avg + '\n' + "result: " + result

str
