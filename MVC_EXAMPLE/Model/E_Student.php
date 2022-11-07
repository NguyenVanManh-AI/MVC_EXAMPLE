<?php 
class Entity_Student{
    public $id;
    public $name;
    public $age;
    public $university;

    public function __construct($__id, $__name, $__age, $__university){
        $this->id = $__id;
        $this->name = $__name;
        $this->age = $__age;
        $this->university = $__university;
    }
}
?>