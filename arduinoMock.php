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

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <a id="l1" class="small-box bg-red-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>Światło 1</h3>
                                        <p>Wyłączone</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <a id="l2" class="small-box bg-red-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>Światło 2</h3>
                                        <p>Wyłączone</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <a id="l3" class="small-box bg-red-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>Kinkiet</h3>
                                        <p>Wyłączone</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                        
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet1" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K1 (góra)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet1" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K1 (dół)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet2" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K2 (góra)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet2" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K2 (dół)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet2" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K3 (góra)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <a id="outlet2" class="small-box bg-aqua-active disabled ajaxButton" href="#">
                                    <div class="inner">
                                        <h3>K3 (dół)</h3>
                                        <p>Wyłączony</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-plug"></i>
                                    </div>
                                </a>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                        
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <!-- small box -->
                                <div id="window" class="small-box bg-green-active disabled">
                                    <div class="inner">
                                        <h3>Okno</h3>
                                        <p>Zamknięte</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-windows"></i>
                                    </div>
                                </div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <section class="col-lg-7">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                        <li class="active"><a href="#temp-daily-chart" data-toggle="tab" aria-expanded="true">Temperatura dzienny</a></li>
                                        <li class=""><a href="#temp-weekly-chart" data-toggle="tab" aria-expanded="false">Temperatura tygodniowy</a></li>
                                        <li class="pull-left header"><i class="fa fa-line-chart"></i> Wykresy</li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris charts -->
                                        <div class="chart tab-pane active" id="temp-daily-chart" style="position: relative; height: 300px;"></div>
                                        <div class="chart tab-pane" id="temp-weekly-chart" style="position: relative; height: 300px;"></div>
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

            var tempDailyChart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'temp-daily-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [],
                // The name of the data record attribute that contains x-values.
                xkey: 'time',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                ymin: 'auto 10',
                ymax: 'auto 30',
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Temperatura']
            });
            var tempWeeklyChart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'temp-weekly-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [],
                // The name of the data record attribute that contains x-values.
                xkey: 'time',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                ymin: 'auto 10',
                ymax: 'auto 30',
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Temperatura']
            });

            function getStatus() {
                $.ajax({url: "/gateway/get.php?ip=<?php echo $ip ?>", success: function(result) {
                        $.each(result, function(type, value) {
                            if (value == 0) {
                                $('#' + type).addClass('disabled');
                            } else {
                                $('#' + type).removeClass('disabled');
 
                            }
                        });
                    }
                });
            }
            ;

            $(document).ready(function() {

                getStatus();

                setInterval(function() {
                    getStatus();
                }, 2500);

                $(".ajaxButton").click(function(e) {
                    e.preventDefault();
                    console.log($(this).attr('id'));
                    var value = $(this).hasClass('disabled') ? 1 : 0;
                    var _this = $(this);
                    $.ajax({url: "/gateway/set.php?ip=<?php echo $ip ?>&t=" + $(this).attr('id') + "&v=" + value, success: function(result) {
                            _this.toggleClass('disabled');
                        }
                    });
                });
            });
        </script>
    </body>
</html>