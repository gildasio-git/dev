<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tib_avisos";

// Conexão com o banco
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura dados do formulário
$title = $_POST['title'];
$status = $_POST['status'];
$image = $_FILES['image'];

$file_path = 'uploads/' . basename($image['name']); // Caminho para salvar a imagem

// Move a imagem para o diretório especificado
if (move_uploaded_file($image['tmp_name'], $file_path)) {
    // Insere os dados no banco de dados
    $sql = "INSERT INTO images (title, file_path, status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $file_path, $status);
    
    if ($stmt->execute()) {
        echo "Imagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar imagem: " . $stmt->error;
    }
} else {
    echo "Erro ao mover o arquivo para o diretório de uploads.";
}

$stmt->close();
$conn->close();

