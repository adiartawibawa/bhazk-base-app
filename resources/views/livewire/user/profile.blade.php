<div>
    @section('title', 'Profile Informations')
    @section('subtitle', 'Update your account\'s profile information.')

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
                                        type="text" name="name" id="name" wire:model="state.name"
                                        placeholder="Full Name">
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                    for="username">Username</label>
                                <input
                                    class="w-full rounded border border-stroke bg-gray py-3 px-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                    type="text" name="username" id="username" wire:model="state.username"
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
                                    type="email" wire:model="state.email" name="email" id="email"
                                    placeholder="johndoe@mail.test">

                                @if (auth()->user() instanceof MustVerifyEmail &&
                                        !auth()->user()->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}

                                            <button wire:click.prevent="sendEmailVerification" type="button"
                                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if ($this->verificationLinkSent)
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="mb-5.5">
                            <button title="Change Password" type="button"
                                wire:click="$dispatch('openModal', {component:'user.update-password'})"
                                class="text-sm text-black font-medium hover:text-danger">
                                Change password
                            </button>
                        </div>
                        <div class="flex justify-end items-center gap-4.5">
                            <button
                                class="flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90"
                                type="submit">
                                Update
                            </button>
                            <x-action-message on="profile-updated">
                                {{ __('Updated.') }}
                            </x-action-message>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-span-5 xl:col-span-2">
            @livewire('user.change-photo-user')
        </div>
    </div>
</div>
