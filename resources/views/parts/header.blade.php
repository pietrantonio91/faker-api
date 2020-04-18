<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand" href="/">
        @include('parts.logo')
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse justify-content-between navbar-collapse show" id="navbarNav">
        @yield('navbar-nav')
        <div>
            <ul class="navbar-nav">
                <li class="nav-item mr-3">
                    @if(app()->getLocale() == 'it')
                        <a class="nav-link" href="{{str_replace('it', 'en', \URL::full())}}">
                            EN
                        </a>
                    @else
                        <a class="nav-link" href="{{str_replace('en', 'it', \URL::full())}}">
                            IT
                        </a>
                    @endif
                </li>
                <a href="https://paypal.me/pietrajr" target="_blank" class="btn btn-gradient" type="submit" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button">☕ Buy me a coffee!</a>
            </ul>
        </div>
    </div>
</nav>
