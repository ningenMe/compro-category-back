# ComproCategory
## マークダウン
- マークダウン書き方はこのへん<br /> https://gist.github.com/mignonstyle/083c9e1651d7734f84c99b8cf49d57fa
- VS code でマークダウン見るとき<br />
ctrl + K → V

## EC2セットアップ
### AWS UIでやること
- インスタンス作成
- セキュリティグループ
- Elastic IP
- SSH接続 <br/>
`ssh -p 22 ec2-user@xxx.xxx.xxx.xx`
### linux セットアップ
- タイムゾーン変更<br />
https://qiita.com/yangci/items/ef2ab9b6f0d28bad0881<br />
`sudo ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime`<br />
`sudo vi /etc/sysconfig/clock`<br />
`ZONE="Asia/Tokyo"`<br />
`UTC= true`<br />
- メモリが足りないのでswap設定<br />
https://qiita.com/PKunito/items/31445d4475d4e18fe4d7<br/>









