<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <a href="<?= base_url(); ?>admin/addNewTeacher" class="btn btn-default btn-success" style="margin-right: 5px;">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a href="<?= base_url(); ?>admin/reportTeacherPdf" class="btn btn-default btn-warning" target="_blank">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none" id="table_teacher">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th hidden>Username</th>
                    <th hidden>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($teacher as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['name']; ?></td>
                        <td><?= $t['nik']; ?></td>
                        <td><?= $t['address']; ?></td>
                        <td><?= $t['phone']; ?></td>
                        <td hidden><?= $t['username'] ?></td>
                        <td hidden><?= $t['password'] ?></td>
                        <td style="text-align: center;"><img src="<?= base_url('assets/img/') . $t['image'] ?>" style="width: 60px; border-radius: 100%;"></td>
                        <td>
                            <a title="Edit Data" href="<?= base_url(); ?>admin/editTeacher/<?= $t['code']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="Delete Data" href="<?= base_url(); ?>admin/deleteTeacher/<?= $t['code']; ?>/<?= $t['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>