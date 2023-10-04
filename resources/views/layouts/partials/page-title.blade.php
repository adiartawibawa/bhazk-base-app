<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
    <div>
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            @yield('title')
        </h2>
        <p class="mt-2 text-xs text-bodydark2 dark:text-bodydark">
            @yield('subtitle')
        </p>
    </div>

    <div class="flex items-center gap-2 text-sm font-medium">
        @yield('breadcrumb')
    </div>
</div>
