    <div class="flex justify-end p-4 bg-blue-900 ">
        <div class="relative ">
            <button onclick="toggleDropdown()" class=" text-white flex justify-end items-center gap-6 py-2 px-4 rounded-md">
                Profil
                <img src="{{asset('image/orang.png')}}" width="5%" alt="">
            </button>
            <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                <a href="#" onclick="logout()" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("hidden");
        }

        
    </script>
