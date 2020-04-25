<?php 

include_once 'config/init.php'; //Inserting init.php

$job = new Job;

$template = new Template('templates/frontpage.php'); // Specifying the path to the templates

$category = isset($_GET['category']) ? $_GET['category'] : null; //If there is a category in the URL we set it and if not then set it to null

if ($category) {
  $template->jobs = $job->getByCategory($category);
  $template->title = 'Jobs in '. $job->getCategory($category)->name;
} else {
  $template->title = 'Latest Jobs'; // Listing the Template Title as Latest Jobs

  $template->jobs = $job->getAllJobs(); // Accessing all job in the template
}

$template->categories = $job->getCategories(); // Accessing jobs by category

echo $template;