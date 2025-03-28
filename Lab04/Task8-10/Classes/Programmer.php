<?php
require_once 'abstract/Human.php';

class Programmer extends Human
{
    private $languages = [];
    private $experience;

    public function __construct($height, $weight, $age, $languages, $experience)
    {
        parent::__construct($height, $weight, $age);
        $this->languages = is_array($languages) ? $languages : [$languages];
        $this->setExperience($experience);
    }
    public function getLanguages() {
        return $this->languages;
    }
    public function setLanguages($languages) {
        $this->languages = is_array($languages) ? $languages : [$languages];
    }
    public function addLanguage($language) {
        $this->languages[] = $language;
    }
    public function getExperience() { return $this->experience; }

    public function setExperience($experience) { $this->experience = ($experience >= 0) ? $experience : 0; }

    protected function birthNotification() {
        echo "A programmer with {$this->experience} years of experience has become a parent! Time to code a baby app in " .
            implode(", ", $this->languages) . ".<br>";
    }

    public function cleanRoom() {
        echo "Programmer is cleaning a room, insane!<br>";
    }

    public function cleanKitchen() {
        echo "Programmer is cleaning a kitchen, insane!<br>";
    }

    public function __toString()
    {
        return parent::__toString() . ", Languages = [" . implode(", ", $this->languages) . "],
         Experience = {$this->experience} years";
    }
}
?>