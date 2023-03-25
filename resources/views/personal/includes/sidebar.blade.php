<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('main.index') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Главная
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('liked.index') }}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Ваши лайки
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('comment.index') }}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Ваши комментарии
              </p>
            </a>
          </li>
          
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>