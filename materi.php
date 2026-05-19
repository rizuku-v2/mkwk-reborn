<?php include 'includes/header.php'; ?>

<style>
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 8px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 8px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

<div class="bg-blue-50 rounded-3xl py-12 px-4 sm:px-6 lg:px-8 text-center mb-12 shadow-sm border border-blue-100">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Materi Perkuliahan</h1>
    <p class="text-lg text-blue-800 max-w-2xl mx-auto font-medium">Akses Rencana Pembelajaran Semester (RPS) serta modul tiap pertemuan langsung dari server pusat.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-12 items-start">
    
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all">
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Pendidikan Agama</h3>
        <p class="text-sm text-gray-500 mb-4 h-10">Modul keagamaan dan etika moral.</p>
        
        <details class="group">
            <summary class="cursor-pointer flex justify-between items-center bg-gray-50 hover:bg-blue-600 hover:text-white text-blue-600 font-semibold py-2 px-4 rounded-lg transition-colors border border-gray-200 hover:border-blue-600">
                <span>Buka Materi</span>
                <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </summary>
            <div class="mt-3 space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                <a href="https://mkwk.unindra.ac.id/media/rpsa.pdf" target="_blank" rel="noopener noreferrer" class="block p-3 text-sm font-bold bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg border border-blue-100">RPS Agama 2023-2024</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/1.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P1 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/2.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P2 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/3.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P3 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/4.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P4 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/5.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P5 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/6.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P6 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/7.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P7 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/8.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P8 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/9.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P9 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/10.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P10 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P11 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/12.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P12 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/13.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P13 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/14.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P14 Agama</a>
                <a href="https://mkwk.unindra.ac.id/media/agama/16.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P15 Agama</a>
            </div>
        </details>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all">
        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Bahasa Indonesia</h3>
        <p class="text-sm text-gray-500 mb-4 h-10">Tata bahasa, penulisan karya ilmiah.</p>
        
        <details class="group">
            <summary class="cursor-pointer flex justify-between items-center bg-gray-50 hover:bg-green-600 hover:text-white text-green-600 font-semibold py-2 px-4 rounded-lg transition-colors border border-gray-200 hover:border-green-600">
                <span>Buka Materi</span>
                <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </summary>
            <div class="mt-3 space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                <a href="https://mkwk.unindra.ac.id/media/rps.pdf" target="_blank" rel="noopener noreferrer" class="block p-3 text-sm font-bold bg-green-50 text-green-700 hover:bg-green-100 rounded-lg border border-green-100">RPS B. Indonesia 23-24</a>
                <a href="https://mkwk.unindra.ac.id/media/p1.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P1 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p2.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P2 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p3.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P3 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p4.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P4 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p5.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P5 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p6.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P6 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p7.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P7 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p9.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P9 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p10.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P10 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p11.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P11 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p12.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P12 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p13.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P13 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p14.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P14 Bahasa Indonesia</a>
                <a href="https://mkwk.unindra.ac.id/media/p15.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P15 Bahasa Indonesia</a>
            </div>
        </details>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all">
        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Pancasila</h3>
        <p class="text-sm text-gray-500 mb-4 h-10">Falsafah dan ideologi negara.</p>
        
        <details class="group">
            <summary class="cursor-pointer flex justify-between items-center bg-gray-50 hover:bg-red-600 hover:text-white text-red-600 font-semibold py-2 px-4 rounded-lg transition-colors border border-gray-200 hover:border-red-600">
                <span>Buka Materi</span>
                <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </summary>
            <div class="mt-3 space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                <a href="https://mkwk.unindra.ac.id/media/rpsp.pdf" target="_blank" rel="noopener noreferrer" class="block p-3 text-sm font-bold bg-red-50 text-red-700 hover:bg-red-100 rounded-lg border border-red-100">RPS Pancasila 2023-2024</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/1.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P1 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/2.pdf" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P2 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/3.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P3 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/4.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P4 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/5.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P5 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/6.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P6 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/7.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P7 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/8.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P8 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/9.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P9 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/10.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P10 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P11 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/12.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P12 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/13.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P13 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/14.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P14 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/15.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P15 Pancasila</a>
                <a href="https://mkwk.unindra.ac.id/media/pancasila/16.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P16 Pancasila</a>
            </div>
        </details>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all">
        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Kewarganegaraan</h3>
        <p class="text-sm text-gray-500 mb-4 h-10">Hak, kewajiban, dan ketahanan nasional.</p>
        
        <details class="group">
            <summary class="cursor-pointer flex justify-between items-center bg-gray-50 hover:bg-yellow-500 hover:text-white text-yellow-600 font-semibold py-2 px-4 rounded-lg transition-colors border border-gray-200 hover:border-yellow-500">
                <span>Buka Materi</span>
                <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </summary>
            <div class="mt-3 space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                <a href="https://mkwk.unindra.ac.id/media/rpsk.pdf" target="_blank" rel="noopener noreferrer" class="block p-3 text-sm font-bold bg-yellow-50 text-yellow-700 hover:bg-yellow-100 rounded-lg border border-yellow-100">RPS KWN 2023-2024</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn1.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P1 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn2.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P2 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn3.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P3 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn4.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P4 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn5.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P5 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn6.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P6 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn7.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P7 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn9.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P9 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn10.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P10 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P11 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P12 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P13 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P14 Kewarganegaraan</a>
                <a href="https://mkwk.unindra.ac.id/media/mtrkwn11.pptx" target="_blank" rel="noopener noreferrer" class="block p-2 text-sm text-gray-700 hover:bg-gray-100 rounded border border-gray-100">P15 Kewarganegaraan</a>
            </div>
        </details>
    </div>
</div>

<?php include 'includes/footer.php'; ?>