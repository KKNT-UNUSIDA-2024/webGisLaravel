<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize d-inline">
                <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip"
                    data-original-title="Sidebar toggle" data-placement="right">
                    <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
                    <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
                </button>
            </div>
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">{{ Auth::user()->name }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-primary">
                        <i class="tim-icons icon-minimal-left"></i> Back to Dashboard
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="tim-icons icon-lock-circle"></i> logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
