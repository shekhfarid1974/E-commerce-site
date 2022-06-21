<x-layout.master>
    <div class="container">


        <div class="card-header">Edit Category

            <a  href="{{ route('category.index') }}" class="btn btn-sm btn-primary float-end">Category List</a>
        </div>

        <div class="card-body">

            <form action="{{ route('category.update', $category->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input 

                    type="text" 
                    class="form-control" 
                    name="title" 
                    id="title" 
                    value="{{ $category->title ?? ' ' }}"
                    
                    />
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="text form-control"  id="description" name="description">{{ $category->description ?? '' }}</textarea>
                </div>

                
                <div class="mb-3">
                  <label for="img">Image</label>
                  <input type="file" id="img"  class="form-control" name="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>  Save</button>

                  
              </form>
        </div>


    </div>
</x-layout.master>
