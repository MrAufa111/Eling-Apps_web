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
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="jumlahwarga"></h3>
                        <p>Jumlah Warga</p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios-people"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="jumlahkepala"></h3>
                        <p>Jumlah Kepala Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="jumlahperempuan"></h3>
                        <p>Jumah Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="ion-woman"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="jumlahlaki"></h3>
                        <p>Jumlah Laki-Laki</p>
                    </div>
                    <div class="icon">
                        <i class="ion-man"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data Warga</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card bg-gradient-success">
                    <div class="card-header border-0">

                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendar
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">

                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%;"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</section>

<!-- jQuery -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datetimepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= base_url() ?>assets/vendor/plugins/chart.js/Chart.min.js"></script>

<!-- Your Calendar script -->
<script>
    $(document).ready(function() {
        $('#calendar').datetimepicker({
            format: 'L',
            inline: true
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('Dashboard/jumlahWarga') ?>",
            method: "GET",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                $('#jumlahwarga').text(response.total);
                $('#jumlahkepala').text(response.totalKepala);
                $('#jumlahlaki').text(response.totalLaki);
                $('#jumlahperempuan').text(response.totalPerempuan);
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
                $("#result").html("Error occurred while making the Ajax request.");
            }
        });
    });

    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('Dashboard/jumlahWarga') ?>",
            method: "GET",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        'Laki-Laki',
                        'Perempuan'
                    ],
                    datasets: [{
                        data: [response.totalLaki, response.totalPerempuan],
                        backgroundColor: ['#0d6efd', '#d63384'],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
                $("#result").html("Error occurred while making the Ajax request.");
            }
        });
    })
</script>