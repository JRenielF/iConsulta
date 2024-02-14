<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/css/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>iConsulta</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
    </div>
        @endif
    </div>
    <div><table border='1'>
        <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Suffix</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Services</th>
        <th>Edit</th>
        <th>Delete</th>

        </tr>
        @foreach($Information as $key => $information)
        <tr>
            <td>{{$information->first_name}}</td>
            <td>{{$information->middle_name}}</td>
            <td>{{$information->last_name}}</td>
            <td>{{$information->suffix}}</td>
            <td>{{$information->email}}</td>
            <td>{{$information->phone}}</td>
            <td>{{$information->service}}</td>
            <td>
                <a href="{{ route('information.edit', ['information' => $information->id]) }}">Edit</a>
            </td>    
            <td>
                <form id="deleteForm_{{ $information->id }}" method="post" action="{{ route('information.destroy', ['information' => $information]) }}">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="confirmDelete({{ $information->id }})">Delete</button>
                </form>
            </td>
            
        </tr>
            
        @endforeach
    

    </div>
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this information?')) {
                document.getElementById('deleteForm_' + id).submit();
            }
        }
    </script>
    
</body>
</html>