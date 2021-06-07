<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Lantern House</h2>
    </header>

    <div class="panel-body">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->flashdata('info')) : ?>
        <?php endif; ?>

        <br>
        <div class="form-group">
            <label class="col-md-2 control-label" for="inputDefault">Class</label>
            <div class="col-md-4">
                <select class="form-control select2" id="class" name="class" onchange="autofill()">
                    <option value="0"> Choose Class </option>
                    <?php foreach ($class as $c) { ?>

                        <option value="<?= $c['id'] ?>"><?= $c['class'] ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td id="name"></td>

                    <td>
                        <a title="Edit Data" href="<?= base_url(); ?>staff/editClass/<?= $c['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                        <a title="Hapus Data" href="<?= base_url(); ?>index.php/kartetap/hapus/<?= $c['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>



            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url(); ?>staff/addNewClassProcess">


                    <div class="row">

                        <div class="col-sm-9">


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="inputDefault">Course</label>
                                <div class="col-md-7">
                                    <select class="form-control select2" id="course" name="course" required>
                                        <option value="0"> Choose Course </option>
                                        <?php foreach ($course as $c) { ?>

                                            <option value="<?= $c['id'] ?>"><?= $c['course'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="class">Class</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="class" id="class" placeholder="Class A/B/C" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="day">Day</label>
                                <div class="col-md-7">
                                    <select class="form-control select2" id="day" name="day" required>
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
                                <div class="col-md-7">
                                    <input type="time" class="form-control" name="time" id="time" required>
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