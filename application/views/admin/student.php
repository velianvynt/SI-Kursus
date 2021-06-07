<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
    </header>

    <div class="panel-body">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>

        <a href="<?= base_url(); ?>admin/addNewStudent" class="btn btn-default btn-success" style="margin-right: 5px;">
            <i class="glyphicon glyphicon-plus"></i><span> Add</span>
        </a>
        <a href="#" class="btn btn-default btn-warning" data-toggle="modal" data-target="#modalReport">
            <i class="fas fa-print"></i><span> Report</span>
        </a>
        <br><br>

        <table class="table table-bordered table-striped mb-none table_class">
            <thead>
                <tr>
                    <th style="text-align: center; line-height: 40px;">No</th>
                    <th style="text-align: center; line-height: 40px;">NIK</th>
                    <th style="text-align: center; line-height: 40px;">Name</th>
                    <th style="text-align: center; line-height: 40px;">Gender</th>
                    <th style="text-align: center; line-height: 40px;">Phone Number</th>
                    <th style="text-align: center; line-height: 40px;">Image</th>
                    <th style="text-align: center; ">Register Date</th>
                    <th style="text-align: center; line-height: 40px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($student as $s) : ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++ ?></td>
                        <td><?= $s['nik']; ?></td>
                        <td><?= $s['name']; ?></td>
                        <td style="text-align: center;"><?= $s['gender']; ?></td>
                        <td><?= $s['phone']; ?></td>
                        <td style="text-align: center;"><img src="<?= base_url('assets/img/') . $s['image'] ?>" style="width: 60px; border-radius: 100%;"></td>
                        <td style="text-align: center;"><?= $s['date_of_register']; ?></td>
                        <td>
                            <a title="Detail Data" class="btn btn-info" id="detail_student" data-toggle="modal" data-target="#exampleModal" data-date="<?= $s['date_of_birth']; ?>" data-school="<?= $s['school']; ?>" data-address="<?= $s['address']; ?>" data-image="<?= $s['image']; ?>" data-father_name="<?= $s['father_name']; ?>" data-father_occup="<?= $s['father_occup']; ?>" data-father_phone="<?= $s['father_phone']; ?>" data-mother_name="<?= $s['mother_name']; ?>" data-mother_occup="<?= $s['mother_occup']; ?>" data-mother_phone="<?= $s['mother_phone']; ?>" data-parent="<?= $s['parent_add']; ?>">
                                <i class="fa fa-search"></i>
                            </a>
                            <a title="Edit Data" href="<?= base_url(); ?>admin/editStudent/<?= $s['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="Hapus Data" href="<?= base_url(); ?>admin/deleteStudent/<?= $s['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img id="image_auto" style="width: 100%;">
                        </div>
                        <div class="col-md-8">

                            <table class="table table-bordered no-margin">
                                <tr>
                                    <th style="width: 50%;">Birth Date</th>
                                    <td><span id="date_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>School</th>
                                    <td><span id="school_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><span id="address_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Father Name</th>
                                    <td><span id="fatherN_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Father Occupation</th>
                                    <td><span id="fatherO_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Father Phone</th>
                                    <td><span id="fatherP_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Mother Name</th>
                                    <td><span id="motherN_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Mother Occupation</th>
                                    <td><span id="motherO_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Mother Phone</th>
                                    <td><span id="motherP_auto"></span></td>
                                </tr>
                                <tr>
                                    <th>Parent Address</th>
                                    <td><span id="parent_auto"></span></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal Report-->
<div class="modal fade" id="modalReport">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListLabel">Make Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="<?= base_url() ?>admin/reportStudentPdf" method="POST">

                <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id_class">

                <div class="form-group" style="margin-top: 10px;">
                    <label for="from_date" class="col-md-4 control-label">From Register Date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="to_date" class="col-md-4 control-label">To Register Date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" id="to_date" name="to_date" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</a></button>
                    <button type="submit" class="btn btn-success" target="_blank">Create Report</button>
                </div>
            </form>

        </div>
    </div>
</div>