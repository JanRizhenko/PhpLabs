<?php

class Circle
{
    private $x, $y, $radius;

    public function __construct($x, $y, $radius)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setRadius($radius);
    }

    public function getX() { return $this->x; }
    public function getY() { return $this->y; }
    public function getRadius() { return $this->radius; }

    public function setX($x) { $this->x = is_numeric($x) ? $x : 0; }
    public function setY($y) { $this->y = is_numeric($y) ? $y : 0; }
    public function setRadius($radius) {
        if ($radius > 0) {
            $this->radius = $radius;
        } else {
            throw new Exception("Radius must be positive.");
        }
    }

    public function __toString()
    {
        return "<br> Circle: <br> X: {$this->getX()} <br> Y: {$this->getY()} <br> Radius: {$this->getRadius()} <br>";
    }

    public function intersects(Circle $other): bool
    {
        $dx = $this->getX() - $other->getX();
        $dy = $this->getY() - $other->getY();
        $distance = sqrt($dx * $dx + $dy * $dy);
        $radiusSum = $this->getRadius() + $other->getRadius();

        return $distance <= $radiusSum;
    }
}


?>
