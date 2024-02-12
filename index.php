<?php
require_once "Z:\home\u270067_lab1\www\Vendor\autoload.php";
require_once "user.php";                                                          

try {
	// Создаем пользователя с валидными данными.
	$user1 = new User(1, 'Корнюшин Сергей', 'serg33@mail.ru', 'qwerty123');
	echo "Пользователь 1 создан в: " . $user1->getCreatedAt() . "\n"."<br/>";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 1: " . $e->getMessage() . "\n"."<br/>";
}

try {
	// Создаем пользователя с невалидными данными (короткий пароль).
	$user2 = new User(2, 'Сазонов Антон', 'saz25@mail.ru', '1234');
	echo "Пользователь 2 создан в: " . $user2->getCreatedAt() . "\n"."<br/>";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 2: " . $e->getMessage() . "\n"."<br/>";
}

try {
	// Создаем пользователя с валидными данными.
	$user3 = new User(3, 'Корнев Дмитрий', 'dima@mail.ru', '23095864');
	echo "Пользователь 3 создан в: " . $user3->getCreatedAt() . "\n"."<br/>";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 3: " . $e->getMessage() . "\n"."<br/>";
}
?>