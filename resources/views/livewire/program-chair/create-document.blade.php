<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="mt-5 flex justify-end">
        <x-button label="SAVE" right-icon="arrow-right" class="font-semibold" slate wire:click="saveRecord"
            spinner="saveRecord" />
    </div>
</div>
