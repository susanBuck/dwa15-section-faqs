# September 17, 2014: Week 2 - Git 

* [Link to live stream (when live)]()
* [Link to recording (when done)]()

## Summary
You have already:

- Setup Git
- Setup Github
- Setup a Repository
- git add, git push, git commit

This Section:

- Branching
- Checkout
- Merging
- Merge Conflicts
- Stashing


## Outline
###Branching:

Goals: 
- Learn how to split off from the default branch (usually master)
- Learn how to make changes on another branch
- Be able to checkout between branches 

One way to achieve the results of branching would be to create a copy of your code, put it into a second directory, edit that, and merge it later. Git makes this much easier.

git branch doesn’t move you to a new branch: it only creates a new branch.

```bash
$ git branch
```

Use checkout to move to a new branch. If you make changes and commit from this branch, your master branch will still be pointing at the previous snapshot of your code, the one you were on before you used git checkout.

```bash
$ git checkout (insert your branch name here, without parenthesis)
```
or use

```bash
$ git checkout -b (name of branch) - for automatic creation and switch
```

After edits are made and commited, checkout back to the master branch.

```bash
$ git checkout master
```

###Merging and Merge Conflicts:

We can merge a branch we’re working on with the master branch.

```bash
$ git merge (name of branch to merge)
```

We can pull changes from the master branch to a branch that we are working on

```bash
$ git merge master
```

You can delete an old branch.

```bash
$ git branch -d (branch name)
```

If you have changed the same part of a file in the two branches you intend to merge together, there will be a merge conflict. 

Git will pause when you hit a merge conflict. If you want to see where the conflict is, use git status.

```bash
$ git status
```

Git will notate the file where the error occurred. 
To resolve this conflict, one strategy is to use git's merge tool. It will run through the conflicts for you.

```bash
$ git mergetool
```

Check that the conflict is gone with git status.
```bash
$ git status
```

###Editors:

vi -> vim
pico -> nano
emacs

use an editor by ‘pico filename.txt’ or ‘vim filename.txt’

Viewing file contents:

cat - good for showing short files
less - good for showing longer files, allows you to page through and starts at the beginning
head - shows just the few top lines of a file
tail - shows the ending lines of a file (good for log files, can be specified to show live updates to the file)

###Permissions:

When you view ‘cd / ; ls -al’ you will see that the file ownership column will display ‘root’ which is the admin user within the system. If you go to your user’s root directory with ‘cd ~; ls -al’ you will see your current username as the owner of files, with an exception for the .. reference to the previous folder. 

The chown command will allow you to change the ownership of files ‘chown filename.txt’. If you are trying to specify ‘root’ as the new file owner, or changing a file from root to your current user, you will need to preface your command with ‘sudo’.

sudo - super user do will bypass permissions checks after you input your computer’s password:
```bash
$ sudo chown root filename.txt 
```
sudo is often needed when changing global configuration files outside of your current user’s directory path

cp - copy a file to a new filename
```bash
$ cp currentFile.txt newFileCopy.txt
```
###Grep and Piping:

Grep is a tool used for searching for strings in a text file. It is commonly used in conjunction with the | and > commands, which allow you to reroute data from one tool to another.

Look for files made in august:
```bash
ls -la | grep ‘Aug’
```
Look for jpg files by extension:
```bash
ls -la | grep -i ‘.jpg’
```
Look for line in a file:
```bash
Grep ‘[search term]’ [filename1] [filename2] …
```
Look for line in all files in a folder (using recursion)
```bash
grep -R ‘[searchterm]’ [path such as ./ for current dir]
```
Write output to a file:
```bash
ls -la > fileList.txt
```
View the result
```bash
cat fileList.txt
```
Search file with grep, save result in file
```bash
grep ‘invalid username’ logfile.log > usernameErrors.log
```
or use >> to append


## References
