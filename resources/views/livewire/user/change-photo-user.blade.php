<div>
    <form wire:submit.prevent="storePhoto">
        <div x-data="{ isHovered: false }"
            class="rounded-sm shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased"
            style="
  background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
  background-repeat: no-repat;
  background-size: cover;
  background-blend-mode: multiply;
">

            <div class="md:w-1/3 w-full">
                <div class="relative w-36 h-36" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                    @if ($photo)
                        <img class="rounded-md shadow-lg antialiased w-full md:w-36 md:h-36 object-cover object-center"
                            src="{{ $preview }}" alt="profile">
                    @else
                        <img class="rounded-md shadow-lg antialiased w-full md:w-36 md:h-36 object-cover object-center"
                            src="{{ $this->user->avatar_url }}" alt="profile">
                    @endif
                    <label x-show="isHovered"
                        class="absolute group hover:cursor-pointer hover:bg-boxdark rounded-md inset-0 w-full flex items-center justify-center opacity-60 text-white transition duration-500 ease-in-out">
                        <x-icon class="fill-white h-14 w-14 group-hover:block hidden" name="fi-rs-camera" />
                        <input type="file" wire:model="photo" name="profile" id="profile" class="sr-only"
                            accept="image/*">
                    </label>
                </div>
            </div>
            <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
                <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                    <div class="text-2xl text-white leading-tight">Role</div>
                    <div class="text-normal text-white hover:text-gray-400">
                        <span class="border-b border-dashed border-gray-500 pb-1">
                            {{ $this->user->currentRole->name }}
                        </span>
                    </div>
                    <div class="text-white inline-flex gap-2 md:absolute pt-3 md:pt-0 bottom-0 right-0">
                        @if ($photo)
                            <button
                                class="flex justify-center items-center gap-2 rounded bg-primary p-2 font-medium text-gray hover:bg-opacity-90"
                                type="submit">
                                <x-icon name="fi-rs-check" class="h-4 w-4 fill-white" />
                            </button>
                            <button wire:click="cancelPhoto"
                                class="flex justify-center items-center gap-2 rounded bg-danger p-2 font-medium text-gray hover:bg-opacity-90"
                                type="button">
                                <x-icon name="fi-rs-x" class="h-4 w-4 fill-white" />
                            </button>
                        @endif
                    </div>
                    {{-- <div
                    class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">
                    Last Seen: <b>2 days ago</b>
                </div> --}}
                </div>
            </div>

        </div>
    </form>
</div>
