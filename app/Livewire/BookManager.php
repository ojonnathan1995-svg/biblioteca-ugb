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
        $this->validate([
            'title'  => 'required|min:3',
            'author' => 'required|min:3',
            'year'   => 'required|digits:4',
        ], [
            'title.required'  => 'El título es obligatorio.',
            'author.required' => 'Escriba el nombre del autor.',
            'year.required'   => 'El año es obligatorio.',
            'year.digits'     => 'El año debe ser de 4 números.',
        ]);

        if ($this->isEditing) {
            $book = Book::find($this->book_id);
            $book->update([
                'title'  => $this->title,
                'author' => $this->author,
                'year'   => $this->year,
            ]);
            $this->isEditing = false;
        } else {
            Book::create([
                'title'  => $this->title,
                'author' => $this->author,
                'year'   => $this->year,
            ]);
        }

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