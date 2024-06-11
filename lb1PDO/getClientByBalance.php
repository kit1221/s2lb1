<?php 
require 'connect.php';
try {
  $sth = $dbh->prepare('SELECT name, ip, balance FROM client WHERE balance <= 0');
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $item){
    echo '<li> Користувач ' . $item['name'] . ' з айпі адресою ' . $item['ip'] . ' має баланс ' . $item['balance'] . '</li>';
  }
} catch (PDOException $e) {
  echo $e->getMessage(); 
}
?>