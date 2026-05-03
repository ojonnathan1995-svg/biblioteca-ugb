<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $isEditing ? 'Editar Libro' : 'Gestión de Libros - UGB' }}</h4>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Título</label>
                    <input type="text" wire:model="title" class="form-control">
                    @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Autor</label>
                    <input type="text" wire:model="author" class="form-control">
                    @error('author') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label">Año</label>
                    <input type="text" wire:model="year" class="form-control">
                    @error('year') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button wire:click="save" class="btn {{ $isEditing ? 'btn-warning' : 'btn-success' }} w-100">
                        {{ $isEditing ? 'Actualizar' : 'Guardar Libro' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <table class="table table-hover shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td><span class="badge bg-info text-dark">{{ $book->year }}</span></td>
                    <td class="text-center">
                        <button wire:click="edit({{ $book->id }})" class="btn btn-sm btn-outline-warning">Editar</button>
                        <button wire:click="delete({{ $book->id }})" class="btn btn-sm btn-outline-danger" onclick="confirm('¿Eliminar este libro?') || event.stopImmediatePropagation()">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>