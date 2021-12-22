<div>
    <div wire:loading wire:target="create">
        <div class="clearfix">
            <div class="spinner-border float-end" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="create" class="card-body">
        @csrf

        <div class="form-group m-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" id="title" wire:model='title'
                placeholder="Post Title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group m-2">
            <label for="body">Body</label>
            <textarea type="text" class="form-control" id="body" wire:model='body'
                placeholder="Post Body">{{old('body')}}</textarea>
            @error('body') <span class="text-danger">{{ $message }}</span> @enderror
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

        <button id="liveToastBtn" type="submit" class="m-2 btn btn-primary" data-bs-dismiss="modal">Submit</button>

    </form>
</div>
