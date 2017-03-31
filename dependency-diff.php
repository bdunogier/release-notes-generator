<?php

function printUpdated ($oldPackage, $newPackage) {
    $versionDiff = $oldPackage->version . ".." . $newPackage->version;
    $url = rtrim($newPackage->source->url, ".git") . "/compare/" .$versionDiff;

    echo "|" . $newPackage->name . " | [" . $versionDiff . "](" . $url . ")|\n";
}

function printNew ($newPackage) {
    echo "|" . $newPackage->name . " | Newly added|\n";
}

function printDeleted ($package) {
    echo "|" . $package->name . " | Deleted|\n";
}

$fromFilePath = $argv[1];
$toFilePath = $argv[2];

//TODO call generator


