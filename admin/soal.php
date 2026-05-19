<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';

$success = false;
$error = false;

// Ambil data kategori mata kuliah untuk dropdown
$kategori_matkul = mysqli_query($conn, "SELECT * FROM mata_kuliah ORDER BY nama_matkul ASC");

if (isset($_POST['submit'])) {
    $id_matkul = (int)$_POST['id_matkul'];
    $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
    $opsi_a = mysqli_real_escape_string($conn, $_POST['opsi_a']);
    $opsi_b = mysqli_real_escape_string($conn, $_POST['opsi_b']);
    $opsi_c = mysqli_real_escape_string($conn, $_POST['opsi_c']);
    $opsi_d = mysqli_real_escape_string($conn, $_POST['opsi_d']);
    $kunci_jawaban = mysqli_real_escape_string($conn, $_POST['kunci_jawaban']);

    $query = "INSERT INTO soal_ujian (id_matkul, pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, kunci_jawaban) VALUES ($id_matkul, '$pertanyaan', '$opsi_a', '$opsi_b', '$opsi_c', '$opsi_d', '$kunci_jawaban')";
    if (mysqli_query($conn, $query)) {
        $success = true;
    } else {
        $error = "Gagal menyimpan data.";
    }
}

if (isset($_GET['hapus'])) {
    $id_hapus = (int)$_GET['hapus'];
    mysqli_query($conn, "DELETE FROM soal_ujian WHERE id = $id_hapus");
    header("Location: soal.php");
    exit;
}

$query_soal = "SELECT s.*, m.nama_matkul FROM soal_ujian s JOIN mata_kuliah m ON s.id_matkul = m.id ORDER BY s.id DESC";
$soal = mysqli_query($conn, $query_soal);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Soal - Dark Mode</title>
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
                <a href="matkul.php" class="text-gray-300 hover:text-white font-medium transition-colors">Kategori Ujian</a>
                <a href="soal.php" class="text-blue-400 font-bold border-b-2 border-blue-400 pb-1">Bank Soal</a>
                <a href="hasil.php" class="text-gray-300 hover:text-white font-medium transition-colors">Hasil Ujian</a>
                <span class="text-gray-600 hidden md:inline">|</span>
                <a href="logout.php" class="bg-red-600 hover:bg-red-500 text-white px-4 py-1.5 rounded-lg font-semibold transition-colors">Logout</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-4 md:p-6 mt-6 grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <div class="xl:col-span-1 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 p-6 h-fit">
            <h2 class="text-xl font-bold mb-6 text-white border-b border-gray-700 pb-2 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Soal Baru
            </h2>
            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Pilih Mata Kuliah / Tes</label>
                    <select name="id_matkul" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 transition-all" required>
                        <option value="" class="text-gray-500">-- Pilih Kategori --</option>
                        <?php 
                        mysqli_data_seek($kategori_matkul, 0); 
                        while ($k = mysqli_fetch_assoc($kategori_matkul)): 
                        ?>
                            <option value="<?php echo $k['id']; ?>"><?php echo htmlspecialchars($k['nama_matkul']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Pertanyaan</label>
                    <textarea name="pertanyaan" rows="4" placeholder="Ketik pertanyaan..." class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 transition-all" required></textarea>
                </div>
                
                <div class="bg-gray-900/50 p-4 rounded-xl border border-gray-700 space-y-3">
                    <label class="block text-sm font-bold text-gray-300">Pilihan Jawaban</label>
                    <div class="flex items-center"><span class="w-8 font-bold text-gray-400">A.</span><input type="text" name="opsi_a" class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500" required></div>
                    <div class="flex items-center"><span class="w-8 font-bold text-gray-400">B.</span><input type="text" name="opsi_b" class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500" required></div>
                    <div class="flex items-center"><span class="w-8 font-bold text-gray-400">C.</span><input type="text" name="opsi_c" class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500" required></div>
                    <div class="flex items-center"><span class="w-8 font-bold text-gray-400">D.</span><input type="text" name="opsi_d" class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500" required></div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Kunci Jawaban Benar</label>
                    <select name="kunci_jawaban" class="w-full px-4 py-3 rounded-xl bg-green-900/30 border border-green-600 text-green-400 font-bold focus:ring-2 focus:ring-green-500" required>
                        <option value="A">Jawaban A</option>
                        <option value="B">Jawaban B</option>
                        <option value="C">Jawaban C</option>
                        <option value="D">Jawaban D</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-transform hover:-translate-y-1 mt-2">Simpan Soal</button>
            </form>
        </div>

        <div class="xl:col-span-2 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden h-fit">
            <div class="p-6 border-b border-gray-700">
                <h2 class="text-xl font-bold text-white">Daftar Soal Tersimpan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Kategori Tes</th>
                            <th class="px-4 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Pertanyaan</th>
                            <th class="px-4 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Kunci</th>
                            <th class="px-4 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <?php 
                        if(mysqli_num_rows($soal) > 0) {
                            while ($row = mysqli_fetch_assoc($soal)): 
                        ?>
                        <tr class="hover:bg-gray-700 transition-colors group">
                            <td class="px-4 py-4 text-sm text-gray-300 font-medium whitespace-nowrap">
                                <span class="bg-blue-900/50 text-blue-300 border border-blue-700 px-2 py-1.5 rounded-md text-xs font-bold">
                                    <?php echo htmlspecialchars($row['nama_matkul']); ?>
                                </span>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-400 max-w-xs truncate" title="<?php echo htmlspecialchars($row['pertanyaan']); ?>">
                                <?php echo htmlspecialchars($row['pertanyaan']); ?>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-900 text-center font-bold">
                                <span class="bg-green-900 text-green-300 px-3 py-1 rounded-full text-xs border border-green-700"><?php echo $row['kunci_jawaban']; ?></span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="?hapus=<?php echo $row['id']; ?>" class="text-red-400 hover:text-red-300 bg-gray-900 hover:bg-gray-600 px-3 py-2 rounded-lg transition-colors" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        } else {
                            echo "<tr><td colspan='4' class='text-center py-8 text-gray-500'>Belum ada soal yang ditambahkan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php if ($success): ?>
    <script>
        Swal.fire({
            icon: 'success', title: 'Berhasil', text: 'Soal berhasil ditambahkan ke database!',
            background: '#1f2937', color: '#f3f4f6', confirmButtonColor: '#3b82f6',
            customClass: { popup: 'border border-gray-700 rounded-2xl' }
        }).then(() => { window.location.href = 'soal.php'; });
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