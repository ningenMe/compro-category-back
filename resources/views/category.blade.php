<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        @foreach ($fields as $field)
            {{$field->id}}<br />
        @endforeach
    </body>
</html>
