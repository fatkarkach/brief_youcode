export const planetChartData = {
    type: "line",
    data: {
        labels: ["Mercure", "Vénus", "La terre", "Mars", "Jupiter", "Saturne", "Uranus", "Neptune"],
        datasets: [
            {
                label: "Masse planétaire du système solaire (Par rapport au soleil x 10^-6)",
                data: [16.6, 208.1, 300.3, 123, 954.792, 685.886, 243.662, 201.514],
                backgroundColor: "rgba(71, 183,132,.5)",
                borderColor: "#47b784",
                borderWidth: 3
            }
        ]
    },
    options: {
        responsive: true,
        lineTension: 1,
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        padding: 25
                    }
                }
            ]
        }
    }
};
export default planetChartData;