<?php
require_once "employee.php";                                                           //подключили файл с классом

try{
$ivan = new Employee(-1.2, "Ivan", 40000, "16-08-2010");                               //создание 1 сотрудника
echo "Стаж сотрудника ".$ivan->name." в организации ".$ivan->getAge()." лет<br/>";     //вывели для проверки стажа 1 сотрудника
} catch (InvalidArgumentException $m) {
    echo "Ошибка при создании сотрудника 1: ".$m->getMessage()."<br/>";               //вывод ошибки при создании сотрудника 1
}
$alex = new Employee(2, "Alex", 50000, "12-03-2008");                                  //создание 2 сотрудника
echo "Стаж сотрудника ".$alex->name." в организации ".$alex->getAge()." лет<br/>";     //вывели для проверки стажа 2 сотрудника
$vlad = new Employee(3, "Vlad", 60000, "19-09-2007");                                  //создание 3 сотрудника
echo "Стаж сотрудника ".$vlad->name." в организации ".$vlad->getAge()." лет<br/>";     //вывели для проверки стажа 23 сотрудника
?>