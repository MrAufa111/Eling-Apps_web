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
                                    <input type="hidden" id="idKepala" name="idKepala">
                                    <label for="nikKepala" class="form-label">Nik</label>
                                    <input type="text" required name="nikKepala" id="nikKepala" class="form-control" placeholder="NIK">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="namaKepala" class="form-label">Nama</label>
                                    <input type="text" required name="namaKepala" id="namaKepala" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="telpKepala" class="form-label">No Telp</label>
                                    <input type="number" required name="telpKepala" id="telpKepala" class="form-control" placeholder="No Telp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="tanggallahirKepala" class="form-label">Tanggal Lahir</label>
                                    <input type="date" required name="tanggallahirKepala" id="tanggallahirKepala" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="jkKepala" class="form-label">Jenis Kelamin</label>
                                    <select name="jkKepala" required class="form-select" id="jkKepala">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamatKepala" class="form-label">Alamat</label>
                                    <input type="text" required name="alamatKepala" id="alamatKepala" class="form-control" placeholder="Alamat">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                            Tambah Keluarga
                                        </button>
                                    </h2>
                                    <div id="collapse" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nik" class="form-label">Nik</label>
                                                    <input type="text" required name="nikAnggota" id="nikAnggota" class="form-control" placeholder="NIK">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="namaAnggota" class="form-label">Nama</label>
                                                    <input type="text" required name="namaAnggota" id="namaAnggota" class="form-control" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="telpAnggota" class="form-label">No Telp</label>
                                                    <input type="number" required name="telpAnggota" id="telpAnggota" class="form-control" placeholder="No Telp">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tanggallahirAnggota" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" required name="tanggallahirAnggota" id="tanggallahirAnggota" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                                    <select name="jkAnggota" required class="form-select" id="jkAnggota">
                                                        <option selected>Jenis Kelamin</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="alamatAnggota" class="form-label">Alamat</label>
                                                    <input type="text" required name="alamatAnggota" id="alamatAnggota" placeholder="Alamat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mb-3 col-lg-12">
                                                <button class="btn btn-primary" id="tambahAnggotaKeluarga"><i class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="table table-responsive">
                                                    <table class="table table-bordered" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>No Telp</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Alamat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-bordered" id="tabletambah">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-2" id="simpanData"><i class="fas fa-check"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    $('#tambahAnggotaKeluarga').click(function() {
        let rows = $('#tabletambah tr');
        let rowCount = rows.length;
        let nikAnggota = $('#nikAnggota').val();
        let namaAnggota = $('#namaAnggota').val();
        let telpAnggota = $('#telpAnggota').val();
        let tanggallahirAnggota = $('#tanggallahirAnggota').val();
        let jkAnggota = $('#jkAnggota').val();
        let alamatAnggota = $('#alamatAnggota').val();
        $('#tabletambah').append(
            '<tr>' +
            '<td>' + (rowCount + 1) + '</td>' +
            '<td class="nikAnggota editable" data-field="nikAnggota">' + nikAnggota + '</td>' +
            '<td class="namaAnggota editable" data-field="namaAnggota">' + namaAnggota + '</td>' +
            '<td class="telpAnggota editable" data-field="telpAnggota">' + telpAnggota + '</td>' +
            '<td class="tanggallahirAnggota editable"  data-field="tanggallahirAnggota">' + tanggallahirAnggota + '</td>' +
            '<td class="jkAnggota editable2" data-field="jkAnggota">' + jkAnggota + '</td>' +
            '<td class="alamatAnggota editable"  data-field="alamatAnggota">' + alamatAnggota + '</td>' +
            '<td>' +
            '<div class="btn-group">' +
            '<a class="btn btn-danger delval"><i class="fas fa-trash"></i></a> <button class="edit-btn btn btn-secondary"><i class="fas fa-pen"></i></button><button class="save-btn btn btn-primary" class="btn btn-seconday" style="display:none;">Save</button>' +
            '</div>' +
            '</td>' +
            '</tr>'
        );
    });
    $('#simpanData').on('click', function() {
        let data = [];
        $('table tbody tr').each(function() {
            let row = {};
            row.nikAnggota = $(this).find('.nikAnggota').text();
            row.namaAnggota = $(this).find('.namaAnggota').text();
            row.telpAnggota = $(this).find('.telpAnggota').text();
            row.tanggallahirAnggota = $(this).find('.tanggallahirAnggota').text();
            row.alamatAnggota = $(this).find('.alamatAnggota').text();
            row.jkAnggota = $(this).find('.jkAnggota').text();
            data.push(row);
        });
        let nikKepala = $('#nikKepala').val();
        let namaKepala = $('#namaKepala').val();
        let telpKepala = $('#telpKepala').val();
        let tanggallahirKepala = $('#tanggallahirKepala').val();
        let jkKepala = $('#jkKepala').val();
        let alamatKepala = $('#alamatKepala').val();
        console.log(nikKepala, namaKepala, telpKepala, tanggallahirKepala, jkKepala, alamatKepala, data)
        $.ajax({
            url: '<?= base_url('dataWarga/insertData') ?>',
            method: 'POST',
            data: {
                nikKepala: nikKepala,
                namaKepala: namaKepala,
                telpKepala: telpKepala,
                tanggallahirKepala: tanggallahirKepala,
                jkKepala: jkKepala,
                alamatKepala: alamatKepala,
                data: JSON.stringify(data)
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: function(error) {
                console.log('Gagal menyimpan data ke database.');
            }
        });

    })
    $(document).ready(function() {
        $('#tabletambah').on('click', '.edit-btn', function() {
            const row = $(this).closest('tr');
            const edittableColoms = row.find('.editable');
            const edittablescoloms2 = row.find('.editable2'); // Ganti ke .editable2
            const saveButton = row.find('.save-btn');

            edittablescoloms2.each(function() {
                const field = $(this).data('field');
                const value = $(this).text().trim();
                $(this).html(`<select class="form-select local"><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan">Perempuan</option></select>`);
            })

            $(this).hide();

            edittableColoms.each(function() {
                const field = $(this).data('field');
                const value = $(this).text().trim();
                $(this).html(`<input type="text" class="form-control" name="${field}" value="${value}" />`);
            });

            saveButton.show();
        });

        $('#tabletambah').on('click', '.save-btn', function() {
            const row = $(this).closest('tr');
            const edittableColoms = row.find('.editable');
            const edittablescoloms2 = row.find('.editable2'); // Ganti ke .editable2
            const editButton = row.find('.edit-btn');

            edittablescoloms2.each(function() {
                const field = $(this).data('field');
                const value = $(this).find('select option:selected').val(); // Ambil nilai dari opsi yang dipilih
                $(this).html(value);
            })

            $(this).hide();

            edittableColoms.each(function() {
                const field = $(this).data('field');
                const value = $(this).find('input').val();
                $(this).html(value);
            });

            editButton.show();
        });
    });
</script>