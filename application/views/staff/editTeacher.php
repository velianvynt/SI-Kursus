<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>

            <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>staff/editTeacherProcess">

                <div class="panel-body">

                    <section class="content">
                        <div class="row">
                            <div class="col-lg-5">
                                <?php foreach ($detail as $d) : ?>
                                    <input type="hidden" value="<?= $d['id']; ?>" name="id">
                                    <input type="hidden" value="<?= $d['code']; ?>" name="code">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="nik">NIK</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="nik" id="nik" value="<?= $d['nik']; ?>" readonly>
                                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" id="name" value="<?= $d['name']; ?>" required>
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="col-md-4 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="3" id="address" name="address" required><?= $d['address']; ?></textarea>
                                            <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="phone">Phone Number</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="phone" name='phone' value="<?= $d['phone']; ?>" required>
                                            <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>


                            </div>

                            <div class="col-lg-7">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="username">Username Login</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $d['username']; ?>" required>
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="password">Password Login</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="password" id="password" value="<?= $d['password']; ?>" required>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <input type="hidden" value="2" name="role_id">



                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>


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