<?php

class ProjectsController extends BaseController {


    public $restful = true;


    //Common function that you want your controller have



    /*
     *
     * CHECK UPDATE (, DELETE) IF USER IS UPDATING SOMETHING THAT CAN UPDATE
     *
     *
     */

    public function indexProjects(){
        $current_user_id = Session::get('user_id', -1);
        $current_username = Session::get('username');

        if(-1 == $current_user_id){
            return Redirect::to('/');
        }

        /*$projects = DB::select( DB::raw("SELECT `tProjects`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.id
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.type = 'project'
                                                    and `tUsersViewedPTCs`.item_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.user_id = `tProjects`.owner_id) as highlight_row
                                            FROM `tProjects`
                                            inner join `tUsers` on `tProjects`.owner_id = `tUsers`.id
                                            order by `tProjects`.updated_at desc"));*/

        $contentview = View::make('projects/index')
            ->with('title', 'My projects');
            //->with('project', $projects);
            //->with('max_id', $max_id);
            //->with('earthids', Earthid::OrderBy('created_at', 'asc')->get());
            //->with('earthids', Earthid::all());

        //Put the rendered stuff in the html base page
        return View::make('default', array('contentview' => $contentview, 'username' => $current_username, 'user_id' => $current_user_id));
    }
    public function getProjects(){
        $current_user_id = Session::get('user_id', -1);
        //$current_username = Session::get('username');

        if(-1 == $current_user_id){
            return Redirect::to('/');
        }

        if(Request::ajax()){

            /*
             *
             *  Get projects that current user have permission
             *
             */

            $data = Input::all();


            switch ( $data['highlight'] ) {
                case 0:
                case 6:
                    $filter_date = '1 = 1';
                    break;
                case 1:
                    //$interval_from = date('Y-m-d H:i:s');
                    //$interval_to = date('Y-m-d H:i:s', time()-3600);
                    //$filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 60 MINUTE)';
                    $last_one_hour = date('Y-m-d H:i:s', strtotime('-1 hour'));
                    $filter_date = "`tUsersViewedPTCs`.updated_at > '".$last_one_hour."'";
                    //$filter_date = '`tUsersViewedPTCs`.updated_at <= '.$interval_from.' and '.'`tUsersViewedPTCs`.updated_at >= '.$interval_to.'`';
                    break;
                case 2:
                    //$interval_from = date('Y-m-d H:i:s');
                    //$interval_to = date('Y-m-d H:i:s', time()-(3600*4));
                    //$filter_date = '`tUsersViewedPTCs`.updated_at <= ' + $interval_from + ' and ' + '`tUsersViewedPTCs`.updated_at >= ' + $interval_to;
                    $last_four_hour = date('Y-m-d H:i:s', strtotime('-4 hour'));
                    $filter_date = "`tUsersViewedPTCs`.updated_at > '".$last_four_hour."'";
                    //$filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 240 MINUTE)';
                    break;
                case 3:
                    //$interval_from = date('Y-m-d H:i:s');
                    //$interval_to = date('Y-m-d H:i:s', time()-(3600*8));
                    //$filter_date = '`tUsersViewedPTCs`.updated_at <= ' + $interval_from + ' and ' + '`tUsersViewedPTCs`.updated_at >= ' + $interval_to;
                    $last_eight_hour = date('Y-m-d H:i:s', strtotime('-8 hour'));
                    $filter_date = "`tUsersViewedPTCs`.updated_at > '".$last_eight_hour."'";
                    //$filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 480 MINUTE)';
                    break;
                case 4:
                    //$interval_from = date('Y-m-d H:i:s');
                    //$interval_to = date('Y-m-d H:i:s', time()-(3600*24));
                    //$filter_date = '`tUsersViewedPTCs`.updated_at <= ' + $interval_from + ' and ' + '`tUsersViewedPTCs`.updated_at >= ' + $interval_to;
                    $last_one_day = date('Y-m-d H:i:s', strtotime('-1 day'));
                    $filter_date = "`tUsersViewedPTCs`.updated_at > '".$last_one_day."'";
                    //$filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 1440 MINUTE)';
                    break;
                case 5:
                    //$interval_from = date('Y-m-d H:i:s');
                    //$interval_to = date('Y-m-d H:i:s', time()-(3600*24*7));
                    //$filter_date = '`tUsersViewedPTCs`.updated_at <= ' + $interval_from + ' and ' + '`tUsersViewedPTCs`.updated_at >= ' + $interval_to;
                    $last_one_week = date('Y-m-d H:i:s', strtotime('-1 week'));
                    $filter_date = "`tUsersViewedPTCs`.updated_at > '".$last_one_week."'";
                    //$filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 10080 MINUTE)';
                    break;
            }

            //error_log($filter_date);

            /*$projects = DB::table('tProjects')
                ->join('tUsers', 'tProjects.owner_id', '=', 'tUsers.id')
                ->join('tUsersViewedPTCs', 'tUsers.id', '=', 'tUsersViewedPTCs.user_id')
                ->select('tUsers.avatar', 'tProjects.id', 'tProjects.name', 'tProjects.description', 'tProjects.start_at', 'tProjects.end_at', 'tProjects.created_at', 'tProjects.updated_at')
                ->orSelect()
                ->where('tUsersViewedPTCs.type', 'project')
                ->where('tUsersViewedPTCs.item_id', 'tProjects.id')
                //->where('owner_id', $current_user_id)
                //->orderby('created_at', 'desc')
                ->orderby('tProjects.updated_at', 'desc')
                ->get();*/

            $query = "SELECT `tProjects`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.task_id = -1
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id').") as highlight_row,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.task_id != -1
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id')."
                                                    LIMIT 1) as new_task,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.task_id = -1
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id')."
                                                    and `tUsersViewedPTCs`.viewed = 0
                                                    LIMIT 1) as new_comment
                                            FROM `tProjects`
                                            inner join `tUsers` on `tProjects`.owner_id = `tUsers`.id
                                            order by `tProjects`.updated_at desc";

