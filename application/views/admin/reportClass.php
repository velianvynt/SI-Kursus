<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Report</title>
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

        <?php foreach ($class_name as $cn) : ?>
            <h4 class="text-center" style="text-transform: uppercase; font-family:Arial, Helvetica, sans-serif"><?= $cn['class']; ?></h4><br>
        <?php endforeach; ?>

        <table class="table-bordered" style="width: 100%;">
            <tr style="background-color: lightblue;">
                <th style="padding: 4px; text-align: center;">No</th>
                <th style="padding: 4px; text-align: center;">Name</th>
                <th style="padding: 4px; text-align: center;">Gender</th>
                <th style="padding: 4px; text-align: center;">Phone</th>
                <th style="padding: 4px;; text-align:center;">Attendance</th>
                <th style="padding: 4px; text-align:center;">Score</th>
            </tr>
            <?php $no = 1;
            foreach ($class as $s) : ?>
                <tr>
                    <td style="padding: 4px; text-align: center;"><?= $no++ ?></td>
                    <td style="padding: 4px;"><?= $s['name'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $s['gender'] ?></td>
                    <td style="padding: 4px;"><?= $s['phone'] ?></td>
                    <td style="padding: 4px; text-align: center;">
                        <?php $id = $s['id_student']; ?>
                        <?php $class = $s['id_class']; ?>
                        <?php $query = $this->db->query("SELECT ROUND((SELECT COUNT(*) FROM tb_absen WHERE attend = 'present' AND id_stud = '$id' AND id_class = '$class') * 100 / COUNT(*)) AS percentage FROM tb_absen WHERE id_stud = '$id'");
                        $hasil =  $query->result_array();
                        ?>
                        <?php foreach ($hasil as $h) : ?>
                            <?= $h['percentage']; ?> %
                        <?php endforeach; ?>
                    </td>

                    <td style="padding: 4px; text-align: center;">
                        <?php $id = $s['id_student']; ?>
                        <?php $id_class = $s['id_class']; ?>

                        <?php $query = $this->db->query("SELECT ROUND((
                                (SELECT task1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT task2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') +(SELECT task3 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test1 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class') + (SELECT test2 FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'))
                                / 5 ) AS average 
                                FROM tb_nilai WHERE id_stud = '$id' AND id_class = '$id_class'");
                        $hasil =  $query->result_array();
                        ?>

                        <?php foreach ($hasil as $h) : ?>
                            <input type="hidden" value="<?= $hasil = $h['average']; ?>">
                        <?php endforeach; ?>

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
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding: 80px 0 50px 70%;">Bengkulu, <?= date('d M Y') ?></h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 77%;">Admin</h5>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>