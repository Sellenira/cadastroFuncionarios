<html>
    <head>
        <title>Gravando o Cadastro de Funcionários</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    echo "<h2>Gravando os funcionários</h2>";

    //recebendo os dados
    $nome               = $_POST["nome"];
    $sobrenome          = $_POST["sobrenome"];
    $idade              = $_POST["idade"];
    $telefone           = $_POST["telefone"];
    $endereco           = $_POST["endereco"];
    $setor              = $_POST["setor"];
    $email              = $_POST["email"];
    $salario            = $_POST["salario"];
    $obs                = $_POST["obs"];

if($telefone < 9)
{
    die("Insira o telefone com DDD");
}

if($nome == "" || $sobrenome == "" || $idade == "" || $endereco == "" || $setor == "" || $email == "" || $salario == "")
{
    die("Preencha todos os campos!");
}

//conectar
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "beautyShop";

$con = mysqli_connect($servidor, $usuario, $senha);

mysqli_select_db($con, $banco)
    or die("Erro na abertura do banco".mysqli_error($con));

//Inserção de registros
$sql = "INSERT INTO funcionarios
(nome, sobrenome, idade, telefone, endereco, setor, email, salario, obs) VALUES
('$nome', '$sobrenome', '$idade', '$telefone', '$endereco', '$setor', '$email', '$salario', '$obs')";

mysqli_query($con, $sql) or die("Ops! Erro na inserção de funcionários".mysqli_error($con));

echo "Funcionário(a) <b>$nome</b> cadastrado com sucesso!";
?>
    </body>
<a href="index.html">Cadastrar novos funcionários</a>
</html>