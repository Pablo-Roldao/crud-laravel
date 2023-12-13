<section>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee management') }}
        </h1>
    </x-slot>

    <article class="gap-4 pb-4 grid grid-cols-1 md:grid-cols-6">
        <x-input placeholder="{{ __('Search') }}..." wire:model="search" id='search'
                 class="col-span-2 dark:text-white"/>

        <select wire:model="orderBy" name="orderBy" id="orderBy"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="name">{{ __('Name') }}</option>
            <option value="cpf">{{ __('CPF') }}</option>
            <option value="email">{{ __('Email') }}</option>
            <option value="phone">{{ __('Phone') }}</option>
        </select>

        <select wire:model="orderAsc" name="orderAsc" id="orderAsc"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option label="{{ __('Ascending') }}" value="1"></option>
            <option label="{{ __('Descending') }}" value="0"></option>
        </select>

        <select wire:model="perPage" name="perPage" id="perPage"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="5">{{ 5 }}</option>
            <option value="10">{{ 10 }}</option>
            <option value="20">{{ 20 }}</option>
            <option value="50">{{ 50 }}</option>
        </select>

        <livewire:employee.employee-create />
    </article>

    <table class="rounded-lg dark:bg-indigo-500 text-white w-full bg-indigo-900">
        <thead>
        <tr class="align-middle">
            <th scope="col" class="p-3">{{ __('Name') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('CPF') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('Phone') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('Email') }}</th>
        </tr>
        </thead>

        <tbody class="dark:bg-gray-700 dark:text-white text-black bg-white">
        @if(count($employees) > 0)
            @foreach ($employees as $employee)
                <tr>
                    <td class="p-3 font-medium text-center flex items-center justify-center gap-4">
                        <a href="{{ route('employee.show', ['id' => $employee->getId()]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </a>


                        {{ $employee->getName() }}
                    </td>

                    <td class="p-3 font-medium text-center hidden sm:table-cell">
                        {{ $employee->getCpf() }}
                    </td>

                    <td class="p-3 font-medium text-center hidden sm:table-cell">
                        {{ $employee->getPhone() }}
                    </td>

                    <td class="p-3 font-medium text-center hidden sm:table-cell">
                        {{ $employee->getEmail() }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="p-3 text-center">
                    {{ __('No employees') . '...' }}
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <article class="mt-4">
        {{ $employees->links() }}
    </article>

</section>
