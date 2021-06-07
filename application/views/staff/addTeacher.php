<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>

            <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>staff/addNewTeacherProcess">

                <div class="panel-body">

                    <section class="content">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nik">NIK</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="nik" id="nik" value=<?= set_value('nik') ?>>
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="code">Code</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="code" name='code' value="<?= set_value('code') ?>">
                                        <?= form_error('code', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" id="address" name="address"><?= set_value('address') ?></textarea>
                                        <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="phone">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="phone" name='phone' value="<?= set_value('phone') ?>">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-7">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="username">Username Login</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="password">Password Login</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <input type="hidden" value="2" name="role_id">


                            </div>
                        </div>
                    </section>


                    <div class="col-md-4" style="float: right;">
                        <br>&emsp;&emsp;&emsp;&emsp;
                        <button class="btn btn-success" style="margin-right: 5px;" name="submit" type="submit">
                            <i class="fa fa-save"></i> Save</button>

                        <a href="<?php echo base_url(); ?>staff/listTeacher" class="btn btn-danger" name="reset" type="reset">
                            <i class="fa fa-times"></i> Back</a>
                    </div>




                </div>

            </form>

        </section>
    </div>
</div>