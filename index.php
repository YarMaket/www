<?php
require_once "Z:\home\u270067_lab1\www\Vendor\autoload.php";
require_once "user.php";                                                          
require_once "comment.php";

// Создаем пользователей
$user1 = new User(1, 'Корнюшин Сергей', 'serg33@mail.ru', 'qwerty123', '2023-11-11 12:00:00');
$user2 = new User(2, 'Сазонов Антон', 'saz25@mail.ru', '1234', '2023-11-25 12:00:00');
$user3 = new User(3, 'Корнев Дмитрий', 'dima@mail.ru', '23095864','2023-11-25 12:00:00');

// Создаем комментарии
$comment1 = new Comment($user1, 'Excellent!');
$comment2 = new Comment($user2, 'Terrible!');
$comment3 = new Comment($user1, 'Awesome!');
$comment4 = new Comment($user3, 'Good');

// Помещаем комментарии в массив
$comments = [$comment1, $comment2, $comment3, $comment4];

// Задаем дату и время, после которых будем выводить комментарии
$datetime = new DateTime('2023-11-23 00:00:00');

// Проходим по всем комментариям и выводим те, у которых пользователь был создан после $datetime
foreach ($comments as $comment) {
	if ($comment->getUser()->getCreatedAtDateTime() > $datetime) {
		echo "Пользователь: " . $comment->getUser()->getName() . "\n";
		echo "Комментарий: " . $comment->getText() . "\n";
		echo "Написан в: " . $comment->getCreatedAt() . "\n";
		echo "\n";
	}
}
?>