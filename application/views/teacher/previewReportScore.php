<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">
        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">SCORE DETAILS</h4>
        <br>

        <?php foreach ($name as $c) {
            $id = $c['id'];
        } ?>

        <!-- <table class=" table table-bordered">
            <tr>
                <th style="width: 30%text-align: center">Task 1</th>
                <th style="padding: 4px; text-align: center">Task 2</th>
                <th style="padding: 4px; text-align: center">Task 3</th>
                <th style="padding: 4px; text-align: center">Test 1</th>
                <th style="padding: 4px; text-align: center">Test 2</th>
                <th style="padding: 4px; text-align: center">Final Score</th>
                <th style="padding: 4px; text-align: center">Grade</th>
            </tr>
            <?php foreach ($report as $r) :
                $idclass = $r['id_class'];
            ?>
                <tr>
                    <td style="text-align: center"><?= $r['task1'] ?></td>
                    <td style="text-align: center"><?= $r['task2'] ?></td>
                    <td style="text-align: center"><?= $r['task3'] ?></td>
                    <td style="text-align: center"><?= $r['test1'] ?></td>
                    <td style="text-align: center"><?= $r['test2'] ?></td>
                    <td style=" text-align: center">
                        <?php $id = $r['id_stud']; ?>
                        <?php $id_class = $r['id_class']; ?>

                        <?php $query = $this->db->query("SELECT ROUND((
                                (SELECT task1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT task2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') +(SELECT task3 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'))
                                / 5 ) AS average 
                                FROM tb_nilai WHERE id_stud = '$id'");
                        $hasil =  $query->result_array();
                        ?>

                        <?php foreach ($hasil as $h) : ?>
                            <?= $hasil = $h['average']; ?>
                        <?php endforeach; ?>
                    </td>
                    <td style="text-align: center; background-color: lightblue; font-weight: bold;">
                        <?php if ($hasil >= 89) : ?>
                            <?= 'A' ?>
                        <?php elseif ($hasil >= 79 && $hasil <= 88) : ?>
                            <?= 'B' ?>
                        <?php else : ?>
                            <?= 'C' ?>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table> -->



        <table class="table table-striped">
            <?php foreach ($report as $r) : ?>
                <tr>
                    <th style="width: 30%">NIK</th>
                    <td>:</td>
                    <td style=""><?= $r['nik'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Name</th>
                    <td>:</td>
                    <td style=""><?= $r['name'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Class</th>
                    <td>:</td>
                    <td style=""><?= $r['class'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Task 1</th>
                    <td>:</td>
                    <td style=""><?= $r['task1'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Task 2</th>
                    <td>:</td>
                    <td style=""><?= $r['task2'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Task 3</th>
                    <td>:</td>
                    <td style=""><?= $r['task3'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Test 1</th>
                    <td>:</td>
                    <td style=""><?= $r['test1'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Test 2</th>
                    <td>:</td>
                    <td style=""><?= $r['test2'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%">Final Score</th>
                    <td>:</td>
                    <td>
                        <?php $id = $r['id_stud']; ?>
                        <?php $id_class = $r['id_class']; ?>

                        <?php $query = $this->db->query("SELECT ROUND((
                                (SELECT task1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT task2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') +(SELECT task3 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'))
                                / 5 ) AS average 
                                FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'");
                        $hasil =  $query->result_array();
                        ?>

                        <?php foreach ($hasil as $h) : ?>
                            <?= $hasil = $h['average']; ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 30%;">Grade</th>
                    <td style="width: 5%">:</td>
                    <td style="font-weight: bold;">
                        <?php if ($hasil >= 89) : ?>
                            <?= 'A' ?>
                        <?php elseif ($hasil >= 79 && $hasil <= 88) : ?>
                            <?= 'B' ?>
                        <?php elseif ($hasil == 0) : ?>
                            <?= '-' ?>
                        <?php else : ?>
                            <?= 'C' ?>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>


        <div class="row" style="margin-top: 100px;">
            <a title="Report" href="<?= base_url('teacher/printReportScorePdff/'); ?><?= $id ?>/<?= $idclass ?>" class="btn btn-warning" target="_blank" style="float: right; margin-right: 10px;">Print</i></a>
            <a title="Back" href="<?= base_url('teacher/listScoreReport/'); ?><?= $idclass ?>" class="btn btn-danger" style="float: right; margin-right: 7px;">Back</i></a>
        </div>

    </div>


</section>