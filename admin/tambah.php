<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';

$success = false;
$error = false;

if (isset($_POST['submit'])) {
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $cuplikan = mysqli_real_escape_string($conn, $_POST['cuplikan']);
    // Mengizinkan raw HTML/CSS/JS tanpa filter pembersih tag
    $isi_konten = mysqli_real_escape_string($conn, $_POST['isi_konten']);
    
    // Logika Metode Gambar Fleksibel
    $metode_gambar = $_POST['metode_gambar'];
    $nama_baru = '';

    if ($metode_gambar == 'upload' && isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
        $nama_file = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $ekstensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = time() . '.' . $ekstensi;
        $tujuan = '../assets/img/uploads/' . $nama_baru;

        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        if (in_array(strtolower($ekstensi), $allowed)) {
            if (!is_dir('../assets/img/uploads/')) { mkdir('../assets/img/uploads/', 0777, true); }
            if (!move_uploaded_file($tmp_name, $tujuan)) {
                $error = "Gagal mengunggah gambar lokal.";
            }
        } else {
            $error = "Format gambar tidak didukung.";
        }
    } elseif ($metode_gambar == 'url' && !empty($_POST['gambar_url'])) {
        $nama_baru = mysqli_real_escape_string($conn, $_POST['gambar_url']);
    } else {
        $nama_baru = ''; // Mode Tanpa Gambar
    }

    if (!$error) {
        $query = "INSERT INTO berita (kategori, judul, gambar_thumbnail, cuplikan, isi_konten, tanggal_post) 
                  VALUES ('$kategori', '$judul', '$nama_baru', '$cuplikan', '$isi_konten', NOW())";
        if (mysqli_query($conn, $query)) {
            $success = true;
        } else {
            $error = "Gagal menyimpan ke database.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Postingan - Dark Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans">
    
    <nav class="bg-gray-800 border-b border-gray-700 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold flex items-center gap-3">
                <img src="../assets/img/header.png" class="h-8 bg-white rounded p-1" alt="Logo"> Panel Admin
            </h1>
            <a href="index.php" class="text-gray-300 hover:text-white font-medium transition-colors">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto p-4 md:p-6 mt-6 mb-12">
        <div class="bg-gray-800 rounded-2xl shadow-2xl overflow-hidden border border-gray-700 p-6 md:p-8">
            <h2 class="text-2xl font-bold mb-6 text-white border-b border-gray-700 pb-4">Tulis Postingan Baru</h2>
            
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-6" id="formPost">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-2">Kategori Postingan</label>
                        <select name="kategori" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" required>
                            <option value="Berita">Berita & Pengumuman</option>
                            <option value="Kegiatan">Kegiatan & Workshop</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-2">Judul Postingan</label>
                        <input type="text" name="judul" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" required placeholder="Masukkan judul...">
                    </div>
                </div>

                <div class="bg-gray-900/50 p-5 rounded-xl border border-gray-700">
                    <label class="block text-sm font-bold text-blue-400 mb-3">Metode Gambar Thumbnail</label>
                    <select name="metode_gambar" id="metode_gambar" class="w-full px-4 py-2.5 rounded-lg bg-gray-800 border border-gray-600 text-white mb-4 focus:ring-2 focus:ring-blue-500" onchange="toggleImageInput()">
                        <option value="upload">Upload File Lokal (Laptop/HP)</option>
                        <option value="url">Gunakan Link URL Gambar (Online)</option>
                        <option value="none">Tanpa Gambar (Warna Solid CSS Berinisial)</option>
                    </select>

                    <div id="input_upload">
                        <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2 bg-gray-800 rounded-lg border border-gray-600 text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                    </div>
                    
                    <div id="input_url" class="hidden">
                        <input type="url" name="gambar_url" placeholder="Contoh: https://example.com/gambar.jpg" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2">Cuplikan Singkat (Ditampilkan di Kartu Depan)</label>
                    <textarea name="cuplikan" rows="3" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-600 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" required placeholder="Tuliskan 1-2 kalimat menarik..."></textarea>
                </div>

                <div class="pt-2">
                    <div class="flex items-end justify-between mb-2">
                        <label class="block text-sm font-bold text-gray-300">Isi Konten Lengkap</label>
                        <div class="flex bg-gray-900 rounded-t-lg overflow-hidden border-t border-l border-r border-gray-600">
                            <button type="button" id="btnVisual" onclick="toggleMode('visual')" class="px-5 py-2 text-sm font-bold bg-blue-600 text-white transition-colors focus:outline-none">
                                Visual (WYSIWYG)
                            </button>
                            <button type="button" id="btnHtml" onclick="toggleMode('html')" class="px-5 py-2 text-sm font-bold bg-gray-700 text-gray-400 hover:text-white transition-colors focus:outline-none">
                                Text (Raw HTML/JS)
                            </button>
                        </div>
                    </div>
                    
                    <div class="relative w-full">
                        <textarea name="isi_konten" id="editor" class="w-full px-4 py-4 min-h-[500px] bg-gray-900 border border-gray-600 rounded-b-xl rounded-tl-xl text-green-400 font-mono text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"></textarea>
                    </div>
                </div>

                <button type="submit" name="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg transition-transform hover:-translate-y-1 mt-6 border border-blue-500">
                    🚀 Publikasikan Postingan
                </button>
            </form>
        </div>
    </div>

    <script>
        // Logika Dropdown Metode Gambar
        function toggleImageInput() {
            let metode = document.getElementById('metode_gambar').value;
            document.getElementById('input_upload').classList.toggle('hidden', metode !== 'upload');
            document.getElementById('input_url').classList.toggle('hidden', metode !== 'url');
        }

        // Logika Tab Visual vs Raw HTML (Ala WordPress)
        let isVisualMode = false;

        function initVisual() {
            tinymce.init({
                selector: '#editor',
                skin: 'oxide-dark',      // Tema gelap bawaan TinyMCE
                content_css: 'dark',     // Tema gelap bawaan TinyMCE
                height: 500,
                menubar: false,
                plugins: 'lists link image table code media',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | removeformat | code',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save(); // Otomatis sync ke raw textarea setiap ada perubahan
                    });
                }
            });
        }

        function toggleMode(mode) {
            const btnVisual = document.getElementById('btnVisual');
            const btnHtml = document.getElementById('btnHtml');
            const editorTextarea = document.getElementById('editor');

            if (mode === 'visual' && !isVisualMode) {
                isVisualMode = true;
                
                // Styling Tab
                btnVisual.className = "px-5 py-2 text-sm font-bold bg-blue-600 text-white transition-colors focus:outline-none";
                btnHtml.className = "px-5 py-2 text-sm font-bold bg-gray-700 text-gray-400 hover:text-white transition-colors focus:outline-none";
                
                // Inisiasi Visual Editor
                initVisual();
            } 
            else if (mode === 'html' && isVisualMode) {
                isVisualMode = false;
                
                // Styling Tab
                btnHtml.className = "px-5 py-2 text-sm font-bold bg-blue-600 text-white transition-colors focus:outline-none";
                btnVisual.className = "px-5 py-2 text-sm font-bold bg-gray-700 text-gray-400 hover:text-white transition-colors focus:outline-none";
                
                // Matikan Visual Editor, kembalikan ke Textarea Raw
                tinymce.remove('#editor');
            }
        }

        // Panggil mode Visual saat halaman pertama kali dimuat
        window.onload = function() {
            toggleMode('visual');
        };
    </script>

    <?php if ($success): ?>
    <script>
        Swal.fire({
            icon: 'success', 
            title: 'Berhasil!', 
            text: 'Postingan telah dipublikasikan ke database.',
            background: '#1f2937', color: '#f3f4f6', confirmButtonColor: '#3b82f6',
            customClass: { popup: 'border border-gray-700 rounded-2xl' }
        }).then(() => { window.location.href = 'index.php'; });
    </script>
    <?php endif; ?>
    <?php if ($error): ?>
    <script>
        Swal.fire({
            icon: 'error', 
            title: 'Gagal Menyimpan!', 
            text: '<?php echo $error; ?>',
            background: '#1f2937', color: '#f3f4f6', confirmButtonColor: '#ef4444',
            customClass: { popup: 'border border-gray-700 rounded-2xl' }
        });
    </script>
    <?php endif; ?>
</body>
</html>