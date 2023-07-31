function renderTask(task){
    var render = `
            <div class="todo" data-task-id="${task.id}">
                <input type="checkbox" aria-label="check task" name="task[]" data-id="${task.id}" ${task.task_status == 1 ? `checked` : ``}>
                <div class="todo-clickable" data-task-id="${task.id}" onclick="openTaskView(${task.id})" ${task.task_status == 1 ? `style="text-decoration: line-through;opacity:0.50;"` : ``}>
                    <div class="todo-header">
                        <span class="todo-header-taskname">${task.task_name}</span>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="todo-body">
                        ${task.task_due_date != null ? `<div class="todo-due-date todo-body-child"><i class="fas fa-calendar-alt"></i><span>${moment(task.task_due_date).format("DD [de] MMM YYYY")}</span></div>` : ``}

                        ${task.subtasks_count != 0 && task.subtasks_count != undefined ? `<div class="todo-subtask todo-body-child"><p>${task.subtasks_count}</p><span>Subtasks</span></div>` : ``}

                        ${task.list != null ? `<div class="todo-list todo-body-child"><div class="todo-list-color" style="background-color:${task.list.list_color};"></div><span>${task.list.list_name}</span></div>` : ``}
                    </div>
                </div>
            </div>
    `
    return render
}
function openTaskView(task_id){
    $('.todo-view').css('display', 'flex');
    $('.todo-view').css('bottom', '');
    $('.search-section').css('display', 'none');
    $('#cansel-delete-task').click()
    viewTaskInfo(task_id);
}

function viewTaskInfo(task_id){

}

function renderSubtasks(subtask){
    var render = `
        <div class="subtask">
            <input type="checkbox" aria-label="check subtask" name="subtask[]" data-id="${subtask.id}" class="subtask-check" ${subtask.subtask_status == 1 ? `checked` : ``}>
            <span ${subtask.subtask_status == 1 ? `style="text-decoration: line-through;"` : ``}>${subtask.subtask_name}</span>
        </div>
    `
    return render
}

/**STORE TASK */

$('#create_task').keypress(function(event) {
    if (event.which == 13) {//Enter
        event.preventDefault();
        if($(this).val() != ''){
            storeTask($(this).val(),$(this).attr('data-list'))
        }else{
            event.preventDefault();
        }
    }
});

function storeTask(task, list = null){

}

/**ADD SUBTASK */
$('#task_subtask').keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        if($(this).val() != ''){

            const task_id = $('#task_id').val()
            storeSubTask($(this).val(), task_id)
            //alert(task_id)
        }else{
            event.preventDefault();
        }
    }
});

function storeSubTask(subTask, task_id){

}

/**ADD SUBTASK END*/
$('#closeTask').click(function (e) { 
    e.preventDefault();
    $('.todo-view').css('display', 'none');
});

/**CHANGE TASK STATUS */
$(document).on("change", "input[name='task[]']", function (e) {

    e.preventDefault()

    const taskId = $(this).attr('data-id')

    if(this.checked) {

        $(this).prop( "checked", true );
        $(this).next().css("text-decoration", "line-through");
        $(this).next().css("opacity", "0.50");
        changeTaskStatus(taskId, 1)
        $("#task-form :input,textarea").prop("disabled", true);
        $("#update-task").prop("disabled", true)

        Toast.show('Task concluída')
        
    }else{

        $(this).prop( "checked", false );
        $(this).next().css("text-decoration", "none");
        $(this).next().css("opacity", "");
        changeTaskStatus(taskId, 0)
        $("#task-form :input,textarea").prop("disabled", false);
        $("#update-task").prop("disabled", false)

        Toast.show('Task por concluir')
    }    

});

function changeTaskStatus(taskId, newValue){

}

/** CHANGE SUBTASK STATUS */
$(document).on("change", "input[name='subtask[]']", function () {

    const subTaskId = $(this).attr('data-id')

    if(this.checked) {

        $(this).prop( "checked", true );
        $(this).next().css("text-decoration", "line-through");
        changeSubtaskStatus(subTaskId, 1)

        Toast.show('Subtask concluída')
        
    }else{

        $(this).prop( "checked", false );
        $(this).next().css("text-decoration", "none");
        changeSubtaskStatus(subTaskId, 0)

        Toast.show('Subtask por concluir')
    }    

});

function changeSubtaskStatus(subTaskId, newValue){

}

