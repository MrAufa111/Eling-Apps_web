<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" id="idKepala" name="idKepala" value="<?= $user['id'] ?>">
                                    <label for="nikKepala" class="form-label">Nik</label>
                                    <input type="text" required name="nikKepala" id="nikKepala" class="form-control" value="<?= $user['nik']; ?>" placeholder="NIK">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="namaKepala" class="form-label">Nama</label>
                                    <input type="text" required name="namaKepala" id="namaKepala" class="form-control" value="<?= $user['nama'] ?>" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="telpKepala" class="form-label">No Telp</label>
                                    <input type="number" required name="telpKepala" id="telpKepala" class="form-control" value="<?= $user['no_hp'] ?>" placeholder="No Telp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="tanggallahirKepala" class="form-label">Tanggal Lahir</label>
                                    <input type="date" required name="tanggallahirKepala" id="tanggallahirKepala" value="<?= $user['tanggal_lahir'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="jkKepala" class="form-label">Jenis Kelamin</label>
                                    <select name="jkKepala" required class="form-select" id="jkKepala">
                                        <option <?= $user['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?> value="Laki-Laki">Laki-Laki</option>
                                        <option <?= $user['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamatKepala" class="form-label">Alamat</label>
                                    <input type="text" required name="alamatKepala" id="alamatKepala" class="form-control" value="<?= $user['alamat'] ?>" placeholder="Alamat">
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-end d-flex">
                            <div class="btn-group">
                                <button class="btn btn-success" id="btn-tambah"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-primary" onclick="submitFormKepala()"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="accordion" id="accordionExample1">

                            </div>
                            <div class="accordion" id="accordionExample">

                                <?php
                                $i = 1;
                                foreach ($user1 as $u) : ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $u['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $u['id'] ?>">
                                                Data Keluarga
                                            </button>
                                        </h2>
                                        <form action="<?= base_url('dataWarga/updateAnggotaKeluarga/') . $u['id'] ?>" method="post">
                                            <div id="collapse<?= $u['id'] ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?= $user['id'] ?>" name="idRelasi" id="idRelasi">
                                                            <input type="hidden" value="<?= $u['id'] ?>" name="idAnggota" id="idAnggota">
                                                            <label for="nik" class="form-label">Nik</label>
                                                            <input type="text" required name="nikAnggota" id="nikAnggota" class="form-control" value="<?= $u['nik'] ?>" placeholder="NIK">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="namaAnggota" class="form-label">Nama</label>
                                                            <input type="text" required name="namaAnggota" id="namaAnggota" class="form-control" value="<?= $u['nama'] ?>" placeholder="Nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="telpAnggota" class="form-label">No Telp</label>
                                                            <input type="number" required name="telpAnggota" id="telpAnggota" class="form-control" value="<?= $u['no_hp'] ?>" placeholder="No Telp">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="tanggallahirAnggota" class="form-label">Tanggal Lahir</label>
                                                            <input type="date" required name="tanggallahirAnggota" id="tanggallahirAnggota" value="<?= $u['tanggal_lahir'] ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="jk" class="form-label">Jenis Kelamin</label>
                                                            <select name="jkAnggota" required class="form-select" id="jkAnggota">
                                                                <option <?= $u['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?> value="Laki-Laki">Laki-Laki</option>
                                                                <option <?= $u['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="alamatAnggota" class="form-label">Alamat</label>
                                                            <input type="text" required name="alamatAnggota" id="alamatAnggota" value="<?= $u['alamat'] ?>" placeholder="Alamat" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="justify-content-end d-flex ">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('dataWarga/deleteAngota/' . $u['id']) ?>" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i></a>
                                                            <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <form action="" method=""></form>
</section>

<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    function submitFormKepala() {
        var idKepala = $('#idKepala').val();
        var nikKepala = $('#nikKepala').val();
        var namaKepala = $('#namaKepala').val();
        var telpKepala = $('#telpKepala').val();
        var tanggallahirKepala = $('#tanggallahirKepala').val();
        var jkKepala = $('#jkKepala').val();
        var alamatKepala = $('#alamatKepala').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('dataWarga/UpdateKepala') ?>",
            data: {
                idKepala: idKepala,
                nikKepala: nikKepala,
                namaKepala: namaKepala,
                telpKepala: telpKepala,
                tanggallahirKepala: tanggallahirKepala,
                jkKepala: jkKepala,
                alamatKepala: alamatKepala
            },
            success: function(response) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(error) {
                Swal.fire({
                    position: "error",
                    icon: "error",
                    title: "Your Work Not Saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
    $('#btn-tambah').on('click', function() {
        $('#accordionExample1').append(
            '<div class="accordion-item">' +
            ' <h2 class="accordion-header">' +
            '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">' +
            'Tambah Keluarga' +
            '</button>' +
            '</h2>' +
            '<div id="collapse" class="accordion-collapse collapse " data-bs-parent="#accordionExample">' +
            '<div class="accordion-body">' +
            '<form action="<?= base_url('dataWarga/tambahAnggotakeluarga') ?>" method="post" >' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="nik" class="form-label">Nik</label>' +
            '<input type="hidden" value="<?= $user['id'] ?>" name="idRelasi" id="idRelasi">' +
            '<input type="text" required name="nikAnggota" id="nikAnggota" class="form-control" placeholder="NIK">' +
            '</div>' +
            ' </div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="namaAnggota" class="form-label">Nama</label>' +
            '<input type="text" required name="namaAnggota" id="namaAnggota" class="form-control" placeholder="Nama">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="telpAnggota" class="form-label">No Telp</label>' +
            '<input type="number" required name="telpAnggota" id="telpAnggota" class="form-control" placeholder="No Telp">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="tanggallahirAnggota" class="form-label">Tanggal Lahir</label>' +
            '<input type="date" required name="tanggallahirAnggota" id="tanggallahirAnggota" class="form-control">' +
            '</div>' +
            ' </div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="jk" class="form-label">Jenis Kelamin</label>' +
            ' <select name="jkAnggota" required class="form-select" id="jkAnggota">' +
            '<option selected>Jenis Kelamin</option>' +
            '<option value="Laki-Laki">Laki-Laki</option>' +
            '<option value="Perempuan">Perempuan</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label for="alamatAnggota" class="form-label">Alamat</label>' +
            '<input type="text" required name="alamatAnggota" id="alamatAnggota" placeholder="Alamat" class="form-control">' +
            '</div>' +
            '</div>' +
            ' <div class="d-flex justify-content-end mb-3 col-lg-12">' +
            '<button class="btn btn-primary"><i class="fas fa-check"></i></button>' +
            '</div>' +
            '</div>' +
            '</form>' +
            '</div>' +
            '</div>'
        )
    })
</script>