<?php
namespace App\Controllers;

require "../vendor/autoload.php";

use App\Core\Controller;
// use App\Models\Task ;
use App\Models\TaskResourceModel ;
class tasksController extends Controller
{
    function index()
    {
        $tasks = new TaskResourceModel();
        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {  
        if (isset($_POST["title"]))
        {
            $task = new TaskResourceModel();
            $data=[
              'title' => $_POST["title"],
              'description' => $_POST["description"],
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ];
            if ($task->create($data))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new TaskResourceModel();
        $d["task"] = $task->showTask($id);
        if (isset($_POST["title"]))
        {
            $data=[
                'title' => $_POST["title"],
                'description' => $_POST["description"],
            ];
            if ($task->edit($data,$id))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskResourceModel();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>