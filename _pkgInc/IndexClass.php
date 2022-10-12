<?php

/**
 * support functions
 */
function camelCaseHash($string)
{
    return lcfirst(str_replace(
        ' ',
        '',
        ucwords(str_replace('_', ' ', $string))
    ));
}

/**
 * 
 */
class IndexApp
{

    private $opts = array(
        'modules' => false,
        'myInputs' => false,
        'local' => true,
        'name' => false,
        'widget' => false,
        'urls' => false,
        'urlsLocal' => false,
        'version' => false,
        'versionData' => false,
        'versionOptions' => false,
    );
    private $filenames = array(
        'script' => false,
        'css' => false,
        'html' => false,
    );
    private $bodyClass = false;

    function __construct($mainOptions = false)
    {
        if ($mainOptions) {
            $this->updateOptions($mainOptions);
        }
        $this->genFileNames();
    }

    private function saveSupportFile($dataToSaveFile)
    {
        $formatedContent = str_replace($dataToSaveFile['from'], $dataToSaveFile['to'], $dataToSaveFile['content']);
        $fmin = fopen($dataToSaveFile['file'], 'w');
        fwrite($fmin, $formatedContent);
        fclose($fmin);
    }

    public function formatAndSaveCss($content)
    {
        $dataToSaveFile = array(
            'content' => $content,
            'from' => array(
                '<style>',
                '</style>',
                'div#du-body.du-body'
            ),
            'to' => array(
                '',
                '',
                $this->opts['widget']['css']
            ),
            'file' => $this->opts['urls']['toSave']['files']
                . $this->filenames['css'] . '.css',
        );
        if ($this->opts['local']) {
            array_push(
                $dataToSaveFile['from'],
                $this->opts['urls']['img'],
                $this->opts['urls']['def_img']
            );
            array_push(
                $dataToSaveFile['to'],
                $this->opts['urls']['img_file'],
                $this->opts['urls']['def_img_file']
            );
        }
        $this->saveSupportFile($dataToSaveFile);
        die();
    }

    public function formatAndSaveJs($content)
    {
        $dataToSaveFile = array(
            'content' => $content,
            'from' => array(
                '<script>',
                '</script>'
            ),
            'to' => array(
                '',
                ''
            ),
            'file' => $this->opts['urls']['toSave']['files']
                . $this->filenames['script'] . '.js',
        );
        if ($this->opts['local']) {
            array_push(
                $dataToSaveFile['from'],
                '##tempFinalFile##'
            );
            array_push(
                $dataToSaveFile['to'],
                $this->opts['urls']['toSave']['files']
            );
        } else {
            array_push(
                $dataToSaveFile['from'],
                '##tempFinalFile##',
                $this->filenames['css'] . '.css'
            );
            array_push(
                $dataToSaveFile['to'],
                $this->opts['urls']['img'],
                $this->filenames['css'] . '.min' . '.css'
            );
        }
        $this->saveSupportFile($dataToSaveFile);
        die();
    }

    public function generateInnerHtml($content)
    {
        ob_clean();
        $content = explode('<!-- ++++++++ -->', $content);
        $ttemp = preg_replace("/|\r|\n|\t/", '', $content[1]);
        $ttemp = preg_replace("/\s+/", ' ', $ttemp);
        $ttemp = preg_replace("/> </", '><', $ttemp);
        /* Remove unwanted HTML comments */
        $ttemp = preg_replace("/<!--(?!<!)[^\[>].*?-->/", '', $ttemp);
        echo trim($ttemp);
        die();
    }

    public function formatAndSaveCodeFiles($content)
    {
        $dataToSaveFile = array(
            'content' => $content,
            'from' => array(''),
            'to' => array(''),
            'file' => $this->opts['urls']['toSave']['preview']
                . $this->filenames['html'] . '.html',
        );
        $this->saveSupportFile($dataToSaveFile);

        $content = explode('<!-- #### -->', $content);
        $from = array(
            $this->opts['urls']['toSave']['files'],
            $this->filenames['script'] . '.js',
            $this->filenames['css'] . '.css'
        );
        $to = array(
            $this->opts['urls']['img'],
            $this->filenames['script'] . '.min' . '.js',
            $this->filenames['css'] . '.min' . '.css'
        );
        $dataToSaveFile = array(
            'content' => $content[1],
            'from' => $from,
            'to' => $to,
            'file' => $this->opts['urls']['toSave']['toMin']
                . $this->filenames['html'] . '.html',
        );
        $this->saveSupportFile($dataToSaveFile);
    }

