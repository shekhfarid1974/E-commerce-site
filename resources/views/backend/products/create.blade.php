<x-layout.master>
  <div class="container">

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

      <div class="card-header">Create Product

          <a  href="{{ route('product.index') }}" class="btn btn-sm btn-primary float-end">Product List</a>
      </div>

      <div class="card-body">

          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                  type="text" 
                  class="form-control" 
                  name="title" 
                  id="title" 
                  value="{{ old('title') }}"

                  />

                @error('title')
                  <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <textarea class="text form-control"  id="name" name="name"></textarea>

                @error('name')
                  <span class="text-danger"> {{ $message }}</span>
                @enderror
              </div>

              
              <div class="mb-3">
                <label for="img">Image</label>
                <input type="file" id="img"  class="form-control" name="image" accept="image/*">
              </div>
              <div class="mb-3">
                <label for="img">Price</label>
                <textarea class="text form-control"  id="price" name="price"></textarea>

              </div>

              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>  Save</button>
               <a class="btn btn-danger" href="{{ route('product.index') }}" ><i class="fa-solid fa-x"> </i>  Cancel</a> 

                
            </form>
      </div>


  </div>
</x-layout.master>
