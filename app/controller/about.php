<?php
function main_about():string
{
	return join("\n", [
        ctrl_head(),
        html_foot(),
    ]);
}