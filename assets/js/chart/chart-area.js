$(document).ready(function () {
  getBulan();
});

function filterTahun() {
  $("#chart").empty();
  $("#chart").append('<canvas id="myAreaChart"></canvas>');
  getBulan();
}

function filterTahunPegawai() {
  $("#chartPegawai").empty();
  $("#chartPegawai").append('<canvas id="myAreaChartPegawai"></canvas>');
  getBulanPegawai();
}

// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function getBulan() {
  var tahun = $("#tahun").val();
  var link = $("#baseurl").val();
  var base_url = link + "home/getFilterTahun";
  $.ajax({
    type: "POST",
    data: {
      tahun: tahun,
    },
    url: base_url,
    dataType: "json",
    success: function (hasil) {
      grafik(
        hasil.jumlahODPSJanuari,
        hasil.jumlahODPSFebruari,
        hasil.jumlahODPSMaret,
        hasil.jumlahODPSApril,
        hasil.jumlahODPSMei,
        hasil.jumlahODPSJuni,
        hasil.jumlahODPSJuli,
        hasil.jumlahODPSAgustus,
        hasil.jumlahODPSSeptember,
        hasil.jumlahODPSOktober,
        hasil.jumlahODPSNovember,
        hasil.jumlahODPSDesember,
        hasil.jumlahPT2Januari,
        hasil.jumlahPT2Februari,
        hasil.jumlahPT2Maret,
        hasil.jumlahPT2April,
        hasil.jumlahPT2Mei,
        hasil.jumlahPT2Juni,
        hasil.jumlahPT2Juli,
        hasil.jumlahPT2Agustus,
        hasil.jumlahPT2September,
        hasil.jumlahPT2Oktober,
        hasil.jumlahPT2November,
        hasil.jumlahPT2Desember,
        hasil.odpNullJanuari,
        hasil.odpNullFebruari,
        hasil.odpNullMaret,
        hasil.odpNullApril,
        hasil.odpNullMei,
        hasil.odpNullJuni,
        hasil.odpNullJuli,
        hasil.odpNullAgustus,
        hasil.odpNullSeptember,
        hasil.odpNullOktober,
        hasil.odpNullNovember,
        hasil.odpNullDesember
      );
    },
  });
}

function getBulanPegawai() {
  var tahun = $("#tahun").val();
  var link = $("#baseurl").val();
  var base_url = link + "home/getFilterTahunPegawai";
  $.ajax({
    type: "POST",
    data: {
      tahun: tahun,
    },
    url: base_url,
    dataType: "json",
    success: function (hasil) {
      grafikPegawai(
        hasil.jumlahODPSJanuari,
        hasil.jumlahODPSFebruari,
        hasil.jumlahODPSMaret,
        hasil.jumlahODPSApril,
        hasil.jumlahODPSMei,
        hasil.jumlahODPSJuni,
        hasil.jumlahODPSJuli,
        hasil.jumlahODPSAgustus,
        hasil.jumlahODPSSeptember,
        hasil.jumlahODPSOktober,
        hasil.jumlahODPSNovember,
        hasil.jumlahODPSDesember,
        hasil.jumlahPT2Januari,
        hasil.jumlahPT2Februari,
        hasil.jumlahPT2Maret,
        hasil.jumlahPT2April,
        hasil.jumlahPT2Mei,
        hasil.jumlahPT2Juni,
        hasil.jumlahPT2Juli,
        hasil.jumlahPT2Agustus,
        hasil.jumlahPT2September,
        hasil.jumlahPT2Oktober,
        hasil.jumlahPT2November,
        hasil.jumlahPT2Desember,
        hasil.odpNullJanuari,
        hasil.odpNullFebruari,
        hasil.odpNullMaret,
        hasil.odpNullApril,
        hasil.odpNullMei,
        hasil.odpNullJuni,
        hasil.odpNullJuli,
        hasil.odpNullAgustus,
        hasil.odpNullSeptember,
        hasil.odpNullOktober,
        hasil.odpNullNovember,
        hasil.odpNullDesember
      );
    },
  });
}

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + "").replace(",", "").replace(" ", "");
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
    dec = typeof dec_point === "undefined" ? "." : dec_point,
    s = "",
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return "" + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || "").length < prec) {
    s[1] = s[1] || "";
    s[1] += new Array(prec - s[1].length + 1).join("0");
  }
  return s.join(dec);
}

