@extends('client.tamplate')

@section('content')
<section class="min-h-[500px] flex items-center justify-center">
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg text-center ">
        <h2 class="text-xl font-semibold mb-4">Hasil Diagnosa</h2>
        <p>Dari hasil diagnosa yang dilakukan terdapat 3 Kemungkinan yaitu :</p>

        @if (!empty($detectedDiseases))
            @foreach ($detectedDiseases as $data)
                <div x-data="{open: false}"  class="mt-2 border rounded-xl shadow-lg">
                    <button @click="open = !open" class="text-lg p-4 font-bold text-white bg-blue-700 w-full mx-auto rounded-xl">
                        {{ $data['penyakit']->nama }} 
                        <p class="font-semibold text-green-400 text-sm">Click Untuk Informasi lebih lengkap</p>
                    </button>
                    <div x-show="open" class="p-4 bg-gray-100 border rounded">
                        <p class="text-red-500 font-bold">Deskripsi</p>
                        <p class="text-gray-800 mt-2">{{ $data['penyakit']->deskripsi }}</p>
                        <hr>
                        <p class="mt-2 text-red-500 font-bold">Solusi</p>
                        <p class="text-gray-800 mt-2">{{ $data['penyakit']->solusi }}</p>
                    </div>
                </div>

            @endforeach
        @else
            <p class="text-lg font-bold text-green-600">Tidak ditemukan indikasi penyakit berdasarkan jawaban Anda.</p>
        @endif
        <form action="{{ route('diagnosis.save') }}" method="POST" class="">
            @csrf
            <button type="submit" class="block w-full mt-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Selesai</button>
        </form>
        
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection
