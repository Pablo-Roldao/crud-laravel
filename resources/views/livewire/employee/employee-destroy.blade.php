<section>
    {{-- Delete button --}}
    <x-button wire:click="$emitSelf('showModal')" wire:loading.attr="disabled" class="w-full">
        {{ __('Delete') }}
    </x-button>

    <x-dialog-modal wire:model.defer='showModal'>
        {{-- Title --}}
        <x-slot name='title'>
            <section  class="mb-4">
                {{ __('Delete') . ' ' .__('employee') }}
            </section>
        </x-slot>

        <x-slot name='content' class="mb-4">
            <section class="mb-4">
                {{ __('Are you sure you want do delete this employee?') }}
            </section>
        </x-slot>

        <x-slot name='footer'>
            <section class="grid gap-4 w-full sm:flex sm:justify-end">
                @if($errorMessage)
                    <div class="flex justify-start">
                        <span class="font-bold text-red-600 text-start">{{ __($errorMessage) . '.'}}</span>
                    </div>
                @endif

                {{-- Cancel button --}}
                <x-secondary-button wire:click="$emitSelf('closeModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                {{-- Submit button --}}
                <x-button wire:click="destroy" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-button>
            </section>
        </x-slot>
    </x-dialog-modal>
</section>
