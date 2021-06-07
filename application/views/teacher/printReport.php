<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
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

        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">ATTENDANCE DETAILS</h4>
        <br>

        <?php foreach ($name as $c) : ?>
            <h5 style="font-family:Arial, Helvetica, sans-serif">Name: <?= $c['name']; ?></h5>
        <?php endforeach; ?>


        <table class=" table-bordered" style="width: 100%; margin-bottom: 80px;">
            <tr style="background-color: lightblue;">
                <th style="padding: 4px; text-align: center">Date</th>
                <th style="padding: 4px; text-align: center">Attendance Status</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($report as $r) : ?>
                <tr>
                    <td style="padding: 4px; text-align: center"><?= $r['date'] ?></td>
                    <td style="padding: 4px; text-align: center"><?= $r['attend'] ?></td>
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
    </div>
</body>

</html>