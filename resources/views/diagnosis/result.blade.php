@extends('client.tamplate')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg text-center">
    <h2 class="text-xl font-semibold mb-4">Hasil Diagnosa</h2>
    @if ($detectedPenyakit)
        <p class="text-lg font-bold text-red-600">Anda kemungkinan mengalami: {{ $detectedPenyakit->nama }}</p>
        <p class="text-gray-800 mt-2">{{ $detectedPenyakit->deskripsi }}</p>
    @else
        <p class="text-lg font-bold text-green-600">Tidak ditemukan indikasi penyakit berdasarkan jawaban Anda.</p>
    @endif
    <a href="{{ route('diagnosis.form') }}" class="block mt-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
        Mulai Lagi
    </a>
</div>
@endsection