/** DELETE TASK */
$('#delete-checked').click(function (e) { 
    e.preventDefault();
    $('.btn-delete-confirm-hidden').css('transform', 'translateY(-47px)');
    $('#delete-checked').css('transform', 'translateY(-47px)');
});

$('#cansel-delete-task').click(function (e) { 
    e.preventDefault();
    $('.btn-delete-confirm-hidden').css('transform', '');
    $('#delete-checked').css('transform', '');
});

$('#delete-task').click(function (e) { 
    e.preventDefault();

});

/** UPDATE TASK */
$('#update-task').click(function (e) { 
    e.preventDefault();
    
});

var asideStatus = 0

$('#open-aside').click(function (e) { 
    e.preventDefault();
    
    if(asideStatus == 0){
        $(this).html('<i class="fas fa-times"></i>')
        $('.aside-menu').css('left', '0');
        $('.section-todo').css('transform', 'translateX(320px)');
        $('.section-todo-body').css('pointer-events', 'none');
        return asideStatus = 1
    }else{
        $(this).html('<i class="fas fa-bars"></i>')
        $('.aside-menu').css('left', '');
        $('.section-todo').css('transform', 'translateX(0)');
        $('.section-todo-body').css('pointer-events', 'all');
        return asideStatus = 0
    }
});

/** STICK WALL RETIRAR E CHAMAR SOMENTE NA VIEW STICK*/
$('.sticky-card input').keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        
        if($(this).val() != ''){
            $(this).next().focus();
        }
    }
});

$('.sticky-card textarea').keyup(function(e) {

    if(e.keyCode === 8) {
        if($(this).val() == ''){
            $(this).prev().focus();
        }
    }
});

$('.sticky-card textarea').focus(function (e) { 
    e.preventDefault();
    
    if($(this).prev().val() == ''){
        $(this).prev().focus();
    }
});

$.each($('.sticky-card'), function (indexInArray, valueOfElement) {

    const characters = ['#fdf2b3', '#d1eaed', '#ffdada', '#ffd4a9', '#ebebeb']
    const [item] = characters.sort(() => 0.5 - Math.random())

     $(valueOfElement).css('background-color', [item])
});

//SEARCH
let timeout = null;

$('#search_task').on("keyup input", function () {
    $('.search-section').css("display", "block");
    $('.search-section').html("<div class='search-loader'>Searching...</div>");


    clearTimeout(timeout);
    const query = $(this).val();

    if ($(this).val() !== '') {
        timeout = setTimeout(function () {
            $.ajax({
                type: "GET",
                url: "/search/" + query,
                dataType: 'json',
                success: function (result) {
                    $('.search-section .search-loader').remove();
                    $('.search-section .todo').remove();
                    if (result.task != 'error') {
                        $.each(result.task, function (indexInArray, valueOfElement) { 
                            $('.search-section').append(renderSearchResult(valueOfElement)); 
                        });
                            
                    } else {
                        $('.search-section').html('Error...');
                    }
                    $('.loading').remove();
                }
            });
        }, 1000);
    }

    if ($(this).val() == '') {
        $('.search-section').css("display", "none");
    }
});

document.addEventListener("click", function (event) {
    if (event.target.closest(".search-section")) return;

    $('.search-section').css("display", "none");

    if (event.target.closest("#search_task")) {
        if ($('#search_task').val() != '') {
            $('.search-section').css("display", "block");
        }
    }
});

$('#search_task').focus(function () {
    if ($(this).val() != '') {
        $('.search-section').css('display', 'block')
    }
})

function renderSearchResult(task) {
    var renderedCard =  `<div class="todo" data-task-id="1">
    <div class="todo-clickable" data-task-id="1" onclick="openTaskView(${task.id})">
        <div class="todo-header">
            <span class="todo-header-taskname">${task.task_name}</span>
        </div>
        <div class="todo-body">
        ${task.task_due_date != null ? `<div class="todo-due-date todo-body-child"><i class="fas fa-calendar-alt"></i><span>${moment(task.task_due_date).format("DD [de] MMM YYYY")}</span></div>` : ``}

        ${task.list != null ? `<div class="todo-list todo-body-child"><div class="todo-list-color" style="background-color:${task.list.list_color};"></div><span>${task.list.list_name}</span></div>` : ``}
        </div>
    </div>
</div>
`
    return renderedCard;
}