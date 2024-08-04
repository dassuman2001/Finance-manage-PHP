function generateMonthlySpendingChart(monthlySpendingData) {
    var ctx = document.getElementById('monthlySpendingChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar', // Change type to 'bar' for a bar chart
        data: {
            labels: Object.keys(monthlySpendingData),
            datasets: [{
                label: 'Monthly Spending',
                data: Object.values(monthlySpendingData),
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color for bars
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Spending Analysis'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true // Start the y-axis at zero
                }
            }
        }
    });
}
