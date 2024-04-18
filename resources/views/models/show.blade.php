<!DOCTYPE html>
<html>
<head>
    <title>Car Model Information</title>
</head>
<body>
    <h1>Car Model Information</h1>
    

    <h2><?php echo $carModel->title; ?></h2>
    <p>Manufacturer: <?php echo $carModel->manufacturer->title; ?></p>

    
    @foreach ($carModel->cars()->with('color')->getEager() as $car)
            <p>Car: {{$car->color()->first()->title}}</p>
    @endforeach

    <?php 1/0; ?>
</body>
</html>
