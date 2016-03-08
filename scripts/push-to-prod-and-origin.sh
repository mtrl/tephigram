#!/bin/sh
#git tag -n99 > RELEASENOTES.txt
git for-each-ref --sort=taggerdate --format '%(taggerdate)%(refname) %(contents)' refs/tags > RELEASENOTES.txt
git commit -am "Updated release notes"
echo "--------------------"
echo "Pushing all to origin"
echo "--------------------"
git push origin --all
echo "--------------------"
echo "Pushing all to prod"
echo "--------------------"
git push prod --all
