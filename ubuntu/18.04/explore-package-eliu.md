
# 套件探索 - eliu 套件庫


## 前置作業

### 安裝 dctrl-tools

執行下面指令，安裝「[dctrl-tools](https://packages.ubuntu.com/bionic/dctrl-tools)」。

``` sh
sudo apt-get install dctrl-tools
```

### 加入 eliu 套件庫來源

這部份的操作步驟請參考

* [關於 eliu 套件庫來源操作](eliu-repository.md)
* [安裝 eliu 套件庫裡的 gcin](install-eliu.md)

> 注意：下面的測試，並不需要事先安裝gcin，只需要加入「eliu 套件庫來源」後，就可以操作了。


## 探索 eliu 套件庫 有哪些 Binary Package

執行

``` sh
grep-aptavail -F Maintainer gcin -s Package,Version,Maintainer
```

顯示

```
Package: gcin
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-anthy
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-data
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-dev
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-gtk2-immodule
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-gtk3-immodule
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-im-client
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-qt4-immodule
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-qt5-immodule
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-tables
Version: 2.8.8+eliu-3
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-anthy
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-gtk2-immodule
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-gtk3-immodule
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-im-client
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>

Package: gcin-qt4-immodule
Version: 2.8.6+eliu-0
Maintainer: gcin <gcin@hyperrate.com>
```

執行

``` sh
$ grep-aptavail -F Maintainer gcin -s Package | sort -u
```

顯示

```
Package: gcin
Package: gcin-anthy
Package: gcin-data
Package: gcin-dev
Package: gcin-gtk2-immodule
Package: gcin-gtk3-immodule
Package: gcin-im-client
Package: gcin-qt4-immodule
Package: gcin-qt5-immodule
Package: gcin-tables
```

執行

``` sh
$ grep-aptavail -F Maintainer gcin -s Package | sort -u | awk -F ': ' '{print $2}'
```

顯示

```
gcin
gcin-anthy
gcin-data
gcin-dev
gcin-gtk2-immodule
gcin-gtk3-immodule
gcin-im-client
gcin-qt4-immodule
gcin-qt5-immodule
gcin-tables
```

可以對照下面網址，列出來的檔案

* http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/
* http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/Packages


## 相關討論

* [#226](https://hyperrate.com/thread.php?tid=34303#34303)


## 下一步

* [回索引](all.md)
* [安裝 eliu 套件庫裡的 gcin](install-eliu.md)
