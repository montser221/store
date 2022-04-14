<?php
function setActiveCategory($category,$output="bolder")
{
    return request()->category===$category ? $output : ''; 
}

function presentPrice($price)
{
    return  number_format($price / 100,2);
}

