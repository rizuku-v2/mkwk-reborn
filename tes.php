<?php 
include 'includes/db.php';
include 'includes/header.php'; 

// Ambil data mata kuliah yang berstatus aktif
$query_matkul = mysqli_query($conn, "SELECT * FROM mata_kuliah WHERE status = 'aktif' ORDER BY id ASC");
?>

<div class="bg-blue-50 rounded-3xl py-12 px-4 sm:px-6 lg:px-8 text-center mb-12 shadow-sm border border-blue-100">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Portal Tes & Evaluasi</h1>
    <p class="text-lg text-blue-800 max-w-2xl mx-auto font-medium">Sistem evaluasi akademik terintegrasi untuk mahasiswa Universitas Indraprasta PGRI.</p>
</div>

<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
    <?php if (mysqli_num_rows($query_matkul) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($query_matkul)): 
            $id_matkul = $row['id'];
            
            // Hitung jumlah soal yang tersedia untuk mata kuliah ini
            $q_soal = mysqli_query($conn, "SELECT COUNT(id) as total FROM soal_ujian WHERE id_matkul = $id_matkul");
            $total_soal = mysqli_fetch_assoc($q_soal)['total'];
        ?>
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 flex flex-col h-full hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs font-bold px-4 py-1 rounded-bl-xl z-10">Wajib</div>
            
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900 leading-tight"><?php echo htmlspecialchars($row['nama_matkul']); ?></h2>
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 ml-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            
            <div class="bg-gray-50 p-5 rounded-xl mb-6 border border-gray-200">
                <div class="flex justify-between text-sm mb-3">
                    <span class="text-gray-500 font-medium">Status:</span>
                    <span class="text-green-600 font-bold flex items-center"><span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>Tersedia</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="text-gray-500 font-medium">Batas Waktu:</span>
                    <span class="text-gray-800 font-bold">60 Menit</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500 font-medium">Jumlah Soal:</span>
                    <span class="text-gray-800 font-bold"><?php echo $total_soal; ?> Soal</span>
                </div>
            </div>

            <?php if ($total_soal > 0): ?>
                <form action="mulai_ujian.php" method="POST" id="form-ujian-<?php echo $id_matkul; ?>" class="space-y-4 mb-6 mt-auto">
                    <input type="hidden" name="id_matkul" value="<?php echo $id_matkul; ?>">
                    <input type="hidden" name="nama_matkul" value="<?php echo htmlspecialchars($row['nama_matkul']); ?>">
                    <div>
                        <input type="number" name="npm" placeholder="Masukkan NPM Anda" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white text-sm">
                    </div>
                    <div>
                        <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white text-sm">
                    </div>
                </form>
                
                <button type="button" onclick="validasiDanMulai('form-ujian-<?php echo $id_matkul; ?>')" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform hover:-translate-y-1 mt-auto">Mulai Ujian</button>
            <?php else: ?>
                <div class="mt-auto">
                    <div class="bg-red-50 text-red-600 text-sm font-bold p-3 rounded-lg text-center mb-4 border border-red-100">Soal belum ditambahkan oleh Admin</div>
                    <button disabled class="w-full py-4 bg-gray-200 text-gray-500 font-bold rounded-xl cursor-not-allowed border border-gray-300">Belum Tersedia</button>
                </div>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-span-1 md:col-span-2 text-center py-16 bg-white rounded-3xl border border-gray-100">
            <div class="w-20 h-20 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Ujian Aktif</h3>
            <p class="text-gray-500">Silakan hubungi dosen/admin untuk membuka sesi ujian.</p>
        </div>
    <?php endif; ?>
</div>

<script>
function validasiDanMulai(formId) {
    const form = document.getElementById(formId);
    const npm = form.querySelector('input[name="npm"]').value;
    const nama = form.querySelector('input[name="nama"]').value;
    
    if(!npm || !nama) {
        Swal.fire({icon: 'error', title: 'Akses Ditolak', text: 'NPM dan Nama wajib diisi sebelum memulai ujian!', confirmButtonColor: '#2563eb'});
        return;
    }
    
    Swal.fire({
        title: 'Konfirmasi Identitas',
        html: `Pastikan data Anda sudah benar:<br><br><b>NPM:</b> ${npm}<br><b>Nama:</b> ${nama}`,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#16a34a',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Mulai Ujian!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) { form.submit(); }
    });
}
</script>

<?php include 'includes/footer.php'; ?>