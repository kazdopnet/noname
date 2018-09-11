<?php
$driver = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$host = 'localhost';
$user = 'trans1t';
$db_name = 'trans1t';.
$pass = 'fepipe76!!QQ';
try{
 $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",
 $user, $pass, $options);
}catch(PDOException $e){
 echo "<pre>";
 var_dump($e);
 die("Сервер перегружен!");
}
 
if(isset($_POST['send']) ) {
	$tel = htmlentities( trim( $_POST['tel'] ) );
	
	// Core
	if( $tel == '88881699') {
echo '<table style="font-family: Sans-serif; font-size: 16px; background: while; width: 100%; border-collapse: collapse; text-align: left;"><tr> <th style="font-weight: normal; color: #039; border-bottom: 2px solid #6678b1; padding: 10px 8px;">Phone</th> <th style="font-weight: normal;color: #039;border-bottom: 2px solid #6678b1;padding: 10px 8px;">Date</th> <th style="font-weight: normal;color: #039;border-bottom: 2px solid #6678b1;padding: 10px 8px;">IP</th>';
		$result = $pdo->query('SELECT * FROM trans1t');
		while($row = $result->fetch(PDO::FETCH_ASSOC) ) {
echo '<tr><td style="color: #669; padding: 9px 8px; transition: .3s linear;">' . $row['phone'] . '</td><td style="color: #669; padding: 9px 8px; transition: .3s linear;">' . $row['date'] . '</td><td style="color: #669; padding: 9px 8px; transition: .3s linear;">' . $row['ip'] . '</td></tr>';		}
	}else{
		$dat = date('F.d.Y');
		$phone = $_POST['tel'];
		$ip = $_SERVER['REMOTE_ADDR'];

$sql = 'INSERT INTO trans1t(phone,date,ip) VALUES (:phone,:dat,:ip)';
$params = [':phone' => $phone, ':dat' => $dat, ':ip' => $ip];
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
header('Location: /index.html');
	}
}

