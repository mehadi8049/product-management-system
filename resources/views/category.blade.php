@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            @foreach($categories as $category)
            <div class="col-md-6">
                <div class="single-category">
                    <h3 class="fw-bold">{{ $category->name }}</h3>
                    <p class="m-0">Total Products: {{ $category->posts_count }}</p>
                </div>
            </div>
            @endforeach
            <nav aria-label="Page navigation example">
                {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
            </nav>
        </div>
    </div>
@endsection
