<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Laporan Layanan</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Laporan</li>
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
    <div class="container-fluid py-4">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="mb-3">Data Laporan Layanan</h6>
                <a href="<?= site_url('pelaporan/create') ?>" class="btn btn-primary">Tambah Data Laporan</a>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form class="input-group" action="<?= site_url('pelaporan/search') ?>" method="GET">
                        <input type="text" class="form-control" placeholder="Cari..." name="keyword">
                        <button class="btn btn-primary" type="submit">Cari</button>
                        <button class="btn btn-secondary" type="button" onclick="resetSearch()">Reset</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelapor</th>
                                <th>Email Pelapor</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($pelaporan as $k) { ?>
                                <tr>
                                    <td><?= $k['id'] ?></td>
                                    <td><?= $k['nama_pelapor'] ?></td>
                                    <td><?= $k['email_pelapor'] ?></td>
                                    <td><?= $k['judul'] ?></td>
                                    <td><?= $k['deskripsi'] ?></td>
                                    <td><?= $k['tanggal_pengaduan'] ?></td>

                                    <td>
                                        <a class="btn btn-primary" href="<?= site_url('pelaporan/edit/' . $k['id']) ?>">Edit</a>
                                        <a class="btn btn-danger" href="<?= site_url('pelaporan/delete/' . $k['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function resetSearch() {
        // Mengosongkan inputan form
        document.querySelector('input[name="keyword"]').value = '';

        // Melakukan submit ulang form
        document.querySelector('form').submit();
    }
</script>