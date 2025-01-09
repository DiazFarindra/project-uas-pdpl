<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.items.index') }}">Admin V-Payment</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ route('admin.items.index') === url()->current() ? 'active' : '' }}" href="{{ route('admin.items.index') }}">
                        items
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
