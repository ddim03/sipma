<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white flex flex-col justify-between">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2  {{ Request::is('dashboard') ? 'sidebar-active' : 'sidebar-base' }} rounded-lg">
                    <svg class="w-5 h-5 {{ Request::is('dashboard') ? 'sidebar-active' : 'sidebar-svg' }} transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/post/index"
                    class="flex items-center p-2 rounded-lg {{ Request::is('post/*') ? 'sidebar-active' : 'sidebar-base' }} group">
                    <svg class="w-5 h-5 {{ Request::is('post/*') ? 'sidebar-active' : 'sidebar-svg' }} transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                    <span class="ms-3">Pengumuman</span>
                </a>
            </li>
            <li>
                <a href="/arsip/index"
                    class="flex items-center p-2 rounded-lg {{ Request::is('arsip/*') ? 'sidebar-active' : 'sidebar-base' }} group">
                    <svg class="w-5 h-5 {{ Request::is('arsip/*') ? 'sidebar-active' : 'sidebar-svg' }} transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                    </svg>
                    <span class="ms-3">Arsip</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li class>
                <a href="admin/login"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:text-red-700 hover:bg-red-100  group">
                    <svg class="w-5 h-5 text-gray-700 transition duration-75 group-hover:text-red-700"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                    </svg>
                    <span class="ms-3">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>