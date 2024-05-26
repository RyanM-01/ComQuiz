<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{('build/admindash.css') }}" rel="stylesheet" />
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

        <div class="search-box">
          <i class="uil uil-search"></i>
          <input type="text" placeholder="Cari matkul..." />
        </div>
        <!-- ini profile picture user okengg -->
        @if($user->photo)
        <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Picture" />
        @else
        <!-- Tampilkan gambar default jika user tidak memiliki foto profil -->
        <img src="{{ asset('images/image1.jpeg') }}" alt="Default Profile Picture" />
        @endif
      </div>

      <div class="dash-content">
        <div class="overview">
          <div class="kostumisasi">
            <a href="/matkul/create">
              <div class="atas">
                <i class="uil uil-plus-circle"></i>
                <span class="text">Create</span>
              </div>
            </a>
          </div>

          <div class="title">
            <i class="uil uil-paperclip"></i>
            <span class="text">Matkul overview</span>
          </div>

          <div id="filter" class="filter">
            <button class="btn" onclick="filterObject('all')">Show All</button>
            <button class="btn" onclick="filterObject('S3')">Semester 3</button>
            <button class="btn" onclick="filterObject('S4')">Semester 4</button>
            <button class="btn" onclick="filterObject('S5')">Semester 5</button>
          </div>

          <div class="matkulcontainer">
    @foreach($matkuls as $matkul)
    <div class="matkul {{ $matkul->semester }}">
      <a href="{{ route('bab.index', $matkul->code) }}" class="matkul-link">
            <div class="matkulpic">
              <!-- Display Matkul photo if available, otherwise show default image -->
              @if($matkul->photo)
              <img src="{{ asset('storage/photos/' . $matkul->photo) }}" alt="{{ $matkul->name }}" />
              @else
              <img src="{{ asset('images/image1.jpeg')}}" alt="Default Matkul Image" />
              @endif
          </div>
          <div class="textcontainer">
              <span class="matkulcode">{{ $matkul->code }} |</span>
              <span class="matkulname">{{ $matkul->name }}</span>
          </div>
          <div class="buttons">
          <a href="{{ route('matkul.edit', $matkul->id) }}"><button class="btn">EDIT</button></a>
              <form action="{{ route('matkul.destroy', $matkul->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this Matkul?')">DELETE</button>
              </form>
          </div>
          <div class="matkul-overlay"></div>
      </a>
    </div>
    @endforeach
</div>


    </section>

    <script src="{{('js/filter.js') }}"></script>
    <script src="{{('js/script.js') }}"></script>  
  </body>
</html>
