@extends('layouts.app')

@section('container')
    <h1>{{ $maintitle }}</h1>

    <form action="/" method="GET" class="form-inline w-25 d-flex gap-2">
        <input type="search" placeholder="Search" name="search" class="form-control">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>

    <br>

    <table class="table table-striped">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Password</td>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user['name'] }}</td>
                <td>
                    @if (Hash::check('password', $user['password']))
                        {{ $user['name'] }}
                    @else
                        {{ $user['password'] }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
