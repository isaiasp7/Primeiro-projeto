<?php 
require_once(__DIR__ . '/../Utils/utils.php');

class Conexao
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=admescola',
            'root',
            ''
        );
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}


?>