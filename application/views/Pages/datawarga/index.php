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

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis-Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="accordionTbody">
                                    <?php
                                    $i = 1;
                                    foreach ($user as $u) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $u['nik'] ?></td>
                                            <td><?= $u['nama'] ?></td>
                                            <td><?= $u['jenis_kelamin'] ?></td>
                                            <td><?= $u['alamat'] ?></td>
                                            <td><?= $u['no_hp'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?= base_url('dataWarga/Detail/') . $u['id'] ?>" class="btn btn-secondary"><i class="far fa-eye"></i></a>
                                                    <a href="<?= base_url('dataWarga/Delete/') . $u['id'] ?>" class="btn-hapus btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis-Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
            "buttons": [{
                    text: 'Tambah Warga',
                    action: function(e, dt, node, config) {
                        // Redirect to dataWarga/tambahh
                        window.location.href = '<?= base_url('dataWarga/tambahDataWarga') ?>';
                    },
                },
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

    });
</script>