<section class="panel panel-horizontal">
    <header class="panel-heading bg-white">
        <div class="panel-heading-icon mt-sm" style="background-color: transparent; margin-bottom: 7px;">
            <?php foreach ($image as $img) : ?>
                <img src="<?= base_url('assets/img/') . $img['image'] ?>" style="width: 110%; border-radius: 50%;">
            <?php endforeach ?>
        </div>
    </header>
    <div class="panel-body">
        <h3 class="text-semibold mt-sm">Welcome Staff!</h3>
        <p>Lantern House Course Information System</p>
    </div>
</section>

<div class="row">
    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-primary" style="background-color: #A0C1B8;">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Student</h4>
                            <div class="info">
                                <strong class="amount">
                                    <?php $query = $this->db->query("select * from tb_siswa");
                                    echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>staff/listSudent" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-success" style="background-color: #709FB0">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Schedule</h4>
                            <div class="info">
                                <strong class="amount"><?php $query = $this->db->query("select * from tb_jadwal");
                                                        echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>staff/listSchedule" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <div class="panel-body bg-secondary" style="background-color: #726A95;">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Active Student</h4>
                            <div class="info">
                                <strong class="amount"><?php $query = $this->db->query("select distinct(id_student) from tb_pembagian_kelas");
                                                        echo $query->num_rows(); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url(); ?>staff/listTeacher" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


</div>