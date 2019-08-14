<?php
namespace Cars;
class Routes implements \CSY2028\Routes {
  public function getRoutes() {
    require '../database.php';
    $carsTable = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
    $manufacturersTable = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
    $adminsTable = new \CSY2028\DatabaseTable($pdo, 'admins', 'id');
    $jobsTable = new \CSY2028\DatabaseTable($pdo, 'jobs', 'job_id');
    $enquiriesTable = new \CSY2028\DatabaseTable($pdo, 'enquiries', 'id');
    $articlesTable = new \CSY2028\DatabaseTable($pdo, 'articles', 'id');

    $carController = new \Cars\Controllers\Car($carsTable, $manufacturersTable);
    $manufacturerController = new \Cars\Controllers\Manufacturer($manufacturersTable);
    $adminController = new \Cars\Controllers\Admin($adminsTable);
    $customerController = new \Cars\Controllers\Customer();
    $articleController = new \Cars\Controllers\Article($articlesTable);
    $jobController = new \Cars\Controllers\Job($jobsTable);
    $enquiryController = new \Cars\Controllers\Enquiry($enquiriesTable, $adminsTable);

    $routes = [
      '' => [
        'GET' => [
          'controller' => $articleController,
          'function' => 'home'
        ]
      ],
      'about' => [
        'GET' => [
          'controller' => $customerController,
          'function' => 'about'
        ]
      ],
      'contact' => [
        'GET' => [
          'controller' => $customerController,
          'function' => 'contact'
        ],
        'POST' => [
          'controller' => $enquiryController,
          'function' => 'enquire'
        ]
      ],
      'careers' => [
        'GET' => [
          'controller' => $jobController,
          'function' => 'careers'
        ]
      ],
      'cars' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'listAll'
        ]
      ],
      'manufacturers' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'listByManufacturer'
        ]
      ],
      'manufacturers' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'listByManufacturer'
        ]
      ],
      'admin/login' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'login'
        ],
        'POST' => [
          'controller' => $adminController,
          'function' => 'loginSubmit'
        ]
      ],
      'admin/logout' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'logout'
        ],
        'login' => true
      ],
      'admin/home' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'home'
        ],
        'POST' => [
          'controller' => $adminController,
          'function' => 'home'
        ],
        'login' => true
      ],
      'admin/cars' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'adminCar'
        ],
        'login' => true
      ],
      'admin/addcar' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'addCar'
        ],
        'POST' => [
          'controller' => $carController,
          'function' => 'addCarSubmit'
        ],
        'login' => true
      ],
      'admin/editcar' => [
        'GET' => [
          'controller' => $carController,
          'function' => 'editCar'
        ],
        'POST' => [
          'controller' => $carController,
          'function' => 'editCarSubmit'
        ],
        'login' => true
      ],
      'admin/archivecar' => [
        'POST' => [
          'controller' => $carController,
          'function' => 'archiveCar'
        ],
        'login' => true
      ],
      'admin/relistcar' => [
        'POST' => [
          'controller' => $carController,
          'function' => 'relistCar'
        ],
        'login' => true
      ],
      'admin/deletecar' => [
        'POST' => [
          'controller' => $carController,
          'function' => 'removeCar'
        ],
        'login' => true
      ],
      'admin/manufacturers' => [
        'GET' => [
          'controller' => $manufacturerController,
          'function' => 'list'
        ],
        'login' => true
      ],
      'admin/addmanufacturer' => [
        'GET' => [
          'controller' => $manufacturerController,
          'function' => 'addManufacturer'
        ],
        'POST' => [
          'controller' => $manufacturerController,
          'function' => 'addManufacturerSubmit'
        ],
        'login' => true
      ],
      'admin/editmanufacturer' => [
        'GET' => [
          'controller' => $manufacturerController,
          'function' => 'editManufacturer'
        ],
        'POST' => [
          'controller' => $manufacturerController,
          'function' => 'editManufacturerSubmit'
        ],
        'login' => true
      ],
      'admin/deletemanufacturer' => [
        'POST' => [
          'controller' => $manufacturerController,
          'function' => 'removeManufacturer'
        ],
        'login' => true
      ],
      'admin/jobs' => [
        'GET' => [
          'controller' => $jobController,
          'function' => 'list'
        ],
        'login' => true
      ],
      'admin/addjob' => [
        'GET' => [
          'controller' => $jobController,
          'function' => 'addjob'
        ],
        'POST' => [
          'controller' => $jobController,
          'function' => 'addjobsubmit'
        ],
        'login' => true
      ],
      'admin/editjob' => [
        'GET' => [
          'controller' => $jobController,
          'function' => 'editjob'
        ],
        'POST' => [
          'controller' => $jobController,
          'function' => 'editjobsubmit'
        ],
        'login' => true
      ],
      'admin/deletejob' => [
        'POST' => [
          'controller' => $jobController,
          'function' => 'deletejob'
        ],
        'login' => true
      ],
      'admin/staff' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'list'
        ],
        'login'=> true
      ],
      'admin/addstaff' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'addstaff'
        ],
        'POST' => [
          'controller' => $adminController,
          'function' => 'save'
        ],
        'login'=> true
      ],
      'admin/editstaff' => [
        'GET' => [
          'controller' => $adminController,
          'function' => 'editstaff'
        ],
        'POST' => [
          'controller' => $adminController,
          'function' => 'save'
        ],
        'login'=> true
      ],
      'admin/deletestaff' => [
        'POST' => [
          'controller' => $adminController,
          'function' => 'deletestaff'
        ],
        'login'=> true
      ],
      'admin/enquiries' => [
        'GET' => [
          'controller' => $enquiryController,
          'function' => 'list'
        ],
        'login' => true
      ],
      'admin/completeenquiry' => [
        'POST' => [
          'controller' => $enquiryController,
          'function' => 'complete'
        ],
        'login' => true
      ],
      'admin/uncompleteenquiry' => [
        'POST' => [
          'controller' => $enquiryController,
          'function' => 'uncomplete'
        ],
        'login' => true
      ],
      'admin/deleteenquiry' => [
        'POST' => [
          'controller' => $enquiryController,
          'function' => 'delete'
        ],
        'login' => true
      ],
      'admin/articles' => [
        'GET' => [
          'controller' => $articleController,
          'function' => 'list'
        ],
        'login' => true
      ],
      'admin/addarticle' => [
        'GET' => [
          'controller' => $articleController,
          'function' => 'add'
        ],
        'POST' => [
          'controller' => $articleController,
          'function' => 'addsubmit'
        ],
        'login' => true
      ],
      'admin/editarticle' => [
        'GET' => [
          'controller' => $articleController,
          'function' => 'edit'
        ],
        'POST' => [
          'controller' => $articleController,
          'function' => 'editsubmit'
        ],
        'login' => true
      ],
      'admin/deletearticle' => [
        'POST' => [
          'controller' => $articleController,
          'function' => 'delete'
        ],
        'login' => true
      ],
    ];
    return $routes;
  }

  public function checkLogin() {
    if (!isset($_SESSION['loggedin'])) {
      header('location: /admin/login');
    }
  }
}
