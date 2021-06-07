<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
            </header>


            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>teacher/editScoreProcess">

                    <section class="content">
                        <div class="row">
                            <div class="col-lg">
                                <?php foreach ($score as $s) : ?>
                                    <input type="hidden" value="<?= $s['id_class']; ?>" name="id_class">
                                    <input type="hidden" value="<?= $s['id_stud']; ?>" name="id_stud">


                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="nik">Name</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="name" id="name" value=<?= $s['name']; ?> readonly>
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="vol">Task 1</label>
                                        <div class="row">
                                            <div class="col-md-5">

                                                <input type="range" min="0" max="100" value="<?= $s['task1'] ?>" id="vol" oninput="task(value)" style="padding-top: 20px;" value=<?= $s['task1']; ?>>
                                            </div>
                                            <div class="col-md-1">
                                                <input for="vol" id="task1" name="task1" class="form-control" value="<?= $s['task1'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label class="col-md-1 control-label" for="vol">Task 2</label>
                                        <div class="row">
                                            <div class="col-md-5">

                                                <input type="range" min="0" max="100" value="<?= $s['task2'] ?>" id="vol" oninput="taskk(value)" style="padding-top: 20px;">
                                            </div>
                                            <div class="col-md-1">
                                                <input for="vol" id="task2" name="task2" class="form-control" value="<?= $s['task2'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="vol">Task 3</label>
                                        <div class="row">
                                            <div class="col-md-5">

                                                <input type="range" min="0" max="100" value="<?= $s['task3'] ?>" id="vol" oninput="taskkk(value)" style="padding-top: 20px;">
                                            </div>
                                            <div class="col-md-1">
                                                <input for="vol" id="task3" name="task3" class="form-control" value="<?= $s['task3'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="vol">Test 1</label>
                                        <div class="row">
                                            <div class="col-md-5">

                                                <input type="range" min="0" max="100" value="<?= $s['test1'] ?>" id="vol" oninput="test(value)" style="padding-top: 20px;">
                                            </div>
                                            <div class="col-md-1">
                                                <input for="vol" id="test1" name="test1" class="form-control" value="<?= $s['test1'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="vol">Test 2</label>
                                        <div class="row">
                                            <div class="col-md-5">

                                                <input type="range" min="0" max="100" value="<?= $s['test2'] ?>" id="vol" oninput="testt(value)" style="padding-top: 20px;">
                                            </div>
                                            <div class="col-md-1">
                                                <input for="vol" id="test2" name="test2" class="form-control" value="<?= $s['test2'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </section>


                    <div class="col-md-4" style="float: right;">
                        <br>&emsp;&emsp;&emsp;&emsp;
                        <button class="btn btn-success" style="margin-right: 5px;" name="submit" type="submit">
                            <i class="fa fa-save"></i> Save</button>

                        <a href="<?php echo base_url(); ?>teacher/listScore" class="btn btn-danger" name="reset" type="reset">
                            <i class="fa fa-times"></i> Back</a>
                    </div>




                </form>
            </div>


        </section>
    </div>
</div>


<script>
    function task(vol) {
        document.querySelector('#task1').value = vol;
    }

    function taskk(vol) {
        document.querySelector('#task2').value = vol;
    }

    function taskkk(vol) {
        document.querySelector('#task3').value = vol;
    }

    function test(vol) {
        document.querySelector('#test1').value = vol;
    }

    function testt(vol) {
        document.querySelector('#test2').value = vol;
    }
</script>