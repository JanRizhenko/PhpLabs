<?php

require_once __DIR__ . '/../models/Employee.php';

class EmployeeController
{
    private $model;

    public function __construct()
    {
        $this->model = new Employee();
    }

        public function index()
        {
            $employees = $this->model->getAllEmployees();
            include __DIR__ . '/../views/employees/index.php';
        }

        public function create()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model->create($_POST['name'], $_POST['position'], $_POST['salary']);
                header("Location: /Lab05/Task3/");
                exit();
            }
            include __DIR__ . '/../views/employees/create.php';
        }

        public function update($id)
        {
            $employee = $this->model->getEmployeeById($id);

            if (!$employee) {
                die("Працівника з ID $id не знайдено!");
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model->update($id, $_POST['name'], $_POST['position'], $_POST['salary']);
                header("Location: /Lab05/Task3/");
                exit();
            }
            $employee = $this->model->getEmployeeById($id);
            include __DIR__ . '/../views/employees/update.php';
        }

        public function delete($id)
        {
            $this->model->delete($id);
            header("Location: /Lab05/Task3/");
            exit();
        }

        public function statistics()
        {
            $stats = $this->model->getStatistics();
            require __DIR__ . '/../views/employees/statistics.php';
        }
    }
?>