<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('Model_admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['content']    = 'admin/dashboard';
        $data['title']      = 'Dashboard';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function listStudent()
    {
        $data['student']    = $this->Model_admin->listingStudent();
        $data['content']    = 'admin/student';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function reportStudentPdf()
    {
        $from_date  = $this->input->post('from_date');
        $to_date    = $this->input->post('to_date');

        $data = array(
            'from_date' => $from_date,
            'to_date' => $to_date
        );

        $data['list'] = $this->Model_admin->reportStudent($data);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Students.php";
        $this->pdf->load_view('admin/reportStudent', $data);
    }

    public function addNewStudent()
    {
        $data['content']    = 'admin/addStudent';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function addNewStudentProcess()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_siswa.nik]', [
            'is_unique' => 'This NIK has already registered.'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('date_birth', 'Date', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('school', 'School', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('father_phone', 'Father phone', 'integer');
        $this->form_validation->set_rules('mother_phone', 'Mother phone', 'integer');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/addStudent';
            $data['title']      = 'Student Data';

            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik            = $this->input->post('nik');
            $name           = $this->input->post('name');
            $date_birth     = $this->input->post('date_birth');
            $gender         = $this->input->post('gender');
            $school         = $this->input->post('school');
            $address        = $this->input->post('address');
            $phone          = $this->input->post('phone');
            $email          = $this->input->post('email');
            $image          = $_FILES['image']['name'];
            $father_name    = $this->input->post('father_name');
            $father_occup   = $this->input->post('father_occup');
            $father_phone   = $this->input->post('father_phone');
            $mother_name    = $this->input->post('mother_name');
            $mother_occup   = $this->input->post('mother_occup');
            $mother_phone   = $this->input->post('mother_phone');
            $parent_add     = $this->input->post('parent_add');
            $date_register  = $this->input->post('date_register');

            if ($image = '') {
            } else {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'student-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo "Image failed to upload!";
                } else {
                    $image = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'               => $nik,
                'name'              => $name,
                'date_of_birth'     => $date_birth,
                'gender'            => $gender,
                'school'            => $school,
                'address'           => $address,
                'phone'             => $phone,
                'email'             => $email,
                'image'             => $image,
                'father_name'       => $father_name,
                'father_occup'      => $father_occup,
                'father_phone'      => $father_phone,
                'mother_name'       => $mother_name,
                'mother_occup'      => $mother_occup,
                'mother_phone'      => $mother_phone,
                'parent_add'        => $parent_add,
                'date_of_register'  => $date_register
            );

            $insert = $this->Model_admin->saveNewStudent($data);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listStudent');
            } else {
                $this->session->set_flashdata('info', 'Data has been added');
                redirect('admin/listStudent');
            }
        }
    }

    public function editStudent($id)
    {
        $data['content']    = 'admin/editStudent2';
        $data['title']      = 'Edit Student Data';
        $data['student']    = $this->Model_admin->listingStudent();
        $data['detail']     = $this->Model_admin->detailStudent($id);
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function editStudentProcess()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('date_birth', 'Date', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('school', 'School', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('father_phone', 'Father phone', 'integer');
        $this->form_validation->set_rules('mother_phone', 'Mother phone', 'integer');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/editStudent2';
            $data['title']      = 'Edit Student Data';
            $data['detail']     = $this->Model_admin->detailStudent($id);

            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik            = $this->input->post('nik');
            $name           = $this->input->post('name');
            $date_birth     = $this->input->post('date_birth');
            $gender         = $this->input->post('gender');
            $school         = $this->input->post('school');
            $address        = $this->input->post('address');
            $phone          = $this->input->post('phone');
            $email          = $this->input->post('email');
            $image          = $_FILES['image']['name'];
            $father_name    = $this->input->post('father_name');
            $father_occup   = $this->input->post('father_occup');
            $father_phone   = $this->input->post('father_phone');
            $mother_name    = $this->input->post('mother_name');
            $mother_occup   = $this->input->post('mother_occup');
            $mother_phone   = $this->input->post('mother_phone');
            $parent_add     = $this->input->post('parent_add');

            $config['upload_path']      = './assets/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2048;
            $config['file_name']        = 'student-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if ($image != null) {
                if ($this->upload->do_upload('image')) {
                    $item = $this->Model_admin->detailStudent($id);
                    if ($item[0]['image'] != null) {
                        $target_file = './assets/img/' . $item[0]['image'];
                        unlink($target_file);
                    }
                    $image = $this->upload->data('file_name');
                }

                $data = array(
                    'nik'           => $nik,
                    'name'          => $name,
                    'date_of_birth' => $date_birth,
                    'gender'        => $gender,
                    'school'        => $school,
                    'address'       => $address,
                    'phone'         => $phone,
                    'email'         => $email,
                    'image'         => $image,
                    'father_name'   => $father_name,
                    'father_occup'  => $father_occup,
                    'father_phone'  => $father_phone,
                    'mother_name'   => $mother_name,
                    'mother_occup'  => $mother_occup,
                    'mother_phone'  => $mother_phone,
                    'parent_add'    => $parent_add
                );
            } else {
                $data = array(
                    'nik'           => $nik,
                    'name'          => $name,
                    'date_of_birth' => $date_birth,
                    'gender'        => $gender,
                    'school'        => $school,
                    'address'       => $address,
                    'phone'         => $phone,
                    'email'         => $email,
                    'father_name'   => $father_name,
                    'father_occup'  => $father_occup,
                    'father_phone'  => $father_phone,
                    'mother_name'   => $mother_name,
                    'mother_occup'  => $mother_occup,
                    'mother_phone'  => $mother_phone,
                    'parent_add'    => $parent_add
                );
            }

            $where = array(
                'id' => $id
            );

            $insert = $this->Model_admin->editStudent($where, $data, 'tb_siswa');

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listStudent');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('admin/listStudent');
            }
        }
    }

    public function deleteStudent($id)
    {
        $this->Model_admin->deleteStudent($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('admin/listStudent');
    }

    public function listClass()
    {
        $data['class']      = $this->Model_admin->listingClass();
        $data['content']    = 'admin/class';
        $data['title']      = 'Class Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function listTableClass($id)
    {
        $data['pembagian']  = $this->Model_admin->listingTableClass();
        $data['class']      = $this->Model_admin->listingClass();
        $data['table']      = $this->Model_admin->tableClass($id);
        $data['class_name'] = $this->Model_admin->getClassName($id);
        $data['student']    = $this->Model_admin->listingStudent();
        $data['content']    = 'admin/listClass';
        $data['title']      = 'Class Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function addPembagianProcess()
    {
        $id     = $this->input->post('id');
        $class  = $this->input->post('class');

        $data = array(
            'id_student'    => $id,
            'id_class'      => $class
        );

        $insert = $this->Model_admin->savePembagianKelas($data);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('admin/listTableClass/' . $class);
        } else {
            // $this->session->set_flashdata('info', 'Data has been added');
            redirect('admin/listTableClass/' . $class);
        }
    }

    public function deleteListTableClass($id, $class)
    {
        $this->Model_admin->deletePembagian($id, $data);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('admin/listTableClass/' . $class);
    }

    public function reportClassPdf($id)
    {
        $data['class_name'] = $this->Model_admin->getClassName($id);
        $data['class']      = $this->Model_admin->tableClass($id);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Students.php";
        $this->pdf->load_view('admin/reportClass', $data);
    }

    public function reportClass($id)
    {
        $data['class_name'] = $this->Model_admin->getClassName($id);
        $data['class']      = $this->Model_admin->tableClass($id);
        $this->load->view('admin/reportClass', $data);
    }

    public function listStaff()
    {
        $data['staff']      = $this->Model_admin->listingStaff();
        $data['content']    = 'admin/staff';
        $data['title']      = 'Staff Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function addNewStaff()
    {
        $data['content']    = 'admin/addStaff';
        $data['title']      = 'Staff Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    // public function addNewStaffProcess()
    // {
    //     $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_staff.nik]', [
    //         'is_unique' => 'This NIK has already registered.'
    //     ]);
    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_staff.code]', [
    //         'is_unique' => 'This Code has already registered.'
    //     ]);
    //     $this->form_validation->set_rules('address', 'Address', 'required');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
    //     $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
    //         'is_unique' => 'This Username has already registered.'
    //     ]);
    //     $this->form_validation->set_rules('password', 'Password', 'required');
    //     $this->form_validation->set_rules('image', 'Image', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $data['content'] = 'admin/addStaff';
    //         $data['title']    = 'Staff Data';

    //         $this->load->view('templates/tampilan_beranda_admin', $data);
    //     } else {
    //         $nik        = $this->input->post('nik');
    //         $name       = $this->input->post('name');
    //         $code       = $this->input->post('code');
    //         $address    = $this->input->post('address');
    //         $phone      = $this->input->post('phone');
    //         $username   = $this->input->post('username');
    //         $password   = $this->input->post('password');
    //         $role_id    = $this->input->post('role_id');

    //         $data1 = array(
    //             'nik'       => $nik,
    //             'name'      => $name,
    //             'code'      => $code,
    //             'address'   => $address,
    //             'phone'     => $phone
    //         );

    //         $data2 = array(
    //             'username'  => $username,
    //             'password'  => $password,
    //             'role_id'   => $role_id,
    //             'code'      => $code
    //         );

    //         $insert = $this->Model_admin->saveStaff($data1, $data2);


    //         if ($insert) {
    //             $this->session->set_flashdata('info', 'Failed');
    //             redirect('admin/listStaff');
    //         } else {
    //             $this->session->set_flashdata('info', 'Data has been added');
    //             redirect('admin/listStaff');
    //         }
    //     }
    // }

    public function addNewStaffProcess()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_staff.nik]', [
            'is_unique' => 'This NIK has already registered.'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_staff.code]', [
            'is_unique' => 'This Code has already registered.'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
            'is_unique' => 'This Username has already registered.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/addStaff';
            $data['title']      = 'Staff Data';

            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik        = $this->input->post('nik');
            $name       = $this->input->post('name');
            $code       = $this->input->post('code');
            $address    = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $role_id    = $this->input->post('role_id');
            $image      = $_FILES['image']['name'];

            if ($image = '') {
            } else {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'staff-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo "Image failed to upload!";
                } else {
                    $image = $this->upload->data('file_name');
                }
            }

            $data1 = array(
                'nik'       => $nik,
                'name'      => $name,
                'code'      => $code,
                'address'   => $address,
                'phone'     => $phone,
                'image'     => $image
            );

            $data2 = array(
                'username'  => $username,
                'password'  => $password,
                'role_id'   => $role_id,
                'code'      => $code
            );

            $insert = $this->Model_admin->saveStaff($data1, $data2);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listStaff');
            } else {
                $this->session->set_flashdata('info', 'Data has been added');
                redirect('admin/listStaff');
            }
        }
    }

    public function editStaff($id)
    {
        $data['content']    = 'admin/editStaff';
        $data['title']      = 'Edit Staff Data';
        $data['student']    = $this->Model_admin->listingStaff();
        $data['detail']     = $this->Model_admin->detailStaff($id);
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    // public function editStaffProcess()
    // {
    //     $id     = $this->input->post('id');
    //     $kode   = $this->input->post('code');

    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('address', 'Address', 'required');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $data['content']    = 'admin/editStaff';
    //         $data['title']      = 'Staff Data';
    //         $data['detail']     = $this->Model_admin->detailStaff($id);

    //         $this->load->view('templates/tampilan_beranda_admin', $data);
    //     } else {

    //         $data = array(
    //             'nik'       => $this->input->post('nik'),
    //             'code'      => $this->input->post('code'),
    //             'name'      => $this->input->post('name'),
    //             'address'   => $this->input->post('address'),
    //             'phone'     => $this->input->post('phone')
    //         );

    //         $data2 = array(
    //             'username'  => $this->input->post('username'),
    //             'password'  => $this->input->post('password'),
    //             'role_id'   => $this->input->post('role_id'),
    //             'code'      => $kode
    //         );

    //         $where = array(
    //             'id'    => $id,
    //             'code'  => $kode
    //         );
    //         $insert = $this->Model_admin->editStaff($where, $data, $data2);

    //         if ($insert) {
    //             $this->session->set_flashdata('info', 'Failed');
    //             redirect('admin/listStaff');
    //         } else {
    //             $this->session->set_flashdata('info', 'Data has been changed');
    //             redirect('admin/listStaff');
    //         }
    //     }
    // }

    public function editStaffProcess()
    {
        $id     = $this->input->post('id');
        $kode   = $this->input->post('code');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/editStaff';
            $data['title']      = 'Edit Staff Data';
            $data['detail']     = $this->Model_admin->detailStaff($kode);
            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik        = $this->input->post('nik');
            $name       = $this->input->post('name');
            $code       = $this->input->post('code');
            $address    = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $role_id    = $this->input->post('role_id');
            $image      = $_FILES['image']['name'];

            $config['upload_path']      = './assets/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2048;
            $config['file_name']        = 'staff-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if ($image != null) {
                if ($this->upload->do_upload('image')) {
                    $item = $this->Model_admin->detailStaff($id);
                    if ($item[0]['image'] != null) {
                        $target_file = './assets/img/' . $item[0]['image'];
                        unlink($target_file);
                    }
                    $image = $this->upload->data('file_name');
                }

                $data = array(
                    'nik'       => $nik,
                    'name'      => $name,
                    'code'      => $code,
                    'address'   => $address,
                    'phone'     => $phone,
                    'image'     => $image
                );

                $data2 = array(
                    'username'  => $username,
                    'password'  => $password,
                    'role_id'   => $role_id,
                    'code'      => $code
                );
            } else {
                $data = array(
                    'nik'       => $nik,
                    'name'      => $name,
                    'code'      => $code,
                    'address'   => $address,
                    'phone'     => $phone
                );

                $data2 = array(
                    'username'  => $username,
                    'password'  => $password,
                    'role_id'   => $role_id,
                    'code'      => $code
                );
            }

            $where = array(
                'id'    => $id,
                'code'  => $kode
            );

            $insert = $this->Model_admin->editStaff($where, $data, $data2);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listStaff');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('admin/listStaff');
            }
        }
    }

    public function deleteStaff($code, $id)
    {
        $this->Model_admin->deleteStaff($code, $id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('admin/listStaff');
    }

    public function reportStaffPdf()
    {
        $data['staff'] = $this->Model_admin->reportStaff();

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Students.php";
        $this->pdf->load_view('admin/reportStaff', $data);
    }

    public function listTeacher()
    {
        $data['teacher']    = $this->Model_admin->listingTeacher();
        $data['content']    = 'admin/teacher';
        $data['title']      = 'Teacher Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function reportTeacherPdf()
    {
        $data['teacher'] = $this->Model_admin->reportTeacher();

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Teacher.php";
        $this->pdf->load_view('admin/reportTeacher', $data);
    }

    public function reportTeacher()
    {
        $data['teacher'] = $this->Model_admin->reportTeacher();
        $this->load->view('admin/reportTeacher', $data);
    }

    public function addNewTeacher()
    {
        $data['content']    = 'admin/addTeacher';
        $data['title']      = 'Teacher Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    // public function addNewTeacherProcess()
    // {
    //     $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_teacher.nik]', [
    //         'is_unique' => 'This NIK has already registered.'
    //     ]);
    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('address', 'Address', 'required');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
    //     $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
    //         'is_unique' => 'This Username has already registered.'
    //     ]);
    //     $this->form_validation->set_rules('password', 'Password', 'required|is_unique[tb_user.password]', [
    //         'is_unique' => 'This password has already registered.'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $data['content']    = 'admin/addTeacher';
    //         $data['title']      = 'Teacher Data';

    //         $this->load->view('templates/tampilan_beranda_admin', $data);
    //     } else {
    //         $nik        = $this->input->post('nik');
    //         $name       = $this->input->post('name');
    //         $code       = $this->input->post('code');
    //         $address    = $this->input->post('address');
    //         $phone      = $this->input->post('phone');
    //         $username   = $this->input->post('username');
    //         $password   = $this->input->post('password');
    //         $role_id    = $this->input->post('role_id');

    //         $data1 = array(
    //             'nik'       => $nik,
    //             'name'      => $name,
    //             'code'      => $code,
    //             'address'   => $address,
    //             'phone'     => $phone
    //         );

    //         $data2 = array(
    //             'username'  => $username,
    //             'password'  => $password,
    //             'role_id'   => $role_id,
    //             'code'      => $code
    //         );

    //         $insert = $this->Model_admin->saveTeacher($data1, $data2);

    //         if ($insert) {
    //             $this->session->set_flashdata('info', 'Failed');
    //             redirect('admin/listTeacher');
    //         } else {
    //             $this->session->set_flashdata('info', 'Data has been added');
    //             redirect('admin/listTeacher');
    //         }
    //     }
    // }

    public function addNewTeacherProcess()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_staff.nik]', [
            'is_unique' => 'This NIK has already registered.'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_staff.code]', [
            'is_unique' => 'This Code has already registered.'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
            'is_unique' => 'This Username has already registered.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/addTeacher';
            $data['title']      = 'Staff Data';
            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik        = $this->input->post('nik');
            $name       = $this->input->post('name');
            $code       = $this->input->post('code');
            $address    = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $role_id    = $this->input->post('role_id');
            $image      = $_FILES['image']['name'];

            if ($image = '') {
            } else {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'teacher-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo "Image failed to upload!";
                } else {
                    $image = $this->upload->data('file_name');
                }
            }

            $data1 = array(
                'nik'       => $nik,
                'name'      => $name,
                'code'      => $code,
                'address'   => $address,
                'phone'     => $phone,
                'image'     => $image
            );

            $data2 = array(
                'username'  => $username,
                'password'  => $password,
                'role_id'   => $role_id,
                'code'      => $code
            );

            $insert = $this->Model_admin->saveTeacher($data1, $data2);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listTeacher');
            } else {
                $this->session->set_flashdata('info', 'Data has been added');
                redirect('admin/listTeacher');
            }
        }
    }

    public function editTeacher($id)
    {
        $data['content']    = 'admin/editTeacher';
        $data['title']      = 'Edit Teacher Data';
        $data['student']    = $this->Model_admin->listingTeacher();
        $data['detail']     = $this->Model_admin->detailTeacher($id);
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    // public function editTeacherProcess()
    // {
    //     $id     = $this->input->post('id');
    //     $kode   = $this->input->post('code');

    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('address', 'Address', 'required');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $data['content']    = 'admin/editTeacher';
    //         $data['title']      = 'Edit Teacher Data';
    //         $data['detail']     = $this->Model_admin->detailTeacher($id);

    //         $this->load->view('templates/tampilan_beranda_admin', $data);
    //     } else {
    //         $data = array(
    //             'nik'       => $this->input->post('nik'),
    //             'code'      => $this->input->post('code'),
    //             'name'      => $this->input->post('name'),
    //             'address'   => $this->input->post('address'),
    //             'phone'     => $this->input->post('phone')
    //         );

    //         $data2 = array(
    //             'username'  => $this->input->post('username'),
    //             'password'  => $this->input->post('password'),
    //             'role_id'   => $this->input->post('role_id'),
    //             'code'      => $kode
    //         );

    //         $where = array(
    //             'id'    => $id,
    //             'code'  => $kode
    //         );
    //         $insert = $this->Model_admin->editTeacher($where, $data, $data2);

    //         if ($insert) {
    //             $this->session->set_flashdata('info', 'Failed');
    //             redirect('admin/listTeacher');
    //         } else {
    //             $this->session->set_flashdata('info', 'Data has been changed');
    //             redirect('admin/listTeacher');
    //         }
    //     }
    // }

    public function editTeacherProcess()
    {
        $id     = $this->input->post('id');
        $kode   = $this->input->post('code');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/editTeacher';
            $data['title']      = 'Edit Teacher Data';
            $data['detail']     = $this->Model_admin->detailTeacher($kode);
            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {
            $nik        = $this->input->post('nik');
            $name       = $this->input->post('name');
            $code       = $this->input->post('code');
            $address    = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $role_id    = $this->input->post('role_id');
            $image      = $_FILES['image']['name'];

            $config['upload_path']      = './assets/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2048;
            $config['file_name']        = 'teacher-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if ($image != null) {
                if ($this->upload->do_upload('image')) {
                    $item = $this->Model_admin->detailStaff($id);
                    if ($item[0]['image'] != null) {
                        $target_file = './assets/img/' . $item[0]['image'];
                        unlink($target_file);
                    }
                    $image = $this->upload->data('file_name');
                }

                $data = array(
                    'nik'       => $nik,
                    'name'      => $name,
                    'code'      => $code,
                    'address'   => $address,
                    'phone'     => $phone,
                    'image'     => $image
                );

                $data2 = array(
                    'username'  => $username,
                    'password'  => $password,
                    'role_id'   => $role_id,
                    'code'      => $code
                );
            } else {
                $data = array(
                    'nik'       => $nik,
                    'name'      => $name,
                    'code'      => $code,
                    'address'   => $address,
                    'phone'     => $phone
                );

                $data2 = array(
                    'username'  => $username,
                    'password'  => $password,
                    'role_id'   => $role_id,
                    'code'      => $code
                );
            }

            $where = array(
                'id'    => $id,
                'code'  => $kode
            );

            $insert = $this->Model_admin->editTeacher($where, $data, $data2);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listTeacher');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('admin/listTeacher');
            }
        }
    }

    public function deleteTeacher($code, $id)
    {
        $this->Model_admin->deleteTeacher($code, $id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('admin/listTeacher');
    }

    public function listSchedule()
    {
        $data['class']      = $this->Model_admin->listingSchedule();
        $data['teacher']    = $this->Model_admin->listingTeacher();
        $data['content']    = 'admin/schedule';
        $data['title']      = 'Schedule Data';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function addNewScheduleProcess()
    {
        $class = $this->input->post('class');
        $day = $this->input->post('day');
        $time = $this->input->post('time');
        $teacher = $this->input->post('teacher');

        $data = array(
            'class'         => $class,
            'day'           => $day,
            'time'          => $time,
            'id_teacher'    => $teacher
        );

        $insert = $this->Model_admin->saveSchedule($data, $class);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('admin/listSchedule');
        } else {
            redirect('admin/listSchedule');
        }
    }

    public function reportSchedulePdf()
    {
        $data['class'] = $this->Model_admin->listingSchedule();

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Schedule.php";
        $this->pdf->load_view('admin/reportSchedule', $data);
    }

    public function editSchedule($id)
    {
        $data['detail']     = $this->Model_admin->detailSchedule($id);
        $data['teacher']    = $this->Model_admin->listingTeacher2();
        $data['title']      = 'Edit Schedule Data';
        $data['content']    = 'admin/editSchedule';
        $this->load->view('templates/tampilan_beranda_admin', $data);
    }

    public function editScheduleProcess()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('teacher', 'Teacher', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'admin/editClass';
            $data['title']      = 'Schedule Data';
            $data['detail']     = $this->Model_admin->detailSchedule($id);

            $this->load->view('templates/tampilan_beranda_admin', $data);
        } else {

            $data = array(
                'class'         => $this->input->post('class'),
                'day'           => $this->input->post('day'),
                'time'          => $this->input->post('time'),
                'id_teacher'    => $this->input->post('teacher'),
            );

            $where = array(
                'id' => $id
            );

            $insert = $this->Model_admin->editSchedule($where, $data, 'tb_jadwal');

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('admin/listSchedule');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('admin/listSchedule');
            }
        }
    }

    public function deleteSchedule($id)
    {
        $this->Model_admin->deleteSchedule($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('admin/listSchedule');
    }
}
