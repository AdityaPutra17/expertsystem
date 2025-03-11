@extends('admin.tamplate')

@section('content')

<section class="text-start">
    <div class="flex mb-5 justify-between">
        <h1 class="font-bold text-4xl text-blue-900">Hasil Diagnosa</h1>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white px-5 py-4 mb-5 rounded-lg" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="p-5 bg-white rounded-lg shadow-lg">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-blue-950 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">No</th>
                    <th class="py-3 px-6 text-center">Nama Pengguna</th>
                    <th class="py-3 px-6 text-center">Penyakit</th>
                    <th class="py-3 px-6 text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @if ($diagnoses->isEmpty())
                    <tr>
                        <td class="py-3 px-6 text-center" colspan="4">Tidak Ada Data Diagnosa</td>
                    </tr>
                @else
                    @foreach ($diagnoses as $index => $diagnosis)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-center">{{ $diagnosis->user_nama }}</td>
                        <td class="py-3 px-6 text-center">{{ $diagnosis->penyakit->nama ?? 'Tidak Ditemukan' }}</td>
                        
                        <td class="py-3 px-6 text-center">{{ $diagnosis->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    

   
</section>


@endsection
