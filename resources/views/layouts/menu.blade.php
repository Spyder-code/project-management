<li class="side-menus {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

@if (Auth::user()->role=='admin'||Auth::user()->role=='ceo')
    <li class="side-menus {{ Request::is('projects*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-building"></i><span>Projects</span></a>
    </li>

    <li class="side-menus {{ Request::is('presence*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('presence.index') }}"><i class="fas fa-building"></i><span>Presence</span></a>
    </li>

    <li class="side-menus {{ Request::is('tasks*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-building"></i><span>Tasks</span></a>
    </li>

    <li class="side-menus {{ Request::is('userProjects*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('userProjects.index') }}"><i class="fas fa-building"></i><span>User Projects</span></a>
    </li>

    <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i><span>User</span></a>
    </li>
@elseif(Auth::user()->role=='karyawan')
    {{-- <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('#') }}"><i class="fas fa-calendar-o"></i><span>My Presence</span></a>
    </li> --}}
    <li class="side-menus {{ Request::is('project*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('karyawan.project') }}"><i class="fas fa-building"></i><span>My Projects</span></a>
    </li>
    <li class="side-menus {{ Request::is('task-project') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('karyawan.projectTask') }}"><i class="fas fa-building"></i><span>Projects and Tasks</span></a>
    </li>
@elseif(Auth::user()->role=='hrd')
    <li class="side-menus {{ Request::is('presence*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('presence.index') }}"><i class="fas fa-building"></i><span>Presence</span></a>
    </li>
    <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i><span>User</span></a>
    </li>

@elseif(Auth::user()->role=='project manager')
    <li class="side-menus {{ Request::is('projects*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-building"></i><span>Projects</span></a>
    </li>
    <li class="side-menus {{ Request::is('tasks*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-building"></i><span>Tasks</span></a>
    </li>
    <li class="side-menus {{ Request::is('userProjects*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('userProjects.index') }}"><i class="fas fa-building"></i><span>User Projects</span></a>
    </li>
@endif


