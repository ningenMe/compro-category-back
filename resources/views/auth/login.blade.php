<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>ログインフォーム</h1>
        @isset($message)
            <p style="color:red">{{$message}}</p>
        @endisset
            
        <form name="loginform" action="/auth/login" method="post">
            {{ csrf_field() }}
            mail:<input type = "text" name = "email" size = "30" value="{{ old('email') }}"><br />
            password:<input type = "text" name = "password" size = "30"><br />
            <button type='submit' name='action' value='send'>ログイン</button>
        </form>
    </body>
</html>
