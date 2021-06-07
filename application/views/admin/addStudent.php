<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>

            <div class="panel-body">

                <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>admin/addNewStudentProcess">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nik">NIK <span style="color: red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nik" id="nik" value="<?= set_value('nik'); ?>">
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name <span style="color: red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name='name' value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="date_birth">Birth Date <span style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="date_birth" name='date_birth' value="<?= set_value('date_birth'); ?>">
                                        <?= form_error('date_birth', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Gender <span style="color: red;">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input col-sm-2" type="radio" name="gender" id="male" value="M">
                                            <label class="form-check-label col-sm-2" for="male">
                                                Male
                                            </label>
                                            <input class="form-check-input col-sm-4" type="radio" name="gender" id="female" value="F">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="school">School / University <span style="color: red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="school" name='school' value="<?= set_value('school'); ?>">
                                        <?= form_error('school', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address <span style="color: red;">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="4" id="address" name="address"><?= set_value('address'); ?></textarea>
                                        <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-md-4 control-label">Phone Number <span style="color: red;">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone'); ?>">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Email <span style="color: red;">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="image">Image</label>
                                    <div class="col-md-7">
                                        <input type="file" class="form-control" id="image" name="image">
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="content-header" style="margin-top: 40px;">
                        <ol class="breadcrumb" style="color: black; background-color:#eee;">
                            <li>Parent Data</li>
                        </ol>
                    </section>

                    <section class="content">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="father_name">Father Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="father_name" id="father_name" value="<?= set_value('father_name'); ?>">
                                        <?= form_error('father_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="father_occup">Father Occupation</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="father_occup" id="father_occup" value="<?= set_value('father_occup'); ?>">
                                        <?= form_error('father_occup', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="father_phone">Father Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="father_phone" id="father_phone" value="<?= set_value('father_phone'); ?>">
                                        <?= form_error('father_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="mother_name">Mother Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?= set_value('mother_name'); ?>">
                                        <?= form_error('mother_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="mother_occup">Mother Occupation</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mother_occup" id="mother_occup" value="<?= set_value('mother_occup'); ?>">
                                        <?= form_error('mother_occup', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="mother_phone">Mother Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mother_phone" id="mother_phone" value="<?= set_value('mother_phone'); ?>">
                                        <?= form_error('mother_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-md-5 control-label">Parent Address</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="4" id="parent_add" name="parent_add"><?= set_value('parent_add'); ?></textarea>
                                        <?= form_error('parent_add', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" id="date_register" name='date_register' value="<?= date("Y-m-d"); ?>">
                            </div>
                        </div>
                    </section>

                    <div class="form-group">
                        <div class="col-sm-4" style="float: right;">
                            <br><br>
                            &emsp;&emsp;&emsp;&emsp;&emsp;
                            <button class="btn btn-success" name="submit" type="submit" style="margin-right: 5px;">
                                <i class="fa fa-save"></i> Save</button>

                            <a href="<?php echo base_url(); ?>admin/listStudent" class="btn btn-danger" name="reset" type="reset">
                                <i class="fa fa-times"></i> Back</a>
                        </div>
                    </div>

            </div>
            </form>
        </section>

    </div>
</div>