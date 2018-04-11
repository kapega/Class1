<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	class ParentClass
	{
		public $price;
		public $name;
	}
	
	interface CarInt
	{
		public function getPrice();
	}
	
	interface TVInt
	{
		public function getPrice();
	}

	interface PenInt
	{
		public function getAmount();
	}

	interface DuckInt
	{
		public function checkUgly();
	}

	interface ProductInt
	{
		public function getPrice();
	}

	
	class Car extends ParentClass implements CarInt
	{
		public $region; 
		
		public function __construct($name, $region, $price)
		{
			$this->name = $name;
			$this->region = $region;
			$this->price = $price;
			echo 'Автомобиль ' . $this->name . ' доступен в регионе ' . $this->region . ' по цене ' . $this->price . ' рублей.<br>';
		}
		
		public function getPrice()
		{
			return 'Получи нереальную скидку сейчас и купи ' . $this->name . ' по цене ' . round($this->price / 1.2) . ' рублей. <br>';
		}
	}

	class TV extends ParentClass implements TVInt
	{
		public $diagonal; 
		
		public function __construct($name, $diagonal, $price)
		{
			$this->name = $name;
			$this->diagonal = $diagonal;
			$this->price = $price;
			echo 'В наличие имеется телевизор ' . $this->name . ' диагональю ' . $this->diagonal . ' дюймов по цене '  . $this->price . '.<br>';
		}
		
		public function getPrice()
		{
			return 'Цена для продажи: ' . $this->price * 2 . ' рублей. <br>';
		}
	}

	class Pen extends ParentClass implements PenInt
	{
		public $color;
		public $amount;
		
		public function __construct($name, $color, $amount)
		{
			$this->name = $name;
			$this->color = $color;
			$this->amount = $amount;
			 'Нужно купить ' . $this->amount . ' ручки ' . $this->color . ' цвета.<br>';
		}
		
		public function getAmount()
		{
			if ($this->amount < 10) 
			{
				return 'Нужно купить ручек <strong>' . $this->name . '</strong> в количестве 100 штук.<br>'; 
			} else {
					return 'Ручек <strong>' . $this->name . '</strong> покупать не нужно.<br>'; 
			}
		}
	}

	class Duck extends ParentClass implements DuckInt
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

	class Product extends ParentClass implements ProductInt
	{
		public $amount;
		
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
$bluepen = new Pen('Bruno','синего', 90);
echo $bluepen->getAmount();
$greenpen = new Pen('Ben', 'зеленого', 2);
echo $greenpen->getAmount();
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