
# 如何安裝 gcin - 安裝 eliu 套件庫裡的 gcin


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

> 注意: 上一個步驟做完後，一定要先執行這個步驟

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


### 先移除舊有的「gcin」

請參考「[另一篇](remove.md)」提到的操作步驟來移除「gcin」。

``` sh
sudo dpkg -P $(dpkg -l | grep gcin | awk '{print $2}')
```

> 注意這個步驟很重要，

> 若是原本系統上已經有安裝「Ubuntu 預設套件庫裡的 gcin」。

> 再安裝「eliu 套件庫裡的 gcin」，會發生「套件相依卡住」的情形。

> 所以記得先移除系統上的「gcin」以及「gcin」相關的套件。



### 安裝前確認


在執行安裝「gcin」，先來確認一下

``` sh
apt-cache policy gcin
```

顯示

```
gcin:
  Installed: (none)
  Candidate: 2.8.8+eliu-2
  Version table:
     2.8.8+eliu-2 500
        500 http://hyperrate.com/gcin-ubuntu1804 eliu/release amd64 Packages
     2.8.5+dfsg1-4build4 500
        500 http://tw.archive.ubuntu.com/ubuntu bionic/universe amd64 Packages
```

會看到「`Candidate: 2.8.8+eliu-2`」。

執行

``` sh
apt-get download gcin --print-uris
```

顯示

```
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin_2.8.8+eliu-2_amd64.deb' gcin_2.8.8+eliu-2_amd64.deb 326836 SHA256:a9136394f992506dfe71d86f00ca5067572ea1c51ae3ab04a5952ff99a47bcd7
```



### 安裝「gcin」

執行

``` sh
sudo apt-get install gcin gcin-qt5-immodule gcin-anthy
```

會顯示類似如下的提示訊息

```
Reading package lists... Done
Building dependency tree       
Reading state information... Done
The following additional packages will be installed:
  gcin-data gcin-gtk2-immodule gcin-gtk3-immodule gcin-im-client gcin-qt4-immodule gcin-tables
The following NEW packages will be installed:
  gcin gcin-anthy gcin-data gcin-gtk2-immodule gcin-gtk3-immodule gcin-im-client gcin-qt4-immodule gcin-qt5-immodule gcin-tables
0 upgraded, 9 newly installed, 0 to remove and 0 not upgraded.
Need to get 0 B/4,733 kB of archives.
After this operation, 19.5 MB of additional disk space will be used.
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

主要要看到「**run_im gcin**」這一行。


### 重開機

上面步驟執行完畢後，請重新開機。


## 額外議題

> 以下是額外補充，不是本文的重點，可以略過。

### 列出有那些「gcin」的套件可以安裝

執行

```
apt-cache pkgnames gcin | sort
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
gcin-voice
```

###  列出「gcin」的套件會來自於哪裡

執行

```
apt-get download $(apt-cache pkgnames gcin | sort) --print-uris
```

顯示

```
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin_2.8.8+eliu-2_amd64.deb' gcin_2.8.8+eliu-2_amd64.deb 326836 SHA256:a9136394f992506dfe71d86f00ca5067572ea1c51ae3ab04a5952ff99a47bcd7
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-anthy_2.8.8+eliu-2_amd64.deb' gcin-anthy_2.8.8+eliu-2_amd64.deb 84552 SHA256:ca45e5818db743807c2bbfa22e40ac8ebdf549aa7f89076aaf53f937f99e926d
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-data_2.8.8+eliu-2_all.deb' gcin-data_2.8.8+eliu-2_all.deb 155764 SHA256:75f5bb70a6864f384663e17007124ca2c7d942cfbe075a4679f7b8be7a4cf579
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-dev_2.8.8+eliu-2_all.deb' gcin-dev_2.8.8+eliu-2_all.deb 71312 SHA256:b914b8dfaf488507ea907208a2d3d968eb1ba389ffa05929a89be33337e13659
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb' gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb 75328 SHA256:a4d5652e01c64ba96b4b6c8818163af4423a79112a080a0d692a104e57be08d9
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb' gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb 75380 SHA256:746be00c46a0f55928be8a9b431ddabc2b8ee1f3c09bf4a76863b8d9bdd31161
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-im-client_2.8.8+eliu-2_amd64.deb' gcin-im-client_2.8.8+eliu-2_amd64.deb 77388 SHA256:8d0623fc813bde64aa7f47b459edf75288c4162132aeace5fe1b398385229678
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb' gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb 80908 SHA256:46eb43bc12af4dbd56027153d313df51429e69fae4ae822e2d0521347dc22f59
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb' gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb 80176 SHA256:c370595732d5668c8613a664f45c7b2cfdbb423d23cb14996e833de2b8de1f79
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-tables_2.8.8+eliu-2_all.deb' gcin-tables_2.8.8+eliu-2_all.deb 3776996 SHA256:811c976ef5c0b41a308970b2cebea50ee889230d5385a14df61d350ec079fd02
'http://tw.archive.ubuntu.com/ubuntu/pool/universe/g/gcin-voice/gcin-voice_0~20170223-1_all.deb' gcin-voice_0~20170223-1_all.deb 7750182 SHA256:55d2e78c49683373b7d14fd82d2bc02d489cd7eeb69ea3accdd3d3372832dc44
```

可以善用「awk」過濾顯示結果。

例如執行下面指令

```
apt-get download $(apt-cache pkgnames gcin | sort) --print-uris | awk '{print $1, $2}'
```

顯示

```
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin_2.8.8+eliu-2_amd64.deb' gcin_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-anthy_2.8.8+eliu-2_amd64.deb' gcin-anthy_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-data_2.8.8+eliu-2_all.deb' gcin-data_2.8.8+eliu-2_all.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-dev_2.8.8+eliu-2_all.deb' gcin-dev_2.8.8+eliu-2_all.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb' gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb' gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-im-client_2.8.8+eliu-2_amd64.deb' gcin-im-client_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb' gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb' gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-tables_2.8.8+eliu-2_all.deb' gcin-tables_2.8.8+eliu-2_all.deb
'http://tw.archive.ubuntu.com/ubuntu/pool/universe/g/gcin-voice/gcin-voice_0~20170223-1_all.deb' gcin-voice_0~20170223-1_all.deb
```

執行下面指令

```
apt-get download $(apt-cache pkgnames gcin | sort) --print-uris | awk '{print $1}'
```

顯示

```
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-anthy_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-data_2.8.8+eliu-2_all.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-dev_2.8.8+eliu-2_all.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-im-client_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb'
'http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-tables_2.8.8+eliu-2_all.deb'
'http://tw.archive.ubuntu.com/ubuntu/pool/universe/g/gcin-voice/gcin-voice_0~20170223-1_all.deb'
```

執行下面指令，將上面顯示前後的「`'`」去掉。

