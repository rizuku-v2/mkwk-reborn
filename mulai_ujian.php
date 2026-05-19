<?php
session_start();
include 'includes/db.php';

if (!isset($_POST['npm']) || !isset($_POST['nama']) || !isset($_POST['id_matkul'])) {
    header("Location: tes.php");
    exit;
}

$npm = mysqli_real_escape_string($conn, $_POST['npm']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$id_matkul = (int)$_POST['id_matkul'];
$nama_matkul = mysqli_real_escape_string($conn, $_POST['nama_matkul']);

$cek_mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
if (mysqli_num_rows($cek_mhs) == 0) {
    mysqli_query($conn, "INSERT INTO mahasiswa (npm, nama) VALUES ('$npm', '$nama')");
} else {
    mysqli_query($conn, "UPDATE mahasiswa SET nama = '$nama' WHERE npm = '$npm'");
}

$_SESSION['peserta'] = ['npm' => $npm, 'nama' => $nama, 'id_matkul' => $id_matkul, 'nama_matkul' => $nama_matkul];

$soal_query = mysqli_query($conn, "SELECT * FROM soal_ujian WHERE id_matkul = $id_matkul ORDER BY RAND()");
$total_soal = mysqli_num_rows($soal_query);

if ($total_soal == 0) {
    echo "<script>alert('Mohon maaf, soal ujian belum tersedia di database.'); window.location.href='tes.php';</script>";
    exit;
}

$waktu_menit = 120; // Default 60 Menit
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian - <?php echo $nama_matkul; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .sticky-header { position: sticky; top: 0; z-index: 50; }
        .radio-custom:checked + div { border-color: #2563eb; background-color: #eff6ff; }
        .radio-custom:checked + div .radio-circle { background-color: #2563eb; border-color: #2563eb; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-blue-200">

    <div class="sticky-header bg-white shadow-sm border-b border-gray-200 py-4 px-6 mb-8">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-xl font-bold text-gray-900"><?php echo htmlspecialchars($nama_matkul); ?></h1>
                <p class="text-sm text-gray-500 font-medium mt-1">Peserta: <span class="text-blue-600 font-bold"><?php echo htmlspecialchars($nama); ?></span> (<?php echo htmlspecialchars($npm); ?>)</p>
            </div>
            <div class="bg-red-50 text-red-600 border border-red-100 px-6 py-2 rounded-xl flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-bold text-lg tracking-widest" id="timer">00:00:00</span>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 mb-16">
        <form action="proses_ujian.php" method="POST" id="form-lembar-jawaban">
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($soal_query)): 
            ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 mb-6">
                <div class="flex items-start mb-6">
                    <div class="bg-blue-100 text-blue-700 font-bold rounded-lg px-3 py-1 mr-4 text-sm mt-1"><?php echo $no; ?></div>
                    <h3 class="text-lg font-medium text-gray-900 leading-relaxed"><?php echo nl2br(htmlspecialchars($row['pertanyaan'])); ?></h3>
                </div>

                <div class="space-y-3 pl-0 md:pl-12">
                    <?php 
                    $opsi = ['A' => $row['opsi_a'], 'B' => $row['opsi_b'], 'C' => $row['opsi_c'], 'D' => $row['opsi_d']];
                    foreach ($opsi as $huruf => $teks): 
                    ?>
                    <label class="block cursor-pointer group">
                        <input type="radio" name="jawaban[<?php echo $row['id']; ?>]" value="<?php echo $huruf; ?>" class="peer sr-only radio-custom">
                        <div class="flex items-center p-4 border border-gray-200 rounded-xl transition-all hover:bg-gray-50 peer-focus:ring-2 peer-focus:ring-blue-500">
                            <div class="w-5 h-5 rounded-full border-2 border-gray-300 mr-4 flex-shrink-0 radio-circle transition-colors relative">
                                <div class="absolute inset-0 m-auto w-2 h-2 rounded-full bg-white"></div>
                            </div>
                            <span class="text-gray-700 font-medium select-none"><strong class="mr-2"><?php echo $huruf; ?>.</strong> <?php echo htmlspecialchars($teks); ?></span>
                        </div>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php $no++; endwhile; ?>

            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 md:p-8 flex flex-col sm:flex-row items-center justify-between mt-8 shadow-sm">
                <div class="mb-4 sm:mb-0 text-center sm:text-left">
                    <h4 class="font-bold text-gray-900 text-lg">Selesai Mengerjakan?</h4>
                    <p class="text-sm text-gray-600 mt-1">Pastikan semua jawaban telah terisi sebelum mengumpulkan.</p>
                </div>
                <button type="button" onclick="konfirmasiKirim()" class="w-full sm:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform hover:-translate-y-1">Kumpulkan Ujian</button>
            </div>
        </form>
    </div>

    <script>
        let totalTime = <?php echo $waktu_menit * 60; ?>;
        function updateTimer() {
            let hours = Math.floor(totalTime / 3600), minutes = Math.floor((totalTime % 3600) / 60), seconds = totalTime % 60;
            document.getElementById('timer').textContent = String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
            if (totalTime <= 0) {
                clearInterval(timerInterval);
                Swal.fire({title: 'Waktu Habis!', text: 'Sistem akan otomatis mengirimkan jawaban Anda.', icon: 'info', showConfirmButton: false, allowOutsideClick: false, timer: 3000}).then(() => { document.getElementById('form-lembar-jawaban').submit(); });
            } else { totalTime--; }
        }
        let timerInterval = setInterval(updateTimer, 1000); updateTimer();

        function konfirmasiKirim() {
            Swal.fire({title: 'Kumpulkan Jawaban?', text: 'Periksa kembali jawaban Anda. Aksi ini tidak dapat dibatalkan.', icon: 'question', showCancelButton: true, confirmButtonColor: '#2563eb', cancelButtonColor: '#dc2626', confirmButtonText: 'Ya, Kirim Sekarang!', cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({title: 'Memproses...', allowOutsideClick: false, didOpen: () => { Swal.showLoading(); }});
                    document.getElementById('form-lembar-jawaban').submit();
                }
            });
        }
    </script>
</body>
</html>