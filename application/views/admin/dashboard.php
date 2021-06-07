<link rel="stylesheet" href="<?= base_url('assets/chartjs/script.php') ?>">

<section class="panel panel-horizontal">
    <header class="panel-heading bg-white">
        <div class="panel-heading-icon bg-secondary mt-sm" style="background-color: #949494;">
            <i class="fa fa-user"></i>
        </div>
    </header>
    <div class="panel-body">
        <h3 class="text-semibold mt-sm">Welcome Admin!</h3>
        <p>Lantern House Course Information System</p>
    </div>
</section>


<div class="row" style="margin-bottom: 30px;">
    <div class="col-lg-6">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-success" style="background-color: #A0C1B8;">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Student</h4>
                            <div class="info">
                                <strong class="amount">
                                    <?php $query = $this->db->query("select * from tb_siswa");
                                    echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>admin/listStudent" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-primary" style="background-color: #709FB0">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-user-edit"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Staff</h4>
                            <div class="info">
                                <strong class="amount"><?php $query = $this->db->query("select * from tb_staff");
                                                        echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>admin/listStaff" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-secondary" style="background-color: #726A95;">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Teacher</h4>
                            <div class="info">
                                <strong class="amount"><?php $query = $this->db->query("select * from tb_teacher");
                                                        echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>admin/listTeacher" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-info" style="background-color: #765285">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Active Student</h4>
                            <div class="info">
                                <strong class="amount"><?php $query = $this->db->query("select distinct(id_student) from tb_pembagian_kelas");
                                                        echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>admin/listClass" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- CANVAS JS -->
<?php
$studentData = $this->db->query("SELECT date_of_register, COUNT(*) AS jumlah FROM tb_siswa GROUP BY date_of_register")->result_array();
foreach ($studentData as $k => $v) {
    $arrStud[] = ['label' => $v['date_of_register'], 'y' => $v['jumlah']];
}

$studentAtv = $this->db->query("SELECT class, COUNT(*) AS jumlah FROM tb_pembagian_kelas JOIN tb_jadwal ON tb_pembagian_kelas.id_class = tb_jadwal.id GROUP BY tb_jadwal.id")->result_array();
foreach ($studentAtv as $k => $v) {
    $arrStudAtv[] = ['label' => $v['class'], 'y' => $v['jumlah']];
}

?>

<script type="text/javascript">
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true		
            title: {
                text: "Student"
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie",etc.
                type: "spline",
                dataPoints: <?= json_encode($arrStud, JSON_NUMERIC_CHECK); ?>

            }]
        });

        var chart1 = new CanvasJS.Chart("chartContainer2", {
            theme: "light2", // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true		
            title: {
                text: "Class"
            },
            data: [{
                type: "column",
                dataPoints: <?= json_encode($arrStudAtv, JSON_NUMERIC_CHECK); ?>

            }]
        });

        chart1.render();
        chart.render();

    }
</script>

<script src="<?= base_url('assets/canvasjs/canvasjs.js') ?>"> </script>