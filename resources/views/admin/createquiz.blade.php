<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('build/createquiz.css') }}">>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

    <title>Document</title>
  </head>

  <body>
    <div class="content">
      <div class="btn-group-back">
      <a href="{{ route('quiz.create', ['matkulCode' => $matkul->code, 'bab_id' => $bab->id]) }}" class="back-btn">Exit Edit</a>

      </div>

      <div class="title">
        <i class="uil uil-paperclip"></i>
        <span class="text">Quiz Strukdat Bab 2</span>
      </div>

      <div class="container">
        <div class="question-container">
          <span class="nomor">1. </span>
            <textarea class="form-control question" type="text" name="nama" id="nama" required autocomplete="off" placeholder="Masukkan pertanyaan di sini"></textarea>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option1" value="option1" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question" for="option1" placeholder="masukan opsi" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
            <div class="button-container">
              <button class="btn opsi" type="submit" name="update">CORRECT ANSWER</button>
              <button class="trash" type="submit" name="update"><i class="uil uil-trash-alt"></i></button>
            </div>
          </div>
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option2" value="option2" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question" for="option2" placeholder="masukan opsi" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
            <div class="button-container">
              <button class="btn opsi" type="submit" name="update">CORRECT ANSWER</button>
              <button class="trash" type="submit" name="update"><i class="uil uil-trash-alt"></i></button>
            </div>
          </div>
          <div class="button-container">
            <button class="btn tambahopsi" type="submit" name="update">TAMBAH OPSI</button>
          </div>
        </div>
      </div>

      <div class="btn-group-continue">
        <button class="continue-btn" type="submit" name="update">TAMBAH SOAL</button>
      </div>

      <div class="container">
        <div class="question-container">
          <span class="nomor">1. </span>
          <textarea class="form-control question done" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option1" value="option1" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option1" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option2" value="option2" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option2" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option3" value="option3" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option3" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option4" value="option4" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option4" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="question-container">
          <span class="nomor">2. </span>
          <textarea class="form-control question done" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option1" value="option1" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option1" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option2" value="option2" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option2" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option3" value="option3" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option3" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option4" value="option4" />
            <span>&nbsp</span>
            <textarea tabindex="0" class="form-check-label question done" for="option4" class="form-control" type="text" name="nama" id="nama" required autocomplete="off"></textarea>
          </div>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
    <script>
      document.querySelectorAll(".form-check, .form-check-label, .form-check-input").forEach((item) => {
        item.addEventListener("click", (event) => {
          const input = item.querySelector(".form-check-input");
          if (input) {
            input.checked = true;
          }
        });
        item.addEventListener("focus", (event) => {
          const formCheck = item.closest(".form-check");
          if (formCheck) {
            formCheck.classList.add("focused");
          }
        });
        item.addEventListener("blur", (event) => {
          const formCheck = item.closest(".form-check");
          if (formCheck) {
            formCheck.classList.remove("focused");
          }
        });
      });
    </script>
  </body>
</html>




