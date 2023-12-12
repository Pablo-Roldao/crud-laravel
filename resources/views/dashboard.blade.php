<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <article>
        <a href="{{ route('employee.index') }}">
            <x-button class="h-40 font-bold w-full flex justify-center mx-auto sm:w-1/2">
                {{ __('Employee management') }}
            </x-button>
        </a>
    </article>
</x-app-layout>
