<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <?php if ($this->session->flashdata('info')) : ?>
        <?php endif; ?>

        <a href="<?= base_url(); ?>staff/addNewTeacher" class="btn btn-default btn-success">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span> </a>
        <br><br>
        <table class="table table-bordered table-striped mb-none" id="table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Address</th>
                    <th>Phone Number</th>
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

                        <td>
                            <a title="Edit Data" href="<?= base_url(); ?>staff/editTeacher/<?= $t['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="Delete Data" href="<?= base_url(); ?>staff/deleteTeacher/<?= $t['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <img id="image_auto" style="width: 90%;">
                        </div>
                        <div class="col-md-7">

                            <table class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Username</th>
                                        <td><span id="username_auto"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><span id="password_auto"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a></button>

            </div>

        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_teacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form method="POST" action="<?= base_url(); ?>staff/addNewClassProcess">
                    <div class="row">
                        <div class="col-sm-9">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="inputDefault">Course</label>
                                <div class="col-md-6">
                                    <select class="form-control select2" id="course" name="course">
                                        <option value="0"> Choose Course </option>
                                        <?php foreach ($course as $c) : ?>

                                            <option value="<?= $c['id'] ?>"><?= $c['course'] ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="class">Class Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="class" id="class" placeholder="Class A/B/C" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="day">Day</label>
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
                                <label class="col-md-4 control-label" for="time">Time</label>
                                <div class="col-md-4">
                                    <input type="time" class="form-control" name="time" id="time" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="inputDefault">Teacher</label>
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
            </div>


            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a></button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add</button>
            </div>
            </form>

        </div>
    </div>
</div>
</div>