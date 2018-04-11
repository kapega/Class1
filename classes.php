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
			echo 'Автомобиль ' . $this->model . ' доступен в регионе ' . $this->region . ' по цене ' . $this->price . ' рублей.<br>';
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
			echo 'В наличие имеется телевизор ' . $this->model . ' диагональю ' . $this->diagonal . ' дюймов по цене '  . $this->price . '.<br>';
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
			echo 'Нужно купить ' . $this->amount . ' ручки ' . $this->color . ' цвета.<br>';
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
			if ($this->color == 'белый' && $this->size == 'big') 
			{
				return 'Это же Гадкий утёнок!<br>';
			} else {
					return "Этот $this->color утёнок нормально выглядит. <br>";
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
			if ($this->amount < 10) 
			{
				return 'Стоимость билета по направлению <strong>' . $this->name . '</strong> на данный момент равна ' . round($this->price + ($this->price * 0.5)) . '.<br>'; 
			} elseif ($this->amount > 90) {
					return 'Стоимость билета по направлению <strong>' . $this->name . '</strong> на данный момент равна ' . round($this->price - ($this->price * 0.5)) . '.<br>'; 
				} else {
						return 'Стоимость билета по направлению <strong>' . $this->name . '</strong> на данный момент равна ' . $this->price . '.<br>';
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
$Picanto = new Car('Kia Picanto', 'Нижний Новгород', 550000);
?>

<h1>Телевизор</h1>
<?php 
$samsung = new TV('Samsung', 40, 100000);
$lg = new TV('LG', 42, 120000);
?>

<h1>Шариковая ручка</h1>
<?php 
$bluepen = new Pen('синего', 4);
$greenpen = new Pen('зеленого', 2);
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