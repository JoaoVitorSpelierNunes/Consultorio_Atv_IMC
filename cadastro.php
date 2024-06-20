<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" step="0.1" required><br><br>
            <label for="anoNasc">Ano Nascimento: </label>
            <input type="number" id="anoNasc" name="anoNasc" step="0.1" required><br><br>
            <label for="peso">Peso: </label>
            <input type="number" id="peso" name="peso" step="0.1" required><br><br>
            <label for="altura">Altura</label>
            <input type="number" id="altura" name="altura" step="0.1" required><br><br>
            <input type="submit" value="Imprimir">
            <input type="reset" value="Limpar"><br><br>
        </form>
        <div class="imprimir">
            <?php
            require 'consultorio.php';
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(isset($_POST['nome']) && isset($_POST['anoNasc']) && isset($_POST['peso']) && isset($_POST['altura'])){
                        $nome = $_POST['nome'];
                        $anoNasc = $_POST['anoNasc'];
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
                        $erro = (empty($nome) || empty($anoNasc) || empty($peso) || empty($altura) ? "Todos os campos são obrigatórios": ($peso <= 0 || $altura <= 0 || $anoNasc > 2024))? "Por favor, insira valores válidos para peso, altura e ano de nascimento":"";
                        if($erro){
                            echo $erro;
                        }
                        else{
                            $consulta = new Consultorio();
                            $consulta->setNome($nome);
                            $consulta->setAnoNasc($anoNasc);
                            $consulta->setPeso($peso);
                            $consulta->setAltura($altura);
                            $consulta->calcularIdade($anoNasc);
                            $consulta->calcularImc($peso, $altura);
                            $consulta->imprimirTudo();
                        }
                    }else{
                        echo "Formulário não enviado corretamente";
                    }
                }
            ?>
        </div>
    </div>
    
</body>
</html>