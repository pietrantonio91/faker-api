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
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="UAWNTS5F6W5TQ" />
                <button class="btn btn-gradient" type="submit" name="submit" title="PayPal - The safer, easier way to pay online!"
                alt="Donate with PayPal button">☕ Offrimi un caffè!</button>
            </form>
        </div>
    </div>
</nav>
