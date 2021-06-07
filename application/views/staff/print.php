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
            <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif"><?= $cn['class']; ?></h4>
        <?php endforeach; ?>
        <br>

        <table class="table-bordered" style="width: 100%; margin-bottom: 80px;">
            <tr style="background-color: lightblue;">
                <th style="padding: 4px; text-align:center;">No</th>
                <th style="padding: 4px; text-align:center;">Name</th>
                <th style="padding: 4px; text-align:center;">Gender</th>
                <th style="padding: 4px; text-align:center;">Phone</th>
            </tr>
            <?php $no = 1;
            foreach ($class as $s) : ?>
                <tr>
                    <td style="text-align: center; padding: 4px;"><?= $no++ ?></td>
                    <td style="padding: 4px;"><?= $s['name'] ?></td>
                    <td style="text-align: center; padding: 4px;"><?= $s['gender'] ?></td>
                    <td style="padding: 4px; text-align:center"><?= $s['phone'] ?></td>
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
                    <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 70%; padding-bottom: 50px;">Staff,</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <?php foreach ($staff as $s) : ?>
                        <h5 style="font-family:Arial, Helvetica, sans-serif; padding-left: 70%;"><?= $s['name']; ?></h5>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>