<?php

class Animal implements AnimalInterafce
{
    //private, protected, public
    public static $name = 'Animal'; //Attributes

    public function __construct() //Constructor: Hàm khởi tạo
    {
    }

    public function keu()
    {
        return 'Dong vat keu';
    }

    public function eat()
    {
        return 'Dong vat an';
    }
}

class Dog extends Animal
{
    public function keu()
    {
        return 'Cho sua gau gau';
    }
}

class Cat extends AnimalAbstract
{
    public function keu()
    {
        return 'Meo keu meo meo';
    }
}

interface AnimalInterafce
{
    public function keu();
    public function eat();
}

abstract class AnimalAbstract
{
    abstract public function keu();
}


$dog = new Dog();
echo $dog->keu();

echo '<br>';
$cat = new Cat();
echo $cat->keu();

// Bài tập

// khai báo 1 lớp trừu tượng Car, 
// Định nghĩa 2 lớp con là Vinfast và Mazda. 
// Tạo ra method để get car color 