<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function init_ckeditor()
{
	return '<script type="text/javascript" src="'.base_url().'application/plugins/ckeditor/ckeditor.js"></script>' ;
}
function form_frontend_ckeditor($name, $noi_dung)
{    
    $options = "{".
            "
			language: 'vi',
            height: '100px',
            toolbar :[
				[ 'Bold','Italic','Underline','Strike'],
				['Link','Unlink'],
				['Code'],
				[ 'NumberedList','BulletedList','-','Blockquote','InsertPre'] ,
                ['Undo','Redo'],
                ['Image'],
                ['Table'],
			]
        }"; 
    $CI = & get_instance();
    //$value = (isset($_POST[$name])) ? $_POST[$name] : @$CI->load->_ci_cached_vars[$name]; 
    return 
	'<textarea id="'.$name.'" name="'.$name.'">'. html_escape($noi_dung) .'</textarea>'
    .'<script type="text/javascript">
	' . 'CKEDITOR.replace("'.$name.'", ' . $options . ');</script>';
}

function form_ckeditor($name)
{    
    $options = "{".
            "
			language: 'vi',
            toolbar :[
               [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ],
			   ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] ,
				['Link','Unlink'],
				['Styles','Format','Font','FontSize' ], [ 'TextColor','BGColor' ] ,
				[ 'NumberedList', 'BulletedList','-',  'Outdent', 'Indent','-', 'Blockquote', 'CreateDiv','-'] , 
				['Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] ,
				[ 'Source','-','Preview','Print','-','Templates' ] 
				,['Maximize']
                
            ]
        }"; 
    $CI = & get_instance();
    $value = (isset($_POST[$name])) ? $_POST[$name] : @$CI->load->_ci_cached_vars[$name]; 
    return 
	'<textarea id="'.$name.'" name="'.$name.'">'. $value .'</textarea>'
    .'<script type="text/javascript">' . 'CKEDITOR.replace("'.$name.'", ' . $options . ');</script>';
}


if ( ! function_exists('myform_input'))
{
	function myform_input($name = '', $value = '', $extra = '')
	{
		$value = (isset($_POST[$name])) ? $_POST[$name] : $value;
		return form_input($name, $value, $extra);
	}
}

if ( ! function_exists('myform_dropdown'))
{
	function myform_dropdown($name = '', $options, $value = '', $extra = '')
	{
	   $value = (isset($_POST[$name])) ? $_POST[$name] : $value;
        $arrs = array();
        foreach ($options as $val)
        {
        	$arrs [$val] = $val;
        }
        
        return form_dropdown($name, $arrs, $value, $extra);
	}
}

if ( ! function_exists('myform_textarea'))
{
	function myform_textarea($name = '', $value = '', $extra = '')
	{
		$value = (isset($_POST[$name])) ? $_POST[$name] : $value;
		return form_textarea($name, $value, $extra);
	}
}


if ( ! function_exists('myform_dropdown_db'))
{
    function myform_dropdown_db($name = '',$col1="ID" , $col2="tieu_de" , $options = array(), $value = '', $extra = 'autocomplete="off"')
    {
        $value = (isset($_POST[$name])) ? $_POST[$name] : $value;
        $arrs = array();
        foreach ($options as $row)
        {
        	$arrs [$row[$col1]] = $row[$col2];
        }
        
        return form_dropdown($name, $arrs, $value, $extra);
    }
}


