
# 如何安裝 gcin - 安裝 Ubutnu 預設套件庫裡的 gcin


## 前提

* 系統沒有加入「eliu」的套件庫。


## 操作步驟


### 更新套件庫資訊

執行

``` sh
sudo apt-get update
```


### 安裝「gcin」

執行

``` sh
sudo apt-get install gcin gcin-qt5-immodule gcin-anthy gcin-voice
```

會顯示類似如下的提示訊息

```
Reading package lists... Done
Building dependency tree       
Reading state information... Done
The following additional packages will be installed:
  gcin-data gcin-gtk2-immodule gcin-gtk3-immodule gcin-tables libgcin
The following NEW packages will be installed:
  gcin gcin-anthy gcin-data gcin-gtk2-immodule gcin-gtk3-immodule gcin-qt5-immodule gcin-tables gcin-voice libgcin
0 upgraded, 9 newly installed, 0 to remove and 0 not upgraded.
Need to get 4,045 kB/11.8 MB of archives.
After this operation, 36.9 MB of additional disk space will be used.
Do you want to continue? [Y/n]
```

### im-config

接著執行下面指令，將系統的輸入法框架設「gcin」。

``` sh
im-config -n gcin
```

執行下面指令，確認上個步驟是否有更改

``` sh
cat ~/.xinputrc
```

會顯示類似如下的資訊

```
# im-config(8) generated on Sat, 09 Mar 2019 14:25:07 +0800
run_im gcin
# im-config signature: 17b4e6a9a8693f50659010f3cd7e2191  -
```

主要要看到「`run_im gcin`」這一行。


### 重開機

上面步驟執行完畢後，請重新開機。


## 相關專案

* play-ubuntu-18.04-plan/prototype/im-basic/gcin/[install.sh](https://github.com/samwhelp/play-ubuntu-18.04-plan/blob/master/prototype/im-basic/gcin/install.sh)


## 額外議題

> 以下是額外補充，不是本文的重點，可以略過。

### 如何確認系統上安裝了那些關於「gcin」的套件

執行執行下面指令

``` sh
$ dpkg -l '*gcin*'
```

顯示

```
Desired=Unknown/Install/Remove/Purge/Hold
| Status=Not/Inst/Conf-files/Unpacked/halF-conf/Half-inst/trig-aWait/Trig-pend
|/ Err?=(none)/Reinst-required (Status,Err: uppercase=bad)
||/ Name                            Version              Architecture         Description
+++-===============================-====================-====================-====================================================================
ii  gcin                            2.8.5+dfsg1-4build4  amd64                GTK+ based input method for Chinese users
ii  gcin-anthy:amd64                2.8.5+dfsg1-4build4  amd64                support library to use Anthy in gcin
ii  gcin-data                       2.8.5+dfsg1-4build4  all                  icons and scripts for gcin
ii  gcin-gtk2-immodule:amd64        2.8.5+dfsg1-4build4  amd64                GTK2 input method module with gcin as backend
ii  gcin-gtk3-immodule:amd64        2.8.5+dfsg1-4build4  amd64                GTK3 input method module with gcin as backend
ii  gcin-qt5-immodule:amd64         2.8.5+dfsg1-4build4  amd64                Qt5 input method module with gcin as backend
ii  gcin-tables                     2.8.5+dfsg1-4build4  amd64                input method tables for gcin
ii  gcin-voice                      0~20170223-1         all                  gcin voice data
ii  libgcin:amd64                   2.8.5+dfsg1-4build4  amd64                library for gcin
```

或是執行下面指令

``` sh
$ dpkg -l | grep gcin
```

顯示

```
ii  gcin                                          2.8.5+dfsg1-4build4                          amd64        GTK+ based input method for Chinese users
ii  gcin-anthy:amd64                              2.8.5+dfsg1-4build4                          amd64        support library to use Anthy in gcin
ii  gcin-data                                     2.8.5+dfsg1-4build4                          all          icons and scripts for gcin
ii  gcin-gtk2-immodule:amd64                      2.8.5+dfsg1-4build4                          amd64        GTK2 input method module with gcin as backend
ii  gcin-gtk3-immodule:amd64                      2.8.5+dfsg1-4build4                          amd64        GTK3 input method module with gcin as backend
ii  gcin-qt5-immodule:amd64                       2.8.5+dfsg1-4build4                          amd64        Qt5 input method module with gcin as backend
ii  gcin-tables                                   2.8.5+dfsg1-4build4                          amd64        input method tables for gcin
ii  gcin-voice                                    0~20170223-1                                 all          gcin voice data
ii  libgcin:amd64                                 2.8.5+dfsg1-4build4                          amd64        library for gcin
```
