<?php
class LogsSingleton {
    protected static LogsSingleton $instancia;

    private function __construct(){}

    public static function obterInstancia(): self{
      if(empty(self::$instancia)){
        self::$instancia = new self();// ou pode colocar `new LogsSingleton()` é a mesma coisa
      }
      return self::$instancia;
    }

    public function gravar(array $dados):void{
      $nomeArquivo = "logs.txt";
      $logs = [];
      if(filesize($nomeArquivo) > 0){
          $conteudoDoArquivo = file_get_contents($nomeArquivo);
          $logs = json_decode($conteudoDoArquivo, true);
      } 
      $logs[] = $dados;

      $arquivo = fopen($nomeArquivo, 'w');
      
      fwrite($arquivo, json_encode($logs));

      fclose($arquivo);
    }

    public function lerArquivo():array{
      $arquivo = file_get_contents("logs.txt", 'w');
      return json_decode($arquivo, true);
    }
}