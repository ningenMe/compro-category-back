<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>投稿フォーム</h1>
        <form name="registform" action="/auth/register" method="post">
            {{ csrf_field() }}
            name:<input type = "text" name = "name" size = "30"><span>{{ $errors->first('name') }}</span><br />
            mail:<input type = "text" name = "email" size = "30"><span>{{ $errors->first('email') }}</span><br />
            password:<input type = "text" name = "password" size = "30"><span>{{ $errors->first('password') }}</span><br />
            password_confirmation:<input type = "text" name = "password_confirmation" size = "30"><span>{{ $errors->first('password_confirmation') }}</span><br />
            <button type='submit' name='action' value='send'>送信</button>
        </form>
    </body>
</html>
