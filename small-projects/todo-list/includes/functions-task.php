<?php
function insert_task($title, $status, $progress, $date)
{
    /**
     * Get user tasks file
     */
    $user = get_user();
    $user_file = 'tasks/task-' . $user['username'] . '.txt';


    /**
     * GEt user tasks
     */
    $tasks = [];
    if (file_exists($user_file)) {
        $data = file_get_contents($user_file);
        $tasks = unserialize($data);
    }

    /**
     * add new tasks to tasks
     */

    $uid = generate_random_string(10);
    $tasks[] = [
        'uid' => $uid,
        'title' => $title,
        'status' => $status,
        'progress' => $progress,
        'date' => $date
    ];

    /**
     * save tasks
     */

    file_put_contents($user_file, serialize($tasks));

    return $uid;
}

function generate_random_string($length = 10)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $result = '';
    while (strlen($result) < $length) {
        $rand = rand(0, strlen($characters) - 1);
        $ch = $characters[$rand];
        $result .= $ch;
    }
    return $result;
}