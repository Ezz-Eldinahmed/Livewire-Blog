<div>
    <p> Are You Sure You Want Delete {{$post->title}}</p>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

    <button wire:click="delete" class="float-end btn btn-primary" data-bs-dismiss="modal"><i
            class="fa fa-trash"></i></button>
</div>
