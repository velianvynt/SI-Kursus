<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Report</title>
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
                    <p>Jl. Mawar No. 6, Nusa Indah, Bengkulu</p>
                </td>
            </tr>
        </table>

        <hr class="line-title" style="border: 1px solid black">

        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">LIST TEACHER LANTERN HOUSE</h4>

        <br>

        <table class="table-bordered" style="width: 100%;">
            <tr style="background-color: lightblue;">
                <th style="padding: 4px; text-align:center;">No</th>
                <th style="padding: 4px; text-align:center;">NIK</th>
                <th style="padding: 4px; text-align:center;">Name</th>
                <th style="padding: 4px; text-align:center;">Address</th>
                <th style="padding: 4px; text-align:center;">Phone</th>
            </tr>

            <?php $no = 1; ?>
            <?php foreach ($teacher as $h) : ?>
                <tr>
                    <td style="padding: 4px; text-align:center;"><?= $no++ ?></td>
                    <td style="padding: 4px;"><?= $h['nik'] ?></td>
                    <td style="padding: 4px;"><?= $h['name'] ?></td>
                    <td style="padding: 4px;"><?= $h['address'] ?></td>
                    <td style="padding: 4px;"><?= $h['phone'] ?></td>
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