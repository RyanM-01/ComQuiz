<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="quizend.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

    <title>Document</title>
  </head>

  <body>
    <div class="content">
      <div class="btn-group-back">
        <a href="dashboard.html" class="back-btn">Go To Dashboard</a>
      </div>

      <div class="title">
        <i class="uil uil-paperclip"></i>
        <span class="text">Kuis Strukdat Bab 2</span>
      </div>

      <div class="containerresult">
        <span>Quiz Result!</span>
        <span>You Score <span>5</span> out of <span>10</span></span>
        <span>Receive <span>50</span> Coin</span>
      </div>

      <div class="btn-group-continue">
        <span href="quizpage.html" class="continue-btn">Review</span>
      </div>

      <div class="container">
        <div class="question-container">
          <span class="nomor">1. </span>
          <span class="question">Pertanyaan 1</span>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option1" value="option1" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option1"> Jawaban 1</label>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="question-container">
          <span class="nomor">2. </span>
          <span class="question">Pertanyaan 2</span>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option2" value="option2" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option2"> Jawaban 2</label>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="question-container">
          <span class="nomor">3. </span>
          <span class="question">Pertanyaan 3</span>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option3" value="option3" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option3"> Jawaban 3</label>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="question-container">
          <span class="nomor">4. </span>
          <span class="question">Pertanyaan 4</span>
        </div>

        <div class="option-container">
          <div class="form-check" tabindex="0">
            <input tabindex="0" class="form-check-input" type="radio" name="quizOption" id="option4" value="option4" />
            <span>&nbsp</span>
            <label tabindex="0" class="form-check-label" for="option4"> Jawaban 4</label>
          </div>
        </div>
      </div>

      <div class="btn-group-continue">
        <span href="quizpage.html" class="continue-btn">Comment Section</span>
      </div>

      <div class="commentcontainer">
        <div id="comments" class="comments">
          <!-- Komentar-komentar akan ditampilkan di sini -->
        </div>
        <br />

        <form id="commentForm" class="commentForm">
          <label class="text" for="name">Nama:</label>
          <input class="input" type="text" id="name" name="name" placeholder="write your name" /><br />

          <label class="text" for="comment">Komentar:</label>
          <textarea class="input" id="comment" name="comment" rows="4" cols="50" placeholder="what do you think about this quiz"></textarea><br />

          <input class="btn" type="submit" value="Submit" />
        </form>
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
    <script>
      //komennnnnnnnnnnnnnnnnnnnnn
      document.getElementById("commentForm").addEventListener("submit", function (event) {
        event.preventDefault();
        let name = document.getElementById("name").value;
        let comment = document.getElementById("comment").value;

        let commentElement = document.createElement("div");
        commentElement.innerHTML = "<strong>" + name + ":</strong> " + comment;

        document.getElementById("comments").appendChild(commentElement);

        // Clear form
        document.getElementById("name").value = "";
        document.getElementById("comment").value = "";
      });
    </script>
  </body>
</html>
