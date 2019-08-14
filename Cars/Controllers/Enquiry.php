<?php
namespace Cars\Controllers;
class Enquiry {
  private $enquiriesTable;
  private $staffTable;

	public function __construct($enquiriesTable, $staffTable) {
    $this->enquiriesTable = $enquiriesTable;
    $this->staffTable = $staffTable;
	}

  function enquire() {
    $this->enquiriesTable->save($_POST['enquiry']);
    return [
      'template' => 'contact.html.php',
      'variables' => $variable = ['submit' => 'submitted'],
      'title' => 'Claires\'s Cars - Contact'
    ];
  }

  function list() {
    $resultsList = array();
    $i=0;

    $enquiries = $this->enquiriesTable->findAll();
    foreach ($enquiries as $enquiry) {
      $staffMember = "";
      if (isset($enquiry['staff_id'])) {
        $staffList = $this->staffTable->find('id', $enquiry['staff_id']);
        foreach ($staffList as $staff) {
          $staffMember = $staff['name'];
        }
      }
      

      $results = [
        'name' => $enquiry['name'],
        'contact_number' => $enquiry['contact_number'],
        'contact_email' => $enquiry['contact_email'],
        'enquiry' => $enquiry['enquiry'],
        'completed' => $enquiry['completed'],
        'id' => $enquiry['id'],
        'staff_name' => $staffMember
      ];
      $resultsList[$i++] = $results;
    }


    return [
      'template' => 'admin/enquiries.html.php',
      'variables' => $resultsList,
      'title' => 'Claires\'s Cars - Contact'
    ];
  }

  function complete() {
    $enquiry = [
      'id' => $_POST['id'],
      'completed' => 'yes',
      'staff_id' => $_SESSION['id']
    ];
    $this->enquiriesTable->save($enquiry);
    header('location: /admin/enquiries');
  }

  function uncomplete() {
    $enquiry = [
      'id' => $_POST['id'],
      'completed' => 'no'
    ];
    $this->enquiriesTable->save($enquiry);
    header('location: /admin/enquiries');
  }

  function delete() {
    $this->enquiriesTable->delete($_POST['id']);
    header('location: /admin/enquiries');
  }
}
