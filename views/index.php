<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  <div class="p-4">
    <h1>Olá, Docker!</h1>

    <?php
    try {
      // nome do serviço definido no docker-compose-yml
      $host = $_ENV['DB_HOST'];
      $dbname = $_ENV['DB_NAME'];
      $dbuser = $_ENV['DB_USER'];
      $dbpass = $_ENV['DB_PASS'];
      $dns = 'mysql:host='.$host.';dbname='.$dbname.'';
      $conn = new PDO($dns, $dbuser, $dbpass);

      $query = $conn->query('select * from usuario');
      $query->execute();
      $data = $query->fetchAll();
      foreach ($data as $row) {
        ?>
        <?= $row['id'] . ' - ' . $row['nome'] ?>
        <br>
      <?php }
    } catch (PDOException $e) {
      echo '<p>'.$e->getMessage().'</p>';
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

</body>
</html>
