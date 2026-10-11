
<?php
require 'function.php';

if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Yusman Telaumbanua</title>

    <link href="css/styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #0b1120;
            color: #fff;
        }

        .login-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        /* Bagian kiri */
        .login-banner {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 55px 9%;
            background:
                radial-gradient(circle at 15% 20%,
                    rgba(59,130,246,.35), transparent 35%),
                linear-gradient(145deg, #111c35, #123d7a 65%, #1673db);
        }

        .login-banner::before,
        .login-banner::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            pointer-events: none;
        }

        .login-banner::before {
            width: 400px;
            height: 400px;
            right: -130px;
            top: 12%;
        }

        .login-banner::after {
            width: 550px;
            height: 550px;
            right: -200px;
            top: 5%;
        }

        .brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: rgba(255,255,255,.15);
            border: 1px solid rgba(255,255,255,.2);
            font-size: 22px;
        }

        .banner-content {
            position: relative;
            z-index: 1;
            max-width: 570px;
            padding: 55px 0;
        }

        .banner-label {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 30px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.18);
            color: #bfdbfe;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
        }

        .banner-content h1 {
            margin: 25px 0 18px;
            font-size: clamp(35px, 4vw, 58px);
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .banner-content h1 span {
            color: #93c5fd;
        }

        .banner-content p {
            max-width: 460px;
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.9;
        }

        .banner-footer {
            position: relative;
            z-index: 1;
            color: #bfdbfe;
            font-size: 12px;
        }

        /* Bagian kanan */
        .login-form-area {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 45px 30px;
            background: #f4f7fc;
            color: #172033;
        }

        .login-card {
            width: 100%;
            max-width: 390px;
        }

        .mobile-brand {
            display: none;
        }

        .login-heading {
            margin-bottom: 32px;
        }

        .login-heading .small-label {
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .login-heading h2 {
            margin: 12px 0 8px;
            color: #111827;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .login-heading p {
            margin: 0;
            color: #718096;
            font-size: 13px;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #263449;
            font-size: 12px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper > i {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 15px;
        }

        .input-wrapper input {
            width: 100%;
            height: 53px;
            padding: 0 45px;
            border: 1px solid #dce4ef;
            border-radius: 12px;
            outline: none;
            background: #fff;
            color: #172033;
            font-family: inherit;
            font-size: 13px;
            transition: .25s;
        }

        .input-wrapper input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,.10);
        }

        .input-wrapper input::placeholder {
            color: #a0aec0;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            padding: 5px;
        }

        .login-button {
            width: 100%;
            min-height: 52px;
            margin-top: 8px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 9px 20px rgba(37,99,235,.20);
            transition: .25s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,.3);
        }

        .login-button i {
            margin-left: 8px;
        }

        .login-note {
            margin-top: 25px;
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.8;
        }

        .login-note i {
            margin-right: 5px;
            color: #16a34a;
        }

        /* Responsif */
        @media (max-width: 850px) {
            .login-page {
                grid-template-columns: 1fr;
            }

            .login-banner {
                display: none;
            }

            .login-form-area {
                min-height: 100vh;
                padding: 30px 22px;
                background:
                    radial-gradient(circle at top right,
                        #dbeafe, transparent 45%),
                    #f4f7fc;
            }

            .login-card {
                max-width: 420px;
            }

            .mobile-brand {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 48px;
                color: #172033;
                font-size: 13px;
                font-weight: 700;
            }

            .mobile-brand .brand-icon {
                background: #dbeafe;
                color: #2563eb;
                border: none;
            }
        }

        @media (max-width: 480px) {
            .login-form-area {
                padding: 25px 20px;
            }

            .mobile-brand {
                margin-bottom: 40px;
            }

            .login-heading h2 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>
<div class="login-page">

    <!-- Panel kiri desktop -->
    <section class="login-banner">
        <div class="brand">
            <div class="brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <span>YUSMAN STORE<br> <small>MANAGEMENT SYSTEM</small></span>
        </div>

        <div class="banner-content">
            <span class="banner-label">
                <i class="fas fa-shield-halved"></i>
                ADMINISTRATOR AREA
            </span>

            <h1>Kelola bisnis<br>lebih <span>mudah.</span></h1>

            <p>
                Selamat datang di sistem manajemen penjualan.
                Masuk ke akun administrator untuk mengelola data
                dan memantau aktivitas bisnis Anda.
            </p>
        </div>

        <div class="banner-footer">
            &copy; <?= date('Y'); ?> Yusman Telaumbanua. Hak cipta dilindungi.
        </div>
    </section>

    <!-- Form login -->
    <main class="login-form-area">
        <div class="login-card">

            <div class="mobile-brand">
                <div class="brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>YUSMAN STORE<br>
                    <small>MANAGEMENT SYSTEM</small>
                </span>
            </div>

            <div class="login-heading">
                <div class="small-label">Selamat datang kembali</div>
                <h2>Login Admin</h2>
                <p>Masukkan username dan password untuk melanjutkan.</p>
            </div>

            <form method="post">
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input
                            type="text"
                            id="inputUsername"
                            name="username"
                            placeholder="Masukkan username"
                            autocomplete="username"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input
                            type="password"
                            id="inputPassword"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="login" class="login-button">
                    Masuk ke Dashboard
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="login-note">
                <i class="fas fa-shield-halved"></i>
                Akses khusus administrator. Jaga kerahasiaan akun Anda.
            </div>

        </div>
    </main>

</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('inputPassword');
    const icon = this.querySelector('i');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
        this.setAttribute('aria-label', 'Sembunyikan password');
    } else {
        password.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
        this.setAttribute('aria-label', 'Tampilkan password');
    }
});
</script>

</body>
</html>
