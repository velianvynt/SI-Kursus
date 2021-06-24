<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('Model_staff');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $code = $this->session->userdata('code');
        $data['image']      = $this->Model_staff->image($code);
        $data['content']    = 'staff/dashboard';
        $data['title']      = 'Dashboard';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function listStudent()
    {
        $data['student']    = $this->Model_staff->listingStudent();
        $data['content']    = 'staff/student';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function addNewStudent()
    {
        $data['content']    = 'staff/addStudent';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda', $data);
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
            $data['content']    = 'staff/addStudent';
            $data['title']      = 'Student Data';

            $this->load->view('templates/tampilan_beranda_staff', $data);
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

            $insert = $this->Model_staff->saveNewStudent($data);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('staff/listStudent');
            } else {
                $this->session->set_flashdata('info', 'Data has been added');
                redirect('staff/listStudent');
            }
        }
    }

    public function editStudent($id)
    {
        $data['content']    = 'staff/editStudent2';
        $data['title']      = 'Edit Student Data';
        $data['student']    = $this->Model_staff->listingStudent();
        $data['detail']     = $this->Model_staff->detailStudent($id);
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function editStudentProcess()
    {
        $id             = $this->input->post('id');

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
            $data['content']    = 'staff/editStudent2';
            $data['title']      = 'Edit Student Data';
            $data['detail']     = $this->Model_staff->detailStudent($id);

            $this->load->view('templates/tampilan_beranda', $data);
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
                    $item = $this->Model_staff->detailStudent($id);
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

            $insert = $this->Model_staff->editStudent($where, $data, 'tb_siswa');

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('staff/listStudent');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('staff/listStudent');
            }
        }
    }


    public function editStudentProceerss()
    {
        $id             = $this->input->post('id');

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

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = 'student-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if ($image != null) {
            if ($this->upload->do_upload('image')) {
                $item = $this->model_staff->detailStudent($id);
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

        $insert = $this->Model_staff->editStudent($where, $data, 'tb_siswa');

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('staff/listStudent');
        } else {
            $this->session->set_flashdata('info', 'Data has been changed');
            redirect('staff/listStudent');
        }
    }

    public function deleteStudent($id)
    {
        $this->Model_staff->deleteStudent($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('staff/listStudent');
    }

    public function listCourse()
    {
        $data['schedule']   = $this->Model_staff->listingCourse();
        $data['content']    = 'staff/course';
        $data['title']      = 'Course Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }


    public function addNewCourseProcess()
    {
        $course = $this->input->post('course');

        $data = array(
            'course' => $course
        );

        $insert = $this->Model_staff->saveNewCourse($data);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('staff/listCourse');
        } else {

            redirect('staff/listCourse');
        }
    }

    public function deleteCourse($id)
    {
        $this->Model_staff->deleteCourse($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('staff/listCourse');
    }

    public function listClass()
    {
        $data['class']      = $this->Model_staff->listingClass();
        $data['teacher']    = $this->Model_staff->listingTeacher();
        $data['content']    = 'staff/class';
        $data['title']      = 'Schedule Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function reportClassPdf()
    {
        $code               = $this->session->userdata('code');
        $data['class']      = $this->Model_staff->listingClass();
        $data['staff']      = $this->Model_staff->getStaff($code);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Schedule.php";
        $this->pdf->load_view('staff/reportClass', $data);
    }

    public function addNewClassProcess()
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

        $insert = $this->Model_staff->saveClass($data, $class);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('staff/listClass');
        } else {
            redirect('staff/listClass');
        }
    }

    public function editClass($id)
    {
        $data['detail']     = $this->Model_staff->detailClass($id);
        $data['teacher']    = $this->Model_staff->listingTeacher2();
        $data['title']      = 'Edit Class Data';
        $data['content']    = 'staff/editClass';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function editClassProcess()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('teacher', 'Teacher', 'required');

        if ($this->form_validation->run() == false) {
            $data['content']    = 'staff/editClass';
            $data['title']      = 'Class Data';
            $data['detail']     = $this->Model_staff->detailClass($id);

            $this->load->view('templates/tampilan_beranda', $data);
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

            $insert = $this->Model_staff->editClass($where, $data, 'tb_jadwal');

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('staff/listClass');
            } else {
                $this->session->set_flashdata('info', 'Data has been changed');
                redirect('staff/listClass');
            }
        }
    }

    public function deleteClass($id)
    {
        $this->Model_staff->deleteClass($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('staff/listClass');
    }

    public function listPembagian()
    {
        $data['class']      = $this->Model_staff->listingClass2();
        $data['content']    = 'staff/pembagian';
        $data['title']      = 'Class Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function table($id)
    {
        $data['pembagian']  = $this->Model_staff->listingPembagian();
        $data['class']      = $this->Model_staff->listingClass();
        $data['table']      = $this->Model_staff->table($id);
        $data['class_name'] = $this->Model_staff->getClassName($id);
        $data['student']    = $this->Model_staff->listingStudent();
        $data['content']    = 'staff/table';
        $data['title']      = 'Class Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function deletePembagian($id, $class)
    {
        $this->Model_staff->deletePembagian($id, $class);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('staff/table/' . $class);
    }

    public function detailStudent()
    {
        echo $_POST['nik'];
    }

    public function addPembagianProcess()
    {
        $id = $this->input->post('id');
        $class = $this->input->post('class');

        $data = array(
            'id_student'    => $id,
            'id_class'      => $class
        );

        $insert = $this->Model_staff->savePembagianKelas($data);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('staff/table/' . $class);
        } else {
            // $this->session->set_flashdata('info', 'Data has been added');
            redirect('staff/table/' . $class);
        }
    }

    public function reportStudentPdf()
    {
        $from_date  = $this->input->post('from_date');
        $to_date    = $this->input->post('to_date');

        $data = array(
            'from_date' => $from_date,
            'to_date' => $to_date
        );

        $data['list'] = $this->Model_staff->reportStudent($data);
        $code               = $this->session->userdata('code');
        $data['staff']      = $this->Model_staff->getStaff($code);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Students.php";
        $this->pdf->load_view('staff/reportStudent', $data);
    }

    public function printPdf($id)
    {
        $data['class_name'] = $this->Model_staff->getClassName($id);
        $data['class'] = $this->Model_staff->table($id);
        $code               = $this->session->userdata('code');
        $data['staff']      = $this->Model_staff->getStaff($code);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "List Class.php";
        $this->pdf->load_view('staff/print', $data);
    }

    public function listTeacher()
    {
        $data['teacher']    = $this->Model_staff->listingTeacher();
        $data['content']    = 'staff/teacher';
        $data['title']      = 'Teacher Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function addNewTeacher()
    {
        $data['content']    = 'staff/addTeacher';
        $data['title']      = 'Teacher Data';
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function addNewTeacherProcess()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|integer|is_unique[tb_teacher.nik]', [
            'is_unique' => 'This NIK has already registered.'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_teacher.code]', [
            'is_unique' => 'This Code has already registered.'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
            'is_unique' => 'This Username has already registered.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|is_unique[tb_user.password]', [
            'is_unique' => 'This password has already registered.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['content']    = 'staff/addTeacher';
            $data['title']      = 'Teacher Data';

            $this->load->view('templates/tampilan_beranda', $data);
        } else {
            $nik        = $this->input->post('nik');
            $name       = $this->input->post('name');
            $code       = $this->input->post('code');
            $address    = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $role_id    = $this->input->post('role_id');

            $data1 = array(
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

            $insert = $this->Model_staff->saveTeacher($data1, $data2);

            if ($insert) {
                $this->session->set_flashdata('info', 'Failed');
                redirect('staff/listTeacher');
            } else {
                $this->session->set_flashdata('info', 'Data has been added');
                redirect('staff/listTeacher');
            }
        }
    }

    public function editTeacher($id)
    {
        $data['content']    = 'staff/editTeacher';
        $data['title']      = 'Edit Teacher Data';
        $data['student']    = $this->Model_staff->listingTeacher();
        $data['detail']     = $this->Model_staff->detailTeacher($id);
        $this->load->view('templates/tampilan_beranda', $data);
    }

    public function editTeacherProcess()
    {
        $id     = $this->input->post('id');
        $kode   = $this->input->post('code');

        $data = array(
            'nik'       => $this->input->post('nik'),
            'code'      => $this->input->post('code'),
            'name'      => $this->input->post('name'),
            'address'   => $this->input->post('address'),
            'phone'     => $this->input->post('phone')

        );

        $data2 = array(
            'username'  => $this->input->post('username'),
            'password'  => $this->input->post('password'),
            'role_id'   => $this->input->post('role_id'),
            'code'      => $kode
        );

        $where = array(
            'id'    => $id,
            'code'  => $kode
        );
        $insert = $this->Model_staff->editTeacher($where, $data, $data2);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('staff/listTeacher');
        } else {
            $this->session->set_flashdata('info', 'Data has been changed');
            redirect('staff/listTeacher');
        }
    }

    public function deleteTeacher($id)
    {
        $this->Model_staff->deleteTeacher($id);
        $this->session->set_flashdata('info', ' , Data has been deleted');
        redirect('staff/listTeacher');
    }
}
