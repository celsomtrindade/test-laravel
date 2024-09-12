<div>
    <button wire:click="justDebug()">DEBUG CLICK</button>

    <form wire:submit.prevent="save" class="space-y-6">
        <div>
            <x-input-label for="name" :value="__('Contact Name')" />
            <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full" required placeholder="{{ __('Contact Name') }}" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-mail Address')" />
            <x-text-input wire:model="form.email" id="email" name="email" type="email" class="mt-1 block w-full" required placeholder="{{ __('E-mail Address') }}" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button info :label="__('Save')" type="submit" />

            <x-action-message class="me-3" on="settings-updated">
                {{ __('Contact created') }}
            </x-action-message>
        </div>
    </form>
</div>
