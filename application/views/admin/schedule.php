<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-default btn-success" style="margin-right: 3px;" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a href="<?= base_url(); ?>admin/reportSchedulePdf" class="btn btn-default btn-warning" target="_blank">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Class</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($class as $c) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $c['class']; ?></td>
                        <td><?= $c['day']; ?></td>
                        <td><?= $c['time']; ?></td>
                        <td><?= $c['name'] ?></td>

                        <td>
                            <a title="Edit Data" href="<?= base_url(); ?>admin/editSchedule/<?= $c['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                            <a title="Hapus Data" href="<?= base_url(); ?>admin/deleteSchedule/<?= $c['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url(); ?>admin/addNewScheduleProcess">
                    <div class="row">
                        <div class="col-sm-9">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="class">Class Name <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="class" id="class" placeholder="Class A/B/C" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="day">Day <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select class="form-control select2" id="day" name="day">
                                        <option value="0"> Choose Day </option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tueday">Tueday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="time">Time <span style="color: red;">*</span></label>
                                <div class="col-md-4">
                                    <input type="time" class="form-control" name="time" id="time" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="inputDefault">Teacher <span style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select class="form-control select2" id="teacher" name="teacher">
                                        <option value="0"> Choose Teacher </option>
                                        <?php foreach ($teacher as $t) : ?>

                                            <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a></button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add</button>
                    </div>

            </div>
        </div>
    </div>
</div>