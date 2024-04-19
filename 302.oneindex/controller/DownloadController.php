<?php
define('VIEW_PATH', ROOT . 'view/admin/');
class DownloadController
{
  function index()
  {
    $tasks = config('@crawler');
    $crawler = [];
    if (!empty($_POST['add_task'])) {
    } else if (!empty($_POST['add_field'])) {
    } else if (isset($_POST['delete_field'])) {
    } else if (!empty($_POST['edit_task'])) {
    } else if (!empty($_POST['delete_task'])) {
    } else if (!empty($_POST['save_task'])) {
    }

    // $filePath = __DIR__ . "/../upload/.crawler/www_txt80_com/collected_content_fields.csv";
    // $handle = fopen($filePath, "r");
    // while ($line = fgetcsv($handle)) {
    //   // var_dump($line);
    // }

    return view::load('download')->with('tasks', $tasks)->with('crawler', $crawler);
  }
}
