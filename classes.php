<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Car
{
    public $model;
    public $region;
    public $price;

    public function __construct($model, $region, $price)
    {
        $this->model = $model;
        $this->region = $region;
        $this->price = $price;
    }
	
    public function toString()
    {
        return "Автомобиль {$this->model} доступен в регионе {$this->region} по цене {$this->price} рублей.<br />";
    }
}

class TV
{
    public $model;
    public $diagonal;
    public $price;
	
    public function __construct($model, $diagonal, $price)
    {
        $this->model = $model;
        $this->diagonal = $diagonal;
        $this->price = $price;
    }
	
    public function toString()
    {
        return "В наличие имеется телевизор {$this->model} диагональю {$this->diagonal} дюймов по цене {$this->price} рублей.<br />";
    }
}

class Pen
{
    public $color;
    public $amount;
	
    public function __construct($color, $amount)
    {
        $this->color = $color;
        $this->amount = $amount;
    }
	
    public function toString()
    {
        return "Нужно купить {$this->amount} ручки {$this->color} цвета.<br />";
    }
}

class Duck
{
    public $color;
    public $size;

    public function __construct($color, $size)
    {
        $this->color = $color;
        $this->size = $size;
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

class Product
{
    public $name;
    public $amount;
    public $price;

    public function __construct($name, $amount, $price)

    {
        $this->name = $name;
        $this->amount = $amount;
        $this->price = $price;
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
echo $Megane->toString();
$Picanto = new Car('Kia Picanto', 'Нижний Новгород', 550000);
echo $Picanto->toString();
?>

<h1>Телевизор</h1>
<?php
$samsung = new TV('Samsung', 40, 100000);
echo $samsung->toString();
$lg = new TV('LG', 42, 120000);
echo $lg->toString();
?>

<h1>Шариковая ручка</h1>
<?php
$bluepen = new Pen('синего', 4);
echo $bluepen->toString();
$greenpen = new Pen('зеленого', 2);
echo $greenpen->toString();
?>

<h1>Утка</h1>
<?php
$ugly_duck = new Duck('белый', 'big');
echo $ugly_duck->checkUgly();
$simple_duck = new Duck('серый', 'normal');
echo $simple_duck->checkUgly();
$white_duck = new Duck('белый', 'normal');
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