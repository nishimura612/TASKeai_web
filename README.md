# TASKeai_web

## 0.リポジトリのClone
gitコマンド,Github　Desktopどちらを利用してもらってもOK
できるだけ簡単に使えるのは，Github Desktop

現在,Cloneを行なって取得できるファイルは2種類
　　package.box
   -> CentOS6.7のイメージが入ってる．vagrantで起動するとGUIでCentOS6.7を操作できる．
 Vagrantfile
 　　　　-> vagrantで仮想マシンを立ち上げる際の設定ファイル，(OSのイメージファイル, ポート番号，IPアドレスなどが記述されている)
詳細が知りたい人はSlackなどでnisimuraに聞いてください．

## 1.VMWareとVagrantのインストール
頑張ってググってください

## 2.　boxの追加
`vagrant add centos6.7 package.box`
これにより，　package.boxというイメージファイルを圧縮したファイルがcentos6.7というイメージとして利用できる．

## 3.基本的なvagrantコマンド
`vagrant up （仮想マシンの起動）`　<=　このコマンドを実行して，GUIのCentOSが起動できたら成功！！
パスワードは初期設定のままである．(Slackに書いておきます)

注意
万が一他のサーバなどでポートが被っている場合は，Slackで報告お願いします．

`vagrant halt (仮想マシンの停止)`

`vagrant destroy (仮想マシンの破壊)`

`vagrant ssh　(仮想マシンに対して，sshログイン)`


## 3.Vgrantプラグイン

1. vbgeust
ファイル共有が可能になるプラグインである．
もし，上記の方法でファイル共有ができなかった際,
何とか頑張れ！

参考文献
オススメのvagrantのプラグイン
https://qiita.com/2no553/items/30458e41131038761d7a

vagrantでCentOSをGUIで起動するための設定方法
https://reonblog.com/2013/04/07/centos%E3%81%ABgui%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB/

CentOS6.7を日本語化するために参考にしたサイト
https://tech.pjin.jp/blog/2017/02/02/how-to-configure-centos-japanese/



時間がある時にこのReadmeを少しづつ更新していきます．
技術的に記録したいことや，この設定のせいでバグが発生したなど
何かあれば書き込みOK！！
