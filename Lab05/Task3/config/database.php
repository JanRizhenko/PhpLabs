<?php
    class Database
    {
        private static $config;
        private static $instance = null;
        private $pdo;

        private function __construct()
        {
            self::$config = include(__DIR__ . "/db_config.php");
            try {
                $this->pdo = new PDO(
                    "mysql:host=" . self::$config['db_server'] . ";dbname=" . self::$config['db_name'] . ";charset=utf8",
                    self::$config['db_username'],
                    self::$config['db_password']
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Помилка підключення: " . $e->getMessage());
            }


        }
        public static function getInstance()
        {
            if (!self::$instance) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function getConnection()
        {
            return $this->pdo;
        }
    }
?>