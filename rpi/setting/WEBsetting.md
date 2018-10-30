# raspberry pi サーバ設定

## 必要なパッケージのインストール
`# apt install apache2 php7.0 apache2-mod-php7.0`

[参考サイト](https://www.fabshop.jp/raspbian-stretch%E3%81%A7%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E6%A7%8B%E7%AF%89%EF%BC%81-php7-0-apache2-%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E7%B7%A8/)


## ファイアウォールの設定
ufwの場合 <br>
`# ufw allow from 192.168.0.0/16 to any port 80`

## apacheにgpioのアクセス権(グループに追加)を与える．
`# gpasswd -a www-data gpio`
