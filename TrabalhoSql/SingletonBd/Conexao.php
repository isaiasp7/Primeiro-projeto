<?php 
require_once(__DIR__ . '/../Utils/utils.php');

    class Conexao{
 
    private static ?array $infoAll = null;
    
  public static function Fetch_num(string $tipo){
    $permitidos = ['Alunos','Disciplina','Notas','Professores','Turmas']; // Lista de tabelas válidas
    
    if (in_array($tipo, $permitidos)) {
        $pdo = new PDO(
        "mysql:host=localhost;port=3306;dbname=admescola;",
        'root',
        'root12345'
    );
    $sql = $pdo->prepare("SELECT * FROM $tipo"); 
    $sql ->execute();
    $info=$sql ->fetchAll(PDO::FETCH_NUM);
    return $info;
    } else {
        die("Tabela inválida!"); // Bloqueia nomes não permitidos
    }
   
    
   

    }

    
    public static function Fetch_assoc(string $tipo){
       
        $permitidos = ['Alunos','Disciplina','Notas','Professores','Turmas']; // Lista de tabelas válidas
        
        if (in_array($tipo, $permitidos)) {
            $pdo = new PDO(
            "mysql:host=localhost;port=3306;dbname=admescola;",
            'root',
            'root12345'
        );
        $sql = $pdo->prepare("SELECT * FROM $tipo"); 
        $sql ->execute();
        $info=$sql ->fetchAll(PDO::FETCH_ASSOC);
        return $info;
        } else {
            
            die("Tabela inválida!"); // Bloqueia nomes não permitidos
        }
       
        
       
    
        }
        
        public static function Fetch_assoc_specific(string $tipo,string $campo){
        $array = self::Fetch_assoc($tipo);//tipo - aluno| campo - aluno{aluno_id}
        return Utils::campoSpecific($array,$campo);
       
            
        }

        public static function getInfoAll(): array {//inicialização lazy (preguiçosa) dentro do método
            if (self::$infoAll === null) {
                self::$infoAll = [
                    "info"  => Conexao::Fetch_num("Alunos"),
                    "infoP" => Conexao::Fetch_num("Professores"),
                    "infoT" => Conexao::Fetch_num("Turmas"),
                    "infoD" => Conexao::Fetch_num("Disciplina"),
                    "infoN" => Conexao::Fetch_num("Notas")
                ];
            }
    
            return self::$infoAll;
        }
}

?>