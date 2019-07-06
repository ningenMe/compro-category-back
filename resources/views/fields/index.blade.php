<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Hello World!</h1>
        @foreach ($fields as $field)
            {{$field->id." ".$field->name }}
            <a href={{'/fields/'.$field->id}}>url<a><br />
        @endforeach

        <form name="createform" action="fields/create" method="post">
            {{ csrf_field() }}
        
            name:<br /> 
            <input type = "text" name = "name" size = "10"><span>{{ $errors->first('name') }}</span><br />
            order:<br />
            <input type = "text" name = "order" size = "10"><span>{{ $errors->first('order') }}</span><br />
            <button type='submit' name='action' value='send'>送信</button>
        </form>

    </body>
</html>
