<x-app-layout>
    <div class="h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-3">
                <!-- Analytical Card 1: Total Requisitions -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold flex items-center">
                        <i class="fa fa-list-alt mr-2"></i>Total Requisitions
                    </h3>
                    <p class="text-3xl font-bold mt-4">75</p>
                </div>

                <!-- Analytical Card 2: Total Approved -->
                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold flex items-center">
                        <i class="fa fa-check-circle mr-2"></i>Total Approved
                    </h3>
                    <p class="text-3xl font-bold mt-4">50</p>
                </div>

                <!-- Analytical Card 3: Total Rejected -->
                <div class="bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold flex items-center">
                        <i class="fa fa-times-circle mr-2"></i>Total Rejected
                    </h3>
                    <p class="text-3xl font-bold mt-4">10</p>
                </div>

                <!-- Analytical Card 4: Pending Requisitions -->
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold flex items-center">
                        <i class="fa fa-hourglass-half mr-2"></i>Pending Requisitions
                    </h3>
                    <p class="text-3xl font-bold mt-4">15</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Requisition Overview -->
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Requisition Overview</h3>
                    <canvas id="requisitionChart" class="mt-4"></canvas>
                </div>

                <!-- Card 2: Requisition Status -->
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Requisition Status</h3>
                    <canvas id="statusChart" class="mt-4"></canvas>
                </div>

                <!-- Card 3: Monthly Trends -->
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-lg font-semibold">Monthly Trends</h3>
                    <canvas id="monthlyTrendsChart" class="mt-4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Requisition Overview Chart
        const ctx1 = document.getElementById('requisitionChart').getContext('2d');
        const requisitionChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Requisitions',
                    data: [10, 20, 5],
                    backgroundColor: ['#4CAF50', '#2196F3', '#F44336'],
                    borderColor: ['#388E3C', '#1976D2', '#D32F2F'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Requisition Status Chart
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Approved', 'Pending', 'Rejected'],
                datasets: [{
                    label: 'Status',
                    data: [30, 40, 30],
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                }]
            }
        });

        // Monthly Trends Chart
        const ctx3 = document.getElementById('monthlyTrendsChart').getContext('2d');
        const monthlyTrendsChart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Requisitions',
                    data: [5, 10, 20, 15, 25, 30],
                    borderColor: '#2196F3',
                    backgroundColor: 'rgba(33, 150, 243, 0.2)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
