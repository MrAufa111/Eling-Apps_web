<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <?php
                $hariSebagaiArray = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalronda"><i class="fas fa-plus"></i> Data Ronda</button></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <?php foreach ($hariSebagaiArray as $hari) : ?>
                                        <th><?= $hari ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody id="accordionTbody">
                                <?php if (!empty($semuaHari)) : ?>
                                    <?php foreach ($semuaHari as $index => $row) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <?php foreach ($hariSebagaiArray as $hari) : ?>
                                                <td><?= ($row['hari'] == $hari) ? $row['nama'] : '' ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <?php foreach ($hariSebagaiArray as $hari) : ?>
                                        <th><?= $hari ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalronda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="group">
                    <div class="form-group">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" id="hari" class="form-select">
                            <option>Pilih Hari</option>
                            <?php foreach ($haridb as $h) : ?>
                                <option value="<?= $h['hari'] ?>"><?= $h['hari'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="namawarga">

                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" id="tambahwarga">Tambah Warga</a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="simpan" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [
                "excel",
                "pdf",
                "print"
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(document).ready(function() {
        let i = 1;

        $('#tambahwarga').on('click', function() {
            let selectElement = '<div class="form-group">' +
                '<label for="namaWarga" class="form-label">Nama Warga</label>' +
                '<select name="namaWarga" id="namaWarga' + i + '" class="form-select namaWarga">' +
                '<option>Pilih Nama Warga</option>' +
                '<?php foreach ($user as $u) : ?>' +
                '<option value="<?= $u['nama'] ?>"><?= $u['nama'] ?></option>' +
                '<?php endforeach; ?>' +
                '</select>' +
                '</div>';

            $('#namawarga').append(selectElement);

            i++;
        });

        $('#simpan').on('click', function() {

            let namaWargaArray = $('.namaWarga').map(function() {
                return $(this).val();
            }).get();
            let hari = $('#hari').val();
            // console.log(namaWargaArray, hari);
            i++;
            $.ajax({
                type: "post",
                url: "<?= base_url('Ronda/simpan_data') ?>",
                data: {
                    namaWarga: JSON.stringify(namaWargaArray),
                    hari: hari
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
                    console.log(error);
                }
            });


        });
    });
</script>