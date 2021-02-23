#!/bin/bash

THEME=$1
VER=$2
AUTHOR="Theme Directory <noreply@wordpress.org>"

cd /tmp/theme-dir-gh/td-gh-ex

BRANCH=$( git rev-parse --abbrev-ref HEAD )
if [[ -z "$BRANCH" ]]; then
	git checkout master
	git reset --hard
	git checkout --orphan $THEME || git checkout $THEME
elif [[ "$BRANCH" != "$THEME" ]]; then
	git checkout master
	git reset --hard
	git checkout --orphan $THEME || git checkout $THEME
fi

# This dance is because some theme versions contain a .git :facepalm:
mv .git ../
rm -rf ./* ./.* 2>/dev/null

svn export https://themes.svn.wordpress.org/$THEME/$VER/ . --force -q 2>/dev/null >/dev/null

rm -rf ./.git ./__MACOSX ./.svn 2>/dev/null

mv ../.git .

git add -A
# git status --short | grep -v '?' | cut -c4- | xargs -I% git add %
git status --short | grep '^??' | cut -c4- | xargs -I% git rm % # I thought the above would do this, but seems not.

git status --short # For debug output

MSG=$( svn log https://themes.svn.wordpress.org/$THEME/$VER/ | tail -n2 | head -n1 )
DATE=$( svn log https://themes.svn.wordpress.org/$THEME/$VER/ | head -n2 | tail -n1 | cut -d '|' -f3 | cut -d '(' -f1 | cut -d' ' -f2-3 )

echo "git commit -a --message='$MSG' --author='$AUTHOR' --date='$DATE'"
git commit -a --message="$MSG" --author="$AUTHOR" --date="$DATE"


# echo "Sleeping for 5 min"
# sleep 360

# sleep 60

#git gc 

echo