<?php
namespace Cars\Controllers;
class Admin {
	private $adminsTable;

	public function __construct($adminsTable) {
		$this->adminsTable = $adminsTable;
	}

  public function register() {

  }

  public function login() {
    return [
      'template' => 'admin/login.html.php',
			'title' => 'Log In',
			'variables' => []
		];
  }

  function loginSubmit() {
    $stmt = $this->adminsTable->findAll();
		$found = false;
    foreach ($stmt as $row) {
      if ($row['username'] == $_POST['username'] && $row['password'] == password_verify($_POST['password'], $row['password'])) {
        $_SESSION['loggedin'] = 'logged in';
				$_SESSION['id'] = $row['id'];
				$_SESSION['user'] = $row['name'];
				$_SESSION['access'] = $row['access_level'];
				$found = true;
        header('location: /admin/home');
      }
    }
		if ($found == false) {
			header('location: /admin/login');
		}
  }

  public function logout() {
    unset($_SESSION['loggedin']);
    session_destroy();

    header('location: /');
  }

  function home() {
    return [
      'template' => '/admin/home.html.php',
			'title' => 'Claire\'s Cars - Admin Home',
			'variables' => []
		];
  }

	function list() {
		return [
      'template' => '/admin/staff.html.php',
			'title' => 'Claire\'s Cars - Admin Home',
			'variables' => $this->adminsTable->findAll()
		];
	}

	function addstaff(){
		return [
      'template' => '/admin/addstaff.html.php',
			'title' => 'Claire\'s Cars - Admin Home',
			'variables' => []
		];
	}

	function editstaff(){
		return [
      'template' => '/admin/editstaff.html.php',
			'title' => 'Claire\'s Cars - Admin Home',
			'variables' => $this->adminsTable->find('id', $_GET['id'])[0]
		];
	}

	function save() {
		$staff = $_POST['staff'];
		$staff['password'] = password_hash($staff['password'], PASSWORD_DEFAULT);
		$this->adminsTable->save($staff);
		header('location: /admin/staff');
	}

	function deletestaff() {
		$this->adminsTable->delete($_POST['id']);
		header('location: /admin/staff');
	}
}
