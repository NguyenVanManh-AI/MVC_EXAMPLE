<?php
include_once("../Model/M_Student.php");
class Ctrl_Student{
    public function invoke(){
        $modelStudent = new Model_Student();

        // detail 
        if(isset($_GET['stid'])){
            $student = $modelStudent->getStudentDetail($_GET['stid']);
            include_once("../View/StudentDetail.html");
        }

        // add 
        else if(isset($_GET['modl1'])){
            include_once("../View/StudentAdd.html");
        }
        else if(isset($_GET['add'])){
            $modelStudent->addStudent($_POST['id'], $_POST['name'], $_POST['age'], $_POST['university']);
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.html");
        }

        // edit 
        else if(isset($_GET['modl2'])){
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentListEdit.html");
        }
        else if(isset($_GET['idedit'])){
            $student = $modelStudent->getStudentDetail($_GET['idedit']);
            include_once("../View/StudentEdit.html");
        }
        else if(isset($_GET['edit'])){
            $modelStudent->editStudent($_GET['iddedit'],$_POST['id'], $_POST['name'], $_POST['age'], $_POST['university']);
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentListEdit.html");
        }

        // delete 
        else if(isset($_GET['modl3'])){
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentDelete.html");
        }
        else if(isset($_GET['iddelete'])){
            $modelStudent->deleteStudent($_GET['iddelete']);
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentDelete.html");
        }

        // search 
        else if(isset($_GET['modl4'])){
            include_once("../View/StudentSearch.html");
        }
        else if(isset($_GET['search'])){
            $studentList = $modelStudent->searchStudent($_POST['col'],$_POST['infor']);
            include_once("../View/StudentListSearch.html");
        }

        // all 
        else {
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.html");
        }
    }
};
$C_Student = new Ctrl_Student();
$C_Student->invoke();
?>