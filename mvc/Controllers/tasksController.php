<?php

use Controller\Controller;
use TaskModel;
use TaskModel\Task;

class tasksController extends Controller
{
    public function index()
    {
        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["title"])) {
            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        $task = new Task();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
