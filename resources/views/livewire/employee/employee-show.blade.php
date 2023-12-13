<section>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $employee->getName() }}
        </h1>
    </x-slot>

    {{--Employee information--}}
    <article class="grid gap-2 bg-white p-6 rounded-lg">
        <div>
            <x-label class="font-medium" for="name">{{ __('Name') . ':'}}</x-label>
            <x-input value="{{ $employee->getName() }}" class="w-full" disabled/>
        </div>

        <div>
            <x-label class="font-medium" for="cpf">{{ __('CPF') . ':'}}</x-label>
            <x-input value="{{ $employee->getCpf() }}" class="w-full" disabled/>
        </div>

        <div>
            <x-label class="font-medium" for="birth_date">{{ __('Birth date') . ':'}}</x-label>
            <x-input value="{{ date('d/m/Y', $employee->getBirthDate()) }}" class="w-full" disabled/>
        </div>

        <div>
            <x-label class="font-medium" for="gender">{{ __('Gender') . ':'}}</x-label>
            <x-input value="{{ __(ucfirst($employee->getGender())) }}" class="w-full" disabled/>
        </div>

        <div>
            <x-label class="font-medium" for="phone">{{ __('Phone') . ':'}}</x-label>
            <x-input value="{{ $employee->getPhone() }}" class="w-full" disabled/>
        </div>

        <div>
            <x-label class="font-medium" for="email">{{ __('Email') . ':'}}</x-label>
            <x-input value="{{ $employee->getEmail() }}" class="w-full" disabled/>
        </div>
    </article>

</section>
