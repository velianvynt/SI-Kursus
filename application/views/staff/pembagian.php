<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

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
                                <a href="<?php echo base_url(); ?>staff/table/<?= $c['id']; ?>" class="text-uppercase">(view class)</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        <?php endforeach; ?>

</section>