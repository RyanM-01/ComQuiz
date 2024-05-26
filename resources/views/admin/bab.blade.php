<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('build/createbab.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />
    <title>Bab Page</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{ asset('images/logo.jpeg') }}" alt="" />
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
                <div class="title">
                    <i class="uil uil-paperclip"></i>
                    <span class="text">{{ $matkul->name }}</span>
                </div>
                <div class="profileContainer">
                    <form action="{{ route('bab.store', $matkul->code) }}" method="POST">
                        @csrf
                        <p>
                            <input placeholder="Masukkan nama Bab yang ingin ditambahkan" class="form-control" type="text" name="name" required autocomplete="off" />
                        </p>
                        <div class="button-container">
                            <button class="btn" type="submit" name="add">ADD</button>
                        </div>
                    </form>
                </div>
                <div class="container">
                    @foreach($babs as $bab)
                    <div class="babbox">
                        <form action="{{ route('bab.update', $bab->id) }}" method="POST">
                            @csrf
                            <div class="bab">
                                <button class="btn" type="submit" name="update"><i class="uil uil-edit"></i></button>
                                <p>
                                    <input class="namabab" type="text" name="name" value="{{ $bab->name }}" required autocomplete="off" />
                                </p>
                            </div>
                        </form>
                        <div>
                            <a href="#" class="takequiz-btn" data-matkul-code="{{ $matkul->code }}" data-bab-id="{{ $bab->id }}">Add Quiz</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="popup-info">
                <h2>Add quiz to this bab?</h2>
                <span class="info"> Click "Continue" to add quiz.</span>
                <div class="btn-group">
                    <button class="info-btn exit-btn">Back</button>
                    <a href="#" id="continue-btn" class="info-btn continue-btn">Continue</a>
                </div>
            </div>
        </div>
    </section>
        <script>
        document.querySelectorAll('.takequiz-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const babId = this.getAttribute('data-bab-id');
                const matkulCode = this.getAttribute('data-matkul-code');
                const continueBtn = document.getElementById('continue-btn');
                continueBtn.href = `/admin/bab/${matkulCode}/quiz/create/${babId}`;
                document.querySelector('.popup-info').style.display = 'block';
            });
        });

        document.querySelector('.exit-btn').addEventListener('click', function () {
            document.querySelector('.popup-info').style.display = 'none';
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
