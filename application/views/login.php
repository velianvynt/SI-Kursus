<html>

<head>
    <title>Login System</title>
    <link rel="shorcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/login/logo.jpeg">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/font-awesome/css/font-awesome1.css" />
    <!-- <style>
        .loginbox .fa.active {
            color: dodgerblue;
        }
    </style> -->

<body>
    <div id="particles-js">
    </div>
    <div class="loginbox">
        <img src="<?= base_url(); ?>assets/login/logo.jpeg" class="image">
        <h4>Login Page</h4><br>
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('info'); ?>

        <form method="post" action="<?= base_url(); ?>login/getLogin">

            <input type="text" id="username" name="username" placeholder="Username" required>

            <input type="password" id="password" name="password" placeholder="Password" required>
            <!-- <i class="fa fa-eye" id="eye"></i> -->

            <input type="submit" name="" value="Login">
        </form>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/login/particles.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/login/app.js') ?>"></script>
    <!-- <script>
        let pwd = document.getElementById('password');
        let eye = document.getElementById('eye');

        eye.addEventListener('click', togglePass);

        function togglePass() {
            eye.classList.toggle('active');

            (pwd.type == 'password') ? pwd.type = 'text': pwd.type = 'password';
        }
    </script> -->
</body>
</head>

</html>