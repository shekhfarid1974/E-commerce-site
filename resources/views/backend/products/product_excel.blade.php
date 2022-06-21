<table>
    <thead>
    <tr>
        <th>Ser No</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>#</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>