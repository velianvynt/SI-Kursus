<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_teacher extends CI_Model
{
    public function image($code)
    {
        $query = $this->db->select('image')
            ->join('tb_user', 'tb_user.code = tb_teacher.code')
            ->where('tb_teacher.code', $code);
        return $this->db->get('tb_teacher')->result_array();
    }

    public function listingStudent($code)
    {

        $this->db->select('tb_siswa.name, tb_siswa.gender, tb_siswa.phone, tb_siswa.id')
            ->join('tb_pembagian_kelas', 'tb_pembagian_kelas.id_student = tb_siswa.id')
            ->join('tb_teacher', 'tb_teacher.id_class = tb_pembagian_kelas.id_class')
            ->where('tb_teacher.code', $code);
        return $this->db->get('tb_siswa')->result_array();
    }

    public function listingClass($code)
    {
        $query = $this->db->select('tb_jadwal.id, class')
            ->join('tb_teacher', 'tb_jadwal.id_teacher = tb_teacher.id')
            ->where('code', $code);
        return $this->db->get('tb_jadwal')->result_array();
    }

    public function table($id)
    {
        $this->db->select('id_stud, nik, tb_siswa.name, phone, gender, class, address, date, attend')
            ->join('tb_siswa', 'tb_siswa.id=tb_absen.id_stud')
            ->join('tb_jadwal', 'tb_absen.id_class=tb_jadwal.id')
            // ->join('tb_absen', 'tb_siswa.id = tb_absen.id_stud')
            ->where('tb_absen.id_class', $id)
            ->order_by('date', 'desc');

        return $this->db->get('tb_absen')->result_array();
    }

    public function table2($id)
    {
        $this->db->select('id_student, nik, tb_siswa.name, phone, gender, class, address')
            ->join('tb_siswa', 'tb_siswa.id=tb_pembagian_kelas.id_student')
            ->join('tb_jadwal', 'tb_pembagian_kelas.id_class=tb_jadwal.id')
            ->where('tb_pembagian_kelas.id_class', $id)
            ->order_by('tb_siswa.name');

        return $this->db->get('tb_pembagian_kelas')->result_array();
    }

    public function addScore($data)
    {
        $this->db->insert('tb_nilai', $data);
    }

    public function saveAttend($data)
    {
        // foreach ($data as $d) {
        // var_dump($d);
        // die;
        // $row[] = $d['id_stud'];
        // $this->db->insert('tb_absen', $d);
        //     var_dump($row);
        //     die;
        // }
        // $this->db->insert('tb_absen', $data);
        // $data1 = implode($data);
        // $query = "INSERT INTO tb_absen(id_stud, date) VALUES ($data['id_stud'] "

        $id_stud = $data['id_stud'];
        $id_class = $data['id_class'];
        $date = $data['date'];
        $cek = $this->db->query("SELECT * FROM tb_absen where date= '$date' AND id_class = $id_class AND id_stud = $id_stud");
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Attendance today is already exists<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->db->insert('tb_absen', $data);
            $this->session->set_flashdata('info', 'Data has been added');
        }
    }

    public function report($data)
    {
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $id_class = $data['id_class'];

        $this->db->select("attend, name, date, tb_jadwal.class")
            ->join('tb_siswa', 'tb_absen.id_stud = tb_siswa.id')
            ->join('tb_jadwal', 'tb_absen.id_class = tb_jadwal.id')
            ->where('id_class', $id_class)
            ->where('date >=', $from_date)
            ->where('date <=', $to_date)
            ->group_by('date')
            ->order_by('date');

        return $this->db->get('tb_absen')->result_array();
    }

    public function getClass($data)
    {
        $id = $data['id_class'];
        $query = $this->db->query("SELECT * FROM tb_jadwal WHERE id = $id");
        return $query->result_array();
    }

    public function listReport($from_date, $to_date, $id_class)
    {
        // $from_date = $data['from_date'];
        // $to_date = $data['to_date'];
        // $id_class = $data['id_class'];
        $this->db->select("attend, name, date")
            ->join('tb_siswa', 'tb_absen.id_stud = tb_siswa.id')
            ->where('id_class', $id_class)
            ->where('date >=', $from_date)
            ->where('date <=', $to_date);

        // $query = $this->db->query("SELECT attend, name, date FROM tb_absen JOIN tb_siswa ON tb_absen.id_stud = tb_siswa.id WHERE id_class = $id_class AND date BETWEEN '$from_date' AND '$to_date'");
        // return $query->result_array();

        return $this->db->get('tb_absen')->result_array();
    }

    public function printReport($id, $class)
    {
        $this->db->select("name, class, date, id_stud, attend, id_class")
            ->join('tb_siswa', 'tb_siswa.id = tb_absen.id_stud')
            ->join('tb_jadwal', "tb_jadwal.id = tb_absen.id_class")
            ->where('id_stud', $id)
            ->where('id_class', $class);
        return $this->db->get('tb_absen')->result_array();
    }

    public function getName($id)
    {
        $query = $this->db->query("SELECT * FROM tb_siswa WHERE id = $id");
        return $query->result_array();
    }

    public function tableScore($id)
    {
        $this->db->select('id_stud, tb_siswa.name, nik, id_class, task1, task2, task3, test1, test2')
            ->join('tb_siswa', 'tb_siswa.id=tb_nilai.id_stud', 'right')
            ->where('tb_nilai.id_class', $id)
            ->order_by('tb_siswa.name');

        return $this->db->get('tb_nilai')->result_array();
    }

    public function detailScore($id, $id_class)
    {
        $query = $this->db->query("SELECT * FROM tb_nilai JOIN tb_siswa ON tb_nilai.id_stud = tb_siswa.id WHERE id_stud = $id AND id_class = $id_class");
        return $query->result_array();
    }

    public function editScore($where, $data)
    {
        $task1 = $data['task1'];
        $task2 = $data['task2'];
        $task3 = $data['task3'];
        $test1 = $data['test1'];
        $test2 = $data['test2'];
        $id_stud = $data['id_stud'];
        $id_class = $data['id_class'];

        $query = $this->db->query("UPDATE tb_nilai SET task1 = $task1, task2 = $task2, task3 = $task3, test1 = $test1, test2 = $test2 WHERE id_stud = $id_stud AND id_class = $id_class ");
    }

    public function printReportScore($id, $class)
    {
        $this->db->select('id_stud, class, tb_siswa.name, nik, id_class, task1, task2, task3, test1, test2')
            ->join('tb_siswa', 'tb_siswa.id=tb_nilai.id_stud')
            ->join('tb_jadwal', 'tb_jadwal.id=tb_nilai.id_class')
            ->where('id_stud', $id)
            ->where('tb_nilai.id_class', $class);

        return $this->db->get('tb_nilai')->result_array();
    }

    public function getTeacher($class)
    {
        $this->db->select('name')
            ->join('tb_teacher', 'tb_jadwal.id_teacher=tb_teacher.id')
            ->where('tb_jadwal.id', $class);
        return $this->db->get('tb_jadwal')->result_array();
    }

    public function printReportScoreAll($class)
    {
        $this->db->select('id_stud, class, tb_siswa.name, nik, id_class, task1, task2, task3, test1, test2')
            ->join('tb_siswa', 'tb_siswa.id=tb_nilai.id_stud')
            ->join('tb_jadwal', 'tb_jadwal.id=tb_nilai.id_class')
            ->where('id_class', $class);

        return $this->db->get('tb_nilai')->result_array();
    }

    public function getClassScore($id)
    {
        $this->db->select('*')
            ->where('id', $id);

        return $this->db->get('tb_jadwal')->result_array();
    }
}
