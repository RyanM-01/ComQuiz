<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{('build/dashboard.css') }}" rel="stylesheet" />
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
            <div class="atas">
            <span class="namauser">Hallo {{ $user->username }}!</span>
              <a href="/customize"><i class="uil uil-pen"></i></a>
            </div>

            <div class="poin">
              <a href="/store" class="poinframe">
                <i class="uil uil-usd-circle"></i>
                <span class="userpoin">{{$user->balance}}</span>
              </a>
            </div>
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
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image2.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120A |</span>
                <span class="matkulname">Aljabar Linear untuk Komputasi</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image3.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120B |</span>
                <span class="matkulname">Algoritme dan Dasar Pemrograman</span>
              </div>
            </a>
            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image4.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120C |</span>
                <span class="matkulname">Pemrograman</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image5.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120D |</span>
                <span class="matkulname">Pengantar Matematika Komputasi</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image6.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120E |</span>
                <span class="matkulname">Rangkaian Digital</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image7.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120F |</span>
                <span class="matkulname">Basis Data</span>
              </div>
            </a>
            <a href="subject" class="matkul S4">
              <div class="matkulpic"><img src="image8.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120G |</span>
                <span class="matkulname">Organisasi dan Arsitektur Komputer</span>
              </div>
            </a>
            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image9.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120H |</span>
                <span class="matkulname">Struktur Data</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image10.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM120I |</span>
                <span class="matkulname">Struktur Diskret</span>
              </div>
            </a>
            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image11.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM1221 |</span>
                <span class="matkulname">Metode Kuantitatif</span>
              </div>
            </a>
            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image12.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM1231 |</span>
                <span class="matkulname">Rekayasa Perangkat Lunak</span>
              </div>
            </a>

            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image13.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM1232 |</span>
                <span class="matkulname">Desain Pengalaman Pengguna</span>
              </div>
            </a>
            <a href="/subject" class="matkul S4">
              <div class="matkulpic"><img src="image14.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">KOM1304 |</span>
                <span class="matkulname">Grafika Komputer dan Visualisasi</span>
              </div>
            </a>
            <a href="/subject" class="matkul S3">
              <div class="matkulpic"><img src="image15.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">STA1202 |</span>
                <span class="matkulname">Teori Peluang</span>
              </div>
            </a>
            <a href="#" class="matkul S5">
              <div class="matkulpic"><img src="image16.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">??? |</span>
                <span class="matkulname">COMING SOON</span>
              </div>
            </a>
            <a href="#" class="matkul S5">
              <div class="matkulpic"><img src="image17.jpeg" alt="" /></div>
              <div class="textcontainer">
                <span class="matkulcode">??? |</span>
                <span class="matkulname">COMING SOON</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <script src="{{('js/filter.js') }}"></script>
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