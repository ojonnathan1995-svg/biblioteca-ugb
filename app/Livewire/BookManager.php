<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookManager extends Component
{
    public $title, $author, $year, $book_id;
    public $isEditing = false; 

    public function save()
    {
        // Tus reglas de validación originales
        $rules = [
            'title'  => 'required|min:3',
            'author' => 'required|min:3',
            'year'   => 'required|digits:4',
        ];

        // Tus mensajes personalizados
        $messages = [
            'title.required'  => 'El título del libro es obligatorio.',
            'title.min'       => 'El título debe tener al menos 3 letras.',
            'author.required' => 'Debes escribir el nombre del autor.',
            'year.required'   => 'El año es necesario para el registro.',
            'year.digits'     => 'El año debe ser de 4 números.',
        ];

        $this->validate($rules, $messages);

        if ($this->isEditing) {
            // Lógica para ACTUALIZAR
            $book = Book::find($this->book_id);
            $book->update([
                'title'  => $this->title,
                'author' => $this->author,
                'year'   => $this->year,
            ]);
            $this->isEditing = false;
        } else {
            // Lógica para GUARDAR NUEVO
            Book::create([
                'title'  => $this->title,
                'author' => $this->author,
                'year'   => $this->year,
            ]);
        }

        // Limpiamos los campos
        $this->reset(['title', 'author', 'year', 'book_id']);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->year = $book->year;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        Book::destroy($id);
    }

    public function render()
    {
        return view('livewire.book-manager', [
            'books' => Book::latest()->get()
        ]);
    }
}