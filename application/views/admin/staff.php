<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
        <?= $this->session->flashdata('message'); ?>

        <a href="<?= base_url(); ?>admin/addNewStaff" class="btn btn-default btn-success" style="margin-right: 5px;">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a href="<?= base_url(); ?>admin/reportStaffPdf" class="btn btn-default btn-warning" target="_blank">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none" id="table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
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
                foreach ($staff as $s) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s['nik']; ?></td>
                        <td><?= $s['name']; ?></td>
                        <td><?= $s['address']; ?></td>
                        <td><?= $s['phone']; ?></td>
                        <td style="text-align: center;"><img src="<?= base_url('assets/img/') . $s['image'] ?>" style="width: 60px; border-radius: 100%;"></td>
                        <td hidden><?= $s['username']  ?></td>
                        <td hidden><?= $s['password']  ?></td>
                        <td>
                            <a title="Edit Data" href="<?= base_url(); ?>admin/editStaff/<?= $s['code']; ?>/<?= $s['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="Hapus Data" href="<?= base_url(); ?>admin/deleteStaff/<?= $s['code']; ?>/<?= $s['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>