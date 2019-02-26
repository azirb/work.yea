<?php require "db.php"; $_SESSION['log_in']=false; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>ОЭЗиС</title>
<link rel="shortcut icon" href="/styles/icon.ico" type="image/png">
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<div class="main">
		<div class="wrapper_1">
			<a href='addpost.php' class="button1" >Создание заявки</a>
			<a href='login.php' class="button2">Просмотр заявки</a>
		    <a href='loginadm.php'class="button5">Панель Администратора</a>
		</div>
		<div class="wrapper_2">
		    <a href='http://192.168.32.6' class="button6">На главную</a>	
		</div>
		<div class="wrapper_3">
			<a href="#" class="button3">Количество заявок в работе: <?php echo not_achivment($orders); ?></a>
		    <a href="#" class="button4">Количество выполненых заявок: <?php echo achivment_for_month($orders);?></a>
		</div>
	</div>
</body>
</html>