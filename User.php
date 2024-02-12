<?php

class User
{
	private $id;
	private $name;
	private $email;
	private $password;
	private $createdAt;

	// Конструктор класса, принимающий параметры id, имя, email, пароль и создающий нового пользователя.
	public function __construct($id, $name, $email, $password)
	{
		// Вызываем методы валидации для каждого из параметров.
		$this->validateId($id);
		$this->validateName($name);
		$this->validateEmail($email);
		$this->validatePassword($password);

		// Присваиваем значения свойствам объекта.
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;

		// Устанавливаем дату и время создания пользователя.
		$this->createdAt = new DateTime();
	}

	// Метод для получения даты и времени создания текущего объекта (пользователя).
	public function getCreatedAt()
	{
		return $this->createdAt->format('d-m-Y H:i:s');
	}

	// Метод для валидации параметра id.
	private function validateId($id)
	{
		// Проверяем, что id является положительным целым числом.
		if (!is_int($id) || $id <= 0) {
			throw new InvalidArgumentException("Недопустимый идентификатор пользователя. Идентификатор пользователя должен быть положительным целым числом.");
		}
	}

	// Метод для валидации параметра name.
	private function validateName($name)
	{
		// Проверяем, что имя не пустое.
		if (empty($name)) {
			throw new InvalidArgumentException("Имя не может быть пустым.");
		}
	}

	// Метод для валидации параметра email.
	private function validateEmail($email)
	{
		// Используем встроенную функцию PHP для проверки корректности email.
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException("Неверный адрес электронной почты.");
		}
	}

	// Метод для валидации параметра password.
	private function validatePassword($password)
	{
		// Пример простой валидации пароля. Можно добавить более сложные правила.
		if (strlen($password) < 6) {
			throw new InvalidArgumentException("Длина пароля должна составлять не менее 6 символов.");
		}
	}
}

// Пример использования:
try {
	// Создаем пользователя с валидными данными.
	$user1 = new User(1, 'Иван Иванов', 'ivan@mail.ru', 'password123');
	echo "Пользователь 1 создан в: " . $user1->getCreatedAt() . "\n";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 1: " . $e->getMessage() . "\n";
}

try {
	// Создаем пользователя с невалидными данными (короткий пароль).
	$user2 = new User(2, 'Петр Петров', 'petr@mail.ru', 'pass');
	echo "Пользователь 2 создан в: " . $user2->getCreatedAt() . "\n";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 2: " . $e->getMessage() . "\n";
}

try {
	// Создаем пользователя с валидными данными.
	$user3 = new User(3, 'Дмитрий Дмитров', 'dima@mail.ru', 'password456');
	echo "Пользователь 3 создан в: " . $user3->getCreatedAt() . "\n";
} catch (InvalidArgumentException $e) {
	// Обрабатываем исключение и выводим ошибку.
	echo "Ошибка при создании пользователя 3: " . $e->getMessage() . "\n";
}


?>
