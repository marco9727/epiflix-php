<?php
session_start();

$host = 'localhost';
$db = 'netflix_clone';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

if(isset($_SESSION['user_id'])) {
  $stmt = $pdo->prepare('SELECT * FROM movies');
  $stmt -> execute();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <style>
      body {
        background-color: #221f1f;
      }

      h2,
      h4,
      footer {
        color: #f5f5f1;
      }

      .icons {
        margin-left: 0.8em;
        margin-right: 0.8em;
        font-size: 1.2em;
        color: #f5f5f1;
      }

      .navbar-nav {
        font-size: 90%;
      }

      #kids {
        color: #f5f5f1;
        font-size: 0.8em;
      }

      .footer-icon {
        color: #838383;
      }

      .footer-links {
        font-size: 0.8em;
      }

      .footer-links p {
        margin-bottom: 0.3em;
        color: #838383;
      }

      .footer-links a {
        color: #838383;
        text-decoration: none;
      }

      .footer-button {
        color: #838383;
        border-color: #838383;
      }

      .copyright {
        color: #838383;
        font-size: 0.6em;
      }

      .col img {
        transition: transform 0.2s;
      }

      .custom-img{
        width: 50%;
        height: 60px;
        /* object-fit: cover; */
      }

      .col img:hover {
        transform: scale(1.1);
      }
    </style>
    <title>Epiflix</title>
  </head>
  <body>
    <div>
     <?= include __DIR__ . "/myNavbar.php"; ?>
      <div class="container-fluid px-4">
        <div class="d-flex justify-content-between">
          <div class="d-flex">
            <h2 class="mb-4">TV Shows</h2>
            <div class="btn-group" role="group">
              <div class="dropdown ms-4 mt-1">
                <button
                  type="button"
                  class="btn btn-secondary btn-sm dropdown-toggle rounded-0"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="background-color: #221f1f"
                >
                  Genres
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Comedy</a></li>
                  <li><a class="dropdown-item" href="#">Drama</a></li>
                  <li><a class="dropdown-item" href="#">Thriller</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div>
            <i class="bi bi-grid icons"></i>
            <i class="bi bi-grid-3x3 icons"></i>
          </div>
        </div>
        <h4>Trending Now</h4>
        <div
          class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-6 mb-4"
        >
        <?php 
        foreach($stmt as $row) {
          echo 
          "<div class='col mb-2 text-center px-1'>
            <img class='img-fluid custom-img' src='$row[cover_image_url]' alt='movie picture' />
          </div>";
          
         
        }
        
        ?>
          <!-- <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/2.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/3.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/4.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/5.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/6.png" alt="movie picture" />
          </div> -->
        </div>
        <!-- <h4>Watch it Again</h4>
        <div
          class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-6 mb-4"
        >
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/7.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/8.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/9.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/10.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/11.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/12.png" alt="movie picture" />
          </div>
        </div>
        <h4>New Releases</h4>
        <div
          class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-6 mb-4"
        >
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/13.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/14.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/15.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/16.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/17.png" alt="movie picture" />
          </div>
          <div class="col mb-2 text-center px-1">
            <img class="img-fluid" src="assets/18.png" alt="movie picture" />
          </div>
        </div> -->
        <footer>
          <div class="row justify-content-center mt-5">
            <div class="col col-6">
              <div class="row">
                <div class="col mb-2">
                  <i class="bi bi-facebook footer-icon me-2"></i>
                  <i class="bi bi-instagram footer-icon me-2"></i>
                  <i class="bi bi-twitter-x footer-icon me-2"></i>
                  <i class="bi bi-youtube footer-icon"></i>
                </div>
              </div>
              <div
                class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg 4"
              >
                <div class="col">
                  <div class="row">
                    <div class="col footer-links">
                      <p>
                        <a href="#" alt="footer link">Audio and Subtitles</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Media Center</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Privacy</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Contact us</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col footer-links">
                      <p>
                        <a href="#" alt="footer link">Audio Description</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Investor Relations</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Legal Notices</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col footer-links">
                      <p>
                        <a href="#" alt="footer link">Help Center</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Jobs</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Cookie Preferences</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col footer-links">
                      <p>
                        <a href="#" alt="footer link">Gift Cards</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Terms of Use</a>
                      </p>
                      <p>
                        <a href="#" alt="footer link">Corporate Information</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col mb-2">
                  <button
                    type="button"
                    class="btn btn-sm footer-button rounded-0 mt-3"
                  >
                    Service Code
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col mb-2 mt-2 copyright">
                  © 1997-2023 Netflix, Inc.
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
