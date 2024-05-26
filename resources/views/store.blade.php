<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{('build/toko.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

    <title>Document</title>
  </head>

  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
        <img src="{{('images/logo.jpeg') }}" alt="" />
        </div>

        <span class="logo_name">ComQuiz</span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="/dashboard">
              <i class="uil uil-home"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/scoreboard">
              <i class="uil uil-star"></i>
              <span class="link-name">Leaderboards</span>
            </a>
          </li>
          <li>
            <a href="/store">
              <i class="uil uil-shop"></i>
              <span class="link-name">Shop</span>
            </a>
          </li>
          <li>
            <a href="/customize">
              <i class="uil uil-brush-alt"></i>
              <span class="link-name">Costumize</span>
            </a>
          </li>
          <li>
            <a href="/profile">
              <i class="uil uil-user-circle"></i>
              <span class="link-name">Profile</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mode">
            <li>
                <!-- Tautan yang memicu pengiriman form logout -->
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="uil uil-sign-out-alt"></i>
                    <span class="link-name">Logout</span>
                </a>
                
                <!-- Formulir logout  -->
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
            <span class="text">Toko</span>
          </div>

          <div class="container">
            <div class="circlebox">
              <div class="circleroastedpeach"></div>
              <span class="circlename">Roasted Peach</span>
              <span class="circleprice">$40</span>
              <button class="takequiz-btn">BELI</button>
              <!-- hiraukan knp ini takequiz gua pake js yg popup di bab pas diganti ga berfungsi T_T -->
            </div>
            <div class="circlebox">
              <div class="circleswimmingpool"></div>
              <span class="circlename">Swimming Pool</span>
              <span class="circleprice">$40</span>
              <button class="takequiz-btn">BELI</button>
            </div>
            <div class="circlebox">
              <div class="circlecottoncandy"></div>
              <span class="circlename">Cotton Candy</span>
              <span class="circleprice">$40</span>
              <button class="takequiz-btn">BELI</button>
            </div>
          </div>
        </div>
        <div class="popup-info">
          <h2>Are you sure you want to buy this theme</h2>
          <span class="info"> Click 'NO' to cancel, 'YES' to buy</span>

          <div class="btn-group">
            <button class="info-btn exit-btn">NO</button>
            <a href="toko.html" class="info-btn continue-btn">YES</a>
          </div>
        </div>
      </div>
    </section>
    <script src="{{('js/toko.js') }}"></script>
    <script src="{{('js/script.js') }}"></script>
    <script>
      // Memeriksa tema yang dipilih dari localStorage
      function getTheme() {
        return localStorage.getItem("theme");
      }

      // Menerapkan tema yang dipilih
      document.addEventListener("DOMContentLoaded", () => {
        const savedTheme = getTheme();
        if (savedTheme) {
          document.body.classList.add(savedTheme);
        }
      });
    </script>
  </body>
</html>