<!DOCTYPE html>
<html>
<head>
    <title>Daftar Alumni</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .search-form { margin-bottom: 20px; }
        .action-buttons { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container mt-4">
      
       <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="me-3">
                    <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                </div>
                <div>
                    <h1 class="h4 mb-0 fw-bold">Daftar Alumni</h1>
                    <p class="small text-muted mb-0">Universitas Jendral Soedirman</p>
                </div>
            </div>
            <div>
                <a href="<?php echo site_url('alumni/statistik'); ?>" class="btn btn-outline-primary me-2">
                    <i class="bi bi-bar-chart-fill me-1"></i> Statistik
                </a>
                <a href="<?php echo site_url('alumni/tambah'); ?>" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Alumni
                </a>
            </div>
        </div>

        <!-- Search Form -->
        <div class="card search-card mb-4">
            <div class="card-body">
                <form method="get" action="<?php echo site_url('alumni/cari'); ?>" class="row g-3">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="keyword" class="form-control" placeholder="Cari nama alumni..." value="<?php echo $this->input->get('keyword'); ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                            <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun lulus..." value="<?php echo $this->input->get('tahun_lulus'); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel-fill me-1"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Tahun Lulus</th>
                    <th>Jurusan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumni as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a->nama); ?></td>
                    <td><?php echo htmlspecialchars($a->nim); ?></td>
                    <td><?php echo htmlspecialchars($a->email); ?></td>
                    <td><?php echo htmlspecialchars($a->tahun_lulus); ?></td>
                    <td><?php echo htmlspecialchars($a->nama_jurusan); ?></td>
                    <td class="text-center">
                                    <div>
                                        <a href="<?php echo site_url('alumni/edit/'.$a->id); ?>" class="btn btn-sm btn-warning action-btn me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?php echo site_url('alumni/hapus/'.$a->id); ?>" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Yakin ingin menghapus data alumni ini?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>