# Raspbianの設定
## ログイン
1. `login:`の隣にカーソルが点滅しているので，`pi`と入力しEnter．
1. `Password:`と表示されるので`raspberry`と入力しEnter．このときパスワードは表示されない．
```
Raspbian GNU/Linux 9 raspberrypi tty1
raspberrypi login:pi
Password:

The programs included ...と文が続く

pi@raspberrypi:~ $
```
## 環境設定
### raspi-config
Raspberry pi の本体設定を変更します．
1. `sudo raspi-config`を実行し，`Raspberry Pi Software Configuration Tool (raspi-config)`のメニューが表示されます．
#### パスワードの変更
1. 矢印キーでメニューにある`1 Change User Password`を選択し，Enter．
1. `You will now be asked to enter a new password for the pi user`と表示されるので`<Ok>`を矢印キーで選択し，Enter．
1. 画面下部に`Enter new UNIX password:`と表示されるので，パスワードを入力．
1. `Retype new UNIX password:`と表示されるので，もう一度パスワードを入力．
1. `Password changed successfully`と表示されたら成功で次に進んでください．<br>
`There was an error running option 1 Change User Password`と表示されたら失敗です．<br>
この場合は2.からやり直してください．
1. `Ok`を選択し，メニュー画面に戻ってください．
__このときraspi-configを終了しないでください．__
1. ContolキーとAltキーとF2キーで端末を切り替え(tty2)にし，ログインできるか確認をしてください．<br>ログインできれば`exit`コマンドを実行し端末を閉じてください．<br>
もし，`Login incorrect`と表示され，ログインできない場合はパスワードを誤って設定している可能性があります．<br>
この場合はContolキーとAltキーとF1キーで端末を切り替え，設定し直してください．
1. ContolキーとAltキーとF1キーで端末を切り替え，次のセクションの設定をしてください．

#### ホスト名の変更
1. 矢印キーでメニューにある`2 Network Options`を選択し，Enter.
1. `N1 Hostname`を選択し，Enter．
1. 下記にホスト名の設定する上での説明があるので，`<Ok>`を選択し，Enter．
> Please note: RFCs mandate that a hostname's labels may contain only the ASCII letters 'a' through 'z' (case-insensitive), the digits '0' through '9', and the hyphen.<br>
> Hostname the labels cannot begin or end with a hypen.<br>
> No other symbols, punctuation characters, or blank spaces are permitted.<br>
1. `Please enter a hostname`と表示されますので，ホスト名を入力してください．
1. `Would you like to reboot now?`と表示されますので，`<Yes>`を選択し，Enter．<br>
(ホスト名を有効化するためです．)<br>
再起動が始まります．


#### 地域設定関連の変更
1. 矢印キーでメニューにある`4 Localisation Options`を選択し，Enter．

##### 言語設定の変更
1. 矢印キーで`I1 Change Locale`を選択し，Enter.
1. `Configuraing locales`メニューが表示され，矢印キーで移動し，下記のものをチェック(Spaceキー)してください．
```
en_GB.UTF-8 UTF-8 ;これはデフォルト
ja_JP.UTF-8 UTF-8 ;新たに選択
```
選択が終われば，Tabキーでリストから離れ，`<Ok>`を選択し，Enter.
1.  `Default locale for the system environment :`と表示されれば，`en_GB.UTF-8`を選択しEnter．
1. `Generating locales (this might take a while)...`と表示され，生成されます．<br>`Generation Complete`になると完了し，数秒後メニュー画面に戻ります．

##### 時刻設定の変更
1. 矢印キーで`I2 Change Timezone`を選択し，Enter．
1. `Configuring tzdata`が表示され，矢印キーで`Asia`を選択し，Enter．
1. `Tokyo`を選択し，Enter．数秒後メニュー画面に戻ります．

##### キーボードレイアウトの変更
__環境に合わせて設定をしてください．<br>レイアウトが崩れるとログインができなくなる可能性があります．<br>(自分で総当たりでレイアウト表を作る羽目になります．)__
1. 矢印キーで`I3 Change Keyboard Layout`を選択し，Enter.
1. `Configuring keyboard-configuration`が表示される．
1. `Generic 105-key (Intl) PC`を選択し，Enter
1. `Keyboard layout:`が表示され，`Other`を選択し，Enter
1. `Country of origin for the keyboard:`が表示され，`Japanese`を選択し，Enter．
1. `Japanese - Japanese (OADG 109A)`を選択し，Enter．
1. `Key to function as AltGr:`が表示され，`The default for the keyboard layout`を選択し，Enter.
1. `Compose key:`が表示され，`No compose key`を選択し，Enter．

#### オーバークロック
1. 矢印キーでメニューにある`6 Overclock`を選択し，Enter．
1. 警告メッセージが表示され，`<Ok>`を選択し，Enter．
> Be aware that overclocking may reduce the lifetime of your Raspberry Pi.<br>
> If overclocking at a certain level causes system instability, try a more modest overclock.<br>
> Hold down shift during boot to temporarily disable overclock.<br>
> See http://elinux.org/RPi_Overclocking for more information.
1. `Choose overclock preset`メニューが表示され，お好きなもの選択し，Enter.
1. `Would you like to reboot now?`と表示されるので，`<Yes>`を選択し，<br>Enter.(選択したオーバークロック設定で動作するか確認をするためです．)
1. 再起動が始まります．
1. 無事再起動が完了すれば，ログインし，raspi-configに入ってください，

