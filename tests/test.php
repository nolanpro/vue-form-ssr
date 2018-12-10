<?php
require __DIR__ . '/vendor/autoload.php';

use Spatie\Ssr\Renderer;
use Spatie\Ssr\Engines\Node;

$engine = new Node(exec('which node'), '/tmp');
$renderer = new Renderer($engine);

$config = <<<HERE
[{"name": "Email test", "items": [{"label": "Text", "config": {"label": "Test Variable: {{ foo }}", "fontSize": "1.5em", "fontWeight": "bold"}, "component": "FormText", "inspector": [{"type": "FormInput", "field": "label", "config": {"label": "Text Label", "helper": "The text to display"}}, {"type": "FormSelect", "field": "fontWeight", "config": {"label": "Font Weight", "helper": "The weight of the text", "options": [{"value": "normal", "content": "Normal"}, {"value": "bold", "content": "Bold"}]}}, {"type": "FormSelect", "field": "fontSize", "config": {"label": "Font Size", "helper": "The size of the text in em", "options": [{"value": "0.5em", "content": "0.5"}, {"value": "1em", "content": "1"}, {"value": "1.5em", "content": "1.5"}, {"value": "2em", "content": "2"}]}}], "editor-component": "FormText"}, {"items": [[{"label": "Text", "config": {"label": "Left Text", "fontSize": "1em", "fontWeight": "normal"}, "component": "FormText", "inspector": [{"type": "FormInput", "field": "label", "config": {"label": "Text Label", "helper": "The text to display"}}, {"type": "FormSelect", "field": "fontWeight", "config": {"label": "Font Weight", "helper": "The weight of the text", "options": [{"value": "normal", "content": "Normal"}, {"value": "bold", "content": "Bold"}]}}, {"type": "FormSelect", "field": "fontSize", "config": {"label": "Font Size", "helper": "The size of the text in em", "options": [{"value": "0.5em", "content": "0.5"}, {"value": "1em", "content": "1"}, {"value": "1.5em", "content": "1.5"}, {"value": "2em", "content": "2"}]}}], "editor-component": "FormText"}], [{"label": "Text", "config": {"label": "Right Text With Var bar: {{ bar }}", "fontSize": "1em", "fontWeight": "normal"}, "component": "FormText", "inspector": [{"type": "FormInput", "field": "label", "config": {"label": "Text Label", "helper": "The text to display"}}, {"type": "FormSelect", "field": "fontWeight", "config": {"label": "Font Weight", "helper": "The weight of the text", "options": [{"value": "normal", "content": "Normal"}, {"value": "bold", "content": "Bold"}]}}, {"type": "FormSelect", "field": "fontSize", "config": {"label": "Font Size", "helper": "The size of the text in em", "options": [{"value": "0.5em", "content": "0.5"}, {"value": "1em", "content": "1"}, {"value": "1.5em", "content": "1.5"}, {"value": "2em", "content": "2"}]}}], "editor-component": "FormText"}]], "label": "Multi Column", "config": [], "component": "FormMultiColumn", "container": true, "inspector": [{"type": "FormText", "config": {"label": "MultiColumn"}}], "editor-component": "MultiColumn"}, {"label": "Text", "config": {"label": "A Footer", "fontSize": "1em", "fontWeight": "normal"}, "component": "FormText", "inspector": [{"type": "FormInput", "field": "label", "config": {"label": "Text Label", "helper": "The text to display"}}, {"type": "FormSelect", "field": "fontWeight", "config": {"label": "Font Weight", "helper": "The weight of the text", "options": [{"value": "normal", "content": "Normal"}, {"value": "bold", "content": "Bold"}]}}, {"type": "FormSelect", "field": "fontSize", "config": {"label": "Font Size", "helper": "The size of the text in em", "options": [{"value": "0.5em", "content": "0.5"}, {"value": "1em", "content": "1"}, {"value": "1.5em", "content": "1.5"}, {"value": "2em", "content": "2"}]}}], "editor-component": "FormText"}]}]
HERE;
$data = ["foo" => "You should see me in the rendered output", "bar" => "ok"];

echo $renderer
	->debug()
	->context('config', json_decode($config))
	->context('data', $data)
	->entry(__DIR__ . '/../dist/main.js')->render();
