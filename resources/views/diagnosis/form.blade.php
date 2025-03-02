@extends('client.tamplate')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Masukkan Nama Anda</h2>
    <form action="{{ route('diagnosis.start') }}" method="POST">
        @csrf
        <label class="block mb-2 text-sm font-medium text-gray-700">Nama:</label>
        <input type="text" name="nama" class="w-full p-2 border rounded-lg" required>
        <button type="submit" class="w-full mt-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
            Mulai Diagnosa
        </button>
    </form>
</div>
@endsection
