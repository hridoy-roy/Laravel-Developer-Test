<div>
    <div class="text-center mb-5">
        @if ($errors->any())
        <h4>All Error Message</h4>
        @foreach ($errors->all() as $error)
        <span class="error">{{ $error }}</span><br />
        @endforeach
        @endif
    </div>
    @if (session()->has('message'))
    <script>
        toastr["success"]("{{ session('message') }}")
    </script>
    @endif


    <form wire:submit.prevent="submit">
        <div class="row mb-4">
            <h5 class="col-sm-3 m-0 d-flex justify-content-center align-items-center border">Question Title >></h5>
            <div class="col-sm-9">
                <input type="text" wire:model="title" class="form-control" placeholder="Enter Your ">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row text-center">
            <div class="mb-3 col-lg-3 border p-2">
                <label class="m-0">Option Number</label>
            </div>

            <div class="mb-3 col-lg-6 border p-2">
                <label class="m-0">Option Title</label>
            </div>

            <div class="mb-3 col-lg-1 border p-2">
                <label class="m-0">Ans</label>
            </div>

            <div class="mb-3 col-lg-2 border p-2">
                <label class="m-0">Action</label>
            </div>
        </div>
        @for ($i = 0; $i <= $input; $i++) <div class="row">
            <div class="mb-3 col-lg-3 p-2 text-center border-start border-3 border-success">
                <h5 class="m-0">OPTION {{ $i + 1 }}</h5>
            </div>

            <div class="mb-3 col-lg-6">
                <input type="text" wire:model="option.{{ $i }}" class="form-control" placeholder="Option {{ $i + 1 }}"
                    value="" />
            </div>

            <div class="mb-3 col-lg-1 d-flex justify-content-center">
                <div class="d-flex justify-content-center align-items-center">
                    <input type="checkbox" id="switch{{ $i }}" switch="bool" wire:model="ans.{{ $i }}" checked />
                    <label class="m-0" for="switch{{ $i }}" data-on-label="Yes" data-off-label="No"></label>
                </div>
            </div>

            <div class="mb-3 col-lg-2 text-center">
                @if ($i > 0) <span class="btn btn-primary" wire:click="delete({{ $i }})">Delete</span> @endif
            </div>
</div>
@endfor

<div class="row">
    <div class="col-12 text-end pe-3">
        <span class="btn btn-primary w-md me-2" wire:click="addOption">Add Option</span>
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
        <div class="form-check mb-3 p-0">
            <h5 class="form-check-label">Question Status </h5>
        </div>
        <div class="square-switch">
            <input type="checkbox" id="square-switch1" wire:model="status" switch="none" checked />
            <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center">
        <div>
            <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Submit Question</button>
        </div>
    </div>
</div>
</form>

</div>