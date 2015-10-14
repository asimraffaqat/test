<form action='' method="post">
    <input type="hidden" name="id_to_delete" id="id_to_delete" value="" />
    <div class='row' style="background-color:#FEFEE9;border-bottom: 1px dotted grey;margin-top:50px;padding-top:10px;padding-bottom:10px;margin-bottom: 5px;">
        <span style="margin-left: 15px;">Highlight updates: </span>
        <span><input id="setHighlightNo" type="button" class="btn btn-success btn-xs" value="Off" /></span>
        <span><input id="setHighlight1h" type="button" class="btn btn-success btn-xs" value="1hr" /></span>
        <span><input id="setHighlight4h" type="button" class="btn btn-success btn-xs" value="4hrs" /></span>
        <span><input id="setHighlight8h" type="button" class="btn btn-success btn-xs" value="8hrs" /></span>
        <span><input id="setHighlight1d" type="button" class="btn btn-success btn-xs" value="1d" /></span>
        <span><input id="setHighlight1w" type="button" class="btn btn-success btn-xs" value="1w" /></span>
        <span><input id="setHighlightAllSeen" type="button" class="btn btn-success btn-xs" value="All seen" /></span>
    </div>
    <div class="row" style="border: 0px solid yellow;">
        <!-- Column Projects -->
        <div id="col_project" class="col-sm-2 col-md-2 col-lg-2" style="border: 0px solid green;">
            <div style="float: left;border: 0px solid red;margin-bottom: 0px;padding-bottom: 0px;">
                <h4 style="margin:0px;padding-top:2px;border: 0px solid red;"><?php echo('Projects'); ?></h4>
            </div>

            <?php
            /*
            *      if permit to add = 1 -> enable Add button
            * */
            //Session::set('max_id', $max_id);
            //Session::set('used_id', count($earthids));
            //$used_id = count($earthids);
            if(1 == 1): ?>
                <div class="btn-group" style="border: 0px solid red; float: right;margin-bottom: 4px;">
                    <span><button type="button" onclick="onModalLoadProject();" class="btn btn-primary btn-xs">Add new</button></span>
                    <!--<span style="margin-left: 15px;margin-bottom: 0px;">Create a new project</span>-->
                </div>
                <div style="clear:both;border-bottom: 1px dotted grey;margin-bottom: 7px;"></div>
            <?php else: ?>
                <!--<div class="btn-group">
                    <span><button type="button" class="btn btn-primary btn-sm disabled" role="button">Add</button></span>
                    <span style="margin-left: 15px;margin-bottom: 0px;">Create a new project</span>

                    <span class='label label-warning'>You don't have enough permission to add a project.</span>
                </div>-->
            <?php endif; ?>

            <div id="project" style="border: 0px solid red;">
                <?php //display:block;overflow:auto;height:100%;
                //foreach($projects AS $project): ?>
                    <!--<div class="row" style="margin-top:2px;border: 0px solid black">
                        <div class="col-md-7" style="font-size: 18px;fo"><?php //echo($project->name) ?></div>
                        <div class="col-md-4">
                            <!--
                            <div class="btn-group"><a href="projects/<?//= htmlentities($project->id) ?>/edit" class="btn btn-primary btn-xs" role="button">Edit</a></div>
                            <button type="button" onclick="$('#id_to_delete').val('<?//=htmlentities($project->id) ?>');$('#to_delete').html('<?//=htmlentities($project->$project_id) ?>');$('#deleteModal').modal('show');" class="btn btn-primary btn-xs">Delete</button>
                            -->
                <!--</div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php //echo($project->description) ?>
                            </br>
                            <h6>Created on <?php //echo($project->created_at)?> by <?php //echo($project->created_by)?></h6>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid grey;"></div>-->
                <?php //endforeach; ?>
            </div>

        </div>
        <!-- Column Tasks -->
        <div id="col_task" class="col-sm-4 col-md-4 col-lg-4" style="border-left: 1px dotted grey;border-right: 1px dotted grey;">
            <div style="float: left;">
                <h4 style="margin:0px;padding-top:2px;"><?php echo('Tasks'); ?></h4>
            </div>
            <?php
            /*
             *  CHECK USER PERMISSION
            */
            if(1 == 1): ?>
                <div class="btn-group" style="border: 0px solid red; float: right;margin-bottom: 4px;">
                    <span><button type="button" onclick="onModalLoadTask();" class="btn btn-primary btn-xs">Add new</button></span>
                    <!--<span style="margin-left: 15px;margin-bottom: 0px;">Create a new task</span>
                    <span id="spinner" class=""></span>-->
                    <span id="spinnerT" class="hidden"><img src="assets/images/ajax-loader-48.gif"/></span>
                </div>
                <div style="clear:both;border-bottom: 1px dotted grey;margin-bottom: 7px;"></div>
            <?php else: ?>
                <!--<div class="btn-group">
                <span><button type="button" class="btn btn-primary btn-sm disabled" role="button">Add</button></span>
                <span style="margin-left: 15px;margin-bottom: 0px;">Create a new task</span>
                <span id="spinner" class="hidden"><img src="assets/images/ajax-loader.gif"/></span>
                <span class='label label-warning'>You don't have enough permission to add a task.</span>
                </div>-->
            <?php endif; ?>

            <div style="text-align:left;background-color:#FEFEE9;border-bottom: 0px dotted grey;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;">
                <span style="">Filter by: </span>
                <span><input id="getAllTask" type="button" class="btn btn-success btn-xs" value="All" /></span>
                <span><input id="getOpenTask" type="button" class="btn btn-success btn-xs" value="Open" /></span>
                <span><input id="getInProgressTask" type="button" class="btn btn-success btn-xs" value="In progress" /></span>
                <span><input id="getCompletedTask" type="button" class="btn btn-success btn-xs" value="Completed" /></span>
                <span><input id="getOverdueTask" type="button" class="btn btn-success btn-xs" value="Overdue" /></span>
            </div>

            <div style="text-align:left;background-color:#FEFEE9;border-bottom: 0px dotted grey;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;">
                <span style="">Search by: </span>
                <span><input type="text" maxlength="100" name="txtTaskSearch" disabled style="width:150px"/></span> on
                <span><input id="searchOnTaskName" type="button" class="btn btn-success btn-xs" value="Name" /></span>
                <span><input id="searchOnTaskDescription" type="button" class="btn btn-success btn-xs" value="Description" /></span>
                <span><input id="searchOnTaskTag" type="button" class="btn btn-success btn-xs" value="Tag" /></span>
                <span id="circle-x-search-task" class="hidden"><img src="assets/images/circle-x.png"></span>
            </div>

            <div id="task" style="border: 0px solid red;">
            </div>

        </div>
        <!-- Column Comments -->
        <div id="col_comment" class="col-sm-6 col-md-6 col-lg-6" style="border: 0px solid red;">
            <h4 style="margin-top:0px;"><?php echo('Task details'); ?></h4>
            <div class="row">
                <div class="col-md-12" style='border:0px solid pink;'>
                    <span><div id="taskDetails" style="overflow:auto;border:1px solid grey;width:100%;padding-bottom: 0px;"></div></span>
                    <!--<span><div id="taskckview" contenteditable="false"></div></span>-->
                </div>
            </div>

            <div style="border: 0px solid red;"><h4 style="margin-top:15px;margin-bottom: 5px;"><?php echo('Comments'); ?></h4></div>
            <div style="clear:both;border-bottom: 1px dotted grey;margin-bottom: 7px;"></div>
            <?php
            /*
             *  CHECK USER PERMISSION
            */
            if(1 == 1): ?>
                <div class="row">
                    <div class="col-md-12" style='border:0px solid red;'>
                        <span style=""><textarea maxlength="140" name="txtComment" style="width:100%"></textarea></span>
                        <!--<div style="display:flex;width:100% "> -->
                            <div style="margin-top: 3px;border:0px solid green;"><span><button id="idAddComment" type="button" onclick="ajaxInsertComment(this.form.txtComment.value);" class="btn btn-primary btn-xs">Add new</button></span>
                            <!--<span style="margin-left: 15px;margin-bottom: 0px;">Insert a new comment</span>-->
                            <span id="spinnerC" class="hidden"><img src="assets/images/ajax-loader-48.gif"/></span>
                                <!--<div flex="10 !important" style="border:1px solid red;font-size:10px;color:grey;text-align: right;">-->
                                <span style="float:right;margin-top:2px;border:0px solid red;font-size:11px;color:grey;text-align: right;" class="countdown">140 charachters left</span>
                                <!--</div>-->
                                </div>
                        </span>
                    </div>
                </div>
            <?php else: ?>
                <!--<div class="row">
                    <div class="col-md-12">
                        <span>Insert a new comment</span></br>
                        <span><textarea disabled name="txtComment" style="width:100%"></textarea></span>
                        <span><button type="button" class="btn btn-primary btn-sm disabled" role="button">Add</button></span>
                        <span class='label label-warning'>You don't have enough permission to add a comment.</span>
                    </div>
                </div>-->
            <?php endif; ?>

            <div id="comment" style="border: 0px solid green;margin-top: 10px;">
            </div>
        </div>
    </div>
</form>