            $projects = DB::select( DB::raw($query));

            /*$projects = DB::select( DB::raw("SELECT `tProjects`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.task_id != -1
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and `tUsersViewedPTCs`.updated_at <= :interval_from2
                                                    and `tUsersViewedPTCs`.updated_at >= :interval_to2
                                                    and `tUsersViewedPTCs`.user_id = :id_user2
                                                    LIMIT 1) as new_task,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tProjects`.id
                                                    and `tUsersViewedPTCs`.task_id != -1
                                                    and `tUsersViewedPTCs`.comment_id != -1
                                                    and `tUsersViewedPTCs`.updated_at <= :interval_from3
                                                    and `tUsersViewedPTCs`.updated_at >= :interval_to3
                                                    and `tUsersViewedPTCs`.user_id = :id_user3
                                                    LIMIT 1) as new_comment
                                            FROM `tProjects`
                                            inner join `tUsers` on `tProjects`.owner_id = `tUsers`.id
                                            order by `tProjects`.updated_at desc"), array(
                'id_user' => Session::get('user_id'), 'id_user2' => Session::get('user_id'), 'id_user3' => Session::get('user_id'),
                'interval_from' => $interval_from, 'interval_to' => $interval_to,
                'interval_from2' => $interval_from, 'interval_to2' => $interval_to,
                'interval_from3' => $interval_from, 'interval_to3' => $interval_to,
            ));*/

