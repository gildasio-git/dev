<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $target_dir = "/opt/lampp/htdocs/sites/transcribe/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Verifique se o arquivo temporário existe
    if (!file_exists($_FILES["fileToUpload"]["tmp_name"])) {
        echo "Erro: Arquivo temporário não encontrado.";
        exit;
    }

    // Verifique se o diretório de destino é gravável
    if (!is_writable($target_dir)) {
        echo "Erro: Diretório de destino não é gravável.";
        exit;
    }

    // Mova o arquivo
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Arquivo enviado com sucesso para: " . $target_file;
        $command = "sudo -u www-data transcribe_anything \"$target_file\" > \"$target_dir/transcricoes/". basename($_FILES["fileToUpload"]["name"], ".mp4") .".txt\"" ."<br>";
        shell_exec($command);
    } else {
        echo "Erro ao mover o arquivo.";
        echo "<br>Arquivo Temporário: " . $_FILES["fileToUpload"]["tmp_name"];
        echo "<br>Arquivo Destino: " . $target_file;
    }
} else {
    echo "Nenhum arquivo enviado.";
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <button type="submit">Enviar</button>
</form>
