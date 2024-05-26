<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="{{ asset('build/papanskor.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo">
            </div>
            <span class="logo_name">ComQuiz</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="/dashboard"><i class="uil uil-home"></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="/scoreboard"><i class="uil uil-star"></i><span class="link-name">Leaderboards</span></a></li>
                <li><a href="/store"><i class="uil uil-shop"></i><span class="link-name">Shop</span></a></li>
                <li><a href="/customize"><i class="uil uil-brush-alt"></i><span class="link-name">Customize</span></a></li>
                <li><a href="/profile"><i class="uil uil-user-circle"></i><span class="link-name">Profile</span></a></li>
            </ul>
            <ul class="logout-mode">
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="uil uil-sign-out-alt"></i><span class="link-name">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('images/image1.jpeg')}}" alt="Default Profile Picture">
            @endif
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-paperclip"></i>
                    <span class="text">Leaderboard</span>
                </div>

                <div class="container">
                    <!-- USERS CONTAINER -->
                    @foreach ($users as $index => $user)
                        <div class="rankbox">
                            <div class="rankprofile">
                                <div class="nomorurut">{{ $index + 1 }}.</div>
                                <div class="logo-image">
                                    @if($user->photo)
                                        <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="{{ $user->username }}">
                                    @else
                                        <img src="{{asset('images/image1.jpeg') }}" alt="Default Profile Picture">
                                    @endif
                                </div>
                                <div class="playername">{{ $user->username }}</div>
                            </div>
                            <div class="rankscore">
                                <div class="score">{{ $user->score }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme) {
                document.body.classList.add(savedTheme);
            }

            const sidebarToggle = document.querySelector(".sidebar-toggle");
            const body = document.querySelector("body");

            if (sidebarToggle) {
                sidebarToggle.addEventListener("click", function() {
                    body.classList.toggle("sidebar-closed");
                });
            }
        });
    </script>
</body>
</html>
