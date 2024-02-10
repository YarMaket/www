<?php
class Employee{               //создали класс
    public $id;               
    public $name;
    public $sal;
    public $date;

    public function __construct($id, $name, $sal, $date){        //конструктор класса
        $this->validateId($id);                                  
        $this->validateName($name);  
        $this->validateSal($sal); 
        $this->validateDate($date); 
        
        $this->id = $id;
        $this->name = $name;
        $this->sal = $sal;
        $this->date = $date;
    }
    public function getAge() {                       //метод возврата опыта сотрудника в организации
        return floor((strtotime(date('d-m-Y')) - strtotime($this->date))/(60*60*24*365.2421896));
    }
    public function validateId($id){
        if ($id <= 0 || !is_int($id)) {
            throw new InvalidArgumentException("Неправильно введен ID, ID должен быть целым числом от 1 и выше.");
        }
    }
    public function validateName($name){
        if (strlen($name) < 2 || strlen($name) >30) {
            throw new InvalidArgumentException("Неправильно введено Имя, Имя должно быть словом от 2 до 30 символов.");
        }
    }
    public function validateSal($sal){
        if ($sal < 0  || is_string($sal) ) {
            throw new InvalidArgumentException("Неправильно введена Зарплата, Зарплата должна быть неотрицательным числом.");
        }
    }
    public function validateDate($date){
        if (empty($date)) {
            throw new InvalidArgumentException("Дата не заполнена.");
        }
    }
}
?>