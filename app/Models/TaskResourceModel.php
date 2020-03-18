<?php 
namespace App\Models;

use App\Core\ResourceModel;
use App\Models\Task;

class TaskResourceModel extends Task  {
   

    public function create($data=array())
    {   
        $task = $this->createOj($data);
        return $task;
    }

    public function showTask($id)
    {  
        $req = $this ->getById($id);
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $req = $this->getAll();
        return $req->fetchAll();
    }

    public function edit($data=array(),$id)
    { 
        $task = $this->updateOj($data,$id);
        return $task;
    }

    public function delete($id)
    {
        $req = $this->delete_id($id);
        return $req;
    }
}