<!-- Modal new project-->
<div class="modal fade" id="newProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--<form action='earthids/new' method="post" role="form">-->
    <form id="ajaxInsertProject" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title project_title_name" id="myModalLabel">Project details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style='border:0px solid red;'>
                            <span><label>Name</label></span></br>
                            <span><input type="text" maxlength="100" name="txtProjectName" style="width:100%"/></span></br>
                            <span><label>Description</label></span></br>
                            <span><textarea maxlength="250" name="txtProjectDescription" style="width:100%"></textarea></span></br>
                            <span><label>Begin date</label></span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <input type="text" id="project_begin_date" name="projectBDate"/>
                                    <img id="calendar_icon1" src="assets/dhtmlx/dhtmlxCalendar/codebase/imgs/calendar.gif" border="0">
                                </div>
                            </span></br>
                            <span><label>End date</label></span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <input type="text" id="project_end_date" name="projectEDate"/>
                                    <img id="calendar_icon2" src="assets/dhtmlx/dhtmlxCalendar/codebase/imgs/calendar.gif" border="0">
                                </div>
                            </span></br>
                            <!--
                            <span>Project owner</span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <select id="cboProjectOwner" style="width:230px;" disabled>
                                        <option value="-1" selected></option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                    </select>
                                </div>
                            </span></br>
                            <span>Project contributor</span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <select id="cboPermissionView" style="width:230px;" mode="checkbox" disabled>
                                        <option value="-1" selected></option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                        <option value="0">aaaaa</option>
                                        <option value="1">bbbbb</option>
                                    </select>
                                </div>
                            </span></br>-->
                        </div>
                    </div>
                    <div class="row">
                        <div id="success" class="hidden">
                            <h4><span id='call-success' class='label label-success'>success</span></h4>
                        </div>
                        <div id="failure" class="hidden">
                            <h4><span id='call-failure' class='label label-warning'>failure</span></h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span><input id="submitInsertProject" type="submit" class="btn btn-primary btn-sm" value="Add" /></span>
                    <span><input id="submitUpdateProject" type="submit" class="btn btn-primary btn-sm hidden" value="Save" /></span>
                    <span><button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>Cancel</button></span>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal new task-->
