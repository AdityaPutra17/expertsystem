@extends('admin.tamplate')
@section('title', 'Admin - Home')

@section("content")
    <h1 class="text-4xl font-bold text-blue-500 pb-5">Dashboard</h1>

    <div class="flex mb-5">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-1/4 mr-5">
            <h2 class="text-xl font-semibold text-gray-700">Total Penyakit</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalPenyakit }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-1/4 mr-5">
            <h2 class="text-xl font-semibold text-gray-700">Total Gejala</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalGejala }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-1/4 mr-5">
            <h2 class="text-xl font-semibold text-gray-700">Total Aturan</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalAturan }}</p>
        </div>    
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-1/4">
            <h2 class="text-xl font-semibold text-gray-700">Total Diagnosis</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalDiagnosa }}</p>
        </div>    
    </div>

    <div class="flex gap-5">
        
        <div class="bg-white p-4 rounded-lg shadow-lg mt-6 w-1/2">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Panduan Penggunaan</h2>
            <div class="space-y-4">
                
                <div class="bg-white shadow-md rounded-lg">
                    <button class="w-full text-left p-4 text-lg font-semibold flex justify-between items-center border-b" onclick="toggleAccordion('section1')">
                        📋 Mengelola Data Gejala
                        <span class="toggle-icon">+</span>
                    </button>
                    <div id="section1" class="hidden p-4">
                        <p>Admin dapat menambah, mengedit, dan menghapus data gejala melalui menu <strong>Gejala</strong> di sidebar.</p>
                    </div>
                </div>
    
                <div class="bg-white shadow-md rounded-lg">
                    <button class="w-full text-left p-4 text-lg font-semibold flex justify-between items-center border-b" onclick="toggleAccordion('section2')">
                        🏥 Mengelola Data Penyakit
                        <span class="toggle-icon">+</span>
                    </button>
                    <div id="section2" class="hidden p-4">
                        <p>Penyakit yang terdaftar dalam sistem bisa dikelola melalui menu <strong>Penyakit</strong> di halaman admin.</p>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-lg">
                    <button class="w-full text-left p-4 text-lg font-semibold flex justify-between items-center border-b" onclick="toggleAccordion('section3')">
                        📚 Mengelola Data Aturan
                        <span class="toggle-icon">+</span>
                    </button>
                    <div id="section3" class="hidden p-4">
                        <p>Aturan yang terdaftar dalam sistem bisa dikelola melalui menu <strong>Aturan</strong> di halaman admin.</p>
                    </div>
                </div>
    
                <div class="bg-white shadow-md rounded-lg">
                    <button class="w-full text-left p-4 text-lg font-semibold flex justify-between items-center border-b" onclick="toggleAccordion('section4')">
                        🩺 Melakukan Diagnosa
                        <span class="toggle-icon">+</span>
                    </button>
                    <div id="section4" class="hidden p-4">
                        <p>Pengguna dapat melakukan diagnosa dengan mengakses halaman utama, memasukkan nama, dan menjawab pertanyaan gejala.</p>
                    </div>
                </div>
    
                <div class="bg-white shadow-md rounded-lg">
                    <button class="w-full text-left p-4 text-lg font-semibold flex justify-between items-center border-b" onclick="toggleAccordion('section5')">
                        📊 Melihat Hasil Diagnosa
                        <span class="toggle-icon">+</span>
                    </button>
                    <div id="section5" class="hidden p-4">
                        <p>Setelah proses diagnosa selesai, hasilnya akan ditampilkan dan bisa disimpan oleh pengguna.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-lg mt-6 w-1/2">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Statistik Diagnosa</h2>
            <canvas id="diagnosisChart"></canvas>
        </div>
        
    </div>
 
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('diagnosisChart').getContext('2d');
            const diagnosisChart = new Chart(ctx, {
                type: 'line', // Bisa ganti ke 'pie' untuk pie chart
                data: {
                    labels: {!! json_encode($labels) !!}, // Nama penyakit
                    datasets: [{
                        label: 'Jumlah Diagnosis',
                        data: {!! json_encode($data) !!}, // Jumlah orang
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    <script>
        function toggleAccordion(id) {
            const section = document.getElementById(id);
            section.classList.toggle("hidden");
        }
    </script>
@endsection