<?php

namespace App\Admin\Extensions;

use App\Admin\Form\Field;

class UEditor extends Field
{
    protected $view = 'admin.ueditor';

    protected static $js = [
        '/vendor/ueditor/ueditor.config.js',
        '/vendor/ueditor/ueditor.all.min.js',
        '/vendor/ueditor/lang/zh-cn/zh-cn.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT
    UE.delEditor('{$this->id}');
    var ue = UE.getEditor('{$this->id}');
    ue.addListener("ready",function(){
        ue.setContent('{$this->value}');
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
    ue.addListener("contentChange",function(){
        var html = ue.getContent();
        $('input[name=$name]').val(html);
    });
EOT;
        return parent::render();
    }
}
