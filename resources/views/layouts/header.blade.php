<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href={{asset('public/css/default.css')}} rel="stylesheet" type="text/css" media="all" />
    <link href={{asset('public/css/fonts.css')}} rel="stylesheet" type="text/css" media="all" />
    <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li ><a href="{{asset('/')}}" accesskey="1" title="">Homepage</a></li>
                <li><a href="{{asset('our')}}" accesskey="2" title="">Our Clients</a></li>
                <li><a href="{{asset('about')}}" accesskey="3" title="">About Us</a></li>
                <li><a href="{{asset('careers')}}"accesskey="4" title=""> Careers</a></li>
                <li><a href="{{asset('contact')}}" accesskey="5" title="">Contact Us </a></li>
                <li><a href="{{asset('login')}}" accesskey="6" title="">Login</a></li>

            </ul>
        </div>

    </div>

  @section('sidebar')
        This is the master sidebar.
    @show

    <div class="container">
@yield('content')



 <div id="header-featured">
        <div id="banner-wrapper">
            <div id="banner" class="container">
                <h2>Maecenas luctus lectus</h2>
                <p>This is <strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
                <a href="#" class="button">Etiam posuere</a> </div>
        </div>
    </div>



@extends('layouts.footer')

