<div class="card">
    <div class="card-header">
        <div class="card-title">Top 5 By Country</div>
    </div>
    <div class="card-body">
        <div class="chart-container" style="height: 300px;">
            <canvas id="country"></canvas>
        </div>
    </div>
</div>
 
<script>
document.addEventListener("DOMContentLoaded", function() {
    const segmentData = @json($top_country);
    const labels = Object.keys(segmentData);
 
    // Actual values for bars
    const fy_h1 = labels.map(seg => segmentData[seg].fy_h1_total);
    const fy_h2 = labels.map(seg => segmentData[seg].fy_h2_total);
 
    const ctx = document.getElementById('country').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'FY25 H1 (Actual)',
                    data: fy_h1,
                    backgroundColor: 'green',
                    borderColor: '#4a90e2',
                    borderWidth: 2,
                    borderRadius: 4
                },
                {
                    label: "Re-Forecast '25 H2",
                    data: fy_h2,
                    backgroundColor: 'blue',
                    borderColor: '#2e8540',
                    borderWidth: 2,
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                        padding: 20,
                        font: { size: 13 }
                    }
                },
                datalabels: {
                    display: true,
                    anchor: 'end',
                    align: 'end',
                    color: '#222',
                    font: {size: 13 },
                    formatter: function(value) {
                        // Show actual value with commas, no AED
                        return value.toLocaleString();
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'AED',
                        font: { size: 14 }
                    },
                     ticks: {
                            callback: function(value) {
                                return (value / 100000000);
                            }
                        },
                    grid: { color: '#f5f5f5' }
                },
                x: {
                    grid: { display: false },
                    ticks: { autoSkip: false, maxRotation: 45, minRotation: 45, color: '#888', font: { size: 13 } }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
});
</script>