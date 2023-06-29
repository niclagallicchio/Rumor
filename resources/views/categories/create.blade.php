<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <h1>Categorie</h1>

                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control">
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