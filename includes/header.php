<?php
$t = isset($page_title) ? $page_title : 'MKWK Unindra';
$d = isset($meta_desc) ? $meta_desc : 'Pusat informasi terpadu, materi pembelajaran, dan panduan Mata Kuliah Wajib Kurikulum (MKWK) Universitas Indraprasta PGRI.';
$k = isset($meta_keys) ? $meta_keys : 'MKWK, Unindra, Universitas Indraprasta PGRI, Pendidikan Agama, Pancasila, Bahasa Indonesia, Kewarganegaraan';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer">
    <title><?php echo $t; ?></title>
    <meta name="description" content="<?php echo $d; ?>">
    <meta name="keywords" content="<?php echo $k; ?>">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .rich-text h2 { font-size: 1.5rem; font-weight: bold; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .rich-text h3 { font-size: 1.25rem; font-weight: bold; margin-top: 1.25rem; margin-bottom: 0.5rem; }
        .rich-text p { margin-bottom: 1rem; line-height: 1.75; }
        .rich-text ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
        .rich-text ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
        .rich-text a { color: #2563eb; text-decoration: underline; }
        .rich-text strong { font-weight: bold; }
        .rich-text em { font-style: italic; }
        .rich-text blockquote { border-left: 4px solid #e5e7eb; padding-left: 1rem; color: #6b7280; font-style: italic; }
        .ck-editor__editable_inline { min-height: 300px; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 relative">
    <nav class="bg-white shadow-md relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex items-center gap-3">
                    <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none p-1 rounded-md transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <a href="index.php" class="flex-shrink-0 flex items-center">
                        <img class="h-10 w-auto bg-white rounded-lg p-1" src="assets/img/header.png" alt="Logo">
                    </a>
                </div>
                
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Beranda</a>
                    <a href="profil.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Profil</a>
                    <a href="materi.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Materi</a>
                    <a href="panduan.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Panduan</a>
                    <a href="kegiatan.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Kegiatan</a>
                    <a href="tes.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Tes</a>
                    <a href="berita.php" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Berita</a>
                    
                    <a href="pencarian.php" class="text-gray-500 hover:text-blue-600 transition-colors ml-4 border-l-2 pl-6 border-gray-100" title="Cari Informasi">
                        <svg class="w-6 h-6 transform hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </a>
                </div>

                <div class="flex items-center md:hidden">
                    <a href="pencarian.php" class="text-gray-600 hover:text-blue-600 bg-gray-50 hover:bg-gray-100 rounded-full p-2 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </a>
                </div>

            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-lg">
            <div class="px-4 pt-2 pb-6 space-y-1 flex flex-col">
                <a href="index.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Beranda</a>
                <a href="profil.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Profil</a>
                <a href="materi.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Materi</a>
                <a href="panduan.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Panduan</a>
                <a href="kegiatan.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Kegiatan</a>
                <a href="tes.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Tes</a>
                <a href="berita.php" class="block px-3 py-3 rounded-md text-base font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Berita</a>
            </div>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-screen">