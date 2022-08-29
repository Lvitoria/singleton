<?php
   include "./logsSingleton.php";

   try {
    //sem singleton, para funcionar sem singleton tire o __construct como private
    // $instacia = new LogsSingleton(); 
    // $resultado = $instacia->gravar(["opa" => "name"]);
    $instacia = LogsSingleton::obterInstancia();
    $instacia->gravar(["seila" => "vamo"]);
    print_r($instacia->lerArquivo());
  } catch (\Throwable $th) {
      print_r($th);
  }