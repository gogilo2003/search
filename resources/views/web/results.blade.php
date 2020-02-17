@extends('admin::web.layout.main')

@section('title')
	Search Results
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Search</li>
@endsection

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <h2>Search</h2>
            <p>Found {{ $results->count() }} items.</p>
            <hr>
        </div>
        @foreach ($results as $result)
            <div class="col-md-12">
                {!! $result->title !!}
                <a href="{{ $result->url }}">Read</a>
            </div>
        @endforeach
	</div>
</div>
@endsection
