<?php 
    // PHP HTML Original project to print html in php
    //  i = in
    //  o = out
    function br($number = 1){
        for ($i=0; $i < $number; $i++) { 
            echo"<br>";
        }
    }
    function space($number){
        for ($i=0; $i < $number; $i++) { 
            echo"&nbsp;";
        }
    }
    function h1($h1 = null){
        echo"<h1>" .$h1 . "</h1>";
    }
    function h2($h2 = null){
        echo"<h2>" .$h2 . "</h2>";
    }
    function h3($h3 = null){
        echo"<h3>" .$h3 . "</h3>";
    }
    function h4($h4 = null){
        echo"<h4>" .$h4 . "</h4>";
    }
    function h5($h5 = null){
        echo"<h5>" .$h5 . "</h5>";
    }
    function h6($h6 = null){
        echo"<h6>" .$h6 . "</h6>";
    }
    function p($p = null){
        echo"<p>" .$p . "</p>";
    }
    function ahref($link, $text){
        return"<a href='" .$link . "'>" . $text . "</a>";
    }
    function img($img){
        echo"<img src='". $img ."'>";
    }
    function tableI(){
        echo ("<table>");
    }
    function tableO(){
        echo("</table>");
    }
    function th($th = null){
        echo"<th>" .$th . "</th>";
    }
    function td($td = null){
        echo"<td>" .$td . "</td>";
    }
    function tr($tr = null){
        echo("<tr>" . $tr . "</tr>");
    }
    function trI(){
        echo"<tr>";
    }
    function trO(){
        echo"</tr>";
    }
    //no data, it print normal blue,
    //data as "Slice" will put a table slice
    //data but no mention of color, we print data and normal blue
    //data and color,if eventhing is good, we print data and specified color; 

    function tdc($data =null, $colorNotEmpty = null){
        if ($data == "")  {
            print "<td style='background-color:lightblue'></td>";
        } 
        else if ($data == "Slice"){
            print "<td style='background-color:#3d5f78'></td>";
        }
        else if ($colorNotEmpty == ""){
            print "<td style='background-color:lightblue'>".$data ."</td>";
        }
        else  {
            print "<td style='background-color:" . $colorNotEmpty . ";'>". $data . "</td>";
        }
        //rgb(173, 216, 230);
    }

