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
                        <h3 class="card-title"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pengumuman</button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="accordionTbody">
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengumuman as $p) : ?>
                                        <tr data-id="<?= $p['id'] ?>">
                                            <td><?= $i++ ?></td>
                                            <td><?= $p['judul'] ?></td>
                                            <td><?= $p['konten'] ?></td>
                                            <td id="status"><span class="badge text-bg-<?= $p['status'] == 1 ? 'success' : 'danger'  ?>"><?= $p['status'] == 1 ? 'Publish' : 'UnPublish' ?></span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $p['id'] ?>"><i class="fas fa-pen"></i></button>
                                                    <a class="btn btn-danger btn-hapus" href="<?= base_url('Pengumuman/delete/' . $p['id']) ?>"><i class="fas fa-trash"></i> </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Status</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Pengumuman/addData') ?>" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <label for="konten">Isi Pengumuman</label>
                                <textarea id="summernote" name="konten">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                </textarea>
                            </div>
                            <div class="form-group ms-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="switch" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Publish?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<?php foreach ($pengumuman as $p) : ?>
    <div class="modal fade" id="exampleModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $p['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Pengumuman/updatePengumunan/' . $p['id']) ?>" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?= $p['judul'] ?>" id="judul" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="konten">Isi Pengumuman</label>
                                    <textarea id="summernote<?= $p['id'] ?>" name="konten">
                                    <?= $p['konten'] ?>
                                </textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            $('#summernote<?= $p['id'] ?>').summernote();
        });
    </script>
<?php endforeach; ?>

<script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
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
        $('#summernote').summernote()
    });

    $(document).ready(function() {
        $('#example1').on('click', 'td#status', function() {
            const currentStatus = $(this).text().trim();
            const dropdownHtml = `<select class="form-select status-dropdown">
                                      <option value="1" ${currentStatus === 'Publish' ? 'selected' : ''}>Publish</option>
                                      <option value="0" ${currentStatus === 'UnPublish' ? 'selected' : ''}>UnPublish</option>
                                  </select>`;

            $(this).html(dropdownHtml);

            // Tambahkan data-id pada tag <tr>
            const recordId = $(this).closest('tr').data('id');
            $(this).closest('tr').attr('data-id', recordId);
        });
        $('#example1').on('change', '.status-dropdown', function() {
            const selectedValue = $(this).val();
            const newStatus = selectedValue === '1' ? 'Publish' : 'UnPublish';

            // Ambil ID dari atribut data-id
            const recordId = $(this).closest('tr').data('id');

            console.log(recordId, selectedValue);
            $.ajax({
                type: 'POST',
                url: '<?= base_url('Pengumuman/updateStatus') ?>',
                data: {
                    id: recordId,
                    newStatus: selectedValue
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
                    console.error(error);
                }
            });

            $(this).closest('td#status').html(`<span class="badge text-bg-${selectedValue === '1' ? 'success' : 'danger'}">${newStatus}</span>`);
        });
    });
</script>