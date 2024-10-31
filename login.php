<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      object-fit: cover;
      background-color: (42, 155, 103);
      background-image: linear-gradient(90deg, rgba(42, 155, 103, 1), rgba(23, 248, 174, 1), rgba(116, 245, 203, 1));
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    #systemName {
      background: -webkit-linear-gradient(#098e50, #134930);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 150px;
    }

    h2 {
      font-size: 110px;
      background: -webkit-linear-gradient(#098e50, #197e4f);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0;
    }

    @media only screen and (max-width: 620px) {

      /* For mobile phones: */
      #containerOne,
      #containerTwo {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <?php
  session_start();
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="d-flex vh-100">
        <!-- Container 1 -->
        <div id="containerOne" class="col align-self-start">
          <div class="p-5 w-100 ">
            <h1 id="systemName">SMART<h1>
                <h2>Faculty Portal</h2>
          </div>
        </div>
        <!-- Container 2 -->
        <div id="containerTwo" class="col align-self-center">
          <div class="border border-success p-2 rounded shadow p-3 bg-body rounded-pill">
            <!-- Login Form -->
            <div id="form-container">
              <div id="login-form">
                <?php if (isset($_SESSION['success'])): ?>
                  <div class="alert alert-success">
                    <?= $_SESSION['success']; ?>
                  </div>
                  <script>
                    setTimeout(function () {
                      window.location.href = 'http://localhost/SmartFacultyPortal_v1/dashboard.php';
                    }, 2000);
                  </script>
                  <?php unset($_SESSION['success']);
                endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                  <div class="alert alert-danger mt-3">
                    <?= $_SESSION['error']; ?>
                  </div>
                  <?php unset($_SESSION['error']);
                endif; ?>
                <!-- Login form  -->
                <form action="http://localhost/SmartFacultyPortal_v1/controllers/loginController.php" method="POST">
                  <div class="mx-auto text-center">
                    <div>
                      <h1 class="text-center mb-3">Login</h1>
                    </div>
                    <div class="form-floating mb-3 d-flex justify-content-center">

                      <input type="text" class="form-control rounded-pill w-75 px-4" id="userName" name="userName"
                        placeholder="Enter username"
                        value="<?= isset($_COOKIE['userName']) ? htmlspecialchars($_COOKIE['userName']) : ''; ?>"
                        required>
                      <label class="w-50" for="userName">Username</label>
                    </div>
                    <div class="form-floating mb-3 d-flex justify-content-center">
                      <input type="password" class="form-control rounded-pill px-4 w-75" id="password" name="password"
                        placeholder="Enter password" required>
                      <label for="password" class="bi bi-eye w-50">Password</label>
                    </div>
                    <div class="mb-3 form-check d-flex justify-content-start">
                      <input type="checkbox" class="form-check-input ms-5" id="remember" name="remember" <?php if (isset($_COOKIE['userName']))
                        echo 'checked'; ?>>
                      <label class="form-check-label ms-2" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn text-white bg-primary bg-gradient rounded-pill w-75">Login</button>
                    <div class="mt-3 text-center">
                      <p>Don't have an account? <a href="#" onclick="showForm('register-form', 'login-form')">Register
                          here</a>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Registration Form -->
            <div id="register-form" style="display: none;">
              <form action="http://localhost/SmartFacultyPortal_v1/controllers/registerController.php" method="POST">
                <div class="mb-3">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="mb-3">
                  <label for="middleName" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middleName" name="middleName">
                </div>
                <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="mb-3">
                  <label for="registerUserName" class="form-label">Username</label>
                  <input type="text" class="form-control" id="registerUserName" name="registerUserName" required>
                </div>
                <div class="mb-3">
                  <label for="registerEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="registerEmail" name="registerEmail" required>
                </div>
                <div class="mb-3 position-relative">
                  <label for="registerPassword" class="form-label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword"
                      placeholder="Enter password" required>
                    <span class="input-group-text" style="cursor: pointer;"
                      onclick="togglePasswordVisibility('registerPassword', 'toggleRegisterIcon')">
                      <i class="bi bi-eye" id="toggleRegisterIcon"></i>
                    </span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <div class="mt-3 text-center">
                  <p>Already have an account? <a href="#" onclick="showForm('login-form', 'register-form')">Login
                      here</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>