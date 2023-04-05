<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('backend/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.categories') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.categories.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Category</strong>
                    </a>
                </li>
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.subcategories') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.subcategories.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Subcategory</strong>
                    </a>
                </li>
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.products') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.products.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Product</strong>
                    </a>
                </li>

                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.posts') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.posts.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Post</strong>
                    </a>
                </li>

                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.users') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>User</strong>
                    </a>
                </li>

                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.admins') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.admins.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Admin</strong>
                    </a>
                </li>

                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.roles') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.roles.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Role</strong>
                    </a>
                </li>
                <li class="
                    @if(strpos(Request::route()->getName(), 'admin.permissions') === 0)
                        active
                    @endif
                    ">
                    <a href="{{route('admin.permissions.index')}}">
                        <i class="fas fa-chart-bar"></i>
                        <strong>Permission</strong>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
