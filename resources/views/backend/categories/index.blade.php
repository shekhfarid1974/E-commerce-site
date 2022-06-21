
<x-layout.master>
    <div class="">
        <div class="card">
            <div class="card-header">
                Category List 
             

                <a class="btn btn-sm btn-success float-end"  href="{{ route('category.excel') }}">Excel</a>

            <a class="btn btn-sm btn-primary float-end"  href="{{ route('category.pdf') }}">PDF</a>

            @can('create-category')
            
            <a class="btn btn-sm btn-success float-end"  href="{{ route('category.create') }}">Add Category</a>

            @endcan
                
            



             <a class="btn btn-sm btn-warning float-end"  href="{{ route('category.trashlist') }}">Trash Items</a>
           
             @if (session('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Weldone!</strong> {{ session('message') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @endif
            <div class="card-body">


                <div class="container">

                    <form  action="" method="GET" class="d-flex mb-5">

                        <input type="text" name="keyword" placeholder="Search Here " class="form-control"/>

                        <button class="btn btn-sm btn-primary">Search </button>

                    </form>

                </div>



            <table id="" class="table table-bordered">
                 <thead>
                     <tr>
                         <th class="text-center">Ser No</th>
                         <th class="text-center">Title</th>
                         <th class="text-center">Description</th>
                         <th class="text-center">Status</th>
                         <th class="text-center">Actions</th>
                     </tr>
                 </thead>
                 @php
                     $i=1;
                 @endphp
                 <tbody>
                     @foreach ($categories as $category)
                         <tr>
                             <td class="text-center">{{ $i++ }}</td>
                             <td class="text-center">{{ $category->title }}</td>
                            
                             <td class="text-center">{{ $category->description }}</td>
                             <td class="text-center">{{ $category->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                             <td class="text-center d-flex justify-content-center">
     
                                 <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-primary">Show</a>
     
                                 <a  href="{{ route('category.edit',  $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
     
     

                            <form action="{{ route('category.destroy',   $category->id) }}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete?')">Delete</button>
                                </form>

                             </td>     
                         </tr>
                     @endforeach  
                 </tbody>
             </table>
            </div>
        </div>
    </div>

</x-layout.master>
