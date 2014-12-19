<?php
function status_topic($n)
{
		if($n==0)
		return "<span class='red'>Chưa duyệt</span>";
		return "Đã duyệt";
}

function status_order($n)
{
        if($n==0)
        return "<span style='color:red'>Chưa duyệt</span>";
        elseif($n==1)
        return "<span style='color:green'>Đang giao</span>";
        if($n==2)
        return "<span style='color:blue'>Đã giao</span>";
        
}

