<?php
class Employee{               //создали класс
    public $id;               
    public $name;
    public $sal;
    public $date;

    public function __construct($id, $name, $sal, $date){        //конструктор класса

        $this->validateId($id);                                  //метод валидации

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
}
?>