#### 詳細設定
1. 矢印キーでメニューにある`Advanced Options`を選択し，Enter．
##### 拡張ファイルシステム(SDカードの容量全部を使えるようにする設定)
1. `A1 Expand Filesystem`を選択し，Enter．
1. `Root partition has been resized. The filesystem will be enlarged upon the next reboot`と表示したら成功で，`<Ok>`を選択し，Enter．
__次回起動時，`Resize the root filesystem to fill partition`と表示され，少々時間がかかります．__

##### グラフィックスメモリーの容量変更
1. `A3 Memory Split`を選択し，Enter．
1. 好きな値に設定.ここでは`16`と入力し，Enter．

### 権限の変更

#### sudo
一般ユーザーで，スーパーユーザ権限(管理者権限)を一時的に与えるコマンドです．<br>
管理者権限を与える一般ユーザーを制限する設定をします．

##### sudoができる一般ユーザーを制限
1. `sudo visudo`コマンドを実行する．
1. デフォルトのエディタ(おそらく nano)で，sudoersファイルが開き，設定を編集できます．
1. `# User privilege specification`で，`pi ALL=(ALL:ALL) ALL`を追記します．
1. `root ALL=(ALL:ALL) ALL`をコメントアウト(先頭行に`#`を挿入)してください．
つまり，`# root ALL=(ALL:ALL) ALL`になります．
1. Contolキーとoキーを同時に押し，上書きします．
1. Contolキーとxキーを同時に押し，エディタを終了します．

##### 誤って編集した場合
`visudo`コマンドはエディタで編集を終了したあと，文法のチェックが行われます．このときに，文法的誤りがあると指摘してくれます．<br>
例えば１行目に文法的誤りがあると下記のように表示されます．<br>
` >>> /etc/suders: syntax error near line 1 <<< ` <br>
操作コマンドは以下の通りです．
```
Options are:
 (e)dit sudoers file again
 e(x)it without saving change to sudoers file
 (Q)uit and save changes to sudoers file (DANGER!)
```
`edit`は再度エディタを起動し，編集します．`e`と入力し，enterを押すと再度，編集画面になります．<br>
`exit`は編集内容は保存せずに，終了します．<br>
`quit`は編集内容を保存し，終了します．誤った状態で，保存されますので`sudo`コマンドが正常に動作しなくなります．<br>

下記の手順で再度，編集してください．
1. `e`と入力し，Enter．
1. 該当箇所を修正し，Contolキーとoキーを同時に押し上書き保存
1. Contolキーとxキーを同時に押し，エディタを終了します．

#### rootユーザのログイン禁止
1. `sudo passwd -l root`を実行し，rootユーザをロック
1. `passwd: password expiry information changed.`と表示されたら，変更完了．

#### パスワードなしsudoの無効化
1. `cd /etc/sudoers.d/`を実行し，移動してください．
1. `sudo rm -i 010_pi-nopasswd`を実行し，ファイルを削除してください．<br>
このとき`rm: remove regular file '010_pi-nopasswd'?`と聞かれるので，`y`を入力し，Enter.


### ネットワーク接続の確認
1. `ifconfing`でネットワークに接続されているインターフェイスが`... state UP ...`となっているか確認してください．`... state DOWN ...`となっている場合は，ネットワーク接続を確認してください．
```
1: lo:...
2: eth0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc pfifo_fast state UP group default qlen 1000 ...
```
### パッケージのアップデート
#### パッケージリストのアップデート
1. `sudo apt update`を実行して，パッケージリストをアップデートしてください．

#### ファイアウォールの一時的な設定
__外部からの通信要求は遮断されます．必要に応じて設定を変更してください．__
1. `sudo apt install ufw -y`を実行して，`ufw`をインストールしてください．
1. `sudo ufw status verbose`を実行すると，`Status: inactive` と表示されます．初期状態ですので，有効化されていないことが確認できます．
1. `sudo default deny`を実行して，標準を拒否設定にします．`Default incoming policy changed to 'deny'`と表示されます．
1. `sudo ufw enable`を実行し，`ufw`を有効化します．このとき`Fairewall is active and enabled on system startup`と表示され，起動時に自動有効化されます．
1. `sudo ufw status verbose`を実行して，`Status: active`になっているか確認してください．
1. `sudo service ufw restart`で，デーモンを再読み込みし，システムに適用してください．
```
pi@raspberrypi:~ $ sudo apt update
;メッセージが続き，しばらく待機
pi@raspberrypi:~ $ sudo apt install ufw -y
;メッセージが続き，しばらく待機
pi@raspberrypi:~ $ sudo ufw status verbose
Status: inactive
pi@raspberrypi:~ $ sudo default deny
Default incoming policy changed to 'deny'
pi@raspberrypi:~ $ sudo ufw enable
Fairewall is active and enabled on system startup
pi@raspberrypi:~ $ sudo ufw status verbose
Status: active
Logging: on (low)
Default: deny (incoming). allow (outgoing), disabled (routed)
New profiles: skip
pi@raspberrypi:~ $ sudo service ufw restart
```
#### パッケージアップグレード
1. `sudo apt upgarde -y`を実行し，アップデートをしてください．これには少々時間がかかります．
