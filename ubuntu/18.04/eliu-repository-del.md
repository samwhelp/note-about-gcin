
# 關於 eliu 套件庫來源操作 - 移除eliu套件庫來源


## 操作步驟

> 下面兩種方式，選擇其中一種操作就行了

### 方式一 - 移除「/etc/apt/sources.list.d/gcin.list」

執行下面指令，移除「/etc/apt/sources.list.d/gcin.list」。


``` sh
sudo rm -f /etc/apt/sources.list.d/gcin.list
```


### 方式二 - 將「/etc/apt/sources.list.d/gcin.list」裡面的每一行註解

例如執行下面指令

``` sh
sudo sh -c 'echo "#deb http://hyperrate.com/gcin-ubuntu1804 eliu release" > /etc/apt/sources.list.d/gcin.list'
```

執行下面指令，觀看剛剛產生「/etc/apt/sources.list.d/gcin.list」這個檔案的內容


``` sh
cat /etc/apt/sources.list.d/gcin.list
```

顯示

```
#deb http://hyperrate.com/gcin-ubuntu1804 eliu release
```

### 更新套件庫資訊

> 注意: 上一個步驟做完後，一定要接著執行這個步驟

執行下面指令，更新套件庫資訊


``` sh
sudo apt-get update
```

可以執行下面指令確認

``` sh
ls /var/lib/apt/lists/*gcin*
```

會顯示

```
ls: cannot access '/var/lib/apt/lists/*gcin*': No such file or directory
```

或是執行下面指令確認

``` sh
ls /var/lib/apt/lists/ | grep gcin
```

沒有顯示，直接跳下一個「命令提示字元」。
