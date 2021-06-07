<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>


            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="POST" action="<?= base_url(); ?>staff/editClassProcess">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php foreach ($detail as $d) : ?>

                                <input type="hidden" name="id" id="id" value="<?= $d['id']; ?>">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="class">Class Name <span style="color: red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="class" id="class" value="<?= $d['class']; ?>">
                                        <?= form_error('class', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="teacher">Teacher <span style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" id="teacher" name="teacher">
                                            <option value="<?= $d['id_teacher'] ?>"><?= $d['name']; ?></option>
                                            <?php foreach ($teacher as $c) : ?>

                                                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('teacher', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="day">Day <span style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" id="day" name="day">
                                            <option value="<?= $d['day']; ?>"><?= $d['day']; ?></option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tueday">Tueday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                        <?= form_error('day', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="time">Time <span style="color: red;">*</span></label>
                                    <div class="col-md-4">
                                        <input type="time" class="form-control" name="time" id="time" value="<?= $d['time']; ?>">
                                        <?= form_error('time', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>


                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div style="margin-left: 250px;">
                        <br><br>
                        <button class="btn btn-success" name="submit" type="submit" style="margin-right: 5px;">
                            <i class="fa fa-save"></i> Save</button>

                        <a href="<?= base_url(); ?>staff/listClass" class="btn btn-danger" name="reset" type="reset">
                            <i class="fa fa-times"></i> Back</a>
                    </div>

                </form>
            </div>

        </section>
    </div>
</div>