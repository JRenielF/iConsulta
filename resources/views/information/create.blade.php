<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Information</title>
</head>
<body>
    <h1>Create Information</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('information.store') }}">
        @csrf

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <div>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
        </div>

        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div>
            <label for="suffix">Suffix:</label>
            <input type="text" id="suffix" name="suffix" value="{{ old('suffix') }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <div>
            <label for="service">Service:</label>
            <select id="service" name="service" required>
                <option value="STUDY">Study</option>
                <option value="WORK">Work</option>
                <option value="LIVE">Live</option>
            </select>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
