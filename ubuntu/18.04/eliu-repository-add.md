
# 關於 eliu 套件庫來源操作 - 加入eliu套件庫來源


## 操作步驟


### 增加「key」

在執行下一個步驟前，請先增加「key」。

操作步驟請參考「[add-key](eliu-repository-add-key.md)」。

若之前已經增加過了，就可以忽略這個步驟。


### 產生「/etc/apt/sources.list.d/gcin.list」

執行下面指令，產生「/etc/apt/sources.list.d/gcin.list」。

``` sh
sudo sh -c 'echo "deb http://hyperrate.com/gcin-ubuntu1804 eliu release" > /etc/apt/sources.list.d/gcin.list'
```

執行下面指令，觀看剛剛產生「/etc/apt/sources.list.d/gcin.list」這個檔案的內容


``` sh
cat /etc/apt/sources.list.d/gcin.list
```

顯示

```
deb http://hyperrate.com/gcin-ubuntu1804 eliu release
```

### 更新套件庫資訊

> 注意: 上一個步驟做完後，一定要接著執行這個步驟

執行下面指令，更新套件庫資訊


``` sh
sudo apt-get update
```

會看到類似如下的訊息

```
Ign:4 http://hyperrate.com/gcin-ubuntu1804 eliu InRelease                                                                           
Get:5 http://hyperrate.com/gcin-ubuntu1804 eliu Release [2,352 B]                                                  
Get:6 http://hyperrate.com/gcin-ubuntu1804 eliu Release.gpg [488 B]                                             
Get:7 http://security.ubuntu.com/ubuntu bionic-security InRelease [88.7 kB]      
Get:8 http://hyperrate.com/gcin-ubuntu1804 eliu/release amd64 Packages [2,108 B]
Get:9 http://hyperrate.com/gcin-ubuntu1804 eliu/release i386 Packages [1,932 B]
```

可以執行下面指令確認

``` sh
ls /var/lib/apt/lists/*gcin*
```

會顯示

```
/var/lib/apt/lists/hyperrate.com_gcin-ubuntu1804_dists_eliu_Release
/var/lib/apt/lists/hyperrate.com_gcin-ubuntu1804_dists_eliu_release_binary-amd64_Packages
/var/lib/apt/lists/hyperrate.com_gcin-ubuntu1804_dists_eliu_release_binary-i386_Packages
/var/lib/apt/lists/hyperrate.com_gcin-ubuntu1804_dists_eliu_Release.gpg
```

或是執行下面指令確認

``` sh
ls /var/lib/apt/lists/ | grep gcin
```

會顯示

```
hyperrate.com_gcin-ubuntu1804_dists_eliu_Release
hyperrate.com_gcin-ubuntu1804_dists_eliu_release_binary-amd64_Packages
hyperrate.com_gcin-ubuntu1804_dists_eliu_release_binary-i386_Packages
hyperrate.com_gcin-ubuntu1804_dists_eliu_Release.gpg
```
