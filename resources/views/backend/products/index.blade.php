
<x-layout.master>
<<<<<<< HEAD
    <div class="">
        <div class="card">
            <div class="card-header">
                product List 
             

                <a class="btn btn-sm btn-success float-end"  href="">Excel</a>

            <a class="btn btn-sm btn-primary float-end"  href="{{ route('product.pdf') }}">PDF</a>
                
             <a class="btn btn-sm btn-success float-end"  href="{{ route('product.create') }}">Add Product</a>
             <a class="btn btn-sm btn-warning float-end"  href="{{ route('product.trashlist') }}">Trash Items</a>
           
             @if (session('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Weldone!</strong> {{ session('message') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @endif
            <div class="card-body">
=======
    <div class="container">
       <div class="card-header ">
           Product List

       <a class="btn btn-sm btn-success float-end"  href="{{ route('product.excel') }}">Excel</a>

        <a class="btn btn-sm btn-success float-end"  href="{{ route('product.create') }}">Add Product</a>
        <a class="btn btn-sm btn-warning float-end"  href="{{ route('product.trashlist') }}">Recycle Bin</a>
>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7


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
                         <th class="text-center">Image</th>
                         <th class="text-center">Name</th>
                         <th class="text-center">Price</th>
                         <th class="text-center">Status</th>
                         <th class="text-center">Actions</th>
                     </tr>
                 </thead>
                 @php
                     $i=1;
                 @endphp
                 <tbody>
                     @foreach ($products as $product)
                         <tr>
                             <td class="text-center">{{ $i++ }}</td>
                             <td class="text-center">{{ $product->name }}</td>
                             <td class="text-center">{{ $product->image }}</td>
                             <td class="text-center">{{ $product->price }}</td>
                             <td class="text-center">{{ $product->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                             <td class="text-center d-flex justify-content-center">
                             
     
                                 <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">Show</a>
     
                                 <a  href="{{ route('product.edit',  $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
     
     

                            <form action="{{ route('product.destroy',   $product->id) }}" method="post" >
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
<<<<<<< HEAD
        </div>
=======
        @endif

        {{-- //delete alert --}}
      

       <div class="card-body">
       <table id="datatablesSimple">
            <thead>
                <tr>
                    <th class="text-center">Ser No</th>
                    <th class="text-center">Name</th>

                    <th class="text-center">Price</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Actions</th>
                </tr>
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
                        <td class="text-center">{{ $product->unit }}</td>

                        <td class="text-center d-flex justify-content-center">

                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">Show</a>

                            <a  href="{{ route('product.edit',  $product->id) }}" class="btn btn-sm btn-warning">Edit</a>


                            <form action="{{ route('product.destroy',   $product->id) }}" method="post" >
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
>>>>>>> 911ae2c989d5f72db8e6b89ae2b1947e2209eef7
    </div>

</x-layout.master>
