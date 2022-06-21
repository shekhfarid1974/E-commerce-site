
<x-layout.master>
    <div class="" >
        <div class="card">
            <div class="card-header">
                Product Trash List 

                <a  class="btn btn-sm btn-primary"  href="{{ route('product.index') }}">Product List </a>
                        
             @if (session('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Weldone!</strong> {{ session('message') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @endif
            <div class="card-body">
            <table id="datatablesSimple">
                 <thead>
<<<<<<< HEAD
                     <tr>
                         <th class="text-center">Ser No</th>
                         <th class="text-center">Name</th>
                         <th class="text-center">Image</th>
                         <th class="text-center">Price</th>
                         <th class="text-center">Status</th>
                         <th class="text-center">Actions</th>
                     </tr>
=======
                    <tr>
                        <th class="text-center">Ser No</th>
                        <th class="text-center">Name</th>
    
                        <th class="text-center">Price</th>
                        <th class="text-center">Unit</th>
                        <th class="text-center">Actions</th>
                    </tr>
>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7
                 </thead>
                 @php
                     $i=1;
                 @endphp
                 <tbody>
                     @foreach ($products as $product)
                         <tr>
                             <td class="text-center">{{ $i++ }}</td>
                             <td class="text-center">{{ $product->name }}</td>
                             <td class="text-center">{{ $product->price }}</td>
<<<<<<< HEAD
                             <td class="text-center">{{ $product->is_active == 1 ? 'Active' : 'Inactive' }}</td>
=======
                             <td class="text-center">{{ $product->unit }}</td>
                             
>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7
                             <td class="text-center d-flex justify-content-center">
     
     
                                 <a  href="{{ route('product.restore', $product->id) }}" class="btn btn-sm btn-warning">Restore</a>
     
     

                            <form action="{{ route('product.delete', $product->id) }}" method="post" >
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
