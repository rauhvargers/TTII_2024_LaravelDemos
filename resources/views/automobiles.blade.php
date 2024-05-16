<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile statistics</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <x-flash-message />
    <h1>Automobile statistics tool</h1>
    <form method="GET">
        <fieldset>
            <legend>Filtering options</legend>

            <?php if (isset($error)) { ?>
            <div class="error">
                <?php echo htmlspecialchars($error); ?>
            </div>
            <?php } ?>

            <select name="manufacturer" id="manufacturer">
                <option value="">Pick a brand</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}"
                        {{ $selectedmanufacturer == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->title }}
                    </option>
                @endforeach
            </select>

            <select name="country" id="country">
                <option value="">Pick a country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $selectedcountry == $country->id ? 'selected' : '' }}>
                        {{ $country->title }}</option>
                @endforeach
            </select>

            <label for="year">Production year</label>
            <input type="number" name="year" min="2010" max="2020" value="{{ $selectedyear }}" />

            <button type="submit">Apply filters </button>
        </fieldset>

    </form>

    <section id="main">
        <?php if (sizeof($results) > 0) {
        ?>
        <table>
            <tr>
                <th>Brand/Manufacturer</th>
                <th>Model</th>
                <th>Color</th>
                <th>Count</th>
            </tr>

            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->manufacturer }}</td>
                    <td><a href='{{ route("models.show", $result->model_id) }}'>{{ $result->model }}</a></td>
                    <td>{{ $result->color }}</td>
                    <td>{{ $result->count }}</td>
                </tr>
            @endforeach


        </table>
        <?php
        }
        ?>
    </section>
    <x-page-footer>
        Whatever exta you want to add.
        <x-slot name="author">Krišs Rauhvargers</x-slot>
        <x-slot name="year">2019</x-slot>
    </x-page-footer>

</body>

</html>
