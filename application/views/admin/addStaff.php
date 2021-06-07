<style>
    #eye {
        position: absolute;
        left: 150px;
        top: 10px;
        font-size: 15px;
        cursor: pointer;

    }

    #eye.active {
        color: dodgerblue;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>

            <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>admin/addNewStaffProcess">
                <div class="panel-body">
                    <section class="content">
                        <div class="row">

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nik">NIK <span style="color: red;">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="nik" id="nik" value=<?= set_value('nik') ?>>
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Name <span style="color: red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <?php
                                $query = $this->db->query("SELECT max(code) AS terbesar FROM tb_staff");
                                $data = $query->result_array();
                                foreach ($data as $d) :
                                    $codebrg = $d['terbesar'];
                                endforeach;
                                $urutan = (int) substr($codebrg, 3, 3);
                                $urutan++;
                                $c = 'STF';
                                $codebrg = $c . sprintf("%03s", $urutan);
                                ?>
                                <input type="hidden" class="form-control" id="code" name='code' value="<?= $codebrg; ?>">
                                <?= form_error('code', '<small class="text-danger pl-3">', '</small>'); ?>

                                <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address <span style="color: red;">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" id="address" name="address"><?= set_value('address') ?></textarea>
                                        <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="phone">Phone Number <span style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="phone" name='phone' value="<?= set_value('phone') ?>">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-7">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="username">Username Login <span style="color: red;">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="password">Password Login <span style="color: red;">*</span></label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>"><i class="fa fa-eye" id="eye"></i>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <input type="hidden" value="1" name="role_id">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="image">Image</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" id="image" name="image">
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <div class="col-md-4" style="float: right;">
                        <br>&emsp;&emsp;&emsp;&emsp;
                        <button class="btn btn-success" style="margin-right: 5px;" name="submit" type="submit">
                            <i class="fa fa-save"></i> Save</button>

                        <a href="<?php echo base_url(); ?>admin/listStaff" class="btn btn-danger" name="reset" type="reset">
                            <i class="fa fa-times"></i> Back</a>
                    </div>




                </div>

            </form>

        </section>
    </div>
</div>

<script>
    let pwd = document.getElementById('password');
    let eye = document.getElementById('eye');

    eye.addEventListener('click', togglePass);

    function togglePass() {
        eye.classList.toggle('active');

        (pwd.type == 'password') ? pwd.type = 'text': pwd.type = 'password';
    }
</script>