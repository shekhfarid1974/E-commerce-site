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

        <div class="card-header">Create Category

            <a  href="{{ route('category.index') }}" class="btn btn-sm btn-primary float-end">Category List</a>
        </div>

        <div class="card-body">

            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
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
                  <label for="description" class="form-label">Description</label>
                  <textarea class="text form-control"  id="ckeditor" name="description"></textarea>

                  @error('description')
                    <span class="text-danger"> {{ $message }}</span>
                  @enderror
                </div>

                
                <div class="mb-3">
                  <label for="img">Image</label>
                  <input type="file" id="img"  class="form-control" name="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>  Save</button>
                 <a class="btn btn-danger" href="{{ route('category.index') }}" ><i class="fa-solid fa-x"> </i>  Cancel</a> 

                  
              </form>
        </div>


    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
      CKEDITOR.replace( 'ckeditor' );
   </script>
    
</x-layout.master>
