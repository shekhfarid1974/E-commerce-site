
<x-layout.master>
    <div class="">

        <div class="card">
            <div class="card-header">
                brand List 
             
            <a class="btn btn-sm btn-primary float-end"  href="#">PDF</a>
                
            
           
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
                         <th class="text-center">Name</th>
                         <th class="text-center">Actions</th>
                     </tr>
                 </thead>
                 @php
                     $i=1;
                 @endphp
                 <tbody>
                    @isset($brands)
                        @foreach ($brands as $brand)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $brand->name }}</td>
                            
                                <td class="text-center">

                                
                                </td>     
                            </tr>
                        @endforeach 
                    @endisset
                     
                 </tbody>
             </table>
            </div>
        </div>

    


    </div>
</x-layout.master>
