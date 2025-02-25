@extends('client.tamplate')
@section('title', 'Home')
@section('content')
    <section class="flex items-center min-h-screen ">   
        <div class="container mx-auto">
            <div class="flex items-center justify-between gap-10 px-20">
                <div class="w-1/2 flex flex-col justify-center ">
                    <h1 class="text-5xl/tight font-bold text-blue-500">MentalCare Platform Tepat untuk Kesehatan Mentalmu</h1>
                    <p class="text-xl/normal mt-5 text-slate-600">Temukan jawaban tentang kesehatan mental Anda dengan sistem pakar. Dapatkan analisis cepat dan rekomendasi yang akurat. Coba sekarang, gratis!</p>
                    <div class="w-1/2 mt-10">
                        <button class="items-center text-lg px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full shadow-md hover:from-blue-600 hover:to-purple-600 ">                    
                            Coba Diagnosa Sekarang
                        </button>
                    </div>
                </div>
                <div class="w-1/3 flex items-center justify-end mt-[-50px]">
                    <img src="{{ asset('image/orang.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="bg-[#E2EDFF]">
        <div class="container mx-auto mt-20 py-10 w-full">
            <h1 class="text-center text-4xl font-bold">adfsdfa</h1>
        </div>
    </section> --}}
@endsection