<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<iframe src="{{ $data->file }}" width="100%" height="1000">
    This browser does not support PDFs.
   <a href="{{ $data->file }}">Download PDF</a>.
</iframe>

</body>
</html>
