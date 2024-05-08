@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="container">
        <div class="products mb-3">
            @foreach($products as $product)
                <div class="__single">
                <div class="image">
                    <img class="w-100" src="{{ $product->image.($loop->index+1) }}" alt="">
                </div>
                <div>
                    <h2>{{ $product->title }} Updated In {{ $product->updated_at->format('Y')}}</h2>
                    <p>Created by: {{ $product?->user?->name }} User Type: {{ ucfirst($product?->user?->user_type) }}</p>
                    <div>
                        <p class="fw-bold m-0">Categories:</p>
                        <div>
                            @foreach($product->categories as $category)
                                <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold m-0">Features:</p>
                        <ul>
                            @foreach($product->features as $feature)
                                <li class="text-capitalize">{{ $feature->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example mt-2">
            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            {{-- <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> --}}
        </nav>
    </div>

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>
@endsection
