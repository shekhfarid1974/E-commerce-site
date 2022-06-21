<x-layout.master>
    <div class="container">


        <div class="card-header"> Category Information

            <a  href="{{ route('category.index') }}" class="btn btn-sm btn-primary float-end">Category List</a>
        </div>

        <div class="card-body">


            @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))

            <img src="{{ asset('storage/categories/'.$category->image) }}" height="100">

            @else
               <img src="{{ asset('img/default.png') }}" />
            @endif



            <p>Title :   {{ $category->title ?? ' No title' }}</p>
            <p>Description :   {{ $category->description ?? ' No title' }}</p>
        </div>

    </div>
</x-layout.master>
