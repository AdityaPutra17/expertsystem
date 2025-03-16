@extends('admin.tamplate')

@section('content')
<div class="container mx-auto mt-5">
    <div class="flex mb-5 justify-between">
        <h1 class="font-bold text-4xl text-blue-900">Data Hasil Diagnosa</h1>
    </div>

    <div class="p-5 bg-white rounded-lg shadow-lg">
        <table class="min-w-full bg-white ">
            <thead>
                <tr class="bg-blue-900 text-white">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Hasil Diagnosa</th>
                    <th class="border px-4 py-2">Detail Gejala</th>
                    <th class="border px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnoses as $index => $diagnosis)
                    <tr>
                        <td class="border px-4 py-2">{{$index +1}}</td>
                        <td class="border px-4 py-2">{{ $diagnosis->user_nama }}</td>
                        <td class="border px-4 py-2">
                            @php
                                $penyakitList = json_decode($diagnosis->penyakit_id, true);
                            @endphp
                            @if($penyakitList)
                                <ul>
                                    @foreach($penyakitList as $id => $percent)
                                        @php $penyakit = \App\Models\Penyakit::find($id); @endphp
                                        @if($penyakit)
                                            <li>{{ $penyakit->nama }} ({{ $percent }}%)</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada data</p>
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div x-data="{open: false}">
                                <button @click="open = !open" class="bg-blue-900 text-white px-4 py-2 rounded">Lihat Detail</button>
                            
                                <div x-show="open" class="mt-2 p-2 bg-gray-100 border rounded">
                                    @php
                                        $gejalaLog = json_decode($diagnosis->answer_log, true);
                                    @endphp
                                    <ul class="text-left">
                                        @foreach($gejalaLog as $gejalaId => $jawaban)
                                            @php $gejala = \App\Models\Gejala::find($gejalaId); @endphp
                                            @if($gejala)
                                                <li class="py-1 border-b">{{ $gejala->nama }}: <span class="font-bold text-{{$jawaban ? 'green' : 'red'}}-600">{{ $jawaban ? 'Ya' : 'Tidak' }}</span></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div> 
                        </td>
                        <td class="border px-4 py-2">{{ $diagnosis->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection