<?php

namespace App\Controllers;

require "../vendor/autoload.php";

use App\Core\Controller;
use App\Models\Tasks ;
class tasksController extends Controller
{
    function index()
    {
        require "../config/cli-config.php";
        $productRepository = $entityManager->getRepository(Tasks::class);
        $task['tasks'] = $productRepository->findAll();
        $this->set($task);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require "../config/cli-config.php";
            $task = new Tasks();
            $title = $_POST["title"];
            $description = $_POST["description"];
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setCreated_at(date('Y-m-d H:i:s'));
            $task->setUpdated_at();
            $entityManager->persist($task);
            if (!$entityManager->flush())
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {  
        require "../config/cli-config.php";
        $task['task'] = $entityManager->find(Tasks::class, $id);
        //$task['task']  = (array)$task['task'] ;
        if (isset($_POST["title"]))
        {   
            $task['task']->setTitle($_POST["title"]);
            $task['task']->setDescription($_POST["description"]);
            //$task['task']->setCreated_at(date('Y-m-d H:i:s'));
            $task['task']->setUpdated_at();
           
            if (!$entityManager->flush())
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($task);
        $this->render("edit");
    }

    function delete($id)
    {
        require "../config/cli-config.php";

        $task = $entityManager->getReference(Tasks::class, $id);
        $entityManager->remove($task);
        if (!$entityManager->flush())
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>