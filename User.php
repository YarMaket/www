<?php

class User
{
	private $id;
	private $name;
	private $email;
	private $password;
	private $created_at;

	// Конструктор класса, принимающий параметры id, имя, email, пароль и создающий нового пользователя.
	public function __construct($id, $name, $email, $password, $created_at = null)
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

		// Если дата создания не передана, используем текущую дату и время.
		$this->createdAt = $created_at ? new DateTime($created_at) : new DateTime();
	}

	// Метод для получения даты и времени создания текущего объекта (пользователя).
	public function getCreatedAt()
	{
		return $this->createdAt->format('Y-m-d H:i:s');
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


	// Добавим геттер для получения имения пользователя.
	public function getName()
	{
		return $this->name;
	}

	// Добавим геттер для получения даты создания пользователя (метод getCreatedAt уже есть в классе User).
	public function getCreatedAtDateTime()
	{
		return new DateTime($this->getCreatedAt());
	}
}

?>
