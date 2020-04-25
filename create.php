<?php include_once 'config/init.php'; ?>

<?php

$job = new Job;

if (isset($_POST['submit'])) { // If User Clicks Submit
  // Create Data Array
  $data = array();
  $data['category_id'] = $_POST['category'];
  $data['company'] = $_POST['company'];
  $data['job_title'] = $_POST['job_title'];
  $data['description'] = $_POST['description'];
  $data['salary'] = $_POST['salary'];
  $data['location'] = $_POST['location'];
  $data['contact_user'] = $_POST['contact_user'];
  $data['contact_email'] = $_POST['contact_email'];

  if ($job->create($data)){
    // Create a helper file with a redirect function
    redirect('index.php', 'Your Job has been Listed', 'success'); // If Submit was successful
  } else {
    redirect('index.php', 'Oops. Something went wrong', 'error'); // If submit failed
  }
}

$template = new Template('templates/job-create.php'); // Specifying the path to the templates

$template->categories = $job->getCategories(); // Accessing jobs by id

echo $template;