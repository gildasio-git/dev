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

// Busca imagens
$sql = "SELECT * FROM images WHERE status='ativo'";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrossel de Imagens</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .carousel-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: calc(100vw * <?php echo count($images); ?>); /* Largura do carrossel baseada no número de imagens */
            height: 100vh;
        }

        .carousel img {
            width: 100vw;
            height: 100vh;
            object-fit: contain;
        }

        .carousel-bullets {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .bullet {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ccc;
            margin: 0 5px;
            cursor: pointer;
        }

        .bullet.active {
            background: #333;
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <div class="carousel">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <img src="<?php echo $image['file_path']; ?>" alt="<?php echo $image['title']; ?>">
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma imagem disponível</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="carousel-bullets">
        <?php foreach ($images as $index => $image): ?>
            <span class="bullet" data-index="<?php echo $index; ?>"></span>
        <?php endforeach; ?>
    </div>

    <script>
    const carousel = document.querySelector('.carousel');
    const images = document.querySelectorAll('.carousel img');
    const bullets = document.querySelectorAll('.bullet');
    let index = 0;
    let interval;

    // Função para atualizar o carrossel
    function updateCarousel() {
        const imageWidth = window.innerWidth; // Pega a largura da janela
        carousel.style.transform = `translateX(-${index * imageWidth}px)`; // Movimenta o carrossel para a posição correta
        updateBullets();
    }

    // Atualiza os bullets para mostrar qual imagem está ativa
    function updateBullets() {
        bullets.forEach((bullet, i) => {
            bullet.classList.toggle('active', i === index);
        });
    }

    // Muda para a próxima imagem
    function nextImage() {
        index = (index + 1) % images.length; // Loop infinito
        updateCarousel();
    }

    // Inicia o slide automático
    function startAutoSlide() {
        interval = setInterval(nextImage, 3000); // Muda a cada 3 segundos
    }

    // Para o slide automático
    function stopAutoSlide() {
        clearInterval(interval);
    }

    // Inicia o slide automaticamente
    startAutoSlide();

    // Adiciona evento de clique nos bullets
    bullets.forEach(bullet => {
        bullet.addEventListener('click', (e) => {
            index = parseInt(e.target.getAttribute('data-index')); // Atualiza o índice ao clicar em um bullet
            updateCarousel();
            stopAutoSlide(); // Para o slide automático ao clicar
            setTimeout(startAutoSlide, 5000); // Reinicia o slide automático após 5 segundos
        });
    });

    // Reajusta o carrossel ao redimensionar a janela
    window.addEventListener('resize', updateCarousel);
    </script>

</body>
</html>

<?php
$conn->close();
?>