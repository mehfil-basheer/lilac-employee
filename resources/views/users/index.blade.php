<!DOCTYPE html>
<html>
<head>
    <title>Employee Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <form method="GET" action="{{ route('users.index') }}">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search name/designation/department">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="row mt-4">
        @foreach($users as $user)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->designation->name }}</p>
                        <p>{{ $user->department->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input[name="search"]').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('users.index') }}",
                type: "GET",
                data: { search: query },
                success: function(data) {
                    $('body').html(data);
                }
            });
        });
    });
</script>
</body>
</html>
