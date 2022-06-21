<x-layout.master>


    <div class="container">
        <h4> Create Color </h4>
        <form action="{{ route('color.store') }}" method="POST">
            @csrf

            <label>Name</label>
            <input name="name" type="text" class="form-control"/>
            <button type="submit" class="mt-3">Save </button>

            <a class="btn btn-sm btn-primary"  href="{{ route('color.index') }}"> Back </a>


        </form>
    </div>


</x-layout.master>