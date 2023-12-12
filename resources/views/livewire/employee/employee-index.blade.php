<section>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee management') }}
        </h2>
    </x-slot>


    <div class="gap-4 pb-4 grid grid-cols-1 md:grid-cols-6">
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
    </div>

    <table class="rounded-lg dark:bg-indigo-400 dark:text-white w-full bg-indigo-400">
        <thead>
        <tr class="align-middle">
            <th scope="col" class="p-3">{{ __('Name') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('CPF') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('Phone') }}</th>
            <th scope="col" class="p-3 hidden sm:table-cell">{{ __('Email') }}</th>
        </tr>
        </thead>

        <tbody class="dark:bg-gray-700 dark:text-white text-black bg-white">
        @foreach ($employees as $employee)
            <tr>
                <td class="p-3 font-medium text-center">
                    <a href="{{ route('employee.show', ['id' => $employee->getId()]) }}">
                        {{ $employee->name }}
                    </a>
                </td>

                <td class="p-3 font-medium text-center hidden sm:table-cell">
                    {{ $employee->cpf }}
                </td>

                <td class="p-3 font-medium text-center hidden sm:table-cell">
                    {{ $employee->phone }}
                </td>

                <td class="p-3 font-medium text-center hidden sm:table-cell">
                    {{ $employee->email }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $employees->links() }}
    </div>

</section>
