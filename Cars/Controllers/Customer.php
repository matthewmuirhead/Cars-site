<?php
namespace Cars\Controllers;
class Customer {

	public function __construct() {
	}

  public function about() {
		return [
			'template' => 'about.html.php',
			'variables' => [],
			'title' => 'Claires\'s Cars - About'
		];
	}

  public function contact() {
		return [
			'template' => 'contact.html.php',
			'variables' => [],
			'title' => 'Claires\'s Cars - Contact'
		];
	}
}
