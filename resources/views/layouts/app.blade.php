@extends('layouts.base')

@section('body')
    <div x-data="{ 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">

        <x-ui.loader />

        <div class="flex h-screen overflow-hidden">
            <!-- ===== Sidebar Start ===== -->
            @include('layouts.partials.sidebar')
            <!-- ===== Sidebar End ===== -->

            <!-- ===== Content Area Start ===== -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <!-- ===== Header Start ===== -->
                @include('layouts.partials.header')
                <!-- ===== Header End ===== -->

                <!-- ===== Main Content Start ===== -->
                <main class="mb-auto">
                    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                        <div class="mx-auto max-w-full">
                            <!-- Breadcrumb Start -->
                            @include('layouts.partials.page-title')
                            <!-- Breadcrumb End -->

                            @yield('content')

                            @isset($slot)
                                {{ $slot }}
                            @endisset

                        </div>
                    </div>
                </main>
                <!-- ===== Main Content End ===== -->

                <!-- ===== Footer Content ===== -->
                @include('layouts.partials.footer')
                <!-- ===== Footer Content End ===== -->
            </div>
            <!-- ===== Content Area End ===== -->
        </div>
    </div>
@endsection
