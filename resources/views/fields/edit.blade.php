<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

    <a href='/fields'>もどる<a>
    <form name="createform" action= {{ $field->id.'/update' }} method="post">
        {{ csrf_field() }}
    
        id:{{ $field->id }}<br />

        name:<br /> 
        <input type = "text" name = "name" size = "10" value={{$field->name}}>
        <span>{{ $errors->first('name') }}</span><br />
        
        order:<br />
        <input type = "text" name = "order" size = "10" value={{$field->order}}>
        <span>{{ $errors->first('order') }}</span><br />
        
        <button type='submit' name='action' value='send'>送信</button>
    </form>
    <form name="deleteform" action= {{ $field->id.'/delete' }} method="post">
        {{ csrf_field() }}
        <button type='submit' name='action' value='send'>削除</button> 
    </form>
    
    </body>
</html>
