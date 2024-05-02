<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Model</title>
</head>
<body>
    <h1>Edit Car Model</h1>

    <form action="{{ route('models.update', $carmodel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="manufacturer_id">Manufacturer:</label>
            <select name="manufacturer_id" id="manufacturer_id">
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == $carmodel->manufacturer_id ? 'selected' : '' }}>
                        {{ $manufacturer->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $carmodel->title }}" maxlength="100">
        </div>

        <button type="submit">Update</button>
    </form>


</body>
</html>
