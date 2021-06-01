/* Grafico ejemplo utilizado en partidas.php*/
var ctx = document.getElementById("grafReajust");
//    ctx.height = 200;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Dic 2020", "Nov 2020", "Oct 2020", "Sep 2020", "Ago 2020", "Jul 2020"],
        datasets: [{
            label: "% ",
            data: [5.5, 1.3, 1.5, -1.9, -1, 3.1],
            borderColor: "rgba(111, 183, 214, 0.9)",
            borderWidth: "0",
            backgroundColor: "rgba(111, 183, 214, 0.5)"
        },

        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});