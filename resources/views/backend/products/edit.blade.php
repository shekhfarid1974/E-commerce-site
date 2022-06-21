<x-layout.master>
    <div class="container">


        <div class="card-header">Edit Product

            <a  href="{{ route('product.index') }}" class="btn btn-sm btn-primary float-end">Product List</a>
        </div>

        <div class="card-body">

            <form action="{{ route('product.update', $product->id ) }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input

                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="{{ $product->name ?? ' ' }}"

                    />
                </div>



                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <textarea class="text form-control"  id="price" name="price">{{ $product->price ?? '' }}</textarea>
                  </div>


               
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>  Save</button>


              </form>
        </div>


    </div>
</x-layout.master>
