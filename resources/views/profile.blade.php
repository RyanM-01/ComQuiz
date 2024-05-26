<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{('build/profile.css') }}" />
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
    @if($user->photo)
      <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Picture" />
    @else
      <!-- Tampilkan gambar default jika user tidak memiliki foto profil -->
      <img src="{{ asset('images/image1.jpeg') }}" alt="Default Profile Picture" />
    @endif
  </div>

  <div class="dash-content">
    <div class="overview">
      <div class="container">
        <div class="Statistic">
          <div class="title">
            <i class="uil uil-paperclip"></i>
            <span class="text">Statistic</span>
          </div>

          <div class="boxes">
            <div class="box box1">
              <i class="uil uil-fire"></i>
              <span class="text">Day streak</span>
              <span class="number">{{$user->dailystrike}}</span>
            </div>
            <div class="box box2">
              <i class="uil uil-bolt"></i>
              <span class="text">Balance</span>
              <span class="number">{{$user->balance}}</span>
            </div>
          </div>
        </div>
        <div class="profileContainer">
          <div class="title">
            <i class="uil uil-paperclip"></i>
            <span class="text">Profile</span>
          </div>

          <form style="padding: 10px 90px 60px 40px" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- include CSRF token -->
            @method('PUT') <!-- method spoofing to use PUT -->

            <p>
              <label for="url_foto" class="text">Profile Picture </label><br />
              <input class="form-control" type="file" name="url_foto" id="url_foto" autocomplete="off" />
            </p>
            <p>
              <label for="fullname" class="text">Nama </label><br />
              <input class="form-control" type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" required autocomplete="off" />
            </p>
            <p>
              <label for="username" class="text">Username </label><br />
              <input class="form-control" type="text" name="username" id="username" value="{{ $user->username }}" required autocomplete="off" />
            </p>
            <p>
              <label for="email" class="text">Email </label><br />
              <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" required autocomplete="off" />
            </p>
            <p>
              <label for="gender" class="text">Jenis Kelamin </label><br />
              <label><input type="radio" name="gender" value="L" {{ $user->gender == 'L' ? 'checked' : '' }} required />Laki-laki</label>
              <label><input type="radio" name="gender" value="P" {{ $user->gender == 'P' ? 'checked' : '' }} required />Perempuan</label>
            </p>
            <p>
              <label for="password" class="text">Password </label><br />
              <input class="form-control" type="password" name="password" id="password" /><br />
            </p>

            <p>
              <div class="button-container">
                <button class="button1" type="submit" name="update">Update</button>
              </div>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

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