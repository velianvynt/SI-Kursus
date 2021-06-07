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

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['name']; ?></td>
                        <td><?= $t['gender']; ?></td>
                        <td><?= $t['phone']; ?></td>

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
                <h5 class="modal-title" id="exampleModalLabel">Student Score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body table-responsive">

                <form method="POST" action="<?= base_url(); ?>teacher/addScore">

                    <div class="container-fluid">
                        <div class="row">

                            <input type="text" class="form-control" name="id_auto" id="id_auto" required>
                            <input type="text" value="<?= $this->uri->segment(3); ?>" name="table">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-8">
                                    <span id="name_auto"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="score1">Score 1</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="score1" id="score1" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="score2">Score 2</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="score2" id="score2" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="score3">Score 3</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="score3" id="score3" required>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>



            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a></button>

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
                            <th>Attend</th>
                            <th>Present</th>
                            <th>Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($table as $t) : ?>
                            <tr>
                                <td><?= $t['name']; ?></td>
                                <td><?= $t['attend'] ?></td>
                                <td></td>
                                <td><?= $t['address'] ?></td>
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