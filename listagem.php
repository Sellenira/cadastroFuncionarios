<html>
    <head>
        <title>Listagem dos dados do funcionário</title>
    </head>
<body>
<?php
    header("Content-Type: text/html; charset='latin1'");
    $servidor   = "localhost";
    $usuario    = "root";
    $senha      = "";

    $con = mysqli_connect($servidor, $usuario, $senha);

    //Selecionar banco de dados
    $banco = "beautyShop";

    mysqli_select_db($con, $banco) or
        die("Erro na seleção do banco de dados".mysqli_error($con));
    
    //Comando de seleção de dados
    $comandoSQL = "select * from funcionarios;";

    $registros = mysqli_query($con, $comandoSQL) or 
        die("Erro na seleção de funcionários".mysqli_error($con));
    
    //Verificar o número de registros existentes
    $linhas = mysqli_num_rows($registros);
    echo "<h1> Listagem de funcionários</h1>";

    if($linhas < 1) {
        die("Ops - Programa interrompido");
    }
    echo "Encontrado $linhas clientes <hr>";

    //Repetir o número de linhas que tem e mostrar os dados de cada linha
    $contador = 0;

    echo "table id='tb'>";
    echo "<tr>";
    echo "<th class='tabela1'>Id</th>";
    echo "<th class='tabela1'>nome</th>";
    echo "<th class='tabela1'>sobrenome</th>";
    echo "<th class='tabela1'>idade</th>";
    echo "<th class='tabela1'>telefone</th>";
    echo "<th class='tabela1'>endereco</th>";
    echo "<th class='tabela1'>setor</th>";
    echo "<th class='tabela1'>email</th>";
    echo "<th class='tabela1'>salario</th>";
    echo "<th class='tabela1'>obs</th>";

    echo "</tr>";
    while ($contador < $linhas) {
        //criando a matriz $dados
        $dados = mysqli_fetch_array($registros);
        //abrindo uma nova linha na tabela
        echo "<tr>";

        echo "<td class='tabela2'>" . $dados["id"] . "</td>";
        echo "<td class='tabela2'>" . $dados["nome"] . "</td>";
        echo "<td class='tabela2'>" . $dados["sobrenome"] . "</td>";
        echo "<td class='tabela2'>" . $dados["idade"] . "</td>";
        echo "<td class='tabela2'>" . $dados["telefone"] . "</td>";
        echo "<td class='tabela2'>" . $dados["endereco"] . "</td>";
        echo "<td class='tabela2'>" . $dados["setor"] . "</td>";
        echo "<td class='tabela2'>" . $dados["email"] . "</td>";
        echo "<td class='tabela2'>" . $dados["salario"] . "</td>";
        echo "<td class='tabela2'>" . $dados["obs"] . "</td>";

        echo "</tr>";

        $contador++;
    }
    echo "</table>";
?>
<hr>
<footer>Registro finalizado</footer>
</body>
</htmml>