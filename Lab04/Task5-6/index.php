<?php

    include "Circle.php";

try {
        $circle1 = new Circle(55, 75, 75);
        $circle1->setX(85);
        $circle1->setY(65);
        $circle1->setRadius(45);

        echo "<br> X: " . $circle1->getX();
        echo "<br> Y: " . $circle1->getY();
        echo "<br> Radius: " . $circle1->getRadius() . "<br>";

        $circle1->setX(45);
        $circle1->setY(55);
        $circle1->setRadius(35);

        echo $circle1;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }


$circle2 = new Circle(10, 10, 5);
$circle3 = new Circle(14, 14, 5);
$circle4 = new Circle(30, 30, 5);

echo "<br>Formula for intersect check: sqrt((x2 - x1)^2 + (y2 - y1)^2) <= (r1 + r2) <br>";

echo "<br> Circle 2:";
echo $circle2;
echo "<br> Circle 3:";
echo $circle3;
echo "<br> Circle 4:";
echo $circle4;

if ($circle2->intersects($circle3)) {
    echo "<br>Circle 2 and Circle 3 intersect.";
} else {
    echo "<br>Circle 2 and Circle 3 do not intersect.";
}

if ($circle3->intersects($circle4)) {
    echo "<br>Circle 3 and Circle 4 intersect.";
} else {
    echo "<br>Circle 3 and Circle 4 do not intersect.";
}


?>