<x-layout>
    <h1 class="text-5xl font-bold text-gray-800 mt-8 mb-6">Dashboard</h1>
    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-6">
        <div class="bg-blue-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">{{ $countUser }}</h2>
            <p>Users</p>
        </div>
        <div class="bg-green-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">{{ $countRoom }}</h2>
            <p>Rooms</p>
        </div>
        <div class="bg-red-500 rounded-lg p-4 text-white">
            <h2 class="text-2xl">{{ $countBuilding }}</h2>
            <p>Buildings</p>
        </div>
        <div class="bg-yellow-500 rounded-lg p-4 text-white">
            <h2 class="text-xl">Rp {{ number_format($countTotalRevenue, 2, ',', '.') }}</h2>
            <p>Total Revenue</p>
        </div>
    </div>

    <div>
        <div class="mt-8 mb-20 pt-4 bg-white" style="height:360px; width:640px;">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4 mx-8">Monthly Revenue</h2>
            <canvas id="revenueChart" class="mx-8"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');

        // Data segments from backend
        const segments = @json($segments);

        // Prepare data for the chart
        const data = {
            labels: segments.map(segment => segment.x),
            datasets: [{
                label: 'Revenue',
                data: segments.map(segment => segment.y),
                segment: {
                    borderColor: ctx => {
                        const index = ctx.p1DataIndex;
                        return segments[index]?.color || 'rgba(255, 0, 0, 1)';
                    },
                },
                borderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8,
                tension: 0.4,
            }]
        };

        // Create the chart
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Revenue (Rp)',
                            font: {
                                size: 14,
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month-Year',
                            font: {
                                size: 14,
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `Revenue: Rp ${tooltipItem.raw.toLocaleString()}`;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-layout>
