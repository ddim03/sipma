<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white flex flex-col justify-between">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 {{ Request::is('dashboard') ? 'sidebar-active' : 'sidebar-base' }} rounded-lg">
                    <!-- Dashboard icon and label -->
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                @auth
                    @if(auth()->user()->is_kaprodi)
                        <!-- Show "Pengumuman" link for kaprodi -->
                        <a href="/validate"
                            class="flex items-center p-2 rounded-lg {{ Request::is('validate') ? 'sidebar-active' : 'sidebar-base' }} group">
                            <!-- Announcement icon and label -->
                            <span class="ms-3">Pengumuman</span>
                        </a>
                    @else
                        <!-- Show "Pengumuman" link for other users -->
                        <a href="/post"
                            class="flex items-center p-2 rounded-lg {{ Request::is('post/*') ? 'sidebar-active' : 'sidebar-base' }} group">
                            <!-- Announcement icon and label -->
                            <span class="ms-3">Pengumuman</span>
                        </a>
                    @endif
                @endauth
            </li>
            <li>
                <a href="/arsip/index"
                    class="flex items-center p-2 rounded-lg {{ Request::is('arsip/*') ? 'sidebar-active' : 'sidebar-base' }} group">
                    <!-- Arsip icon and label -->
                    <span class="ms-3">Arsip</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li class>
                <form id="logoutForm" action="/logout" method="post">
                    @csrf                 
                <div
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:text-red-700 hover:bg-red-100  group">
                    <svg class="w-5 h-5 text-gray-700 transition duration-75 group-hover:text-red-700"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                    </svg>
                    <button id="logoutButton" type ="submit" class="ms-3">Logout</button>
</div>
</form>
            
            </li>
        </ul>
    </div>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const logoutButton = document.getElementById('logoutButton');

        logoutButton.addEventListener('click', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Anda yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan logout atau kirim form logout di sini
                    document.getElementById('logoutForm').submit();
                }
            });
        });
    });
</script>