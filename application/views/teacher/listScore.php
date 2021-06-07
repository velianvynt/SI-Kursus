<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
        <?= $this->session->flashdata('message'); ?>

        <?php $class =  $this->uri->segment(3); ?>

        <a href="<?= base_url('teacher/printReportScoreAll/') . $class ?>" class="btn btn-default btn-warning" target="_blank">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Task 1</th>
                    <th>Task 2</th>
                    <th>Task 3</th>
                    <th>Test 1</th>
                    <th>Test 2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table2 as $t) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['name']; ?></td>
                        <td><?= $t['task1'] ?></td>
                        <td><?= $t['task2'] ?></td>
                        <td><?= $t['task3'] ?></td>
                        <td><?= $t['test1'] ?></td>
                        <td><?= $t['test2'] ?></td>
                        <td>
                            <a title="Edit" href="<?= base_url(); ?>teacher/editScore/<?= $t['id_stud']; ?>/<?= $class; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>