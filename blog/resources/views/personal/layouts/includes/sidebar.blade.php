<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Панель управления</li>
                <li class="nav-item">
                    <a href="{{ route('personal.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Главная страница
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.liked-posts.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-heart"></i>
                        <p>
                            Понравившиеся посты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comments.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-comment"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>
