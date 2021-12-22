@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="row">
        <div class="col-lg-4 pt-3 bg-primary">
            <div class="card mb-4">
                <div class="card-body">
                    @if (isset($user->profileImage['image']))
                    <img src="/storage/{{$user->profileImage['image']}}" class="rounded-circle img-fluid"
                        style="width: 150px;">
                    @else
                    <img class="rounded-circle img-fluid" style="width: 150px;"
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp">
                    @endif

                    <h5 class="my-3">{{$user->name}}</h5>
                    <p class="text-muted mb-1">{{$user->email}}</p>
                    <p class="text-muted mb-4">Joined {{$user->created_at->diffForHumans()}}</p>
                    <div class="mb-2">

                        @can('addPic',$user)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Change Profile Picture
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @livewire('user-profile-picture',['user'=>$user])
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @foreach ($user->posts as $post)
            <div class="card mb-3">
                @if (isset($post->image['image']))
                <img src="/storage/{{$post->image['image']}}" class="card-img-top">
                @else
                <img class="card-img-top"
                    src="https://images.unsplash.com/photo-1521575107034-e0fa0b594529?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cG9zdHxlbnwwfHwwfHw%3D&w=1000&q=80">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->body}}</p>
                    <p class="card-text">
                        <small class="text-muted">Last updated {{$post->updated_at->diffForHumans()}}</small>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
