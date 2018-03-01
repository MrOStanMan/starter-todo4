<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Views
 *
 * @author andraavram
 */
class Views extends Application{
    //put your code here
    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';
        $tasks = $this->tasks->all();   // get all the tasks
        $this->data['content'] = 'Ok'; // so we don't need pagebody
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
        $this->data['rightside'] = $this->makeCategorizedPanel($tasks);
        //print_r($this->makeCategorizedPanel($tasks));

        $this->render('template_secondary'); 
    }
    
    function makePrioritizedPanel($tasks) {
        
        foreach ($tasks as $task) {
            if ($task->status != 2)
                $undone[] = $task;
            }
        
        usort($undone, "orderByPriority");
        
        foreach ($undone as $task)
            $task->priority = $this->app->priority($task->priority);
        
        foreach ($undone as $task)
            $converted[] = (array) $task;
        
        $parms = ['display_tasks' => $converted];
        
        $role = $this->session->userdata('userrole');
        $parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
        
        return $this->parser->parse('by_priority', $parms, true);
        
    }
    
    function makeCategorizedPanel($tasks)
    {
        $parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
        return $this->parser->parse('by_category', $parms, true);
    }
    
    

}

// complete flagged items
function complete() {
        // loop over the post fields, looking for flagged tasks
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_OWNER) redirect('/views');
        foreach($this->input->post() as $key=>$value) {
                if (substr($key,0,4) == 'task') {
                        // find the associated task
                        // MORE COMING HERE
                    $taskid = substr($key,4);
                    $task = $this->tasks->get($taskid);
                    $task->status = 2; // complete
                    $this->tasks->update($task);
                }
        }
        $this->index();
}

function orderByPriority($a, $b) {
        if ($a->priority > $b->priority)
            return -1;
        elseif ($a->priority < $b->priority)
            return 1;
        else
            return 0;
    }
