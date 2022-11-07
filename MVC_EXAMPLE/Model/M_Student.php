<?php

include_once("E_Student.php");
class Model_Student {

    public $link ;

    public function __construct(){
        $this->link = mysqli_connect("localhost","root","") or die ("Không thể kết nối đến CSDL MYSQL");
        mysqli_select_db($this->link,"DULIEU");
    }

    public function getAllStudent(){
        $sql = "select * from sinhvien";
        $rs = mysqli_query($this->link, $sql);
        $i = 0;
        while($row = mysqli_fetch_array($rs)){
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $university = $row['university'];
            while($i != $id) $i++;
            $students[$i++] = new Entity_Student($id,$name,$age,$university);
        }
        return $students;
    }
    
    public function getStudentDetail($stid){
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }

    public function addStudent($id, $name, $age, $university){
        $sql = "INSERT sinhvien SET id='$id',name='$name',age='$age',university='$university'" ;
        $rs = mysqli_query($this->link, $sql);
    }

    public function editStudent($idedit,$id, $name, $age, $university){
        $sql = "UPDATE sinhvien SET id='$id',name='$name',age='$age',university='$university' WHERE id='$idedit'";
        $rs = mysqli_query($this->link, $sql);
    }

    public function deleteStudent($id){
        $sql = "DELETE FROM sinhvien WHERE id='$id'";
        $rs = mysqli_query($this->link, $sql);
    }

    public function searchStudent($col,$infor){
        $sql = "SELECT * FROM sinhvien WHERE $col like '%$infor%'" ;
        $result = mysqli_query($this->link, $sql);
        return $result;
    }
}

?>