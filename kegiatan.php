<?php 
include 'includes/db.php';
include 'includes/header.php'; 
?>

<div class="bg-blue-50 rounded-3xl py-12 px-4 sm:px-6 lg:px-8 text-center mb-12 shadow-sm border border-blue-100">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Kegiatan & Workshop</h1>
    <p class="text-lg text-blue-800 max-w-2xl mx-auto font-medium">Jadwal kegiatan akademik, seminar nasional, dan workshop interaktif mahasiswa MKWK.</p>
</div>

<div class="max-w-5xl mx-auto mb-12 space-y-6">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM berita WHERE kategori = 'Kegiatan' ORDER BY id DESC");
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)) {
            $tgl = strtotime($row['tanggal_post']);
            $hari = date('d', $tgl);
            $bulan = date('M', $tgl);
            $tahun = date('Y', $tgl);

            echo '<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 hover:shadow-lg transition-shadow">';
            echo '<div class="w-full md:w-48 h-32 bg-blue-100 rounded-xl flex flex-col items-center justify-center text-blue-600 flex-shrink-0 shadow-inner">';
            echo '<span class="text-sm font-bold uppercase tracking-wider mb-1">'.$bulan.'</span>';
            echo '<span class="text-5xl font-black">'.$hari.'</span>';
            echo '<span class="text-sm font-semibold mt-1">'.$tahun.'</span>';
            echo '</div>';
            echo '<div class="flex-grow text-center md:text-left">';
            echo '<div class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full mb-3 border border-blue-200">Kegiatan Baru</div>';
            echo '<h3 class="text-2xl font-bold text-gray-900 mb-2">'.$row['judul'].'</h3>';
            echo '<p class="text-gray-600 mb-4 line-clamp-2">'.$row['cuplikan'].'</p>';
            echo '</div>';
            echo '<div class="w-full md:w-auto flex-shrink-0">';
            echo '<a href="detail-berita.php?id='.$row['id'].'" class="block w-full text-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md transition-transform hover:-translate-y-1">Lihat Detail</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="text-center py-12 text-gray-500 text-lg bg-white rounded-3xl border border-gray-100">Belum ada jadwal kegiatan atau workshop saat ini.</div>';
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>