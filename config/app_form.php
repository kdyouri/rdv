<?php
return [
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'input' => '<input type="{{type}}" class="form-control" name="{{name}}" autocomplete="off"{{attrs}}/>',
    'inputContainer' => '<div class="mb-3 input {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="mb-3 input {{type}}{{required}} error">{{content}}{{error}}</div>',
    'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
    'select' => '<select class="form-select select2" name="{{name}}"{{attrs}}>{{content}}</select>',
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
];