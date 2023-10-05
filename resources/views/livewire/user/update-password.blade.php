<div>
    <div class="px-4 py-8">
        <div class="mb-4">
            <h2 class="font-medium text-black dark:text-white">
                {{ __('Update Password') }}
            </h2>

            <p class="mt-1 text-xs text-graydark dark:text-white">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>
        <div>
            <form wire:submit.prevent="updatePassword">
                <div class="mb-5.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                        for="current_password">{{ __('Current Password') }}</label>
                    <div class="relative w-full">
                        <span class="absolute left-4.5 top-4">
                            <x-icon name="fi-rs-key" class="h-4 w-4 fill-current" />
                        </span>
                        <input
                            class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                            :type="show ? 'password' : 'text'" name="password" id="password"
                            wire:model="state.current_password" autocomplete="current-password">
                        <x-input-error for="current_password" class="mt-2" />
                    </div>
                </div>
                <div class="mb-5.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                        for="password">{{ __('New Password') }}</label>
                    <div class="flex justify-between">
                        <div class="relative w-full" x-data="{ show: true }">
                            <span class="absolute left-4.5 top-4">
                                <x-icon name="fi-rs-key" class="h-4 w-4 fill-current" />
                            </span>
                            <input
                                class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                :type="show ? 'password' : 'text'" name="password" id="password"
                                wire:model="state.password" autocomplete="new-password">
                            <x-input-error for="password" class="mt-2" />
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
                            <button title="Generate Password" type="button" wire:click="generatePassword"
                                class="text-sm font-medium hover:text-primary">
                                Generate
                            </button>
                        </span>
                    </div>
                </div>
                <div class="mb-5.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                        for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <div class="relative w-full" x-data="{ showConfirm: true }">
                        <span class="absolute left-4.5 top-4">
                            <x-icon name="fi-rs-key" class="h-4 w-4 fill-current" />
                        </span>
                        <input
                            class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                            :type="showConfirm ? 'password' : 'text'" name="password" id="password"
                            wire:model="state.password_confirmation" autocomplete="new-password">
                        <x-input-error for="password_confirmation" class="mt-2" />
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3"
                            @click="showConfirm = !showConfirm"
                            :class="{ 'hidden': !showConfirm, 'block': showConfirm }">
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
                            @click="showConfirm = !showConfirm"
                            :class="{ 'block': !showConfirm, 'hidden': showConfirm }">
                            <!-- Heroicon name: eye-slash -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4.5">
                    <button wire:click="$dispatch('closeModal')"
                        class="flex justify-center rounded border border-stroke py-2 px-6 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
                        type="button">
                        Cancel
                    </button>
                    <button
                        class="flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90"
                        type="submit">
                        Save
                    </button>
                    <x-action-message on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </div>
    </div>
</div>
