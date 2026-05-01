<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookManager extends Component
{
    public $title, $author, $year;

    public function save()
    {
        $rules = [
            'title'  => 'required|min:3',
            'author' => 'required|min:3',
            'year'   => 'required|digits:4',
        ];

        $messages = [
            'title.required'  => 'El título del libro es obligatorio.',
            'title.min'       => 'El título debe tener al menos 3 letras.',
            'author.required' => 'Debes escribir el nombre del autor.',
            'year.required'   => 'El año es necesario para el registro.',
            'year.digits'     => 'El año debe ser de 4 números (ej: 1995).',
        ];

        $this->validate($rules, $messages);

        Book::create([
            'title'  => $this->title,
            'author' => $this->author,
            'year'   => $this->year,
        ]);

        $this->reset(['title', 'author', 'year']);
    }

    public function render()
    {
        return view('livewire.book-manager', [
            'books' => Book::latest()->get()
        ]);
    }
}