            return $projects;
        }
    }
    public function postAddProject()
    {
        date_default_timezone_set('Australia/Brisbane');

        if(Request::ajax()){

            $project = new Project;

            DB::transaction(function ($project) use ($project) {

                $data = Input::all();

                $count = Project::count()+1;

                //Create row in tComments table
                $project->owner_id = Session::get('user_id');
                $project->name =  'P'.$count.' - '.$data['name'];
                $project->description = $data['description'];
                $project->start_at = date('Y-m-d H:i:s', strtotime($data['start']));
                $project->end_at = date('Y-m-d H:i:s', strtotime($data['end']));
                $project->created_by = Session::get('user_id');
                $project->updated_by = Session::get('user_id');
                $project->created_at = date('Y-m-d H:i:s');
                $project->updated_at = date('Y-m-d H:i:s');
                $project->save();

                //Add avatar property
                $project->avatar=User::find(Session::get('user_id'))->avatar;

                //Get all users that can view/update this project
                //For now all users
                $users = User::all();
                foreach ($users as &$user) {
                    //Insert in table tUserViewedPTCs all the user tha haven't seen this project
                    if ($user->id != Session::get('user_id'))
                        $id = $this->addPTCNotViewed($user->id, $project->id, -1, -1, 0);
                }

            });


            //Return id last insert
            $id_last_insert = $project->id;

            if($id_last_insert != -1){
                $response = array(
                    'status' => 'create',
                    'msg' => 'Comment added.',
                );
            }
            else{
                $response = array(
                    'status' => 'not_create',
                    'msg' => 'Comment not added.',
                );
            }

            //return Response::json( $response );
            return $project;
        }
    }
    public function postUpdateProject()
    {
        if(Request::ajax()){

            $data = Input::all();

            $project = Project::Find($data['id']);
            // check ownership!
            //if($project->owner_id != Session::get('user_id')){
            //   error_log(Session::get('user_id') . " user tried to update " . print_r($project, 1));
            //    die('Not your project!');
            //}

            //Create row in tComments table

            $project->owner_id = Session::get('user_id');
            $project->name = $data['name'];
            $project->description = $data['description'];
            $project->start_at = date('Y-m-d H:i:s', strtotime($data['start']));
            $project->end_at = date('Y-m-d H:i:s', strtotime($data['end']));
            //$project->created_by = Session::get('user_id');
            $project->updated_by = Session::get('user_id');
            //$project->created_at = date('Y-m-d H:i:s');
            $project->updated_at = date('Y-m-d H:i:s');
            $project->save();

            //Add avatar property
            $project->avatar=User::find(Session::get('user_id'))->avatar;

            //Get all users that can view/update this project
            //For now all users
            $users = User::all();
            foreach ($users as &$user) {
                //Insert in table tUserViewedPTCs all the user tha haven't seen this project
                if ($user->id != Session::get('user_id')){
                    $id = $this->deletePTCNotViewed($user->id, $project->id, -1, -1);
                    $id = $this->addPTCNotViewed($user->id, $project->id, -1, -1, 0);
                }
            }

            //Return id last insert
            $id_last_insert = $project->id;
            if($id_last_insert != -1){
                $response = array(
                    'status' => 'create',
                    'msg' => 'Comment added.',
                );
            }
            else{
                $response = array(
                    'status' => 'not_create',
                    'msg' => 'Comment not added.',
                );
            }

            //return Response::json( $response );
            return $project;
        }

    }


    public function getTasks(){
        $current_user_id = Session::get('user_id', -1);
        //$current_username = Session::get('username');

        if(-1 == $current_user_id){
            return Redirect::to('/');
        }

        if(Request::ajax()){

            $data = Input::all();

            $id_project = $data['id_project'];

            switch ( $data['highlight']) {
                case 0:
                case 6:
                    $filter_date = '1 = 1';
                    break;
                case 1:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 60 MINUTE)';
                    break;
                case 2:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 240 MINUTE)';
                    break;
                case 3:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 480 MINUTE)';
                    break;
                case 4:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 1440 MINUTE)';
                    break;
                case 5:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 10080 MINUTE)';
                    break;
            }

            switch ( $data['filter']) {
                case 0:
                    $filter_by = '1 = 1';
                    break;
                case 1:
                    $filter_by = '`tTasks`.status = 0';
                    break;
                case 2:
                    $filter_by = '`tTasks`.status = 1';
                    break;
                case 3:
                    $filter_by = '`tTasks`.status = 2';
                    break;
                case 4:
                    $filter_by = '`tTasks`.status != 2 and date(now()) >= `tTasks`.end_at and year(`tTasks`.end_at) != 1970';
                    break;
            }

            if ( $data['searchTask'] != ''){
                $search_by = '(';
                if ( $data['searchTaskName'] == 1)
                    $search_by = $search_by."`tTasks`.name like '%".$data['searchTask']."%'";
                if ( $data['searchTaskDescription'] == 1){
                    if ($search_by != '(')
                        $search_by = $search_by.' or ';
                    $search_by = $search_by."`tTasks`.description like '%".$data['searchTask']."%'";
                }
                if ( $data['searchTaskTag'] == 1){
                    if ($search_by != '(')
                        $search_by = $search_by.' or ';
                    $search_by = $search_by."`tTasks`.tag like '%".$data['searchTask']."%'";
                }
                if ($search_by == '(')
                    $search_by = $search_by.'1 = 1';
                $search_by = $search_by.')';
            }
            else{
                $search_by = '(1 = 1)';
            }


