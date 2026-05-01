<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Gestión de Libros - UGB</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Título</label>
                        <input type="text" wire:model="title" class="form-control">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Autor</label>
                            <input type="text" wire:model="author" class="form-control">
                            @error('author') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Año</label>
                            <input type="number" wire:model="year" class="form-control">
                            @error('year') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar Libro</button>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th class="text-center">Año</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td class="text-center">
                            <span class="badge bg-info text-dark">{{ $book->year }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>