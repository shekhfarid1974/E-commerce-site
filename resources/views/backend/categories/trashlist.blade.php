
<x-layout.master>
    <div class="" >
        <div class="card">
            <div class="card-header">
                Category Trash List 

                <a  class="btn btn-sm btn-primary"  href="{{ route('category.index') }}">Category List </a>
                        
             @if (session('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Weldone!</strong> {{ session('message') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @endif
            <div class="card-body">
            <table id="datatablesSimple">
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
     
     
                                 <a  href="{{ route('category.restore', $category->id) }}" class="btn btn-sm btn-warning">Restore</a>
     
     

                            <form action="{{ route('category.delete', $category->id) }}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete?')">Permanent Delete</button>
                                </form>

                             </td>     
                         </tr>
                     @endforeach  
                 </tbody>
             </table>
            </div>
        </div>
    </div>



    <style>

        .card {
            background-color: rgb(237, 198, 198) !important;
        }
    </style>
</x-layout.master>