<div class="modal fade modal-wide" id="newTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--<form action='earthids/new' method="post" role="form">-->
    <form id="ajaxInsertTask" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <div>
                        <h4 class="modal-title task_title_name" id="myModalLabel">Task details</h4>
                        <div id="task_project_title_name"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style='border:0px solid red;'>
                            <span><label>Name</label></span></br>
                            <span><input type="text" maxlength="150" name="txtTaskName" style="width:100%"/></span></br>
                            <span><label>Description</label></span></br>
                            <!--<div style="border:1px solid #D2D2D2;height: 30px;"><span><textarea maxlength="250" id="txtTaskDescription" name="txtTaskDescription" style="width:100%; height: 100px;"></textarea></span></br></div>-->
                            <span><div id="taskckeditor" contenteditable="true"></div></span>
                            <span><label>Begin date</label></span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <input type="text" id="task_begin_date" name="taskBDate"/>
                                    <img id="calendar_icon3" src="assets/dhtmlx/dhtmlxCalendar/codebase/imgs/calendar.gif" border="0">
                                </div>
                            </span></br>
                            <span><label>End date</label></span></br>
                            <span>
                                <div style="position:relative;height:20px;">
                                    <input type="text" id="task_end_date" name="taskEDate"/>
                                    <img id="calendar_icon4" src="assets/dhtmlx/dhtmlxCalendar/codebase/imgs/calendar.gif" border="0">
                                </div>
                            </span></br>
                            <span>
                                <span style="padding-right: 10px"><label>Status</label></span></br>
                                <div style="border: 0px solid red;width: 370px;">
                                    <div class="status_radio" style="float:left;clear: both;border: 0px solid red;">
                                        <input id="radioStatus1" type="radio" name="radioStatus" value="0" checked="checked"><label for="radioStatus1" class="radio">Open</label>
                                        </br>
                                        <input id="radioStatus2" type="radio" name="radioStatus" value="1"><label for="radioStatus2" class="radio">In progress</label>
                                        </br>
                                        <input id="radioStatus3" type="radio" name="radioStatus" value="2"><label for="radioStatus3" class="radio">Completed</label>
                                    </div>
                                    <div style="float:right;border: 0px solid green;margin-top: 30px;">
                                        <!--<div class="html5-progress-bar">
                                            <div class="progress-bar-wrapper">
                                                <progress id="status_progress_bar" value="0" max="100"></progress>
                                                <span class="progress-value">
                                                    <input type="text" value="0" id="text_status_progress" for="points" name="txtStatusProgress" style="width:30px; margin-left:5px;margin-top:-15px" maxlength="3" disabled/> %
                                                </span>
                                            </div>
                                        </div>-->
                                        <div class="html5-slider-bar">
                                            <div class="progress-bar-wrapper">
                                            <!--<input type=range min=0 max=100 value=0 id=fader step=1 oninput="$('#text_status_slider').val(value)">-->
                                                <div class="slider" style="float:left;clear: both;"><input type=range id="status_slider_bar" min=0 max=100 value=0 step=1  oninput="$('#text_status_slider').val(value)" disabled></div>
                                                <span class="slider-value" style="float:right;">
                                                    <input type="text" value="0" id="text_status_slider" name="txtStatusSlider" style="width:30px; margin-left:5px;margin-top:-15px" maxlength="3" disabled/> %
                                                </span>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                            </span>
                            <span class="">
                                <span style="padding-right: 10px"><label>Priority</label></span></br>
                                <div class="status_radio">
                                    <div>
                                        <input id="radioStatus4" type="radio" name="radioPriority" value="0" checked="checked"><label for="radioStatus4" class="radio">Important</label>
                                        </br>
                                        <input id="radioStatus5" type="radio" name="radioPriority" value="1"><label for="radioStatus5" class="radio">Urgent</label>
                                        </br>
                                        <input id="radioStatus6" type="radio" name="radioPriority" value="2"><label for="radioStatus6" class="radio">Critical</label>
                                    </div>
                                </div>
                            </span>
                            <span><label>Tag</label></span></br>
                            <span class="hidden"><input type="text" maxlength="150" name="txtTaskTags" style="height:30px;"/></span>
                            <div id="show_tasks_tags"></div>
                            <span><input type="text" maxlength="150" name="txtTaskTag" style="width:100px;"/></span>
                            <span><button id="insertTag" type="button" class="btn btn-default btn-xs">Add tag</button></span>
                            <span><button id="clearTag" type="button" class="btn btn-default btn-xs">Clear tag</button></span>
                            <span style='color:grey;font-size: 12px;'>Add at most 10 tags</span>
                        </div>
                    </div>
                    <div class="row">
                        <div id="success" class="hidden">
                            <h4><span id='call-success' class='label label-success'>success</span></h4>
                        </div>
                        <div id="failure" class="hidden">
                            <h4><span id='call-failure' class='label label-warning'>failure</span></h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span><input id="submitInsertAndNewTask" type="submit" class="btn btn-primary btn-sm" value="Add & New" /></span>
                    <span><input id="submitInsertTask" type="submit" class="btn btn-primary btn-sm" value="Add" /></span>
                    <span><input id="submitUpdateTask" type="submit" class="btn btn-primary btn-sm hidden" value="Save" /></span>
                    <span><button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>Cancel</button></span>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        //Check for p/t/c updates
        setInterval(function() {
            //Load change to projects
            ajaxGetProjects();

            //Ajaax function to check if enable or not button 'All seen'
            //$('#setHighlightAllSeen').removeClass('hidden');

            //Load change to tasks of the selected project
            //ajaxGetTasks(dataViewProject.getSelected(), false);
            //Load change to comments of the selected task
            //ajaxGetComments(dataViewTask.getSelected(), false);
        }, 10 * 1000); // executed every 15 seconds


        //console.log($('#col_project').width());
        //console.log($('#col_task').width());
        //console.log($('#col_comment').width());

        //210 450 690 = 1350
        //16% 33% 51

        //console.log($(document).height());
        //$('#project').height($(document).height()-185);
        //$('#task').height($(document).height()-185);
        //$('#comment').height($(document).height()-375);
        //console.log($('#taskDetails').height());
        doc_width = $(document).width();// $(window).width() );
        project_width = doc_width * 16 / 100;
        task_width = doc_width * 33 / 100;
        comment_width = doc_width * 51 / 100;

        //console.log(Math.round(project_width-20));
        //console.log(Math.round(task_width-26));
        //console.log(Math.round(comment_width-44));


        //Initialize ckeditor
        var roxyFileman = 'assets/fileman/index.html';
        ck = CKEDITOR.replace('taskckeditor', {
            filebrowserBrowseUrl:roxyFileman,
            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
            removeDialogTabs: 'link:upload;image:upload',
            height:'100%'});
        ck.on('instanceReady', function( ev ) {
            var editor = ev.editor;
            editor.setReadOnly(false);
        });

        //Declare task_object, will be copy of dataViewTask
        //task_object = [];


        //Initialize dataView project
        dataViewProject = new dhtmlXDataView({
            container:"project",
            type:{
                template:function(obj){
                    return "<div class='dataViewProject_row' style='border-bottom:5px solid "+(obj.highlight_row)+"'>" +
                "           <div class='dataViewProject_desc'>" +
                "           <span class='hidden'>"+(obj.id)+"</span> " +
                "           <span class='dhx_strong' style='margin:0px;padding:0px;border:0px solid red;font-weight: bold;font-size: 13px'>"+(obj.name)+"</span>" +
                "           <span class='hidden' style=''>"+(obj.description)+"</span>" +
                "           <span class='dhx_light' style='border:0px solid red;margin-top:-5px;'>"+(obj.short_desc)+"</span><br />" +
                "           <span class='hidden'>"+(obj.created_at)+"</span> " +
                "           <span class='hidden'>"+(obj.updated_at)+"</span> " +
                "           <span class='hidden'>"+(obj.start_at)+"</span>" +
                "           <span class='hidden'>"+(obj.end_at)+"</span>" +
                "           <span><img src='"+(obj.icon_task)+"' style=''></span>" +
                "           <span><img src='"+(obj.icon_comment)+"' style=''></span>" +
                "           </div>" +
                "           <div class='dataViewProject_avatar'>" +
                "           <span><img src='"+(obj.avatar)+"' style=''></span>" +
                "           </div>" +
                "    </div>";
                },
                height:60,
                width:210,
                padding:0
            },
            drag:true
        });
        //Initialize dataViewTask
        dataViewTask = new dhtmlXDataView({
            container:"task",
            type:{
                template:function(obj){
                    return "<div class='dataViewTask_row' style='border-bottom:5px solid "+(obj.highlight_row)+"'>" +
                "               <div class='"+(obj.border)+"'></div>" +
                    "           <div class='dataViewTask_desc'>" +
                        "           <span class='dhx_strong' style='padding:0px;font-weight: bold;font-size: 13px'>"+(obj.name)+"</span>" +
                "                   <span class='dhx_light' style='border:0px solid red;margin-top:-5px;' >"+(obj.show_status)+"</span></br>" +
                        "           <span class='hidden'>"+(obj.description)+"</span>" +
                        "           <span class='hidden'>"+(obj.status)+"</span>" +
                        "           <span class='hidden'>"+(obj.status_percentage)+"</span>" +
                        "           <span class='hidden'>"+(obj.priority)+"</span>" +
                        "           <span class='hidden'>"+(obj.start_at)+"</span>" +
                        "           <span class='hidden'>"+(obj.end_at)+"</span>" +
                        "           <span class='hidden'>"+(obj.created_at)+"</span>" +
                        "           <span class='hidden'>"+(obj.owner)+"</span>" +
                    "               <span><img src='"+(obj.icon_comment)+"' style=''></span>" +
                        "           <span class=''>"+(obj.new_tags)+"</span>" +
                        "           <span class='hidden'>"+(obj.tags)+"</span>" +
                    "           </div>" +
                "               <div class='dataViewTask_avatar'>" +
                "                   <span><img src='"+(obj.avatar)+"' style=''></span>" +
                "               </div>" +
                "           </div>";
                },
                height:60,
                width:450,
                padding:0
                //css:'custom'
            },
            drag:true
        });
        //Initialize dataViewComment
        dataViewComment = new dhtmlXDataView({
            container:"comment",
            type:{
                template:function(obj){
                    return "  <div class='dataViewComment_row' style='border-bottom:5px solid "+(obj.highlight_row)+"'>" +
                    "           <div class='dataViewComment_desc'>" +
                        "           <span style='border:0px solid red;margin-top:5px;font-size:14px;' class=''>"+(obj.description)+"</span>" +
                        "           <span class='hidden dhx_light'>"+(obj.created_at)+"</span> " +
                        "           <span class='hidden dhx_light'>"+(obj.created_by)+"</span></br>" +
                    "           </div>" +
                    "           <div class='dataViewComment_avatar'>" +
                        "           <span><img src='"+(obj.avatar)+"' style=''></span>" +
                    "           </div>" +
                    "    </div>";
                },
                width:690,
                height:60,
                padding:0
            },
            drag:true
        });

        //Resize dataview when window resize event is fired
        $(window).resize(function() {

            $('#project').height($(document).height()-200);
            /*dataViewProject.define("type", {
                template:function(obj){
                    return "<div class='dataViewProject_row' style='border-bottom:5px solid "+(obj.highlight_row)+"'>" +
                    "           <div class='dataViewProject_desc'>" +
                    "           <span class='hidden'>"+(obj.id)+"</span> " +
                    "           <span class='dhx_strong' style='font-weight: bold;font-size: 13px'>"+(obj.name)+"</span>" +
                    "           <span class='dhx_light' style='border:0px solid red;margin-top:-5px;'>"+(obj.description)+"</span>" +
                    "           <span class='hidden'>"+(obj.created_at)+"</span> " +
                    "           <span class='hidden'>"+(obj.updated_at)+"</span> " +
                    "           <span class='hidden'>"+(obj.start_at)+"</span>" +
                    "           <span class='hidden'>"+(obj.end_at)+"</span>" +
                    "           </div>" +
                    "           <div class='dataViewProject_avatar'>" +
                    "           <span><img src='"+(obj.avatar)+"' style=''></span>" +
                    "           </div>" +
                    "    </div>";
                },
                height:55,
                width:Math.round(project_width-20),
                padding:0
               });
            dataViewTask.define("type", {width:Math.round(task_width-20)});
            dataViewComment.define("type", {width:Math.round(comment_width-20)});*/


            //console.log(Math.round(project_width-20));
            //console.log(Math.round(task_width-26));
            //console.log(Math.round(comment_width-44));

            //console.log($('#col_project').width());
            //console.log($('#col_task').width());
            //console.log($('#col_comment').width());

        });

        //Attach click event to dataViewProject
        dataViewProject.attachEvent("onItemClick", function (id, ev, html){
            //Check highlighting
            if (dataViewProject.get(id).highlight_row != 'transparent'){
                //Remove highlighting
                dataViewProject.unselect(id);
                dataViewProject.get(id).highlight_row = 'transparent';
                //Delete row from table
                console.log($highlight_pref);
                if ($highlight_pref == 0)
                    ajaxPTCSetViewed(id, -1, -1);
                //Set selected row
                dataViewProject.select(id);
            }
            //Don't reload tasks if click on the same project
            if(dataViewProject.getSelected()==id){
                return true;
            };
            //Populate dataViewTask
            ajaxGetTasks(id, true);

            setTimeout(function(){
                //console.log($('#taskDetails').height());
                $('#comment').height($(document).height()-315-$('#taskDetails').height());
            }, 100);

            return true;
        });
        //Attach double click event to dataViewProject
        dataViewProject.attachEvent("onItemDblClick", function (id, ev, html){
            //Show modal project
            onModalLoadProject();
            //Set title modal
            $('.project_title_name').html("Project '" + dataViewProject.get(dataViewProject.getSelected()).name + "' details");
            //Populate field from dataViewProject for update
            $('input[name="txtProjectName"]').val(dataViewProject.get(dataViewProject.getSelected()).name);
            $('textarea[name="txtProjectDescription"]').val(dataViewProject.get(dataViewProject.getSelected()).description);
            //Get date
            if (dataViewProject.get(dataViewProject.getSelected()).start_at != '1970-01-01 00:00:00'){
                myCalendarPStartDate.setDate(dataViewProject.get(dataViewProject.getSelected()).start_at);
                $('input[name="projectBDate"]').val(dataViewProject.get(dataViewProject.getSelected()).start_at.substr(0,10));
            }
            if (dataViewProject.get(dataViewProject.getSelected()).end_at != '1970-01-01 00:00:00'){
                myCalendarPEndDate.setDate(dataViewProject.get(dataViewProject.getSelected()).end_at);
                $('input[name="projectEDate"]').val(dataViewProject.get(dataViewProject.getSelected()).end_at.substr(0,10));
            }

                        //get combo

            //Set button add/save
            $('#submitInsertProject').addClass("hidden");
            $('#submitUpdateProject').removeClass("hidden");

            return true;
        });
        //Attach click event to dataViewTask
        dataViewTask.attachEvent("onItemClick", function (id, ev, html){
            //Check highlighting
            if (dataViewTask.get(id).highlight_row != 'transparent'){
                //Remove highlighting
                dataViewTask.unselect(id);
                dataViewTask.get(id).highlight_row = 'transparent';
                //Delete row from table
                console.log($highlight_pref);
                if ($highlight_pref == 0)
                    ajaxPTCSetViewed(dataViewProject.getSelected(), id, -1);
                //Set selected row
                dataViewTask.select(id);
            }
            //Don't reload tasks if click on the same project
            if(dataViewTask.getSelected()==id){
                return true;
            };
            //Populate dataViewComment
            $('#taskDetails').html(dataViewTask.get(id).description);

            ajaxGetComments(id, true);

            setTimeout(function(){
                //console.log($(document).height());
                $('#comment').height($(document).height()-315-($('#taskDetails').height()*2));
            }, 100);
            return true;
        });
        //Attach double click event to dataViewTask
        dataViewTask.attachEvent("onItemDblClick", function (id, ev, html){
            //Show modal task
            onModalLoadTask();
            $('#submitInsertAndNewTask').addClass("hidden");

            //Set title modal
            $('.task_title_name').html("Task '" + dataViewTask.get(dataViewTask.getSelected()).name + "' details");
            $('#task_project_title_name').html('[Project ' + dataViewProject.get(dataViewProject.getSelected()).name + ']');
            //Populate field from dataViewProject for update
            $('input[name="txtTaskName"]').val(dataViewTask.get(dataViewTask.getSelected()).name);
            //$('textarea[name="txtTaskDescription"]').val(dataViewTask.get(dataViewTask.getSelected()).description);
            //$('#taskckeditor').text(dataViewTask.get(dataViewTask.getSelected()).description);

            setTimeout(function(){
                ck.setData(dataViewTask.get(dataViewTask.getSelected()).description, function() {
                    this.checkDirty();  // true
                });
            }, 100);


            //Get date
            if (dataViewTask.get(dataViewTask.getSelected()).start_at != '1970-01-01 00:00:00'){
                myCalendarTStartDate.setDate(dataViewTask.get(dataViewTask.getSelected()).start_at);
                $('input[name="taskBDate"]').val(dataViewTask.get(dataViewTask.getSelected()).start_at.substr(0,10));
            }
            if (dataViewTask.get(dataViewTask.getSelected()).end_at != '1970-01-01 00:00:00'){
                myCalendarTEndDate.setDate(dataViewTask.get(dataViewTask.getSelected()).end_at);
                $('input[name="taskEDate"]').val(dataViewTask.get(dataViewTask.getSelected()).end_at.substr(0,10));
            }

            //Get status and priority
            //$('input[type="radioStatus"]:checked').val(dataViewTask.get(dataViewTask.getSelected()).status);
            //$('input[type="radioPriority"]:checked').val(dataViewTask.get(dataViewTask.getSelected()).priority);

            $("input[name=radioStatus][value=" + dataViewTask.get(dataViewTask.getSelected()).status + "]").prop('checked', true);
            $("input[name=radioPriority][value=" + dataViewTask.get(dataViewTask.getSelected()).priority + "]").prop('checked', true);
            //$('#status_progress_bar').val(dataViewTask.get(dataViewTask.getSelected()).status_percentage);
            $('#status_slider_bar').val(dataViewTask.get(dataViewTask.getSelected()).status_percentage);
            //$('input[name="txtStatusProgress"]').val(dataViewTask.get(dataViewTask.getSelected()).status_percentage);
            $('input[name="txtStatusSlider"]').val(dataViewTask.get(dataViewTask.getSelected()).status_percentage);
            if ($('input[name="radioStatus"]:checked').val() == 1){
                $('input[name="txtStatusSlider"]').removeAttr("disabled");
                $('#status_slider_bar').removeAttr("disabled");
            }
            else{
                $('input[name="txtStatusSlider"]').attr("disabled", "disabled");
                $('#status_slider_bar').attr("disabled", "disabled");
            }

            $('input[name="txtTaskTags"]').val(dataViewTask.get(dataViewTask.getSelected()).tags);

            var tags = dataViewTask.get(dataViewTask.getSelected()).tags;
            var tags_array = tags.split(",");
            for (var it = 0; it < tags_array.length; it++) {
                if(tags_array[it] != '')
                    $('#show_tasks_tags').append("<button type='button' class='btn btn-info btn-xxs btn-grey-bottom'>"+tags_array[it]+"</button>");
            }
            if (checkTags($('input[name="txtTaskTags"]').val()) < 9)
                $('#insertTag').removeAttr("disabled");
            //$("#idAddComment").removeAttr("disabled");
            else
                $('#insertTag').attr("disabled", "disabled");


            //get combo ownership
            //get combo permissions

            //Set button add/save
            $('#submitInsertTask').addClass("hidden");
            $('#submitUpdateTask').removeClass("hidden");

            return true;
        });
        //Attach click event to dataViewComment
        dataViewComment.attachEvent("onItemClick", function (id, ev, html){
            if (dataViewComment.get(id).highlight_row != 'transparent'){
                //Remove highlighting
                dataViewComment.unselect(id);
                dataViewComment.get(id).highlight_row = 'transparent';
                //Delete row from table
                console.log($highlight_pref);
                if ($highlight_pref == 0)
                    ajaxPTCSetViewed(dataViewProject.getSelected(), dataViewTask.getSelected(), id);
                //Set selected row
                dataViewComment.unselect(id);
                //dataViewComment.select(id);
            }
            return true;
        });

        //Initialize date
        myCalendarPStartDate = new dhtmlXCalendarObject({input: "project_begin_date", button: "calendar_icon1"});
        myCalendarPEndDate = new dhtmlXCalendarObject({input: "project_end_date", button: "calendar_icon2"});
        myCalendarTStartDate = new dhtmlXCalendarObject({input: "task_begin_date", button: "calendar_icon3"});
        myCalendarTEndDate = new dhtmlXCalendarObject({input: "task_end_date", button: "calendar_icon4"});
        myCalendarPStartDate.hideTime();
        myCalendarPEndDate.hideTime();
        myCalendarTStartDate.hideTime();
        myCalendarTEndDate.hideTime();
        //myCalendarPStartDate.setSkin('dhx_skyblue');

        //Initialize combo ownership
        //var cboProjectOwner;
        //var cboPermissionView;
        //cboProjectOwner = dhtmlXComboFromSelect("cboProjectOwner");
        //cboProjectOwner.enable(false);
        //cboPermissionView = dhtmlXComboFromSelect("cboPermissionView", "combo", 230, "checkbox");
        //cboPermissionView.enable(false);

        //Load projects
        //Get highlight and filter from preferences
        $highlight_pref = 0;
        $filter_task = 0;
        search_task_name = 0;
        search_task_description = 0;
        search_task_tag = 0;
        search_task = '';

        $('#setHighlightNo').addClass('active');
        $('#getAllTask').addClass('active');
        ajaxGetProjects();

        //Update comment character left
        $('textarea[name="txtComment"]').keyup( function() {
            var remaining = 140 - $('textarea[name="txtComment"]').val().length;
            $('.countdown').text(remaining + ' characters left');
        });

        //Progress bar status
        //Update comment character left
        //$('input[name="txtStatusProgress"]').keyup( function() {
        $('input[name="txtStatusSlider"]').keyup( function() {
            //if (isNumeric($('input[name="txtStatusProgress"]').val()) == true){
            if (isNumeric($('input[name="txtStatusSlider"]').val()) == true){
                if ($('input[name="txtStatusSlider"]').val() > 100)
                    $('input[name="txtStatusSlider"]').val(100);
                //$('#status_progress_bar').val($('input[name="txtStatusProgress"]').val());
                $('#status_slider_bar').val($('input[name="txtStatusSlider"]').val());
            }
            else{
                //$('input[name="txtStatusProgress"]').val('0');
                //$('input[name="txtStatusProgress"]').select();
                $('input[name="txtStatusSlider"]').val('0');
                $('input[name="txtStatusSlider"]').select();
            }
        });
        //$('input[name="txtStatusProgress"]').click( function() {
            //$('input[name="txtStatusProgress"]').select();
        $('input[name="txtStatusSlider"]').click( function() {
            $('input[name="txtStatusSlider"]').select();
        });
        $("input[name='radioStatus']").click(function() {
            if ($('input[name="radioStatus"]:checked').val() == 1){
                //$('input[name="txtStatusProgress"]').removeAttr("disabled");
                $('input[name="txtStatusSlider"]').removeAttr("disabled");
                $('#status_slider_bar').removeAttr("disabled");
            }
            else{
                //$('input[name="txtStatusProgress"]').attr("disabled", "disabled");
                //$('input[name="txtStatusProgress"]').val('0');
                //$('#status_progress_bar').val(0);
                $('input[name="txtStatusSlider"]').attr("disabled", "disabled");
                $('input[name="txtStatusSlider"]').val('0');
                $('#status_slider_bar').val(0);
                $('#status_slider_bar').attr("disabled", "disabled");
            }
        });

        //Highlights
        $('#setHighlightNo').click(function() {
            $highlight_pref = 0;
            $('#setHighlightNo').addClass('active');
            $('#setHighlight1h').removeClass('active');
            $('#setHighlight4h').removeClass('active');
            $('#setHighlight8h').removeClass('active');
            $('#setHighlight1d').removeClass('active');
            $('#setHighlight1w').removeClass('active');
            $('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlight1h').click(function() {
            $highlight_pref = 1;
            $('#setHighlight1h').addClass('active');
            $('#setHighlightNo').removeClass('active');
            $('#setHighlight4h').removeClass('active');
            $('#setHighlight8h').removeClass('active');
            $('#setHighlight1d').removeClass('active');
            $('#setHighlight1w').removeClass('active');
            $('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlight4h').click(function() {
            $highlight_pref = 2;
            $('#setHighlight4h').addClass('active');
            $('#setHighlight1h').removeClass('active');
            $('#setHighlightNo').removeClass('active');
            $('#setHighlight8h').removeClass('active');
            $('#setHighlight1d').removeClass('active');
            $('#setHighlight1w').removeClass('active');
            //$('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlight8h').click(function() {
            $highlight_pref = 3;
            $('#setHighlight8h').addClass('active');
            $('#setHighlight1h').removeClass('active');
            $('#setHighlight4h').removeClass('active');
            $('#setHighlightNo').removeClass('active');
            $('#setHighlight1d').removeClass('active');
            $('#setHighlight1w').removeClass('active');
            //$('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlight1d').click(function() {
            $highlight_pref = 4;
            $('#setHighlight1d').addClass('active');
            $('#setHighlight1h').removeClass('active');
            $('#setHighlight4h').removeClass('active');
            $('#setHighlight8h').removeClass('active');
            $('#setHighlightNo').removeClass('active');
            $('#setHighlight1w').removeClass('active');
            //$('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlight1w').click(function() {
            $highlight_pref = 5;
            $('#setHighlight1w').addClass('active');
            $('#setHighlight1h').removeClass('active');
            $('#setHighlight4h').removeClass('active');
            $('#setHighlight8h').removeClass('active');
            $('#setHighlight1d').removeClass('active');
            $('#setHighlightNo').removeClass('active');
            //$('#setHighlightAllSeen').removeClass('active');
            ajaxGetProjects();
        });
        $('#setHighlightAllSeen').click(function() {
            //$highlight_pref = 6;
            //$('#setHighlightAllSeen').addClass('active');
            //$('#setHighlight1h').removeClass('active');
            //$('#setHighlight4h').removeClass('active');
            //$('#setHighlight8h').removeClass('active');
            //$('#setHighlight1d').removeClass('active');
            //$('#setHighlight1w').removeClass('active');
            //$('#setHighlightNo').removeClass('active');
            //$('#setHighlightAllSeen').addClass('hidden');
            ajaxPSetViewed(dataViewProject.getSelected());
            //ajaxGetProjects();
        });

        $('#getAllTask').click(function() {
            $filter_task = 0;
            $('#getAllTask').addClass('active');
            $('#getOpenTask').removeClass('active');
            $('#getInProgressTask').removeClass('active');
            $('#getCompletedTask').removeClass('active');
            $('#getOverdueTask').removeClass('active');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });
        $('#getOpenTask').click(function() {
            $filter_task = 1;
            $('#getOpenTask').addClass('active');
            $('#getAllTask').removeClass('active');
            $('#getInProgressTask').removeClass('active');
            $('#getCompletedTask').removeClass('active');
            $('#getOverdueTask').removeClass('active');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });
        $('#getInProgressTask').click(function() {
            $filter_task = 2;
            $('#getInProgressTask').addClass('active');
            $('#getOpenTask').removeClass('active');
            $('#getAllTask').removeClass('active');
            $('#getCompletedTask').removeClass('active');
            $('#getOverdueTask').removeClass('active');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });
        $('#getCompletedTask').click(function() {
            $filter_task = 3;
            $('#getCompletedTask').addClass('active');
            $('#getOpenTask').removeClass('active');
            $('#getInProgressTask').removeClass('active');
            $('#getAllTask').removeClass('active');
            $('#getOverdueTask').removeClass('active');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });
        $('#getOverdueTask').click(function() {
            $filter_task = 4;
            $('#getOverdueTask').addClass('active');
            $('#getOpenTask').removeClass('active');
            $('#getInProgressTask').removeClass('active');
            $('#getCompletedTask').removeClass('active');
            $('#getAllTask').removeClass('active');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });

        $('#searchOnTaskName').click(function() {
            if ($('#searchOnTaskName').hasClass('active')){
                $('#searchOnTaskName').removeClass('active');
                search_task_name = 0;
            }
            else{
                $('#searchOnTaskName').addClass('active');
                search_task_name = 1;
                if ($('input[name="txtTaskSearch"]').val() != '')
                    ajaxGetTasks(dataViewProject.getSelected(), true);
            }
            if (search_task_name == 1 || search_task_description == 1 || search_task_tag == 1)
                $('#circle-x-search-task').removeClass('hidden');
            else
                $('#circle-x-search-task').addClass('hidden');
            if ($('#searchOnTaskName').hasClass('active') ||
                $('#searchOnTaskDescription').hasClass('active') ||
                $('#searchOnTaskTag').hasClass('active')){
                $('input[name="txtTaskSearch"]').removeAttr("disabled");
            }
            else
                $('input[name="txtTaskSearch"]').attr("disabled", "disabled");
        });
        $('#searchOnTaskDescription').click(function() {
            if ($('#searchOnTaskDescription').hasClass('active')){
                $('#searchOnTaskDescription').removeClass('active');
                search_task_description = 0;
            }
            else{
                $('#searchOnTaskDescription').addClass('active');
                search_task_description = 1;
                if ($('input[name="txtTaskSearch"]').val() != '')
                    ajaxGetTasks(dataViewProject.getSelected(), true);
            }
            if (search_task_name == 1 || search_task_description == 1 || search_task_tag == 1)
                $('#circle-x-search-task').removeClass('hidden');
            else
                $('#circle-x-search-task').addClass('hidden');
            if ($('#searchOnTaskName').hasClass('active') ||
                $('#searchOnTaskDescription').hasClass('active') ||
                $('#searchOnTaskTag').hasClass('active')){
                $('input[name="txtTaskSearch"]').removeAttr("disabled");
            }
            else
                $('input[name="txtTaskSearch"]').attr("disabled", "disabled");
        });
        $('#searchOnTaskTag').click(function() {
            if ($('#searchOnTaskTag').hasClass('active')){
                $('#searchOnTaskTag').removeClass('active');
                search_task_tag = 0;
            }
            else{
                $('#searchOnTaskTag').addClass('active');
                search_task_tag = 1;
                if ($('input[name="txtTaskSearch"]').val() != '')
                    ajaxGetTasks(dataViewProject.getSelected(), true);
            }
            if (search_task_name == 1 || search_task_description == 1 || search_task_tag == 1)
                $('#circle-x-search-task').removeClass('hidden');
            else
                $('#circle-x-search-task').addClass('hidden');
            if ($('#searchOnTaskName').hasClass('active') ||
                $('#searchOnTaskDescription').hasClass('active') ||
                $('#searchOnTaskTag').hasClass('active')){
                $('input[name="txtTaskSearch"]').removeAttr("disabled");
            }
            else
                $('input[name="txtTaskSearch"]').attr("disabled", "disabled");
        });
        $('input[name="txtTaskSearch"]').keyup( function() {
            //if (isNumeric($('input[name="txtStatusProgress"]').val()) == true){
            search_task = $('input[name="txtTaskSearch"]').val();
            //if (search_task != '')
                ajaxGetTasks(dataViewProject.getSelected(), true);
        });
        $('#circle-x-search-task').click( function() {
            $('#circle-x-search-task').addClass('hidden');
            $('#searchOnTaskName').removeClass('active');
            $('#searchOnTaskDescription').removeClass('active');
            $('#searchOnTaskTag').removeClass('active');
            $('input[name="txtTaskSearch"]').attr("disabled", "disabled");
            $('input[name="txtTaskSearch"]').val('');
            ajaxGetTasks(dataViewProject.getSelected(), true);
        });

        $('#insertTag').click( function() {

            if($('input[name="txtTaskTag"]').val() != ''){
                var tag = $('input[name="txtTaskTag"]').val();
                if (tag.substr(0, 1) != '#')
                    tag = '#' + tag;

                if($('input[name="txtTaskTags"]').val() == ''){
                    $('input[name="txtTaskTags"]').val(tag);
                    var tags = "<button type='button' class='btn btn-info btn-xxs btn-grey-bottom'>"+tag+"</button>";
                    $('#show_tasks_tags').append(tags);
                }
                else{
                    $('input[name="txtTaskTags"]').val($('input[name="txtTaskTags"]').val()+','+tag);
                    var tags = $('#show_tasks_tags').val()+"<button type='button' class='btn btn-info btn-xxs btn-grey-bottom'>"+tag+"</button>";
                    $('#show_tasks_tags').append(tags);
                }
                $('input[name="txtTaskTag"]').val('');

                //console.log(checkTags($('input[name="txtTaskTags"]').val()));
                if (checkTags($('input[name="txtTaskTags"]').val()) < 9)
                    $('#insertTag').removeAttr("disabled");
                //$("#idAddComment").removeAttr("disabled");
                else
                    $('#insertTag').attr("disabled", "disabled");
            }

        });
        $('#clearTag').click( function() {
            $('#show_tasks_tags').empty();
            $('input[name="txtTaskTags"]').val('');
        });

    });


    function ajaxGetProjects() {

        var count = dataViewProject.dataCount();

        var data = {highlight:$highlight_pref};
        var request = $.ajax({
            //beforeSend: function() { $('#spinnerT').removeClass("hidden"); }, //Show spinner
            //complete: function() { $('#spinnerT').addClass("hidden"); }, //Hide spinner
            url: "projects",
            type: "get",
            data: data,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data)
            //console.log(json);
            var arrayLength = json.length;
            reload_task = false;
            for (var i = 0; i < arrayLength; i++) {
                insert = true;
                update = false;
                highlight = "transparent";
                new_task = "";
                new_comment = "";
                for (var j = 0; j < count; j++) {
                    index = dataViewProject.idByIndex(j);
                    highlight = "transparent";
                    new_task = "";
                    new_comment = "";
                    if (json[i].id == dataViewProject.get(index).id) {
                        insert = false;
                        update = true;
                        if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                            ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                            highlight = "yellow";
                        }
                        if (json[i].new_task == 0)
                            new_task = "assets/images/task.png";
                        if (json[i].new_comment == 0)
                            new_comment = "assets/images/comment.png";
                        if((highlight == dataViewProject.get(index).highlight_row) &&
                            (new_task == dataViewProject.get(index).icon_task) &&
                            (new_comment == dataViewProject.get(index).icon_comment)){
                            //Json row color equal to dataViewProject row color
                            update = false;
                        }
                        break;
                    }
                }

                if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                    ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                    highlight = "yellow";
                }
                if (json[i].new_task == 0)
                    new_task = "assets/images/task.png";
                if (json[i].new_comment == 0)
                    new_comment = "assets/images/comment.png";

                if (json[i].description.length > 18)
                    short_desc = json[i].description.substring(0, 15) + '.....';
                else
                    short_desc = json[i].description;

                if (update == true) {
                    reload_task = true;
                    //console.log('update');
                    //Remove element updated in the grid
                    dataViewProject.remove(dataViewProject.get(index).id);
                    //Add project
                    dataViewProject.add({
                        id:json[i].id,
                        name:json[i].name,
                        description:json[i].description,
                        short_desc: short_desc,
                        avatar:json[i].avatar,
                        highlight_row:highlight,
                        icon_task: new_task,
                        icon_comment: new_comment,
                        start_at:json[i].start_at,
                        end_at:json[i].end_at,
                        created_at:json[i].created_at,
                        updated_at:json[i].updated_at
                    }, i);
                    if (dataViewProject.getSelected() == ''){
                        dataViewProject.select(dataViewProject.idByIndex(i));
                    }
                }
                if (insert == true){
                    reload_task = true;
                    console.log('insert');
                    //Add project
                    dataViewProject.add({
                        id:json[i].id,
                        name:json[i].name,
                        description:json[i].description,
                        short_desc: short_desc,
                        avatar:json[i].avatar,
                        highlight_row:highlight,
                        icon_task: new_task,
                        icon_comment: new_comment,
                        start_at:json[i].start_at,
                        end_at:json[i].end_at,
                        created_at:json[i].created_at,
                        updated_at:json[i].updated_at
                    });
                    if (count == 0){
                        dataViewProject.select(json[i].id);
                    }
                    count = count + 1;
                }

            }
            dataViewProject.refresh();

            if (dataViewProject.getSelected() != null) {
                //Get tasks through ajax call
                ajaxGetTasks(dataViewProject.getSelected(), reload_task);
            }

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    }
    function ajaxGetTasks(id_project, reload) {

        if (reload == true){
            //Clear dataViewTask and dataViewComment
            dataViewTask.clearAll();
            $('#taskDetails').html('');
            dataViewComment.clearAll();
        }

        var count = dataViewTask.dataCount();

        var post = {};
        post.id_project = id_project;
        post.highlight = $highlight_pref;
        post.filter = $filter_task;
        post.searchTaskName = search_task_name;
        post.searchTaskDescription = search_task_description;
        post.searchTaskTag = search_task_tag;
        post.searchTask = search_task;

        var request = $.ajax({
            /*beforeSend: function() { $('#spinnerT').removeClass("hidden"); }, //Show spinner
            complete: function() { $('#spinnerT').addClass("hidden"); }, //Hide spinner*/
            url: "tasks",
            type: "get",
            data: post,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data);
            var arrayLength = json.length;
            reload_comment = false;
            var stat;
            var border;
            /*for (var i = 0; i < arrayLength; i++) {
                if (i == 0)
                    selected = json[i].id;

                //Check if task is completed or not
                if (json[i].status == 0){
                    stat = 'Open';
                }
                else if (json[i].status == 1){
                    stat = 'In progress';
                }
                else{
                    stat = 'Completed';
                }
                if (json[i].priority == 0){
                    border = 'greenLB';
                }
                else if (json[i].priority == 1) {
                    border = 'amberLB';
                }
                else{
                    border = 'redLB';
                }

                if (json[i].status_percentage > 0){
                    stat = stat + ' ' + json[i].status_percentage + '%';
                }

                //Add task
                dataViewTask.add({
                    id:json[i].id,
                    border:border,
                    name:json[i].name,
                    description:json[i].description,
                    avatar:json[i].avatar,
                    status:json[i].status,
                    status_percentage:json[i].status_percentage,
                    show_status:stat,
                    priority:json[i].priority,
                    start_at:json[i].start_at,
                    end_at:json[i].end_at,
                    created_at:json[i].created_at,
                    owner:json[i].owner_id
                });

            }*/
            for (var i = 0; i < arrayLength; i++) {
                insert = true;
                update = false;
                highlight = "transparent";
                for (var j = 0; j < count; j++) {
                    index = dataViewTask.idByIndex(j);
                    highlight = "transparent";
                    new_comment = "";
                    if (json[i].id == dataViewTask.get(index).id) {
                        insert = false;
                        update = true;
                        if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                            ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                            highlight = "yellow";
                        }
                        if (json[i].new_comment == 0)
                            new_comment = "assets/images/comment.png";
                        if((highlight == dataViewTask.get(index).highlight_row) &&
                            (new_comment == dataViewTask.get(index).icon_comment)){
                            //Json row color equal to dataViewTask row color
                            update = false;
                        }
                        break;
                    }
                }

                if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                    ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                    highlight = "yellow";
                }
                if (json[i].new_comment == 0)
                    new_comment = "assets/images/comment.png";

                //Check if task is completed or not
                if (json[i].status == 0){
                    stat = 'Open';
                }
                else if (json[i].status == 1){
                    stat = 'In progress';
                }
                else{
                    stat = 'Completed';
                }
                if (json[i].priority == 0){
                    border = 'greenLB';
                }
                else if (json[i].priority == 1) {
                    border = 'amberLB';
                }
                else{
                    border = 'redLB';
                }
                if (json[i].status_percentage > 0){
                    stat = stat + ' ' + json[i].status_percentage + '%';
                }
                //Check if task is completed or not
                new_tags = '';
                if (json[i].tag != ''){
                    tags = json[i].tag;
                    var splits = tags.split(',');
                    for (t = 0; t < splits.length; t++) {
                        if (splits[t].substr(0, 1) != '#')
                            splits[t] = '#' + splits[t];
                        new_tags = new_tags + '<button type="button" class="btn btn-info btn-xxs">' + splits[t] + '</button>';
                    }
                }

                if (update == true) {
                    reload_comment = true;
                    //console.log('update');
                    //Remove element updated in the grid
                    dataViewTask.remove(dataViewTask.get(index).id);
                    //insert = true;
                    dataViewTask.add({
                        id:json[i].id,
                        border:border,
                        name:json[i].name,
                        description:json[i].description,
                        avatar:json[i].avatar,
                        status:json[i].status,
                        status_percentage:json[i].status_percentage,
                        show_status:stat,
                        priority:json[i].priority,
                        highlight_row:highlight,
                        icon_comment: new_comment,
                        tags:json[i].tag,
                        new_tags:new_tags,
                        start_at:json[i].start_at,
                        end_at:json[i].end_at,
                        created_at:json[i].created_at,
                        owner:json[i].owner_id,
                        updated_at:json[i].updated_at
                    }, i);

/*
                    //Delete from object task_object
                    delete task_object.id [dataViewTask.get(index).id];
                    // Create task_object as an object {}
                    var valueToPush = {};
                    valueToPush.id = json[i].id;
                    valueToPush.border = border;
                    valueToPush.name = json[i].name;
                    valueToPush.description = json[i].description;
                    valueToPush.avatar = json[i].avatar;
                    valueToPush.status = json[i].status;
                    valueToPush.status_percentage = json[i].status_percentage;
                    valueToPush.show_status = stat;
                    valueToPush.priority = json[i].priority;
                    valueToPush.highlight_row = highlight;
                    valueToPush.icon_comment = new_comment;
                    valueToPush.tags = json[i].tag;
                    valueToPush.new_tags = new_tags;
                    valueToPush.start_at = json[i].start_at;
                    valueToPush.end_at = json[i].end_at;
                    valueToPush.created_at = json[i].created_at;
                    valueToPush.owner = json[i].owner_id;
                    valueToPush.updated_at = json[i].updated_at;
                    task_object.push(valueToPush);
                    //console.dir(task_object);
*/

                    if (dataViewTask.getSelected() == '')
                        dataViewTask.select(dataViewTask.idByIndex(i));
                }

                if (insert == true){
                    reload_comment = true;
                    //console.log('insert');
                    //Add task
                    dataViewTask.add({
                        id:json[i].id,
                        border:border,
                        name:json[i].name,
                        description:json[i].description,
                        avatar:json[i].avatar,
                        status:json[i].status,
                        status_percentage:json[i].status_percentage,
                        show_status:stat,
                        priority:json[i].priority,
                        highlight_row:highlight,
                        icon_comment: new_comment,
                        tags:json[i].tag,
                        new_tags:new_tags,
                        start_at:json[i].start_at,
                        end_at:json[i].end_at,
                        created_at:json[i].created_at,
                        owner:json[i].owner_id,
                        updated_at:json[i].updated_at
                    }, i);

/*
                    // Create task_object as an object {}
                    var valueToPush = {};
                    valueToPush.id = json[i].id;
                    valueToPush.border = border;
                    valueToPush.name = json[i].name;
                    valueToPush.description = json[i].description;
                    valueToPush.avatar = json[i].avatar;
                    valueToPush.status = json[i].status;
                    valueToPush.status_percentage = json[i].status_percentage;
                    valueToPush.show_status = stat;
                    valueToPush.priority = json[i].priority;
                    valueToPush.highlight_row = highlight;
                    valueToPush.icon_comment = new_comment;
                    valueToPush.tags = json[i].tag;
                    valueToPush.new_tags = new_tags;
                    valueToPush.start_at = json[i].start_at;
                    valueToPush.end_at = json[i].end_at;
                    valueToPush.created_at = json[i].created_at;
                    valueToPush.owner = json[i].owner_id;
                    valueToPush.updated_at = json[i].updated_at;
                    task_object.push(valueToPush);
                    //console.dir(task_object);
*/

                    if (count == 0){
                        dataViewTask.select(json[i].id);
                    }
                    count = count + 1;
                }

            }

            dataViewTask.refresh();

            if (dataViewTask.getSelected() != ''){
                //Enable button insert comment
                $("#idAddComment").removeAttr("disabled");
                //Show task details
                $('#taskDetails').html(dataViewTask.get(dataViewTask.getSelected()).description);
                //Load comments relatives to the task
                ajaxGetComments(dataViewTask.getSelected(), reload_comment);
            }
            else{
                //Disable button insert comment
                //console.log('not load');
                $("#idAddComment").attr("disabled", "disabled");
            }

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    }
    function ajaxGetComments(id_task, reload) {

        if (reload == true){
            //Clear dataViewTask
            dataViewComment.clearAll();
            //Show task details
            //$("#taskDetails").html(dataViewTask.get(id_task).description);
        }
        var count = dataViewComment.dataCount();

        //var data = {id_task:id_task};
        var $post = {};
        $post.id_project = dataViewProject.getSelected();
        $post.id_task = id_task; //dataViewTask.getSelected();
        $post.highlight = $highlight_pref;

        var request = $.ajax({
            /*beforeSend: function() { $('#spinnerC').removeClass("hidden"); }, //Show spinner
            complete: function() { $('#spinnerC').addClass("hidden"); }, //Hide spinner*/
            url: "comments",
            type: "get",
            data: $post,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data);
            //console.log(json);
            var arrayLength = json.length;
            selected = -1;
            /*for (var i = 0; i < arrayLength; i++) {
                dataViewComment.add({
                    id:json[i].id,
                    description:json[i].description,
                    avatar:json[i].avatar,
                    created_at:json[i].created_at,
                    created_by:json[i].created_by
                });
            }*/
            for (var i = 0; i < arrayLength; i++) {
                insert = true;
                update = false;
                highlight = "transparent";
                for (var j = 0; j < count; j++) {
                    index = dataViewComment.idByIndex(j);
                    highlight = "transparent";
                    if (json[i].id == dataViewComment.get(index).id) {
                        insert = false;
                        update = true;
                        if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                            ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                            highlight = "yellow";
                        }
                        if(highlight == dataViewComment.get(index).highlight_row){
                            //Json row color equal to dataViewTask row color
                            update = false;
                        }
                        break;
                    }
                }

                //console.log(json[i].highlight_row);
                if (((json[i].highlight_row == 0) && ($highlight_pref == 0 )) ||
                    ((json[i].highlight_row != null) && ($highlight_pref > 0) && ($highlight_pref < 6 ))){
                    highlight = "yellow";
                }

                if (update == true) {
                    //console.log('update');
                    //Remove element updated in the grid
                    dataViewComment.remove(dataViewComment.get(index).id);
                    //insert = true;
                    dataViewComment.add({
                        id:json[i].id,
                        description:json[i].description,
                        avatar:json[i].avatar,
                        highlight_row:highlight,
                        created_at:json[i].created_at,
                        created_by:json[i].created_by
                    }, i);
                    //dataViewTask.select(json[i].id);
                }

                if (insert == true){
                    if (count == 0)
                        selected = json[i].id;

                    //console.log('insert');
                    //Projects created by someone else
                    dataViewComment.add({
                        id:json[i].id,
                        description:json[i].description,
                        avatar:json[i].avatar,
                        highlight_row:highlight,
                        created_at:json[i].created_at,
                        created_by:json[i].created_by
                    }, i);

                    count = count + 1;
                }


            }
            dataViewComment.refresh();

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

    }



    $('form#ajaxInsertProject').submit(function(e) {
        e.preventDefault();

        //Check fields, if ok insert otherwise show messagge
        mes1 = checkEmpty($('input[name="txtProjectName"]').val());
        mes2 = checkEmpty($('textarea[name="txtProjectDescription"]').val());
        mes3='';
        mes3 = mes1+mes2;
        if (mes3 != ''){
            //Show popup message
            //console.log('some empty field');
            return;
        }

        //New insert or update?
        if($('#submitInsertProject').hasClass('hidden') == true){
            //Update existing project
            ajaxUpdateProject();
            return;
        }

        //Insert new project

        //Check fields, if ok insert otherwise show messagge

        $('#newProject').modal('hide');

        var $post = {};
        $post.name = $('input[name="txtProjectName"]').val();
        $post.description = $('textarea[name="txtProjectDescription"]').val();
        if ($('input[name="projectBDate"]').val() != '')
            $post.start = myCalendarPStartDate.getDate();
        else
            $post.start = null;
        if ($('input[name="projectEDate"]').val() != '')
            $post.end = myCalendarPEndDate.getDate();
        else
            $post.end = null;

        var request = $.ajax({
            url: "projects/addNew",
            type: "post",
            data: $post,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data); // create an object with the key of the array

            if (json.description.length > 18)
                short_desc = json.description.substring(0, 15) + '.....';
            else
                short_desc = json.description;

            dataViewProject.add({
                id:json.id,
                name:json.name,
                avatar:json.avatar,
                highlight_row:'transparent',
                icon_task: '',
                icon_comment: '',
                description:json.description,
                short_desc: short_desc,
                start_at:json.start_at,
                end_at:json.end_at,
                created_at:json.created_at,
                updated_at:json.updated_at
            }, 0);
            dataViewProject.refresh();

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

    });
    $('form#ajaxInsertTask').submit(function(e){
        e. preventDefault();


        //Check fields, if ok insert otherwise show messagge
        mes1 = checkEmpty($('input[name="txtTaskName"]').val());
        if (mes1 != ''){
            //Show popup message
            //console.log('some empty field');
            return;
        }



        //Get id clicked submit button
        var btn_clicked = $(this).find("input[type=submit]:focus").attr('id');

        //Dismiss or not the modal screen
        switch (btn_clicked) {
            case "submitInsertAndNewTask":{
                //Don't dismiss
                break;
            }
            default:{
                //Dismiss
                $('#newTask').modal('hide');
                $('#submitInsertAndNewTask').removeClass("hidden");
                break;
            }
        }

        switch (btn_clicked)
        {
            case "submitInsertTask":
            case "submitInsertAndNewTask":{
                //Insert new task
                var $post = {};
                $post.id_project = dataViewProject.getSelected();
                $post.name = $('input[name="txtTaskName"]').val();
                $post.description = ck.getData();
                if ($('input[name="taskBDate"]').val() != '')
                    $post.start = myCalendarTStartDate.getDate();
                else
                    $post.start = null;
                if ($('input[name="taskEDate"]').val() != '')
                    $post.end = myCalendarTEndDate.getDate();
                else
                    $post.end = null;
                //$post.start = myCalendarTStartDate.getDate();
                //$post.end = myCalendarTEndDate.getDate();
                $post.status = $('input[name="radioStatus"]:checked').val();
                $post.status_percentage = $('input[name="txtStatusSlider"]').val();
                $post.priority = $('input[name="radioPriority"]:checked').val();
                $post.tag = $('input[name="txtTaskTags"]').val();

                var request = $.ajax({
                    url: "tasks/addNew",
                    type: "post",
                    data: $post,
                    dataType: "html"
                });

                request.done(function( data ) {

                    var json = $.parseJSON(data); // create an object with the key of the array

/*
                    //Check if task is completed or not
                    if (json.status == 0){
                        stat = 'Open';
                    }
                    else if (json.status == 1){
                        stat = 'In progress';
                    }
                    else{
                        stat = 'Completed';
                    }
                    if (json.priority == 0){
                        border = 'greenLB';
                    }
                    else if (json.priority == 1) {
                        border = 'amberLB';
                    }
                    else{
                        border = 'redLB';
                    }

                    if (json.status_percentage > 0){
                        stat = stat + ' ' + json.status_percentage + '%';
                    }

                    //Add new element
                    dataViewTask.add({
                        id:json.id,
                        border:border,
                        name:json.name,
                        description:json.description,
                        avatar:j                        highlight_row:'transparent',
son.avatar,
                        status:json.status,
                        status_percentage:json.status_percentage,
                        show_status:stat,
                        priority:json.priority,
                        created_at:json.                        updated_at:json.updated_at,
created_at,
                        start_at:json.start_at,
                        end_at:json.end_at,
                        owner:js on.owner_id
                    }, 0);
                    dataViewTask.refresh();

                    dataViewTask.select(json.id);
                    dataViewComment.clearAll();
                    $('#taskDetails').html(json.description);
*/
                    //Populate dataViewTask
                    ajaxGetTasks(dataViewProject.getSelected(), true);

                    //Clear modal field
                    clearTaskField();

                });
                request.fail(function( jqXHR, textStatus ) {
                    console.log( "Request failed: " + textStatus );
                });
                break;
            }
            case "submitUpdateTask":{
                //Update task
                //if($('#submitInsertTask').hasClass('hidden') == true){
                ajaxUpdateTask();
                break;
            }
        }

    });
    function ajaxInsertComment(str1) {
        //Check to do on comments

        //Check fields, if ok insert otherwise show messagge
        mes1 = checkEmpty(str1);
        if (mes1 != ''){
            //Show popup message
            //console.log('some empty field');
            return;
        }

        //Ajax parameter
        var $post = {};
        $post.id_project = dataViewProject.getSelected();// $('input[name="txtProjectName"]').val();
        $post.id_task = dataViewTask.getSelected();// $('textarea[name="txtProjectDescription"]', this).val();
        $post.comment_description = str1;
        var request = $.ajax({
                url: "comments/addNew",
                type: "post",
                data: $post,
                dataType: "html"
            });
        request.done(function (data) {
                var json = $.parseJSON(data); // create an object with the key of the array

                dataViewComment.add({
                    id: json.id,
                    description:json.description,
                    avatar:json.avatar,
                    highlight_row:'transparent',
                    created_at:json.created_at,
                    created_by:json.created_by
                }, 0);
                dataViewComment.refresh();

                $('textarea[name="txtComment"]').val('');
                $('.countdown').text('140 characters left');

                //Show messagge comment inserted

            });
        request.fail(function (jqXHR, textStatus) {
                //Show messagge
                console.log("Request failed: " + textStatus);
            });

    }
    function ajaxUpdateProject(){
        //Set button to add project
        $('#submitInsertProject').removeClass("hidden");
        $('#submitUpdateProject').addClass("hidden");
        //Close modal project
        $('#newProject').modal('hide');
        //Ajax parameter
        var $post = {};
        $post.id = dataViewProject.getSelected();
        $post.name = $('input[name="txtProjectName"]').val();
        $post.description = $('textarea[name="txtProjectDescription"]').val();
        if ($('input[name="projectBDate"]').val() != '')
            $post.start = myCalendarPStartDate.getDate();
        else
            $post.start = null;
        if ($('input[name="projectEDate"]').val() != '')
            $post.end = myCalendarPEndDate.getDate();
        else
            $post.end = null;

        var request = $.ajax({
            url: "projects/update",
            type: "post",
            data: $post,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data); // create an object with the key of the array

            if (json.description.length > 18)
                short_desc = json.description.substring(0, 15) + '.....';
            else
                short_desc = json.description;

            //Remove element update in the grid
            index = dataViewProject.indexById(dataViewProject.getSelected());
            dataViewProject.remove(dataViewProject.getSelected());
            //Add new element
            dataViewProject.add({
                id:json.id,
                name:json.name,
                description:json.description,
                short_desc: short_desc,
                avatar:json.avatar,
                highlight_row:'transparent',
                icon_task: '',
                icon_comment: '',
                start_at:json.start_at,
                end_at:json.end_at,
                created_at:json.created_at,
                updated_at:json.updated_at
            }, index);
            dataViewProject.refresh();

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
    }
    function ajaxUpdateTask(){
        //Set button to add task
        $('#submitInsertTask').removeClass("hidden");
        $('#submitUpdateTask').addClass("hidden");
        //Close modal project
        $('#newTask').modal('hide');
        //Ajax parameter
        var $post = {};
        //console.log(dataViewTask.getSelected());
        $post.id = dataViewTask.getSelected();
        $post.id_project = dataViewProject.getSelected();
        $post.name = $('input[name="txtTaskName"]').val();
        $post.description = ck.getData();//$('textarea[name="txtTaskDescription"]').val();
        if ($('input[name="taskBDate"]').val() != '')
            $post.start = myCalendarTStartDate.getDate();
        else
            $post.start = null;
        if ($('input[name="taskEDate"]').val() != '')
            $post.end = myCalendarTEndDate.getDate();
        else
            $post.end = null;
        //$post.start = myCalendarTStartDate.getDate();
        //$post.end = myCalendarTEndDate.getDate();
        $post.status = $('input[name="radioStatus"]:checked').val();
        $post.status_percentage = $('input[name="txtStatusSlider"]').val();
        $post.priority = $('input[name="radioPriority"]:checked').val();
        $post.tag = $('input[name="txtTaskTags"]').val();

        var request = $.ajax({
            url: "tasks/update",
            type: "post",
            data: $post,
            dataType: "html"
        });
        request.done(function( data ) {
            var json = $.parseJSON(data); // create an object with the key of the array


/*            //Remove element update in the grid
            index = dataViewTask.indexById(dataViewTask.getSelected());
            dataViewTask.remove(dataViewTask.getSelected());

            //Check if task is completed or not
            if (json.status == 0){
                stat = 'Open';
            }
            else if (json.status == 1){
                stat = 'In progress';
            }
            else{
                stat = 'Completed';
            }
            if (json.priority == 0){
                border = 'greenLB';
            }
            else if (json.priority == 1) {
                border = 'amberLB';
            }
            else{
                border = 'redLB';
            }

            if (json.status_percentage > 0){
                stat = stat + ' ' + json.status_percentage + '%';
            }

            //Add new element
            dataViewTask.add({
                id:json.id,
                border:border,
                name:json.name,
                description:json.description,
                avatar:j                highlight_row:'transparent',
son.avatar,
                status:json.status,
                status_percentage:json.status_percentage,
                show_status:stat,
                priority:json.priority,
                start_at:json.start_at,
                end_at:js               updated_at:json.updated_at,
                            created_at:jsocreated_at//,
              //owner:json.owner_id
            }, index);
            dataViewTask.refresh();

            dataViewTask.select(json.id);
            $("#taskDetails").html(dataViewTask.get(selected).description);
            //dataViewTask.getSelected(json.id);
*/
            //Populate dataViewTask
            ajaxGetTasks(dataViewProject.getSelected(), true);

            //Clear modal field
            $('input[name="txtTaskName"]').val('');
            //$('textarea[name="txtTaskDescription"]').val('');
            $('#taskckeditor').text('');
            //$('#taskDetails').text('');
            $('input[name="taskBDate"]').val('');
            $('input[name="taskEDate"]').val('');

        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

    }

    function ajaxPTCSetViewed(project_id, task_id, comment_id){
        //Ajax parameter
        var $post = {};
        $post.project_id = project_id;
        $post.task_id = task_id;
        $post.comment_id = comment_id;

        //console.log(project_id);
        //console.log(task_id);
        //console.log(comment_id);
        var request = $.ajax({
            url: "items/setItemViewed",
            type: "post",
            data: $post,
            dataType: "html"
        });
        request.done(function( status ) {
            var response = JSON.parse(status);
            console.log(response.status);
        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

    }
    function ajaxPSetViewed(project_id){
        //Ajax parameter
        var $post = {};
        $post.project_id = project_id;

        var request = $.ajax({
            url: "items/setProjectViewed",
            type: "post",
            data: $post,
            dataType: "html"
        });
        request.done(function( status ) {
            var response = JSON.parse(status);
            console.log(response.status);
        });
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });

    }

    function onModalLoadProject() {
        //Show modal screen
        $('#newProject').modal('show');
        $('.project_title_name').html("Project details");
        //Show/hidden button
        $('#submitInsertProject').removeClass("hidden");
        $('#submitUpdateProject').addClass("hidden");
        //Clear modal field
        clearProjectField();
    }
    function clearProjectField() {
        //Clear modal field
        $('input[name="txtProjectName"]').val('');
        $('textarea[name="txtProjectDescription"]').val('');
        //Clean date
        var today = new Date();
        myCalendarPStartDate.setDate(new Date(today.getFullYear(),today.getMonth(),today.getDate(), today.getHours(), today.getMinutes()));
        myCalendarPEndDate.setDate(new Date(today.getFullYear(),today.getMonth(),today.getDate()+3, today.getHours(), today.getMinutes()));
        $('input[name="projectBDate"]').val('');
        $('input[name="projectEDate"]').val('');
    }
    function onModalLoadTask() {
        //Show modal screen
        $('#newTask').modal('show');
        $('.task_title_name').html("Task details");
        //Show/hidden button
        $('#submitInsertAndNewTask').removeClass("hidden");
        $('#submitInsertTask').removeClass("hidden");
        $('#submitUpdateTask').addClass("hidden");
        //Clear modal field
        clearTaskField();
    }
    function clearTaskField() {
        $('input[name="txtTaskName"]').val('');
        //$('textarea[name="txtTaskDescription"]').val('');
        ck.setData('', function() {
            this.checkDirty();  // true
        });
        $('#taskckeditor').text('');
        //$('#taskDetails').text('');
        //Clean date
        var today = new Date();
        myCalendarTStartDate.setDate(new Date(today.getFullYear(),today.getMonth(),today.getDate(), today.getHours(), today.getMinutes()));
        myCalendarTEndDate.setDate(new Date(today.getFullYear(),today.getMonth(),today.getDate()+3, today.getHours(), today.getMinutes()));
        $('input[name="taskBDate"]').val('');
        $('input[name="taskEDate"]').val('');
        //Set status and priority to default
        $("input[name=radioStatus][value='0']").prop('checked', true);
        $("input[name=radioPriority][value='3']").prop('checked', true);
        //Slider bar
        $('input[name="txtStatusSlider"]').attr("disabled", "disabled");
        $('input[name="txtStatusSlider"]').val('0');
        $('#status_slider_bar').val(0);
        $('input[name="txtTaskTags"]').val('');
        $('#show_tasks_tags').empty();
        //$('input[name="txtStatusProgress"]').attr("disabled", "disabled");
        //$('input[name="txtStatusProgress"]').val('0');
        //$('#status_progress_bar').val(0);
    }

    function checkEmpty(str1) {
        if (str1 == '')
            return 'message error';
        else
            return '';
    }
    function checkTags(str1) {
        matches = str1.match(/,/g);
        if (matches != null)
            return matches.length;
        else
            return 0;
    }
    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

</script>
