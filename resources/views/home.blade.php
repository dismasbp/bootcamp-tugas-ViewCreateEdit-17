<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <div class="container py-5">
        <h1 class="mb-4 fw-bold text-center">Laptop Showcase</h1>
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted mb-2">{{ $product->category->name }}</p>
                            <p class="card-text text-success fw-bold mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text text-muted mb-4 flex-grow-1">{{ Str::limit($product->description, 60) }}</p>
                            <a href="#" class="btn btn-success mt-auto" tabindex="-1" aria-disabled="true">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="m-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-guest-layout>
