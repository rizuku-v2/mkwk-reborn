<?php 
include 'includes/db.php';

if(!isset($_GET['id'])) {
    header("Location: berita.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM berita WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if(!$data) {
    header("Location: berita.php");
    exit;
}

$page_title = $data['judul'] . " - MKWK Unindra";
$meta_desc = !empty($data['seo_description']) ? $data['seo_description'] : $data['cuplikan'];
$meta_keys = !empty($data['seo_keywords']) ? $data['seo_keywords'] : 'MKWK Unindra, Berita Kampus';

include 'includes/header.php'; 
?>

<nav class="flex mb-8" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white px-5 py-3 rounded-xl shadow-sm border border-gray-100 w-full">
    <li class="inline-flex items-center">
      <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Beranda
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="<?php echo $data['kategori'] == 'Kegiatan' ? 'kegiatan.php' : 'berita.php'; ?>" class="ml-1 text-sm font-medium text-gray-500 hover:text-blue-600 md:ml-2"><?php echo $data['kategori']; ?></a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 truncate max-w-xs"><?php echo $data['judul']; ?></span>
      </div>
    </li>
  </ol>
</nav>

<article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-12">
    <img src="assets/img/uploads/<?php echo $data['gambar_thumbnail']; ?>" class="w-full h-64 md:h-96 object-cover" alt="<?php echo $data['judul']; ?>">
    
    <div class="p-8 md:p-12">
        <div class="flex items-center text-sm text-gray-500 mb-6">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <?php echo date('d F Y, H:i', strtotime($data['tanggal_post'])); ?> WIB
            <span class="mx-3">•</span>
            <span class="bg-gray-100 px-3 py-1 rounded-full font-semibold"><?php echo $data['kategori']; ?></span>
        </div>

        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-8 leading-tight"><?php echo $data['judul']; ?></h1>
        
        <div class="rich-text text-gray-800">
            <?php echo $data['isi_konten']; ?>
        </div>
    </div>
</article>

<div class="text-center mb-8">
    <a href="<?php echo $data['kategori'] == 'Kegiatan' ? 'kegiatan.php' : 'berita.php'; ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-bold rounded-xl text-blue-700 bg-blue-100 hover:bg-blue-200 transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<?php include 'includes/footer.php'; ?>