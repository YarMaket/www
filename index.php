<?php
require_once "Z:\home\u270067_lab1\www\Vendor\autoload.php";
require_once "employee.php";                                                           //подключили файл с классом



try{
$ivan = new Employee(1, "Ivan", 40000, "16-08-2010");                               //создание 1 сотрудника
echo "Стаж сотрудника ".$ivan->name." в организации ".$ivan->getAge()." лет<br/>";     //вывели для проверки стажа 1 сотрудника
} catch (InvalidArgumentException $m) {
    echo "Ошибка при создании сотрудника 1: ".$m->getMessage()."<br/>";               //вывод ошибки при создании сотрудника 1
}
try{
$alex = new Employee(2, "Alex", 50000 , "");                                  //создание 2 сотрудника
echo "Стаж сотрудника ".$alex->name." в организации ".$alex->getAge()." лет<br/>";     //вывели для проверки стажа 2 сотрудника
} catch (InvalidArgumentException $m) {
    echo "Ошибка при создании сотрудника 2: ".$m->getMessage()."<br/>";               //вывод ошибки при создании сотрудника 2
}
try{
$vlad = new Employee(3.2, "Vlad", 60000, "19-09-2007");                                  //создание 3 сотрудника
echo "Стаж сотрудника ".$vlad->name." в организации ".$vlad->getAge()." лет<br/>";     //вывели для проверки стажа 3 сотрудника
} catch (InvalidArgumentException $m) {
    echo "Ошибка при создании сотрудника 3: ".$m->getMessage()."<br/>";               //вывод ошибки при создании сотрудника 3
}
?>