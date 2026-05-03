<div class="container mt-5">
    <div class="card shadow-sm mb-4">
        <div class="card-header text-center bg-primary text-white p-3">
            <h4 class="mb-0 fw-bold">📚 Gestión de Libros - UGB</h4>
        </div>
        <div class="card-body p-4" style="background-color: #f8f9fa;">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Título</label>
                    <input type="text" wire:model="title" class="form-control" placeholder="Ingrese el título">
                    @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Autor</label>
                    <input type="text" wire:model="author" class="form-control" placeholder="Nombre del autor">
                    @error('author') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Año</label>
                    <input type="text" wire:model="year" class="form-control" placeholder="Ej: 1995">
                    @error('year') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 mt-4">
                    <button wire:click="save" class="btn {{ $isEditing ? 'btn-warning' : 'btn-success' }} w-100 fw-bold py-2" style="background-color: #2d6a4f; border-color: #2d6a4f;">
                        {{ $isEditing ? 'Actualizar Cambios' : 'Guardar Libro' }}
                    </button>
                    @if($isEditing)
                        <button wire:click="$set('isEditing', false)" class="btn btn-link w-100 mt-2 text-muted">Cancelar edición</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th style="width: 40%">Título</th>
                    <th style="width: 30%">Autor</th>
                    <th style="width: 15%">Año</th>
                    <th style="width: 15%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($books as $book)
                <tr>
                    <td class="ps-3">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td class="text-center">
                        <span class="badge bg-info text-dark px-3" style="background-color: #74c0fc !important;">{{ $book->year }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button wire:click="edit({{ $book->id }})" class="btn btn-sm btn-outline-primary" title="Editar">
                                📝
                            </button>
                            <button wire:click="delete({{ $book->id }})" class="btn btn-sm btn-outline-danger" 
                                    onclick="confirm('¿Desea eliminar este registro?') || event.stopImmediatePropagation()" title="Eliminar">
                                🗑️
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>