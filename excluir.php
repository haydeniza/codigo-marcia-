<?php 
include("conexao.php");
error_reporting(0);

$ex = $_GET["ex"];
if (isset($ex)) {
    // Utilizando prepared statement para evitar injeção de SQL
    $stmt = mysqli_prepare($conect, "DELETE FROM teste WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $ex);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) > 0){
        echo "<script>
        alert ('Seu cadastro foi excluído com sucesso!');
        window.location='index.php';
        </script>";
    } else {
        echo "Erro ao deletar os dados. " . mysqli_error($conect);
    }
    mysqli_stmt_close($stmt);
}
?>
