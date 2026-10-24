
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            padding: 35px 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
        }

        .add-btn {
            background: #2563eb;
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
        }

        .add-btn:hover {
            background: #1d4ed8;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 22px;
        }

        .stats {
            display: inline-block;
            min-width: 220px;
        }

        .stats-label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .stats-number {
            color: #2563eb;
            font-size: 32px;
            font-weight: bold;
        }

        .table-heading {
            font-size: 21px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        th, td {
            padding: 16px 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn, .delete-btn {
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-btn {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .delete-btn {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            border-radius: 7px;
            padding: 13px 16px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 23px;
            }

            .card {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Student Management System</h1>
            <p class="subtitle">Manage your student records easily.</p>
        </div>

        <a href="/student/create" class="add-btn">
            + Add New Student
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card stats">
        <p class="stats-label">TOTAL STUDENTS</p>
        <p class="stats-number">{{ $student->count() }}</p>
    </div>

    <div class="card">
        <h2 class="table-heading">All Students</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($student as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->age }}</td>

                            <td>
                                <div class="actions">
                                    <a
                                        href="/student/{{ $student->id }}/edit"
                                        class="edit-btn">
                                        Edit
                                    </a>

                                    <form
                                        action="/student/{{ $student->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                No students found. Click "Add New Student"
                                to add your first student.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
