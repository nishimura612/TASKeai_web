# sshサーバの設定

sftpが使いたいから．

__すでにsshで接続している方は設定を変更しないでください．<br>変更後，閉め出される可能性があります．<br>ssh接続なしで操作できる環境であれば大丈夫です．__

##  /etc/ssh/sshd_config を修正．
開くとき`sudo`で．忘れると上書きできずに，もう一度することになる．<br>
変更箇所<br>
ポート番号は予約されていないポート番号([参考サイト](https://ja.wikipedia.org/wiki/TCP%E3%82%84UDP%E3%81%AB%E3%81%8A%E3%81%91%E3%82%8B%E3%83%9D%E3%83%BC%E3%83%88%E7%95%AA%E5%8F%B7%E3%81%AE%E4%B8%80%E8%A6%A7#%E5%8B%95%E7%9A%84%E3%83%BB%E3%83%97%E3%83%A9%E3%82%A4%E3%83%99%E3%83%BC%E3%83%88_%E3%83%9D%E3%83%BC%E3%83%88%E7%95%AA%E5%8F%B7_(49152%E2%80%9365535)))を使用するほうがよい．<br>
行頭の`#`があるとコメントになるので，コメントアウト(取り外す)すること．
```
Port22
PermitRootLogin no
PubkeyAuthentication yes
PasswordAuthentication no
PermitEmptyPasswords no
ChallengeResponseAuthentication no 
X11Forwarding no
```

## ファイアウォールの設定
ufwの場合は下の通り．後ろの`port 22`は，`sshd_config`で設定したポート番号に読み替えてください．<br>
`# ufw allow from 192.168.0.0/16 to any port 22`

## 公開鍵暗号方式の導入

### 公開鍵の作成と移動
クライアントで作るほうが良い．<br>
鍵の移動はUSBをおすすめします．<br>
Linuxなら
[この参考サイト](https://qiita.com/HamaTech/items/21bb9761f326c4d4aa65) <br>
Windowsなら
[この参考サイト](https://webkaru.net/linux/tera-term-ssh-login-public-key/)<br>

公開鍵を設置するときは，公開鍵のパーミッション変更を忘れずに<br>
USBのマウント方法は下記の手順の通り．<br>
1. `# fdisk -l`コマンドでUSBのデバイス名とパーティション番号を確認．<br>
1. `# mount /dev/[デバイス名とパーティション番号] /mnt`を実行してマウントする．<br>
[デバイス名とパーティション番号]は `/dev/sda1`としたとき，`sda`がデバイス名，`1`がパーティション番号．
1. `/mnt`にUSBディスクの中身が展開されているので，通常のファイル操作をすればよい．

マウント解除方法は`# umount /mnt`を実行．

#### フォーマットについて
何故か，Windowsでフォーマットすると変なことになるので(僕の環境だけかな？)，Raspberry PiでUSBをフォーマット．<br>
[参考サイト](https://www.fabshop.jp/%E3%80%90step-22%E3%80%91raspbian%E3%81%A8windows%E3%81%A7usb%E3%83%A1%E3%83%A2%E3%83%AA%E3%83%BC%E3%82%92%E5%85%B1%E6%9C%89%E3%81%97%E3%81%A6%E3%83%87%E3%83%BC%E3%82%BF%E4%BA%A4%E6%8F%9B/)<bR>
補足説明．USBのパーティション削除とフォーマット<br>
__パーティションを削除すると現在入っているデータが消えます．必ずバックアップしてください．__
1. `# fdisk -l`コマンドでUSBのデバイス名を確認．<br>
    `Disk /dev/aaa?: 7.6 GiB …` なら `/dev/aaa` <br>
     __デバイス名を間違えないこと．__
1. `# fdisk [デバイス名]`を実行し，対話モードに入り，`p` を入力，Enterして，パーティションの確認をする．
1. `o`でパーティションテーブルを削除する．
1. `n`でパーティションを作成．
    1. プライマリパーティション `p` を選択し，Enter．
    1. パーティション番号は `1` を選択し，Enter.
    1. 開始セクタ番号は`default`のままで，Enter．
    1. 終了セクタ番号は`default`のままで，Enter．
1. `w`でディスクに書き込む．
1. `# mkdosfs -F32 [デバイス名とパーティション番号]`を実行して，フォーマット．<br>
    デバイス名とパーティション番号は，`/dev/sda1`のような形．<br>
    `/dev/sda`がデバイス名で，`1`はパーティション番号．


## sshサーバー起動と自動起動の登録
1. `sudo systemctl start ssh`を実行し，起動．
1. `sudo systemctl enable ssh`を実行し，自動起動を有効化．

