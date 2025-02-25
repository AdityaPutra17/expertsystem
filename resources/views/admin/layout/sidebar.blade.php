<aside class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col bg-blue-950 text-white lg:static lg:translate-x-0">
  <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
    <a href="/admin">
      <img src="{{ asset('image/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <div class="flex-1 overflow-y-auto mt-5 px-4 py-4 lg:mt-9 lg:px-6">
    <!-- Sidebar Menu -->
    <hr class="border-t-2 border-white mb-4" />
    <div>
      <ul class="mb-6 flex flex-col gap-1.5">
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center" href="/home"> <i class="fa-solid fa-house"></i>Dashboard</a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center" href="/admin/aturan"> <i class="fa-solid fa-notes-medical"></i> Aturan</a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center" href="/admin/gejala"> <i class="fa-solid fa-book"></i> Gejala</a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center" href="/admin/penyakit"> <i class="fa-solid fa-virus"></i> Penyakit</a>
        </li>
      </ul>
    </div>
    <!-- Sidebar Menu -->
  </div>

  <form action="/logout" method="POST" class="mb-6">
    @csrf
    <ul class="flex flex-col gap-1.5">
      <li>
        <button class="flex gap-4 px-8 text-lg items-center" href=""> <i class="fa-solid fa-right-from-bracket"></i> Sign Out</button>
      </li>
    </ul>
  </form>
</aside>
