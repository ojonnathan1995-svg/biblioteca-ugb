<div class="container mt-4">
    <div class="text-center mb-4">
        <h1>📚 Mi Biblioteca</h1>
        <p class="text-muted">Administra tus libros fácilmente</p>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $isEditing ? 'Editar libro' : 'Agregar libro' }}</h5>
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" wire:model="title" class="form-control" placeholder="Título">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="author" class="form-control" placeholder="Autor">
                    @error('author') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-2">
                    <input type="text" wire:model="year" class="form-control" placeholder="Año">
                    @error('year') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-2">
                    <button wire:click="save" class="btn {{ $isEditing ? 'btn-warning' : 'btn-primary' }} w-100">
                        <i class="bi bi-download"></i> {{ $isEditing ? 'Actualizar' : 'Guardar' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h5 class="mb-0">Libros</h5>
            <span class="badge bg-primary rounded-pill">{{ $books->count() }}</span>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($books as $book)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $book->title }}</strong><br>
                    <small class="text-muted">{{ $book->author }}</small>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge bg-secondary me-3">Libro</span>
                    <button wire:click="edit({{ $book->id }})" class="btn btn-sm btn-outline-warning me-1">
                        Editar
                    </button>
                    <button wire:click="delete({{ $book->id }})" class="btn btn-sm btn-outline-danger" onclick="confirm('¿Eliminar?') || event.stopImmediatePropagation()">
                        Eliminar
                    </button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>