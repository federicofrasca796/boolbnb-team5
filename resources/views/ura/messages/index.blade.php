@extends('layouts.ura')

@section('content')
<div class="ura_message_header w-100 py-4 mb-2">
    <div class="w-85 m-auto">
        <h1 class="text-white">All Messages</h1>
    </div>
</div>
<div class="container_ura_index my-5  p-2 p-md-0 m-auto">

    @if ($messages->count() > 0)
    <div class="table w-100">
        <div class="thead w-100">
            <div class="table-row w-100 d-flex">
                <div class="table-cell col-1 d-none d-md-block">Id</div>
                <div class="table-cell col-2 d-none d-md-block">Name</div>
                <div class="table-cell col-md-3 col-5">Email</div>
                <div class="table-cell col-md-3 col-4">Apartment</div>
                <div class="table-cell col-md-2 col-3 text-md-start text-end">Date</div>
                <div class="table-cell col-1 d-none d-md-block">Actions</div>
            </div>
        </div>
        <div class="tbody">
            @foreach ($messages as $message)
            <a href="{{ route('ura.messages.show', $message->id) }}">
                <div class="table-row w-100 d-flex {{$loop->odd ? 'bg-lightgrey' : ''}}">
                    <div class="table-cell col-1 d-none d-md-block">{{ $message->id }}</div>
                    <div class="table-cell col-2 d-none d-md-block">{{ $message->name }}</div>
                    <div class="table-cell col-md-3 col-5">{{ $message->mail }}</div>
                    <div class="table-cell col-md-3 col-4">{{ $message->apartment->title }}</div>
                    <div class="table-cell col-md-2 col-3 text-md-start text-end">{{$message->created_at}}</div>
                    <div class="table-cell col-1 d-none d-md-block px-4"><i class="fa-solid fa-eye fs-4"></i></div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
    @else
    <h2 class="text-center">Sorry, you have no messages yet.</h2>
    @endif
    <div class="d-flex justify-content-center">
        {{ $messages->links() }}
    </div>
</div>



@endsection