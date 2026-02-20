<?php
function insert_task($title, $status, $progress, $date)
{
    /**
     * insert tasks to file
     */
    $tasks = get_user_tasks();

    /**
     * add new tasks to tasks
     */

    $uid = generate_random_string();
    $tasks[] = [
        'uid' => $uid,
        'title' => $title,
        'status' => $status,
        'progress' => $progress,
        'date' => $date,
        'created_at' => time()
    ];

    save_user_tasks($tasks);
    return $uid;
}

function save_user_tasks($tasks)
{
    file_put_contents(get_user_file(), serialize($tasks));
}

function get_user_tasks()
{
    /**
     * GEt user tasks
     */
    $tasks = [];
    if (file_exists(get_user_file())) {
        $data = file_get_contents(get_user_file());
        if (!empty($data))
            $tasks = unserialize($data);
    }

    return $tasks;
}

function get_user_file()
{
    /**
     * Get user tasks file
     */
    $user = get_user();
    return $user_file = 'tasks/task-' . $user['username'] . '.txt';
}

function status_resolver($status)
{
    $statuses = [
        'queue' => 'در صف انجام',
        'doing' => 'در حال انجام',
        'done' => 'انجام شده',
        'expire' => 'منقضی شده'
    ];

    return $statuses[$status];
}

function sort_tasks(&$tasks)
{
    usort($tasks, function ($a, $b) {
        return $b['created_at'] <=> $a['created_at'];
    });
}

function delete_task($uid)
{
    $tasks = get_user_tasks();
    $tasks = array_filter($tasks, function ($task) use ($uid) {
        return $task['uid'] != $uid;
    });
    save_user_tasks($tasks);
}

function get_task($uid)
{
    $tasks = get_user_tasks();
    foreach ($tasks as $task) {
        if ($task['uid'] == $uid) {
            return $task;
        }
    }
    return false;
}

function edit_task($uid, $title, $status, $progress, $date){
    $tasks = get_user_tasks();

    foreach($tasks as $task_index => $task){
        if($task['uid'] == $uid){
            $tasks[$task_index]['title'] = $title;
            $tasks[$task_index]['status'] = $status;
            $tasks[$task_index]['progress'] = $progress;
            $tasks[$task_index]['date'] = $date;
            break;
        }
    }

    save_user_tasks($tasks);
}