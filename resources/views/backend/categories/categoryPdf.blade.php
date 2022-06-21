
{{-- Checking infinite problem --}}
 <table>
    <thead>
        <tr>
            <th class="text-center">Ser No</th>
            <th class="text-center">Title</th>
            <th class="text-center">Description</th>
            <th class="text-center">Image</th>
            <th class="text-center">Status</th>
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

                <td>

                    @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))

                    <img src="{{ asset('storage/categories/'.$category->image) }}" height="100">
        
                    @else
                       <img src="{{ asset('img/default.png') }}" />
                    @endif

                </td>
                <td class="text-center">{{ $category->is_active == 1 ? 'Active' : 'Inactive' }}</td>    
            </tr>
        @endforeach  
    </tbody>
</table>


<style>

    table, th , td {
        padding: 20px;
        border: 1px solid black;
        border-collapse: collapse;   
    }

    table{
        width:100%;
    }


</style>
