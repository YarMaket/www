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

	// Метод для валидации параметра id
	private function validateId($id)
	{
		if (!is_int($id) || $id <= 0) {
			throw new InvalidArgumentException("Недопустимый идентификатор пользователя. Идентификатор пользователя должен быть положительным целым числом.");
		}
	}
	// Метод для валидации параметра name
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
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException("Неверный адрес электронной почты.");
		}
	}
	// Метод для валидации параметра password.
	private function validatePassword($password)
	{
		if (strlen($password) < 5) {
			throw new InvalidArgumentException("Длина пароля должна составлять не менее 5 символов.");
		}
	}
}
?>