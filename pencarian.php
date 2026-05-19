<?php 
include 'includes/db.php';
include 'includes/header.php'; 

$keyword = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';
$hasil_pencarian = null;

if ($keyword != '') {
    $query_str = "SELECT * FROM berita WHERE judul LIKE '%$keyword%' OR cuplikan LIKE '%$keyword%' OR isi_konten LIKE '%$keyword%' ORDER BY id DESC";
    $hasil_pencarian = mysqli_query($conn, $query_str);
}
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12 md:py-20 min-h-[60vh]">
    <div class="text-center mb-10">
        <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">Pusat Pencarian</h1>
        <p class="text-lg text-gray-500">Temukan berita, kegiatan, dan pengumuman akademik dengan mudah.</p>
    </div>

    <form action="" method="GET" class="relative max-w-3xl mx-auto mb-16 shadow-2xl rounded-2xl overflow-hidden group">
        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
            <svg class="h-6 w-6 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" name="q" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Ketik kata kunci pencarian..." class="w-full pl-16 pr-32 py-5 text-lg border-0 focus:ring-0 bg-white text-gray-900 outline-none" required autocomplete="off">
        <button type="submit" class="absolute right-2 top-2 bottom-2 px-6 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-colors">
            Cari
        </button>
    </form>

    <?php if ($keyword != '' && $hasil_pencarian): ?>
        <div class="mb-8 border-b border-gray-200 pb-4 flex justify-between items-end">
            <h2 class="text-2xl font-bold text-gray-900">Hasil Pencarian untuk "<span class="text-blue-600"><?php echo htmlspecialchars($keyword); ?></span>"</h2>
            <span class="text-gray-500 font-medium bg-gray-100 px-3 py-1 rounded-lg"><?php echo mysqli_num_rows($hasil_pencarian); ?> Ditemukan</span>
        </div>

        <?php if (mysqli_num_rows($hasil_pencarian) > 0): ?>
            <div class="space-y-6">
                <?php while ($row = mysqli_fetch_assoc($hasil_pencarian)): ?>
                <a href="detail-berita.php?id=<?php echo $row['id']; ?>" class="block bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group flex flex-col sm:flex-row gap-6 items-center">
                    <img src="assets/img/uploads/<?php echo htmlspecialchars($row['gambar_thumbnail']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0" onerror="this.src='https://placehold.co/400x300/e2e8f0/64748b?text=Image';">
                    
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-2.5 py-0.5 text-xs font-bold uppercase tracking-wider rounded-md <?php echo strtolower($row['kategori']) == 'berita' ? 'bg-purple-100 text-purple-700' : 'bg-green-100 text-green-700'; ?>">
                                <?php echo htmlspecialchars($row['kategori']); ?>
                            </span>
                            <span class="text-sm text-gray-500 font-medium"><?php echo date('d M Y', strtotime($row['tanggal_post'])); ?></span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors"><?php echo htmlspecialchars($row['judul']); ?></h3>
                        <p class="text-gray-600 text-sm line-clamp-2"><?php echo htmlspecialchars($row['cuplikan']); ?></p>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 border-dashed">
                <p class="text-gray-500 text-lg mb-4">Tidak ada postingan yang cocok dengan kata kunci tersebut.</p>
                <a href="pencarian.php" class="text-blue-600 font-bold hover:underline">Reset Pencarian</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>