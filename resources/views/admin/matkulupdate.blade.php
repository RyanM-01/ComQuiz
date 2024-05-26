<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/creatematkul.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Edit Matkul</title>
</head>
<body>
    <div class="content">
        <div class="btn-group-back">
            <a href="/admin" class="back-btn">Go To Dashboard</a>
        </div>

        <div class="profileContainer">
            <div class="title">
                <i class="uil uil-paperclip"></i>
                <span class="text">Edit Matkul</span>
            </div>
            <form action="{{ route('matkul.update', $matkul->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for update -->
                <p>
                    <label for="photo" class="text">Matkul Picture</label><br>
                    <input class="form-control" type="file" name="photo" id="photo" required autocomplete="off">
                </p>
                <p>
                    <label for="name" class="text">Matkul Name</label><br>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $matkul->name }}" required autocomplete="off" placeholder="Enter matkul name">
                </p>
                <p>
                    <label for="code" class="text">Matkul Code</label><br>
                    <input class="form-control" type="text" name="code" id="code" value="{{ $matkul->code }}" required autocomplete="off" placeholder="Enter matkul code">
                </p>
                <p>
                    <label for="semester" class="text">Semester</label><br>
                    <input class="form-control" type="text" name="semester" id="semester" value="{{ $matkul->semester }}" required autocomplete="off" placeholder="Enter semester">
                </p>
                <div class="button-container">
                    <button class="btn" type="submit" name="update">UPDATE</button>
                </div>
            </form>
        </div>

        <div class="title">
            <i class="uil uil-paperclip"></i>
            <span class="text">Preview</span>
        </div>
        <div class="matkulcontainer">
            <div class="matkul S3">
                <div class="matkulpic"><img src="{{ asset('storage/photos/' . $matkul->photo) }}" alt="Matkul Image"></div>
                <div class="textcontainer">
                    <span class="matkulcode">{{ $matkul->code }} |</span>
                    <span class="matkulname">{{ $matkul->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        // Check selected theme from localStorage
        function getTheme() {
            return localStorage.getItem("theme");
        }

        // Apply selected theme
        document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = getTheme();
            if (savedTheme) {
                document.body.classList.add(savedTheme);
            }
        });
    </script>
</body>
</html>
