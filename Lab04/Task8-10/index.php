<?php

include "Classes\Programmer.php";
include "Classes\Student.php";

echo "<h2>Testing Student Class</h2>";
$student = new Student(168, 65, 20, "ZTU", 2);
echo $student . "<br>";

echo "<h3>Testing Student Methods</h3>";
echo "University: " . $student->getUniversity() . "<br>";
echo "Course: " . $student->getCourse() . "<br>";
$student->nextCourse();
echo "After nextCourse(): " . $student->getCourse() . "<br>";

echo "<h3>Changing Student height and weight using parent methods</h3>";
$student->setHeight(170);
$student->setWeight(67);
echo $student . "<br>";

echo "<h3>Testing Student with Invalid Course</h3>";
$student2 = new Student(165, 60, 19, "Lviv Polytechnic", -1);
echo $student2 . "<br>";

echo "<h2>Testing Programmer Class</h2>";
$programmer = new Programmer(182, 80, 28, ["PHP", "JavaScript", "Python"], 5);
echo $programmer . "<br>";

echo "<h3>Testing Programmer Methods</h3>";
echo "Languages: " . implode(", ", $programmer->getLanguages()) . "<br>";
echo "Experience: " . $programmer->getExperience() . " years<br>";

$programmer->addLanguage("Java");
echo "After adding Java: " . implode(", ", $programmer->getLanguages()) . "<br>";

echo "<h3>Changing Programmer height and weight using parent methods</h3>";
$programmer->setHeight(183);
$programmer->setWeight(82);
echo $programmer . "<br>";

echo "<h3>Testing Programmer with Invalid Experience</h3>";
$programmer2 = new Programmer(175, 72, 24, "C++", -2);
echo $programmer2 . "<br>";

echo "<h3>Testing Programmer with Single Language</h3>";
echo "Languages for programmer2: " . implode(", ", $programmer2->getLanguages()) . "<br>";

$programmer2->setLanguages(["C++", "C#", "TypeScript"]);
echo "After updating languages: " . implode(", ", $programmer2->getLanguages()) . "<br>";

echo "<h2>Testing Birth Methods</h2>";

echo "<h3>Student Birth Method Test</h3>";
$student = new Student(168, 65, 20, "ZTU", 2);
echo $student . "<br>";
$student->birthChild();

echo "<h3>Programmer Birth Method Test</h3>";
$programmer = new Programmer(182, 80, 28, ["PHP", "JavaScript", "Python"], 5);
echo $programmer . "<br>";
$programmer->birthChild();

echo "<h3>Another Programmer Birth Method Test</h3>";
$newProgrammer = new Programmer(175, 72, 24, "C++", 2);
echo $newProgrammer . "<br>";
$newProgrammer->birthChild();

echo "<h2>Testing House Cleaning Methods</h2>";

echo "<h3>Student Cleaning Methods Test</h3>";
$student = new Student(168, 65, 20, "ZTU", 2);
echo $student . "<br>";
$student->cleanRoom();
$student->cleanKitchen();

echo "<h3>Programmer Cleaning Methods Test</h3>";
$programmer = new Programmer(182, 80, 28, ["TypeScript", "Lua", "C#"], 5);
echo $programmer . "<br>";
$programmer->cleanRoom();
$programmer->cleanKitchen();
?>