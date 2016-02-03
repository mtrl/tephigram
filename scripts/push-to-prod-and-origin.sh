#!/bin/sh
echo "--------------------"
echo "Pushing all to origin"
echo "--------------------"
git push origin --all
echo "--------------------"
echo "Pushing tags to origin"
echo "--------------------"
git push origin --tags
echo "--------------------"
echo "Pushing all to prod"
echo "--------------------"
git push prod --all
echo "--------------------"
echo "Pushing tags to prod"
echo "--------------------"
git push prod --tags
