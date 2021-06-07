<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <?= $this->session->flashdata('message'); ?>

        <a href="#" class="btn btn-default btn-success" style="margin-right: 5px;" data-toggle="modal" data-target="#modalList">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a href="#" class="btn btn-default btn-warning" data-toggle="modal" data-target="#modalReport">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Attendance</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['name']; ?></td>

                        <td>
                            <?php if ($t['attend'] == 'present') : ?>
                                <span class="badge bg-success">Present</span>
                            <?php elseif ($t['attend'] == 'absent') : ?>
                                <span class="badge bg-danger">Absent</span>
                            <?php endif; ?>

                        </td>
                        <td><?= $t['date']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="modalList">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListLabel">Add Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">


                <form action="<?= base_url() ?>teacher/addAttend" method="POST">

                    <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id_class">

                    <label class="col-md-2" for="date">Date</label>
                    <div class="col-md-5" style="margin-bottom: 40px;">
                        <input type="date" class="form-control" id="date" name='date' value="<?= date("Y-m-d"); ?>" readonly>
                    </div>

                    <table class="table table-bordered table-striped mb-none" id="">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($table2 as $t) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <input type="hidden" value="<?= $t['id_student']; ?>" name="id_student[]">
                                    <td><?= $t['name']; ?></td>
                                    <td>
                                        <input class="form-check-input col-sm-2" type="radio" name="status<?= $t['id_student']; ?>" value="present" required>
                                    </td>
                                    <td>
                                        <input class="form-check-input col-sm-4" type="radio" name="status<?= $t['id_student']; ?>" value="absent">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</a></button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Report-->
<div class="modal fade" id="modalReport">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListLabel">Make Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="<?= base_url() ?>teacher/reportPdf" method="POST">

                <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id_class">

                <div class="form-group" style="margin-top: 10px;">
                    <label for="from_date" class="col-md-3 control-label">From Date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="to_date" class="col-md-3 control-label">To Date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" id="to_date" name="to_date" required>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</a></button>
                    <button type="submit" class="btn btn-success" target="_blank">Create Report</button>
                </div>
            </form>

        </div>
    </div>
</div>