<?php

function main_cgv():string
{
	return join("\n", [
        ctrl_head(),
        html_foot(),
    ]);
}