@php
    $appHeaderAttr = !empty($appHeaderInverse) ? ' data-bs-theme=dark' : '';
    $appHeaderMenu = !empty($appHeaderMenu) ? $appHeaderMenu : '';
    $appHeaderMegaMenu = !empty($appHeaderMegaMenu) ? $appHeaderMegaMenu : '';
    $appHeaderTopMenu = !empty($appHeaderTopMenu) ? $appHeaderTopMenu : '';
@endphp

<!-- BEGIN #header -->
<div id="header" class="app-header" {{ $appHeaderAttr }}>
    <!-- BEGIN navbar-header -->
    <div class="navbar-header">
        @if ($appSidebarTwo)
            <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-end-mobile">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        @endif
        <a href="/" class="navbar-brand"><span class="navbar-logo"></span> <b>gridbox</b>App</a>
        @if ($appHeaderMegaMenu && !$appSidebarTwo)
            <button type="button" class="navbar-mobile-toggler" data-bs-toggle="collapse" data-bs-target="#top-navbar">
                <span class="fa-stack fa-lg">
                    <i class="far fa-square fa-stack-2x"></i>
                    <i class="fa fa-cog fa-stack-1x mt-1px"></i>
                </span>
            </button>
        @endif
        @if ($appTopMenu && !$appSidebarHide && !$appSidebarTwo)
            <button type="button" class="navbar-mobile-toggler" data-toggle="app-top-menu-mobile">
                <span class="fa-stack fa-lg">
                    <i class="far fa-square fa-stack-2x"></i>
                    <i class="fa fa-cog fa-stack-1x mt-1px"></i>
                </span>
            </button>
        @endif
        @if ($appTopMenu && $appSidebarHide && !$appSidebarTwo)
            <button type="button" class="navbar-mobile-toggler" data-toggle="app-top-menu-mobile">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        @endif
        @if (!$appSidebarHide)
            <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        @endif
    </div>

    @includeWhen($appHeaderMegaMenu, 'includes.component.header-mega-menu')

    <!-- BEGIN header-nav -->
    <div class="navbar-nav">
        <div class="navbar-item navbar-form">
            <form action="" method="POST" name="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter keyword" />
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="navbar-item dropdown">
            <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                <i class="fa fa-bell"></i>
                <span class="badge">5</span>
            </a>
            @include('includes.component.header-dropdown-notification')
        </div>

        @isset($appHeaderLanguageBar)
            @include('includes.component.header-language-bar')
        @endisset

        <div class="navbar-item navbar-user dropdown">
            <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('/assets/img/user/' . $userLogin->avatar) }}" alt="" />
                <span class="mx-3">
                    <span class="d-none d-md-inline">{{ $userLogin->name }}</span>
                    <b class="caret"></b>
                </span>
            </a>
            {{-- @include('includes.component.header-dropdown-profile') --}}
            <div class="dropdown-menu dropdown-menu-end me-1">

                <a href="{{ route('profile.edit', ['id' => $userLogin->id]) }}" class="dropdown-item">Edit Profile</a>
                <a href="javascript:;" class="dropdown-item d-flex align-items-center">
                    Inbox
                    <span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>
                </a>
                <a href="javascript:;" class="dropdown-item">Calendar</a>
                <a href="javascript:;" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>

        @if ($appSidebarTwo)
            <div class="navbar-divider d-none d-md-block"></div>
            <div class="navbar-item d-none d-md-block">
                <a href="javascript:;" data-toggle="app-sidebar-end" class="navbar-link icon">
                    <i class="fa fa-th"></i>
                </a>
            </div>
        @endif
    </div>
    <!-- END header-nav -->
</div>
<!-- END #header -->
