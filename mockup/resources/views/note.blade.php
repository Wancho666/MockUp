<!-- resources/views/add-note.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Note</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Note</h2>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first('note') }}</div>
        @endif
        <form action="{{ route('store-note') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="note" class="form-label">Note:</label>
                <textarea name="note" id="note" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Note</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
