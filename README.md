# PhalApi 2.0 

## 快速安装

### 使用composer安装

```bash
$ composer require phalapi/phalapi2
```

### 手动下载安装

将此项目代码下载解压后，进行composer安装，即：  
```bash
$ composer install
```

### 访问默认接口服务

访问以下链接：  
```
http://localhsot/public/?service=App.Site.Index
```
可以看到类似这样的输出：  
```
{
    "ret": 200,
    "data": {
        "title": "Hello World!",
        "content": "PHPer您好，欢迎使用PhalApi！",
        "version": "1.4.1",
        "time": 1499477583
    },
    "msg": ""
}
```

> 温馨提示：推荐将访问根路径指向/path/to/phalapi2/public。

## 2.0 版本系统架构

PhalApi 2.0 版本的系统架构如下：  

![](http://7xiz2f.com1.z0.glb.clouddn.com/20170708092204_54812b18c33ab263331685a5a7c18400)

主要分为三层：  

 + **phalapi/phalapi2**  项目应用层，可使用phalapi/phalapi2搭建微服务、接口系统、RESTful、WebServices等。  
 + **扩展类库**  扩展类库是指可选的、可重用的组件或类库，可以直接集成使用，由广大开发人员维护分享，对应原来的PhalApi-Library项目。  
 + **核心框架**  分别两大部分，PhalApi核心部分kernal，以及优化后的notorm。  


## 开发规范

### 类名重命名规则

原来的类名遵循PEAR规范，现需要调整遵循PSR-4规范。如：  

```
原来的：PhalApi_Filter

调整后：\PhalApi\Filter  
```

对于有继承的情况，为了避免最后的关键字有冲突，统一在子类后面添加父类的名称作为后续。如：  
```
原来的：
PhalApi_COnfig_File
PhalApi_COnfig_Yaconf

调整后：
PhalApi\Config\FileConfig
PhalApi\Config\YaconfConfig
```
 