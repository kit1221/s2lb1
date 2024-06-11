<?php 
require 'connect.php';
$start = $_GET['start'];
$stop = $_GET['stop'];
try {
  $sth = $dbh->prepare('SELECT c.login , s.start, s.stop, s.in_traffic, s.out_traffic FROM client c JOIN seanse s ON c.id_client = s.fid_client WHERE s.start >= :start AND s.stop <= :stop');
  $sth->bindParam(':start', $start);
  $sth->bindParam(':stop', $stop);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $item){
    $trafficDifference = $item['out_traffic'] - $item['in_traffic'];
    echo '<li> Користувач з логіном ' . $item['login'] . ' має останній сеанс з ' . $item['start'] . ' по ' . $item['stop'] . ' використав ' . $trafficDifference .'</li>';
  }
} catch (PDOException $e) {
  echo $e->getMessage(); 
}
?>