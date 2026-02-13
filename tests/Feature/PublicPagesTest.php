<?php

test('home page can be rendered', function () {
    $this->get(route('home'))->assertOk();
});

test('posts index page can be rendered', function () {
    $this->get(route('posts.index'))->assertOk();
});

test('gallery page can be rendered', function () {
    $this->get(route('gallery'))->assertOk();
});

test('contact page can be rendered', function () {
    $this->get(route('contact'))->assertOk();
});

test('services index page can be rendered', function () {
    $this->get(route('services.index'))->assertOk();
});

test('about page can be rendered', function () {
    $this->get(route('about'))->assertOk();
});

test('legal page can be rendered', function () {
    $this->get(route('legal'))->assertOk();
});

test('privacy page can be rendered', function () {
    $this->get(route('privacy'))->assertOk();
});

test('pricing page can be rendered', function () {
    $this->get(route('pricing'))->assertOk();
});
