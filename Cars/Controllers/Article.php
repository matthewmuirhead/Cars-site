<?php
namespace Cars\Controllers;
class Article {
  private $articlesTable;

	public function __construct($articlesTable) {
    $this->articlesTable = $articlesTable;
	}

  public function home() {
    require '../database.php';
    $stmt = $pdo->prepare('SELECT * FROM articles ORDER BY publish_date ASC LIMIT 10');
    $stmt->execute();

		return [
			'template' => 'home.html.php',
			'variables' => $stmt->fetchAll(),
			'title' => 'Claires\'s Cars - Home'
		];
	}

  function list() {
    require '../database.php';
    $stmt = $pdo->prepare('SELECT * FROM articles ORDER BY publish_date ASC');
    $stmt->execute();

		return [
			'template' => 'admin/articles.html.php',
			'variables' => $stmt->fetchAll(),
			'title' => 'Claires\'s Cars - Home'
		];
  }

  function add() {
    return [
      'template' => 'admin/addarticle.html.php',
      'variables' => [],
      'title' => 'Claires\'s Cars - Home'
    ];
  }

  function edit() {
    return [
      'template' => 'admin/editarticle.html.php',
      'variables' => $this->articlesTable->find('id', $_GET['id'])[0],
      'title' => 'Claires\'s Cars - Home'
    ];
  }

  function delete() {
    $this->articlesTable->delete($_POST['id']);
    header('location: /admin/articles');
  }

  function addsubmit() {
    $this->addSave($_POST['article']);

    header('location: /admin/articles');
  }

  public function addSave($article) {
    $this->articlesTable->save($article);

    if ($_FILES['image']['error'] == 0) {
			$fileName = $this->articlesTable->getLastInsertID() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/articles/' . $fileName);
		}
  }

  function editsubmit() {
    $this->articlesTable->save($_POST['article']);

    if ($_FILES['image']['error'] == 0) {
			$fileName = $_POST['article']['id'] . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/articles/' . $fileName);
		}

    header('location: /admin/articles');
  }
}
