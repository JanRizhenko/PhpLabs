<?php

    require_once __DIR__ . '/../../config/database.php';

    class Employee
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Database::getInstance()->getConnection();
        }

        public function getAllEmployees()
        {
            $stmt = $this->pdo->query("SELECT * FROM employees");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getEmployeeById($id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($name, $position, $salary)
        {
            $stmt = $this->pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
            return $stmt->execute([$name, $position, $salary]);
        }
        public function update($id, $name, $position, $salary)
        {
            $stmt = $this->pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
            $stmt->execute([$name, $position, $salary, $id]);
        }

        public function delete($id)
        {
            $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = ?");
            $stmt->execute([$id]);
        }

        public function getStatistics() {
            $statistics = [];

            $stmt = $this->pdo->query("SELECT AVG(salary) as avg_salary FROM employees");
            $statistics['overall_avg_salary'] = $stmt->fetch(PDO::FETCH_ASSOC)['avg_salary'];

            $stmt = $this->pdo->query("SELECT position, COUNT(*) as count FROM employees GROUP BY position");
            $statistics['position_counts'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $this->pdo->query("SELECT position, AVG(salary) as avg_salary FROM employees GROUP BY position");
            $statistics['position_avg_salaries'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $statistics;
        }
    }
?>