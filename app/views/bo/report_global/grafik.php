<script type="text/javascript" src="<?php echo base_url('media/js2/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?php echo base_url('media/js2/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('media/js2/modules/data.js'); ?>"></script>
<script src="<?php echo base_url('media/js2/modules/drilldown.js'); ?>"></script>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#grafik1').highcharts({
            chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php echo $title1; ?>'
                    },
                    subtitle: {
                        text: 'Klik kolom untuk melihat detail. Sumber : <a href="<?php echo base_url(); ?>"><?php echo $this->_setting->app_id; ?></a>.'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Total Puskesmas Reported'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
                    },

                    series: [{
                        name: 'Data',
                        colorByPoint: true,
                        data: <?php echo $global1; ?>
                    }],
                    drilldown: {
                        series: <?php echo $detail1; ?>
                    }
                });
            });
        </script>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#grafik2').highcharts({
            chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php echo $title2; ?>'
                    },
                    subtitle: {
                        text: 'Klik kolom untuk melihat detail. Sumber : <a href="<?php echo base_url(); ?>"><?php echo $this->_setting->app_id; ?></a>.'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Total percent input data'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}%'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },

                    series: [{
                        name: 'Puskesmas',
                        colorByPoint: true,
                        data: <?php echo $global2; ?>
                    }],
                    drilldown: {
                        series: <?php echo $detail2; ?>
                    }
                });
            });
        </script>


<div id="grafik2" style="min-width: 310px; height: 700px; margin: 0 auto"></div>
