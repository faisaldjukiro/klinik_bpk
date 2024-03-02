<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header') ?>

    <?php $this->load->view('template/sidebar') ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Hanya Admin dan SDM -->
                        <?php if($user['role_id'] == 1 || $user['role_id']==4):?>
                        <div class="col-8">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" id="tahun">2024</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Anggran <span>| 2024</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                    name: 'Obat Masuk',
                                                    data: <?= $obat_masuk?>,
                                                },
                                                {
                                                    name: 'Obat Keluar',
                                                    data: <?= $obat_keluar?>,
                                                }, {
                                                    name: 'Obat Expired',
                                                    data: <?= $obat_expire?>,
                                                }
                                            ],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#2eca6a', '#4154f1', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'category', // Mengganti jenis sumbu x menjadi kategori
                                                categories: ["Januari", "Fabruari", "Maret",
                                                    "April", "Mei", "Juni", "Juli", "Agustus",
                                                    "September", "Oktober", "November", "Desember"
                                                ], // Mengganti data kategori dengan bulan-bulan
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'MMMM'
                                                },
                                            }
                                        }).render();
                                    });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Anggaran <span>| 2024</span></h5>

                                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                    <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var data = [{
                                                value: <?= $total['sisa_anggaran']?>,
                                                name: 'Sisa',
                                            },
                                            {
                                                value: <?= $total['anggaran_digunakan']?>,
                                                name: 'Digunakan'
                                            }
                                        ];

                                        // Menghitung total anggaran
                                        var totalAnggaran = data.reduce(function(total, item) {
                                            return total + item.value;
                                        }, 0);

                                        // Fungsi untuk menambahkan titik sebagai pemisah ribuan
                                        function formatRupiah(angka) {
                                            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        }

                                        // Inisialisasi chart
                                        var myChart = echarts.init(document.querySelector("#trafficChart"));

                                        // Set options
                                        // ...
                                        myChart.setOption({
                                            tooltip: {
                                                trigger: 'item',
                                                formatter: function(params) {
                                                    var percentage = ((params.value /
                                                        totalAnggaran) * 100).toFixed(2);
                                                    return params.name + ': Rp ' + formatRupiah(
                                                        params.value) + ' (' + percentage + '%)';
                                                }
                                            },
                                            // ...
                                            legend: {
                                                top: '5%',
                                                left: 'center',
                                                show: true, // Tetapkan show: true untuk menampilkan judul
                                            },
                                            series: [{
                                                name: 'Access From',
                                                type: 'pie',
                                                radius: ['40%', '70%'],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: true,
                                                    position: 'inside',
                                                    formatter: '{d}%',
                                                    color: 'white'
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '18',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: false
                                                },
                                                data: data,
                                                itemStyle: {
                                                    emphasis: {
                                                        shadowBlur: 10,
                                                        shadowOffsetX: 0,
                                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                    }
                                                },
                                                color: ['#3398FF', '#45aa19']
                                            }]
                                        });

                                        myChart.setOption({
                                            graphic: {
                                                type: 'text',
                                                left: 'center',
                                                top: 'center',
                                                style: {
                                                    text: 'Total\n' + 'Rp ' + formatRupiah(
                                                        totalAnggaran),
                                                    textAlign: 'center',
                                                    fill: '#555',
                                                    fontSize: 16
                                                }
                                            }
                                        });
                                    });
                                    </script>
                                </div>

                            </div>
                        </div>
                        <?php endif;?>
                        <!-- Batas Hanya Admin dan SDM -->


                        <!-- start dokter dan perawat -->
                        <?php if($user['role_id']==3 || $user['role_id']==2):?>
                        <div class="col-12">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Anggran <span>| 2024</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                    name: 'Obat Masuk',
                                                    data: <?= $obat_masuk?>,
                                                },
                                                {
                                                    name: 'Obat Keluar',
                                                    data: <?= $obat_keluar?>,
                                                }, {
                                                    name: 'Obat Expired',
                                                    data: <?= $obat_expire?>,
                                                }
                                            ],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#2eca6a', '#4154f1', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'category',
                                                categories: ["Januari", "Fabruari", "Maret",
                                                    "April", "Mei", "Juni", "Juli", "Agustus",
                                                    "September", "Oktober", "November", "Desember"
                                                ],
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'MMMM'
                                                },
                                            }
                                        }).render();
                                    });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div>
                        <?php endif;?>
                        <!-- end dokter dan perawat -->

                        <!-- Recent Sales -->
                        <div class="col-3">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <!-- <h6>Filter</h6> -->
                                        </li>

                                        <!-- <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li> -->
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Obat Masuk <span></span></h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Obat</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($list_obatmasuk as $obatmasuklist):?>
                                            <tr>
                                                <th scope="row"><?=$no++?></th>
                                                <td><?=$obatmasuklist['nama_obat']?></td>

                                                <td><span
                                                        class="badge bg-success"><?=$obatmasuklist['jumlah_masuk'];?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Recent Sales -->
                        <div class="col-3">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <!-- <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li> -->
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Obat Keluar <span></span></h5>

                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Obat</th>
                                                <th scope="col">Jumlah</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($list_obatkeluar as $obatkeluarlist):?>
                                            <tr>
                                                <th scope="row"><?=$no++?></th>
                                                <td><?=$obatkeluarlist['nama_obat']?></td>

                                                <td><span
                                                        class="badge bg-primary"><?=$obatkeluarlist['jumlah_keluar'];?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                        <div class="col-3">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <!-- <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li> -->
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Obat Expire <span></span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Obat</th>
                                                <th scope="col">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($list_obatexpire as $obatexpirelist):?>
                                            <tr>
                                                <th scope="row"><?=$no++?></th>
                                                <td><?=$obatexpirelist['nama_obat']?></td>

                                                <td><span
                                                        class="badge bg-warning"><?=$obatexpirelist['obat_expire'];?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                        <div class="col-3">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <!-- <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li> -->
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Min Stok <span></span></h5>

                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Obat</th>
                                                <th scope="col">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($list_stokmin as $obatminlist):?>
                                            <tr>
                                                <th scope="row"><?=$no++?></th>
                                                <td><?=$obatminlist['nama_obat']?></td>

                                                <td><span class="badge bg-danger"><?=$obatminlist['stok'];?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->


                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/js') ?>

</body>

</html>