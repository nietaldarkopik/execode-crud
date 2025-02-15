<?php

if (!function_exists('createMultiLevelArray')) {
    function createMultiLevelArray(array $paths) {
        $result = [];

        foreach ($paths as $i => $path) {
            $keys = explode('.', $path);
            $temp = &$result;

            foreach ($keys as $key) {
                if (!isset($temp[$key])) {
                    $temp[$key] = [];
                }
                $temp = &$temp[$key];
            }
        }

        return $result;
    }
}

if (!function_exists('renderAccordion')) {
    function renderAccordion($array, $parentId = 'accordion', $level = 0, $parentKey = '', $rolePermissions) {
        static $index = 0;
        $html = '';

        foreach ($array as $key => $value) {
            $index++;
            $currentId = $parentId . '-' . $index;
            $collapseId = 'collapse' . $currentId;
            $headingId = 'heading' . $currentId;
			$parentKey = $parentKey;

            $html .= '<div class="card" id="'.$parentId.'">';
            $html .= '<div class="card-header" id="' . $headingId . '">';
            $html .= '<h5 class="mb-0">';
            $html .= '<a class="btn btn-link' . ($level > 0 ? ' collapsed' : '') . '" type="button" data-toggle="collapse" data-parent="#' . $parentId . '" data-target="#' . $collapseId . '" aria-expanded="true" aria-controls="' . $collapseId . '"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>';
            $html .= '<label><input type="checkbox" '.((empty($value))?'name="permission['. (str_replace('/','.',trim($parentKey . '/' . $key,"\n\r\t\v\x00/"))) .']"':'name="parent[]').' ' . ((in_array((str_replace('/','.',trim($parentKey . '/' . $key,"\n\r\t\v\x00/"))), array_keys($rolePermissions)))?'checked':'') . ' value="'. (str_replace('/','.',trim($parentKey . '/' . $key,"\n\r\t\v\x00/"))) .'" class="name"> '.(trim($parentKey . '/' . $key,'/')) . '</label>';
            $html .= '</h5>';
            $html .= '</div>';
            $html .= '<div id="' . $collapseId . '" class="collapse' . ($level === 0 ? ' show' : '') . '" aria-labelledby="' . $headingId . '" data-parent="#' . $parentId . '">';
            $html .= '<div class="card-body">';

            if (!empty($value)) {
                $html .= renderAccordion($value, $currentId, $level + 1,$parentKey . '/' . $key, $rolePermissions);
            } else {
                $html .= ''; //$key;
            }

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        return $html;
    }
}