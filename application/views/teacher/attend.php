<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->flashdata('info')) : ?>
        <?php endif; ?>


        <?php foreach ($class as $c) : ?>
            <div class="col-md-3">
                <div class="card text-center" style=" background: #9AABB9; padding: 20px; border-radius: 5px;">
                    <div class="card-body">
                        <h4 class="title" style="margin-bottom: 50px; color:black; "><?= $c['class'] ?></h4>
                        <a href="<?php echo base_url(); ?>teacher/listAttend/<?= $c['id']; ?>" class="btn" style="background-color: #C4D4E0; color: black">Add Attendance</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <br> <br><br><br> <br> <br>


    </div>

</section>