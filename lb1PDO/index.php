<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pdo</title>
</head>
<body>
  <h3> Виведення даних:</h3>
  <div>
    Отримати сеанси роботи в мережі для обраного клієнта
    <form action="./getSessionByClient.php">
      <select name="clientId" id="clientId">
        <?php
        require 'connect.php';
        $sth = $dbh->prepare("SELECT name, ID_Client FROM client");
        $sth->execute();
        $clients = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($clients as $client) {
          echo "<option value=" . $client["ID_Client"] . ">" . $client["name"] . "</option>";
        } 
        ?>
      </select>
      <button type="submit">Опрацювати</button>
    </form>
  </div>

  <div> 
    Отримати сеанси роботи в мережі за вказаний проміжок часу
    <form action="./getSessionByTime.php">
      <input type="time" id="start" name="start" required/>
      <input type="time" id="stop" name="stop" required/>
      <button type="submit">Опрацювати</button>
    </form>
  </div>

  <div>
    Отримати список клієнтів з від'ємним балансом рахунку
    <form action="./getClientByBalance.php">
      <button type="submit">Опрацювати</button>
    </form>
  </div>
</body>
</html>