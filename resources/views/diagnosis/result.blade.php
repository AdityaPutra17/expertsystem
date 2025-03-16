@extends('client.tamplate')

@section('content')
<section class="min-h-[500px] flex items-center justify-center">
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg text-center max-h-screen">
        <h2 class="text-xl font-semibold mb-4">Hasil Diagnosa</h2>
        @if (!empty($detectedDiseases))
            @foreach ($detectedDiseases as $data)
                <p class="text-lg font-bold text-red-600">
                    {{ $data['penyakit']->nama }} ({{ $data['percentage'] }}%)
                </p>
                <p class="text-gray-800 mt-2">{{ $data['penyakit']->deskripsi }}</p>
                <hr class="my-2">
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
@endsection