function grafik(
  jumlahODPSJanuari,
  jumlahODPSFebruari,
  jumlahODPSMaret,
  jumlahODPSApril,
  jumlahODPSMei,
  jumlahODPSJuni,
  jumlahODPSJuli,
  jumlahODPSAgustus,
  jumlahODPSSeptember,
  jumlahODPSOktober,
  jumlahODPSNovember,
  jumlahODPSDesember,
  jumlahPT2Januari,
  jumlahPT2Februari,
  jumlahPT2Maret,
  jumlahPT2April,
  jumlahPT2Mei,
  jumlahPT2Juni,
  jumlahPT2Juli,
  jumlahPT2Agustus,
  jumlahPT2September,
  jumlahPT2Oktober,
  jumlahPT2November,
  jumlahPT2Desember
) {
  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nov",
        "Des",
      ],
      datasets: [
        {
          label: "Jumlah PT2",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          data: [
            jumlahPT2Januari,
            jumlahPT2Februari,
            jumlahPT2Maret,
            jumlahPT2April,
            jumlahPT2Mei,
            jumlahPT2Juni,
            jumlahPT2Juli,
            jumlahPT2Agustus,
            jumlahPT2September,
            jumlahPT2Oktober,
            jumlahPT2November,
            jumlahPT2Desember,
          ],
        },
        {
          label: "Jumlah ODPS",
          lineTension: 0.3,
          backgroundColor: "rgba(231, 74, 59, 0.05)",
          borderColor: "#e74a3b",
          pointRadius: 3,
          pointBackgroundColor: "#e74a3b",
          pointBorderColor: "#e74a3b",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "#5a5c69",
          pointHoverBorderColor: "#5a5c69",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            jumlahODPSJanuari,
            jumlahODPSFebruari,
            jumlahODPSMaret,
            jumlahODPSApril,
            jumlahODPSMei,
            jumlahODPSJuni,
            jumlahODPSJuli,
            jumlahODPSAgustus,
            jumlahODPSSeptember,
            jumlahODPSOktober,
            jumlahODPSNovember,
            jumlahODPSDesember,
          ],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0,
        },
      },
      scales: {
        xAxes: [
          {
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 7,
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return number_format(value);
              },
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          },
        ],
      },
      legend: {
        display: true,
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: "#6e707e",
        titleFontSize: 14,
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: "index",
        caretPadding: 10,
        callbacks: {
          label: function (tooltipItem, chart) {
            var datasetLabel =
              chart.datasets[tooltipItem.datasetIndex].label || "";
            return datasetLabel + ": " + number_format(tooltipItem.yLabel);
          },
        },
      },
    },
  });

  return myLineChart;
}

function grafikPegawai(
  jumlahODPSJanuari,
  jumlahODPSFebruari,
  jumlahODPSMaret,
  jumlahODPSApril,
  jumlahODPSMei,
  jumlahODPSJuni,
  jumlahODPSJuli,
  jumlahODPSAgustus,
  jumlahODPSSeptember,
  jumlahODPSOktober,
  jumlahODPSNovember,
  jumlahODPSDesember,
  jumlahPT2Januari,
  jumlahPT2Februari,
  jumlahPT2Maret,
  jumlahPT2April,
  jumlahPT2Mei,
  jumlahPT2Juni,
  jumlahPT2Juli,
  jumlahPT2Agustus,
  jumlahPT2September,
  jumlahPT2Oktober,
  jumlahPT2November,
  jumlahPT2Desember
) {
  // Area Chart Example
  var ctx = document.getElementById("myAreaChartPegawai");
  var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nov",
        "Des",
      ],
      datasets: [
        {
          label: "Jumlah PT2",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          data: [
            jumlahPT2Januari,
            jumlahPT2Februari,
            jumlahPT2Maret,
            jumlahPT2April,
            jumlahPT2Mei,
            jumlahPT2Juni,
            jumlahPT2Juli,
            jumlahPT2Agustus,
            jumlahPT2September,
            jumlahPT2Oktober,
            jumlahPT2November,
            jumlahPT2Desember,
          ],
        },
        {
          label: "Jumlah ODPS",
          lineTension: 0.3,
          backgroundColor: "rgba(231, 74, 59, 0.05)",
          borderColor: "#e74a3b",
          pointRadius: 3,
          pointBackgroundColor: "#e74a3b",
          pointBorderColor: "#e74a3b",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "#5a5c69",
          pointHoverBorderColor: "#5a5c69",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            jumlahODPSJanuari,
            jumlahODPSFebruari,
            jumlahODPSMaret,
            jumlahODPSApril,
            jumlahODPSMei,
            jumlahODPSJuni,
            jumlahODPSJuli,
            jumlahODPSAgustus,
            jumlahODPSSeptember,
            jumlahODPSOktober,
            jumlahODPSNovember,
            jumlahODPSDesember,
          ],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0,
        },
      },
      scales: {
        xAxes: [
          {
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 7,
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return number_format(value);
              },
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          },
        ],
      },
      legend: {
        display: true,
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: "#6e707e",
        titleFontSize: 14,
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: "index",
        caretPadding: 10,
        callbacks: {
          label: function (tooltipItem, chart) {
            var datasetLabel =
              chart.datasets[tooltipItem.datasetIndex].label || "";
            return datasetLabel + ": " + number_format(tooltipItem.yLabel);
          },
        },
      },
    },
  });

  return myLineChart;
}
