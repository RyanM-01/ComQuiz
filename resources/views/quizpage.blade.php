<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{('build/quizpage.css') }}" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

    <title>Document</title>
  </head>

  <body>
    <div class="content">
      <div class="btn-group-back">
        <a href="/subject" class="back-btn">Exit Quiz</a>
      </div>

      <div class="title">
        <i class="uil uil-paperclip"></i>
        <span class="text">Quiz Strukdat Bab 2</span>
      </div>

      <div class="container">
        <div class="question-container">
          <span class="nomor">1. </span>
          <span class="question">Siapa rapper twice</span>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option1" value="option1" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option1"> dahyun</label>
          </div>
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option2" value="option2" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option2"> ceyong</label>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option3" value="option3" />
            <span>&nbsp</span>
            <label class="form-check-label" for="option3"> najla </label>
          </div>
          <div class="form-check" tabindex="0">
            <input class="form-check-input" type="radio" name="quizOption" id="option4" value="option4" />
            <span>&nbsp</span>
            <label class="form-check-label" for="option4"> sana </label>
          </div>
        </div>
      </div>

      <div class="btn-group-continue">
        <a href="quizend.html" class="continue-btn">Next page</a>
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