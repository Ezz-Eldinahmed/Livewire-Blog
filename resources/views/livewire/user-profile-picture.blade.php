<div>
    <div wire:loading wire:target="update">
        <div class="clearfix">
            <div class="spinner-border float-end" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="update" class="card-body">
        @csrf
        <div class="form-group m-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{old('name',$user->name)}}" id="name" wire:model='name'
                placeholder="Name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group m-2">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" wire:model='email' placeholder="E-mail"
                value="{{old('email')}}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        @if ($image)
        Photo Preview:
        <img src="{{ $image->temporaryUrl() }}" class="rounded" width="200px">
        @endif

        <div class="input-group m-2">
            <label class="input-group-text" for="image">Upload</label>
            <input type="file" wire:model="image" class="form-control" id="image">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="m-2 btn btn-primary" data-bs-dismiss="modal">Submit</button>
    </form>
</div>
