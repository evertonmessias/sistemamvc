#!/bin/bash
git add . 
git status
echo "##### GIT ADD ==> OK #####"
data=`date +%d-%m-%Y_%H:%M:%S`
git commit -m $data
echo "##### COMMIT ==> OK #####"
git push
echo "##### PUSH ==> OK #####"