/*
            "SELECT id,name FROM `hin` WHERE name LIKE '%". $q ."%'"
The wildcarding has to be inside the single quotes.

            Ideally, you want to use:

"SELECT id,name FROM `hin` WHERE name LIKE '%". mysql_real_escape_string($q) ."%'"
*/


            error_log($search_by);

            $query = "SELECT `tTasks`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tTasks`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tTasks`.id
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id').") as highlight_row,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tTasks`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tTasks`.id
                                                    and `tUsersViewedPTCs`.comment_id != -1
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id')."
                                                    and `tUsersViewedPTCs`.viewed = 0
                                                    LIMIT 1) as new_comment
                                            FROM `tTasks`
                                            inner join `tUsers` on `tTasks`.owner_id = `tUsers`.id
                                            where `tTasks`.project_id = ".$id_project."
                                              and ".$filter_by."
                                              and ".$search_by."
                                            order by `tTasks`.status asc, `tTasks`.updated_at desc";

            $tasks = DB::select( DB::raw($query));

            /*$tasks = DB::select( DB::raw("SELECT `tTasks`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tTasks`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tTasks`.id
                                                    and `tUsersViewedPTCs`.comment_id = -1
                                                    and :filter1
                                                    and `tUsersViewedPTCs`.user_id = :id_user) as highlight_row,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tTasks`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tTasks`.id
                                                    and `tUsersViewedPTCs`.comment_id != -1
                                                    and :filter2
                                                    and `tUsersViewedPTCs`.user_id = :id_user2
                                                    LIMIT 1) as new_comment
                                            FROM `tTasks`
                                            inner join `tUsers` on `tTasks`.owner_id = `tUsers`.id
                                            where `tTasks`.project_id = :id_project
                                                and :filter3
                                            order by `tTasks`.status asc, `tTasks`.updated_at desc"), array(
                'id_project' => $id_project, 'id_user' => Session::get('user_id'), 'id_user2' => Session::get('user_id'),
                'filter1' => $filter_date, 'filter2' => $filter_date,
                'filter3' => '`tTasks`.status  = tTasks`.status',
            ));*/

            return $tasks;
        }
    }
    public function postAddTask()
    {
        if(Request::ajax()){

            //Create new model Task
            $task = new Task;
            //$txtComment = Input::get('comment_description');

            DB::transaction(function ($task) use ($task) {

                $data = Input::all();

                $count = Task::where('project_id', $data['id_project'])->count()+1;

                $task->project_id = $data['id_project'];
                $task->owner_id = Session::get('user_id');
                $task->name = 'T'.$count.' - '.$data['name'];
                $task->description = $data['description'];
                $task->status = $data['status'];
                $task->status_percentage = $data['status_percentage'];
                $task->priority = $data['priority'];
                $task->tag = $data['tag'];
                $task->start_at = date('Y-m-d H:i:s', strtotime($data['start']));
                $task->end_at = date('Y-m-d H:i:s', strtotime($data['end']));
                $task->updated_by = Session::get('user_id');
                $task->created_by = Session::get('user_id');
                $task->created_at = date('Y-m-d H:i:s');
                $task->updated_at = date('Y-m-d H:i:s');
                $task->save();

                //Add avatar property
                $task->avatar=User::find(Session::get('user_id'))->avatar;


                //Get all users that can view/update this task
                //For now all users
                $users = User::all();
                foreach ($users as &$user) {
                    //Insert in table tUserViewedPTCs all the user tha haven't seen this task
                    if ($user->id != Session::get('user_id'))
                        $id = $this->addPTCNotViewed($user->id, $task->project_id, $task->id, -1, 0);
                }
                if ($user->id != Session::get('user_id')) {
                    $id = $this->deletePTCNotViewed($user->id, $task->project_id, -1, -1);
                    $id = $this->addPTCNotViewed($user->id, $task->project_id, -1, -1, 0);
                }
            });

            //Return id last insert
            $id_last_insert = $task->id;

            if($id_last_insert != -1){
                $response = array(
                    'status' => 'create',
                    'msg' => 'Comment added.',
                );
            }
            else{
                $response = array(
                    'status' => 'not_create',
                    'msg' => 'Comment not added.',
                );
            }


            //return Response::json( $response );
            return $task;
        }
    }
    public function postUpdateTask()
    {
        if(Request::ajax()){
            //$txtComment = Input::get('comment_description');
            $data = Input::all();

            //error_log($data['id_project']);

            $task = Task::Find($data['id']);

            // check ownership!
            //if($task->owner_id != Session::get('user_id')){
            //    error_log(Session::get('user_id') . " user tried to update " . print_r($task, 1));
            //    die('Not your project!');
            //}

            //Update row in tTask table
            $task->project_id = $data['id_project'];
            $task->owner_id = Session::get('user_id');
            $task->name = $data['name'];
            $task->description = $data['description'];
            $task->status = $data['status'];
            $task->status_percentage = $data['status_percentage'];
            $task->priority = $data['priority'];
            $task->tag = $data['tag'];
            $task->start_at = date('Y-m-d H:i:s', strtotime($data['start']));
            $task->end_at = date('Y-m-d H:i:s', strtotime($data['end']));
            $task->updated_by = Session::get('user_id');
            //$task->created_by = Session::get('user_id');
            //$task->created_at = date('Y-m-d H:i:s');
            $task->updated_at = date('Y-m-d H:i:s');
            $task->save();

            //Add avatar property
            $task->avatar=User::find(Session::get('user_id'))->avatar;

            //Get all users that can view/update this project
            //For now all users
            $users = User::all();
            $ok = true;
            foreach ($users as &$user) {
                //Insert in table tUserViewedPTCs all the user tha haven't seen this project
                if ($user->id != Session::get('user_id')){
                    $id = $this->deletePTCNotViewed($user->id, $task->project_id, $task->id, -1);
                    $id = $this->addPTCNotViewed($user->id, $task->project_id, $task->id, -1, 0);
                    if ($ok == true){
                        //Insert row in temp table for get icon in project
                        $id = $this->deletePTCNotViewed($user->id, $task->project_id, -1, -1);
                        $id = $this->addPTCNotViewed($user->id, $task->project_id, -1, -1, 0);
                    }

                }
            }

            //Return id last insert
            $id_last_insert = $task->id;

            if($id_last_insert != -1){
                $response = array(
                    'status' => 'create',
                    'msg' => 'Comment added.',
                );
            }
            else{
                $response = array(
                    'status' => 'not_create',
                    'msg' => 'Comment not added.',
                );
            }

            //return Response::json( $response );
            return $task;
        }
    }


    public function getComments(){
        $current_user_id = Session::get('user_id', -1);
        //$current_username = Session::get('username');

        if(-1 == $current_user_id){
            return Redirect::to('/');
        }

        if(Request::ajax()){

            //$id_task = Input::get('id_task');
            $data = Input::all();

            switch ( $data['highlight']) {
                case 0:
                case 6:
                    $filter_date = '1 = 1';
                    break;
                case 1:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 60 MINUTE)';
                    break;
                case 2:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 240 MINUTE)';
                    break;
                case 3:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 480 MINUTE)';
                    break;
                case 4:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 1440 MINUTE)';
                    break;
                case 5:
                    $filter_date = '`tUsersViewedPTCs`.updated_at > (NOW() - INTERVAL 10080 MINUTE)';
                    break;
            }

            $query = "SELECT `tComments`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tComments`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tComments`.task_id
                                                    and `tUsersViewedPTCs`.comment_id = `tComments`.id
                                                    and ".$filter_date."
                                                    and `tUsersViewedPTCs`.user_id = ".Session::get('user_id').") as highlight_row
                                            FROM `tComments`
                                            inner join `tUsers` on `tComments`.created_by = `tUsers`.id
                                            where `tComments`.project_id = ".$data['id_project']."
                                              and `tComments`.task_id = ".$data['id_task']."
                                            order by `tComments`.updated_at desc";

            $comments = DB::select( DB::raw($query));




            /*$comments = DB::select( DB::raw("SELECT `tComments`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.viewed
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.project_id = `tComments`.project_id
                                                    and `tUsersViewedPTCs`.task_id = `tComments`.task_id
                                                    and `tUsersViewedPTCs`.comment_id = `tComments`.id
                                                    and `tUsersViewedPTCs`.updated_at <= :interval_from
                                                    and `tUsersViewedPTCs`.updated_at >= :interval_to
                                                    and `tUsersViewedPTCs`.user_id = :id_user) as highlight_row
                                            FROM `tComments`
                                            inner join `tUsers` on `tComments`.created_by = `tUsers`.id
                                            where `tComments`.project_id = :id_project
                                              and `tComments`.task_id = :id_task
                                            order by `tComments`.updated_at desc"), array(
                'id_project' => $data['id_project'], 'id_task' => $data['id_task'], 'id_user' => Session::get('user_id'), 'interval_from' => $interval_from, 'interval_to' => $interval_to,
            ));*/

            /*$comments = DB::select( DB::raw("SELECT `tComments`.*,
                                                    `tUsers`.avatar,
                                                    (select `tUsersViewedPTCs`.id
                                                    from `tUsersViewedPTCs`
                                                    where `tUsersViewedPTCs`.type = 'comment'
                                                    and `tUsersViewedPTCs`.item_id = `tComments`.id
                                                    and `tUsersViewedPTCs`.user_id = :id_user) as highlight_row
                                            FROM `tComments`
                                            inner join `tUsers` on `tComments`.created_by = `tUsers`.id
                                            where `tComments`.project_id = :id_project
                                              and `tComments`.task_id = :id_task
                                            order by `tComments`.updated_at desc"), array(
                'id_project' => $data['id_project'], 'id_task' => $data['id_task'], 'id_user' => Session::get('user_id'),
            ));*/


            //Get tasksCreate row in tComments table
            /*$comments = Comment::where('task_id', $data['id_task'])
                ->where('project_id', $data['id_project'])       //--> not necessary, right?
                //->where('created_by', $current_user_id)
                ->orderby('created_at', 'desc')
                ->get();

            foreach ($comments as &$comment) {
                $comment->avatar=User::find($comment->created_by)->avatar;
            }*/

            /*$comments = DB::table('tComments')
                ->join('tUsers', 'tComments.created_by', '=', 'tUsers.id')
                ->select('tUsers.avatar', 'tComments.description', 'tComments.created_at', 'tComments.created_by')
                ->where('task_id', $data['id_task'])
                ->where('project_id', $data['id_project'])       //--> not necessary, right?
                ->where('created_by', $current_user_id)
                ->orderby('created_at', 'desc')
                ->get();*/

            return $comments;
        }

    }
    public function postAddComment()
    {
        if(Request::ajax()){
            //$txtComment = Input::get('comment_description');

            $comment = new Comment;

            DB::transaction(function ($comment) use ($comment) {

                $data = Input::all();

                //Create row in tComments table
                $comment->project_id = $data['id_project'];
                $comment->task_id = $data['id_task'];
                $comment->description = $data['comment_description'];
                $comment->created_by = Session::get('user_id');
                $comment->created_at = date('Y-m-d H:i:s');
                $comment->updated_at = date('Y-m-d H:i:s');
                $comment->save();

                //Add avatar property
                $comment->avatar = User::find(Session::get('user_id'))->avatar;

                //Get all users that can view/update this comment
                //For now all users
                $users = User::all();
                $ok = true;
                foreach ($users as &$user) {
                    //Insert in table tUserViewedPTCs all the user tha haven't seen this comment
                    if ($user->id == Session::get('user_id')){
                        $id = $this->addPTCNotViewed($user->id, $comment->project_id, $comment->task_id, $comment->id, 0);
                        if ($ok == true){
                            //Insert row in temp table for get icon in task
                            $id = $this->deletePTCNotViewed($user->id, $comment->project_id, $comment->task_id, -1);
                            $id = $this->addPTCNotViewed($user->id, $comment->project_id, $comment->task_id, -1, 0);
                            //Insert row in temp table for get icon in project
                            $id = $this->deletePTCNotViewed($user->id, $comment->project_id, -1, -1);
                            $id = $this->addPTCNotViewed($user->id, $comment->project_id, -1, -1, 0);
                            $ok = false;
                        }
                    }
                }

            });

            //Return id last insert
            $id_last_insert = $comment->id;

            if($id_last_insert != -1){
                $response = array(
                    'status' => 'create',
                    'msg' => 'Comment added.',
                );
            }
            else{
                $response = array(
                    'status' => 'not_create',
                    'msg' => 'Comment not added.',
                );
            }

            //return Response::json( $response );
            return $comment;
        }
    }


    public function addPTCNotViewed($user_id, $project_id, $task_id, $comment_id, $viewed)
    {

        //Create row in UsersViewedPTC table
        $viewedPTC = new UsersViewedPTC;
        $viewedPTC->user_id = $user_id;
        $viewedPTC->project_id = $project_id;
        $viewedPTC->task_id = $task_id;
        $viewedPTC->comment_id = $comment_id;
        $viewedPTC->viewed = $viewed;
        $viewedPTC->created_at = date('Y-m-d H:i:s');
        $viewedPTC->updated_at = date('Y-m-d H:i:s');
        $viewedPTC->save();

/*
<?php
$date = new DateTime('2000-01-01');
echo $date->format('Y-m-d H:i:s');
?>
Procedural style

<?php
$date = date_create('2000-01-01');
echo date_format($date, 'Y-m-d H:i:s');
?>
The above example will output:

2000-01-01 00:00:00
*/




        //Return id last insert
        return $viewedPTC->id;
    }
    public function deletePTCNotViewed($user_id, $project_id, $task_id, $comment_id)
    {
        //Delete row in UsersViewedPTC table
        $affectedRows = UsersViewedPTC::where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->where('task_id', $task_id)
            ->where('comment_id', $comment_id)
            ->delete();

        //Return id last insert
        return $affectedRows;
    }
    public function postSetItemViewed()
    {

        if(Request::ajax()){

            $data = Input::all();

            //Delete row in earthids table
            /*$PTC = UsersViewedPTC::where('user_id', Session::get('user_id'))
                    ->where('project_id', $data['project_id'])
                    ->where('task_id', $data['task_id'])
                    ->where('comment_id', $data['comment_id'])
                    ->get();*/
            /*$PTC = DB::table('tUsersViewedPTCs')
                ->where('user_id', Session::get('user_id'))
                ->where('project_id', $data['project_id'])
                ->where('task_id', $data['task_id'])
                ->where('comment_id', $data['comment_id'])
                ->get();
            //error_log($PTC);
            //error_log( print_R($PTC,TRUE) );
            $PTC->viewed = 1;
            $PTC->save();*/

            $id = $this->deletePTCNotViewed(Session::get('user_id'), $data['project_id'], $data['task_id'], $data['comment_id']);
            $id = $this->addPTCNotViewed(Session::get('user_id'), $data['project_id'], $data['task_id'], $data['comment_id'], 1);

    /*
            // check ownership!
            if($earthid->user_id != Session::get('user_id')){

                error_log(Session::get('user_id') . " user tried to DELETE " . print_r($earthid, 1));
                die('Not your earthID!');

            }
    */

            if($id != -1){
                $response = array(
                    'status' => 'updated',
                );
            }
            else{
                $response = array(
                    'status' => 'not updated',
                );
            }


            return Response::json( $response );

        }
    }
    public function postSetProjectViewed()
    {

        if(Request::ajax()){

            $data = Input::all();

            //Get project and all his tasks and comments
            $PTCs = UsersViewedPTC::where('user_id', Session::get('user_id'))
                ->where('project_id', $data['project_id'])
                ->get();
            //Set to viewed
            //error_log(print_R($PTCs, true));
            foreach ($PTCs as &$PTC) {
                //Set project and all his tasks and comments to viewed
                $id = $this->deletePTCNotViewed(Session::get('user_id'), $PTC->project_id, $PTC->task_id, $PTC->comment_id);
                $id = $this->addPTCNotViewed(Session::get('user_id'), $PTC->project_id, $PTC->task_id, $PTC->comment_id, 1);
                //$PTC->viewed = 1;
                //$PTC->save();
            }


            /*
                    // check ownership!
                    if($earthid->user_id != Session::get('user_id')){

                        error_log(Session::get('user_id') . " user tried to DELETE " . print_r($earthid, 1));
                        die('Not your earthID!');

                    }
            */

            if(1 == -1){
                $response = array(
                    'status' => 'updated',
                );
            }
            else{
                $response = array(
                    'status' => 'not updated',
                );
            }


            return Response::json( $response );

        }
    }



