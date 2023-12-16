<div class="bg-white shadow absolute top-[4.2rem] right-0 rounded translate-x-full" id="notification">
    <div class="px-4 py-3 flex gap-3">
        <svg class="w-6 h-6 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
        </svg>
        <p class="text-gray-600 font-medium">Welcome {{ Auth::user()->nama }}</p>
    </div>
    <div class="w-full bg-gray-200 dark:bg-gray-700">
        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center py-0.5 leading-none" style="width: 45%"
            id="bar">
        </div>
    </div>
</div>