<div>
    @section('title', 'Profile Informations')
    @section('subtitle', 'Update your account\'s profile information and email address.')

    @section('breadcrumb')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <div class="grid grid-cols-5 gap-8">
        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke py-4 px-7 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Personal Information
                    </h3>
                </div>
                <div class="p-7">
                    <form wire:submit.prevent="updateProfileInformation">
                        <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                            <div class="w-full sm:w-1/2">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                    for="name">Full Name</label>
                                <div class="relative">
                                    <span class="absolute left-4.5 top-4">
                                        <x-icon name="fi-rs-user" class="fill-current h-4 w-4" />
                                    </span>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="name" id="name" wire:model="name"
                                        placeholder="Full Name">
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                    for="username">Username</label>
                                <input
                                    class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                    type="text" name="username" id="username" wire:model="username"
                                    placeholder="Username">
                            </div>
                        </div>

                        <div class="mb-5.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                for="email">Email Address</label>
                            <div class="relative">
                                <span class="absolute left-4.5 top-4">
                                    <x-icon name="fi-rs-envelope" class="h-4 w-4 fill-current" />
                                </span>
                                <input
                                    class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                    type="email" wire:model="email" name="email" id="email"
                                    placeholder="johndoe@mail.test">

                                @if (auth()->user() instanceof MustVerifyEmail &&
                                        !auth()->user()->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}

                                            <button wire:click.prevent="sendVerification"
                                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="mb-5.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                for="password">Password</label>
                            <div class="flex justify-between">
                                <div class="relative w-full" x-data="{ show: true }">
                                    <span class="absolute left-4.5 top-4">
                                        <x-icon name="fi-rs-key" class="h-4 w-4 fill-current" />
                                    </span>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        :type="show ? 'password' : 'text'" name="password" id="password"
                                        wire:model="password" placeholder="Password" value="password">
                                    <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3"
                                        @click="show = !show" :class="{ 'hidden': !show, 'block': show }">
                                        <!-- Heroicon name: eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3"
                                        @click="show = !show" :class="{ 'block': !show, 'hidden': show }">
                                        <!-- Heroicon name: eye-slash -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                                <span class="flex gap-2.5 ml-4">
                                    <button title="Change Password" type="button"
                                        onclick="Livewire.emit('openModal', 'user.update-password')"
                                        class="text-sm font-medium hover:text-primary">
                                        Change
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-4.5">
                            <button type="button"
                                class="flex justify-center rounded border border-stroke py-2 px-6 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white">
                                Cancel
                            </button>
                            <button
                                class="flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90"
                                type="submit">
                                Save
                            </button>
                            <x-action-message on="profile-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-span-5 xl:col-span-2">
            <div
                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke py-4 px-7 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Your Photo
                    </h3>
                </div>
                <div class="p-7">
                    <form action="#">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="h-14 w-14 rounded-full">
                                <img src="src/images/user/user-03.png" alt="User">
                            </div>
                            <div>
                                <span class="mb-1.5 font-medium text-black dark:text-white">Edit your photo</span>
                                <span class="flex gap-2.5">
                                    <button class="text-sm font-medium hover:text-primary">
                                        Delete
                                    </button>
                                    <button class="text-sm font-medium hover:text-primary">
                                        Update
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div id="FileUpload"
                            class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border-2 border-dashed border-primary bg-gray py-4 px-4 dark:bg-meta-4 sm:py-7.5">
                            <input type="file" accept="image/*"
                                class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white dark:border-strokedark dark:bg-boxdark">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z"
                                            fill="#3C50E0"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z"
                                            fill="#3C50E0"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z"
                                            fill="#3C50E0"></path>
                                    </svg>
                                </span>
                                <p class="text-sm font-medium">
                                    <span class="text-primary">Click to upload</span>
                                    or drag and drop
                                </p>
                                <p class="mt-1.5 text-sm font-medium">
                                    SVG, PNG, JPG or GIF
                                </p>
                                <p class="text-sm font-medium">
                                    (max, 800 X 800px)
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4.5">
                            <button
                                class="flex justify-center rounded border border-stroke py-2 px-6 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
                                type="submit">
                                Cancel
                            </button>
                            <button
                                class="flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90"
                                type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
