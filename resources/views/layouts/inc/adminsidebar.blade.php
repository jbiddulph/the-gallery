<div id="sidebar">
    <h3>Admin Menu</h3>
    <div class="side-container">
        <ul id="sidebar-nav">
            <li><a href="/">Dashboard</a></li>
            <li><a href="{{route('artwork.index')}}">Artwork</a></li>
            <li><a href="{{route('category.index')}}">Categories</a></li>
            <li><a href="#">Admin</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>
