#!/bin/sh
echo "--------------------"
echo "Pushing all to origin"
echo "--------------------"
git push origin --all
echo "--------------------"
echo "Pushing all to prod"
echo "--------------------"
git push prod --all
