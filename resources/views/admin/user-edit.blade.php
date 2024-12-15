<x-app-layout>
    @section('title', 'User Information')
    <x-slot name="header">
        @include('admin.partials.user.user-header')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           @include('layouts.partials.message-status')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('User Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Update user profile information and status.') }}
                            </p>
                        </header>


                        <form method="post" action="{{ route('user.update', $user) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" />
                                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="first name" />
                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                            </div>
                            <div>
                                <x-input-label for="last_name" :value="__('Last Name')" />
                                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
                                    :value="old('last_name', $user->last_name)" required autofocus autocomplete="last name" />
                                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification"
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

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                    :value="old('address', $user->address)"  autocomplete="address"/>
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Phone Number')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="old('phone', $user->phone)" autocomplete='phone' />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div>
                                <x-input-label for="status ":value="__('Status')" class="mb-2" />
                                <input type="radio" id="active" name="status" value="active"
                                    {{ $user->status == 'active' ? 'checked' : '' }} @readonly(true)/> 
                                    <label for="active">Active</label>

                                <input type="radio" id="inactive" name="status" value="inactive"
                                    {{ $user->status == 'inactive' ? 'checked' : '' }} @disabled(true) /> 
                                    <label for="inactive">Inactive</label>

                                <input type="radio" id="blocked" name="status" value="blocked"
                                    {{ $user->status == 'blocked' ? 'checked' : '' }} @disabled(true) />
                                    <label for="blocked">Blocked</label>
                            </div>
                            @if(Auth::user()->role === 'admin')
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                            @endif
                        </form>
                    </section>
                </div>
            </div>
            @if(Auth::user()->role === 'admin')
            <div class="mt-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.user.user-status')
                </div>
            </div>
            
            <div class="mt-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.user.user-delete')
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
