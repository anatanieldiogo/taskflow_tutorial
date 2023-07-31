<aside class="aside-menu">
    <div class="aside-menu-separate">
        <div class="aside-menu-header">
            <div class="aside-menu-header-label">
                <img src="{{ asset('img/taskflow.svg') }}" alt="">
            </div>
            <div class="aside-menu-header-form">
                <form action="">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search task" id="search_task">
                    <div class="search-section">
                        
                    </div>
                </form>
            </div>
        </div>
        <div class="aside-menu-title">
            <span>Tasks</span>
        </div>
        <nav class="aside-menu-menu">
            <ul>
                <li><a href="{{ route('today') }}" class="{{ $active == 'today' ? 'aside-menu-acive' : '' }} click"><i
                            class="fas fa-calendar-day"></i> Today
                        <span>{{ $total_task_today }}</span></a>
                </li>
                <li><a href="{{ route('all-tasks') }}" class="{{ $active == 'all' ? 'aside-menu-acive' : '' }} click"><i
                            class="fas fa-tasks"></i> All
                        <span id="all-task"></span></a></li>
                <li><a href="{{ route('calendar') }}"
                        class="{{ $active == 'calendar' ? 'aside-menu-acive' : '' }} click"><i
                            class="fas fa-calendar-alt"></i> Calendar</a>
                </li>
                <li><a href="{{-- route('sticky') --}}" class="{{ $active == 'sticky' ? 'aside-menu-acive' : '' }} click"><i
                            class="fas fa-sticky-note"></i> Sticky wall</a>
                </li>
            </ul>
        </nav>
        <div class="aside-menu-title">
            <span>Lists</span>
        </div>
        <nav class="aside-menu-menu">
            <ul class="aside-menu-menu-lists">
                {{-- SHOW LIST FROM JS --}}

                <div class="empty empty-list">
                    <i class="fas fa-eye-slash"></i>
                    <h2>No list, create one👇🏽</h2>
                </div>
            </ul>
            <button aria-label="Add list" class="click" id="showe-list-form"><i class="fas fa-plus"></i> Add new
                list</button>
        </nav>
        <div class="list-form">
            <form action="" id="store_list_form">
                <div class="list-form-list-color">
                    <label for="color-0" class="click" data-color="#ff453b"></label>
                    <input type="radio" name="list_color" value="#ff453b" id="color-0" checked>
                    <label for="color-1" class="click" data-color="#fea00a"></label>
                    <input type="radio" name="list_color" value="#fea00a" id="color-1">
                    <label for="color-2" class="click" data-color="#ffd50b"></label>
                    <input type="radio" name="list_color" value="#ffd50b" id="color-2">
                    <label for="color-3" class="click" data-color="#31d15c"></label>
                    <input type="radio" name="list_color" value="#31d15c" id="color-3">
                    <label for="color-4" class="click" data-color="#0b84fe"></label>
                    <input type="radio" name="list_color" value="#0b84fe" id="color-4">
                    <label for="color-5" class="click" data-color="#d47ff5"></label>
                    <input type="radio" name="list_color" value="#d47ff5" id="color-5">
                    <label for="color-6" class="click" data-color="#c9a573"></label>
                    <input type="radio" name="list_color" value="#c9a573" id="color-6">
                    <label for="color-7" class="click" data-color="#66d9e8"></label>
                    <input type="radio" name="list_color" value="#66d9e8" id="color-7">
                    <label for="color-8" class="click" data-color="#cdce42"></label>
                    <input type="radio" name="list_color" value="#cdce42" id="color-8">
                </div>
                <div class="list-forminput-control">
                    <input type="text" name="list_name" id="list_name" placeholder="List name">
                </div>
            </form>
        </div>
    </div>
    <nav class="aside-menu-menu">
        <ul>
            <li><a href="{{ route('settings') }}" class="click"><i class="fas fa-sliders-h"></i> Settings</a></li>
            <li><a href="{{ route('logout') }}" class="click"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
        </ul>
    </nav>
</aside>
