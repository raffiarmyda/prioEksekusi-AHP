<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem AHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{($title === "Home") ? 'active' : ''}}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($title === "Menu") ? 'active' : ''}}" href="/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($title === "Contact Us") ? 'active' : ''}}" href="/contact_us">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($title === "Logout") ? 'active' : ''}}" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
