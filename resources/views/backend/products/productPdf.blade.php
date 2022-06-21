

 <table>
    <thead>
        <tr>
            <th class="text-center">Ser No</th>
            <th class="text-center">Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
           
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