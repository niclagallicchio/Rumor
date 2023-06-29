<x-main>
    <div class="container mt-5">
        <h1>Benvenuto</h1>

        <div class="mt-5">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-danger">Esci</button>
            </form>
        </div>
    </div>
</x-main>