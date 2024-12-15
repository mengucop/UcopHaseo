<x-modal name="request-borrow-{{ $bookRequest->id }}" focusable>
    <form method="post" action="{{ route('borrowed.store', $bookRequest) }}" class="p-6">
        @csrf
        @method('post')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Proceed This Request To Borrow A Book") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("This request is already been {$bookRequest->status}. Please Fill Up The Information Needed Below To Borrow This Book.") }}
        </p>

        <div class="mt-6">
            <x-input-label for="return_date" :value="__('Return Date ')" />
            <x-text-input id="return_date" name="return_date" type="date" class="mt-1 block w-3/4  dark:text-white dark:[color-scheme:dark]"/>
            <x-input-error :messages="$errors->get('return_date')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="remarks" value="{{ __('Remarks') }}" class="sr-only" />

            <x-text-input id="remarks" name="remarks" type="text" class="mt-1 block w-3/4"
                placeholder="{{ __('Remarks (optional)') }}" />

            <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>
        
            <x-danger-button class="ml-3">
                    {{ __('Proceed') }}
            </x-danger-button>

        </div>
    </form>
</x-modal>
@if((session('bookBorrowReq') == $bookRequest->id))
<x-modal name="request-borrow-" :show="$errors->isNotEmpty" focusable>
    <form method="post" action="{{ route('borrowed.store', $bookRequest) }}" class="p-6">
        @csrf
        @method('post')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Proceed This Request To Borrow A Book") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("This request is already been {$bookRequest->status}. Please Fill Up The Information Needed Below To Borrow This Book.") }}
        </p>

        <div class="mt-6">
            <x-input-label for="return_date" :value="__('Return Date ')" />
            <x-text-input id="return_date" name="return_date" type="date" class="mt-1 block w-3/4  dark:text-white dark:[color-scheme:dark]"/>
            <x-input-error :messages="$errors->get('return_date')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="remarks" value="{{ __('Remarks') }}" class="sr-only" />

            <x-text-input id="remarks" name="remarks" type="text" class="mt-1 block w-3/4"
                placeholder="{{ __('Remarks (optional)') }}" />

            <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>
        
            <x-danger-button class="ml-3">
                    {{ __('Proceed') }}
            </x-danger-button>

        </div>
    </form>
</x-modal>
@endif