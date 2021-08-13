</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="logo"><a href="/home"> <img src="{{asset('telkom.png')}}" style="width: 90px;height: 60px"></a> </div>
        <a class="navbar-brand" href="/home">SISTEM INFORMASI UNTUK MENENTUKAN PRIORITAS EKSEKUSI UPGRADE BANDWIDTH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{($title === "Home") ? 'active' : ''}}" href="/home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(auth()->user()->role == 'Paket Admin Support IT & Service')
                        <li><a class="dropdown-item" href="/user">User</a></li>
                        <li><a class="dropdown-item" href="/order">Order</a></li>
                        @endif
                        @if(auth()->user()->role == 'Paket Staff Support IT & Service')
                        <li><a class="dropdown-item" href="/datek">Datek</a></li>
                        <li><a class="dropdown-item" href="/eksekusi">Eksekusi</a></li>
                        @endif
                        @if(auth()->user()->role == 'Paket Manager')
                        <li><a class="dropdown-item" href="/eksekusi">Eksekusi</a></li>
                        <li><a class="dropdown-item" href="/laporan">Laporan</a></li>
                        @endif
                        @if(auth()->user()->role == 'Expertise')
                        <li><a class="dropdown-item" href="/respondence">Respondence</a></li>
                        @endif
                        @if(auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="/user">User</a></li>
                            <li><a class="dropdown-item" href="/order">Order</a></li>
                            <li><a class="dropdown-item" href="/datek">Datek</a></li>
                            <li><a class="dropdown-item" href="/eksekusi">Eksekusi</a></li>
                            <li><a class="dropdown-item" href="/respondence">Respondence</a></li>
                            <li><a class="dropdown-item" href="/laporan">Laporan</a></li>
                        @endif
                    </ul>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($title === "Contact Us") ? 'active' : ''}}" href="/contact_us">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($title === "Login") ? 'active' : ''}}" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
