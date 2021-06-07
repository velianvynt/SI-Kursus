<section class="panel panel-horizontal">
    <header class="panel-heading bg-white">
        <div class="panel-heading-icon" style="background-color: transparent; margin-bottom: 7px;">
            <!-- <i class="fa fa-user"></i> -->
            <?php foreach ($image as $img) : ?>
                <img src="<?= base_url('assets/img/') . $img['image'] ?>" style="width: 110%; border-radius: 50%;">
            <?php endforeach ?>
        </div>
    </header>
    <div class="panel-body">
        <h3 class="text-semibold mt-sm">Welcome Teacher!</h3>
        <p>Lantern House Course Information System</p>
    </div>
</section>

<div class="row">
    <?php foreach ($class as $c) : ?>
        <div class="col-md-4 mb-3">

            <div class="panel-body bg-primary" style="margin-bottom: 10px; background: #709FB0;">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <div class="info">
                                <strong class="amount">

                                    <?php $id = $c['id'] ?>
                                    <?php $query = $this->db->query("select * from tb_pembagian_kelas where id_class = $id ");
                                    echo $query->num_rows(); ?>
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title"><?= $c['class']; ?></h4>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>teacher/table/<?= $c['id']; ?>" class="text-uppercase">(view class)</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>