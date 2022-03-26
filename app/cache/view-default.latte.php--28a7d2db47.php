<?php

use Latte\Runtime as LR;

/** source: /home/yeri/workspace/bahageea/app//view/default.latte.php */
final class Template28a7d2db47 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>';
		echo LR\Filters::escapeHtmlText(($this->filters->upper)($title)) /* line 8 */;
		echo '</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: \'Nunito\', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="flex h-screen">
            <div class="m-auto flex flex-col items-center">
                <p class="pb-5 text-6xl font-light text-center tracking-widest text-purple-600">';
		echo LR\Filters::escapeHtmlText(($this->filters->upper)($title)) /* line 24 */;
		echo '</p>
                <div class="flex flex-row gap-x-7">
';
		$iterations = 0;
		foreach ($menus as $menu=>$link) /* line 26 */ {
			echo '                    <a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($link)) /* line 26 */;
			echo '" class="hover:text-purple-600">';
			echo LR\Filters::escapeHtmlText(($this->filters->capitalize)($menu)) /* line 26 */;
			echo '</a>
';
			$iterations++;
		}
		echo '                </div>
            </div>
            ';
		echo csrf_form() /* line 29 */;
		echo '
        </div>
    </div>
</body>

</html>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['menu' => '26', 'link' => '26'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}