/*
    public function validateEarthID($earth_id_name){
        $earth_id_name = trim($earth_id_name);
        if(is_numeric($earth_id_name)){
            return false;
        }
        if ($this->regExpEarthid($earth_id_name)==false)
            return false;
        return true;
    }

    public function regExpEarthid($earth_id_name){
        //Not allowed :,/,white space, min 5 characters
        if(preg_match('/^[^:\/@ ]{5,}+$/', $earth_id_name))
            return true;
        return false;
    }

    public function postCreate($earth_id_name){

        //Create row in earthids table
        $earthid = new Earthid;
        $earthid->earth_id = $earth_id_name;
        $earthid->user_id = Session::get('user_id');
        $earthid->created_at = date('Y-m-d H:i:s');
        $earthid->updated_at = date('Y-m-d H:i:s');
        $earthid->save();
        //Create row in history table
        $history = new History();
        $history->earth_id = $earth_id_name;
        $history->user_id = Session::get('user_id');
        $history->created_at = date('Y-m-d H:i:s');
        $history->json = '';
        $history->action = 'created';
        $history->save();
        //Push json to s3 data server
        $file_name = $earthid->earth_id;
        $body_json = '';
        pushJsonToS3($file_name.'.json', $body_json);

        //Return id last insert
        return $earthid->id;

    }

    public function getEdit($id){

        $current_user_id = Session::get('user_id');
        $current_username = Session::get('username');


        $earthid = Earthid::Find($id);

        // check ownership!
        if($earthid->user_id != Session::get('user_id')){

            error_log(Session::get('user_id') . " user tried to update " . print_r($earthid, 1));
            die('Not your earthID!');

        }

        $contentview = View::make('earthids/edit')
            ->with('title', 'Edit earthID')
            ->with('earthid', $earthid);

        //Put the rendered stuff in the html base page
        return View::make('default', array('contentview' => $contentview, 'username' => $current_username, 'user_id' => $current_user_id));

    }

    public function postUpdate(){

        $id = Input::get('id');


        //Validate data

        //Update row in earthids table
        $earthid = Earthid::Find($id);

        // check ownership!
        if($earthid->user_id != Session::get('user_id')){
            error_log(Session::get('user_id') . " user tried to update " . print_r($earthid, 1));
            die('Not your earthID!');
        }

        $earthid->json = Input::get('json');
        $earthid->updated_at = date('Y-m-d H:i:s');
        $earthid->save();
        //Create row in history table
        $history = new History();
        $history->earth_id = $earthid->earth_id;
        $history->user_id = Session::get('user_id');
        $history->json = Input::get('json');
        $history->action = 'updated';
        $history->created_at = date('Y-m-d H:i:s');
        $history->updated_at = date('Y-m-d H:i:s');
        $history->save();

        Session::set('updated_earth_id', $earthid->earth_id);

        //Push json to s3 data server
        $file_name = $earthid->earth_id;
        $body_json = $earthid->json;
        pushJsonToS3($file_name.'.json', $body_json);

        //Push image to s3 data server
        $image = Input::File('image_earthid');
        if (Input::hasFile('image_earthid'))
        {
            pushImageToS3($earthid->earth_id.'.jpg', $image);
            return Redirect::to('earthids')
                ->with('message', 'The earthID was updated successfully!');
        }
        else{
            return Redirect::to('earthids')
                ->with('message', 'The earthID was updated successfully! Image not saved!');
        }
    }

    public function postDelete(){

        $id = Input::get('id_to_delete');

        //Delete row in earthids table
        $earthid = Earthid::find($id);


        // check ownership!
        if($earthid->user_id != Session::get('user_id')){

            error_log(Session::get('user_id') . " user tried to DELETE " . print_r($earthid, 1));
            die('Not your earthID!');

        }

        $earthid->delete();

        //Create row in history table
        $history = new History();
        $history->earth_id = $earthid->earth_id;
        $history->user_id = Session::get('user_id');
        $history->created_at = date('Y-m-d H:i:s');
        $history->json = $earthid->json;
        $history->action = 'deleted';
        $history->save();

        //Delete json from s3
        $filename = $earthid->earth_id.'.json';
        deleteFileInS3($filename);
        //Delete jpg from s3
        $filename = $earthid->earth_id.'.jpg';
        deleteFileInS3($filename);

        //Input::get('image')
        return Redirect::to('earthids')
            ->with('message', 'The earthID was deleted successfully!');
    }
    public function getView($earth_id){
        $current_user_id = Session::get('user_id');
        $current_username = Session::get('username');

        //s$earthid = new Earthid();
        $earthid = DB::table('earthids')
            ->where('user_id', $current_user_id)
            ->where('earth_id', $earth_id)
            ->get();

        $contentview = View::make('earthids/view')
            ->with('title', $earth_id)
            ->with('earthids', $earthid);

        //Put the rendered stuff in the html base page
        return View::make('default', array('contentview' => $contentview, 'username' => $current_username, 'user_id' => $current_user_id));

    }*/





}