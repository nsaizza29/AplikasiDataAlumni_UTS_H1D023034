<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
        }
        
        body {
            background-color: var(--secondary-color);
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .card {
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-radius: 0.35rem 0.35rem 0 0 !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .input-group-text {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                <!-- Header -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="bi bi-person-plus-fill me-2"></i>Tambah Data Alumni
                    </h1>
                    <a href="<?php echo site_url('alumni'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>
                
                <!-- Form -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Formulir Data Alumni</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo site_url('alumni/simpan'); ?>">
                            <!-- Nama -->
                            <div class="mb-4">
                                <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <?php echo form_error('nama', '<div class="text-danger small mt-1">', '</div>'); ?>
                            </div>
                            
                            <!-- NIM dan Email -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="nim" class="form-label fw-bold">Nomor Induk Mahasiswa</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-credit-card-fill"></i></span>
                                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                                    </div>
                                    <?php echo form_error('nim', '<div class="text-danger small mt-1">', '</div>'); ?>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label fw-bold">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tahun Lulus dan Jurusan -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="tahun_lulus" class="form-label fw-bold">Tahun Lulus</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun lulus" required>
                                    </div>
                                    <?php echo form_error('tahun_lulus', '<div class="text-danger small mt-1">', '</div>'); ?>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="jurusan_id" class="form-label fw-bold">Program Studi/Jurusan</label>
                                    <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                                        <option value="" selected disabled>Pilih Jurusan...</option>
                                        <?php foreach($jurusan_options as $j): ?>
                                        <option value="<?php echo $j->id; ?>"><?php echo htmlspecialchars($j->nama_jurusan); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('jurusan_id', '<div class="text-danger small mt-1">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <!-- Buttons -->
                            <div class="d-flex justify-content-between mt-5">
                                <a href="<?php echo site_url('alumni'); ?>" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save-fill me-1"></i> Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Info -->
                <div class="alert alert-info mt-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Pastikan semua data yang dimasukkan sudah benar sebelum disimpan.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>