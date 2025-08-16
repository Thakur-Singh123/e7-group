<div class="card">
    <div class="card-header">
        <div class="card-title">FY25 H1 (Actual) vs Forecast '25 H2</div>
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="h1h2Chart"></canvas>
        </div>
        <!--Total value below chart -->
        <div style="margin-top: 5px; font-size: 14px;">
            Difference: AED {{ number_format($h1vsh2['difference']) }}
        </div>
        <div style="margin-top: 5px; font-size: 14px;">
            Percentage Difference: {{ number_format($h1vsh2['percentage'], 2) }}%
        </div>
    </div>
</div>

<script>
    // Actual values for datalabels and tooltip
    const dataH1 = {{ $h1vsh2['fy_h1_total'] }};
    const dataH2 = {{ $h1vsh2['fy_h2_total'] }};
    const chartData = [dataH1, dataH2];

    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('h1h2Chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['FY25 H1 (Actual)', "Re-Forecast '25 H2"],
                datasets: [{
                    label: 'AED',
                    data: chartData,
                    backgroundColor: ['#4a90e2', '#2e8540']
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: '#222',
                        font: {size: 13 },
                        formatter: function(value) {
                            // Show actual value with commas, no AED
                            return value.toLocaleString();
                        }
                    },
                    tooltip: {
                        enabled: false // Disable hover tooltip
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'AED'
                        },
                        ticks: {
                            callback: function(value) {
                                return (value / 100000000).toFixed(0);
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    });
</script>
