<?php

// Подключаем файл с классом User
require_once 'User.php';

class Comment
{
	private $user;
	private $text;
	private $createdAt;

	public function __construct(User $user, $text)
	{
		$this->user = $user;
		$this->text = $text;
		$this->createdAt = $user->getCreatedAtDateTime();
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getText()
	{
		return $this->text;
	}

	public function getCreatedAt()
	{
		return $this->createdAt->format('Y-m-d H:i:s');
	}
}
?>
