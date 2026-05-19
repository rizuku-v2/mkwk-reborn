<?php include 'includes/header.php'; ?>

<div class="relative bg-white rounded-3xl shadow-sm border border-gray-100 mb-12 p-6 md:p-12 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        
        <div class="relative z-10 text-center lg:text-left order-2 lg:order-1">
            <div class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-xs md:text-sm font-bold rounded-full mb-6 border border-blue-100">
                🚀 Portal Akademik Resmi
            </div>
            <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl mb-6">
                Selamat Datang di <br class="hidden md:block">
                <span class="text-blue-600 mt-2">MKWK Unindra</span>
            </h1>
            <p class="text-sm md:text-lg text-gray-600 leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                Pusat informasi terpadu, materi pembelajaran, dan panduan Mata Kuliah Wajib Kurikulum (MKWK) Universitas Indraprasta PGRI.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="materi.php" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 transition-all transform hover:-translate-y-1 shadow-lg shadow-blue-500/30">
                    Mulai Belajar
                </a>
                <a href="panduan.php" class="inline-flex items-center justify-center px-8 py-3.5 border border-gray-200 text-base font-bold rounded-xl text-gray-700 bg-gray-50 hover:bg-gray-100 transition-all transform hover:-translate-y-1">
                    Lihat Panduan
                </a>
            </div>
        </div>

        <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl order-1 lg:order-2 group bg-gray-200" style="aspect-ratio: 16/9; min-height: 250px;">
            <div id="slider" class="relative w-full h-full bg-gray-100">
                <img src="https://mkwk.unindra.ac.id/media/slide1_Revisi.jpg" class="slide-item absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 bg-gray-200" alt="Slide 1" onerror="this.onerror=null; this.src='https://placehold.co/1280x720/e2e8f0/64748b?text=Gambar+Gagal+Dimuat';">
                <img src="https://mkwk.unindra.ac.id/media/slide2.jpg" class="slide-item absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 bg-gray-200" alt="Slide 2" onerror="this.onerror=null; this.src='https://placehold.co/1280x720/e2e8f0/64748b?text=Gambar+Gagal+Dimuat';">
                <img src="https://mkwk.unindra.ac.id/media/slide3.jpg" class="slide-item absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 bg-gray-200" alt="Slide 3" onerror="this.onerror=null; this.src='https://placehold.co/1280x720/e2e8f0/64748b?text=Gambar+Gagal+Dimuat';">
            </div>
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent pointer-events-none"></div>

            <button onclick="prevSlide()" class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-black/30 hover:bg-black/60 backdrop-blur-md text-white rounded-full z-30 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-all duration-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <button onclick="nextSlideManual()" class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-black/30 hover:bg-black/60 backdrop-blur-md text-white rounded-full z-30 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-all duration-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-3 z-20">
                <button class="indicator w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-white opacity-100 transition-opacity focus:outline-none" onclick="goToSlide(0)"></button>
                <button class="indicator w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity focus:outline-none" onclick="goToSlide(1)"></button>
                <button class="indicator w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity focus:outline-none" onclick="goToSlide(2)"></button>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
    <a href="profil.php" class="block p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-2 group">
        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 text-blue-600 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Profil MKWK</h3>
        <p class="text-gray-500 text-sm">Visi, misi, dan struktur organisasi MKWK.</p>
    </a>
    <a href="kegiatan.php" class="block p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-2 group">
        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Kegiatan</h3>
        <p class="text-gray-500 text-sm">Jadwal workshop dan aktivitas akademik.</p>
    </a>
    <a href="berita.php" class="block p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-2 group sm:col-span-2 lg:col-span-1">
        <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:scale-110 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Berita Terbaru</h3>
        <p class="text-gray-500 text-sm">Pengumuman dan artikel terkini kampus.</p>
    </a>
</div>

<div class="mb-20">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 px-2 gap-4">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Karya Video Mahasiswa</h2>
            <p class="text-sm md:text-base text-gray-500 mt-1">Hasil kreativitas mahasiswa dalam proyek MKWK berbasis masalah.</p>
        </div>
        <div class="hidden md:block w-20 h-1 bg-blue-600 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        
        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="https://mkwk.unindra.ac.id/media/v1.mp4" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Gagal+Dimuat';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Manfaat Pajak</h4>
        </div>

        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="https://mkwk.unindra.ac.id/media/v2.mp4" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Gagal+Dimuat';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Bijak Bermedia Sosial</h4>
        </div>

        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="https://mkwk.unindra.ac.id/media/v3.mp4" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Gagal+Dimuat';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Jangan Percaya Tukang Parkir</h4>
        </div>

        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="https://mkwk.unindra.ac.id/media/v4.mp4" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Gagal+Dimuat';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Penyuluhan di SMP Al-Athia</h4>
        </div>

        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Kosong';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Video Mahasiswa 5</h4>
        </div>

        <div class="group bg-white p-4 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full rounded-2xl overflow-hidden bg-gray-900 mb-4 shadow-inner" style="aspect-ratio: 16/9; min-height: 180px;">
                <video controls preload="metadata" class="absolute inset-0 w-full h-full object-contain" poster="https://placehold.co/1280x720/1f2937/9ca3af?text=Memuat+Video...">
                    <source src="" type="video/mp4" onerror="this.parentElement.poster='https://placehold.co/1280x720/1f2937/ef4444?text=Video+Kosong';">
                </video>
            </div>
            <h4 class="font-bold text-lg text-gray-900 text-center group-hover:text-blue-600 transition-colors mt-auto">Video Mahasiswa 6</h4>
        </div>

    </div>
</div>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide-item');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = slides.length;
    let slideInterval;

    function updateSlider() {
        slides.forEach((slide, index) => {
            if(index === currentSlide) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100', 'z-10');
                indicators[index].classList.remove('opacity-50');
                indicators[index].classList.add('opacity-100');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0');
                indicators[index].classList.remove('opacity-100');
                indicators[index].classList.add('opacity-50');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function nextSlideManual() {
        nextSlide();
        resetInterval();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
        resetInterval();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
        resetInterval();
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    slideInterval = setInterval(nextSlide, 5000);
</script>

<?php include 'includes/footer.php'; ?>