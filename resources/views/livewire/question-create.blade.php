<div>
    <form wire:submit.prevent="submit">
        <div class="row mb-4">
            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Question
                Title</label>
            <div class="col-sm-9">
                <input type="text" wire:model="title" class="form-control" placeholder="Enter Your ">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-sm-3 ">Options</h2>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-3">
            </div>

            <div class="mb-3 col-lg-6">
                <label for="email">Option title</label>
            </div>

            <div class="mb-3 col-lg-1 form-check">
                <label class="form-check-label" for="subject">Ans</label>
            </div>

            <div class="mb-3 col-lg-2">
                <label for="subject">Action</label>
            </div>
        </div>
        @for ($i = 1; $i <= $input; $i++) <div class="row">
            <div class="mb-3 col-lg-3">
                <label for="name">Option {{ $i }}</label>
            </div>

            <div class="mb-3 col-lg-6">
                <input type="text" wire:model="option.{{ $i }}" class="form-control" placeholder="Option {{ $i }}" />
            </div>

            <div class="mb-3 col-lg-1 form-check d-flex justify-content-center">
                <input class="form-check-input" wire:model="ans.{{ $i }}" type="checkbox">
            </div>

            <div class="mb-3 col-lg-2 align-self-center">
                <span class="btn btn-primary" wire:click="delete">Delete</span>
            </div>
</div>
@endfor

<span class="btn btn-primary w-md" wire:click="addOption">Add Option</span>

<div class="row">
    <div class="col-sm-9">
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">
                Active/Deactive
            </label>
        </div>

        <div>
            <button type="submit" class="btn btn-success w-md">Submit</button>
        </div>
    </div>
</div>
</form>
</div>