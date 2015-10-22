<?php
$ip = '127.0.0.1';
$title = 'Adruino Mock';
?>

<!DOCTYPE html>
<html>
    <?php include_once 'inc/head.php'; ?>

    <body class="skin-blue">
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- header logo: style can be found in header.less -->
            <?php include_once 'inc/header.php'; ?>
            <div class="wrapper row-offcanvas row-offcanvas-left">
                <!-- Left side column. contains the logo and sidebar -->
                <?php include_once 'inc/sitebar.php'; ?>
                <!-- Right side column. Contains the navbar and content of the page -->
                <aside class="right-side">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1><?php echo $title ?></h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-home"></i> Panel główny</a></li>
                            <li class="active"><i class="fa fa-moon-o"></i> Sypialnie</li>
                            <li class="active"><?php echo $title ?></li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i>ºC</i></span>
                                    <div id="t1" class="info-box-content">
                                        <span class="info-box-text">Temperatura</span>
                                        <span class="sh-c info-box-number lg">90</span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i>%</i></span>
                                    <div id="h1" class="info-box-content">
                                        <span class="info-box-text">Wilgotność powietrza</span>
                                        <span class="sh-c info-box-number lg">90</span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green-active"><i class="fa fa-male"></i></span>
                                    <div id="m1" class="info-box-content">
                                        <span class="info-box-text">Detekcja ruchu</span>
                                        <span class="sh-c info-box-text lg">Brak ruchu</span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue-active"><i class="fa fa-windows"></i></span>
                                    <div id="b1" class="info-box-content">
                                        <span class="info-box-text">Roleta</span>
                                        <span class="sh-c info-box-text lg">Zamknięta</span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Sterowanie</h3>
                            </div>
                            <div class="box-body">
                                <a class="btn btn-app bg-red ajaxButton" id="l1">
                                    <i class="fa fa-lightbulb-o"></i> Światło 1
                                </a>
                                <a class="btn btn-app bg-red ajaxButton" id="l2">
                                    <i class="fa fa-lightbulb-o"></i> Światło 2
                                </a>
                                <a class="btn btn-app bg-yellow ajaxButton" id="s1">
                                    <i class="fa fa-plug"></i> Kontakt 1
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-plug"></i> Kontakt 2
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-plug"></i> Kontakt 3
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-plug"></i> Kontakt 4
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-windows"></i> Roleta
                                </a>
                            </div><!-- /.box-body -->
                        </div>

                        <div class="row">
                            <section class="col-lg-7">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                        <li class="active"><a href="#temp-chart" data-toggle="tab" aria-expanded="true">Temperatura</a></li>
                                        <li class=""><a href="#humanity-chart" data-toggle="tab" aria-expanded="false">Wilgotność powietrza</a></li>
                                        <li class="pull-left header"><i class="fa fa-line-chart"></i> Wykresy</li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris charts -->
                                        <div class="chart tab-pane active" id="temp-chart" style="position: relative; height: 300px;"></div>
                                        <div class="chart tab-pane" id="humanity-chart" style="position: relative; height: 300px;"></div>
                                    </div>
                                </div>
                            </section>

                            <section class="col-lg-5">
                                <div id="notifies" class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">10 ostatnich zdarzeń</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed"></table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </section>
                        </div>

                    </section><!-- /.content -->
                </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->
        </div>

        <?php include_once 'inc/javascripts.php' ?>
        <script type="text/javascript">

            var tempChart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'temp-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [],
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                ymin: 'auto 10',
                ymax: 'auto 30',
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Temperatura']
            });
            var humanityChart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'humanity-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [],
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                ymin: 'auto 10',
                ymax: 'auto 30',
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Wilgotność powietrza']
            });

            function getStatus() {
                $.ajax({url: "/gateway/get.php?ip=<?php echo $ip ?>", success: function(result) {
                        $.each(result, function(type, value) {

                            //if (type == 'l1' || type == 'l2') {
                            if (value == 0) {
                                $('#' + type).removeClass('value1');
                            } else if (value == 1) {
                                $('#' + type).addClass('value1');
                            }
                            //}

                            if (type === 't1' || type === 'h1' || type === 'm1') {
                                if (type === 't1' || type === 'h1') {
                                    $('#' + type + ' span.sh-c').text(value / 10);
                                } else if (type === 'm1' && value == 1) {
                                    $('#' + type + ' span.sh-c').text('Wykryto ruch');
                                } else if (type === 'm1' && value == 0) {
                                    $('#' + type + ' span.sh-c').text('Brak ruchu');
                                }
                            }
                        });
                    }
                });
            }
            ;

            function getEvents() {
                $.ajax({url: "/gateway/events.php?ip=<?php echo $ip ?>", success: function(result) {
                        var htmlTable = '<tr><th style="width: 10px">#</th><th>Data</th><th>Zdarzenie</th></tr>';
                        var i = 0;
                        $.each(result, function(res, obj) {
                            htmlTable += '<tr><td>' + (++i) + '</td><td>' + obj.date + '</td><td>' + obj.text + '</td></tr>';
                        });
                        $('#notifies table').html(htmlTable);
                    }
                });
            }
            ;

            function getChartData(res) {
                $.ajax({url: "/gateway/chartData.php?ip=<?php echo $ip ?>&event=" + res, success: function(result) {
                        if (res == 't1') {
                            tempChart.setData(result);
                        } else if (res == 'h1') {
                            humanityChart.setData(result);
                        }
                    }
                });
            }
            ;

            $(document).ready(function() {

                getStatus();
                getEvents();
                getChartData('t1');
                getChartData('h1');

                setInterval(function() {
                    getStatus();
                }, 2500);

                setInterval(function() {
                    getEvents();
                    getChartData('t1');
                    getChartData('h1');
                }, 10000);

                $(".ajaxButton").click(function(e) {
                    e.preventDefault();
                    console.log($(this).attr('id'));
                    var value = $(this).hasClass('value1') ? 0 : 1;
                    var _this = $(this);
                    $.ajax({url: "/gateway/set.php?ip=<?php echo $ip ?>&t=" + $(this).attr('id') + "&v=" + value, success: function(result) {
                            _this.toggleClass('value1');
                        }
                    });
                });

                $('a[data-toggle="tab"]').on('click', function(e) {
                    console.log(e);
                    getChartData('t1');
                    getChartData('h1');
                })

            });
        </script>
    </body>
</html>
