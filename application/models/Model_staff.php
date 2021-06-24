<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_staff extends CI_Model
{
    public function listingStudent()
    {
        $query = $this->db->query('SELECT * FROM tb_siswa ORDER BY date_of_register DESC');
        return $query->result_array();
    }

    public function image($code)
    {
        $query = $this->db->select('image')
            ->join('tb_user', 'tb_user.code = tb_staff.code')
            ->where('tb_staff.code', $code);
        return $this->db->get('tb_staff')->result_array();
    }

    public function getStaff($code)
    {
        $this->db->select('name')
            ->where('code', $code);
        return $this->db->get('tb_staff')->result_array();
    }

    public function reportStudent($data)
    {
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $this->db->select("nik, name, date_of_register, gender, school, phone")
            ->where('date_of_register >=', $from_date)
            ->where('date_of_register <=', $to_date)
            ->order_by('date_of_register');

        return $this->db->get('tb_siswa')->result_array();
    }

    public function detailStudent($id)
    {
        $query = $this->db->query("SELECT * FROM tb_siswa WHERE id = $id");
        return $query->result_array();
    }

    public function saveNewStudent($data)
    {
        $this->db->insert('tb_siswa', $data);
    }

    public function editStudent($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteStudent($where)
    {
        $id = $where['id'];
        $this->db->query("DELETE FROM tb_nilai WHERE id_stud = $id");
        $this->db->query("DELETE FROM tb_absen WHERE id_stud = $id");
        $this->db->query("DELETE FROM tb_pembagian_kelas WHERE id_student = $id");
        $this->db->query("DELETE FROM tb_siswa WHERE id = $id");
    }

    public function listingCourse()
    {

        return $this->db->get('tb_daftar_kursus')->result_array();
    }

    public function saveNewCourse($data)
    {
        $course = $data['course'];
        $cek = $this->db->query("SELECT course FROM tb_daftar_kursus where course = '$course'");
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Course has already exists.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->db->insert('tb_daftar_kursus', $data);
            $this->session->set_flashdata('info', 'Data has been added');
        }
    }

    public function listingClass()
    {
        $query = "SELECT class, name, day, time, tb_jadwal.id FROM tb_jadwal JOIN tb_teacher ON tb_jadwal.id_teacher = tb_teacher.id ORDER BY day ASC, time";
        return $this->db->query($query)->result_array();
    }

    public function listingClass2()
    {
        $this->db->select('class, name, day, time, tb_jadwal.id')
            ->join('tb_teacher', 'tb_teacher.id = tb_jadwal.id_teacher')
            ->order_by('class');

        return $this->db->get('tb_jadwal')->result_array();
    }

    public function detailClass($id)
    {
        $this->db->select('class, name, day, time, tb_jadwal.id, id_teacher')
            ->join('tb_teacher', 'tb_teacher.id = tb_jadwal.id_teacher')
            ->where('tb_jadwal.id', $id);
        return $this->db->get('tb_jadwal')->result_array();
    }

    public function editClass($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getCourse()
    {
        return $this->db->get('tb_daftar_kursus')->result_array();
    }

    // public function deleteCourse($where)
    // {
    //     $id = $where['id'];
    //     $this->db->query("DELETE FROM tb_daftar_kursus WHERE id = $id");
    // }

    public function saveClass($data, $class)
    {
        $cek = $this->db->query("SELECT class FROM tb_jadwal where class = '$class'");
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Class has already exists.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->db->insert('tb_jadwal', $data);
            $this->session->set_flashdata('info', 'Data has been added');
        }
    }

    public function deleteClass($where)
    {
        $id = $where['id'];
        $this->db->query("DELETE FROM tb_pembagian_kelas WHERE id_class = $id");
        $this->db->query("DELETE FROM tb_jadwal WHERE id = $id");
    }

    public function listingPembagian()
    {
        $query = "SELECT * FROM tb_pembagian_kelas";
        return $this->db->query($query)->result_array();
    }

    public function table($id)
    {
        $this->db->select('id_student, nik, tb_siswa.name, phone, gender, class')
            ->join('tb_siswa', 'tb_siswa.id=tb_pembagian_kelas.id_student')
            ->join('tb_jadwal', 'tb_pembagian_kelas.id_class=tb_jadwal.id')
            ->where('id_class', $id)
            ->order_by('tb_siswa.name');

        return $this->db->get('tb_pembagian_kelas')->result_array();
    }

    public function listingTable()
    {
        $result = $this->db->table();
        $this->db->select('id_student, nik, tb_siswa.name, phone')
            ->join('tb_siswa', 'tb_siswa.id=tb_pembagian_kelas.id_student');
        return $this->db->get('tb_pembagian_kelas')->result_array();
    }

    public function savePembagianKelas($data)
    {
        $id_student = $data['id_student'];
        $id_class = $data['id_class'];
        $cek = $this->db->query("SELECT * FROM tb_pembagian_kelas where id_student = $id_student AND id_class = $id_class ");
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Student has already exists.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->db->insert('tb_pembagian_kelas', $data);
            $this->db->query("INSERT INTO tb_nilai (id_stud, id_class) VALUE ($id_student, $id_class)");
            $this->session->set_flashdata('info', 'Data has been added');
        }
    }

    public function deletePembagian($id, $class)
    {
        $this->db->query("DELETE FROM tb_nilai WHERE id_stud = $id AND id_class = $class");
        $this->db->query("DELETE FROM tb_absen WHERE id_stud = $id AND id_class = $class");
        $this->db->query("DELETE FROM tb_pembagian_kelas WHERE id_student = $id AND id_class = $class");
    }

    public function getClassName($id)
    {
        $this->db->select('class')
            ->where('id', $id);

        return $this->db->get('tb_jadwal')->result_array();
    }

    public function listingTeacher()
    {
        $this->db->select('name, nik, address, phone, tb_teacher.id, username, password, tb_teacher.code')
            ->join('tb_user', 'tb_user.code = tb_teacher.code')
            ->where('tb_user.role_id', 2);
        return $this->db->get('tb_teacher')->result_array();
    }

    public function listingTeacher2()
    {
        return $this->db->get('tb_teacher')->result_array();
    }

    public function saveTeacher($data1, $data2)
    {
        $this->db->insert('tb_teacher', $data1);
        $this->db->insert('tb_user', $data2);
    }

    public function editTeacher($where, $data, $data2)
    {
        $id = $where['id'];
        $code = $where['code'];
        $this->db->where('id', $id);
        $this->db->update('tb_teacher', $data);
        $this->db->where('code', $code);
        $this->db->update('tb_user', $data2);
    }

    public function deleteTeacher($where)
    {
        $id = $where['id'];
        $this->db->query("DELETE FROM tb_jadwal WHERE id_teacher = $id");
        $this->db->query("DELETE FROM tb_teacher WHERE id = $id");
    }

    public function detailTeacher($id)
    {
        $query = $this->db->query("SELECT tb_teacher.id, nik, name, address, tb_teacher.code, phone, username, password FROM tb_teacher JOIN tb_user ON tb_teacher.code = tb_user.code WHERE tb_teacher.id = $id");
        return $query->result_array();
    }
}
