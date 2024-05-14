<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("conexao.php");
error_reporting(E_ALL); // Remover a supressão de erros para depuração

$up = $_GET["up"]; // Verifica se a variável up foi passada via GET
if(isset($up)) {
    $sql = "SELECT nome, cidade FROM teste WHERE id='$up'";
    $res = mysqli_query($conect, $sql,$res);

    while ($r = mysqli_fetch_array($res)) {
        echo '<form method="POST">
            <table>
                <tr>
                    <td width="100">
                        <label>Nome</label>
                    </td>
                    <td><input name="nome" value="' . $r['nome'] . '" type="text"></td>
                </tr>
                <tr>
                    <td width="100">
                        <label>Cidade</label>
                    </td>
                    <td><input name="cidade" value="' . $r['cidade'] . '" type="text"></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="update" value="Atualizar"></td>
                </tr>
            </table>
        </form>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cidade = $_POST["cidade"];
        $update = $_POST["update"];

        if (isset($update)) {
            $altera = "UPDATE teste SET nome='$nome', cidade='$cidade' WHERE id='$up'";
            if(mysqli_query($conect,$altera,$res)) {
                echo "<script>
                    alert('Seu cadastro foi atualizado com sucesso!');
                </script>";
            } else {
                echo "Atualização falhou: " . mysqli_error($conect);
            }
        }
    }
} else {
    echo "ID não foi fornecido.";
}
?>
