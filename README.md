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
 