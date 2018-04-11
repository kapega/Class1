<?php
	class News {
		protected $title;
		protected $content;
		
		public function __construct($title, $content) {
			$this->title = $title;
			$this->content = $content;
		}
		public function toString() {
			return "<h1>{$this->title}</h4>
			<div>{$this->content}</div>";
		}
	}

	class NewsBlock {
		protected $news;
		public function __construct() {
			$this->news = [];
		}
		public function append($news) {
			$this->news[] = $news;
		}
		public function toString() {
			$result = "";
			foreach ($this->news as $n) {
				$result .= $n->toString();
			}
				return $result;
		}
	}

	$nb = new NewsBlock();
	$nb->append(new News('заголовок','текст'));
	echo $nb->toString();
				