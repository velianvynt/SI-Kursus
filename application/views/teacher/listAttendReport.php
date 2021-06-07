<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <?php $class =  $this->uri->segment(3); ?>
        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Attendance Percentage</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table2 as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['name']; ?></td>

                        <td>
                            <?php $id = $t['id_student']; ?>
                            <?php $query = $this->db->query("SELECT ROUND((SELECT COUNT(*) FROM tb_absen WHERE attend = 'present' AND id_stud = '$id' AND id_class = '$class') * 100 / COUNT(*)) AS percentage FROM tb_absen WHERE id_stud = '$id' ");
                            $hasil =  $query->result_array();
                            ?>
                            <?php foreach ($hasil as $h) : ?>
                                <?= $h['percentage']; ?> %
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <a title="Report" href="<?= base_url(); ?>teacher/printReportPdf/<?= $t['id_student']; ?>/<?= $class; ?>" class="btn btn-warning"><i class="fas fa-print"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>