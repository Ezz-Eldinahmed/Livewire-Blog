<div>
    @foreach ($posts as $post)
    <div class="card m-2">
        @if (isset($post->image['image']))
        <img src="storage/{{$post->image['image']}}" class="card-img-top">
        @else
        <img class="card-img-top"
            src="https://images.unsplash.com/photo-1521575107034-e0fa0b594529?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cG9zdHxlbnwwfHwwfHw%3D&w=1000&q=80">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <div class="float-end">

                <h5>By : <a href="{{route('profile',$post->user)}}"> {{$post->user->name}} </a></h5>

                @can('update' ,$post)

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-{{$post->id}}">
                    <i class="fa fa-trash"></i>
                </button>

                <div class="modal fade" id="modal-{{$post->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Delete Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('post.delete' ,['post' =>$post],key($post->id))
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalEdit-{{$post->id}}">
                    <i class="fas fa-edit"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalEdit-{{$post->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @livewire('post.update' ,['post' =>$post],key($post->id))
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>

            <p class="card-text">{{$post->body}}</p>
            <p class="card-text">
                <small class="text-muted">Last updated {{$post->updated_at->diffforhumans()}}</small>
            </p>
        </div>
    </div>
    @endforeach
</div>
