##插件使用
```
  - composer require laracasts/generators --dev
  - composer require barryvdh/laravel-ide-helper
  - composer require barryvdh/laravel-debugbar
  "doctrine/dbal": "~2.3",
  "infyomlabs/laravel-generator": "dev-master",
  "infyomlabs/core-templates": "dev-master",
  "laravelcollective/html": "5.2.*"
  "infyomlabs/swagger-generator": "dev-master",
  ```
在开始使用Laravel Generator之前我们先来安装它，首先需要添加这些包到composer.json文件的require-dev：

##功能概述
- 完善的权限管理,每个url权限管理,RBAC模式
- 与代码生成器结合,几乎不用修改代码就可以完成类似一个表情管理功能
- 使用bootstrp为基础的ace模板,美观!
- 数据库iseed逆向生成数据
- 其它开发中

##使用
1. composer install
2. 生成.env文件
3. php artisan migrate --seeder
4. happy enjoy!
##说明
###代码生成器的使用
1. 脚手架生成器:php artisan infyom:scaffold Post
如果要让生成的模型类支持软删除，可以配置config/infyom/laravel_generator.php，开启options.softDelete => true
2. API&脚手架生成器:hp artisan infyom:api_scaffold Post
附录
下面是完整的字段HTML输入类型列表：
text：htmlType - text
email：htmlType - email
number：htmlType - number
date：htmlType - date
file：htmlType - file
password：htmlType - password
select：htmlType - select：Option 1，Option 2，Option 3
radio：htmlType - radio：Male，Female
checkbox：htmlType - checkbox：value
textarea：htmlType - textarea
3. 生成器支持逐个生成对应文件命令：
迁移生成器
php artisan infyom:migration $MODEL_NAME$
模型生成器
php artisan infyom:model $MODEL_NAME$
Repository生成器
php artisan infyom:repository $MODEL_NAME$
API控制器生成器
php artisan infyom.api:controller $MODEL_NAME$
API请求生成器
php artisan infyom.api:requests $MODEL_NAME$
测试用例生成器
php artisan infyom.api:tests $MODEL_NAME$
脚手架控制器生成器
php artisan infyom.scaffold:controller $MODEL_NAME$
脚手架请求生成器
php artisan infyom.scaffold:requests $MODEL_NAME$
视图生成器
php artisan infyom.scaffold:views $MODEL_NAME$
###后台开发说明
1. 开发流程:添加权限->添加url->添加菜单(绑定权限)->生成代码->修改逻辑
2. 数据库备份表数据说明:php artisan iseed users
3. 权限名字应用菜单url相同,菜单的(菜单active_url)应为路有前面加/