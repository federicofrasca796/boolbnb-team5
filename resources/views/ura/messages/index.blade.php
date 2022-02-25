@extends('layouts.ura')

@section('content')
    <div class="container">
        <h1 class="text-center pb-3">All messages</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Appartamento</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td scope="row">{{ $message->name }}</td>
                        <td>{{ $message->mail }}</td>
                        <td>{{ $message->apartment->title }}</td>
                        <td><a href="{{ route('ura.messages.show', $message->id) }}">ieye</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $messages->links() }}
        </div>
    </div>
@endsection
