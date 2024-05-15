@extends('layouts.app')

@section('content')
    <h1>Edit Profile</h1>
    <form method="POST" action="{{ route('users.update', Auth::id()) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Name">
        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Save Changes</button>
    </form>
@endsection
