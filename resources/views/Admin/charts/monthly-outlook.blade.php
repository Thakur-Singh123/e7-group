<div class="card">
    <div class="card-header">
        <div class="card-title">Monthly Outlook Chart</div>
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
        <!--Total value below chart -->
        <div style="margin-top: 5px; font-size: 14px;">
            Yearly Total: {{ $monthly_outlook['total'] }}
        </div>
    </div>
</div>

<!-- Chart.js v4 and DataLabels plugin v3 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@3"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById("myChart");
        if (!canvas) return;

        var ctx = canvas.getContext('2d');
        var chartData = @json($monthly_outlook['data']);
        var labels = @json($monthly_outlook['labels']);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Forecast ({{ $monthly_outlook['year'] }})',
                    data: chartData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        display: true,
                        anchor: 'end',
                        align: 'end',
                        color: '#222',
                        font: {size: 9 },
                        formatter: function(value) {
                            // Show full value with commas above bar
                            return value.toLocaleString();
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 2000000, // 0.2 crore = 2,000,000
                        title: {
                            display: true,
                            text: 'Total (AED)'
                        },
                         ticks: {
                            callback: function(value) {
                                return (value / 100000000);
                            }
                        }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    });
    </script>