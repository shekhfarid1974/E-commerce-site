<x-layout.master>
   

    <div class="container">

        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Weldone!</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <a class="btn btn-sm btn-primary"  href="{{ route('color.create') }}"> Add Color </a>


        <table class="table table bordered">
            <thead>
                <tr>
                    <th>Ser No</th>
                    <th> Name</th>
                    <th> Actions</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($colors as $color)
                    <tr>
                        <td>#</td>
                        <td>{{ $color->name }}</td>
                        <td>

                            <a class="btn btn-sm btn-primary"> Show </a>   


                            <a class="btn btn-sm btn-warning" href="{{ route('color.edit',$color->id ) }}"> Edit </a>


                            <a class="btn btn-sm btn-danger"> Delete </a>
                        </td>
                    </tr>
                @endforeach

              

            </tbody>
        </table>



    </div>



</x-layout.master>