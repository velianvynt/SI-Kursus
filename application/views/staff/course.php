<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">
        <?= $this->session->flashdata('message'); ?>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <button class="btn btn-default btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span> </button>
        <br><br>

        <div class="row">
            <?php foreach ($schedule as $s) : ?>

                <div class="col-md-3">

                    <div class="panel-body bg-primary" style="margin-bottom: 20px; background: lightblue;">
                        <div class="widget-summary">
                            <!-- <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <img src="<?= base_url(); ?>assets/img/<?= $s['image']; ?>" style="width: 80px;" alt="">
                                </div>
                            </div> -->
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 style="line-height: 30px; margin: 0; color: black;" class="text-center"><?= $s['course']; ?></h4>
                                    <a title="Delete Data" href="<?= base_url(); ?>staff/deleteCourse/<?= $s['id']; ?>" class="tombol-hapus" style="float: right;"><i class="fa fa-trash-alt fa-2x"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            <?php endforeach; ?>

        </div>


</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url(); ?>staff/addNewCourseProcess">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="course">Course Name</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="course" id="course" required>
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