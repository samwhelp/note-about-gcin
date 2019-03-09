
# 關於 eliu 套件庫來源操作 - add key


## 操作步驟

### 增加「key」

可以參考「[#1 Ubuntu 18.04/16.04/…/12.04 安裝最新的 gcin 中文輸入的完整步驟](https://hyperrate.com/thread.php?tid=28044#28044)」。

執行

``` sh
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 835AB0E3
```

會顯示類似如下的資訊

```
Executing: /tmp/apt-key-gpghome.hMaL7lRTfg/gpg.1.sh --keyserver keyserver.ubuntu.com --recv-keys 835AB0E3
gpg: key 5C577D59835AB0E3: "Edward Liu (my gpg) <eliu@hyperrate.com>" not changed
gpg: Total number processed: 1
gpg:              unchanged: 1
```

## 相關工具 「tool/prototype/eliu-repository/[eliu-repository-add-key.sh](https://github.com/samwhelp/note-about-gcin/blob/gh-pages/ubuntu/18.04/tool/prototype/eliu-repository/eliu-repository-add-key.sh)」。
