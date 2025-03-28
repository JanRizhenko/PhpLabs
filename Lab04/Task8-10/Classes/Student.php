<?php
require_once 'abstract/Human.php';

class Student extends Human
{
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course)
    {
        parent::__construct($height, $weight, $age);
        $this->setUniversity($university);
        $this->setCourse($course);
    }

    public function getUniversity() { return $this->university; }
    public function getCourse() { return $this->course; }

    public function setUniversity($university) { $this->university = $university; }
    public function setCourse($course) { $this->course = ($course > 0) ? $course : 1; }

    public function nextCourse()
    {
        $this->course++;
        echo "Student moved to course {$this->course}<br>";
    }

    protected function birthNotification() {
        echo "A student from {$this->university} has become a parent! Studies might be challenging now.<br>";
    }

    public function cleanRoom() {
        echo "Student is cleaning a room<br>";
    }

    public function cleanKitchen() {
        echo "Student is cleaning a kitchen<br>";
    }

    public function __toString()
    {
        return parent::__toString() . ", University = {$this->university}, Course = {$this->course}";
    }
}
?>