    public function generateMainHtml($content, $addLive)
    {
        $this->createSaveFolders();
        $genFiles = array(
            'css',
            'script',
        );
        foreach ($genFiles as $value) {
            $filenameToGen = 'http://localhost/'
                . $this->opts['urlsLocal']['proj']
                . '?gen=' . $value . $addLive;
            file_get_contents($filenameToGen);
        }
        ob_clean();
        $content = explode('<!-- ++++++++ -->', $content);
        unset($content[1]);
        $from = array('##tempFinalFile##');
        $to = array($this->opts['urls']['toSave']['files']);
        $content = str_replace($from, $to, implode('', $content));
        echo $content;
    }

    public function getOptionsLightsHtml()
    {
        if (
            !$this->opts['myInputs'] ||
            !isset($this->opts['myInputs']['gen']) ||
            $this->opts['myInputs']['gen'] != 'widget'
        ) {
            return "";
        }
        $lightsHtml = '';
        if (!!$this->opts['local']) {
            $lightsHtml .= '<li class="genCode">'
                . '<a href="'
                . 'http://'
                . $_SERVER['HTTP_HOST']
                . $_SERVER['REQUEST_URI']
                . '&live=1">Generate Code</a></li>';
        }
        if ($this->opts['version']) {
            $lightsHtml
                .= '<li class="opt v_'
                . $this->opts['version'] . '">Version: '
                . $this->opts['version'] . '</li>';
        }
        if ($this->opts['modules']) {
            foreach ($this->opts['modules'] as $moduleKey => $moduleValue) {
                $class = '';
                if (!!$moduleValue) {
                    $class = 'on';
                }
                $lightsHtml .= '<li class="' . $class . '">' . $moduleKey . '</li>';
            }
        }
        $holderClass = "local";
        if (!$this->opts['local']) {
            $holderClass = "notlocal";
        }
        return '<ul id="current_setup" class="' . $holderClass . '">'
            . $lightsHtml . '</ul>' . "\n";
    }

    public function getBodyClass()
    {
        if (!$this->bodyClass) {
            $this->bodyClass = $this->genBodyClass();
        }
        return $this->bodyClass;
    }

    private function genBodyClass()
    {
        $bodyClass = '';
        if (
            isset($this->opts['myInputs']['gen']) &&
            $this->opts['myInputs']['gen']
        ) {
            $bodyClass = 'body-' . $this->opts['myInputs']['gen'];
            if (!$this->opts['local']) {
                $bodyClass .= '-live';
            }
        }
        return $bodyClass;
    }

    private function createSaveFolders()
    {
        if (!$this->opts['urlsLocal']['toSave']) {
            return false;
        }
        if (is_string($this->opts['urlsLocal']['toSave'])) {
            $this->opts['urlsLocal']['toSave'] = array(
                $this->opts['urlsLocal']['toSave']
            );
        }
        foreach ($this->opts['urlsLocal']['toSave'] as $key => $value) {
            if (is_dir($value) === false) {
                mkdir($value);
            }
        }
    }

    private function updateOptions($options)
    {
        foreach ($this->opts as $key => $value) {
            if (isset($options[$key])) {
                $this->opts[$key] = $options[$key];
            }
        }
    }

    public function getCssFilename()
    {
        return $this->filenames['css'] . '.css';
    }

    public function getScriptFilename()
    {
        return $this->filenames['script'] . '.js';
    }

