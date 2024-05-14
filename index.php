<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>
<body>
    <h2>Cadastro de Clientes</h2>

    <form method="POST" action="cadastro.php">
        <table>
            
            <tr>
                <td width="100">
                    <label>Nome</label>
                </td>
                <td><input name="nome" type="text"></td>
            </tr>
            <tr>
                <td width="100">
                    <label>Cidade</label>
                </td>
                <td><input name="cidade" type="text"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
            </tr>
        </table>
    </form>

    <h2>Lista de Cadastro</h2>
    <br>
    <div class="card col-md-6">
        <table class="table">
            <thead class="thead-light">
                
            <table class="table table-dark table-striped">
            <tr>
                    <table> <th scope="col">Nome</th></table>
                 
                    </tr>

                 <tr>
                    <table><th scope="col">Cidade</th></table>
                    <input type="text" class="submit" name="nome">
                    </tr>

                    <tr>
                    <table> <th scope="col">Editar</th></table>
                    <input type="text" class="submit" name="nome">
                   </tr>

                    <tr>
                    <table>  <th scope="col">Excluir</th></table>
                    <input type="text" class="submit" name="nome">
            </tr>
            </table>

               
            </thead>
            <tbody>
                <tr>

</div>





</tr>
            </thead>
            <tbody>
            <?php 
            
include("conexao.php");

$sql = "SELECT * FROM teste";
$res = mysqli_query($conect, $sql);

if ($res) { // Verifica se a consulta foi bem-sucedida
    while ($r = mysqli_fetch_array($res)) {
        // Se a consulta foi bem-sucedida, continue com o processamento
        echo '<tr>
            <td>'.$r['nome'].'</td>
            <td>'.$r['cidade'].'</td>
            <td>
                <a href="update.php?id='.$r['id'].'"><img src="update.png" width="16" height="16"></a>
            </td>
            <td>
                <a href="excluir.php?id='.$r['id'].'"><img src="excluir.png" width="16" height="16"></a>
            </td>
        </tr>';
    }
} else {
    // Se a consulta falhar, exiba uma mensagem de erro ou trate o erro de outra forma
    echo "Erro na consulta: " . mysqli_error($conect);
}
?>

            </tbody>
        </table>
    </div>
</body>
</html>
