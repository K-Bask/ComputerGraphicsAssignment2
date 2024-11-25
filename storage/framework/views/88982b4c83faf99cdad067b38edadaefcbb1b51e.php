<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">
    <h3 class="text-center mb-4">Original and Transformed Image</h3>
    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <h5>Original Image</h5>
            <img src="<?php echo e(asset('storage/original_image.jpg')); ?>" class="img-fluid rounded" alt="Original Image">
        </div>
        <div class="col-md-5 text-center">
            <h5>Transformed Image</h5>
            <img src="<?php echo e(asset('storage/transformed_image.jpg')); ?>" class="img-fluid rounded" alt="Transformed Image">
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary">Go Back</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html><?php /**PATH C:\Temporary D\Web Programming\xampp\htdocs\Laravel\resources\views/imageresult.blade.php ENDPATH**/ ?>