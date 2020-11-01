<div class="container">
    <nav class="navbar d-flex justify-content-center">
        <ul class="navbar-nav text-uppercase flex-row align-items-center">
            @if( Request::path() != '/')
            <li class="nav-item">
                <a href="javascript:history.back()" class="chevron">
                    <span class="iconify text-white" data-inline="false" data-icon="fa-solid:angle-left"></span>
                </a>
            </li>
            @endif
            <li class="nav-item active">
                <a href="" class="nav-link">Sale</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Apparel⏷</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Accessories⏷</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Collections⏷</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Gear</a>
            </li>
            <li class="nav-item active">
                <a href="" class="nav-link">Delivery</a>
            </li>
        </ul>
    </nav>
</div>
