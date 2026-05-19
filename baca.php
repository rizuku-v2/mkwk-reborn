<?php
include 'includes/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id = $id");

if (mysqli_num_rows($query) == 0) {
    $page_title = "Artikel Tidak Ditemukan";
    include 'includes/header.php';
    echo '
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4">
        <div class="w-24 h-24 bg-red-50 text-red-500 rounded-full flex items-center justify-center mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Artikel Tidak Ditemukan</h1>
        <p class="text-gray-500 mb-8">Maaf, berita atau kegiatan yang Anda cari mungkin telah dihapus atau tautannya rusak.</p>
        <a href="berita.php" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform hover:-translate-y-1">Kembali ke Daftar Berita</a>
    </div>';
    include 'includes/footer.php';
    exit;
}

$artikel = mysqli_fetch_assoc($query);

$page_title = htmlspecialchars($artikel['judul']) . " - MKWK Unindra";
$meta_desc = htmlspecialchars($artikel['ringkasan']);

include 'includes/header.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 mb-16">
    
    <a href="berita.php" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-blue-600 transition-colors mb-8 group">
        <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar Berita
    </a>

    <header class="mb-10 text-center md:text-left">
        <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 mb-6">
            <span class="px-4 py-1.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm <?php echo $artikel['kategori'] == 'berita' ? 'bg-purple-100 text-purple-700' : 'bg-green-100 text-green-700'; ?>">
                <?php echo htmlspecialchars($artikel['kategori']); ?>
            </span>
            <span class="text-gray-500 flex items-center text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <?php echo date('d F Y', strtotime($artikel['tanggal'])); ?>
            </span>
        </div>
        
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            <?php echo htmlspecialchars($artikel['judul']); ?>
        </h1>
        
        <p class="text-xl text-gray-500 leading-relaxed font-medium">
            <?php echo htmlspecialchars($artikel['ringkasan']); ?>
        </p>
    </header>

    <div class="w-full aspect-video rounded-3xl overflow-hidden shadow-sm border border-gray-100 mb-12 bg-gray-100">
        <img src="assets/img/<?php echo htmlspecialchars($artikel['gambar']); ?>" alt="<?php echo htmlspecialchars($artikel['judul']); ?>" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://placehold.co/1200x675/e2e8f0/64748b?text=Gambar+Berita';">
    </div>

    <article class="rich-text bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 text-gray-700 text-lg md:text-xl">
        <?php 
        echo nl2br(htmlspecialchars($artikel['konten'])); 
        ?>
    </article>

    <div class="mt-12 flex justify-center">
        <button onclick="navigator.clipboard.writeText(window.location.href); Swal.fire({icon: 'success', title: 'Tersalin!', text: 'Tautan artikel berhasil disalin.', showConfirmButton: false, timer: 1500});" class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
            Bagikan Artikel Ini
        </button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>