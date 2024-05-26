<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{('build/admintoko.css') }}" rel="stylesheet" />
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
            <a href="/admin">
              <i class="uil uil-home"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/adminscoreboard">
              <i class="uil uil-star"></i>
              <span class="link-name">Leaderboards</span>
            </a>
          </li>
          <li>
            <a href="/shop">
              <i class="uil uil-shop"></i>
              <span class="link-name">Shop</span>
            </a>
          </li>
          <li>
            <a href="/adminprofile">
              <i class="uil uil-user-circle"></i>
              <span class="link-name">Profile</span>
            </a>
          </li>
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

        @if($user->photo)
        <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Picture" />
        @else
        <!-- Tampilkan gambar default jika user tidak memiliki foto profil -->
        <img src="{{ asset('images/image1.jpeg') }}" alt="Default Profile Picture" />
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
              <input class="circlename" type="text" name="nama" id="nama" required autocomplete="off" />
              <input class="circleprice" type="text" name="nama" id="nama" required autocomplete="off" />
              <button class="takequiz-btn">EDIT</button>
              <!-- hiraukan knp ini takequiz gua pake js yg popup di bab pas diganti ga berfungsi T_T -->
            </div>
            <div class="circlebox">
              <div class="circleswimmingpool"></div>
              <input class="circlename" type="text" name="nama" id="nama" required autocomplete="off" />
              <input class="circleprice" type="text" name="nama" id="nama" required autocomplete="off" />
              <button class="takequiz-btn">EDIT</button>
            </div>
            <div class="circlebox">
              <div class="circlecottoncandy"></div>
              <input class="circlename" type="text" name="nama" id="nama" required autocomplete="off" />
              <input class="circleprice" type="text" name="nama" id="nama" required autocomplete="off" />
              <button class="takequiz-btn">EDIT</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{('js/toko.js') }}"></script>
    <script src="{{('js/script.js') }}"></script>
  </body>
</html>
