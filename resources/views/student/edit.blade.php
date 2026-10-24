
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

    <h2>Edit Student</h2>

    <form action="/student/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name"
               value="{{ $student->name }}" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email"
               value="{{ $student->email }}" required>
        <br><br>

        <label>Age:</label>
        <input type="number" name="age" min="1"
               value="{{ $student->age }}" required>
        <br><br>

        <button type="submit">Update Student</button>
    </form>

</body>
</html>
