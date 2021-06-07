<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Report</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table style="width: 100%;">
            <tr>
                <td>
                    <img src="assets/login/logo.jpeg" width="80px">

                </td>
                <td>
                    <h3 style="font-family:Arial, Helvetica, sans-serif">LANTERN HOUSE</h3>
                    <p>Jl. Mawar No. 6 Nusa Indah, Bengkulu</p>
                </td>
            </tr>
        </table>

        <hr class="line-title" style="border: 1px solid black">

        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">SCORE DETAILS </h4>
        <br>

        <?php foreach ($report as $r) : ?>
            <table style="width: 50%; margin-bottom: 30px;">
                <tr>
                    <td style="width: 15%;">NIK </td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 30%;"><?= $r['nik']; ?></td>
                </tr>
                <tr>
                    <td>Name </td>
                    <td>:</td>
                    <td><?= $r['name']; ?></td>
                </tr>
                <tr>
                    <td>Class </td>
                    <td>:</td>
                    <td><?= $r['class']; ?></td>
                </tr>
            </table>
        <?php endforeach; ?>

        <table class="table-bordered" style="margin-bottom: 80px; width:100%;">
            <tr style="text-align: center; background-color: lightblue;">
                <th style="text-align: center;">Task 1</th>
                <th style="text-align: center;">Task 2</th>
                <th style="text-align: center;">Task 3</th>
                <th style="text-align: center;">Test 1</th>
                <th style="text-align: center;">Test 2</th>
                <th style="text-align: center;">Final Score</th>
                <th style="text-align: center;">Grade</th>
            </tr>
            <?php foreach ($report as $r) :
                $idclass = $r['id_class'];
            ?>
                <tr>
                    <td style="text-align: center;"><?= $r['task1'] ?></td>
                    <td style="text-align: center;"><?= $r['task2'] ?></td>
                    <td style="text-align: center;"><?= $r['task3'] ?></td>
                    <td style="text-align: center;"><?= $r['test1'] ?></td>
                    <td style="text-align: center;"><?= $r['test2'] ?></td>
                    <td style="text-align: center;">
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
                    <td style="text-align: center;">
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

        <table style="width: 100%;">
            <tr>
                <td>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 70%;">Bengkulu, <?= date('d M Y') ?></h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 70%; padding-bottom: 50px;">Teacher,</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <?php foreach ($teacher as $t) : ?>
                        <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 70%;"><?= $t['name']; ?></h5>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>

        <!-- <table>
            <tr>

                <h5 style="font-family:Arial, Helvetica, sans-serif; float: right;">Bengkulu, <?= date('d M Y') ?></h5>
            </tr>
            <tr>

                <?php foreach ($teacher as $t) : ?>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; float: right;"><?= $t['name']; ?></h5>
                <?php endforeach; ?>
            </tr>
        </table> -->

    </div>
</body>

</html>