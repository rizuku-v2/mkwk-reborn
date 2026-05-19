<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['peserta']) || !isset($_POST['jawaban'])) {
    header("Location: tes.php");
    exit;
}

$npm = $_SESSION['peserta']['npm'];
$id_matkul = $_SESSION['peserta']['id_matkul'];
$jawaban_peserta = $_POST['jawaban'];

$benar = 0; $salah = 0; $kosong = 0; $total_soal = 0;

$query_soal = mysqli_query($conn, "SELECT id, kunci_jawaban FROM soal_ujian WHERE id_matkul = $id_matkul");
$total_soal = mysqli_num_rows($query_soal);

if ($total_soal > 0) {
    while ($row = mysqli_fetch_assoc($query_soal)) {
        $id_soal = $row['id'];
        $kunci = $row['kunci_jawaban'];
        
        if (isset($jawaban_peserta[$id_soal])) {
            if ($jawaban_peserta[$id_soal] == $kunci) { $benar++; } else { $salah++; }
        } else { $kosong++; }
    }
    $skor = round(($benar / $total_soal) * 100);
} else {
    $skor = 0;
}

mysqli_query($conn, "INSERT INTO hasil_ujian (npm, id_matkul, skor) VALUES ('$npm', $id_matkul, '$skor')");

unset($_SESSION['peserta']);
?>

<?php include 'includes/header.php'; ?>

<div class="max-w-3xl mx-auto px-4 py-12 min-h-[70vh] flex items-center justify-center">
    <div class="bg-white w-full rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12 text-center relative overflow-hidden">
        <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2 relative z-10">Ujian Selesai!</h1>
        <p class="text-gray-500 mb-8 relative z-10">Jawaban Anda telah berhasil dievaluasi dan disimpan ke sistem.</p>
        
        <div class="bg-gray-50 rounded-2xl p-6 mb-8 border border-gray-200 relative z-10">
            <div class="text-7xl font-black <?php echo $skor >= 70 ? 'text-blue-600' : 'text-red-600'; ?> mb-2"><?php echo $skor; ?></div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Skor Akhir Anda</div>
        </div>
        
        <div class="grid grid-cols-3 gap-4 mb-10 relative z-10">
            <div class="bg-white border border-gray-200 p-4 rounded-xl shadow-sm">
                <div class="text-3xl font-bold text-green-600"><?php echo $benar; ?></div>
                <div class="text-xs text-gray-500 font-medium uppercase tracking-wide mt-1">Benar</div>
            </div>
            <div class="bg-white border border-gray-200 p-4 rounded-xl shadow-sm">
                <div class="text-3xl font-bold text-red-600"><?php echo $salah; ?></div>
                <div class="text-xs text-gray-500 font-medium uppercase tracking-wide mt-1">Salah</div>
            </div>
            <div class="bg-white border border-gray-200 p-4 rounded-xl shadow-sm">
                <div class="text-3xl font-bold text-yellow-600"><?php echo $kosong; ?></div>
                <div class="text-xs text-gray-500 font-medium uppercase tracking-wide mt-1">Kosong</div>
            </div>
        </div>
        <a href="tes.php" class="inline-block w-full sm:w-auto px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform hover:-translate-y-1 relative z-10">Kembali ke Portal Tes</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var end = Date.now() + (3 * 1000);
        (function frame() {
            confetti({ particleCount: 5, angle: 60, spread: 55, origin: { x: 0 }, colors: ['#2563eb', '#16a34a', '#fbbf24'] });
            confetti({ particleCount: 5, angle: 120, spread: 55, origin: { x: 1 }, colors: ['#2563eb', '#16a34a', '#fbbf24'] });
            if (Date.now() < end) { requestAnimationFrame(frame); }
        }());
    });
</script>
<?php include 'includes/footer.php'; ?>