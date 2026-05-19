<?php
session_start();
include '../includes/db.php'; // Sesuaikan path ini dengan struktur folder Anda
$error = false;

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Dark Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-900 rounded-full mix-blend-screen filter blur-[120px] opacity-30"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-indigo-900 rounded-full mix-blend-screen filter blur-[120px] opacity-30"></div>

    <div class="bg-gray-800 border border-gray-700 rounded-3xl shadow-2xl w-full max-w-md p-8 md:p-10 relative z-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-white tracking-tight mb-2">Panel Admin</h1>
            <p class="text-gray-400 text-sm font-medium">Silakan masuk untuk melanjutkan</p>
        </div>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2" for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off" 
                    class="w-full px-4 py-3.5 bg-gray-900 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" 
                    placeholder="Masukkan username">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-3.5 bg-gray-900 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" 
                    placeholder="••••••••">
            </div>

            <button type="submit" name="login" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-transform hover:-translate-y-0.5">
                Masuk
            </button>
        </form>
    </div>

    <?php if ($error): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: 'Username atau password salah.',
            background: '#1f2937', // bg-gray-800
            color: '#f3f4f6', // text-gray-100
            confirmButtonColor: '#3b82f6'
        });
    </script>
    <?php endif; ?>
</body>
</html>