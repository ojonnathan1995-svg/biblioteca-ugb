<table class="table table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>
                <button wire:click="edit({{ $book->id }})" class="btn btn-warning btn-sm">
                    Editar
                </button>
                <button wire:click="delete({{ $book->id }})" class="btn btn-danger btn-sm" onclick="confirm('¿Seguro que deseas eliminarlo?') || event.stopImmediatePropagation()">
                    Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>