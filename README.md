# Singleton

Singleton é um dos desing partterns de criação mais famosos,
garantir que uma classe tenha apenas uma instância, com isso teremos um acesso global para essa instância.

Cada vez que utilizamos a palavra reservada `new` da programação numa class, criamos mais um espaço na memoria, portanto pensando em diminuir esta ocupação de espaço de memoria, vamos utilizar o `singleton` um dos padrões de projeto.

Neste código de exemplo é feito em PHP e foi planejado em um sistema de logs.

Umas das primeiras coisas a ser feitas é colocar o __construct da classe como privado, isso significa que não podemos mais instanciar esta classe.

~~~~PHP
class LogsSingleton {
    private function __construct(){}
}
~~~~

Depois vamos criar uma função static, assim sempre que precisar vamos entregar a instância da nossa classe por este método.

~~~~PHP
    public static function obterInstancia(): self{
      if(empty(self::$instancia)){
        self::$instancia = new self();// ou pode colocar `new NomeDaSuaClasse()` é a mesma coisa
      }
      return self::$instancia;
    }
~~~~

Agora para chama-ló basta importar o arquivo, e depois chamar a função `obterInstancia`

~~~~PHP
    include "./logsSingleton.php";
    $instacia = LogsSingleton::obterInstancia();
    $instacia->gravar(["seila" => "vamo"]);
~~~~

Para rodar este projeto utilize este comando 

~~~~PHP
    php -S localhost:8080
~~~~