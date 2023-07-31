@extends('layouts.main')

@section('title', 'Taskflow - Sticky wall')
@section('content')
    @include('layouts.aside_menu', [
        'active' => 'sticky',
        'total_task_today' => '',
    ])
    <main class="main-container">
        <section class="section-todo">
            <div class="section-todo-header">
                <div class="section-todo-header-left">
                    <button aria-label="Open menu" class="click center" id="open-aside"><i class="fas fa-bars"></i></button>
                    <h1>Sticky wall</h1>
                </div>
                <div class="aside-menu-header-form">
                    <form action="">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search_sticky" id="search-sticky" placeholder="Search sticky">
                    </form>
                </div>
            </div>
            <div class="section-todo-body">
                <div class="sticky-container">
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="sticky-card" draggable="true">
                        <input type="text">
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
