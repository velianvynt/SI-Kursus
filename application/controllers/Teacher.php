<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('Model_teacher');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['content']    = 'staff/dashboard';
        $data['title']      = 'Data Student';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function listClass()
    {
        $code = $this->session->userdata('code');
        $data['class'] = $this->Model_teacher->listingClass($code);
        $data['image']      = $this->Model_teacher->image($code);
        $data['content']    = 'teacher/class';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function table($id)
    {
        $data['table']      = $this->Model_teacher->table2($id);
        $data['content']    = 'teacher/table';
        $data['title']      = 'Student Data';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function listStudent()
    {
        $code = $this->session->userdata('code');
        $data['class']      = $this->Model_teacher->listingClass($code);
        $data['content']    = 'teacher/attend';
        $data['title']      = 'Attendance Data';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }


    public function listAttend($id)
    {
        $data['table2']     = $this->Model_teacher->table2($id);
        $data['table']      = $this->Model_teacher->table($id);
        $data['content']    = 'teacher/listAttend';
        $data['title']      = 'Attendance Data';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function addAttend()
    {
        $id_class   = $this->input->post('id_class');
        $date       = $this->input->post('date');
        $id         = $this->input->post('id_student');

        for ($count = 0; $count < count($id); $count++) {
            $data = array(
                'id_stud' => $id[$count],
                'attend' => $this->input->post('status' . $id[$count]),
                'date' => $date,
                'id_class' => $id_class
            );
            $insert = $this->Model_teacher->saveAttend($data);
        }

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('teacher/listAttend/' . $id_class);
        } else {
            // $this->session->set_flashdata('info', 'Data has been added');
            redirect('teacher/listAttend/' . $id_class);
        }
    }

    public function reportPdf()
    {
        $from_date  = $this->input->post('from_date');
        $to_date    = $this->input->post('to_date');
        $id_class   = $this->input->post('id_class');

        $data = array(
            'from_date' => $from_date,
            'to_date' => $to_date,
            'id_class' => $id_class
        );

        $data['report']     = $this->Model_teacher->report($data);
        $data['list']       = $this->Model_teacher->listReport($from_date, $to_date, $id_class);
        $data['class']      = $this->Model_teacher->getClass($data);
        $data['teacher']    = $this->Model_teacher->getTeacher($id_class);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Attendance Report.php";
        $this->pdf->load_view('teacher/report', $data);
    }

    public function printReportPdff($id, $class)
    {
        $data['report'] = $this->Model_teacher->printReport($id, $class);
        $data['name']   = $this->Model_teacher->getName($id);
        $data['teacher']    = $this->Model_teacher->getTeacher($class);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Attendance Report.php";
        $this->pdf->load_view('teacher/printReport', $data);
    }

    public function printReportPdf($id, $class)
    {
        $data['report'] = $this->Model_teacher->printReport($id, $class);
        $data['name']   = $this->Model_teacher->getName($id);
        $data['title']      = 'Attendance Report';
        $data['content'] = 'teacher/previewReport';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }


    public function attendReport()
    {
        $code = $this->session->userdata('code');
        $data['class']      = $this->Model_teacher->listingClass($code);
        $data['content']    = 'teacher/attendReport';
        $data['title']      = 'Attendance Report';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function listAttendReport($id)
    {
        $data['table2']     = $this->Model_teacher->table2($id);
        $data['table']      = $this->Model_teacher->table($id);
        $data['content']    = 'teacher/listAttendReport';
        $data['title']      = 'Attendance Report';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function printReport($id)
    {
        $data['report'] = $this->Model_teacher->printReport($id);
        $data['name']   = $this->Model_teacher->getName($id);
        $this->load->view('teacher/printReport', $data);
    }

    public function listScore()
    {
        $code = $this->session->userdata('code');
        $data['class']      = $this->Model_teacher->listingClass($code);
        $data['content']    = 'teacher/score';
        $data['title']      = 'Score';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function listScoreing($id)
    {
        $data['table2']     = $this->Model_teacher->tableScore($id);
        $data['table']      = $this->Model_teacher->table($id);
        $data['content']    = 'teacher/listScore';
        $data['title']      = 'Score';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function editScore($id, $id_class)
    {
        $data['score']      = $this->Model_teacher->detailScore($id, $id_class);
        $data['content']    = 'teacher/editScore';
        $data['title']      = 'Edit Score';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function editScoreProcess()
    {
        $id_class = $this->input->post('id_class');

        $data = array(
            'id_class'  => $this->input->post('id_class'),
            'id_stud'   => $this->input->post('id_stud'),
            'task1'     => $this->input->post('task1'),
            'task2'     => $this->input->post('task2'),
            'task3'     => $this->input->post('task3'),
            'test1'     => $this->input->post('test1'),
            'test2'     => $this->input->post('test2')
        );

        $where = array(
            'id'        => $this->input->post('id_class'),
            'id_class'  => $this->input->post('id_stud')
        );

        $insert = $this->Model_teacher->editScore($where, $data);

        if ($insert) {
            $this->session->set_flashdata('info', 'Failed');
            redirect('teacher/listScoreing/' . $id_class);
        } else {
            $this->session->set_flashdata('info', 'Data has been changed');
            redirect('teacher/listScoreing/' . $id_class);
        }
    }

    public function listScoreReport()
    {
        $code               = $this->session->userdata('code');
        $data['class']      = $this->Model_teacher->listingClass($code);
        $data['content']    = 'teacher/listScoreReport';
        $data['title']      = 'Score Report';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function listScoreingReport($id)
    {
        $data['table2']     = $this->Model_teacher->tableScore($id);
        $data['table']      = $this->Model_teacher->table($id);
        $data['content']    = 'teacher/listScoreReportTable';
        $data['title']      = 'Score Report';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function printScorePdf($id, $class)
    {
        $data['report']     = $this->Model_teacher->printReportScore($id, $class);
        $data['name']       = $this->Model_teacher->getName($id);
        $data['title']      = 'Attendance Report';
        $data['content']    = 'teacher/previewReportScore';
        $this->load->view('templates/tampilan_beranda_teacher', $data);
    }

    public function printReportScorePdff($id, $class)
    {
        $data['report']     = $this->Model_teacher->printReportScore($id, $class);
        $data['teacher']    = $this->Model_teacher->getTeacher($class);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Score Report.php";
        $this->pdf->load_view('teacher/printScore', $data);
    }

    public function printReportScoreAll($class)
    {
        $data['report']     = $this->Model_teacher->printReportScoreAll($class);
        $data['class']      = $this->Model_teacher->getClassScore($class);
        $data['teacher']    = $this->Model_teacher->getTeacher($class);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Score Report.php";
        $this->pdf->load_view('teacher/printScoreAll', $data);
    }
}
