# blinkLight

## 概要
POSTで別サーバにライト操作命令を送り，処理させる．

## 注意点
一番最初のライト操作は，うまく動かないです．
そのあとは動作します．<br>


## ファイル説明
1. `index.html`<br>
    オンオフを実行する再のサンプルプログラム．
1. `blinklight.php`<br>
    GPIOを操作するプログラム．
### index.html
POSTで変数stateLightを投げてください．
投げる先のipアドレスは一時的で，環境に応じて変更してください．<br>
変数stateLightの値によって，動作が変わります．
- ON<br>
blinklight.phpで指定されているGPIOポートをHiにする(ライトをON)．
- OFF<br>
blinklight.phpで指定されているGPIOポートをLoにする(ライトをOFF)．
- INVERTED<br>
blinklight.phpで指定されているGPIOポートの状態を反転させる．<br>
ONのときOFF，OFFのときON

### blinklight.php
POSTで投げられた，stateLightの値によって`index.html`で説明した動作を実行する．<br>
GPIOの初期化，動作設定，状態操作はsystem関数を用いて，シェルで実行．