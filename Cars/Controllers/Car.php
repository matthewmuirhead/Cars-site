<?php
namespace Cars\Controllers;
class Car {
	private $carsTable;
 	private $manufacturersTable;

	public function __construct($carsTable, $manufacturersTable) {
		$this->carsTable = $carsTable;
    	$this->manufacturersTable = $manufacturersTable;
	}

  public function carDetails($carList) {
    $carVariables = [];
    $variables = [$carVariables];
    $i=0;

    foreach ($carList as $car) {
			$manufacturer = $this->manufacturersTable->find('id', $car['manufacturerId']);
			$carVariables = [
				'id' => $car['id'],
				'model' => $car['name'],
				'make' => $manufacturer[0]['name'],
				'manufacturerId' => $car['manufacturerId'],
				'price' => $car['price'],
				'description' => $car['description'],
				'archive' => $car['archive'],
				'mileage' => $car['mileage'],
				'engine_type' => $car['engine_type'],
				'previous_price' => $car['previous_price'],
				'number_of_images' => $car['number_of_images'],
			];
			$variables[$i++] = $carVariables;
    }
    if ($i == 0) {
      header('location: /cars');
    }
    else {
      return $variables;
    }
  }

	public function manufacturerList() {
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
		return $variables;
	}

  public function listAll() {
    $carList = $this->carsTable->findAll();
    $variables = $this->carDetails($carList);

	$set[0] = $variables;

	$variables = [];
	$variables = $this->manufacturerList();

	$set[1] = $variables;

	$set[2] = 'Our Cars';

    return [
		'template' => 'cars.html.php',
		'variables' => $set,
		'title' => 'Claires\'s Cars - Our Cars'
	];
  }

  public function listByManufacturer() {
    if (!isset($_GET['id'])) {
      header('location: /cars');
    }
    $carList = $this->carsTable->find('manufacturerId', $_GET['id']);
    $variables = $this->carDetails($carList);

		$set[0] = $variables;

		$variables = [];
		$variables = $this->manufacturerList();

		$set[1] = $variables;

		$set[2] = 'Our Cars - '.$set[0][0]['make'];

    return [
			'template' => 'cars.html.php',
			'variables' => $set,
			'title' => 'Claires\'s Cars - Our Cars'
		];
  }

	public function adminCar() {
		$carList = $this->carsTable->findAll();
    $variables = $this->carDetails($carList);

    return [
			'template' => 'admin/cars.html.php',
			'variables' => $variables,
			'title' => 'Claires\'s Cars - Our Cars'
		];
	}

	public function addCar() {
		$variables = $this->manufacturerList();

		return [
			'template' => 'admin/addcar.html.php',
			'variables' => $variables,
			'title' => 'Claires\'s Cars - Our Cars'
		];
	}

	public function addCarSubmit() {
		$this->carsTable->save($_POST['car']);

		//http://www.javascripthive.info/php/php-multiple-files-upload-validation/

		$i=0;
		foreach($_FILES['files']['tmp_name'] as $key=>$tmp_name){
	    $temp = $_FILES['files']['tmp_name'][$key];

			$fileName = $this->carsTable->getLastInsertID() . '[' . $i++ . '].jpg';
	    if(empty($temp)) {
	        break;
	    }

	    move_uploaded_file($temp, '../public/images/cars/'.$fileName);
		}

		$car = [
			'id' => $this->carsTable->getLastInsertID(),
			'number_of_images' => $i,
			'archive' => 'no'
		];

		$this->saveCar($car);
	}

	public function editCar() {
		$carList = $this->carsTable->find('id', $_GET['id']);
    $variables = $this->carDetails($carList);

		$set[0] = $variables;

		$variables = [];
		$variables = $this->manufacturerList();

		$set[1] = $variables;

		return [
			'template' => 'admin/editcar.html.php',
			'variables' => $set,
			'title' => 'Claires\'s Cars - Edit Cars'
		];
	}

	public function editCarSubmit() {
		$i=0;
		foreach($_FILES['files']['tmp_name'] as $key=>$tmp_name){
	    $temp = $_FILES['files']['tmp_name'][$key];

			$fileName = $_POST['car']['id']. '[' . $i++ . '].jpg';
	    if(empty($temp)) {
	        break;
	    }

	    move_uploaded_file($temp, '../public/images/cars/'.$fileName);
		}

		$car = $_POST['car'];
		$car['number_of_images'] = $i;

		$this->saveCar($car);
	}

	public function saveCar($car) {
		$this->carsTable->save($car);
		header('location: /admin/cars');
	}

	public function removeCar() {
		$this->carsTable->delete($_POST['id']);
		header('location: /admin/cars');
	}

	public function archiveCar() {
		$archive = [
			'id' => $_POST['id'],
			'archive' => 'yes'
		];
		$this->carsTable->save($archive);
		header('location: /admin/cars');
	}

	public function relistCar() {
		$archive = [
			'id' => $_POST['id'],
			'archive' => 'no'
		];
		$this->carsTable->save($archive);
		header('location: /admin/cars');
	}
}
