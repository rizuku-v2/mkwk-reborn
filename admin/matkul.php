<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';

$success = false;
$error = false;

// Tambah Matkul Baru
if (isset($_POST['submit'])) {
    $nama_matkul = mysqli_real_escape_string($conn, $_POST['nama_matkul']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    if (mysqli_query($conn, "INSERT INTO mata_kuliah (nama_matkul, status) VALUES ('$nama_matkul', '$status')")) {
        $success = "Mata kuliah berhasil ditambahkan!";
    } else {
        $error = "Gagal menyimpan data.";
    }
}

// Hapus Matkul
if (isset($_GET['hapus'])) {
    $id_hapus = (int)$_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mata_kuliah WHERE id = $id_hapus");
    header("Location: matkul.php");
    exit;
}

// Update Status
if (isset($_GET['toggle']) && isset($_GET['status'])) {
    $id_toggle = (int)$_GET['toggle'];
    $new_status = $_GET['status'] == 'aktif' ? 'nonaktif' : 'aktif';
    mysqli_query($conn, "UPDATE mata_kuliah SET status = '$new_status' WHERE id = $id_toggle");
    header("Location: matkul.php");
    exit;
}

$matkul = mysqli_query($conn, "SELECT * FROM mata_kuliah ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Tes - Dark Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans">
    
    <nav class="bg-gray-800 border-b border-gray-700 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold flex items-center gap-3">
                <img src="../assets/img/header.png" class="h-8 bg-white rounded p-1" alt="Logo"> Panel Admin
            </h1>
            <div class="flex gap-4 items-center">
                <a href="index.php" class="text-gray-300 hover:text-white font-medium transition-colors">Postingan</a>
                <a href="matkul.php" class="text-blue-400 font-bold border-b-2 border-blue-400 pb-1">Kategori Ujian</a>
                <a href="soal.php" class="text-gray-300 hover:text-white font-medium transition-colors">Bank Soal</a>
                <a href="hasil.php" class="text-gray-300 hover:text-white font-medium transition-colors">Hasil Ujian</a>
                <span class="text-gray-600 hidden md:inline">|</span>
                <a href="logout.php" class="bg-red-600 hover:bg-red-500 text-white px-4 py-1.5 rounded-lg font-semibold transition-colors">Logout</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-4 md:p-6 mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-1 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 p-6 h-fit">
            <h2 class="text-xl font-bold mb-4 text-white border-b border-gray-700 pb-2">Tambah Kategori Ujian</h2>
            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Nama Kategori / Mata Kuliah</label>
                    <input type="text" name="nama_matkul" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Contoh: Kuis Kewarganegaraan" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Status Publikasi</label>
                    <select name="status" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 transition-all" required>
                        <option value="aktif">Aktif (Tersedia untuk Mahasiswa)</option>
                        <option value="nonaktif">Nonaktif (Sembunyikan)</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-transform hover:-translate-y-1 mt-2">Simpan Kategori</button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <h2 class="text-xl font-bold text-white">Daftar Kategori Ujian</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Mata Kuliah / Tes</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <?php while ($row = mysqli_fetch_assoc($matkul)): ?>
                        <tr class="hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-100"><?php echo htmlspecialchars($row['nama_matkul']); ?></td>
                            <td class="px-6 py-4 text-center">
                                <a href="?toggle=<?php echo $row['id']; ?>&status=<?php echo $row['status']; ?>" class="px-3 py-1.5 rounded-full text-xs font-bold transition-colors <?php echo $row['status'] == 'aktif' ? 'bg-green-900 text-green-300 hover:bg-green-800' : 'bg-gray-700 text-gray-400 hover:bg-gray-600'; ?>">
                                    <?php echo strtoupper($row['status']); ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center text-sm font-medium">
                                <a href="?hapus=<?php echo $row['id']; ?>" class="text-red-400 hover:text-red-300 bg-gray-900 hover:bg-gray-700 px-3 py-2 rounded-lg transition-colors" onclick="return confirm('Hapus kategori ini? Semua soal di dalamnya juga akan terhapus!')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if(mysqli_num_rows($matkul) == 0): ?>
                        <tr><td colspan="3" class="text-center py-8 text-gray-500">Belum ada kategori ujian.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php if ($success): ?>
    <script>
        Swal.fire({
            icon: 'success', title: 'Berhasil', text: '<?php echo $success; ?>',
            background: '#1f2937', color: '#f3f4f6', confirmButtonColor: '#3b82f6',
            customClass: { popup: 'border border-gray-700 rounded-2xl' }
        }).then(() => { window.location.href = 'matkul.php'; });
    </script>
    <?php endif; ?>
    <?php if ($error): ?>
    <script>
        Swal.fire({
            icon: 'error', title: 'Gagal', text: '<?php echo $error; ?>',
            background: '#1f2937', color: '#f3f4f6', confirmButtonColor: '#ef4444',
            customClass: { popup: 'border border-gray-700 rounded-2xl' }
        });
    </script>
    <?php endif; ?>
</body>
</html>