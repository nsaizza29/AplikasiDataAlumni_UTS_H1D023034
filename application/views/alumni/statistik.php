<!DOCTYPE html>
<html>
<head>
    <title>Statistik Alumni</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .chart-container {
            width: 50%;
            margin: 40px auto;
        }
        .chart-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="bi bi-bar-chart-fill me-2"></i>Statistik Alumni
            </h1>
            <a href="<?php echo site_url('alumni'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
        
        <div class="chart-container">
            <h2 class="chart-title">Jumlah Alumni per Tahun Lulus</h2>
            <canvas id="tahunChart"></canvas>
        </div>
        
        <div class="chart-container">
            <h2 class="chart-title">Distribusi Alumni per Jurusan</h2>
            <canvas id="jurusanChart"></canvas>
        </div>
        
        <script>
            // Chart untuk statistik tahun lulus
            var tahunCtx = document.getElementById('tahunChart').getContext('2d');
            var tahunChart = new Chart(tahunCtx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach($statistik_tahun as $st) echo "'".$st->tahun_lulus."',"; ?>],
                    datasets: [{
                        label: 'Jumlah Alumni',
                        data: [<?php foreach($statistik_tahun as $st) echo $st->jumlah.','; ?>],
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
            
            // Chart untuk statistik jurusan
            var jurusanCtx = document.getElementById('jurusanChart').getContext('2d');
            var jurusanChart = new Chart(jurusanCtx, {
                type: 'pie',
                data: {
                    labels: [<?php foreach($statistik_jurusan as $sj) echo "'".$sj->nama_jurusan."',"; ?>],
                    datasets: [{
                        data: [<?php foreach($statistik_jurusan as $sj) echo $sj->jumlah.','; ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    </div>
</body>
</html>