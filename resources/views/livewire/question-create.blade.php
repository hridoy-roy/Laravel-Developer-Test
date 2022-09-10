<div>
    <div class="text-center mb-5">
        @if ($errors->any())
        <h4>All Error Message</h4>
        @foreach ($errors->all() as $error)
        <span class="error">{{ $error }}</span><br />
        @endforeach
        @endif
    </div>
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
        @for ($i = 0; $i <= $input; $i++) <div class="row">
            <div class="mb-3 col-lg-3">
                <label for="name">Option {{ $i + 1 }}</label>
            </div>

            <div class="mb-3 col-lg-6">
                <input type="text" wire:model="option.{{ $i }}" class="form-control" placeholder="Option {{ $i + 1 }}"
                    value="" />
            </div>

            <div class="mb-3 col-lg-1 form-check d-flex justify-content-center">
                <input class="form-check-input" wire:model="ans.{{ $i }}" type="checkbox" value="">
            </div>

            <div class="mb-3 col-lg-2 align-self-center">
                @if ($i > 0) <span class="btn btn-primary" wire:click="delete({{ $i }})">Delete</span>
                @endif
            </div>
</div>
@endfor

<span class="btn btn-primary w-md" wire:click="addOption">Add Option</span>

<div class="row">
    <div class="col-sm-9">
        <div class="form-check mb-4">
            <input class="form-check-input" wire:model="status" type="checkbox">
            <label class="form-check-label"> Status </label>
        </div>

        <div>
            <button type="submit" class="btn btn-success w-md">Submit</button>
        </div>
    </div>
</div>
</form>
</div>