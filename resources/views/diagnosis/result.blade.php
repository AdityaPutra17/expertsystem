@extends('client.tamplate')

@section('content')
<section class="min-h-[500px] flex items-center justify-center">
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg text-center max-h-screen">
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
        <form action="{{ route('diagnosis.save') }}" method="POST">
            @csrf
            @if($detectedPenyakit)
                <input type="hidden" name="penyakit_id" value="{{ $detectedPenyakit->id }}">
            @endif
            <button type="submit" class="block mt-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
                Selesai
            </button>
        </form>
    </div>
</section>
@endsection