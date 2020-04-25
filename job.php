<?php 

include_once 'config/init.php'; //Inserting init.php

$job = new Job;

if (isset($_POST['del_id'])) {
  $del_id = $_POST['del_id'];
  if ($job->delete($del_id)) {
    redirect('index.php', 'Job Deleted', 'success');
  } else {
    redirect('index.php', 'Job couldnt be deleted', 'error');
  }
}

$template = new Template('templates/job-single.php'); // Specifying the path to the templates

$job_id = isset($_GET['id']) ? $_GET['id'] : null; //If there is a id in the URL we set it and if not then set it to null

$template->job = $job->getJob($job_id); // Accessing jobs by id

echo $template;