    private function genFileNames()
    {
        /**
         * HTML FILE
         */
        $this->filenames['html'] = 'code_' . $this->opts['name']['seo'];
        /**
         * JS FILE
         */
        $this->filenames['script'] = 'du_' . $this->opts['name']['seo'];
        /**
         * CSS FILE
         */
        $this->filenames['css'] = 'du_' . $this->opts['name']['seo'];

        if ($this->opts['version']) {
            /**
             * HTML FILE
             */
            $this->filenames['html'] .= '_' . $this->opts['version'];
            /**
             * JS FILE
             */
            if (
                $this->opts['versionOptions'] &&
                $this->opts['versionOptions']['same-js']
            ) {
                $this->filenames['script'] .= '_' . $this->opts['version'];
            }
            /**
             * CSS FILE
             */
            if (
                $this->opts['versionOptions'] &&
                $this->opts['versionOptions']['same-css']
            ) {
                $this->filenames['css'] .= '_' . $this->opts['version'];
            }
        }
    }

    /**
     * IMAGES
     */
    public function formatImageUrl($urlSource, $imageName, $forceLocal = false, $encode = false)
    {
        $finalSrc = $this->opts['urlsLocal'][$urlSource] . $imageName;
        if (!is_file($finalSrc)) {
            return 'missing image - ' . $finalSrc;
        }
        if (!$forceLocal) {
            $finalSrc = $this->opts['urls'][$urlSource] . $imageName;
        }

        if ($encode) {
            $finalSrc = $this->image2base64($finalSrc);
        }
        return $finalSrc;
    }

    private function image2base64($url)
    {
        $im = file_get_contents($url);
        $ext = explode('.', $url);
        return 'data:image/' . end($ext) . ';base64,' . base64_encode($im);
    }

    public function calculateSprite($spriteBaseName)
    {
        if (!file_exists($this->formatImageUrl('img', $spriteBaseName . '.png', 1))) {
            return false;
        }
        $sprite = array(
            'main' => array(
                'name' => $spriteBaseName . '.png',
            ),
            'ratio2' => false
        );
        $sprite['main']['url'] = $this->formatImageUrl('img', $sprite['main']['name']);
        $sprite['main']['url-local'] = $this->formatImageUrl('img', $sprite['main']['name'], 1);
        $sprite['main']['size'] = getimagesize($sprite['main']['url-local']);
        $sprite['main']['size']['width'] = $sprite['main']['size'][0];
        $sprite['main']['size']['height'] = $sprite['main']['size'][1];

        /* * *******
         * Higher Definition sprite, pixel-ratio:2 and min-resolution: 192dpi
         *  ********* */
        if (file_exists($this->formatImageUrl('img', $spriteBaseName . '_x2.png', 1))) {
            $sprite['ratio2'] = array(
                'name' => $spriteBaseName . '_x2.png',
            );
            $sprite['ratio2']['url'] = $this->formatImageUrl('img', $sprite['ratio2']['name']);
            $sprite['ratio2']['url-local'] = $this->formatImageUrl('img', $sprite['ratio2']['name'], 1);
            $sprite['ratio2']['size'] = getimagesize($sprite['ratio2']['url-local']);
            $sprite['ratio2']['size']['width'] = $sprite['ratio2']['size'][0];
            $sprite['ratio2']['size']['height'] = $sprite['ratio2']['size'][1];
        }
        return $sprite;
    }

    /**
     * SUPPORT
     */
    protected function pr($array, $title = false)
    {
        if (!$this->opts['local']) {
            return false;
        }
        echo '<pre>';
        //$finalTitle = '(' . print_r(debug_backtrace(), 1) . ')';
        $finalTitle = '(' . $this->getBacktrace() . ')';
        if ($title) {
            $finalTitle = $title . ' ' . $finalTitle;
        }
        echo '--- ' . $finalTitle . " ---<br>\n";
        if (is_array($array)) {
            print_r($array);
        } else {
            echo $array;
        }
        echo '</pre>';
    }

    protected function prd($array, $title = false)
    {
        $this->pr($array, $title);
        die();
    }

    protected function getBacktrace()
    {
        $temp = debug_backtrace();
        $res = array();
        $first = true;
        $x = count($temp);
        foreach ($temp as $key => $value) {
            $x--;
            if ($first) {
                $first = false;
                continue;
            }
            if (in_array($value['function'], array('pr', 'prd'))) {
                continue;
            }
            $strArray = explode('\\', $value['file']);
            $lastElement = end($strArray);

            array_unshift($res, "\n" . (str_repeat('-', $x)) . '> ' . $value['function'] . ', ' . $lastElement . '');
        }

        return implode('', $res) . "\n";
    }
}
