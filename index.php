<?php

// Task Manager Interface

class TaskManager {
    private $tasks = [];

    public function addTask($task) {
        $this->tasks[] = $task;
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function completeTask($index) {
        if (isset($this->tasks[$index])) {
            unset($this->tasks[$index]);
        }
    }
}

// Example usage
$taskManager = new TaskManager();
$taskManager->addTask('Learn PHP');
$taskManager->addTask('Build a Task Manager');

$tasks = $taskManager->getTasks();
foreach ($tasks as $task) {
    echo $task . "\n";
}