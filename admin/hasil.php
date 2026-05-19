<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';

$filter_matkul = isset($_GET['matkul']) ? (int)$_GET['matkul'] : 0;
$query_where = $filter_matkul > 0 ? " WHERE id_matkul = $filter_matkul" : "";

$q_total = mysqli_query($conn, "SELECT COUNT(DISTINCT npm) as total FROM hasil_ujian" . $query_where);
$total_peserta = mysqli_fetch_assoc($q_total)['total'];

$q_avg = mysqli_query($conn, "SELECT AVG(skor) as avg_skor FROM hasil_ujian" . $query_where);
$rata_rata = round(mysqli_fetch_assoc($q_avg)['avg_skor'] ?? 0);

$query_str = "SELECT h.*, m.nama, mk.nama_matkul FROM hasil_ujian h JOIN mahasiswa m ON h.npm = m.npm JOIN mata_kuliah mk ON h.id_matkul = mk.id";
if ($filter_matkul > 0) { $query_str .= " WHERE h.id_matkul = $filter_matkul"; }
$query_str .= " ORDER BY h.tanggal DESC";
$query_hasil = mysqli_query($conn, $query_str);

$kategori_tes = mysqli_query($conn, "SELECT * FROM mata_kuliah ORDER BY nama_matkul ASC");

if (isset($_GET['hapus'])) {
    $id_hapus = (int)$_GET['hapus'];
    mysqli_query($conn, "DELETE FROM hasil_ujian WHERE id = $id_hapus");
    header("Location: hasil.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian - Dark Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                <a href="soal.php" class="text-gray-300 hover:text-white font-medium transition-colors">Bank Soal</a>
                <a href="hasil.php" class="text-blue-400 font-bold border-b-2 border-blue-400 pb-1">Hasil Ujian</a>
                <span class="text-gray-600 hidden md:inline">|</span>
                <a href="logout.php" class="bg-red-600 hover:bg-red-500 text-white px-4 py-1.5 rounded-lg font-semibold transition-colors">Logout</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-4 md:p-6 mt-6">
        
        <form action="" method="GET" class="bg-gray-800 p-5 rounded-2xl shadow-xl border border-gray-700 flex flex-col md:flex-row gap-4 items-end mb-8">
            <div class="flex-grow w-full">
                <label class="block text-sm font-bold text-gray-300 mb-2">Filter Berdasarkan Mata Kuliah / Tes:</label>
                <select name="matkul" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white font-semibold focus:ring-2 focus:ring-blue-500">
                    <option value="0">Semua Data Ujian</option>
                    <?php while ($k = mysqli_fetch_assoc($kategori_tes)): ?>
                        <option value="<?php echo $k['id']; ?>" <?php echo $filter_matkul == $k['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($k['nama_matkul']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-colors">Terapkan Filter</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400 font-bold uppercase tracking-wider mb-1">Total Peserta (Terfilter)</p>
                    <h3 class="text-4xl font-black text-blue-400"><?php echo $total_peserta; ?></h3>
                </div>
                <div class="w-14 h-14 bg-blue-900/50 text-blue-400 rounded-full flex items-center justify-center border border-blue-800">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400 font-bold uppercase tracking-wider mb-1">Rata-Rata Skor (Terfilter)</p>
                    <h3 class="text-4xl font-black text-green-400"><?php echo $rata_rata; ?></h3>
                </div>
                <div class="w-14 h-14 bg-green-900/50 text-green-400 rounded-full flex items-center justify-center border border-green-800">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-700">
                <h2 class="text-lg font-bold text-white">Riwayat Nilai Mahasiswa</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Waktu</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Mahasiswa & NPM</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Mata Kuliah / Tes</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Skor Akhir</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <?php if(mysqli_num_rows($query_hasil) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($query_hasil)): ?>
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php echo date('d M Y, H:i', strtotime($row['tanggal'])); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-200"><?php echo htmlspecialchars($row['nama']); ?></div>
                                    <div class="text-xs font-mono text-gray-500 mt-1"><?php echo htmlspecialchars($row['npm']); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1.5 inline-flex text-xs leading-5 font-bold rounded-md bg-blue-900/50 text-blue-300 border border-blue-700">
                                        <?php echo htmlspecialchars($row['nama_matkul']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="text-xl font-black <?php echo $row['skor'] >= 70 ? 'text-green-400' : 'text-red-400'; ?>">
                                        <?php echo $row['skor']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="?hapus=<?php echo $row['id']; ?>" class="text-red-400 hover:text-red-300 bg-gray-900 hover:bg-gray-600 px-3 py-2 rounded-lg transition-colors" onclick="return confirm('Hapus riwayat ujian ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center py-10 text-gray-500">Belum ada riwayat hasil ujian.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>