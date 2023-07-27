<div class="content-wrapper" style="min-height: 100vh;">
    <!-- Content Header (Page header) -->
    <section class="content-header ">

        <h1>
            <i class="fa fa-dashboard"></i>
            Dashboard
            <small>Arsip 2023</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-lg-3 col-xs-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: bold;">Admin</span>
                        <span class="info-box-number"><?= $tot_user ?></span>
                        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>


                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-lg-3 col-xs-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-folder-open-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: bold;">Kategori</span>
                        <span class="info-box-number"><?= $tot_kategori ?></span>
                        <a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-lg-3 col-xs-3">
                <div class="info-box">
                    <span class="icon info-box-icon bg-aqua"><i class="fa fa-file-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: bold;">Surat Masuk</span>
                        <span class="info-box-number"><?= $tot_arsip ?></span>
                        <a href="<?= base_url('arsip') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-lg-3 col-xs-3">
                <div class="info-box">
                    <span class="icon info-box-icon bg-blue"><i class="fa fa-file-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: bold;">Surat Keluar</span>
                        <span class="info-box-number"><?= $tot_arsipp ?></span>
                        <a href="<?= base_url('arsipp') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <div class="col-lg-3 col-xs-3">
                <div class="info-box">
                    <span class="icon info-box-icon bg-yellow"><i class="fa fa-signal"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: bold;">Departemen</span>
                        <span class="info-box-number"><?= $tot_dep ?></span>
                        <a href="<?= base_url('departemen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="container-c">
            <div class="left">
                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">december 2015</div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days"></div>
                    <div class="goto-today">
                        <div class="goto">
                            <input type="text" placeholder="mm/yyyy" class="date-input" />
                            <button class="goto-btn">Go</button>
                        </div>
                        <button class="today-btn">Today</button>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="today-date">
                    <div class="event-day">wed</div>
                    <div class="event-date">12th december 2022</div>
                </div>
                <div class="events"></div>
                <div class="add-event-wrapper">
                    <div class="add-event-header">
                        <div class="title">Add Event</div>
                        <i class="fas fa-times close"></i>
                    </div>
                    <div class="add-event-body">
                        <div class="add-event-input">
                            <input type="text" placeholder="Event Name" class="event-name" />
                        </div>
                        <div class="add-event-input">
                            <input type="text" placeholder="Event Time From" class="event-time-from" />
                        </div>
                        <div class="add-event-input">
                            <input type="text" placeholder="Event Time To" class="event-time-to" />
                        </div>
                    </div>
                    <div class="add-event-footer">
                        <button class="add-event-btn">Add Event</button>
                    </div>
                </div>
            </div>
            <button class="add-event">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- <div class="col-sm-6 text-center">
            <label class="label label-success">Area Chart</label>
            <div id="area-chart"></div>
        </div>
        <div class="col-sm-6 text-center">
            <label class="label label-success">Line Chart</label>
            <div id="line-chart"></div>
        </div> -->
        <div class="col-sm-6 text-center">
            <label class="label label-success">Bar Chart</label>
            <div id="bar-chart"></div>
        </div>
        <!-- <div class="col-sm-6 text-center">
            <label class="label label-success">Bar stacked</label>
            <div id="stacked"></div>
        </div> -->
        <!-- <div class="col-sm-6 col-sm-offset-3 text-center">
            <label class="label label-success">Pie Chart</label>
            <div id="pie-chart"></div>
        </div> -->

        <div class="contact-form">
            <form>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Pesan:</label>
                <textarea id="message" name="message" required></textarea>

                <input type="submit" value="Kirim">
            </form>
        </div>

        <script>
            var data = [{
                        y: '2014',
                        a: 50,
                        b: 90
                    },
                    {
                        y: '2015',
                        a: 65,
                        b: 75
                    },
                    {
                        y: '2016',
                        a: 50,
                        b: 50
                    },
                    {
                        y: '2017',
                        a: 75,
                        b: 60
                    },
                    {
                        y: '2018',
                        a: 80,
                        b: 65
                    },
                    {
                        y: '2019',
                        a: 90,
                        b: 70
                    },
                    {
                        y: '2020',
                        a: 100,
                        b: 75
                    },
                    {
                        y: '2021',
                        a: 115,
                        b: 75
                    },
                    {
                        y: '2022',
                        a: 120,
                        b: 85
                    },
                    {
                        y: '2023',
                        a: 145,
                        b: 85
                    },
                    {
                        y: '2024',
                        a: 160,
                        b: 95
                    }
                ],
                config = {
                    data: data,
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Total Income', 'Total Outcome'],
                    fillOpacity: 0.6,
                    hideHover: 'auto',
                    behaveLikeLine: true,
                    resize: true,
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors: ['black'],
                    lineColors: ['gray', 'red']
                };
            // config.element = 'area-chart';
            // Morris.Area(config);
            // config.element = 'line-chart';
            // Morris.Line(config);
            config.element = 'bar-chart';
            Morris.Bar(config);
            // config.element = 'stacked';
            // config.stacked = true;
            // Morris.Bar(config);
            Morris.Donut({
                element: 'pie-chart',
                data: [{
                        label: "Friends",
                        value: 30
                    },
                    {
                        label: "Allies",
                        value: 15
                    },
                    {
                        label: "Enemies",
                        value: 45
                    },
                    {
                        label: "Neutral",
                        value: 10
                    }
                ]
            });
        </script>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->