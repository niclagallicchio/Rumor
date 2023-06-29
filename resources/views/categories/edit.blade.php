                        
<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">

                <h1>Modifica una nuova categoria</h1>

                <x-success />
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Nome categoria</label>
                            <input type="text" name="name" id="name" maxlength="150"
                                   class="form-control" value="{{old('name', $category->name)}}">
                        
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Salva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>