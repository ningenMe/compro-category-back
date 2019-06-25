<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        Hello Laravel
        @if (Auth::check())
            {{ \Auth::user()->name }}さん<br />
            <a href="/auth/logout">ログアウト</a><br />
        @else
            ゲストさん<br />
            <a href="/auth/login">ログイン</a><br />
            <a href="/auth/register">会員登録</a><br />
        @endif
    </body>
</html>
