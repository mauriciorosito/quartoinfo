<?php

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");

class ControllerCourse extends Controller {

    protected function selectOne($course) {
        $db = new Includes\Db();
        $lines = $db->query('select * from course where idCourse = :idCourse', array(
            'idCourse' => $course->getIdCourse(),
        ));
        if (isset($lines[0])) {
            $course = new Course();
            $course->setIdCourse($lines[0]["idCourse"]);
            $course->setName($lines[0]["name"]);
            $course->setDescription($lines[0]["description"]);
            $course->setAlias($lines[0]["alias"]);
            $course->setType($lines[0]["type"]);
            return $course;
        } else {
            return 0;
        }
    }

    protected function selectAll() {
        list($course) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query("select * from course order by name");
        $courses = array();
        foreach ($lines as $line) {
            $course = new Course();
            $course->setIdCourse($line["idCourse"]);
            $course->setName($line["name"]);
            $course->setDescription($line["description"]);
            $course->setAlias($line["alias"]);
            $course->setType($line["type"]);


            $courses[] = $course;
        }
        return $courses;
    }

    protected function insert($course) {
        $db = new Includes\Db();
        return $db->query('insert into course (name, type, description, alias) values 
		(:name, :type, :description, :alias) ', array(
                    'name' => $course->getName(),
                    'type' => $course->getType(),
                    'description' => $course->getDescription(),
                    'alias' => $course->getAlias(),
        ));
    }

    protected function update($course) {
        $db = new Includes\Db();
        return $db->query('update course set name = :name, type = :type, description = :description, '
                        . 'alias = :alias where idCourse = :idCourse', array(
                    'name' => $course->getName(),
                    'type' => $course->getType(),
                    'description' => $course->getDescription(),
                    'alias' => $course->getAlias(),
                            'idCourse' => $course->getIdCourse()
        ));
    }

    protected function delete($course) {
        $db = new Includes\Db();

        $ret2 = $db->query("delete from course where IdCourse = :idCourse", array(
            'idCourse' => $course->getIdCourse(),
        )); // ???? verificar!!!!!

        $ret1 = $db->query("delete from user where idCourse = :idCourse", array(
            'idCourse' => $course->getIdCourse(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

    protected function selectAllGrowing($search) {
        $db = new Includes\Db();
        
        if($search != ""){
            $search = "where "
                    . "name like '%" . $search . "%' "
                    . "or description like '%" . $search . "%' "
                    . "or type like '%" . $search . "%' "
                    . "or alias like '%" . $search . "%' ";
        }
        
        $lines = $db->query("select * from course " . $search . " order by name");
    
        $courses = array();
        foreach ($lines as $line) {
            $course = new Course();
            $course->setIdCourse($line["idCourse"]);
            $course->setName($line["name"]);
            $course->setDescription($line["description"]);
            $course->setType($line["type"]);
            $course->setAlias($line["alias"]);
            $courses[] = $course;
        }

        return $courses;
    }

    protected function selectAllDescending($search) {
        $db = new Includes\Db();
        
       if($search != ""){
            $search = "where "
                    . "name like '%" . $search . "%' "
                    . "or description like '%" . $search . "%' "
                    . "or type like '%" . $search . "%' "
                    . "or alias like '%" . $search . "%' ";
        }
        
        $lines = $db->query("select * from course order by name desc");
        $courses = array();
        foreach ($lines as $line) {
            $course = new Course();
            $course->setIdCourse($line["idCourse"]);
            $course->setName($line["name"]);
            $course->setDescription($line["description"]);
            $course->setType($line["type"]);
            $course->setAlias($line["alias"]);
            $courses[] = $course;
        }

        return $courses;
    }

}
