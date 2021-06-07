<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
        <?= $this->session->flashdata('message'); ?>

        <?php $class = $this->uri->segment(3); ?>

        <h3 style="margin-top: 0; margin-bottom: 30px;">
            <?php foreach ($class_name as $t) : ?>
                <?= $t['class']; ?>
            <?php endforeach; ?>
        </h3>

        <a href="#" class="btn btn-default btn-success" style="margin-right: 5px;" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a class="btn btn-warning" href="<?= base_url('admin/reportClassPdf/') . $class ?>" target="_blank">
            <i class=" fa fa-print"></i> Print
        </a>
        <br><br>

        <input type="hidden" value="<?= $class ?>" name="class">
        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Attendance</th>
                    <th>Grade</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $ts) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ts['nik']; ?></td>
                        <td><?= $ts['name']; ?></td>
                        <td><?= $ts['phone']; ?></td>
                        <td>
                            <?php $id = $ts['id_student']; ?>
                            <?php $query = $this->db->query("SELECT ROUND((SELECT COUNT(*) FROM tb_absen WHERE attend = 'present' AND id_stud = '$id' AND id_class = '$class') * 100 / COUNT(*)) AS percentage FROM tb_absen WHERE id_stud = '$id' ");
                            $hasil =  $query->result_array();
                            ?>
                            <?php foreach ($hasil as $h) : ?>
                                <?= $h['percentage']; ?> %
                            <?php endforeach; ?>

                        </td>
                        <td style="text-align: center;">
                            <?php $id = $ts['id_student']; ?>
                            <?php $id_class = $ts['id_class']; ?>

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
                        <input type="hidden" value=<?= $class ?> name="class">
                        <td>
                            <a title="Delete Data" href="<?= base_url(); ?>admin/deleteListTableClass/<?= $ts['id_student']; ?>/<?= $class; ?>" data-class=<?= $class; ?> class="btn btn-danger"><i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Student to Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url(); ?>admin/addPembagianProcess">

                    <div class="">
                        <div class="">

                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label class="col-md-4 control-label" for="inputDefault">Search Student</label>
                                <div class="col-md-6">

                                    <input type="text" name="nik" id="nik" class="form-control" readonly>
                                </div>


                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalList">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="name" id="name_auto" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="address">Address</label>
                                <div class="col-md-7">
                                    <textarea name="address" id="address" class="form-control" readonly></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="phone">Phone</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="phone" id="phone_auto" readonly>
                                </div>
                            </div>

                            <input type="hidden" value="<?= $class ?>" name="class">

                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modalList">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListLabel">Select Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped mb-none" id="table_select">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student as $s) : ?>
                            <tr>
                                <td><?= $s['nik']; ?></td>
                                <td><?= $s['name'] ?></td>
                                <td><?= $s['gender'] ?></td>
                                <td><?= $s['address'] ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $s['id']; ?>" data-nik="<?= $s['nik']; ?>" data-name="<?= $s['name'] ?>" data-gender="<?= $s['gender']; ?>" data-address="<?= $s['address']; ?>" data-phone="<?= $s['phone']; ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>