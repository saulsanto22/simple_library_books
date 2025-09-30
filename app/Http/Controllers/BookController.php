<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Search by title or author
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
            });
        }

        $books = $query->orderBy('created_at', 'desc')->paginate(10);

        return ResponseFormatter::paginated(
            BookResource::collection($books)->resource,
            'Books retrieved successfully'
        );
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return ResponseFormatter::success(
            new BookResource($book),
            'Book created successfully',
            201
        );
    }

    public function show(Book $book)
    {
        return ResponseFormatter::success(
            new BookResource($book),
            'Book retrieved successfully'
        );
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return ResponseFormatter::success(
            new BookResource($book),
            'Book updated successfully'
        );
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return ResponseFormatter::success(null, 'Book deleted successfully');
    }
}
