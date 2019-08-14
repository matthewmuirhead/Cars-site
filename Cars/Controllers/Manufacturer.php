<?php
namespace Cars\Controllers;
class Manufacturer {
	private $manufacturersTable;

	public function __construct($manufacturersTable) {
		$this->manufacturersTable = $manufacturersTable;
	}

	function list() {
		$manufacturerVariables = [];
    $variables = [$manufacturerVariables];
    $i=0;

		$manufacturerList = $this->manufacturersTable->findAll();

    foreach ($manufacturerList as $manufacturer) {
      $manufacturerVariables = [
        'id' => $manufacturer['id'],
				'name' => $manufacturer['name']
      ];
      $variables[$i++] = $manufacturerVariables;
    }

		return [
			'template' => '/admin/manufacturers.html.php',
			'variables' => $variables,
			'title' => 'Claires\'s Cars - Manufacturers'
		];
	}

	function addManufacturer() {
		return [
			'template' => '/admin/addmanufacturer.html.php',
			'variables' => [],
			'title' => 'Claires\'s Cars - Manufacturers'
		];
	}

	function addManufacturerSubmit() {
		$this->manufacturersTable->save($_POST['manufacturer']);
		header('location: /admin/manufacturers');
	}

	function editManufacturer() {
		$manufacturer = $this->manufacturersTable->find('id', $_GET['id']);
		$variables = [
			'id' => $manufacturer[0]['id'],
			'name' => $manufacturer[0]['name']
		];

		return [
			'template' => '/admin/editmanufacturer.html.php',
			'variables' => $variables,
			'title' => 'Claires\'s Cars - Manufacturers'
		];
	}

	function editManufacturerSubmit() {
		$this->manufacturersTable->save($_POST['manufacturer']);
		header('location: /admin/manufacturers');
	}

	function removeManufacturer() {
		$this->manufacturersTable->delete($_POST['id']);
		header('location: /admin/manufacturers');
	}
}
