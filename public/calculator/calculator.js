var count = "";
var total = "";

var result = document.getElementById("result");

var modulus = document.getElementById("%");
modulus.onclick = (param) => {
  addTotal(modulus);
};

var pangkat = document.getElementById("^");
pangkat.onclick = (param) => {
  addTotal(pangkat);
};

var tambah = document.getElementById("+");
tambah.onclick = (param) => {
  addTotal(tambah);
};

var kurang = document.getElementById("-");
kurang.onclick = (param) => {
  addTotal(kurang);
};

var kali = document.getElementById("*");
kali.onclick = (param) => {
  addTotal(kali);
};

var bagi = document.getElementById("/");
bagi.onclick = (param) => {
  addTotal(bagi);
};

var equals = document.getElementById("=");
equals.onclick = function () {
  addTotal(equals);
  total = eval(count.slice(0, -1));
  count += ` ${total}`;
  addTotal(equals);
};

var reset = document.getElementById("ce");
reset.onclick = function () {
  total = "";
  count = "";
  addTotal(reset);
};

var sembilan = document.getElementById("9");
sembilan.onclick = (param) => {
  addTotal(sembilan);
};

var delapan = document.getElementById("8");
delapan.onclick = (param) => {
  addTotal(delapan);
};

var tujuh = document.getElementById("7");
tujuh.onclick = (param) => {
  addTotal(tujuh);
};

var enam = document.getElementById("6");
enam.onclick = (param) => {
  addTotal(enam);
};

var lima = document.getElementById("5");
lima.onclick = (param) => {
  addTotal(lima);
};

var empat = document.getElementById("4");
empat.onclick = (param) => {
  addTotal(empat);
};

var tiga = document.getElementById("3");
tiga.onclick = (param) => {
  addTotal(tiga);
};

var dua = document.getElementById("2");
dua.onclick = (param) => {
  addTotal(dua);
};

var satu = document.getElementById("1");
satu.onclick = (param) => {
  addTotal(satu);
};

var nol = document.getElementById("0");
nol.onclick = (param) => {
  addTotal(nol);
};

var nolnol = document.getElementById("00");
nolnol.onclick = (param) => {
  addTotal(nolnol);
};

var koma = document.getElementById(".");
koma.onclick = (param) => {
  addTotal(koma);
};

function addTotal(num) {
  var operator =
    num == pangkat ||
    num == modulus ||
    num == tambah ||
    num == kurang ||
    num == kali ||
    num == bagi ||
    num == equals;

  var last = count.charAt(count.length - 1);
  var lastOperator =
    last == "^" ||
    last == "%" ||
    last == "+" ||
    last == "-" ||
    last == "*" ||
    last == "/" ||
    last == "=";

  var first = count.charAt(0);

  if (total == "" && num != reset) {
    if (operator) {
      if (lastOperator) {
        count = `${count.slice(0, -1)}${num.value}`;
      } else {
        count += ` ${num.value}`;
      }
    } else {
      if (first == operator) {
        count = num.value;
      } else if (lastOperator) {
        count += ` ${num.value}`;
      } else {
        count += `${num.value}`;
      }
    }
  }

  result.innerHTML = count;
  console.log(count);
}
