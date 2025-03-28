<?php
require_once 'interfaces/HouseCleaning.php';

abstract class Human implements HouseCleaning
{
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age)
    {
        $this->setHeight($height);
        $this->setWeight($weight);
        $this->setAge($age);
    }

    public function getHeight() { return $this->height; }
    public function getWeight() { return $this->weight; }
    public function getAge() { return $this->age; }

    public function setHeight($height) { $this->height = is_numeric($height) ? $height : 0; }
    public function setWeight($weight) { $this->weight = is_numeric($weight) ? $weight : 0; }
    public function setAge($age) { $this->age = ($age > 0) ? $age : 0; }

    public function birthChild() {
        echo "A child is born<br>";
        return $this->birthNotification();
    }

    abstract protected function birthNotification();

    public function __toString()
    {
        return "Human: Height = {$this->height}, Weight = {$this->weight}, Age = {$this->age}";
    }
}
?>