<script type="text/javascript" src="<?php echo base_url('media/js2/jquery-1.9.1.min.js'); ?>"></script>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#grafik1').highcharts({
            chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php echo $title; ?>'
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
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?php echo $global; ?>
                    }],
                    drilldown: {
                        series: <?php echo $detail; ?>
                    }
                });
            });
		</script>
	</head>
	<body>
<script src="<?php echo base_url('media/js2/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('media/js2/modules/data.js'); ?>"></script>
<script src="<?php echo base_url('media/js2/modules/drilldown.js'); ?>"></script>
<div id="grafik1" style="min-width: 310px; height: 700px; margin: 0 auto"></div>
