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
http://localhsot/path/to/phalapi2/public/
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
