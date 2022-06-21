<x-layout.master>
    <div class="container">


        <div class="card-header"> Category Information

            <a  href="{{ route('product.index') }}" class="btn btn-sm btn-primary float-end">Product List</a>
        </div>

        <div class="card-body">


            @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))

            <img src="{{ asset('storage/products/'.$product->image) }}" height="100">

            @else
               <img src="{{ asset('img/default.png') }}" />
            @endif



            <p>Name :   {{ $product->name ?? ' No name' }}</p>
            <p>Price :   {{ $product->price ?? ' No price' }}</p>
            
        </div>

    </div>
</x-layout.master>