```
apt-get download $(apt-cache pkgnames gcin | sort) --print-uris | awk '{print $1}' | awk -F "'" '{print $2}'
```

顯示

``` sh
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-anthy_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-data_2.8.8+eliu-2_all.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-dev_2.8.8+eliu-2_all.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-im-client_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb
http://hyperrate.com/gcin-ubuntu1804/amd64/gcin-tables_2.8.8+eliu-2_all.deb
http://tw.archive.ubuntu.com/ubuntu/pool/universe/g/gcin-voice/gcin-voice_0~20170223-1_all.deb
```

於是就可以執行下面指令，下載所有的「deb檔」

``` sh
wget -c $(apt-get download $(apt-cache pkgnames gcin | sort) --print-uris | awk '{print $1}' | awk -F "'" '{print $2}')
```

或是也可以先將檔案列表存成一個檔案，然後再使用「wget -i」來下載。

``` sh
apt-get download $(apt-cache pkgnames gcin | sort) --print-uris | awk '{print $1}' | awk -F "'" '{print $2}' > list.txt
wget -c -i list.txt
```

> 當然上面只是舉例，其實只要執行下面指令，就可以直接下載了。

``` sh
apt-get download $(apt-cache pkgnames gcin)
```

執行

``` sh
ls -1 | sort
```

顯示

```
gcin_2.8.8+eliu-2_amd64.deb
gcin-anthy_2.8.8+eliu-2_amd64.deb
gcin-data_2.8.8+eliu-2_all.deb
gcin-dev_2.8.8+eliu-2_all.deb
gcin-gtk2-immodule_2.8.8+eliu-2_amd64.deb
gcin-gtk3-immodule_2.8.8+eliu-2_amd64.deb
gcin-im-client_2.8.8+eliu-2_amd64.deb
gcin-qt4-immodule_2.8.8+eliu-2_amd64.deb
gcin-qt5-immodule_2.8.8+eliu-2_amd64.deb
gcin-tables_2.8.8+eliu-2_all.deb
gcin-voice_0~20170223-1_all.deb
```

下載下來的「deb檔」，可以執行下面指令安裝

``` bash
sudo dpkg -i *.deb
```

然後有可能有缺一些相依的套件。

接著只要執行下面的指令，來補足就行了。

``` sh
sudo apt-get install -f
```

也可以善用另一個工具「[gdebi](http://manpages.ubuntu.com/manpages/bionic/en/man1/gdebi.1.html)」來安裝下載的「deb檔」。

執行下面指令，先安裝「[gdebi-core](https://packages.ubuntu.com/bionic/gdebi-core)」這個套件。

``` sh
sudo apt-get install gdebi-core
```

接著執行下面指令，安裝下載下來的「deb檔」。

``` bash
sudo gdebi *.deb
```

```
Reading package lists... Done
Building dependency tree        
Reading state information... Done
Reading state information... Done
Requires the installation of the following packages: gcin-data gcin-gtk2-immodule gcin-gtk3-immodule gcin-im-client gcin-qt4-immodule gcin-tables

GTK+ based input method for Chinese users
 gcin is a GTK+ based input method which focused mainly on Traditional
 Chinese. However, it is also very useful for Simplified Chinese, Japanese,
 and many other languages.
 .
 This package depends on  gcin-data, gcin-tables, gcin-im-client, gcin-gtk2-immodule, gcin-gtk3-immodule, gcin-qt4-immodule, vorbis-tools
Do you want to install the software package? [y/N]:
```

請填入「y」並按下「Enter」，就會執行安裝的動作了。
