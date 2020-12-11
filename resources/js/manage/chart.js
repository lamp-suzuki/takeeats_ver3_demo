const red = "223, 41, 53";
const orange = "221, 100, 77";
const yellow = "255, 208, 70";
const green = "3, 181, 170";

// 線グラフ
let chart_data = {
  amount: [27890, 32450, 28090, 27689, 34560, 43089, 41350],
  count: [18, 22, 19, 19, 26, 32, 32],
  unitprice: [1549, 1475, 1478, 1457, 1329, 1346, 1292],
  follower: [32, 32, 34, 35, 38, 38, 41],
};
if ($(".js-chart-line").length) {
  $(".js-chart-line").each(function (index, el) {
    let opt = {
      legend: {
        display: false,
      },
    };
    if ($(el).attr("data-chart") == "amount" || $(el).attr("data-chart") == "unitprice") {
      opt.scales = {
        yAxes: [
          {
            ticks: {
              callback: function (label, index, labels) {
                label = label / 10000;
                return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "k";
              },
            },
          },
        ],
      };

      opt.tooltips = {
        callbacks: {
          label: function (tooltipItem, data) {
            return "￥" + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          },
        },
      };
    }
    new Chart(el, {
      type: "line",
      data: {
        labels: ["1日", "2日", "3日", "4日", "5日", "6日", "7日"],
        datasets: [
          {
            data: chart_data[$(el).attr("data-chart")],
            backgroundColor: "rgba(" + orange + ", 0.5)",
            borderColor: "rgba(" + orange + ", 1)",
          },
        ],
      },
      options: opt,
    });
  });
}
