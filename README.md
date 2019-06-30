# ComproCategory
## マークダウン
- マークダウン書き方はこのへん<br /> https://gist.github.com/mignonstyle/083c9e1651d7734f84c99b8cf49d57fa
- VS code でマークダウン見るとき  
ctrl + K → V

## EC2セットアップ
### AWS UIでやること
- インスタンス作成
- セキュリティグループ
- Elastic IP
- SSH接続  
`ssh -p 22 ec2-user@xxx.xxx.xxx.xx`
### linux セットアップ
- タイムゾーン変更  
https://qiita.com/yangci/items/ef2ab9b6f0d28bad0881<br />
`sudo ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime`<br />
`sudo vi /etc/sysconfig/clock`  
`ZONE="Asia/Tokyo"`  
`UTC= true`  
- メモリが足りないのでswap設定  
https://qiita.com/PKunito/items/31445d4475d4e18fe4d7  
- yumのアップデート  
`sudo yum update -y`
- apache,php,mysql,phpMyAdminのインストール  
https://docs.aws.amazon.com/ja_jp/AWSEC2/latest/UserGuide/install-LAMP.html  
※Laravel対応のphpバージョンに気を付ける  
`sudo yum install -y httpd24 php72 mysql57-server php72-mysqlnd`  
- apacheの起動レベルの変更  
- composerインストール  
- Laravelの設定  
https://qiita.com/33yuki/items/5ee27163b603d7f68250
- Laravelのプロジェクト作成  
https://qiita.com/sskmy1024y/items/c2e434941400bd4ee82c  


## 頻出コマンド

- apacheログ確認
http://gnvpu.hatenablog.com/entry/2015/08/12/150842  
`cd /etc/httpd`  
`sudo bash -c "cd ./logs; ls"`  
`sudo cat /etc/httpd/logs/access_log`  
`sudo cat /etc/httpd/logs/error_log`  

- Laravelキャッシュ
https://qiita.com/Ping/items/10ada8d069e13d729701  

`php artisan cache:clear`  
`php artisan config:clear`  
`php artisan route:clear`  
`php artisan view:clear`  




















