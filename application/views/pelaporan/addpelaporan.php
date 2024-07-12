<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Data Pelaporan</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Data Pelaporan</li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="mb-4">Tambah Data Pelaporan</h4>

                <?php echo validation_errors(); ?>
                <?php echo form_open('pelaporan/create', 'class="row g-3"'); ?>

                <label for="nama" class="form-label">Nama Pelapor:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control" value="<?= set_value('nama_pelapor') ?>">
                </div>

                <label for="tanggal_lahir" class="form-label">Email Pelapor:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="text" name="email_pelapor" id="email_pelapor" class="form-control" value="<?= set_value('email_pelapor') ?>">
                </div>

                <label for="layanan" class="form-label">Judul:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="text" name="judul" id="judul" class="form-control" value="<?= set_value('judul') ?>">
                </div>
                <label for="layanan" class="form-label">Deskripsi:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= set_value('deskripsi') ?>">
                </div>
                <label for="layanan" class="form-label">Tanggal Pelaporan:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" value="<?= set_value('tanggal_pengaduan') ?>">
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('pelaporan') ?>" class="btn btn-danger ms-2">Batal</a>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

</main>