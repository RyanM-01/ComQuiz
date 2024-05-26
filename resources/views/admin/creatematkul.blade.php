<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/creatematkul.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Create Matkul</title>
</head>
<body>
    <div class="content">
        <div class="btn-group-back">
            <a href="/admin" class="back-btn">Go To Dashboard</a>
        </div>

        <div class="profileContainer">
            <div class="title">
                <i class="uil uil-paperclip"></i>
                <span class="text">Create Matkul</span>
            </div>
            <form action="{{ route('matkul.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label for="photo" class="text">Quiz Picture </label><br>
                    <input class="form-control" type="file" name="photo" id="photo" autocomplete="off">
                </p>
                <p>
                    <label for="name" class="text">Matkul name </label><br>
                    <input class="form-control" type="text" name="name" id="name" required autocomplete="off" placeholder="masukkan nama matkul, contoh 'Pemrograman'">
                </p>
                <p>
                    <label for="code" class="text">Matkul code </label><br>
                    <input class="form-control" type="text" name="code" id="code" required autocomplete="off" placeholder="masukkan kode matkul, contoh 'KOM120C'">
                </p>
                <p>
                    <label for="semester" class="text">Semester </label><br>
                    <input class="form-control" type="text" name="semester" id="semester" required autocomplete="off" placeholder="masukkan dengan format 'S angka semester', contoh 'S4'">
                </p>
                <div class="button-container">
                    <button class="btn" type="submit" name="create">CREATE</button>
                </div>
            </form>
        </div>

        <div class="title">
            <i class="uil uil-paperclip"></i>
            <span class="text">Preview</span>
        </div>
        <div class="matkulcontainer">
            <div class="matkul S3">
                <div class="matkulpic"><img src="image2.jpeg" alt=""></div>
                <div class="textcontainer">
                    <span class="matkulcode">KOM120A |</span>
                    <span class="matkulname">Aljabar Linear untuk Komputasi</span>
                </div>
            </div>
        </div>
    </div>

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
