<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Dark Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200 font-sans">
    
    <nav class="bg-gray-800 border-b border-gray-700 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <h1 class="text-xl font-bold flex items-center gap-3 text-white">
                Dashboard Admin
            </h1>
            <div class="flex flex-wrap justify-center gap-4 md:gap-6 text-sm md:text-base items-center">
                <a href="index.php" class="text-blue-400 font-bold">Postingan</a>
                <a href="matkul.php" class="text-gray-300 hover:text-white transition-colors">Kategori</a>
                <a href="soal.php" class="text-gray-300 hover:text-white transition-colors">Bank Soal</a>
                <a href="hasil.php" class="text-gray-300 hover:text-white transition-colors">Hasil Ujian</a>
                <span class="text-gray-600 hidden md:inline">|</span>
                <a href="../index.php" target="_blank" class="text-gray-300 hover:text-white transition-colors">Lihat Web</a>
                <a href="logout.php" class="bg-red-600 hover:bg-red-500 text-white px-4 py-1.5 rounded-lg font-semibold transition-colors">Logout</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-4 sm:p-6 mt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-white">Daftar Berita & Kegiatan</h2>
                <p class="text-gray-400 text-sm mt-1">Kelola postingan yang tampil di halaman utama.</p>
            </div>
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold transition-transform hover:-translate-y-1 flex items-center shadow-lg">
                + Tambah Postingan
            </a>
        </div>

        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Judul & Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
                        $no = 1;
                        if(mysqli_num_rows($query) > 0){
                            while($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr class="hover:bg-gray-700 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 font-medium">
                                        <?php echo $no++; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="../assets/img/uploads/<?php echo $row['gambar_thumbnail']; ?>" class="h-16 w-24 object-cover rounded-lg border border-gray-600" alt="thumb">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-100 text-base mb-1 line-clamp-2">
                                            <?php echo htmlspecialchars($row['judul']); ?>
                                        </div>
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold <?php echo (strtolower($row['kategori']) == 'berita') ? 'bg-blue-900 text-blue-300' : 'bg-green-900 text-green-300'; ?>">
                                            <?php echo htmlspecialchars($row['kategori']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <?php echo date('d M Y', strtotime($row['tanggal_post'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-400 hover:text-blue-300 bg-gray-900 hover:bg-gray-600 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="text-red-400 hover:text-red-300 bg-gray-900 hover:bg-gray-600 px-3 py-1.5 rounded-lg transition-colors" onclick="return confirm('Hapus postingan ini?')">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='py-12 text-center text-gray-500'>Belum ada postingan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>