
<?php
use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>

    <title>Inicio | Dashboard </title>
    <meta name="description" content="Dahboard de prospectos recientes y estadísticas.">

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="grid lg:items-center gap-2 sm:mx-10 p-4">
    <div class="w-full flex flex-col lg:flex-row lg:items-center lg:justify-between gap-y-4">
        <div>
            <h2 class="text-2xl font-semibold">
                Prospectos recientes.
            </h2>
        </div>

    </div>
    <!-- contenedor de dashboard -->
    <div class="overflow-x-auto w-full items-start">
        <table class="table w-full">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Recientes</th>
                <th>Nombre Prospecto</th>
                <th class="hidden md:grid">Origen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            <?php foreach($prospects as $prospect): ?>
            <tr>
                <td>
                    <?= form_open(url_to('backend.modules.prospects.ready', $prospect['id'])) ?>
                    <label for="modal-action-ready-<?= esc($prospect['id']) ?>" class="btn btn-sm btn-outline <?= esc($prospect['response'] ? 'btn-success' : 'btn-base') ?>">
                        <i class="bi <?= esc($prospect['response']) ? 'bi-check-circle-fill' : 'bi-check-circle' ?> text-lg"></i>
                    </label>
                    <?= $this->setData([
                        'id'      => "modal-action-ready-{$prospect['id']}",
                        'message' => $prospect['response'] ? '¿Desear desmarcar este prospecto?' : '¿Deseas marcar como atendido?',
                    ])->include('backend/components/modal-submit') ?>
                    <?= form_close() ?>
                </td>
                <th><?= esc(Time::parse($prospect['created_at'])->toDateString()) ?></th>
                <td><?= esc($prospect['name']) ?></td>
                <td class="hidden md:grid"><?= esc($prospect['landing']) ?></td>
                <td>
                    <div class="flex justify-center items-center gap-2 ">
                        <a href="<?= url_to('backend.modules.prospects.show', $prospect['id']) ?>" class="btn btn-sm btn-outline btn-primary">details</a>
                        <a href="tel: <?= esc($prospect['phone']) ?>" class="btn btn-sm btn-outline"><i class="bi bi-telephone-outbound-fill"></i></a>
                        <a href="mailto:<?=($prospect['email']) ?>" class="btn btn-sm btn-outline btn-secondary"><i class="bi bi-envelope-plus"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- Fin de dashboard -->
    <!-- Paginación -->
    <div class="flex justify-end pt-4">

    </div>
    <!-- Fin de la paginación -->
    <div class="flex flex-col gap-y-5 pb-8 w-full">
        <div class="flex items-center justify-start">
            <h2 class="text-2xl font-semibold">
                Gráfico de resultados.
            </h2>
        </div>
        <div class="card w-full shadow-md px-8 py-8">
            <div class="py-5">
                <div id="data" style="display:none;"><?= $graph ?></div>
                <!-- HTML -->
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>

</div>
 <!-- Notificación exitosa -->
 <?php if (session()->has('toast-success')): ?>
    <?= $this->setVar('message', session()->getFlashdata('toast-success'))->include('backend/components/toast-success') ?>
<?php endif ?>
<!-- Fin de la notificación exitosa -->


    <style>
        #chartdiv {
        width: 100%;
        height: 500px;
        }
    </style>

    <!-- Chart code -->
    <script>

        am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX: true
        }));

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
        xRenderer.labels.template.setAll({
        rotation: -90,
        centerY: am5.p50,
        centerX: am5.p100,
        paddingRight: 15
        });

        xRenderer.grid.template.setAll({
        location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "landing_name",
        renderer: xRenderer,
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: am5xy.AxisRendererY.new(root, {
            strokeOpacity: 0.1
        })
        }));


        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "value",
        sequencedInterpolation: true,
        categoryXField: "landing_name",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));

        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function(fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function(stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
        });


        // Set data
        var
         data = [{
            country: "Mexico", value: 2025
        }];

        var graphData = JSON.parse(document.getElementById('data').textContent);

        for (var i = 0; i < graphData.length; i++) {
            graphData[i].value = parseInt(graphData[i].value);
        }
        xAxis.data.setAll(graphData);
        series.data.setAll(graphData);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

        }); // end am5.ready()
    </script>



<?= $this->endSection() ?>
