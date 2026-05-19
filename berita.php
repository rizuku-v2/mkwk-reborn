<?php 
include 'includes/db.php';
include 'includes/header.php'; 

$query_str = "SELECT * FROM berita WHERE kategori = 'Berita' ORDER BY id DESC";
$artikel = mysqli_query($conn, $query_str);
?>

<div class="bg-blue-50 rounded-3xl py-12 px-4 sm:px-6 lg:px-8 text-center mb-12 shadow-sm border border-blue-100">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Berita & Pengumuman</h1>
    <p class="text-lg text-blue-800 max-w-2xl mx-auto font-medium">Informasi dan pengumuman akademik terkini seputar MKWK Unindra.</p>
</div>

<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
    <?php if (mysqli_num_rows($artikel) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($artikel)): ?>
        <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
            <a href="detail-berita.php?id=<?php echo $row['id']; ?>" class="flex flex-col h-full focus:outline-none">
                
                <div class="relative w-full aspect-video bg-gray-100 overflow-hidden flex items-center justify-center">
                    <?php if (empty($row['gambar_thumbnail'])): ?>
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center transition-transform duration-500 group-hover:scale-105">
                            <span class="text-6xl font-black text-white opacity-50 uppercase shadow-sm tracking-widest">
                                <?php echo substr(htmlspecialchars($row['judul']), 0, 1); ?>
                            </span>
                        </div>
                    <?php elseif (filter_var($row['gambar_thumbnail'], FILTER_VALIDATE_URL)): ?>
                        <img src="<?php echo htmlspecialchars($row['gambar_thumbnail']); ?>" alt="Thumbnail" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" onerror="this.src='https://placehold.co/800x450/e2e8f0/64748b?text=Image+Broken';">
                    <?php else: ?>
                        <img src="assets/img/uploads/<?php echo htmlspecialchars($row['gambar_thumbnail']); ?>" alt="Thumbnail" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" onerror="this.src='https://placehold.co/800x450/e2e8f0/64748b?text=Image+Broken';">
                    <?php endif; ?>

                    <div class="absolute top-4 left-4 z-10">
                        <span class="px-3 py-1.5 text-xs font-bold uppercase tracking-wider rounded-lg shadow-sm bg-purple-100/90 text-purple-700 backdrop-blur-sm border border-purple-200">
                            Berita
                        </span>
                    </div>
                </div>

                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="text-sm text-gray-500 mb-3 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <?php echo date('d M Y', strtotime($row['tanggal_post'])); ?>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors leading-snug line-clamp-2">
                        <?php echo htmlspecialchars($row['judul']); ?>
                    </h3>
                    
                    <p class="text-gray-600 mb-6 flex-grow line-clamp-3 leading-relaxed text-sm md:text-base">
                        <?php echo htmlspecialchars($row['cuplikan']); ?>
                    </p>
                    
                    <div class="mt-auto flex items-center text-blue-600 font-bold text-sm">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>

            </a>
        </article>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-3xl border border-gray-100 shadow-sm">
            <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
            <p class="text-gray-500">Berita dan pengumuman terbaru akan segera hadir di sini.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>