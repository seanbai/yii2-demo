@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../cebe/indent/indent
php "%BIN_TARGET%" %*
