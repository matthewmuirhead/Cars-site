<?php
namespace Cars\Controllers;
class Job {
	private $jobsTable;

	public function __construct($jobsTable) {
		$this->jobsTable = $jobsTable;
	}

  public function list() {
    return [
			'template' => 'admin/jobs.html.php',
			'variables' => $this->jobsTable->findAll(),
			'title' => 'Claires\'s Cars - Careers'
		];
  }

	public function careers() {
		$jobList = $this->jobsTable->findAll();
		$jobs = [];
		$i=0;

		foreach ($jobList as $job) {
			$variables = [];
			if ($job['post_date'] <= date('Y-m-d') && $job['close_date'] >= date('Y-m-d')) {
				$variables = [
					'job_id' => $job['job_id'],
					'role' => $job['role'],
					'description' => $job['description'],
					'post_date' => $job['post_date'],
					'close_date' => $job['close_date']
				];
				$jobs[$i++] = $variables;
			}
		}

		if ($i == 0) {
			$jobs[0] = ['job_id' => 'no jobs', 'role' => 'Claire’s Cars currently has no job opportunities available, but keep checking as new positions become available regularly!'];
		}

		return [
			'template' => 'careers.html.php',
			'variables' => $jobs,
			'title' => 'Claires\'s Cars - Careers'
		];
	}

  public function addjob() {
    return [
      'template' => 'admin/addjob.html.php',
      'variables' => [],
      'title' => 'Claires\'s Cars - Careers'
    ];
  }

  public function addjobsubmit() {
    $this->jobsTable->save($_POST['job']);
    header('location: /admin/jobs');
  }

  public function editjob() {
    return [
			'template' => 'admin/editjob.html.php',
			'variables' => $this->jobsTable->find('job_id', $_GET['id'])[0],
			'title' => 'Claires\'s Cars - Careers'
		];
  }

  public function editjobsubmit() {
    $this->jobsTable->save($_POST['job']);
    header('location: /admin/jobs');
  }

  public function deletejob() {
    $this->jobsTable->delete($_POST['id']);
    header('location: /admin/jobs');
  }
}
