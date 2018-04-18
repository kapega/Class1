<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// interfaces

interface HasPrice {
    public function getPrice();
}

interface HasAmount {
    public function getAmount();
}

interface Duckable {
    public function checkUgly();
}

// base classes

abstract class ParentClass
{
    public $name;

    abstract public function toString();
}

abstract class ClassWithPrice extends ParentClass implements HasPrice
{
    public $price;
}

// classes

class Car extends ClassWithPrice
{
    public $region;

    public function __construct($name, $region, $price)
    {
        $this->name = $name;
        $this->region = $region;
        $this->price = $price;
    }

    public function toString()
    {
        return "Автомобиль {$this->model} доступен в регионе {$this->region} по цене {$this->price} рублей.<br />";
    }

    public function getPrice()
    {
        return 'Получи нереальную скидку сейчас и купи ' . $this->name . ' по цене ' . round($this->price / 1.2) . ' рублей. <br />';
    }
}

class TV extends ClassWithPrice
{
    public $diagonal;

    public function __construct($name, $diagonal, $price)
    {
        $this->name = $name;
        $this->diagonal = $diagonal;
        $this->price = $price;
    }

    public function toString()
    {
        return "В наличие имеется телевизор {$this->model} диагональю {$this->diagonal} дюймов по цене {$this->price} рублей.<br />";
    }

    public function getPrice()
    {
        return 'Цена для продажи: ' . $this->price * 2 . ' рублей. <br />';
    }
}

class Pen extends ParentClass implements HasAmount
{
    public $color;
    public $amount;

    public function __construct($name, $color, $amount)
    {
        $this->name = $name;
        $this->color = $color;
        $this->amount = $amount;
    }

    public function toString()
    {
        return "Нужно купить {$this->amount} ручки {$this->color} цвета.<br />";
    }

    public function getAmount()
    {
        if ($this->amount < 10) {
            return 'Нужно купить ручек <strong>' . $this->name . '</strong> в количестве 100 штук.<br />';
        }
        else {
            return 'Ручек <strong>' . $this->name . '</strong> покупать не нужно.<br />';
        }
    }
}

class Duck extends ParentClass implements Duckable
{
    public $color;
    public $size;

    public function __construct($name, $color, $size)
    {
        $this->name = $name;
        $this->color = $color;
        $this->size = $size;
    }

    public function toString()
    {
        return "Это {$this->name}, цвет {$this->color} и размер {$this->size}.<br />";
    }

    public function checkUgly()
    {
        if ($this->color == 'белый' && $this->size == 'big') {
            return 'Это же Гадкий утёнок!<br />';
        }
        else {
            return "Этот {$this->color} утёнок нормально выглядит. <br />";
        }
    }
}

class Product extends ClassWithPrice
{
    public $amount;

    public function __construct($name, $amount, $price)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->price = $price;
    }

    public function toString()
    {
        return "Это {$this->name}, {$this->amount} штук по цене {$this->price}.<br />";
    }

    public function getPrice()
    {
        $str = "Стоимость билета по направлению <strong>{$this->name}</strong> на данный момент равна ";
        if ($this->amount < 10) {
            return $str . round($this->price + ($this->price * 0.5)) . '.<br />';
        }
        elseif ($this->amount > 90) {
            return $str . round($this->price - ($this->price * 0.5)) . '.<br />';
        }
        else {
            return $str . $this->price . '.<br />';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Классы</title>
<body>
<h1>Машина</h1>
<?php
$Megane = new Car('Renault Megane', 'Москва', 800000);
echo $Megane->getPrice();
$Picanto = new Car('Kia Picanto', 'Нижний Новгород', 550000);
echo $Picanto->getPrice();
?>

<h1>Телевизор</h1>
<?php
$samsung = new TV('Samsung', 40, 100000);
echo $samsung->getPrice();
$lg = new TV('LG', 42, 120000);
echo $lg->getPrice();
?>

<h1>Шариковая ручка</h1>
<?php
$bluepen = new Pen('Bruno', 'синего', 90);
echo $bluepen->getAmount();
$greenpen = new Pen('Ben', 'зеленого', 2);
echo $greenpen->getAmount();
?>

<h1>Утка</h1>
<?php
$ugly_duck = new Duck('Первая', 'белый', 'big');
echo $ugly_duck->checkUgly();
$simple_duck = new Duck('Вторая', 'серый', 'normal');
echo $simple_duck->checkUgly();
$white_duck = new Duck('Третья', 'белый', 'normal');
echo $white_duck->checkUgly();
?>

<h1>Товар</h1>
<?php
$ticket_NN_MSK = new Product('Нижний Новгород - Москва', 50, 1000);
echo $ticket_NN_MSK->getPrice();
$ticket_MSK_NVR = new Product('Москва - Новороссийск', 1, 4000);
echo $ticket_MSK_NVR->getPrice();
$ticket_Kaz_SPB = new Product('Казань - Санкт-Петербург', 91, 2000);
echo $ticket_Kaz_SPB->getPrice();
?>

</body>
</html>
