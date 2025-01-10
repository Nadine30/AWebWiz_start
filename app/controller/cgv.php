<?php
function main_cgv():string
{
	return join("\n", [
        ctrl_head(),
        html_cgv_main(get_cgv_content()),
        html_foot(),
    ]);
}