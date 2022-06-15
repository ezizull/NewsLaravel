const penjualan = document.querySelector("#penjualan");
const orang = document.querySelector("#orang");
const result = document.querySelector("#result");

orang.addEventListener("keyup", (e) => {
  if (e.keyCode === 13) {
    e.preventDefault();
    counting();
  }
});

penjualan.addEventListener("keyup", (e) => {
  if (e.keyCode === 13) {
    e.preventDefault();
    counting();
  }
});

const counting = function (e) {
  if (orang.value.length === 0 || isNaN(orang.value)) {
    orang.classList.add("input-error");
  } else {
    orang.classList.remove("input-error");
  }

  if (penjualan.value.length === 0 || isNaN(penjualan.value)) {
    penjualan.classList.add("input-error");
  } else {
    penjualan.classList.remove("input-error");
  }

  if (
    orang.value.length !== 0 &&
    !isNaN(orang.value) &&
    penjualan.value.length !== 0 &&
    !isNaN(penjualan.value)
  ) {
    var percent =
      orang.value < 10 && orang.value > -1
        ? 0.05
        : orang.value <= 50 && penjualan.value < 1000000
        ? 0.1
        : orang.value <= 50 && penjualan.value > 1000000
        ? 0.125
        : orang.value > 50
        ? 0.15
        : 0;

    result.innerHTML = `
    <table class="table-fixed w-1/2">
      <tbody>
        <tr>
          <td>Banyak Orang</td>
          <td>${orang.value}</td>
        </tr>
        <tr>
          <td>Penjualan</td>
          <td>${penjualan.value}</td>
        </tr>
        <tr>
          <td>Percent Komisi</td>
          <td>${percent}</td>
        </tr>
        <tr>
          <td>Total Komisi</td>
          <td>${penjualan.value * percent}</td>
        </tr>
      </tbody>
    </table>`;
  }
};
