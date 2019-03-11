
# 環境變數

## 說明

當使用「`im-config -n gcin`」，重新開機後。

執行

``` sh
env | grep gcin
```

顯示

```
QT4_IM_MODULE=gcin
QT_IM_MODULE=gcin
XMODIFIERS=@im=gcin
GTK_IM_MODULE=gcin
```

> 正常狀況下，要有上面4個環境變數設定。

> 可以對照「/usr/share/im-config/data/26_gcin.rc」這個檔案來看

執行

``` sh
dpkg -L im-config | grep gcin
```

顯示

```
/usr/share/im-config/data/26_gcin.conf
/usr/share/im-config/data/26_gcin.rc
```

執行

``` sh
grep '=gcin' /usr/share/im-config/data/26_gcin.rc -n
```

顯示

```
11:XMODIFIERS=@im=gcin
34:    GTK_IM_MODULE=gcin
42:        QT4_IM_MODULE=gcin
51:        QT_IM_MODULE=gcin
```

## 如何檢查環境變數

所以若要檢查目前的環境變數，可以執行的指令

舉例如下

``` sh
$ env | grep _IM_
```

顯示

```
CLUTTER_IM_MODULE=xim
QT4_IM_MODULE=gcin
QT_IM_MODULE=gcin
GTK_IM_MODULE=gcin
```

執行

``` sh
env | grep XMOD
```

或是執行

```
env | grep '@im'
```

顯示

```
XMODIFIERS=@im=gcin
```
