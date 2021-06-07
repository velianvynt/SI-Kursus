<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">
        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">ATTENDANCE DETAILS </h4>
        <br>

        <?php foreach ($name as $c) {
            $id = $c['id'];
        } ?>

        <table class=" table table-bordered">
            <tr>
                <th style="padding: 4px; text-align: center">Date</th>
                <th style="padding: 4px; text-align: center">Attendance Status</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($report as $r) :
                $idclass = $r['id_class'];
            ?>
                <tr>
                    <td style="padding: 4px; text-align: center"><?= $r['date'] ?></td>
                    <td style="padding: 4px; text-align: center"><?= $r['attend'] ?></td>
                </tr>

            <?php endforeach; ?>
        </table>

        <div id="chartContainer2" style="height: 200px; width: 100%;"></div>
        <div class="row">

            <a title="Report" href="<?= base_url('teacher/printReportPdff/'); ?><?= $id ?>/<?= $idclass ?>" class="btn btn-warning" target="_blank" style="float: right; margin-right: 10px;">Print</i></a>
            <a title="Report" href="<?= base_url('teacher/listAttendReport/'); ?><?= $idclass ?>" class="btn btn-danger" style="float: right; margin-right: 7px;">Back</i></a>
        </div>

    </div>


</section>


<?php


$studentData = $this->db->query("SELECT *, COUNT(*) AS jumlah FROM tb_absen WHERE id_stud = $id AND id_class = $idclass GROUP BY attend")->result_array();

foreach ($studentData as $k => $v) {
    $arrStud[] = ['label' => $v['attend'], 'y' => $v['jumlah']];
}

?>

<script type="text/javascript">
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer2", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true		
            title: {
                text: ""
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie",etc.
                type: "pie",
                dataPoints: <?= json_encode($arrStud, JSON_NUMERIC_CHECK); ?>

            }]
        });
        chart.render();

    }
</script>

<script src="<?= base_url('assets/canvasjs/canvasjs.js') ?>"> </script>