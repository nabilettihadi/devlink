@extends('layouts.app')

@section('content')
    <h1>{{ isset($link) ? 'Edit Link' : 'Add Link' }}</h1>
    <form method="POST" action="{{ isset($link) ? route('links.update', $link->id) : route('links.store') }}">
        @csrf
        @isset($link)
            @method('PUT')
        @endisset
        <input type="text" name="title" value="{{ old('title', isset($link) ? $link->title : '') }}" placeholder="Title">
        <input type="url" name="url" value="{{ old('url', isset($link) ? $link->url : '') }}" placeholder="URL">
        <textarea name="description" placeholder="Description">{{ old('description', isset($link) ? $link->description : '') }}</textarea>
        <button type="submit">{{ isset($link) ? 'Update' : 'Save' }}</button>
    </form>
@endsection
