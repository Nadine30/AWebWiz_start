<?php
function main_about():string
{
	return join("\n", [
        ctrl_head(),
        html_about_main(get_about_content()),
        html_foot(),
    ]);
}