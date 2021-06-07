<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        .gambar {
            src: url('../assets/login/bg-login.jpg');
        }
    </style>
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

        <h4 style="text-align: center; font-family:Arial, Helvetica, sans-serif">LIST STUDENTS</h4>
        <br>

        <table class="table-bordered" style="width: 100%; margin-bottom: 80px;">
            <tr style="background-color: lightblue;">
                <th style="padding: 4px; text-align: center;">No</th>
                <th style="padding: 4px; text-align: center;">NIK</th>
                <th style="padding: 4px; text-align: center;">Name</th>
                <th style="padding: 4px; text-align: center;">Gender</th>
                <th style="padding: 4px; text-align: center;">School</th>
                <th style="padding: 4px; text-align: center;">Date of Register</th>
            </tr>

            <?php $no = 1; ?>
            <?php foreach ($list as $h) : ?>
                <tr>
                    <td style="padding: 4px; text-align: center;"><?= $no++ ?></td>
                    <td style="padding: 4px;"><?= $h['nik'] ?></td>
                    <td style="padding: 4px;"><?= $h['name'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['gender'] ?></td>
                    <td style="padding: 4px;"><?= $h['school'] ?></td>
                    <td style="padding: 4px; text-align: center;"><?= $h['date_of_register'] ?></td>
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

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>