<!DOCTYPE html>
<html>

<head>
    <title>Car Model Information</title>
    <style>
        /* Breadcrumb styling */
        .breadcrumb {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            margin-right: 10px;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #007bff;
        }

        .breadcrumb-item a:hover {
            color: #0056b3;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <x-flash-message />
    <!-- Breadcrumb navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('automobiles.index') }}">Models</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $carmodel->title }}</li>
        </ol>
    </nav>
    <h1>Car Model Information</h1>


    <h2><?php echo $carmodel->title; ?></h2>
    <p>Manufacturer: <?php echo $carmodel->manufacturer->title; ?></p>

    @can('edit-carmodels')
        <p style='color:green'>The gate function allows you to change the model data!</p>
    @endcan
    
    @can('update', $carmodel)
        <p style='color:green'>The policy allows you modify the model data!</p>
    @endcan

    @auth
        <a href="<?php echo route('models.edit', $carmodel->id); ?>">Edit</a>    
    @endauth
    
   



    @foreach ($carmodel->cars()->with('color')->getEager() as $car)
        <p>Car: {{ $car->color()->first()->title }}</p>
    @endforeach

</body>

</html>
