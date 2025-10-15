<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles FROM SERVER 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">My Articles</a>
    </div>
</nav>

<h2>Articles FROM {{gethostname()}}</h2>

<div class="container">

    {{-- Add Article Form --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add New Article</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter article title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="3" class="form-control" placeholder="Enter article content"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Article</button>
            </form>
        </div>
    </div>

    {{-- List Articles --}}
    <h3 class="mb-3">Articles List</h3>
    <div class="row">
        @forelse ($articles as $article)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Created {{ $article->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No articles yet. Add one above!</p>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

