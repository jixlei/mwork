<?php

namespace App\Admin\Form\Field;

use App\Admin\Form\Field;

class Slider extends Field
{
    protected static $css = [
        '/assets/AdminLTE/plugins/ionslider/ion.rangeSlider.css',
        '/assets/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css',
    ];

    protected static $js = [
        '/assets/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js',
    ];

    protected $options = [
        'type'     => 'single',
        'prettify' => false,
        'hasGrid'  => true,
    ];

    public function render()
    {
        $option = json_encode($this->options);

        $this->script = "$('{$this->getElementClassSelector()}').ionRangeSlider($option)";

        return parent::render();
    }
}
