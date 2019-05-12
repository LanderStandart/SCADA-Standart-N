<?php
return 
 array (
 	'dashboard'=>[
 		'root'=>'',
 		'admin'=>'0',
 		'title'=>'Сервисы',
 		'href'=>'#',
 		'childs'=> [
 			'sinhro'=> [
 				'id'=>'',
 				'admin'=>'0',
 				'title'=>'Мониторинг синхронизации',
 				'href'=>'./index.php'
 				],
 			'Malohod'=>[
 				'admin'=>'0',
 				'title'=>'Малоходовка',
 				'href'=>'./Malohod.php'
 				],
 			'OZ'=>[
 				'admin'=>'1',
 				'title'=>'Общий заказ',
 				'href'=>'#'	
 				,
 				'child'=> [
 					'supp'=> [
	 					'id1'=>'',
	 					'admin'=>'1',
	 					'title'=>'Поставщики',
	 					'href'=>'./index.php'
 						],
 					'ozclient'=> [
	 					
	 					'admin'=>'1',
	 					'title'=>'Получатели',
	 					'href'=>'./index.php'
 						]	
 					]


 				]
 			]
 				
 		],
 	'Setting'=>[
 		'root'=>'',
 		'admin'=>'0',
 		'title'=>'Настройки',
 		'href'=>'#',
 		'childs'=> [
 			'serverlist'=> [
 				'id'=>'',
 				'admin'=>'0',
 				'title'=>'Серверы синхронизации',
 				'href'=>'./serverlist.php'
 				],
 			'adduser'=> [
 				'admin'=>'1',
 				'title'=>'Добавить пользователя',
 				'href'=>'./reg_user.php'
 				]	
 			]
 		],
 	'FAQ'=>[
 		'root'=>'1',
 		'admin'=>'0',
 		'title'=>'F.A.Q. Ошибки синхронизации',
 		'href'=>'./faq_sinhro.php',
 		'childs'=>'']

 		
 	)	
 	




 
?>