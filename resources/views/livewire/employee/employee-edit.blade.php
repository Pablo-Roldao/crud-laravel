<section>
    {{-- Edit button --}}
    <x-button wire:click="$emitSelf('showModal')" wire:loading.attr="disabled"
              class="h-full w-full">
        {{ __('Edit') }}
    </x-button>

    <x-dialog-modal wire:model.defer='showModal'>
        {{-- Title --}}
        <x-slot name='title'>
            {{ __('Edit') . ' ' .  __('employee') }}
        </x-slot>

        {{-- Content --}}
        <x-slot name='content'>
            <form wire:submit.prevent="update" id="updateForm" class="grid gap-2 pb-2" x-data>

                {{--Name--}}
                <div>
                    <x-label for="employee.name" value="{{ __('Name') }}"/>
                    <x-input label="{{ __('Name') }}" placeholder="{{ __('Name') }}"
                             wire:model="employee.name" name="employee.name" id="employee.name" autofocus
                             class="w-full"/>
                    <x-input-error for="employee.name"/>
                </div>

                {{--CPF--}}
                <div>
                    <x-label for="employee.cpf" value="{{ __('CPF') }}"/>
                    <x-input
                        type="text" placeholder="CPF"
                        wire:model="employee.cpf" name="employee.cpf" class="w-full"
                        id="employee.cpf" x-mask="999.999.999-99"/>
                    <x-input-error for="employee.cpf"/>
                </div>

                {{--Birth date--}}
                <div>
                    <x-label for="employee.birth_date" value="{{ __('Birth date') }}"/>
                    <x-input label="{{ __('Birth date') }}" placeholder="{{ __('Birth date') }}"
                             wire:model="employee.birth_date" name="employee.birth_date" id="employee.birth_date"
                             class="w-full" x-mask="99/99/9999"/>
                    <x-input-error for="employee.birth_date"/>
                </div>

                {{--Gender--}}
                <div>
                    <x-label for="employee.gender" value="{{ __('Gender') }}"/>
                    <select label="{{ __('Gender') }}"
                            wire:model="employee.gender" name="employee.gender" id="employee.gender"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option label="{{ __('Gender') }}" value=""></option>
                        <option label="{{ __('Male') }}" value="male"></option>
                        <option label="{{ __('Female') }}" value="female"></option>
                        <option label="{{ __('Other') }}" value="other"></option>
                    </select>
                    <x-input-error for="employee.gender"/>
                </div>

                {{--Phone--}}
                <div>
                    <x-label for="employee.phone" value="{{ __('Phone') }}"/>
                    <x-input
                        type="text" placeholder="{{__('Phone')}}"
                        wire:model="employee.phone" name="employee.phone"
                        class="w-full" id="employee.phone"
                        x-mask="+99 (99) 99999-9999"
                    />
                    <x-input-error for="employee.phone"/>
                </div>

                {{--Email--}}
                <div>
                    <x-label for="employee.email" value="{{ __('Email') }}"/>
                    <x-input label="Email" wire:model="employee.email" placeholder="{{ __('Email') }}"
                             name="employee.email" id="employee.email" type="email" class="w-full"/>
                    <x-input-error for="employee.email"/>
                </div>
            </form>
        </x-slot>

        {{-- Footer --}}
        <x-slot name='footer'>
            <article class="grid gap-2 items-center w-full sm:flex sm:justify-end sm:w-fit">
                @if($errorMessage)
                    <span class="text-red-600 font-bold">
                        {{ __($errorMessage) . '!'}}
                    </span>
                @endif

                {{-- Cancel button --}}
                <x-secondary-button wire:click="$emitSelf('closeModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                {{-- Submit button --}}
                <x-button wire:click="update" wire:loading.attr="disabled" type="submit" form="updateForm">
                    {{ __('Edit') }}
                </x-button>
            </article>
        </x-slot>
    </x-dialog-modal>

</section>
