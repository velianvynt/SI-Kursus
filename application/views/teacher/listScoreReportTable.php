<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
        <?= $this->session->flashdata('message'); ?>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Final Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table2 as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['nik']; ?></td>
                        <td><?= $t['name']; ?></td>
                        <td>
                            <?php $id = $t['id_stud']; ?>
                            <?php $id_class = $t['id_class']; ?>

                            <?php $query = $this->db->query("SELECT ROUND((
                                (SELECT task1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT task2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') +(SELECT task3 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'))
                                / 5 ) AS average 
                                FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'");
                            $hasil =  $query->result_array();
                            ?>

                            <?php foreach ($hasil as $h) : ?>
                                <?= $h['average']; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <a title="Report" href="<?= base_url(); ?>teacher/printScorePdf/<?= $t['id_stud']; ?>/<?= $id_class; ?>" class="btn btn-warning"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>