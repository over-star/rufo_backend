##插件使用
  - composer require laracasts/generators --dev
  - composer require barryvdh/laravel-ide-helper
  - composer require barryvdh/laravel-debugbar
  ```
在开始使用Laravel Generator之前我们先来安装它，首先需要添加这些包到composer.json文件的require-dev：

"infyomlabs/laravel-generator": "dev-master",
"infyomlabs/core-templates": "dev-master",
"laravelcollective/html": "5.2.*"
注：如果你使用的是Laravel 5.1请将上面的5.2.*改成5.1.*。
如果你想要为自己的API文档生成swagger注释，还需要添加这两个包：

"infyomlabs/swagger-generator": "dev-master",
"jlapp/swaggervel": "dev-master",
如果要使用从表格生成的选项，还需要这个扩展包：

"doctrine/dbal": "~2.3"
添加完扩展包后运行如下命令：

composer update
之后需要到config/app.php中注册服务提供者到providers数组：

Collective\Html\HtmlServiceProvider::class,
Laracasts\Flash\FlashServiceProvider::class,
Prettus\Repository\Providers\RepositoryServiceProvider::class,
\InfyOm\Generator\InfyOmGeneratorServiceProvider::class,
\InfyOm\CoreTemplates\CoreTemplatesServiceProvider::class,
然后在该文件中注册门面到aliases数组：

'Form'      => Collective\Html\FormFacade::class,
'Html'      => Collective\Html\HtmlFacade::class,
'Flash'    => Laracasts\Flash\Flash::class
发布配置文件：
php artisan vendor:publish
```