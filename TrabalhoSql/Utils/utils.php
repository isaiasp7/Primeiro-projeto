<?php 
require_once(__DIR__ . '/../ConexaoSingleton/Conexao.php');
class Utils{

    public static function campoSpecific(array $array, string $campo): array {
        $valores = [];
    
        foreach ($array as $item) {
            if (isset($item[$campo])) {
                $valores[] = $item[$campo];
            }
        }
        return $valores;
    }
    
     
    public static function percorresHash(string $tipo){
        $array = Conexao::getInfoAll();
        $valor = $array[$tipo];
        self::percorre($valor);

    }
    public static function  percorre(array $info){
        foreach ($info as $chave1 => $valor) {
            echo "<tr>";
            foreach ($valor as $key => $value) {
                # code...
            echo "<td>" . $value . "</td>";  // Valor
            
            }echo "</tr>";
        }
}
}

?>