@extends('layouts.main')

@section('title', 'Taskflow')
@section('content')
    @include('layouts.aside_menu', [
        'active' => 'all',
        'total_task_today' => '',
    ])
    <main class="main-container">
        <section class="section-todo">
            <div class="section-todo-header">
                <div class="section-todo-header-left">
                    <button aria-label="Open menu" class="click center" id="open-aside"><i class="fas fa-bars"></i></button>
                    <h1>All</h1>
                </div>
                <div class="aside-menu-header-form">
                    <form action="">
                        <i class="fas fa-plus"></i>
                        <input type="text" name="new_task" id="create_task" placeholder="Add New Task">
                    </form>
                </div>
            </div>
            <div class="section-todo-body">

                <div class="section-todo-content">
                    {{-- TASKS --}}
                </div>
            </div>
        </section>
        <aside class="todo-view">
            <div>
                <div class="aside-menu-header">
                    <div class="aside-menu-header-label">
                        <h2>Task</h2>
                        <button aria-label="Close task" type="button" class="click" id="closeTask"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <form action="#" id="task-form">
                    @csrf
                    <input type="hidden" name="task_id" id="task_id">


                    <div class="todo-view-body">

                        <div class="input-control">
                            <input type="text" name="task_name" id="task_name" placeholder="Task">
                        </div>
                        <div class="input-control">
                            <textarea name="task_description" id="task_description" cols="30" rows="6" placeholder="Description"></textarea>
                        </div>
                        <div class="input-control input-control-columns">
                            <label for="">List</label>
                            <select name="task_list" id="task_list">
                                {{-- Render list from js --}}
                            </select>
                        </div>
                        <div class="input-control input-control-columns">
                            <label for="" id="task_due_date_lbl">Due date</label>
                            <input type="date" name="task_due_date" id="task_due_date">
                        </div>

                        <div class="input-control input-control-columns">
                            <label for="">Subtasks:</label>
                            <div class="input-control-icon">
                                <i class="fas fa-plus"></i>
                                <input type="text" name="task_subtask" id="task_subtask" placeholder="Add New Subtask">
                            </div>
                        </div>

                        <div class="todo-view-body-subtasks-content">
                            {{-- SUBTASK HERE FROM JS --}}
                        </div>
                    </div>
                </form>
            </div>

            <div class="task-form-option">
                <div class="btn-delete-confirm">
                    <button aria-label="Delete task" class="click" id="delete-checked">Delete task</button>
                    <div class="btn-delete-confirm-hidden">
                        <button aria-label="Cancel delete task" class="click" id="cansel-delete-task"><i
                                class="fas fa-times"></i></button>
                        <button aria-label="Delete task" class="click" id="delete-task"><i
                                class="fas fa-check"></i></button>
                    </div>
                </div>
                <button aria-label="Save changes" class="click" id="update-task">Save changes</button>
            </div>
        </aside>
    </main>
@endsection

@push('scripts')
    
@endpush
