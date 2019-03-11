

# 如何完整移除系統上的「gcin」


## 操作步驟

執行

``` sh
sudo dpkg -P $(dpkg -l | grep gcin | awk '{print $2}')
```

或是執行

``` sh
sudo dpkg -P $(dpkg -l | grep gcin | awk '{print $2}' | awk -F ':' '{print $1}')
```


## 注意

若系統上沒有安裝「gcin」，執行「`dpkg -l | grep gcin | awk '{print $2}'`」 會得到空的列表。

所以執行「`sudo dpkg -P $(dpkg -l | grep gcin | awk '{print $2}')`」就會得到下面的訊息。

這是正常的現象，切勿驚慌。

```
dpkg: error: --purge needs at least one package name argument

Type dpkg --help for help about installing and deinstalling packages [*];
Use 'apt' or 'aptitude' for user-friendly package management;
Type dpkg -Dhelp for a list of dpkg debug flag values;
Type dpkg --force-help for a list of forcing options;
Type dpkg-deb --help for help about manipulating *.deb files;

Options marked [*] produce a lot of output - pipe it through 'less' or 'more' !
```

## 相關討論

* [#233](https://hyperrate.com/thread.php?tid=34371#34371)
* [#228](https://hyperrate.com/thread.php?tid=34305#34305)
* [#227](https://hyperrate.com/thread.php?tid=34304#34304)


## 下一步

* [回索引](all.md)
* [如何安裝 gcin](install.md)
