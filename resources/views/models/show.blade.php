<!DOCTYPE html>
<html>
<head>
    <title>Car Model Information</title>
</head>
<body>
    <h1>Car Model Information</h1>
    

    <h2><?php echo $carmodel->title; ?></h2>
    <p>Manufacturer: <?php echo $carmodel->manufacturer->title; ?></p>

    
    @foreach ($carmodel->cars()->with('color')->getEager() as $car)
            <p>Car: {{$car->color()->first()->title}}</p>
    @endforeach

</body>
</html>
